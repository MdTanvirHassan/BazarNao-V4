<?php

namespace App\Http\Controllers\Accounting;
use App\Models\ChartOfAccount;
use App\Models\AccCoa;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreChartOfAccountRequest;
use App\Http\Requests\UpdateChartOfAccountRequest;

class ChartOfAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
            $all_coa_head = AccCoa::where('IsActive', 1)
            ->orderBy('HeadCode','asc')
            ->get();

        return view('backend.accounting.chartofaccount.list', compact('all_coa_head'));
    }
    public function tree_view()
    {    
        $chart_of_accounts = ChartOfAccount::all();
        return view('backend.accounting.chartofaccount.index',compact('chart_of_accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coa_head = AccCoa::where('PHeadName', 'COA')
                    ->where('IsActive', 1)
                    ->orderBy('HeadName')
                    ->get();
     $sub_coa_head = AccCoa::where('IsActive', 1)
                    // ->groupBy('PHeadName')
                    ->orderBy('PHeadName')
                    ->get();
     $all_coa_head = AccCoa::where('IsActive', 1)
                    ->orderBy('HeadCode','asc')
                    ->get();


        return view('backend.accounting.chartofaccount.create', compact('coa_head','sub_coa_head','all_coa_head'));
    }



    // ****
    public function selectPhead(Request $request)
    {
        $PHeadCode = $request->input('phead');
        $subCoaHeads = AccCoa::where('PHeadCode', $PHeadCode)
            ->where('IsActive', 1)
            ->orderBy('HeadName')
            ->get(['HeadCode', 'HeadName', 'HeadLevel', 'PHeadName', 'PHeadCode']);
        
        return response()->json($subCoaHeads);
    }
    
    

    

    // ****

//     public function selectPhead(Request $request)
// {
//     $phead = $request->input('phead');
//     $coaPhead = $this->allPheadDropdown($phead);

//     $options = '<option value="" class="bolden" data-id="0"><strong>Select COA Head</strong></option>';
//     foreach ($coaPhead as $menu) {
//         $options .= '<option value="' . $menu->HeadCode . '" class="bolden" data-id="' . $menu->HeadLevel . '" data-phead="' . $menu->HeadName . '"><strong>' . $menu->HeadName . '</strong></option>';
//         if (!empty($menu->sub)) {
//             $options .= $this->allSubPhead($menu->sub);
//         }
//     }

//     return response()->json($options); // Return JSON response with options for Parentcategory dropdown
// }

//     private function allPhead($data)
//     {
//         $options = '<option value="" class="bolden" data-id="0"><strong>Select COA Head</strong></option>';
//         foreach ($data as $menu) {
//             $options .= '<option value="' . $menu->HeadCode . '" class="bolden" data-id="' . $menu->HeadLevel . '" data-phead="' . $menu->HeadName . '"><strong>' . $menu->HeadName . '</strong></option>';
//             if (!empty($menu->sub)) {
//                 $options .= $this->allSubPhead($menu->sub);
//             }
//         }
//         return $options;
//     }

//     private function allSubPhead($subMenu)
//     {
//         $options = '';
//         foreach ($subMenu as $menu) {
//             $options .= '<option value="' . $menu->HeadCode . '" data-id="' . $menu->HeadLevel . '" data-phead="' . $menu->HeadName . '">&nbsp;&nbsp;&mdash;' . $menu->HeadName . '</option>';
//             if (!empty($menu->sub)) {
//                 $options .= $this->allSubPhead($menu->sub);
//             }
//         }
//         return $options;
//     }

//     private function allPheadDropdown($pheadname)
//     {
//         $pheadlist = AccCoa::where('PHeadName', $pheadname)
//             ->where('IsActive', 1)
//             ->orderBy('HeadName')
//             ->get();

//         foreach ($pheadlist as $p_cat) {
//             $p_cat->sub = $this->subParents($p_cat->HeadName);
//         }
//         return $pheadlist;
//     }

//     private function subParents($pheadname)
//     {
//         $pheadlist = AccCoa::where('PHeadName', $pheadname)
//             ->where('IsActive', 1)
//             ->orderBy('HeadName')
//             ->get();

//         foreach ($pheadlist as $p_cat) {
//             $p_cat->sub = $this->subParents($p_cat->HeadName);
//         }
//         return $pheadlist;
//     }

    public function insertCoa(Request $request)
    {
        
        $headcode = $request->input('headcode');
        $HeadName = $request->input('headname');
        $PHeadName = $request->input('pheadcode');
        $HeadLevel = $request->input('headlevel');
        $txtHeadType = $request->input('headtype');
        $IsActive = $request->input('IsActive', 0);
        $IsTransaction = $request->input('IsTransaction', 0);
        $IsGL = $request->input('IsGL', 0);
        $createby = Auth::id();
        $createdate = now();

        $postData = [
            'HeadCode' => $headcode,
            'HeadName' => $HeadName,
            'PHeadName' => $PHeadName,
            'HeadLevel' => $HeadLevel,
            'IsActive' => $IsActive,
            'IsTransaction' => $IsTransaction,
            'IsGL' => $IsGL,
            'HeadType' => $txtHeadType,
            'IsBudget' => 0,
            'CreateBy' => $createby,
            'CreateDate' => $createdate,
        ];

        $upinfo = AccCoa::where('HeadCode', $headcode)->first();

        if (empty($upinfo)) {
            AccCoa::create($postData);
        } else {
            $hname = $request->input('headname');
            $updata = ['PHeadName' => $HeadName];

            AccCoa::where('HeadCode', $headcode)->update($postData);
            AccCoa::where('PHeadName', $hname)->update($updata);
        }

        return redirect()->back()->with('message', 'Account created successfully.');
    }

 
public function insertCoa2(Request $request)
{
    $id = $request->input('headcode');
    $HeadName = $request->input('headname');
    $coahead = $request->input('coahead');
    $PHeadName = $request->input('pheadcode');
    $newhead = !empty($PHeadName) ? $PHeadName : $coahead;
    $HeadLevel = $request->input('headlebel');
    $txtHeadType = $request->input('headtype');

    $newidsinfo = DB::table('acc_coa')
        ->select(DB::raw('*, count(HeadCode) as hc'))
        ->where('PHeadName', $PHeadName)
        ->first();

    $nid = $newidsinfo->hc;
    $n = $nid + 1;
    $HeadCode = $id . str_pad($n, 2, "0", STR_PAD_LEFT);

    $IsActive = $request->input('IsActive', 0);
    $IsTransaction = $request->input('IsTransaction', 0);
    $IsGL = $request->input('IsGL', 0);
    $createby = Auth::id();
    $createdate = now();

    $postData = [
        'HeadCode' => $HeadCode,
        'HeadName' => $HeadName,
        'PHeadName' => $PHeadName,
        'HeadLevel' => $HeadLevel,
        'IsActive' => $IsActive,
        'IsTransaction' => $IsTransaction,
        'IsGL' => $IsGL,
        'HeadType' => $txtHeadType,
        'IsBudget' => 0,
        'CreateBy' => $createby,
        'CreateDate' => $createdate,
    ];

    $inserted = DB::table('acc_coa')->insert($postData);
    if ($inserted) {
        return redirect()->back()->with('message', __('save_successfully'));
    } else {
        return redirect()->back()->with('exception', __('please_try_again'));
    }
}




    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChartOfAccountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChartOfAccountRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChartOfAccount  $chartOfAccount
     * @return \Illuminate\Http\Response
     */
    public function show(ChartOfAccount $chartOfAccount)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChartOfAccount  $chartOfAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(ChartOfAccount $chartOfAccount)
    {
        return view('backend.accounting.chartofaccount.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChartOfAccountRequest  $request
     * @param  \App\Models\ChartOfAccount  $chartOfAccount
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChartOfAccountRequest $request, ChartOfAccount $chartOfAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChartOfAccount  $chartOfAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChartOfAccount $chartOfAccount)
    {
        //
    }
}
