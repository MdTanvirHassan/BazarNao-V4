

<?php $__env->startSection('content'); ?>
<style>
    table th {
        padding: 0;
    }
</style>
<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class=" align-items-center">
        <h1 class="h3"><?php echo e(translate('Monthly Product Stock Ledger Report')); ?></h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <!--card body-->
            <div class="card-body">
                <form id="culexpo" action="" method="GET">
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="form-label"><?php echo e(translate('Sort by Warehouse')); ?> :</label>
                            <select id="demo-ease" class="aiz-selectpicker form-control select2" name="warehouse_id" data-live-search="true">
                                <?php $__currentLoopData = \App\Models\Wearhouse::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($warehouse_id==$row->id) {echo 'selected'; } ?> value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label"><?php echo e(translate('Sort by Category')); ?> :</label>
                            <select id="demo-ease" class="aiz-selectpicker form-control select2" name="category_id" onchange="getProducts(this.value)" data-live-search="true">
                                <option value=''>All Categories</option>
                                <?php $__currentLoopData = \App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($category_id==$category->id) { echo 'selected'; } ?> value="<?php echo e($category->id); ?>"><?php echo e($category->getTranslation('name')); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label"><?php echo e(translate('Sort by Product')); ?> :</label>
                            <select class="aiz-selectpicker form-control select2" name="product_id" id="product_id" data-live-search="true">
                                <option value=''>All Products</option>
                                <?php if(!empty($category_id)): ?>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($product_id==$product->id) { echo 'selected'; } ?> value="<?php echo e($product->id); ?>"><?php echo e($product->getTranslation('name')); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Month :</label>
                            <input type="text" name="month" class="form-control aiz-montpicker monthpicker" value="<?php if (!empty($month)) echo date('m/Y', strtotime($month)); ?>">
                        </div>

                        <div class="col-md-4 mt-4">
                            <button class="btn btn-primary" type="submit" onclick="submitForm(this.value)" value="<?php echo e(route('stock_closing')); ?>"><?php echo e(translate('Filter')); ?></button>
                            <?php 
                            $date = date('Y-m-d');
                             $check = (explode('-',$date));
                            ?>
                            <?php if($check[2] == "2" || $check[2] == "1"): ?>
                            <button class="btn btn-primary" type="submit" onclick="submitForm(this.value)" value="<?php echo e(route('save_stock_closing')); ?>"><?php echo e(translate('Closing You Stock')); ?></button>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
                <div class="printArea">
                    <style>
                        th {
                            text-align: center;
                        }
                    </style>
                    <h3 style="text-align:center;"><?php echo e(translate('Monthly Product  stock ledger report')); ?></h3>
                    <table class="table-bordered" style="width:100%">
                        <thead>
                            <tr>

                                <th style="width:3%"><?php echo e(translate('SL')); ?></th>
                                <th style="width:15%"><?php echo e(translate('Product Name')); ?></th>
                                <!-- <th style="width:10%"><?php echo e(translate('Category Name')); ?></th> -->

                                <th style="width:3%"><?php echo e(translate('O.S.Qty')); ?></th>
                                <th style="width:8%"><?php echo e(translate('O.S.Amount')); ?></th>

                                <th style="width:3%"><?php echo e(translate('Trns.R.Qty')); ?></th>
                                <th style="width:8%"><?php echo e(translate('Trns.R.Amount')); ?></th>

                                <th style="width:3%"><?php echo e(translate('P.Qty')); ?></th>
                                <th style="width:8%"><?php echo e(translate('P.Amount')); ?></th>

                                <th style="width:3%"><?php echo e(translate('Sa.Qty')); ?></th>
                                <th style="width:8%"><?php echo e(translate('Sa.Amount')); ?></th>

                                <th style="width:3%"><?php echo e(translate('D.Qty')); ?></th>
                                <th style="width:8%"><?php echo e(translate('D.Amount')); ?></th>

                                <th style="width:3%"><?php echo e(translate('Trns.Qty')); ?></th>
                                <th style="width:8%"><?php echo e(translate('Trns.Amount')); ?></th>

                                <th style="width:3%"><?php echo e(translate('C.Qty')); ?></th>
                                <th style="width:8%"><?php echo e(translate('C.Amount')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $total = 0;
                            $total_opening_stock_qty = 0;
                            $total_opening_stock_amount = 0;
                            $total_purchase_qty =0;
                            $total_purchase_amount = 0;
                            $total_sale_qty =0;
                            $total_sale_amount =0;
                            $total_damage_qty =0;
                            $total_damage_amount =0;

                            $total_receive_qty=0;
                            $total_receive_amount=0;

                            $total_transfer_qty=0;
                            $total_transfer_amount=0;

                            $total_closing_qty = 0;
                            $total_closing_amount = 0;

                            ?>

                            <?php if(!empty($products)): ?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                            <tr>
                                <td style="text-align:center;"><?php echo e(($key+1)); ?></td>
                                <td><?php echo e($product->name); ?></td>

                                <td style="text-align:center;"><?php $total_opening_stock_qty += $product->opening_stock_qty ?><?php echo e($product->opening_stock_qty ? $product->opening_stock_qty : '0'); ?></td>
                                <td style="text-align:right;"><?php $total_opening_stock_amount += $product->opening_stock_amount; ?> <?php echo e(single_price($product->opening_stock_amount)); ?></td>

                                <td style="text-align:center;"><?php $total_receive_qty += $product->receive_qty; ?><?php echo e($product->receive_qty ? $product->receive_qty : '0'); ?></td>
                                <td style="text-align:right;"> <?php $total_receive_amount += $product->receive_amount; ?><?php echo e(single_price($product->receive_amount)); ?></td>

                                <td style="text-align:center;"><?php $total_purchase_qty += $product->purchase_qty; ?><?php echo e($product->purchase_qty ? $product->purchase_qty : '0'); ?></td>
                                <td style="text-align:right;"><?php $total_purchase_amount += $product->purchase_amount; ?><?php echo e(single_price($product->purchase_amount)); ?></td>

                                <td style="text-align:center;"><?php $total_sale_qty += $product->sales_qty; ?><?php echo e($product->sales_qty ? $product->sales_qty : '0'); ?></td>
                                <td style="text-align:right;"><?php $total_sale_amount += $product->sales_amount; ?><?php echo e(single_price($product->sales_amount)); ?></td>

                                <td style="text-align:center;"><?php $total_damage_qty += $product->damage_qty; ?><?php echo e($product->damage_qty ? $product->damage_qty : '0'); ?></td>
                                <td style="text-align:right;"><?php $total_damage_amount += $product->damage_amount; ?><?php echo e(single_price($product->damage_amount)); ?></td>

                                <td style="text-align:center;"> <?php $total_transfer_qty += $product->transfer_qty; ?><?php echo e($product->transfer_qty ? $product->transfer_qty : '0'); ?></td>
                                <td style="text-align:right;"> <?php $total_transfer_amount += $product->transfer_amount; ?><?php echo e(single_price($product->transfer_amount)); ?></td>

                                <td style="text-align:center;"><?php $total_closing_qty += $product->closing_stock_qty; ?><?php echo e($product->closing_stock_qty ? $product->closing_stock_qty : '0'); ?></td>
                                <td style="text-align:right;"><?php $total_closing_amount += $product->closing_stock_amount; ?><?php echo e(single_price($product->closing_stock_amount)); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr style="font-weight:bold;">
                                <td style="text-align:center;" colspan="2">Total</td>
                                <td style="text-align:center;"><?php echo e($total_opening_stock_qty); ?></td>
                                <td style="text-align:right;"><?php echo e(single_price($total_opening_stock_amount)); ?></td>

                                <td style="text-align:center;"><?php echo e($total_receive_qty); ?></td>
                                <td style="text-align:right;"><?php echo e(single_price($total_receive_amount)); ?></td>

                                <td style="text-align:center;"><?php echo e($total_purchase_qty); ?></td>
                                <td style="text-align:right;"><?php echo e(single_price($total_purchase_amount)); ?></td>

                                <td style="text-align:center;"><?php echo e($total_sale_qty); ?></td>
                                <td style="text-align:right;"><?php echo e(single_price($total_sale_amount)); ?></td>

                                <td style="text-align:center;"><?php echo e($total_damage_qty); ?></td>
                                <td style="text-align:right;"><?php echo e(single_price($total_damage_amount)); ?></td>

                                <td style="text-align:center;"><?php echo e($total_transfer_qty); ?></td>
                                <td style="text-align:right;"><?php echo e(single_price($total_transfer_amount)); ?></td>

                                <td style="text-align:center;"><?php echo e($total_closing_qty); ?></td>
                                <td style="text-align:right;"><?php echo e(single_price($total_closing_amount)); ?></td>
                            </tr>
                            <?php else: ?>
                            <tr>
                                <td class="text-center p-3" colspan="17">No Data Found</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    function submitForm(url) {
        $('#culexpo').attr('action', url);
        $('#culexpo').submit();
    }

    function getProducts(val) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "<?php echo e(route('product.categories')); ?>",
            type: 'GET',
            data: {
                value: val
            },
            success: function(data) {
                $('#product_id').html('<option value="">All Products</option>');
                $.each(data, function(key, value) {
                    $('#product_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                });
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\bazarnao-v4-laravel-9\resources\views/backend/reports/stock_closing.blade.php ENDPATH**/ ?>