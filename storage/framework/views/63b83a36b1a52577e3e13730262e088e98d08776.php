

<?php $__env->startSection('content'); ?>

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="align-items-center">
        <h1 class="h3"><?php echo e(translate('Month & Year wise Purchase Report')); ?></h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <form id="prowasales" action="<?php echo e(route('purchase_report_history.index')); ?>" method="get">
                    <div class="form-group row">
                        <div class="form-group mb-0">
                            <label>Date Range :</label>
                            <input type="date" name="start_date" class="form-control" value="<?php echo e($start_date); ?>">
                            <input type="date" name="end_date" class="form-control" value="<?php echo e($end_date); ?>">
                        </div>

                        <div class="col-md-3">
                            <label class="col-form-label"><?php echo e(translate('Sort by Product')); ?> :</label>
                            <select id="demo-ease" class="aiz-selectpicker select2" name="product_id[]" data-live-search="true" multiple>
                                <option value=''>All</option>
                                <?php $__currentLoopData = DB::table('products')->orderBy('name')->select('id', 'name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if(in_array($prod->id, request()->input('product_id', []))): ?> selected <?php endif; ?>
                                    value="<?php echo e($prod->id); ?>"><?php echo e($prod->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label>&nbsp;</label>
                            <br>
                            <div class="d-flex">
                                <button class="btn btn-sm btn-primary" type="submit"><?php echo e(translate('Filter')); ?></button>
                                <button class="btn btn-sm btn-info mx-2" onclick="printDiv()" type="button"><?php echo e(translate('Print')); ?></button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="printArea">
                <style>
                    th{text-align:center;}
                </style>

                <?php $__currentLoopData = $productsData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="container mt-4">
                        <h5>Month & Year wise Purchase Report</h2>
                        <h6>Product's Name: <span><?php echo e($productData['product_name']); ?></span></h6>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="2">Month</th>
                                    <?php for($year = $currentYear; $year >= $currentYear - 2; $year--): ?>
                                        <th colspan="3"><?php echo e($year); ?></th>
                                    <?php endfor; ?>
                                </tr>
                                <tr>
                                    <?php for($year = $currentYear; $year >= $currentYear - 2; $year--): ?>
                                        <th>Qty</th>
                                        <th>Average Purchase</th>
                                        <th>Amount</th>
                                    <?php endfor; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $productData['months']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $monthData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($monthData['name']); ?></td>
                                    <?php for($year = $currentYear; $year >= $currentYear - 2; $year--): ?>
                                        <td><?php echo e($monthData[$year]['qty']); ?></td>
                                        <td><?php echo e(number_format($monthData[$year]['average_sale'], 2, '.', ',')); ?></td>
                                        <td><?php echo e($monthData[$year]['amount']); ?></td>
                                    <?php endfor; ?>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td style="text-align:right;" colspan="1"><b>Total</b></td>
                                    <?php for($year = $currentYear; $year >= $currentYear - 2; $year--): ?>
                                        <td style="text-align:right;"><b><?php echo e($productData['totals'][$year]['qty']); ?></b></td>
                                        <td style="text-align:right;"><b>-</b></td>
                                        <td style="text-align:right;"><b><?php echo e(single_price($productData['totals'][$year]['amount'])); ?></b></td>
                                    <?php endfor; ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<script>
function printDiv() {
    var divContents = document.querySelector(".printArea").innerHTML;
    var a = window.open('', '', 'height=500, width=500');
    a.document.write('<html>');
    a.document.write('<body >');
    a.document.write(divContents);
    a.document.write('</body></html>');
    a.document.close();
    a.print();
}
</script>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\bazarnao-v4-laravel-9\resources\views/backend/reports/purchase_report_history.blade.php ENDPATH**/ ?>