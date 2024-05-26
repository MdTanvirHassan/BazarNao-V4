
<?php $__env->startSection('content'); ?>
<div class="card">
    <form id="culexpo" class="" action="<?php echo e(route('PlatformSalesReport.index')); ?>" method="GET">
        <div class="card-header row gutters-5">
            <div class="col-lg-4">
                <div class="form-group mb-0">
                    <label>Date Range:</label>
                    <div class="input-group">
                        <input type="date" name="start_date" class="form-control" value="<?php echo e($start_date); ?>">
                        <input type="date" name="end_date" class="form-control" value="<?php echo e($end_date); ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-0">
                    <label>Filter By Warehouse:</label>
                    <select class="form-control" name="warehouse" id="warehouse">
                        <option value="">Select One</option>
                        
                        <?php if(in_array(Auth::user()->id, [9, 135, 137, 138])): ?>
                            <?php $__currentLoopData = \App\Models\Wearhouse::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehousees): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($warehousees->id); ?>" <?php if($wearhouse == $warehousees->id): ?> selected <?php endif; ?>><?php echo e($warehousees->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>{
                           
                            <?php $__currentLoopData = $warehousearray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouseId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $warehouse = \App\Models\Wearhouse::find($warehouseId);
                                ?>
                                <?php if($warehouse): ?>
                                    <option value="<?php echo e($warehouse->id); ?>" <?php echo e($warehouse->id == $warehouseId ? 'selected': ''); ?>><?php echo e($warehouse->name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                        }
                        <?php endif; ?>
                    </select>
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group mb-0">
                    <label for="order_from">Filter By Order From:</label>
                    <select class="form-control" name="order_from" id="order_from">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = \App\Models\Order::groupBy('order_from')->pluck('order_from'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderFrom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($orderFrom); ?>" <?php if($order_from == $orderFrom): ?> selected <?php endif; ?>><?php echo e($orderFrom); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                
            </div>
            <div class="col-md-3">
                <div class="form-group mb-0">
                    <label>Search Order:</label>
                    <input type="text" class="form-control" id="search" name="search" <?php if(isset($sort_search)): ?> value="<?php echo e($sort_search); ?>" <?php endif; ?> placeholder="<?php echo e(translate('Type Order code & hit Enter')); ?>">
                </div>
            </div>
            <div class="col-auto">
                <div class="form-group mb-0 mt-2">
                    <button class="btn btn-sm btn-primary" onclick="submitForm ('<?php echo e(route('PlatformSalesReport.index')); ?>')"><?php echo e(translate('Filter')); ?></button>
                    <button class="btn btn-sm btn-info" type="button" onclick="printDiv()"><?php echo e(translate('Print')); ?></button>
                    
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
        <h3 style="text-align:center;"><?php echo e(translate('Platform Sales Report')); ?></h3>
        <table class="table table-sm table-hover table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Date</th>
                    <th>Order Code</th>
                    <th>Warehouse</th>
                    <th>Order From</th>
                    <th>Delivery Status</th>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Customer Type</th>
                    <th>Phone</th>
                    <th>Area</th>
                    <th>Amount</th>
                    
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
                

                $warehouse = \App\Models\Wearhouse::where('id',$order->warehouse)->first();
                ?>
                
                <?php if (! ($order->grand_total == 0 && $paid == 0 && $due == 0)): ?>
                <?php
                $i++;
                ?>
                <tr>
                    <td style="text-align:center;">
                        <?php echo e(($i)); ?>

                    </td>
                    <td style="text-align:center;">
                        <?php echo e(date('Y-m-d',$order->date)); ?>

                    </td>
                    <td style="text-align:center;">
                        <a href="<?php echo e(route('all_orders.show', encrypt($order->id))); ?>" target="_blank" title="<?php echo e(translate('View')); ?>"><?php echo e($order->code); ?></a>
                    </td>

                    <td style="text-align:center;">
                        <?php echo e(!empty($warehouse->name) ? $warehouse->name : 'N/A'); ?>

                    </td>
                    <td style="text-align:center;">
                        <?php echo e(!empty($order->order_from) ? $order->order_from : 'Undefined'); ?>

                    </td>
                    <td style="text-align:center;">
                        <?php echo e(!empty($order->delivery_status) ? $order->delivery_status : 'undefined'); ?>

                    </td>
                    <td style="text-align:center;">
                        <?php if($order->user != null): ?>
                        <a href="<?php echo e(route('customer_ledger_details.index')); ?>?cust_id=<?php echo e($order->user_id); ?>&start_date=<?php echo e($start_date); ?>&end_date=<?php echo e($end_date); ?>" target="_blank" title="<?php echo e(translate('View')); ?>"><?php echo e($order->user_id); ?> </a>
                        <?php else: ?>
                        <?php echo e($order->guest_id); ?>

                        <?php endif; ?>
                    </td>
                    <td style="text-align:center;">
                        <?php if($order->user != null): ?>
                        <?php echo e($order->user->name); ?>

                        <?php else: ?>
                        Guest
                        <?php endif; ?>
                    </td>
                    
                    <td style="text-align:center;">
                        <?php if($order->user != null): ?>
                        <?php echo e($order->customer_type); ?>

                        <?php else: ?>
                        Guest
                        <?php endif; ?>
                    </td>
                    <td style="text-align:center;">
                        <?php if($order->user != null): ?>
                        <?php echo e($order->user->phone); ?>

                        <?php else: ?>
                        Guest
                        <?php endif; ?>
                    </td>
                    <td style="text-align:center;">
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
                    
                    
                </tr>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="text-align:right;" colspan="11"><b>Total</b></td>
                    <td style="text-align:right;"><b><?php echo e(single_price($total)); ?></b></td>
                    
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
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\bazarnao-v4-laravel-9\resources\views/backend/reports/platform_sales_report.blade.php ENDPATH**/ ?>