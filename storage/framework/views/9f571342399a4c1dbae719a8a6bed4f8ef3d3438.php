

<?php $__env->startSection('content'); ?>

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="align-items-center">
        <h1 class="h3"><?php echo e(translate('Warehouse Stock Summary Report')); ?></h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <form id="prowasales" action="<?php echo e(route('warehouse_stock_summery.index')); ?>" method="get">
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
                    <h3 class="h3"><?php echo e(translate('Warehouse Stock Summary Report')); ?></h3>

                    <?php $__currentLoopData = $yearData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h5>Year: <?php echo e($year); ?></h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Warehouse</th>
                                    <th>Opening Stock Value</th>
                                    <th>Purchase Value</th>
                                    <th>Transfer IN Value</th>
                                    <th>Sales Value</th>
                                    <th>Transfer Out Value</th>
                                    <th>Closing Stock Value</th>
                                    <th>Profit/Loss</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data['warehouses']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouseData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($warehouseData['name']); ?></td>
                                        <td><?php echo e(single_price($warehouseData['data']['opening_stock'])); ?></td>
                                        <td><?php echo e(single_price($warehouseData['data']['purchase'])); ?></td>
                                        <td><?php echo e(single_price($warehouseData['data']['transfer_in'])); ?></td>
                                        <td><?php echo e(single_price($warehouseData['data']['sales'])); ?></td>
                                        <td><?php echo e(single_price($warehouseData['data']['transfer_out'])); ?></td>
                                        <td><?php echo e(single_price($warehouseData['data']['closing_stock'])); ?></td>
                                        <td><?php echo e(single_price($warehouseData['data']['profit_loss'])); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><b>Total</b></td>
                                    <td><b><?php echo e(single_price($data['totals']['opening_stock'])); ?></b></td>
                                    <td><b><?php echo e(single_price($data['totals']['purchase'])); ?></b></td>
                                    <td><b><?php echo e(single_price($data['totals']['transfer_in'])); ?></b></td>
                                    <td><b><?php echo e(single_price($data['totals']['sales'])); ?></b></td>
                                    <td><b><?php echo e(single_price($data['totals']['transfer_out'])); ?></b></td>
                                    <td><b><?php echo e(single_price($data['totals']['closing_stock'])); ?></b></td>
                                    <td><b><?php echo e(single_price($data['totals']['profit_loss'])); ?></b></td>
                                </tr>
                            </tbody>
                        </table>
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
    a.document.write('<body>');
    a.document.write(divContents);
    a.document.write('</body></html>');
    a.document.close();
    a.print();
}
</script>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\bazarnao-v4-laravel-9\resources\views/backend/reports/warehouse_stock_summery.blade.php ENDPATH**/ ?>