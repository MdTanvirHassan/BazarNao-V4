

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(static_asset('assets/css/style.min.css')); ?>" />
<style>
    .fyear {
        color: #4a0566!important;
        font-size: 18px;
        font-weight: bold;
        padding-top: 20px;
        padding-left: 30px;
    }
    table.coaTable tr td { text-align: left; }
    table.coaTable tr td:nth-child(1) {
        text-align: left;
        width: 30%;
    }
    table.coaTable tr td:nth-child(2) {
        text-align: left;
        width: 70%;
    }
    table.coaTable tr td:nth-child(2) input,
    table.coaTable tr td:nth-child(2) select {
        min-width: 90%;
        max-width: 100%;
        margin-bottom: 12px;
        padding: 6px 10px;
        border: 1px solid #888;
    }
    table.coaTable tr td:nth-child(2) input[type="checkbox"] {
        min-width: 15px;
        max-width: 15px;
        margin-bottom: 16px;
        padding: 0;
        border: 1px solid #888;
        text-align: left;
        display: inline-block;
    }
    table.coaTable tr td:nth-child(2) input[type="button"],
    table.coaTable tr td:nth-child(2) input[type="submit"] {
        min-width: 100px;
        max-width: 150px;
        margin-bottom: 16px;
        padding: 10px 40px;
        border: 1px solid #37a000;
        background-color: #37a000;
        color: white;
        text-align: center;
        display: inline-block;
    }
    .custom-modal-dialog {
        max-width: 76%;
        min-width: 76%;
    }
    table.general_ledger_report_tble td,
    table.general_ledger_report_tble th {
        padding: 6px 10px;
    }
</style>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <?php echo e($title); ?>

                </h4>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div id="jstree1">
                            <ul>
                                <?php
                                $visit = array_fill(0, count($userList), false);
                                (new \App\Models\AccCoa)->dfs("COA", "0", $userList, $visit, 0);
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6" id="newform"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="base_url" value="<?php echo e(url('/')); ?>" name="base_url">

<script>
    function newdata(headCode) {
        $.ajax({
            url: "/accounts/newform/" + headCode,
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log(data.rowdata);
                var headlabel = data.headlabel;
                $('#txtHeadCode').val(data.headcode);
                $('#txtHeadName').val('');
                $('#txtPHead').val(data.rowdata.HeadName);
                $('#txtHeadLevel').val(headlabel);
                $('#btnSave').prop("disabled", false).show();
                $('#btnUpdate').hide();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error getting data from ajax');
            }
        });
    }

    function loadData(id) {
        $.ajax({
            url: "/accounts/selectedform/" + id,
            type: "GET",
            dataType: "json",
            success: function(data) {
                $('#newform').html(data);
                $('#btnSave').hide();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error getting data from ajax');
            }
        });
    }

    function validate(fieldName) {
        var nameVal = $('#txtHeadName').val();
        var lid = fieldName + 'Error';

        if (nameVal === "" || nameVal === null) {
            $('#' + lid).html("Please enter Head Name");
            $('#' + lid).css("color", "red");
            $('#' + lid).show();
            return false;
        } else {
            var nhtm = '';
            var elid = $('#cnodeelem').val();
            var areaid = $('#clevel').val();
            var formData = $('#coaform').serialize();
            var base_url = $("#base_url").val();
            var hid = $('#txtHeadCode').val();
            var phname = $('#txtPHead').val();
            var hname = $('#txtHeadName').val();
            var pid = $('#txtPHeadCode').val();

            $.ajax({
                url: base_url + '/account/accounts/insert_coa',
                type: "POST",
                dataType: "json",
                data: formData,
                success: function(data) {
                    var content = data.info;
                    $('#successResult').html(data.message);
                    $('#successResult').css("color", "green");

                    if (data.type == 'new') {
                        if ($('#' + pid).find('ul').children().length > 0) {
                            nhtm += '<li role="treeitem" aria-selected="true" aria-level="' + areaid + '" aria-labelledby="10101_anchor" id="' + hid + '" class="jstree-node jstree-leaf jstree-last">';
                            nhtm += '<i class="jstree-icon jstree-ocl" role="presentation"></i>';
                            nhtm += '<a class="jstree-anchor jstree-clicked" href="javascript:" tabindex="-1" onclick="loadData(this.id, ' + hid + ')" id="' + hid + '_anchor" style="touch-action: none;">';
                            nhtm += '<i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i>' + hname + '</a></li>';

                            $('#' + pid).find('ul').find('li').last().removeClass('jstree-last');
                            $('#' + pid).find('ul').append(nhtm);
                        } else {
                            nhtm += '<li role="treeitem" aria-selected="true" aria-level="' + areaid + '" aria-labelledby="10101_anchor" id="' + hid + '" class="jstree-node jstree-leaf jstree-last">';
                            nhtm += '<i class="jstree-icon jstree-ocl" role="presentation"></i>';
                            nhtm += '<a class="jstree-anchor jstree-clicked" href="javascript:" tabindex="-1" onclick="loadData(this.id, ' + hid + ')" id="' + hid + '_anchor" style="touch-action: none;">';
                            nhtm += '<i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i>' + hname + '</a></li>';
                            $(nhtm).appendTo('#' + pid);
                        }
                        $('#cnodeelem').val(hid + '_anchor');
                        $('#clevel').val(areaid);
                    } else {
                        nhtm += '<i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom" role="presentation"></i>' + hname;

                        $('#' + elid).html(nhtm);
                        $('#' + elid).removeAttr("onclick");
                        $('#' + elid).attr("onclick", "loadData(this.id, '" + hid + "')");
                    }

                    $('#btnSave').hide();
                    $('#btnUpdate').show();
                    $('#btnDelete').show();
                    $('#btnNew').removeAttr("onclick");
                    $('#btnDelete').removeAttr("onclick");
                    $("#btnNew").attr("onclick", "newdata(" + hid + ")");
                    $("#btnDelete").attr("onclick", "delDataAcc(" + hid + ")");
                    $("#successResult").show().delay(5000).fadeOut();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Please try again');
                }
            });

            $('#' + lid).html("");
            $('#' + lid).hide();
            return true;
        }
    }

    function checkNameField(inputId, labelId) {
        var hname = $('#' + inputId).val();

        if (hname === "" || hname === null) {
            $('#' + labelId).html("Please enter Head Name");
            $('#' + labelId).css("color", "red");
            $('#' + labelId).show();
        } else {
            $('#' + labelId).html("");
            $('#' + labelId).hide();
        }
    }

    function isFixedAssetSch_change(id, type) {
        var ht = type;
        var fxas = id;

        if ($('#' + fxas).is(":checked")) {
            var fixedcode = "";
            var depraciationcode = "";

            if (ht == 'A') {
                fixedcode = "<td>Fixed Asset Code</td><td><input type=\"text\" name=\"assetCode\" id=\"assetCode\" class=\"form_input\" onchange=\"enableDisableField('assetCode','depCode')\" value=\"\"/></td>";
                depraciationcode = "<td>Depreciation Rate %</td><td><input type=\"text\" name=\"DepreciationRate\" id=\"DepreciationRate\" class=\"form_input\" value=\"\"/></td>";
            } else {
                depraciationcode = "<td>Depreciation Code</td><td><input type=\"text\" name=\"depCode\" id=\"depCode\" class=\"form_input\" onchange=\"enableDisableField('depCode','assetCode')\" value=\"\"/></td>";
            }

            $('#fixedassetCode').html(fixedcode);
            $('#depreciationCode').html(depraciationcode);
            $('#fixedassetCode').show();
            $('#depreciationCode').show();
        } else {
            $('#fixedassetCode').html('');
            $('#depreciationCode').html('');
            $('#fixedassetCode').hide();
            $('#depreciationCode').hide();
        }
    }

    function isStock_change() {
        // Handle stock change
    }

    function isCashNature_change() {
        // Handle cash nature change
    }

    function isBankNature_change() {
        // Handle bank nature change
    }

    function isSubType_change(id) {
        if ($('#' + id).is(":checked")) {
            var base_url = $("#base_url").val();
            $.ajax({
                url: base_url + "/account/accounts/getsubtype/",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    if (data === "") {
                        $('#subtypeContent').html('');
                        $('#subtypeContent').hide();
                    } else {
                        $('#subtypeContent').html(data);
                        $('#subtypeContent').show();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error getting data from ajax');
                }
            });
        } else {
            $('#subtypeContent').html('');
            $('#subtypeContent').hide();
        }
    }

//     public function newform($id)
// {
//     // Retrieve data based on $id using Eloquent ORM
//     $newdata = AccCoa::where('HeadCode', $id)->first();

//     if (!$newdata) {
//         // Handle case where no data is found
//         return response()->json(['error' => 'No data found for the given $id'], 404);
//     }

//     // Retrieve maximum HeadCode where pheadcode matches $newdata->HeadCode
//     $newidsinfo = AccCoa::where('pheadcode', $newdata->HeadCode)
//                     ->max('HeadCode');

//     $nid = $newidsinfo ? $newidsinfo : 0;

//     if ($nid > 0) {
//         $HeadCode = $nid + 1;
//     } else {
//         $n = $nid + 1;
//         if ($n / 10 < 1) {
//             $HeadCode = $id . "0" . $n;
//         } else {
//             $HeadCode = $id . $n;
//         }
//     }

//     $info['headcode'] = $HeadCode;
//     $info['rowdata'] = $newdata;
//     $info['headlabel'] = $newdata->HeadLevel + 1;

//     return response()->json($info);
// }
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(static_asset('assets/js/jstree.min.js')); ?>"></script>
<script src="<?php echo e(static_asset('assets/js/account.js')); ?>"  type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\bazarnao-v4-laravel-9\resources\views/backend/account/treeview.blade.php ENDPATH**/ ?>