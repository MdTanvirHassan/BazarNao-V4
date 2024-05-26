

<?php $__env->startSection('content'); ?>
<?php
    $refund_request_addon = App\Models\Addon::where('unique_identifier', 'refund_request')->first();
 $user_name = auth()->user()->name;
?>
<div class="card">
      <form class="" action="" method="GET">
        <div class="card-header row gutters-5">
            <div class="col-lg-2 ml-auto">
                <select class="form-control aiz-selectpicker" name="customer_type" id="customer_type"> 
                    <option value=""><?php echo e(translate('Filter by Customer Type')); ?></option>
                    <option value="Normal" <?php if($customer_type == 'Normal'): ?> selected <?php endif; ?>><?php echo e(translate('Normal')); ?></option>
                    <option value="Premium" <?php if($customer_type == 'Premium'): ?> selected <?php endif; ?>><?php echo e(translate('Premium')); ?></option>
                    <option value="Corporate" <?php if($customer_type == 'Corporate'): ?> selected <?php endif; ?>><?php echo e(translate('Corporate')); ?></option>
                    <option value="Employee" <?php if($customer_type == 'Employee'): ?> selected <?php endif; ?>><?php echo e(translate('Employee')); ?></option>
                    <option value="Retail" <?php if($customer_type == 'Retail'): ?> selected <?php endif; ?>><?php echo e(translate('Retail')); ?></option>
                    <option value="Website" <?php if($customer_type == 'Website'): ?> selected <?php endif; ?>><?php echo e(translate('Website')); ?></option>
                </select>
            </div>
            <div class="col-lg-2 ml-auto">
                <select class="form-control aiz-selectpicker" name="order_from" id="order_from"> 
                    <option value=""><?php echo e(translate('Filter by Order From')); ?></option>
                    <option value="Web" <?php if($order_from == 'Web'): ?> selected <?php endif; ?>><?php echo e(translate('Web')); ?></option>
                    <option value="App" <?php if($order_from == 'App'): ?> selected <?php endif; ?>><?php echo e(translate('App')); ?></option>
                    <option value="POS" <?php if($order_from == 'POS'): ?> selected <?php endif; ?>><?php echo e(translate('POS')); ?></option>
                </select>
            </div>
            <div class="col-lg-2 ml-auto">
                <select class="form-control aiz-selectpicker" name="delivery_status" id="delivery_status">delivered 
                    <option value=""><?php echo e(translate('Filter by Delivery Status')); ?></option>
                    <option value="pending" <?php if($delivery_status == 'Pending'): ?> selected <?php endif; ?>><?php echo e(translate('Pending')); ?></option>
                    <option value="confirmed" <?php if($delivery_status == 'Confirmed'): ?> selected <?php endif; ?>><?php echo e(translate('Confirmed')); ?></option>
                    <option value="on_delivery" <?php if($delivery_status == 'on_delivery'): ?> selected <?php endif; ?>><?php echo e(translate('On delivery')); ?></option>
                    <option value="delivered" <?php if($delivery_status == 'Delivered'): ?> selected <?php endif; ?>><?php echo e(translate('Delivered')); ?></option>
                    <option value="Cancel" <?php if($delivery_status == 'Cancel'): ?> selected <?php endif; ?>><?php echo e(translate('Canceled')); ?></option>
                </select>
            </div>

            <div class="col-lg-2 ml-auto">
                <select class="form-control aiz-selectpicker" name="payment_status" id="payment_status">
                    <option value=""><?php echo e(translate('Filter by Payment Status')); ?></option>
                    <option value="paid" <?php if($payment_status == 'paid'): ?> selected <?php endif; ?>><?php echo e(translate('Paid')); ?></option>
                    <option value="unpaid" <?php if($payment_status == 'unpaid'): ?> selected <?php endif; ?>><?php echo e(translate('Un-Paid')); ?></option>
                </select>
            </div>
          <div class="col-lg-2">
              <div class="form-group mb-0">
                  <input type="text" class="aiz-date-range form-control" value="<?php echo e($date); ?>" name="date" placeholder="<?php echo e(translate('Filter by date')); ?>" data-format="DD-MM-Y" data-separator=" to " data-advanced-range="true" autocomplete="off">
              </div>
          </div>

          <div class="col-lg-2">
            <div class="form-group mb-0">
              <input type="text" class="form-control" id="search" name="search"<?php if(isset($sort_search)): ?> value="<?php echo e($sort_search); ?>" <?php endif; ?> placeholder="<?php echo e(translate('Type Order code & hit Enter')); ?>">
            </div>
          </div>
          <div class="col-auto">
            <div class="form-group mb-0">
              <button type="submit" class="btn btn-primary"><?php echo e(translate('Filter')); ?></button>
            </div>
          </div>
        </div>
    </form>
    <div class="card-header row gutters-5">
          <div class="col text-center">
            <h5 class="mb-md-0 h6"><?php echo e(translate('All Orders')); ?></h5>
          </div>
    </div>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(translate('Date')); ?></th>
                    <th><?php echo e(translate('Order Code')); ?></th>
                    <th data-breakpoints="md"><?php echo e(translate('Customer ID')); ?></th>
                    <th data-breakpoints="md"><?php echo e(translate('Customer')); ?></th>
                    <th data-breakpoints="md"><?php echo e(translate('Order From')); ?></th>
                    <th data-breakpoints="md"><?php echo e(translate('Amount')); ?></th>
                    <th data-breakpoints="md"><?php echo e(translate('Delivery Status')); ?></th>
                    <th data-breakpoints="md"><?php echo e(translate('Status')); ?></th>
					<th data-breakpoints="lg">warehouse</th>
					<th data-breakpoints="lg">Status Change Date</th>
                    <?php if($refund_request_addon != null && $refund_request_addon->activated == 1): ?>
                        <!-- <th><?php echo e(translate('Refund')); ?></th> -->
                    <?php endif; ?>
                    <th class="text-right" width="18%"><?php echo e(translate('options')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                                $status = $order->delivery_status;
                              
                            ?>
          
             <?php
            if(!empty(App\Models\Customer::where('user_id', $order->user_id)->first()))
            $customer_id = \App\Models\Customer::where('user_id', $order->user_id)->first()->customer_id;
            else
            $customer_id = '';
            ?>
                    <tr>
                      
                        <td><?php echo e(($key+1) + ($orders->currentPage() - 1)*$orders->perPage()); ?></td>
                        <td>
                            <?php echo e(date('d-m-Y',$order->date)); ?>

                        </td>
                        <td>
                            <a href="<?php echo e(route('all_orders.show', encrypt($order->id))); ?>" target="_blank" title="<?php echo e(translate('View')); ?>"><?php echo e($order->code); ?></a>
                        </td>
                        <td>
                            <?php if($order->user != null): ?>
                    <a href="<?php echo e(route('customer_ledger.index')); ?>?customer_id=<?php echo e($order->user_id); ?>" target="_blank" title="<?php echo e(translate('View')); ?>"><?php echo e($customer_id); ?> </a>
                        <?php else: ?>
                        <?php echo e($order->guest_id); ?>

                        <?php endif; ?>
                        </td>
                        <td>
                            <?php if($order->user != null): ?>
                                <?php echo e($order->user->name); ?>

                            <?php else: ?>
                                Guest
                            <?php endif; ?>
                        </td>
                        <td>
                            
                                <?php echo e($order->order_from); ?>

                          
                        </td>
                        <td>
                            <?php echo e(single_price($order->grand_total)); ?>

                        </td>
                        <td>
						<?php echo e(translate($status)); ?>

							
                        </td>
                        <td>
                            <?php if($order->payment_status == 'paid'): ?>
                                <span class="badge badge-inline badge-success"><?php echo e(translate('Paid')); ?></span>
                            <?php else: ?>
                                <span class="badge badge-inline badge-danger"><?php echo e(translate('Unpaid')); ?></span>
                            <?php endif; ?>
                        </td>
                        <td><?php if(!empty($order->warehouse)): ?> <?php echo e(getWearhouseName($order->warehouse)); ?><?php endif; ?></td>
					<td><span style="font-size:11px;color:green">
                       Confirm Date : <?php if(!empty($order->confirm_date)): ?> <?php echo e(date('d/m/Y h:i:s A',strtotime($order->confirm_date))); ?><?php endif; ?></br>
                       Confirmed By: <?php if(!empty($order->confirmed_by)): ?> <?php echo e(getUserNameByuserID($order->confirmed_by)); ?><?php endif; ?> <br>
						On Delivery Date : <?php if(!empty($order->on_delivery_date)): ?> <?php echo e(date('d/m/Y h:i:s A',strtotime($order->on_delivery_date))); ?><?php endif; ?> <br>
                        On delivery By: <?php if(!empty($order->on_delivery_by)): ?> <?php echo e(getUserNameByuserID($order->on_delivery_by)); ?><?php endif; ?> <br>
						Delivered Date : <?php if(!empty($order->delivered_date)): ?> <?php echo e(date('d/m/Y h:i:s A',strtotime($order->delivered_date))); ?><?php endif; ?> <br>
                        Delivered By: <?php if(!empty($order->delivered_by)): ?> <?php echo e(getUserNameByuserID($order->delivered_by)); ?><?php endif; ?> <br>
						Cancel Date : <?php if(!empty($order->cancel_date)): ?> <?php echo e(date('d/m/Y h:i:s A',strtotime($order->cancel_date))); ?><?php endif; ?><br>
                        Cancel Reason: <?php if(!empty($order->reason_of_cancel)): ?> <?php echo e($order->reason_of_cancel); ?><?php endif; ?> <br>
                        Canceled By: <?php if(!empty($order->canceled_by)): ?> <?php echo e(getUserNameByuserID($order->canceled_by)); ?><?php endif; ?>
                    </span>
                    </td>
                        <?php if($refund_request_addon != null && $refund_request_addon->activated == 1): ?>
                            <!-- <td>
                                <?php if(count($order->refund_requests) > 0): ?>
                                    <?php echo e(count($order->refund_requests)); ?> <?php echo e(translate('Refund')); ?>

                                <?php else: ?>
                                    <?php echo e(translate('No Refund')); ?>

                                <?php endif; ?>
                            </td> -->
                        <?php endif; ?>
                        <?php if($user_name == 'Delivery Department' || $user_name == 'Operational Department'): ?>
                        <td class="text-right">
                        <!-- <a href="<?php echo e(route('orders.edit', $order->id)); ?>" class="btn btn-soft-primary btn-icon btn-circle btn-sm" title="<?php echo e(translate('Edit')); ?>">
                                   <i class="las la-edit"></i>
                               </a> -->
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="<?php echo e(route('all_orders.show', encrypt($order->id))); ?>" title="<?php echo e(translate('View')); ?>">
                                <i class="las la-eye"></i>
                            </a>
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="<?php echo e(route('invoice.download', $order->id)); ?>" title="<?php echo e(translate('Download Invoice')); ?>">
                                <i class="las la-download"></i>
                            </a>
                            <!-- <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="<?php echo e(route('orders.destroy', $order->id)); ?>" title="<?php echo e(translate('Delete')); ?>">
                                <i class="las la-trash"></i>
                            </a> -->
                        </td>
                        <?php else: ?>
                        <td class="text-right">
                          <?php if($status == 'pending' || $status == 'confirmed' || $status == 'on_delivery'): ?>
                        <a href="<?php echo e(route('orders.edit', $order->id)); ?>" class="btn btn-soft-primary btn-icon btn-circle btn-sm" title="<?php echo e(translate('Edit')); ?>">
                                <i class="las la-edit"></i>
                               </a>
                               <?php endif; ?>
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="<?php echo e(route('all_orders.show', encrypt($order->id))); ?>" title="<?php echo e(translate('View')); ?>">
                                <i class="las la-eye"></i>
                            </a>
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="<?php echo e(route('invoice.download', $order->id)); ?>" title="<?php echo e(translate('Download Invoice')); ?>">
                                <i class="las la-download"></i>
                            </a>
                            <?php if($status == 'confirmed' && ($order->order_from == 'Web' || $order->order_from == 'App') ): ?>
                         <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="<?php echo e(route('scan-online-order')); ?>" title="<?php echo e(translate('Scan')); ?>">
                                <i class="las la-barcode"></i>
                            </a>
                         <?php endif; ?>
                        </td>
                     <?php endif; ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="aiz-pagination">
            <?php echo e($orders->appends(request()->input())->links()); ?>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('modals.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp8.2.12\htdocs\bazarnao-v4-laravel-9\resources\views/backend/sales/all_orders/index.blade.php ENDPATH**/ ?>