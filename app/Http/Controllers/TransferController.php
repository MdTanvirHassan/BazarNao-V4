<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wearhouse;
use App\Models\Transfer;
use App\Models\Product;
use App\Models\ProductStock;


class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $transfer = Transfer::orderBy('date', 'desc')->paginate(15);
        return view('backend.transfer.index', compact('transfer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::whereNull('parent_id')->get();
        
        $wearhouses = Wearhouse::get();
        return view('backend.transfer.add', compact('wearhouses','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transfer = new Transfer;

        $transfer->from_wearhouse_id = $request->from_wearhouse_id;
        $transfer->to_wearhouse_id = $request->to_wearhouse_id;
        $transfer->qty = $request->qty;
        $transfer->stock_qty = $request->stock_qty;
    
    	$transfer->unit_price = $request->unit_price; 
        $transfer->amount = round($request->unit_price*$request->qty,2); 

        $transfer->date = $request->date;
        $transfer->product_id = $request->product_id;
        $transfer->remarks = $request->remarks;
        $transfer->created_by = auth()->user()->id;
        

        $transfer->save();

        flash(translate('Transfer has been inserted successfully'))->success();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(Request $request, $id)
     {
        $products = Product::get();
        $wearhouses = Wearhouse::get();
         $transfer  = Transfer::findOrFail($id);
         return view('backend.transfer.edit', compact('transfer','wearhouses','products'));
     }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transfer = Transfer::findOrFail($id);
        $transfer->from_wearhouse_id = $request->from_wearhouse_id;
        $transfer->to_wearhouse_id = $request->to_wearhouse_id;
        $transfer->qty = $request->qty;
        $transfer->stock_qty = $request->stock_qty;
    
    	$transfer->unit_price = $request->unit_price; 
        $transfer->amount = round($request->unit_price*$request->qty,2); 
    
        $transfer->date = $request->date;
        $transfer->product_id = $request->product_id;
        $transfer->remarks = $request->remarks;

        $transfer->save();


        flash(translate('Area has been updated successfully'))->success();
        return redirect()->route('transfer.index');
    }

    public function approve(Request $request, $id){

        $transfer = Transfer::findOrFail($id);
        $dps = ProductStock::where(['product_id'=>$transfer->product_id,'wearhouse_id'=>$transfer->from_wearhouse_id])->first();
        if($dps->qty < $transfer->qty){
            flash(translate('Now Qty Not Enough for transfer'))->warning();
        return back();
        }else{
            $transfer->status = 'Approved';
            $transfer->approved_date = now();
            $transfer->save();
            $ps = ProductStock::where(['product_id'=>$transfer->product_id,'wearhouse_id'=>$transfer->to_wearhouse_id])->first();
            if($ps){
            $ps->increment('qty', $transfer->qty);
            $ps->save();
            }else{
            ProductStock::insert(['product_id'=>$transfer->product_id,'wearhouse_id'=>$transfer->to_wearhouse_id,'qty'=>$transfer->qty]);
            }
            if($dps){
               $dps->decrement('qty', $transfer->qty);
               $dps->save();
            }
           flash(translate('Transfer has been updated successfully'))->success();
           return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transfer = Transfer::findOrFail($id);
        $transfer->status = 'Canceled';
        $transfer->save();

        flash(translate('Transfer has been deleted successfully'))->success();
        return back();
    }

    public function transfer_list(Request $request)
    {
        $wearhouse = Wearhouse::get();
            $sort_by = null;
            $start_date = date('Y-m-01');
            $end_date = date('Y-m-t 23:59:59');

            if(!empty($request->start_date)){
                $start_date = $request->start_date;
                $end_date = $request->end_date;
            }

        $warehousearray = getWearhouseBuUserId(auth()->user()->id);
        $transfer = Transfer::leftjoin('products','transfers.product_id','=','products.id')
        ->whereIn('transfers.from_wearhouse_id',$warehousearray)
        ->whereBetween('transfers.date',[$start_date,$end_date])
        ->orderby('transfers.date','asc')
        ->select('transfers.*','products.purchase_price')->get();
        
        if(auth()->user()->staff->role->name=='Purchase Manager')
        return view('backend.staff_panel.purchase_manager.transfer_list', compact('transfer','wearhouse','sort_by','start_date','end_date'));
        else
        return view('backend.staff_panel.purchase_executive.transfer_list', compact('transfer','wearhouse','sort_by','start_date','end_date'));
    }
    public function add_transfer()
    {
        
        $warehousearray = getWearhouseBuUserId(auth()->user()->id);
        if(!$warehousearray){
            $warehousearray=array(); 
        }
        
        $userwarehouse = Wearhouse::whereIn('id',$warehousearray)->get();
        $products = Product::whereNull('parent_id')->get();
        $warehouse = Wearhouse::get();
        return view('backend.staff_panel.purchase_executive.transfer_add', compact('userwarehouse','warehouse','products'));
    }
}
