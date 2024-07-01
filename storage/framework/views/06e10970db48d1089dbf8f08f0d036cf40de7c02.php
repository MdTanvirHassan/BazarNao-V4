

<?php $__env->startSection('content'); ?>

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class=" align-items-center">
        <h1 class="h3"><?php echo e(translate('Sales Profit report')); ?></h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <form id="prowasales" action="<?php echo e(route('sale_profit_report.index')); ?>" method="get">
                    <div class="form-group row">

                        <div class="col-md-3">
                            <label class="col-form-label"><?php echo e(translate('Sort by Category')); ?> :</label>
                            <select id="demo-ease" class="aiz-selectpicker select2" name="category_id" data-live-search="true">
                                <option value=''>All</option>
                                <?php $__currentLoopData = \App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($sort_by==$category->id)
                                    echo 'selected';
                                    ?>
                                    value="<?php echo e($category->id); ?>"><?php echo e($category->getTranslation('name')); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        
                        <div class="col-md-3">
                            <label class="col-form-label"><?php echo e(translate('Sort by Warehouse')); ?> :</label>
                            <select id="warehouse" class="aiz-selectpicker select2" name="warehouse" data-live-search="true">
                                <option value=''>All</option>
                                <?php $__currentLoopData = \App\Models\Wearhouse::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $warehous): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($wearhouse ==$warehous->id)
                                    echo 'selected';
                                    ?>
                                    value="<?php echo e($warehous->id); ?>"><?php echo e($warehous->name); ?></option>
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
                        
                        
                        
                        
                        <div class="col-md-3">
                            <label>&nbsp;</label>
                            <br>
                            <button class="btn btn-sm btn-primary" onclick="submitForm ('<?php echo e(route('sale_profit_report.index')); ?>')"><?php echo e(translate('Filter')); ?></button>
                            
                            <button class="btn btn-sm btn-info" onclick="printDiv()" type="button"><?php echo e(translate('Print')); ?></button>
                            <button class="btn btn-sm btn-info" onclick="submitForm('<?php echo e(route('product_sales_export')); ?>')">Excel</button>
                            
                        </div>
                    </div>
                </form>

                <div class="printArea">
                <style>
                    th{text-align:center;}
                </style>
                    <h3 style="text-align:center;"><?php echo e(translate('Sales Profit report')); ?></h3>
                    <table class="table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:5%">SL</th>
                                <th style="width:30%"><?php echo e(translate('Product Name')); ?></th>
                                <th style="width:10%"><?php echo e(translate('Category')); ?></th>
                                <th style="width:10%"><?php echo e(translate('Selling Qty')); ?></th>
                                <th style="width:10%"><?php echo e(translate('Selling Unit Price')); ?></th>
                                <th style="width:10%"><?php echo e(translate('Selling Amount')); ?></th>
                                <th style="width:10%"><?php echo e(translate('Purchase Unit Price')); ?></th>
                                <th style="width:10%"><?php echo e(translate('Purchase Price')); ?></th>
                                <th style="width:15%"><?php echo e(translate('Profit')); ?></th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php $total = 0;$total_profit=0;$total_purchase=0;$qty = 1; ?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $total = $total+($product->price); ?>
                            <?php $total_purchase = $total_purchase+($product->purchase_price); ?>
                            <?php $total_profit = $total - $total_purchase; ?>
                        
                        <?php if(!empty($product->quantity)){
                        $qty = $product->quantity;
                        }else{
                        $qty = 1;
                        }
                        ?>                   
                            <tr>
                                <td><?php echo e(($key+1)); ?></td>
                                <td><?php echo e($product->getTranslation('product_name')); ?></td>
                                <td><?php echo e($product->getTranslation('category_name')); ?></td>
                                <td style="text-align:center;"><?php echo e($product->getTranslation('quantity')); ?></td>
                                <td style="text-align:right;"><?php echo e(single_price($product->getTranslation('price')/ $qty)); ?></td>
                                <td style="text-align:right;"><?php echo e(single_price($product->price)); ?></td>
                                
                                <td style="text-align:right;"><?php echo e(single_price($product->getTranslation('purchase_price')/ $qty)); ?></td>
                                <td style="text-align:right;"><?php echo e(single_price($product->purchase_price)); ?></td>
                                <td style="text-align:center;"><?php echo e(single_price(($product->price - $product->purchase_price))); ?></td>

                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                    <td style="text-align:right;" colspan="5"><b>Total</b></td>
                    <td style="text-align:right;"><b><?php echo e(single_price($total)); ?></b></td>
                    <td style="text-align:right;"><b></b></td>
                    <td style="text-align:right;"><b><?php echo e(single_price($total_purchase)); ?></b></td>
                    <td style="text-align:right;"><b><?php echo e(single_price($total_profit)); ?></b></td>
                </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script>
 function submitForm(url){
    $('#prowasales').attr('action',url);
    $('#prowasales').submit();
 }
</script>
<script>
    document.getElementById('month').addEventListener('input', function() {
        document.getElementById('year').selectedIndex = 0;
    });

    document.getElementById('year').addEventListener('input', function() {
        document.getElementById('month').value = '';
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\bazarnao-v4-laravel-9\resources\views/backend/reports/sale_profit_report.blade.php ENDPATH**/ ?>