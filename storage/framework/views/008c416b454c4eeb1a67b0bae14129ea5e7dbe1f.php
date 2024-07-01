

<?php $__env->startSection('content'); ?>
<section class="pt-5 mb-4">
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
                  
                    <div class="col active">
                        <div class="text-center text-primary">
                            <i class="la-3x mb-2 las la-credit-card"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block text-capitalize"><?php echo e(translate('2. Shipping & Payment')); ?></h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center">
                            <i class="la-3x mb-2 opacity-50 las la-check-circle"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50 text-capitalize"><?php echo e(translate('3. Confirmation')); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mb-4">
    <div class="container text-left">
        <div class="row">
            <div class="col-lg-8">
                <form action="<?php echo e(route('payment.checkout')); ?>" class="form-default" role="form" method="POST" id="checkout-form">
                    <?php echo csrf_field(); ?>

                    <?php if(Auth::check()): ?>
                    <div class="shadow-sm bg-white p-4 rounded mb-4">
                        <div class="row gutters-5">
                            <?php $__currentLoopData = Auth::user()->addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6 mb-3">
                                <label class="aiz-megabox d-block bg-white mb-0">
                                    <input type="radio" name="address_id" value="<?php echo e($address->id); ?>" <?php if($address->set_default): ?>
                                    checked
                                    <?php endif; ?> required>
                                    <span class="d-flex p-3 aiz-megabox-elem">
                                        <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                        <span class="flex-grow-1 pl-3 text-left">
                                            <div>
                                                <span class="opacity-60"><?php echo e(translate('Address')); ?>:</span>
                                                <span class="fw-600 ml-2"><?php echo e($address->address); ?></span>
                                            </div>
                                            <div>
                                                <span class="opacity-60"><?php echo e(translate('Postal Code')); ?>:</span>
                                                <span class="fw-600 ml-2"><?php echo e($address->postal_code); ?></span>
                                            </div>
                                            <div>
                                                <span class="opacity-60"><?php echo e(translate('City')); ?>:</span>
                                                <span class="fw-600 ml-2"><?php echo e($address->city); ?></span>
                                            </div>
                                            <div>
                                                <span class="opacity-60"><?php echo e(translate('Country')); ?>:</span>
                                                <span class="fw-600 ml-2"><?php echo e($address->country); ?></span>
                                            </div>
                                            <div>
                                                <span class="opacity-60"><?php echo e(translate('Phone')); ?>:</span>
                                                <span class="fw-600 ml-2"><?php echo e($address->phone); ?></span>
                                            </div>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <input type="hidden" name="checkout_type" id="checkout_type" value="logged">
                            <div class="col-md-6 mx-auto mb-3">
                                <div class="border p-3 rounded mb-3 c-pointer text-center bg-white h-100 d-flex flex-column justify-content-center" onclick="add_new_address()">
                                    <i class="las la-plus la-2x mb-3"></i>
                                    <div class="alpha-7"><?php echo e(translate('Add New Address')); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="shadow-sm bg-white p-4 rounded mb-4">
                        <div class="form-group">
                            <label class="control-label"><?php echo e(translate('Name')); ?> <span style="color:red">*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="<?php echo e(translate('Name')); ?>" id="guest_name" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label"><?php echo e(translate('Email')); ?></label>
                            <input type="text" class="form-control" name="email" placeholder="<?php echo e(translate('Email')); ?>" id="guest_email">
                        </div>

                        <div class="form-group">
                            <label class="control-label"><?php echo e(translate('Address')); ?> <span style="color:red">*</span></label>
                            <input type="text" class="form-control" name="address" placeholder="<?php echo e(translate('Address')); ?>" id="guest_address" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><?php echo e(translate('Select your country')); ?></label>
                                    <select class="form-control aiz-selectpicker" data-live-search="true" name="country">
                                        <?php $__currentLoopData = \App\Models\Country::where('status', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country->name); ?>"><?php echo e($country->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <?php if(\App\Models\BusinessSetting::where('type', 'shipping_type')->first()->value == 'area_wise_shipping'): ?>
                                    <label class="control-label"><?php echo e(translate('City')); ?></label>
                                    <select class="form-control aiz-selectpicker" data-live-search="true" name="city" required>
                                        <?php $__currentLoopData = \App\Models\City::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($city->name); ?>"><?php echo e($city->getTranslation('name')); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php else: ?>
                                    <label class="control-label"><?php echo e(translate('City')); ?></label>
                                    <input type="text" class="form-control" placeholder="<?php echo e(translate('City')); ?>" name="city" required>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label"><?php echo e(translate('Postal code')); ?></label>
                                    <input type="text" class="form-control" placeholder="<?php echo e(translate('Postal code')); ?>" name="postal_code" required>
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label"><?php echo e(translate('Phone')); ?> <span style="color:red">*</span></label>
                                    <input type="number" lang="en" min="0" class="form-control" placeholder="<?php echo e(translate('Phone')); ?>" name="phone" id="guest_phone" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><?php echo e(translate('Select your Area')); ?></label>
                                    <select class="form-control aiz-selectpicker" data-live-search="true" name="area">
                                        <?php $__currentLoopData = \App\Models\Area::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country->name); ?>"><?php echo e($country->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                            </div>
                        </div>
                        
                        <input type="hidden" name="checkout_type" id="checkout_type" value="guest">
                    </div>
                    <?php endif; ?>
                    <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"><?php echo e(translate('Write Order Instruction')); ?></label>
                                    <input type="text" class="form-control" placeholder="<?php echo e(translate('Order Instruction')); ?>" name="note" id="note">
                                </div>

                            </div>
                    <div class="card shadow-sm border-0 rounded">
                        <div class="card-header p-3">
                            <h3 class="fs-16 fw-600 mb-0">
                                <?php echo e(translate('Select a payment option')); ?>

                            </h3>
                        </div>
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col-xxl-8 col-xl-10 mx-auto">
                                    <div class="row gutters-10">
                                        <?php if(\App\Models\BusinessSetting::where('type', 'sslcommerz_payment')->first()->value == 1): ?>
                                        <div class="col-6 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="sslcommerz" class="online_payment" type="radio" name="payment_option" checked>
                                                <span class="d-block p-3 aiz-megabox-elem">
                                                    <img src="<?php echo e(static_asset('assets/img/cards/sslcommerz.png')); ?>" class="img-fluid mb-2">
                                                    <span class="d-block text-center">
                                                        <span class="d-block fw-600 fs-15"><?php echo e(translate('sslcommerz')); ?></span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        <?php endif; ?>
                                       
                                        <?php if(\App\Models\BusinessSetting::where('type', 'nagad')->first()->value == 1): ?>
                                        <div class="col-6 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="nagad" class="online_payment" type="radio" name="payment_option" checked>
                                                <span class="d-block p-3 aiz-megabox-elem">
                                                    <img src="<?php echo e(static_asset('assets/img/cards/nagad.png')); ?>" class="img-fluid mb-2">
                                                    <span class="d-block text-center">
                                                        <span class="d-block fw-600 fs-15"><?php echo e(translate('Nagad')); ?></span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        <?php endif; ?>
                                        <?php if(\App\Models\BusinessSetting::where('type', 'bkash')->first()->value == 1): ?>
                                    		
                                        <div class="col-6 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="bkash" class="online_payment" type="radio" name="payment_option" checked>
                                                <span class="d-block p-3 aiz-megabox-elem">
                                                    <img src="<?php echo e(static_asset('assets/img/cards/bkash.png')); ?>" class="img-fluid mb-2">
                                                    <span class="d-block text-center">
                                                        <span class="d-block fw-600 fs-15"><?php echo e(translate('Bkash')); ?></span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        <?php endif; ?>
                                        <?php if(\App\Models\Addon::where('unique_identifier', 'african_pg')->first() != null && \App\Models\Addon::where('unique_identifier', 'african_pg')->first()->activated): ?>
                                        <?php if(\App\Models\BusinessSetting::where('type', 'mpesa')->first()->value == 1): ?>
                                        <div class="col-6 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="mpesa" class="online_payment" type="radio" name="payment_option" checked>
                                                <span class="d-block p-3 aiz-megabox-elem">
                                                    <img src="<?php echo e(static_asset('assets/img/cards/mpesa.png')); ?>" class="img-fluid mb-2">
                                                    <span class="d-block text-center">
                                                        <span class="d-block fw-600 fs-15"><?php echo e(translate('mpesa')); ?></span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        <?php endif; ?>
                                        <?php if(\App\Models\BusinessSetting::where('type', 'flutterwave')->first()->value == 1): ?>
                                        <div class="col-6 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="flutterwave" class="online_payment" type="radio" name="payment_option" checked>
                                                <span class="d-block p-3 aiz-megabox-elem">
                                                    <img src="<?php echo e(static_asset('assets/img/cards/flutterwave.png')); ?>" class="img-fluid mb-2">
                                                    <span class="d-block text-center">
                                                        <span class="d-block fw-600 fs-15"><?php echo e(translate('flutterwave')); ?></span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        <?php endif; ?>
                                        <?php if(\App\Models\BusinessSetting::where('type', 'payfast')->first()->value == 1): ?>
                                        <div class="col-6 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="payfast" class="online_payment" type="radio" name="payment_option" checked>
                                                <span class="d-block p-3 aiz-megabox-elem">
                                                    <img src="<?php echo e(static_asset('assets/img/cards/payfast.png')); ?>" class="img-fluid mb-2">
                                                    <span class="d-block text-center">
                                                        <span class="d-block fw-600 fs-15"><?php echo e(translate('payfast')); ?></span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if(\App\Models\Addon::where('unique_identifier', 'paytm')->first() != null && \App\Models\Addon::where('unique_identifier', 'paytm')->first()->activated): ?>
                                        <div class="col-6 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="paytm" class="online_payment" type="radio" name="payment_option" checked>
                                                <span class="d-block p-3 aiz-megabox-elem">
                                                    <img src="<?php echo e(static_asset('assets/img/cards/paytm.jpg')); ?>" class="img-fluid mb-2">
                                                    <span class="d-block text-center">
                                                        <span class="d-block fw-600 fs-15"><?php echo e(translate('Paytm')); ?></span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        <?php endif; ?>
                                        <?php if(\App\Models\BusinessSetting::where('type', 'cash_payment')->first()->value == 1): ?>
                                        
                                        <div class="col-6 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="cash_on_delivery" class="online_payment" type="radio" name="payment_option" checked>
                                                <span class="d-block p-3 aiz-megabox-elem">
                                                    <img src="<?php echo e(static_asset('assets/img/cards/cod.png')); ?>" class="img-fluid mb-2">
                                                    <span class="d-block text-center">
                                                        <span class="d-block fw-600 fs-15"><?php echo e(translate('Cash on Delivery')); ?></span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        
                                        <?php endif; ?>
                                        <?php if(Auth::check()): ?>
                                        <?php if(\App\Models\Addon::where('unique_identifier', 'offline_payment')->first() != null && \App\Models\Addon::where('unique_identifier', 'offline_payment')->first()->activated): ?>
                                        <?php $__currentLoopData = \App\Models\ManualPaymentMethod::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-6 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="<?php echo e($method->heading); ?>" type="radio" name="payment_option" onchange="toggleManualPaymentData(<?php echo e($method->id); ?>)" data-id="<?php echo e($method->id); ?>" checked>
                                                <span class="d-block p-3 aiz-megabox-elem">
                                                    <img src="<?php echo e(uploaded_asset($method->photo)); ?>" class="img-fluid mb-2">
                                                    <span class="d-block text-center">
                                                        <span class="d-block fw-600 fs-15"><?php echo e($method->heading); ?></span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php $__currentLoopData = \App\Models\ManualPaymentMethod::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div id="manual_payment_info_<?php echo e($method->id); ?>" class="d-none">
                                            <?php echo $method->description ?>
                                            <?php if($method->bank_info != null): ?>
                                            <ul>
                                                <?php $__currentLoopData = json_decode($method->bank_info); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e(translate('Bank Name')); ?> - <?php echo e($info->bank_name); ?>, <?php echo e(translate('Account Name')); ?> - <?php echo e($info->account_name); ?>, <?php echo e(translate('Account Number')); ?> - <?php echo e($info->account_number); ?>, <?php echo e(translate('Routing Number')); ?> - <?php echo e($info->routing_number); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                            <?php endif; ?>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <?php if(\App\Models\Addon::where('unique_identifier', 'offline_payment')->first() != null && \App\Models\Addon::where('unique_identifier', 'offline_payment')->first()->activated): ?>
                            <div class="bg-white border mb-3 p-3 rounded text-left d-none">
                                <div id="manual_payment_description">

                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if(Auth::check() && \App\Models\BusinessSetting::where('type', 'wallet_system')->first()->value == 1): ?>
                            <div class="separator mb-3">
                                <span class="bg-white px-3">
                                    <span class="opacity-60"><?php echo e(translate('Or')); ?></span>
                                </span>
                            </div>
                            <div class="text-center py-4">
                                <div class="h6 mb-3">
                                    <span class="opacity-80"><?php echo e(translate('Your wallet balance :')); ?></span>
                                    <span class="fw-600"><?php echo e(single_price(Auth::user()->balance)); ?></span>
                                </div>
                                <?php if(Auth::check() && Auth::user()->user_type=='customer'): ?>
                                <?php
                                $cust =\App\Models\Customer::where('user_id', Auth::user()->id)->get();
                                if(count($cust)>0){
                                $credit_limit = $cust[0]->credit_limit;
                                }else{
                                $credit_limit = 0;
                                }
                                ?>
                                <?php if((Auth::user()->balance+$credit_limit) <= 0): ?> <button type="button" class="btn btn-secondary" disabled><?php echo e(translate('Insufficient balance')); ?></button>
                                    <?php else: ?>
                                    <button type="button" onclick="use_wallet()" class="btn btn-primary fw-600"><?php echo e(translate('Pay with wallet')); ?></button>
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <?php if((Auth::user()->balance) <= 0): ?> <button type="button" class="btn btn-secondary" disabled><?php echo e(translate('Insufficient balance')); ?></button>
                                        <?php else: ?>
                                        <button type="button" onclick="use_wallet()" class="btn btn-primary fw-600"><?php echo e(translate('Pay with wallet')); ?></button>
                                        <?php endif; ?>
                                        <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="pt-3">
                        <!-- <label class="aiz-checkbox">
                            <input type="checkbox" required id="agree_checkbox">
                            <span class="aiz-square-check"></span>
                            <span><?php echo e(translate('I agree to the')); ?></span>
                        </label> -->
                        <a href="<?php echo e(route('terms')); ?>"><?php echo e(translate('terms and conditions')); ?></a>,
                        <a href="<?php echo e(route('returnpolicy')); ?>"><?php echo e(translate('return policy')); ?></a> &
                        <a href="<?php echo e(route('privacypolicy')); ?>"><?php echo e(translate('privacy policy')); ?></a>
                    </div>

                    <div class="row align-items-center pt-3">
                        <div class="col-6">
                            <a href="<?php echo e(route('home')); ?>" class="link link--style-3">
                                <i class="las la-arrow-left"></i>
                                <?php echo e(translate('Return to shop')); ?>

                            </a>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" onclick="submitOrder(this)" class="btn btn-primary fw-600"><?php echo e(translate('Complete Order')); ?></button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0">
                <?php echo $__env->make('frontend.partials.cart_summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
<div class="modal fade" id="new-address-modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel"><?php echo e(translate('New Address')); ?></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-default" role="form" action="<?php echo e(route('addresses.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="p-0">
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(translate('Address')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <textarea class="form-control textarea-autogrow mb-3" placeholder="<?php echo e(translate('Your Address')); ?>" rows="1" name="address" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(translate('Country')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <select class="form-control mb-3 aiz-selectpicker" data-live-search="true" name="country" required>
                                    <?php $__currentLoopData = \App\Models\Country::where('status', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->name); ?>"><?php echo e($country->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <?php if(\App\Models\BusinessSetting::where('type', 'shipping_type')->first()->value == 'area_wise_shipping'): ?>
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(translate('City')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <select class="form-control mb-3 aiz-selectpicker" data-live-search="true" name="city" required>
                                    <?php $__currentLoopData = \App\Models\City::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($city->name); ?>"><?php echo e($city->getTranslation('name')); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(translate('City')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control mb-3" placeholder="<?php echo e(translate('Your City')); ?>" name="city" value="" required>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-md-2">
                                <!-- <label><?php echo e(translate('Postal code')); ?></label> -->
                                <label><?php echo e(translate('Select your Area')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <!-- <input type="text" class="form-control mb-3" placeholder="<?php echo e(translate('Your Postal Code')); ?>" name="postal_code" value="" required> -->
                                <select class="form-control aiz-selectpicker" data-live-search="true" name="area">
                                        <?php $__currentLoopData = \App\Models\Area::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country->name); ?>"><?php echo e($country->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(translate('Phone')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <input type="number" class="form-control mb-3" placeholder="<?php echo e(translate('+880')); ?>" name="phone" value="" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><?php echo e(translate('Save')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $(".online_payment").click(function() {
            $('#manual_payment_description').parent().addClass('d-none');
        });
        toggleManualPaymentData($('input[name=payment_option]:checked').data('id'));
    });

    function use_wallet() {
        $('input[name=payment_option]').val('wallet');
        // if($('#agree_checkbox').is(":checked")){
        $('#checkout-form').submit();
        // }else{
        //     AIZ.plugins.notify('danger','<?php echo e(translate('You need to agree with our policies')); ?>');
        // }
    }

    function submitOrder(el) {
        var error = 0;
        if ($('#checkout_type').val() == 'guest') {
            if ($('#guest_name').val() == '') {
                $('#guest_name').focus();
                error = 1;
                alert('Please enter guest name');
                return false;
            }
            // if ($('#guest_email').val() == '') {
            //     $('#guest_email').focus();
            //     error = 1;
            //     alert('Please enter guest email');
            //     return false;
            // }
            if ($('#guest_address').val() == '') {
                $('#guest_address').focus();
                error = 1;
                alert('Please enter guest address');
                return false;
            }
            if ($('#guest_phone').val() == '') {
                error = 1;
                alert('Please enter guest phone');
                $('#guest_phone').focus();
                return false;
            }
        }
        if (!error)
            $('#checkout-form').submit();
        // }else{
        //     AIZ.plugins.notify('danger','<?php echo e(translate('You need to agree with our policies')); ?>');
        //     $(el).prop('disabled', false);
        // }
    }

    function toggleManualPaymentData(id) {
        $('#manual_payment_description').parent().removeClass('d-none');
        $('#manual_payment_description').html($('#manual_payment_info_' + id).html());
    }
</script>
<script type="text/javascript">
    function add_new_address() {
        $('#new-address-modal').modal('show');
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\bazarnao-v4-laravel-9\resources\views/frontend/payment_select.blade.php ENDPATH**/ ?>