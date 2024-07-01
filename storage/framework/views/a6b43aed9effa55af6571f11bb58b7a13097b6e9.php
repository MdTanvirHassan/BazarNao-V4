

<?php $__env->startSection('content'); ?>

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class=" align-items-center">
        <h1 class="h3"><?php echo e(translate('Employee Sales Performance Compare Yearly Report')); ?></h1>
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
                        <h4><?php echo e(translate('Employee Sales Performance Compare Yearly Report')); ?></h4>
                        <h6>Year: <?php echo e($year); ?></h6>

                        <table class="table table-bordered table-responsive table-striped text-sm">
                            <thead>
                                <tr>
                                    <th><?php echo e(translate('Employee Name')); ?></th>
                                    <?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <th><?php echo e(DateTime::createFromFormat('!m', $month)->format('F')); ?></th>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <th><?php echo e(translate('Total')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $monthly_totals = array_fill(1, 12, 0);
                                    $grand_total = 0;
                                ?>
                                <?php $__currentLoopData = $employeeData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $employee_total = 0;
                                    ?>
                                    <tr>
                                        <td><?php echo e($employee['name']); ?></td>
                                        <?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $month_data = $employee['totals'][$month] ?? 0;
                                                $monthly_totals[$month] += $month_data;
                                                $employee_total += $month_data;
                                            ?>
                                            <td><?php echo e(single_price($month_data, 2)); ?></td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <td><b><?php echo e(single_price($employee_total, 2)); ?></b></td>
                                    </tr>
                                    <?php
                                        $grand_total += $employee_total;
                                    ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><b>Total:</b></td>
                                    <?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td><b><?php echo e(single_price($monthly_totals[$month], 2)); ?></b></td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td><b><?php echo e(single_price($grand_total, 2)); ?></b></td>
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

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\bazarnao-v4-laravel-9\resources\views/backend/reports/employee_sales_performance_compare_per_year.blade.php ENDPATH**/ ?>