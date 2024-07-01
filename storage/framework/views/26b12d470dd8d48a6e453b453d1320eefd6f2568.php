

<?php $__env->startSection('content'); ?>

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class=" align-items-center">
        <h1 class="h3"><?php echo e(translate('Employee Sales Performance Compare Report')); ?></h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <button class="btn btn-sm btn-info mx-2" onclick="printDiv()" type="button"><?php echo e(translate('Print')); ?></button>

                <div class="printArea">
                    <style>
                        th, td { text-align: center; }
                    </style>

                    <div class="container">
                        <h2><?php echo e(translate('Employee Sales Performance Compare Report')); ?></h2>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><?php echo e(translate('Employee Name')); ?></th>
                                    <?php for($year = $currentYear; $year >= $currentYear - 2; $year--): ?>
                                        <th><a href="<?php echo e(route('employee_sales_performance_compare_per_year.index', ['year' => $year])); ?>" target="_blank"><?php echo e($year); ?></a></th>
                                    <?php endfor; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total_amount = 0; ?>
                                <?php $__currentLoopData = $employeeData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $total_amount += array_sum(array_column($employee['totals'], 'amount')); ?>
                                    <tr>
                                        <td><?php echo e($employee['name']); ?></td>
                                        <?php $__currentLoopData = $employee['totals']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $total): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td class="text-right"><?php echo e(single_price($total, 2)); ?></td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td style="text-align:right;"><b>Total:</b></td>
                                    <?php $__currentLoopData = $employeeData[0]['totals']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year => $yearTotal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $total = 0;
                                            foreach ($employeeData as $employee) {
                                                $total += $employee['totals'][$year];
                                            }
                                        ?>
                                        <td style="text-align:right;"><b><?php echo e(single_price($total, 2)); ?></b></td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<script>
    function printDiv() {
        var printContents = document.querySelector('.printArea').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\bazarnao-v4-laravel-9\resources\views/backend/reports/employee_sales_performance_compare.blade.php ENDPATH**/ ?>