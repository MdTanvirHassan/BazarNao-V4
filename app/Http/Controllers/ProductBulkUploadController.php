<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product_stock_close; //added by alauddin
use App\Category;
use App\Brand;
use App\User;
use Auth;
use App\ProductsImport;
use App\ProductsExport;
use PDF;
use Excel;

class ProductBulkUploadController extends Controller
{
    public function index()
    {
        if (Auth::user()->user_type == 'seller') {
            return view('frontend.user.seller.product_bulk_upload.index');
        }
        elseif (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff') {
            return view('backend.product.bulk_upload.index');
        }
    }

    public function export(){
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function pdf_download_category()
    {
        $categories = Category::all();

        return PDF::loadView('backend.downloads.category',[
            'categories' => $categories,
        ], [], [])->download('category.pdf');
    }

    public function pdf_download_brand()
    {
        $brands = Brand::all();

        return PDF::loadView('backend.downloads.brand',[
            'brands' => $brands,
        ], [], [])->download('brands.pdf');
    }

    public function pdf_download_seller()
    {
        $users = User::where('user_type','seller')->get();

        return PDF::loadView('backend.downloads.user',[
            'users' => $users,
        ], [], [])->download('user.pdf');

    }

    public function bulk_upload(Request $request)
    {
        if($request->hasFile('bulk_file')){
            Excel::import(new ProductsImport, request()->file('bulk_file'));
        }
        flash(translate('Products imported successfully'))->success();
        return back();
    }


	function stock_upload(){
        return view('backend.product.bulk_upload.opening_stock_upload');
    }

    function stock_upload_action(Request $request){

        $upload=$request->file('bulk_file');
        $filePath=$upload->getRealPath();

        //open and read
        $file=fopen($filePath,'r');
        $header=fgetcsv($file);
        
        $escapedHeader=[];

        //validation
        foreach($header as $key=>$value){
            $l_header=strtolower($value);
            $escapedItem=preg_replace('/[^a-z]/','',$l_header);
            array_push($escapedHeader,$escapedItem);
           
        }

        //Looping through other column
        
        while($columns=fgetcsv($file)){
           
            if($columns[0]==''){
                continue;
            }
            //trim data
            foreach($columns as $key=>&$value){
                //$value=preg_replace('/\D/','',$value);
            }

            $data=array_combine($escapedHeader,$columns);

            //setting type
            foreach($data as $key=>&$value){
                $value=($key=="stock")?(float)$value:$value;   
            }

            //Table Update

           


            $stock=$data['stock'];

            $stock_amount=(float)$data['amount'];

            if( $stock_amount==0){
                continue;
            }

            $product_id=(int)$data['id'];


            $month="2023-02";
            $ware_house_id=2;

            

            $product_info=array();

           

           

            $closing_info= Product_stock_close::firstOrNew(['wh_id'=>$ware_house_id,'product_id'=>$product_id,'month'=>$month]);
            $closing_info->product_id=$product_id;
            $closing_info->wh_id=$ware_house_id;


            if(!empty($stock)){
                $closing_info->closing_stock_qty=$stock;
            }else{
                $closing_info->closing_stock_qty=0;
            }

            if(!empty($stock_amount)){
                $closing_info->closing_stock_amount=$stock_amount;
            }else{
                $closing_info->closing_stock_qty=0;
            }

            
            $closing_info->month=$month;
            $closing_info->save();

           

        }
        flash(translate('Products imported successfully'))->success();
        return back();
    }




}
