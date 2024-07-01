<?php

namespace App\Http\Controllers;

use App\Models\AccCoa;
use Illuminate\Http\Request;

class AccCoaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $data['title'] = 'List of Accounts';
    //     $data['userList'] = AccCoa::distinct()->where('IsActive', 1)->orderBy('HeadName')->get();  

    //     return view('backend.account.treeview', $data);
    // }
    public function index()
    {
        $data['title'] = 'List of Accounts';
        $data['userList'] = AccCoa::distinct()->where('IsActive', 1)->orderBy('HeadName')->get();  

        return view('backend.account.treeview', $data);
    }

    public function selectedform($id)
    {
        $role_result = AccCoa::find($id);
        $csrf_token = csrf_token();
        $html = "";

        if ($role_result) {
            $html .= "
            <form name=\"coaform\" id=\"coaform\" action=\"#\" method=\"post\" enctype=\"multipart/form-data\" onSubmit=\"return validate('nameLabel');\">
                <input type=\"hidden\" name=\"txtPHeadCode\" id=\"txtPHeadCode\" value=\"{$role_result->PHeadCode}\"/>
                <input type=\"hidden\" name=\"cnodeelem\" id=\"cnodeelem\" value=\"\"/>
                <input type=\"hidden\" name=\"clevel\" id=\"clevel\" value=\"\"/>
                <input type=\"hidden\" name=\"csrf_test_name\" id=\"CSRF_TOKEN\" value=\"$csrf_token\"/>
                <input type=\"hidden\" name=\"txtHeadLevel\" id=\"txtHeadLevel\" class=\"form_input\" value=\"{$role_result->HeadLevel}\"/>
                <input type=\"hidden\" name=\"txtHeadType\" id=\"txtHeadType\" class=\"form_input\" value=\"{$role_result->HeadType}\"/>
                <table class=\"coaTable\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">
                    <tr>
                        <td>Head Code</td>
                        <td><input type=\"text\" name=\"txtHeadCode\" id=\"txtHeadCode\" class=\"form_input\" value=\"{$role_result->HeadCode}\" readonly=\"readonly\"/></td>
                    </tr>
                    <tr>
                        <td>Head Name</td>
                        <td>
                            <input type=\"text\" name=\"txtHeadName\" id=\"txtHeadName\" class=\"form_input\" value=\"{$role_result->HeadName}\" onkeyUp=\"checkNameField('txtHeadName','nameLabel')\"/>
                            <input type=\"hidden\" name=\"HeadName\" id=\"HeadName\" class=\"form_input\" value=\"{$role_result->HeadName}\"/>
                            <label id=\"nameLabel\" class=\"errore\"></label>
                        </td>
                    </tr>
                    <tr>
                        <td>Parent Head</td>
                        <td><input type=\"text\" name=\"txtPHead\" id=\"txtPHead\" class=\"form_input\" readonly=\"readonly\" value=\"{$role_result->PHeadName}\"/></td>
                    </tr>";

            if ($role_result->HeadLevel > 3) {
                $html .= "
                    <tr>
                        <td>Note No</td>
                        <td><input type=\"text\" name=\"noteNo\" id=\"noteNo\" class=\"form_input\" value=\"{$role_result->noteNo}\"/></td>
                    </tr>";
            }

            $html .= "
                    <tr>
                        <td>&nbsp;</td>
                        <td id=\"innerCheck\">
                            <input type=\"checkbox\" value=\"1\" name=\"IsActive\" id=\"IsActive\" size=\"28\"";
            if ($role_result->IsActive == 1) {
                $html .= " checked";
            }
            $html .= "/><label for=\"IsActive\">&nbsp;Is Active</label>&nbsp;&nbsp;";

            if ($role_result->HeadLevel > 3 && ($role_result->HeadType == "A" || $role_result->HeadType == "L")) {
                $html .= "
                            <input type=\"checkbox\" name=\"isFixedAssetSch\" value=\"1\" id=\"isFixedAssetSch\" size=\"28\" onchange=\"isFixedAssetSch_change('isFixedAssetSch','{$role_result->HeadType}')\"";
                if ($role_result->isFixedAssetSch == 1) {
                    $html .= " checked";
                }
                $html .= "/><label for=\"isFixedAssetSch\">&nbsp;Is Fixed Asset</label>&nbsp;&nbsp;";
            }

            if ($role_result->HeadLevel > 3) {
                if ($role_result->HeadType == "A") {
                    $html .= "
                            <input type=\"checkbox\" name=\"isStock\" value=\"1\" id=\"isStock\" size=\"28\" onchange=\"isStock_change()\"";
                    if ($role_result->isStock == 1) {
                        $html .= " checked";
                    }
                    $html .= "/><label for=\"isStock\">&nbsp;Is Stock</label>&nbsp;&nbsp;
                            <br/>
                            <input type=\"checkbox\" name=\"isCashNature\" value=\"1\" id=\"isCashNature\" size=\"28\" onchange=\"isCashNature_change()\"";
                    if ($role_result->isCashNature == 1) {
                        $html .= " checked";
                    }
                    $html .= "/><label for=\"isCashNature\">&nbsp;Is Cash Nature</label>&nbsp;&nbsp;
                            <input type=\"checkbox\" name=\"isBankNature\" value=\"1\" id=\"isBankNature\" size=\"28\" onchange=\"isBankNature_change()\"";
                    if ($role_result->isBankNature == 1) {
                        $html .= " checked";
                    }
                    $html .= "/><label for=\"isBankNature\">&nbsp;Is Bank Nature</label>&nbsp;&nbsp;";
                }
                $html .= "
                            <input type=\"checkbox\" name=\"isSubType\" value=\"1\" id=\"isSubType\" size=\"28\" onchange=\"isSubType_change('isSubType')\"";
                if ($role_result->isSubType == 1) {
                    $html .= " checked";
                }
                $html .= "/><label for=\"isSubType\">&nbsp;Is Sub Type</label>&nbsp;&nbsp;";
            }

            $html .= "</tr>";

            if ($role_result->isFixedAssetSch == 1) {
                if ($role_result->HeadLevel > 3 && $role_result->HeadType == "A") {
                    $html .= "
                    <tr id=\"fixedassetCode\">
                        <td>Fixed Asset Code</td>
                        <td><input type=\"text\" name=\"assetCode\" id=\"assetCode\" class=\"form_input\" value=\"{$role_result->assetCode}\"/></td>
                    </tr>
                    <tr id=\"fixedassetRate\">
                        <td>Depreciation Rate % </td>
                        <td><input type=\"text\" name=\"DepreciationRate\" id=\"DepreciationRate\" class=\"form_input\" value=\"{$role_result->DepreciationRate}\"/></td>
                    </tr>";
                } else if ($role_result->HeadLevel > 3 && $role_result->HeadType == "L") {
                    $html .= "
                    <tr id=\"depreciationCode\">
                        <td>Depreciation Code</td>
                        <td><input type=\"text\" name=\"depCode\" id=\"depCode\" class=\"form_input\" value=\"{$role_result->depCode}\"/></td>
                    </tr>";
                }
            } else {
                $html .= "
                    <tr id=\"fixedassetCode\"></tr>
                    <tr id=\"depreciationCode\"></tr>";
            }

            if ($role_result->isSubType == 1) {
                $html .= "
                    <tr id=\"subtypeContent\">";
                $subdata = AccCoa::getSubTypeData();
                if ($subdata) {
                    $html .= "
                        <td>Subtype</td>
                        <td>
                            <select name=\"subtype\" id=\"subtype\" style=\"width: 90%;\" class=\"form-control\">";
                    foreach ($subdata as $sub) {
                        $scheck = $sub->id == $role_result->subType ? 'selected' : '';
                        $html .= "<option value=\"{$sub->id}\" {$scheck}>{$sub->subtypeName}</option>";
                    }
                    $html .= "</select><br/>
                        </td>";
                }
                $html .= "</tr>";
            } else {
                $html .= "<tr id=\"subtypeContent\"></tr>";
            }

            $html .= "
                    <tr>
                        <td>&nbsp;</td>
                        <td>";
            if (auth()->user()->can('show_tree.read')) {
                if ($role_result->HeadLevel >= 2 && $role_result->HeadLevel <= 3) {
                    $html .= "
                            <input type=\"button\" name=\"btnNew\" id=\"btnNew\" class=\"btn btn-success\" value=\"New\" onClick=\"newdata({$role_result->HeadCode})\" />
                            <input type=\"submit\" name=\"btnSave\" id=\"btnSave\" class=\"btn btn-success\" value=\"Save\"/>";
                } else {
                    $html .= "<input type=\"submit\" name=\"btnSave\" id=\"btnSave\" class=\"btn btn-success\" value=\"Save\"/>";
                }
                if ($role_result->HeadLevel == 4 && $role_result->isSubType == 1) {
                    $html .= "<input type=\"submit\" name=\"btnSave\" id=\"btnSave\" class=\"btn btn-success\" value=\"Save & Next\"/>";
                }
            }
            $html .= "</td></tr></table></form>";
        }
        
        echo json_encode($html);
    }

    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $query = AccCoa::where('PHeadName', 'COA')
        ->where('IsActive', 1)
        ->orderBy('HeadName')
        ->get();
        return view('backend.account.treeview', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AccCoa $accCoa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccCoa $accCoa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AccCoa $accCoa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccCoa $accCoa)
    {
        //
    }
}
