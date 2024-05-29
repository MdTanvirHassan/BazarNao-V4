<div class="card border-0 shadow-sm rounded">
    <div class="card-header">
        <h3 class="fs-16 fw-600 mb-0"><?php echo e(translate('Summary')); ?></h3>
        <div class="text-right">
            <span class="badge badge-inline badge-primary"><?php echo e(count(Session::get('cart')->where('owner_id', Session::get('owner_id')))); ?> <?php echo e(translate('Items')); ?></span>
        </div>
    </div>

    <div class="card-body">
        <?php if(\App\Models\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Models\Addon::where('unique_identifier', 'club_point')->first()->activated): ?>
            <?php
                $total_point = 0;
            ?>
            <?php $__currentLoopData = Session::get('cart')->where('owner_id', Session::get('owner_id')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $product = \App\Models\Product::find($cartItem['id']);
                    $total_point += $product->earn_point*$cartItem['quantity'];
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="rounded px-2 mb-2 bg-soft-primary border-soft-primary border">
                <?php echo e(translate("Total Club point")); ?>:
                <span class="fw-700 float-right"><?php echo e($total_point); ?></span>
            </div>
        <?php endif; ?>
        <table class="table">
            <thead>
                <tr>
                    <th class="product-name"><?php echo e(translate('Product')); ?></th>
                    <th class="product-total text-right"><?php echo e(translate('Total')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $subtotal = 0;
                    $tax = 0;
                    $shipping = 0;
           // dd(Session::get('cart')->where('owner_id', Session::get('owner_id')));
                ?>
                <?php $__currentLoopData = Session::get('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $product = \App\Models\Product::find($cartItem['id']);
                        $subtotal += $cartItem['price']*$cartItem['quantity'];
                        $tax += $cartItem['tax']*$cartItem['quantity'];
                        $shipping += $cartItem['shipping'];

                        $product_name_with_choice = $product->getTranslation('name');
                        if ($cartItem['variant'] != null) {
                            $product_name_with_choice = $product->getTranslation('name').' - '.$cartItem['variant'];
                        }
                    ?>
                    <tr class="cart_item">
                        <td class="product-name">
                            <?php echo e($product_name_with_choice); ?>

                            <strong class="product-quantity">× <?php echo e($cartItem['quantity']); ?></strong>
                        </td>
                        <td class="product-total text-right">
                            <span class="pl-4"><?php echo e(single_price($cartItem['price']*$cartItem['quantity'])); ?></span>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php
            $shipping_skip_total = \App\Models\BusinessSetting::where('type', 'flat_rate_shipping_cost_total')->first()->value;
    if($shipping_skip_total > $subtotal){
        $shipping = \App\Models\BusinessSetting::where('type', 'flat_rate_shipping_cost')->first()->value;
    }else{
            $shipping = 0;
            }
           // echo $shipping;exit;
            ?>
            </tbody>
        </table>

        <table class="table">

            <tfoot>
                <tr class="cart-subtotal">
                    <th><?php echo e(translate('Subtotal')); ?></th>
                    <td class="text-right">
                        <span class="fw-600"><?php echo e(single_price($subtotal)); ?></span>
                    </td>
                </tr>

                <tr class="cart-tax">
                    <th><?php echo e(translate('Tax')); ?></th>
                    <td class="text-right">
                        <span class="font-italic"><?php echo e(single_price($tax)); ?></span>
                    </td>
                </tr>

                <tr class="cart-shipping">
                    <th><?php echo e(translate('Total Shipping')); ?></th>
                    <td class="text-right">
                        <span class="font-italic"><?php echo e(single_price($shipping)); ?></span>
                    </td>
                </tr>

                <?php if(Session::has('coupon_discount')): ?>
                    <tr class="cart-discount">
                        <th><?php echo e(translate('Coupon Discount')); ?></th>
                        <td class="text-right">
                            <span class="font-italic"><?php echo e(single_price(Session::get('coupon_discount'))); ?></span>
                        </td>
                    </tr>
                <?php endif; ?>
                <?php if(Session::has('offer_discount')): ?>
                    <tr class="cart-discount">
                        <th><?php echo e(translate('Offer Discount')); ?></th>
                        <td class="text-right">
                            <span class="font-italic"><?php echo e(single_price(Session::get('offer_discount'))); ?></span>
                        </td>
                    </tr>
                <?php endif; ?>

                <?php
                    $total = $subtotal+$tax+$shipping;
                    if(Session::has('coupon_discount')){
                        $total -= Session::get('coupon_discount');
                    }
                ?>
                <?php
                    if(Session::has('offer_discount')){
                        $total -= Session::get('offer_discount');
                    }
                ?>

                <tr class="cart-total">
                    <th><span class="strong-600"><?php echo e(translate('Total')); ?></span></th>
                    <td class="text-right">
                        <strong><span><?php echo e(single_price($total)); ?></span></strong>
                    </td>
                </tr>
            </tfoot>
        </table>

        <?php if(Auth::check() && \App\Models\BusinessSetting::where('type', 'coupon_system')->first()->value == 1): ?>
            <?php if(Session::has('coupon_discount')): ?>
                <div class="mt-3">
                    <form class="" action="<?php echo e(route('checkout.remove_coupon_code')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="input-group">
                            <div class="form-control"><?php if(Session::has('coupon_id')): ?> <?php echo e(\App\Models\Coupon::find(Session::get('coupon_id'))->code); ?> <?php endif; ?> </div>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary"><?php echo e(translate('Change Coupon')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php else: ?>
                <div class="mt-3">
                    <form class="" action="<?php echo e(route('checkout.apply_coupon_code')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="input-group">
                            <input type="text" class="form-control" name="code" placeholder="<?php echo e(translate('Have coupon code? Enter here')); ?>" required>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary"><?php echo e(translate('Apply')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
        <?php endif; ?>

    </div>
</div>
<?php /**PATH D:\xampp\htdocs\bazarnao-v4-laravel-9\resources\views/frontend/partials/cart_summary.blade.php ENDPATH**/ ?>