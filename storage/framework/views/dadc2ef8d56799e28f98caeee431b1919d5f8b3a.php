
<?php $__env->startSection('content'); ?>
<div class="card">
    <form id="culexpo" action="<?php echo e(route('product_transfer_summery.index')); ?>" method="GET">
        <div class="card-header row gutters-5">
            <!-- Date Range Filter -->
            <div class="col-lg-4">
                <div class="form-group mb-0">
                    <label>Date Range:</label>
                    <div class="input-group">
                        <input type="date" name="start_date" class="form-control" value="<?php echo e($start_date); ?>">
                        <input type="date" name="end_date" class="form-control" value="<?php echo e($end_date); ?>">
                    </div>
                </div>
            </div>
            <!-- From Warehouse Filter -->
            <div class="col-md-2">
                <div class="form-group mb-0">
                    <label>Filter By From Warehouse:</label>
                    <select class="form-control" name="warehouse" id="warehouse">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = \App\Models\Wearhouse::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($warehouse->id); ?>" <?php if($wearhouse == $warehouse->id): ?> selected <?php endif; ?>><?php echo e($warehouse->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                      
                    </select>
                </div>
            </div>
            <!-- To Warehouse Filter -->
            <div class="col-md-2">
                <div class="form-group mb-0">
                    <label>Filter By To Warehouse:</label>
                    <select class="form-control" name="to_warehouse" id="to_warehouse">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = \App\Models\Wearhouse::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($warehouse->id); ?>" <?php if($to_wearhouse == $warehouse->id): ?> selected <?php endif; ?>><?php echo e($warehouse->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                      
                    </select>
                </div>
            </div>
            <!-- Product Filter -->
            <div class="col-md-4">
                <div class="form-group mb-0">
                    <label>Filter By Product:</label>
                    <select class="form-control aiz-selectpicker select2" name="product_id" id="product_id" data-live-search="true">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = \App\Models\Product::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($product->id); ?>" <?php if($product_id == $product->id): ?> selected <?php endif; ?>><?php echo e($product->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                      
                    </select>
                </div>
            </div>
            <!-- Filter and Print Buttons -->
            <div class="col-auto">
                <div class="form-group mb-0 mt-2">
                    <button class="btn btn-sm btn-primary" onclick="submitForm('<?php echo e(route('product_transfer_summery.index')); ?>')"><?php echo e(translate('Filter')); ?></button>
                    <button class="btn btn-sm btn-info" type="button" onclick="printDiv()"><?php echo e(translate('Print')); ?></button>
                </div>
            </div>
        </div>
    </form>
    
    <!-- Report Table -->
    <div class="card-body printArea">
        <style>
            th {
                text-align: center;
            }
        </style>
        <h3 style="text-align:center;"><?php echo e(translate('Product Transfer Summery Report')); ?></h3>
        <table class="table aiz-table mb-0 printArea">
            <thead>
                <tr>
                    <th>#</th>
                    <th data-breakpoints="md"><?php echo e(translate('From warehouse')); ?></th>
                    <th data-breakpoints="md"><?php echo e(translate('To warehouse')); ?></th>
                    <th data-breakpoints="md"><?php echo e(translate('Product Type Qty')); ?></th>
                    <th data-breakpoints="md"><?php echo e(translate('Total Amount')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $transfers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $transfer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center"><?php echo e($key + 1); ?></td>
                        <td class="text-center"><?php echo e(getWearhouseName($transfer->from_wearhouse_id)); ?></td>
                        <td class="text-center"><?php echo e(getWearhouseName($transfer->to_wearhouse_id)); ?></td>
                        <td class="text-center">
                            <a href="<?php echo e(route('transfer_list_details.index', [
                                'product_id' => $transfer->product_id,
                                'from_warehouse_id' => $transfer->from_wearhouse_id,
                                'to_warehouse_id' => $transfer->to_wearhouse_id,
                                'start_date' => $start_date,
                                'end_date' => $end_date
                            ])); ?>" target="_blank">
                                <?php echo e($transfer->total_qty); ?>

                            </a>
                        </td>
                        
                        <td class="text-right"><?php echo e(single_price($transfer->total_amount)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="text-align:right;" colspan="3"><b>Total</b></td>
                    <td style="text-align:right;"  class="text-center"><b><?php echo e($totalQty); ?></b></td>
                    <td style="text-align:right;"><b><?php echo e(single_price($totalAmount)); ?></b></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('modals.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\bazarnao-v4-laravel-9\resources\views/backend/reports/product_transfer_summery.blade.php ENDPATH**/ ?>