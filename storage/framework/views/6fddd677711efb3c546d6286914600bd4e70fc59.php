

<?php $__env->startSection('content'); ?>

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="align-items-center">
        <h1 class="h3"><?php echo e(translate('Sales summery report')); ?></h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <form id="prowasales" action="<?php echo e(route('sales_report.index')); ?>" method="get">
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label>Filter By Warehouse :</label>
                            <select class="aiz-selectpicker select2" name="warehouse[]" id="warehouse" multiple>
                                <?php $__currentLoopData = \App\Models\Wearhouse::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($warehouse->id); ?>" <?php if(in_array($warehouse->id, (array)$warehouseIds)): ?> selected <?php endif; ?>><?php echo e($warehouse->name); ?></option>
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
                        th, td { text-align: center; }
                    </style>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Year</th>
                                <th>Total Customer</th>
                                <th>Total Order</th>
                                <th>Sales</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for($year = $currentYear; $year >= $currentYear - 3; $year--): ?>
                                <tr>
                                    <td><a href="<?php echo e(route('sales_report_monthly.index', ['warehouse_id' => $warehouse->id, 'year' => $year])); ?>" target="_blank"><?php echo e($year); ?></a></td>
                                    <td>
                                        <?php
                                            $totalCustomer = 0;
                                            foreach ($productsData as $productData) {
                                                if (isset($productData['total_customers'][$year])) {
                                                    $totalCustomer += $productData['total_customers'][$year];
                                                }
                                            }
                                        ?>
                                        <?php echo e($totalCustomer); ?>

                                    </td>
                                    <td>
                                        <?php
                                            $totalOrder = 0;
                                            foreach ($productsData as $productData) {
                                                if (isset($productData['total_orders'][$year])) {
                                                    $totalOrder += $productData['total_orders'][$year];
                                                }
                                            }
                                        ?>
                                        <?php echo e($totalOrder); ?>

                                    </td>
                                    <td>
                                        <?php
                                            $yearSales = 0;
                                            foreach ($productsData as $productData) {
                                                if (isset($productData['totals'][$year])) {
                                                    $yearSales += $productData['totals'][$year];
                                                }
                                            }
                                        ?>
                                        <?php echo e(single_price($yearSales)); ?>

                                    </td>
                                </tr>
                            <?php endfor; ?>
                            <tr>
                                <td style="text-align:right;" colspan="3"><b>Total:</b></td>
                                <td style="text-align:right;"><b>
                                    <?php
                                        $grandTotal = 0;
                                        for ($year = $currentYear; $year >= $currentYear - 3; $year--) {
                                            foreach ($productsData as $productData) {
                                                if (isset($productData['totals'][$year])) {
                                                    $grandTotal += $productData['totals'][$year];
                                                }
                                            }
                                        }
                                    ?>
                                    <?php echo e(single_price($grandTotal)); ?>

                                </b></td>
                            </tr>
                        </tbody>
                    </table>
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
    a.document.write('<body>');
    a.document.write(divContents);
    a.document.write('</body></html>');
    a.document.close();
    a.print();
}
</script>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\bazarnao-v4-laravel-9\resources\views/backend/reports/sales_report_yearly.blade.php ENDPATH**/ ?>