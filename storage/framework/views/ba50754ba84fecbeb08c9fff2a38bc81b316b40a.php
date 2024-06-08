
<?php $__env->startSection('content'); ?>
<div class="card">
    <form id="culexpo" class="" action="" method="GET">
        <div class="card-header row gutters-5">
            
            <div class="col-lg-3">
                <div class="form-group mb-0">
                    <label>Date Range :</label>
                    <input type="date" name="start_date" class="form-control" value="<?php echo e($start_date); ?>">
                    <input type="date" name="end_date" class="form-control" value="<?php echo e($end_date); ?>">
                </div>
            </div>
            <div class="col-md-3">
                <label>Filter By Wearehouse :</label>
                <select class="form-control" name="warehouse" id="warehouse">
                <option value="">Select One</option>
                <?php $__currentLoopData = \App\Models\Wearhouse::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehousees): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option  value="<?php echo e($warehousees->id); ?>" <?php if($wearhouse == $warehousees->id): ?> selected <?php endif; ?> ><?php echo e($warehousees->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-3">
                <label>Filter By Employee :</label>
                <select class="form-control" name="user_id" id="user_id">
                <option value="">Select One</option>
                <?php $__currentLoopData = \App\Models\Staff::whereBetween('role_id',[9, 14])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $executive): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>      
                <option value="<?php echo e($executive->user_id); ?>" <?php if($user_id == $executive->user_id): ?> selected <?php endif; ?> ><?php echo e($executive->user->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="col-md-3">
                <div class="form-group mb-0">
                    <label>Order Code :</label>
                    <input type="text" class="form-control" id="search" name="search" <?php if(isset($sort_search)): ?> value="<?php echo e($sort_search); ?>" <?php endif; ?> placeholder="<?php echo e(translate('Type Order code & hit Enter')); ?>">
                </div>
            </div>
            <div class="col-auto">
                <div class="form-group mb-0">
                    <button class="btn btn-sm btn-primary" onclick="submitForm ('<?php echo e(route('salesReport.index')); ?>')"><?php echo e(translate('Filter')); ?></button>
                    <button class="btn btn-sm btn-info" onclick="printDiv()" type="button"><?php echo e(translate('Print')); ?></button>
                    <button class="btn btn-sm btn-success" onclick="submitForm('<?php echo e(route('sales_ledger_export')); ?>')">Excel</button>
                </div>
            </div>
        </div>
    </form>
    <div class="card-body printArea">
        <style>
            th {
                text-align: center;
            }
        </style>
        <h3 style="text-align:center;"><?php echo e(translate('Sales Report')); ?></h3>
        <table class="table-sm table-striped table-hover table-bordered" style="width:100%">
        <!-- <table class="table-striped table-hover table-bordered" style="width:100%"> -->
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Delivery Date</th>
                    <th>Order Code</th>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Executive Name</th>
                    <th>Customer Type</th>
                    <th>Phone</th>
                    <th>Area</th>
                    <th>Amount</th>
                    <th>Paid</th>
                    <th>Due</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $total = 0;
                $totalpaid = 0;
                $totaldue = 0;
                ?>

                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                if(!empty(\App\Models\Customer::where('user_id', $order->user_id)->first()))
                $customer_id = \App\Models\Customer::where('user_id', $order->user_id)->first();
                else
                $customer_id = '';

                if(!empty($customer_id)){
                    if(!empty($customer_id->staff_id)){
                        $executive = \App\Models\User::where('id',$customer_id->staff_id)->first();
                    }
                 }
                
                 $payment_details = json_decode($order->payment_details);
                if(!empty($payment_details) && !empty($payment_details->status) && ($payment_details->status=='VALID' || $payment_details->status=='Success' )){
                $totalpaid+=$payment_details->amount;
                $paid =$payment_details->amount;
                $totaldue+=($order->grand_total-$paid);
                $due = $order->grand_total-$paid;
                } else if(!empty($payment_details) && !empty($payment_details->transactionStatus) && ($payment_details->transactionStatus=='Completed')){
                $totalpaid+=$payment_details->amount;
                $paid =$payment_details->amount;
                $totaldue+=($order->grand_total-$paid);
                $due = $order->grand_total-$paid;
                }else{
                $totaldue+=$order->grand_total;
                $due = $order->grand_total;
                $paid = 0;
                }
                $total+=$order->grand_total;
                $i++;
                ?>
                <tr>
                    <td class="text-center">
                        <?php echo e(($i)); ?>

                    </td>
                    <td class="text-center">
                        <?php echo e(date("Y-m-d", strtotime($order->delivered_date))); ?>

                    </td>
                    <td style="text-align:center;">
                        <a href="<?php echo e(route('all_orders.show', encrypt($order->id))); ?>" target="_blank" title="<?php echo e(translate('View')); ?>"><?php echo e($order->code); ?></a>
                    </td>
                    <td style="text-align:center;">
                        <?php if($order->user != null): ?>
                        <a href="<?php echo e(route('customer_ledger_details.index')); ?>?cust_id=<?php echo e($order->user_id); ?>&start_date=<?php echo e($start_date); ?>&end_date=<?php echo e($end_date); ?>" target="_blank" title="<?php echo e(translate('View')); ?>"><?php echo e($order->user_id); ?> </a>
                        <?php else: ?>
                        <?php echo e($order->guest_id); ?>

                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <?php if($order->user != null): ?>
                        <?php echo e($order->user->name); ?>

                        <?php else: ?>
                        Guest
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                    <?php if(!empty($executive)): ?>
                        <?php echo e($executive->name); ?>

                        <?php else: ?>
                        No Define
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <?php if($order->user != null): ?>
                        <?php echo e($order->customer_type); ?>

                        <?php else: ?>
                        Guest
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <?php if($order->user != null): ?>
                        <?php echo e($order->user->phone); ?>

                        <?php else: ?>
                        Guest
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                       <?php if($order->user != null): ?>
                       <?php echo e(get_customer_area_name($order->user_id)); ?>

                       <?php else: ?>
                        <?php 
                            $shipping = json_decode($order->shipping_address);
                            if(!empty($shipping->area)){
                                echo $shipping->area;
                            }else{
                                echo 'N/A';
                            }
                        ?>
                      <?php endif; ?>
                    </td>
                    <td style="text-align:right;">
                        <?php echo e(single_price($order->grand_total)); ?>

                    </td>
                    <td style="text-align:right;">
                        <?php echo e(single_price($paid)); ?>

                    </td>
                    <td style="text-align:right;">
                        <?php echo e(single_price($due)); ?>

                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="text-align:right;" colspan="9"><b>Total</b></td>
                    <td style="text-align:right;"><b><?php echo e(single_price($total)); ?></b></td>
                    <td style="text-align:right;"><b><?php echo e(single_price($totalpaid)); ?></b></td>
                    <td style="text-align:right;"><b><?php echo e(single_price($totaldue)); ?></b></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    function submitForm(url) {
        $('#culexpo').attr('action', url);
        $('#culexpo').submit();
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\bazarnao-v4-laravel-9\resources\views/backend/reports/sales.blade.php ENDPATH**/ ?>