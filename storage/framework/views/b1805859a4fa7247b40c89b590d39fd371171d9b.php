

<?php $__env->startSection('content'); ?>
    <?php
        $status = $order->orderDetails->first()->delivery_status;
    ?>
    <section class="pt-5 mb-1">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <div class="row aiz-steps arrow-divider">
                        <div class="col done">
                            <div class="text-center text-success">
                                <i class="la-3x mb-2 las la-shopping-cart"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block text-capitalize"><?php echo e(translate('1. My Cart')); ?></h3>
                            </div>
                        </div>
                      
                        <div class="col done">
                            <div class="text-center text-success">
                                <i class="la-3x mb-2 las la-credit-card"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block text-capitalize"><?php echo e(translate('2. Shipping & Payment')); ?></h3>
                            </div>
                        </div>
                        <div class="col active">
                            <div class="text-center text-primary">
                                <i class="la-3x mb-2 las la-check-circle"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block text-capitalize"><?php echo e(translate('3. Confirmation')); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-1">
        <div class="container text-left">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <div class="card shadow-sm border-0 rounded">
                        <div class="card-body">
                            <div class="text-center py-1 mb-4">
                            <img class="mb-2" style="width:25%" src="<?php echo e(static_asset('assets/img/happy.png')); ?>">
                            <br>
                                <i class="la la-check-circle la-3x text-success mb-3"></i>
                                <h1 class="h3 mb-3 fw-600"><?php echo e(translate('Thank You for Your Order!')); ?></h1>
                                <h2 class="h5"><?php echo e(translate('Order Code:')); ?> <span class="fw-700 text-primary"><?php echo e($order->code); ?></span></h2>
                                <p class="opacity-70 font-italic"><?php echo e(translate('A copy or your order summary has been sent to')); ?> <?php echo e(json_decode($order->shipping_address)->email); ?></p>
                            </div>
                            <div class="mb-4">
                                <h5 class="fw-600 mb-3 fs-17 pb-2"><?php echo e(translate('Order Summary')); ?></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table">
                                            <tr>
                                                <td class="w-50 fw-600"><?php echo e(translate('Order Code')); ?>:</td>
                                                <td><?php echo e($order->code); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="w-50 fw-600"><?php echo e(translate('Name')); ?>:</td>
                                                <td><?php echo e(json_decode($order->shipping_address)->name); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="w-50 fw-600"><?php echo e(translate('Email')); ?>:</td>
                                                <td><?php echo e(json_decode($order->shipping_address)->email); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="w-50 fw-600"><?php echo e(translate('Shipping address')); ?>:</td>
                                                <td><?php echo e(json_decode($order->shipping_address)->address); ?>, <?php echo e(json_decode($order->shipping_address)->city); ?>, <?php echo e(json_decode($order->shipping_address)->country); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table">
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
                                                <td class="w-50 fw-600"><?php echo e(translate('Shipping')); ?>:</td>
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
                            <div>
                                <h5 class="fw-600 mb-3 fs-17 pb-2"><?php echo e(translate('Order Details')); ?></h5>
                                <div>
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th width="30%"><?php echo e(translate('Product')); ?></th>
                                                <th><?php echo e(translate('Variation')); ?></th>
                                                <th><?php echo e(translate('Quantity')); ?></th>
                                                <th><?php echo e(translate('Delivery Type')); ?></th>
                                                <th class="text-right"><?php echo e(translate('Price')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($key+1); ?></td>
                                                    <td>
                                                        <?php if($orderDetail->product != null): ?>
                                                            <a href="<?php echo e(route('product', $orderDetail->product->slug)); ?>" target="_blank" class="text-reset">
                                                                <?php echo e($orderDetail->product->getTranslation('name')); ?>

                                                            </a>
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
                                                                <?php echo e($orderDetail->pickup_point->getTranslation('name')); ?> (<?php echo e(translate('Pickip Point')); ?>)
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="text-right"><?php echo e(single_price($orderDetail->price)); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-xl-5 col-md-6 ml-auto mr-0">
                                        <table class="table ">
                                            <tbody>
                                                <tr>
                                                    <th><?php echo e(translate('Subtotal')); ?></th>
                                                    <td class="text-right">
                                                        <span class="fw-600"><?php echo e(single_price($order->orderDetails->sum('price'))); ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th><?php echo e(translate('Shipping')); ?></th>
                                                    <td class="text-right">
                                                        <span class="font-italic"><?php echo e(single_price($order->orderDetails->sum('shipping_cost'))); ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th><?php echo e(translate('Tax')); ?></th>
                                                    <td class="text-right">
                                                        <span class="font-italic"><?php echo e(single_price($order->orderDetails->sum('tax'))); ?></span>
                                                    </td>
                                                </tr>
                                                < <tr>
                                                    <th><?php echo e(translate('Coupon Discount')); ?></th>
                                                    <td class="text-right">
                                                        <span class="font-italic"><?php echo e(single_price($order->coupon_discount)); ?></span>
                                                    </td>
                                                </tr> 
                                                <?php 
                                                $discount = \App\Models\Customer_ledger::where('type', 'Discount')->where('order_id',$order->id)->sum('credit');
                                                ?>
                                                <tr>
                                                    <th><?php echo e(translate('Special Discount')); ?></th>
                                                    <td class="text-right">
                                                        <span class="font-italic"><?php echo e(single_price($order->special_discount)); ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th><strong class="text-right"><?php echo e(translate('Total')); ?></strong></th>
                                                    <td class="text-right">
                                                        <strong><span><?php echo e(single_price($order->grand_total)); ?></span></strong>
                                                    </td>
                                                </tr>
												<tr>
        				<th>
        					<strong class="text-right"><?php echo e(translate('Paid')); ?> :</strong>
        				</th>
        				<th class="text-right">
                <?php 
                $paid = 0;
                    if(!empty($order->payment_details)){
                      $payment = json_decode($order->payment_details);
                      if(!empty($payment)){
                        $paid = $payment->amount;
                      }
                    }
                ?>
        					<?php echo e(single_price($paid)); ?>

                  <input type="hidden" id="total_paid" value="<?php echo e($paid); ?>">
        				</th>
        			</tr>
              <tr>
        				<th>
        					<strong class="text-right"><?php echo e(translate('Due')); ?> :</strong>
        				</th>
        				<th class="text-right">
                <?php echo e(single_price($order->grand_total-$paid)); ?><input type="hidden" id="total_due" value="<?php echo e($order->grand_total-$paid); ?>">
        				</th>
        			</tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\bazarnao-v4-laravel-9\resources\views/frontend/order_confirmed.blade.php ENDPATH**/ ?>