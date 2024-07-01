<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel"><?php echo e(translate('Order id')); ?>: <?php echo e($order->code); ?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
</div>

<?php
    $status = $order->orderDetails->first()->delivery_status;
    $refund_request_addon = \App\Models\Addon::where('unique_identifier', 'refund_request')->first();
?>

<div class="modal-body gry-bg px-3 pt-3">
    <div class="py-4">
        <div class="row gutters-5 text-center aiz-steps">
            <div class="col <?php if($status == 'pending'): ?> active <?php else: ?> done <?php endif; ?>">
                <div class="icon">
                    <i class="las la-file-invoice"></i>
                </div>
                <div class="title fs-12"><?php echo e(translate('Order placed')); ?></div>
            </div>
            <div class="col <?php if($status == 'confirmed'): ?> active <?php elseif($status == 'on_delivery' || $status == 'delivered' || $status == 'received'): ?> done <?php endif; ?>">
                <div class="icon">
                    <i class="las la-newspaper"></i>
                </div>
              <div class="title fs-12"><?php echo e(translate('Confirmed')); ?></div>
            </div>
            <div class="col <?php if($status == 'on_delivery'): ?> active <?php elseif($status == 'delivered' || $status == 'received'): ?> done <?php endif; ?>">
                <div class="icon">
                    <i class="las la-truck"></i>
                </div>
                <div class="title fs-12"><?php echo e(translate('On delivery')); ?></div>
            </div>
            <div class="col <?php if($status == 'delivered' || $status == 'received'): ?> done <?php endif; ?>">
                <div class="icon">
                    <i class="las la-clipboard-check"></i>
                </div>
                <div class="title fs-12"><?php echo e(translate('Delivered')); ?></div>
            </div>
            <div class="col <?php if($status == 'received'): ?> done <?php endif; ?>">
                <div class="icon">
                    <i class="las la-check"></i>
                </div>
                <div class="title fs-12"><?php echo e(translate('Received')); ?></div>
            </div>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-header">
          <b class="fs-15"><?php echo e(translate('Order Summary')); ?></b>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <table class="table table-borderless">
                        <tr>
                            <td class="w-50 fw-600"><?php echo e(translate('Order Code')); ?>:</td>
                            <td><?php echo e($order->code); ?></td>
                        </tr>
                        <tr>
                            <td class="w-50 fw-600"><?php echo e(translate('Customer')); ?>:</td>
                            <td><?php echo e(json_decode($order->shipping_address)->name); ?></td>
                        </tr>
                        <tr>
                            <td class="w-50 fw-600"><?php echo e(translate('Email')); ?>:</td>
                            <?php if($order->user_id != null): ?>
                                <td><?php echo e($order->user->email); ?></td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td class="w-50 fw-600"><?php echo e(translate('Shipping address')); ?>:</td>
                            <td><?php echo e(json_decode($order->shipping_address)->address); ?>, <?php echo e(json_decode($order->shipping_address)->city); ?>, <?php echo e(json_decode($order->shipping_address)->postal_code); ?>, <?php echo e(json_decode($order->shipping_address)->country); ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-6">
                    <table class="table table-borderless">
                        <tr>
                            <td class="w-50 fw-600"><?php echo e(translate('Order date')); ?>:</td>
                            <td><?php echo e(date('d-m-Y H:i A', $order->date)); ?></td>
                        </tr>
                        <tr>
                            <td class="w-50 fw-600"><?php echo e(translate('Order status')); ?>:</td>
                            <td><?php echo e(translate(ucfirst(str_replace('_', ' ', $status)))); ?></td>
                        </tr>
                        <tr>
                            <td class="w-50 fw-600"><?php echo e(translate('Total order amount')); ?>:</td>
                            <td><?php echo e(single_price($order->orderDetails->sum('price') + $order->orderDetails->sum('tax'))); ?></td>
                        </tr>
                        <tr>
                            <td class="w-50 fw-600"><?php echo e(translate('Shipping method')); ?>:</td>
                            <td><?php echo e(translate('Flat shipping rate')); ?></td>
                        </tr>
                        <tr>
                            <td class="w-50 fw-600"><?php echo e(translate('Payment method')); ?>:</td>
                            <td><?php echo e(ucfirst(str_replace('_', ' ', $order->payment_type))); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9">
            <div class="card mt-4">
                <div class="card-header">
                  <b class="fs-15"><?php echo e(translate('Order Details')); ?></b>
                </div>
                <div class="card-body pb-0">
                    <table class="table table-borderless table-responsive">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th width="30%"><?php echo e(translate('Product')); ?></th>
                                <th><?php echo e(translate('Variation')); ?></th>
                                <th><?php echo e(translate('Quantity')); ?></th>
                                <th><?php echo e(translate('Delivery Type')); ?></th>
                                <th><?php echo e(translate('Price')); ?></th>
                                <?php if($refund_request_addon != null && $refund_request_addon->activated == 1): ?>
                                    <th><?php echo e(translate('Refund')); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td>
                                        <?php if($orderDetail->product != null): ?>
                                            <a href="<?php echo e(route('product', $orderDetail->product->slug)); ?>" target="_blank"><?php echo e($orderDetail->product->getTranslation('name')); ?></a>
                                        <?php else: ?>
                                            <strong><?php echo e(translate('Product Unavailable')); ?></strong>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php echo e($orderDetail->variation); ?>

                                    </td>
                                    <td>
                                        <?php echo e($orderDetail->quantity); ?>

                                    </td>
                                    <td>
                                        <?php if($orderDetail->shipping_type != null && $orderDetail->shipping_type == 'home_delivery'): ?>
                                            <?php echo e(translate('Home Delivery')); ?>

                                        <?php elseif($orderDetail->shipping_type == 'pickup_point'): ?>
                                            <?php if($orderDetail->pickup_point != null): ?>
                                                <?php echo e($orderDetail->pickup_point->name); ?> (<?php echo e(translate('Pickip Point')); ?>)
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e(single_price($orderDetail->price)); ?></td>
                                    <?php if($refund_request_addon != null && $refund_request_addon->activated == 1): ?>
                                        <?php
                                            $no_of_max_day = \App\Models\BusinessSetting::where('type', 'refund_request_time')->first()->value;
                                            $last_refund_date = $orderDetail->created_at->addDays($no_of_max_day);
                                            $today_date = Carbon\Carbon::now();
                                        ?>
                                        <td>
                                        <?php if(($orderDetail->product != null) && ($orderDetail->product->refundable != 0) && ($today_date <= $last_refund_date && ($orderDetail->delivery_status == 'delivered') &&($orderDetail->refund_request == null) )): ?>
                                                <a href="<?php echo e(route('refund_request_send_page', $orderDetail->id)); ?>" class="btn btn-primary btn-sm"><?php echo e(translate('Send')); ?></a>
                                            <?php elseif($orderDetail->refund_request != null && $orderDetail->refund_request->refund_status == 0): ?>
                                                <b class="text-info"><?php echo e(translate('Pending')); ?></b>
                                            <?php elseif($orderDetail->refund_request != null && $orderDetail->refund_request->refund_status == 2): ?>
                                                <b class="text-success"><?php echo e(translate('Rejected')); ?></b>
                                            <?php elseif($orderDetail->refund_request != null && $orderDetail->refund_request->refund_status == 1): ?>
                                                <b class="text-success"><?php echo e(translate('Approved')); ?></b>
                                            <?php elseif($orderDetail->delivery_status != 'delivered'): ?>
                                                <b><?php echo e(translate('N/A')); ?></b>
                                            <?php else: ?>
                                                <b><?php echo e(translate('Non-refundable')); ?></b>
                                            <?php endif; ?>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card mt-4">
                <div class="card-header">
                  <b class="fs-15"><?php echo e(translate('Order Ammount')); ?></b>
                </div>
                <div class="card-body pb-0">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td class="w-50 fw-600"><?php echo e(translate('Subtotal')); ?></td>
                                <td class="text-right">
                                    <span class="strong-600"><?php echo e(single_price($order->orderDetails->sum('price'))); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-50 fw-600"><?php echo e(translate('Shipping')); ?></td>
                                <td class="text-right">
                                    <span class="text-italic"><?php echo e(single_price($order->orderDetails->sum('shipping_cost'))); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-50 fw-600"><?php echo e(translate('Tax')); ?></td>
                                <td class="text-right">
                                    <span class="text-italic"><?php echo e(single_price($order->orderDetails->sum('tax'))); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-50 fw-600"><?php echo e(translate('Coupon')); ?></td>
                                <td class="text-right">
                                    <span class="text-italic"><?php echo e(single_price($order->coupon_discount)); ?></span>
                                </td>
                            </tr>
							<tr>
			            <th class="w-50 fw-600"><?php echo e(translate('Special Discount')); ?></th>
						<td class="text-right">
                                    <span class="text-italic"><?php echo e(single_price($order->special_discount)); ?></span>
                                </td>
			        </tr>
                            <tr>
                                <td class="w-50 fw-600"><?php echo e(translate('Total')); ?></td>
                                <td class="text-right">
                                    <strong><span><?php echo e(single_price($order->grand_total)); ?></span></strong>
                                </td>
                            </tr>
							 <?php 
                $paid = 0;
                    if(!empty($order->payment_details)){
                      $payment = json_decode($order->payment_details);
                      if(!empty($payment)){
                        $paid = $payment->amount;
                      }
                    }
                ?>
				<tr>
			            <th class="w-50 fw-600"><?php echo e(translate('Paid')); ?></th>
			            <td class="text-right"><?php echo e(single_price($paid)); ?></td>
			        </tr>
					<tr>
			            <th class="w-50 fw-600"><?php echo e(translate('Due')); ?></th>
			            <td class="text-right"><?php echo e(single_price($order->grand_total-$paid)); ?></td>
			        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php if($order->manual_payment && $order->manual_payment_data == null): ?>
                <button onclick="show_make_payment_modal(<?php echo e($order->id); ?>)" class="btn btn-block btn-primary"><?php echo e(translate('Make Payment')); ?></button>
            <?php endif; ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    function show_make_payment_modal(order_id){
        $.post('<?php echo e(route('checkout.make_payment')); ?>', {_token:'<?php echo e(csrf_token()); ?>', order_id : order_id}, function(data){
            $('#payment_modal_body').html(data);
            $('#payment_modal').modal('show');
            $('input[name=order_id]').val(order_id);
        });
    }
</script>
<?php /**PATH C:\xampp82\htdocs\bazarnao-v4-laravel-9\resources\views/frontend/user/order_details_customer.blade.php ENDPATH**/ ?>