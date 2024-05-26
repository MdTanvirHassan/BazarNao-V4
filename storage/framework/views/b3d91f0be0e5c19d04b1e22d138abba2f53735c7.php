

<?php $__env->startSection('content'); ?>
<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class=" align-items-center">
        <h1 class="h3"><?php echo e(translate('Product wise stock report')); ?></h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <!--card body-->
            <div class="card-body">
                <form action="<?php echo e(route('wearhouse_wise_stock_report.index')); ?>" method="GET">
                    <div class="form-group row">
                        
                        <!-- <div class="col-md-4">
                        <label class="col-form-label"><?php echo e(translate('Sort by Category')); ?> :</label>
                            <select id="demo-ease" class="from-control aiz-selectpicker" name="category_id">
                                <option value=''>All</option>
                                <?php $__currentLoopData = \App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($sort_by==$category->id)
                                    echo 'selected';
                                    ?>
                                    value="<?php echo e($category->id); ?>"><?php echo e($category->getTranslation('name')); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div> -->
                        <div class="col-md-4">
                        <label class="col-form-label"><?php echo e(translate('Sort by warehouse')); ?> :</label>
                            <select id="demo-ease" class="from-control aiz-selectpicker select2" name="category_id" data-live-search="true">
                                <option value=''>All</option>
                                <?php $__currentLoopData = $wearhouse; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($sort_by==$row->id)
                                    echo 'selected';
                                    ?>
                                    value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="col-form-label"><?php echo e(translate('Sort by Product')); ?> :</label>
                            <select id="demo-ease" class="aiz-selectpicker select2" name="product_id" data-live-search="true">
                                <option value=''>All</option>
                                <?php $__currentLoopData = DB::table('products')->select('id','name')->get();; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($pro_sort_by==$prod->id)
                                    echo 'selected';
                                    ?>
                                    value="<?php echo e($prod->id); ?>"><?php echo e($prod->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-4 mt-4">
                            <button class="btn btn-primary" type="submit"><?php echo e(translate('Filter')); ?></button>
                            <button class="btn btn-info" onclick="printDiv()" type="button"><?php echo e(translate('Print')); ?></button>
                        </div>
                    </div>
                </form>
                <div class="printArea">
                <style>
th{text-align:center;}
</style>
                <h3 style="text-align:center;"><?php echo e(translate('Product wise stock report')); ?></h3>
                    <table class="table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:5%"><?php echo e(translate('SL')); ?></th>
                                <th style="width:42%"><?php echo e(translate('Product Name')); ?></th>
                                <th style="width:8%"><?php echo e(translate('Expiry')); ?></th>
                                <!-- <th style="width:30%"><?php echo e(translate('Category')); ?></th> -->
                                <th style="width:10%"><?php echo e(translate('Unit Price')); ?></th>
                                <th style="width:10%"><?php echo e(translate('Purchase Price')); ?></th>
                                <th style="width:10%"><?php echo e(translate('Stock')); ?></th>
                                <th style="width:15%"><?php echo e(translate('Amount')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $total = 0; ?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php
                            $qty = 0;
                            if ($product->variant_product) {
                            foreach ($product->stocks as $key => $stock) {
                            $qty += $stock->qty;
                            }
                            }
                            else {
                            $qty = $product->qty;
                            }
                            ?>
                            <?php $total = $total+($qty*$product->purchase_price); ?>
                            <tr>
                                <td><?php echo e(($key+1)); ?></td>
                                <td><?php echo e($product->getTranslation('name')); ?></td>
                                <td><?php echo e(daysDiff ($product->expiry_date )); ?></td>
                                <!-- <td><?php echo e($product->getTranslation('category_name')); ?></td> -->
                                <td style="text-align:right;"><?php echo e($product->unit_price); ?></td>
                                <td style="text-align:right;"><?php echo e($product->purchase_price); ?></td>
                                <td style="text-align:right;"><?php echo e($qty); ?></td>
                                <td style="text-align:right;"><?php echo e(single_price($qty*$product->purchase_price)); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                    <td style="text-align:right;" colspan="6"><b>Total</b></td>
                    <td style="text-align:right;"><b><?php echo e(single_price($total)); ?></b></td>
                </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


    <?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\bazarnao-v4-laravel-9\resources\views/backend/reports/wearhouse_wise_stock_report.blade.php ENDPATH**/ ?>