<?php if(auth()->user()->user_type == 'admin'): ?>

<?php elseif(auth()->user()->user_type == 'staff'): ?>

<?php endif; ?>
<style>
    tr,
    th,
    td {
        padding: 3px !important;
    }

    th {
        background: #AE3C86;
        color: #fff;
        font-weight: bold
    }

    li.nav-item {
        width: 100%;
    }

    .navbar-nav {
        width: 100%;
    }
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/2.4.85/css/materialdesignicons.css" rel="stylesheet" />

<?php $__env->startSection('content'); ?>
<div class="row gutters-10">
    <div class="col-lg-12">

        <div id="accordion">
        <?php if(auth()->user()->user_type == 'staff'): ?>
        <?php echo $__env->make('backend.staff_panel.purchase_manager.purchase_manager_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
            <div class="card border-bottom-0">
                <div class="card-body">
                    <form id="culexpo" action="<?php echo e(route('product_wise_purchase_report.index')); ?>" method="GET">
                        <div class="form-group row">
                        <div class="col-md-2">
                        <label>Start Date :</label>
                            <input type="date" name="start_date" id="start_date" class="form-control" value="<?php echo e($start_date); ?>">
                            
                    </div>
                    <div class="col-md-2">
                        <label>End Date :</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" value="<?php echo e($end_date); ?>">
                            
                    </div>
                    <?php if(auth()->user()->user_type == 'admin'): ?>
                    <div class="col-md-2">
    						<label for="name"><?php echo e(translate('Wearhouse')); ?> <span class="text-danger">*</span></label>
    						<select name="wearhouse_id" id="wearhouse_id" class="form-control" required>
                                <option value=""><?php echo e(translate('Select Wearhouse')); ?></option>
                                <?php $__currentLoopData = $wearhouses = \App\Models\Wearhouse::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($wearhouse_id == $row->id) echo 'selected';?> value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
    					</div>
                    <?php elseif(auth()->user()->user_type == 'staff'): ?>
                         <div class="col-md-2">
    						<label for="name"><?php echo e(translate('Wearhouse')); ?> <span class="text-danger">*</span></label>
    						<select name="wearhouse_id" id="wearhouse_id" class="form-control" required>
                                <option value=""><?php echo e(translate('Select Wearhouse')); ?></option>
                                <?php $__currentLoopData = $wearhouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($wearhouse_id == $row->id) echo 'selected';?> value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
    					</div>
                        <?php endif; ?>
                     

                            <div class="col-md-3">
                                <label for="name"><?php echo e(translate('Sort by Product')); ?>:</label>
                                <select id="demo-ease" class="aiz-selectpicker select2" name="product_id[]" data-live-search="true" multiple>
                                    <option value=''><?php echo e(translate('All')); ?></option>
                                    <?php $__currentLoopData = DB::table('products')->select('id', 'name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if(in_array($prod->id, (array)$pro_sort_by)): ?> selected <?php endif; ?> value="<?php echo e($prod->id); ?>"><?php echo e($prod->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>


                            <div class="col-md-3">
                                <label for="name"><?php echo e(translate('Sort by Supplier')); ?> :</label>
                                <select name="supplier_id" id="supplier_id" class="form-control"  data-live-search="true">
                                    <option value=""><?php echo e(translate('All')); ?></option>
                                    <?php $__currentLoopData = DB::table('suppliers')->select('supplier_id','name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e($sup_sort_by == $prod->supplier_id ? 'selected' : ''); ?> value="<?php echo e($prod->supplier_id); ?>"><?php echo e($prod->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>


                            <div class="col-md-4 mt-4">
                                <button class="btn btn-secondary" type="button" onclick="clearFilters()">Clear Filters</button>
                                <button class="btn btn-primary" onclick="SubmitForm('<?php echo e(route('product_wise_purchase_report.index')); ?>')"><?php echo e(translate('Filter')); ?></button>
                                <button class="btn btn-success btn-info" onclick="printDiv()" type="button"><?php echo e(translate('Print')); ?></button>
                                <button class="btn btn-danger" onclick="submitForm('<?php echo e(route('product_wise_purchase_export')); ?>')">Excel</button>
                            </div>
                        </div>
                    </form>
                <div class="card-body printArea">
                <style>
                    th {
                        text-align: center;
                    }
                </style>
                    <table class="table aiz-table mb-0" style="width:100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo e(translate('Purchase No')); ?></th>
                                <th><?php echo e(translate('Product Name')); ?></th>
                                <th><?php echo e(translate('Supplier')); ?></th>
                                <th><?php echo e(translate('QTY')); ?></th>
                                <th><?php echo e(translate('Price')); ?></th>
                                <th><?php echo e(translate('Amount')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $totalamount = 0; 
                            $totalqty = 0; 
                            $totalprice = 0; 
                            ?>
                            <?php $__currentLoopData = $product_wise_purchase_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php 
                            $totalamount += $order->qty*$order->price;
                            $totalprice += $order->price;
                            $totalqty  += $order->qty;
                            ?>
                            <tr>
                                <td>
                                    <?php echo e(($key+1)); ?>

                                </td>

                                <td>
                                    <?php echo e($order->purchase_no); ?>

                                </td>
                                <td>
                                    <?php echo e($order->name); ?>

                                </td>
                                <td>
                                    <?php echo e($order->suppliername); ?>

                                </td>

                                <td style="text-align:right;">
                                    <?php echo e($order->qty); ?>

                                </td>
                              
                                <td style="text-align:right;">
                                <?php echo e($order->price); ?>

                                </td>
                                <td style="text-align:right;">
                                <?php echo e($order->qty*$order->price); ?>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr style="font-weight:bold;text-align:right;">
                                <td colspan="4">Total</td>
                                <td><?php echo e($totalqty); ?></td>
                                <td><?php echo e($totalprice); ?></td>
                                <td><?php echo e($totalamount); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>

    function clearFilters() {
 
        // Reset start date input
        document.getElementById('start_date').value = '';

        // Reset end date input
        document.getElementById('end_date').value = '';
        document.getElementById('wearhouse_id').value = '';
        document.getElementById('supplier_id').value = '';
        
        // Clear selected options in the product select
        $('#demo-ease').val(null).trigger('change');

    }


    function submitForm(url){
        $('#culexpo').attr('action',url);
        $('#culexpo').submit();
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.staff', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\bazarnao-v4-laravel-9\resources\views/backend/staff_panel/purchase_executive/product_wise_purchase_report.blade.php ENDPATH**/ ?>