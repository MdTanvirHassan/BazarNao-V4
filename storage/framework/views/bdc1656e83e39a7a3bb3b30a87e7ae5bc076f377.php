

<?php $__env->startSection('content'); ?>

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class=" align-items-center">
        <h1 class="h3"><?php echo e(translate('Details Sales Report Year & Month Base')); ?></h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <form id="prowasales" action="<?php echo e(route('detailed_sales_report.index')); ?>" method="get">
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label>Date Range :</label>
                            <div class="col-md-12">
                                <input type="date" name="start_date" class="form-control" value="<?php echo e($start_date); ?>">
                            </div>
                            <div class="col-md-12">
                                <input type="date" name="end_date" class="form-control" value="<?php echo e($end_date); ?>">
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="col-md-3">
                            <label class="col-form-label"><?php echo e(translate('Sort by Warehouse')); ?> :</label>
                            <select id="warehouse" class="aiz-selectpicker select2" name="warehouse" data-live-search="true">
                                <option value=''>All</option>
                                <?php $__currentLoopData = \App\Models\Wearhouse::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $warehous): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($warehouse ==$warehous->id) echo 'selected'; ?> value="<?php echo e($warehous->id); ?>"><?php echo e($warehous->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        
                        <div class="col-md-3">
                            <label class="col-form-label"><?php echo e(__('Sort by Sales Executive')); ?>:</label>
                            <select id="demo-ease" class="aiz-selectpicker select2" name="user_id" data-live-search="true">
                                <option value=''><?php echo e(__('All')); ?></option>
                                <?php $__currentLoopData = DB::table('staff')->join('users','users.id','staff.user_id')->where('role_id',9)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if($pro_sort_by == $staff->user_id): ?> selected <?php endif; ?> value="<?php echo e($staff->user_id); ?>"><?php echo e($staff->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        
                        
                        <div class="col-md-3">
                            <label>&nbsp;</label>
                            <br>
                            <div class="d-flex">
                                <button class="btn btn-sm btn-primary" onclick="submitForm('<?php echo e(route('detailed_sales_report.index')); ?>')"><?php echo e(translate('Filter')); ?></button>
                                <button class="btn btn-sm btn-info mx-2" onclick="printDiv()" type="button"><?php echo e(translate('Print')); ?></button>
                               
                            </div>
                        </div>
                    </div>
                </form>

                <div class="printArea">
                    <style>
                        th { text-align: center; }
                    </style>
                    <h3 style="text-align: center;"><?php echo e(translate('Details Sales Report Year & Month Base')); ?></h3>
                   
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo e(translate('Sales Type')); ?></th>
                                <th><?php echo e(translate('Warehouse')); ?></th>
                                <th><?php echo e(translate('Executive')); ?></th>
                                <th><?php echo e(translate('Customer Qty')); ?></th>
                                <th><?php echo e(translate('Qty Of Orders')); ?></th>
                                <th><?php echo e(translate('Total Sales Value')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $total_customer_qty=0; 
                                $total_qty=0; 
                                $grand_total=0; 
                            ?>
                            <?php $__currentLoopData = $salesTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $saleType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(translate($saleType->customer_type)); ?></td>
                                <td><?php echo e($saleType->warehouse_name); ?></td>
                                <td><?php echo e($saleType->executive_name); ?></td> 
                                <td class="text-right"><?php echo e($saleType->total_customer_type !==''? $saleType->total_customer_type : 'Undefine'); ?></td>
                                <td class="text-right"><?php echo e($saleType->total_quantity); ?></td>
                                <td class="text-right"><?php echo e(single_price($saleType->total_price)); ?></td>
                            </tr>

                            <?php
                                $total_customer_qty += $saleType->total_customer_type;
                                $total_qty += $saleType->total_quantity;
                                $grand_total += $saleType->total_price;
                            ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td colspan="3" class="text-right"><b>Total:</b></td>
                               
                                    <td class="text-right"><b><?php echo e($total_customer_qty); ?></b></td>
                                    <td class="text-right"><b><?php echo e($total_qty); ?></b></td>                          
                                    <td class="text-right"><b><?php echo e(single_price($grand_total, 2)); ?></b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function submitForm(url){
        $('#prowasales').attr('action',url);
        $('#prowasales').submit();
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\bazarnao-v4-laravel-9\resources\views/backend/reports/detailed_sales_report.blade.php ENDPATH**/ ?>