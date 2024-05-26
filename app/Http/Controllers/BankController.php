<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;


class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $banks = Bank::get();
        // dd($banks);
        $banks = Bank::where('status', 1)->paginate(15);
        return view('backend.setup_configurations.banks.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.setup_configurations.banks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bank = new Bank;

        $bank->bank_name = $request->bank_name;
        $bank->bank_code = $request->bank_code;
        $bank->account_no = $request->account_no;
        $bank->branch = $request->branch;

        $bank->save();

        flash(translate('Bank has been inserted successfully'))->success();

        return redirect()->route('bank.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $banks = Bank::findOrFail($id);
        return view('backend.setup_configurations.banks.edit', compact('banks'));
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
        $bank = Bank::findOrFail($id);

        $bank->bank_name = $request->bank_name;
        $bank->bank_code = $request->bank_code;
        $bank->account_no = $request->account_no;
        $bank->branch = $request->branch;

        $bank->save();


        flash(translate('Bank has been updated successfully'))->success();
        return redirect()->route('bank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank = Bank::findOrFail($id);
        $bank->delete();

        flash(translate('Bank has been deleted successfully'))->success();
        return redirect()->route('bank.index');
    }

}
