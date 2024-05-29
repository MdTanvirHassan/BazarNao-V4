<?php if(count($products) > 0): ?>
<div class="px-2 py-1 text-uppercase fs-10 text-right text-muted bg-soft-secondary"><?php echo e(translate('Products')); ?></div>
<div class="row gutters-5 row-cols-xxl-6 row-cols-xl-6 row-cols-lg-4 row-cols-md-3 row-cols-2">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class="col mb-2">
        <form id="option-choice-form_<?php echo e($product->id); ?>">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
            <input type="hidden" name="quantity" value="1">
            <div class="carousel-box">
                <div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
                    <div class="position-relative">
                        <a href="<?php echo e(route('product', $product->slug)); ?>" class="d-block">
                            <img class="img-fit lazyload mx-auto h-140px h-md-210px" src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>" data-src="<?php echo e(uploaded_asset($product->thumbnail_img)); ?>" alt="<?php echo e($product->getTranslation('name')); ?>" onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                        </a>
                        <div class="absolute-top-right aiz-p-hov-icon">
                            <a href="javascript:void(0)" onclick="addToWishList(<?php echo e($product->id); ?>)" data-toggle="tooltip" data-title="<?php echo e(translate('Add to wishlist')); ?>" data-placement="left">
                                <i class="la la-heart-o"></i>
                            </a>
                            <!-- <a href="javascript:void(0)" onclick="addToCompare(<?php echo e($product->id); ?>)" data-toggle="tooltip" data-title="<?php echo e(translate('Add to compare')); ?>" data-placement="left">
                                        <i class="las la-sync"></i>
                                    </a> -->
                            <a href="javascript:void(0)" onclick="showAddToCartModal(<?php echo e($product->id); ?>)" data-toggle="tooltip" data-title="<?php echo e(translate('Add to cart')); ?>" data-placement="left">
                                <i class="las la-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="p-md-3 p-2 text-center">
                        <div class="fs-15">
                            <?php if(home_base_price($product->id) != home_discounted_base_price($product->id)): ?>
                            <del class="fw-600 opacity-50 mr-1"><?php echo e(home_base_price($product->id)); ?></del>
                            <?php endif; ?>
                            <span class="fw-700 text-primary"><?php echo e(home_discounted_base_price($product->id)); ?></span>
                        </div>
                        <div class="rating rating-sm mt-1">
                            <?php echo e(renderStarRating($product->rating)); ?>

                        </div>
						<?php if(home_base_price($product->id) != home_discounted_base_price($product->id)): ?>
                                <h3 class="fw-600 fs-13 lh-1-4 mb-0" style="color:red">
									<?php if($product->discount_type=='amount'): ?>
										<?php echo e($product->discount); ?> TK Save
									<?php else: ?> 
										<?php echo e($product->discount); ?> % Off
									<?php endif; ?>		
								<h3>
								<?php else: ?>
									<h3 class="fw-600 fs-13 lh-1-4 mb-0">&nbsp;</h3>		
								<?php endif; ?>
                        <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                            <a href="<?php echo e(route('product', $product->slug)); ?>" class="d-block text-reset"><?php echo e($product->getTranslation('name')); ?></a>
                        </h3>

                        <?php if(\App\Models\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Models\Addon::where('unique_identifier', 'club_point')->first()->activated): ?>
                        <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
                            <?php echo e(translate('Club Point')); ?>:
                            <span class="fw-700 float-right"><?php echo e($product->earn_point); ?></span>
                        </div>
                        <?php endif; ?>
                        <div class="mt-3">
                         <?php if($product->outofstock==0): ?>
                            <button type="button" id="addtocart_<?php echo e($product->id); ?>" style="width:100%" class="btn btn-primary buy-now fw-600 add-to-cart" onclick="directAdd(<?php echo e($product->id); ?>)">
                                <i class="la la-shopping-cart"></i>
                                <span class="d-none d-md-inline-block"> Add to cart</span>
                            </button>
                         <?php else: ?>
                                    <button type="button" class="btn btn-secondary fw-600" disabled>
                                        <i class="la la-cart-arrow-down"></i> <?php echo e(translate('Out of Stock')); ?>

                                    </button>
                                <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </form>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>

<?php if(\App\Models\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1): ?>
<div class="">
    <?php if(count($shops) > 0): ?>
    <div class="px-2 py-1 text-uppercase fs-10 text-right text-muted bg-soft-secondary"><?php echo e(translate('Shops')); ?></div>
    <ul class="list-group list-group-raw">
        <?php $__currentLoopData = $shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="list-group-item">
            <a class="text-reset" href="<?php echo e(route('shop.visit', $shop->slug)); ?>">
                <div class="d-flex search-product align-items-center">
                    <div class="mr-3">
                        <img class="size-40px img-fit rounded" src="<?php echo e(uploaded_asset($shop->logo)); ?>">
                    </div>
                    <div class="flex-grow-1 overflow--hidden">
                        <div class="product-name text-truncate fs-14 mb-5px">
                            <?php echo e($shop->name); ?>

                        </div>
                        <div class="opacity-60">
                            <?php echo e($shop->address); ?>

                        </div>
                    </div>
                </div>
            </a>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <?php endif; ?>
</div>
<?php endif; ?><?php /**PATH D:\xampp\htdocs\bazarnao-v4-laravel-9\resources\views/frontend/partials/search_content.blade.php ENDPATH**/ ?>