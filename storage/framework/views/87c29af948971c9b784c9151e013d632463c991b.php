

<?php $__env->startSection('content'); ?>

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class=" align-items-center">
        <h1 class="h3"></h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-body">
            <form id="prowasales" action="<?php echo e(route('order_status_changer_report.index')); ?>" method="get">
                    <div class="form-group row">

                        <div class="col-md-3">
                            <label>Date Range:</label>
                            <input type="date" name="from_date" class="form-control" value="<?php echo e($from_date); ?>">
                            <div class="clearfix"></div>
                        </div>
                        
                        <div class="col-md-3">
                            <label>Date Range:</label>
                            <input type="date" name="to_date" class="form-control" value="<?php echo e($to_date); ?>">
                            <div class="clearfix"></div>
                        </div>
                        
                        <div class="col-md-3">
                            <label class="col-form-label"><?php echo e(translate('User Name')); ?>:</label>
                            <select id="demo-ease" class="aiz-selectpicker select2" name="user_name" data-live-search="true">
                                <option value="">Select User</option>
                                <?php $__currentLoopData = \App\Models\User::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if($user_name == $user->id): ?> selected <?php endif; ?> value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="clearfix"></div>
                        </div>

                        <div class="col-md-3">
                            <label class="col-form-label"><?php echo e(translate('Order Status')); ?>:</label>
                            <select id="demo-ease" class="aiz-selectpicker select2" name="order_status" data-live-search="true">
                                <option value="">Select Status</option>
                                <?php $__currentLoopData = \App\Models\OrderStatusLog::all()->groupBy('order_status'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status => $orders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if(isset($order_status) && $order_status == $status): ?> selected <?php endif; ?> value="<?php echo e($status); ?>"><?php echo e($status); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="clearfix"></div>
                        </div>
                        
                        
                        
                        
                        <div class="col-lg-3">
                        <label>Filter By Order ID :</label>
                <div class="form-group mb-0">
                    <input type="text" class="form-control" id="search" name="search" <?php if(isset($sort_search)): ?> value="<?php echo e($sort_search); ?>" <?php endif; ?> placeholder="<?php echo e(translate('Type Order Id & hit Enter')); ?>">
                </div>
            </div>

                        <div class="col-md-3 ">
                            <label>&nbsp;</label>
                            <br>
                            <div class="d-flex">
                            <button class="btn btn-sm btn-primary" onclick="submitForm ('<?php echo e(route('order_status_changer_report.index')); ?>')"><?php echo e(translate('Filter')); ?></button>
                            <br>
                            <button class="btn btn-sm btn-info mx-1" onclick="printDiv()" type="button"><?php echo e(translate('Print')); ?></button>
                        
                            <button class="btn btn-sm btn-success" onclick="submitForm('<?php echo e(route('order_status_changer_report_export')); ?>')">Excel</button> 
                        </div>
                        </div>
                    </div>
                </form>

                <div class="printArea">
                <style>
th{text-align:center;}
</style>
                    <h3 style="text-align:center;"><?php echo e(translate('Daily Order Activitis Report')); ?></h3>
                    <table class="table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:5%">SL</th>
                                <th style="width:30%"><?php echo e(translate('User Name')); ?></th>
                                <th style="width:20%"><?php echo e(translate('Date')); ?></th>
                                <th style="width:10%"><?php echo e(translate('Order Id')); ?></th>
                                <th style="width:10%"><?php echo e(translate('Status')); ?></th>
                                <th style="width:10%"><?php echo e(translate('Remarks')); ?></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                       
                            <?php $__currentLoopData = $order_status_logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order_status_log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      
                            <tr>
                                <td><?php echo e(($key+1)); ?></td>
                                <td><?php echo e($order_status_log->user->name ?? 'N/A'); ?></td>
                                <td ><?php echo e($order_status_log->created_at); ?></td>
                                <td ><?php echo e($order_status_log->order_code); ?></td>
                                <td ><?php echo e($order_status_log->order_status); ?></td>
                                <td ><?php echo e($order_status_log->remarks); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                    <td style="text-align:right;" colspan="5"><b>Total</b></td>
                    <td style="text-align:right;"><b></b></td>
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
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\bazarnao-v4-laravel-9\resources\views/backend/reports/order_status_changer_reports.blade.php ENDPATH**/ ?>