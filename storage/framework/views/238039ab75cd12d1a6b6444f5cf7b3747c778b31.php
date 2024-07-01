

<?php $__env->startSection('content'); ?>


<div class="card">
    <form id="culexpo" class="" action="" method="GET">
        <div class="card-header row gutters-5">
            <div class="col text-center text-md-left">
                <h5 class="mb-md-0 h6"><?php echo e(translate('Sales Executive')); ?></h5>
            </div>

            <div class="col-md-3">
                <label>Filter By Employee Executive Role:</label>
                <select name="role" id="role" class="form-control">
                    <option value="">Select Role</option>

                    <?php $__currentLoopData = \App\Models\Role::whereBetween('id',[9, 14])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <option value="<?php echo e($role->id); ?>"<?php if($role_id == $role->id): ?> selected <?php endif; ?> ><?php echo e($role->name); ?></option>          
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="col-lg-3">
                <div class="form-group mb-0">                    
                    <label>Date Range :</label>
                    <input type="date" name="start_date" class="form-control" value="<?php echo e($start_date); ?>">
                    <input type="date" name="end_date" class="form-control" value="<?php echo e($end_date); ?>">
                     
                </div>
            </div>
             
               
            <div class="col-md-3">
                <label>Filter By Employee :</label>
                <select class="form-control" name="user_id" id="user_id">
                <option value="">Select One</option>
                <?php $__currentLoopData = \App\Models\Staff::where('role_id', 9)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $executive): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                <option value="<?php echo e($executive->user_id); ?>"<?php if($user_id == $executive->user_id): ?> selected <?php endif; ?> ><?php echo e($executive->user->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

           
            <div class="col-auto">
                <div class="form-group mb-0">
                    <button class="btn btn-sm btn-primary" onclick="submitForm ('<?php echo e(route('employee_performance.index')); ?>')"><?php echo e(translate('Filter')); ?></button>
                    <button class="btn btn-sm btn-info" onclick="printDiv()" type="button"><?php echo e(translate('Print')); ?></button>
                    <!-- <button class="btn btn-sm btn-info" onclick="submitForm('')">Excel</button> -->
                </div>
            </div>
        </div>
    </form>
    <div class="card-body printArea">
        <style>
            th {
                text-align: center;
            }
        </style>
        <h3 style="text-align:center;"><?php echo e(translate('Sales Executive Performence Reports')); ?></h3>
        <table class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>SL</th>
                    <th><?php echo e(translate('Month')); ?></th>
                    <th><?php echo e(translate('Executive Role')); ?></th>
                    <th><?php echo e(translate('Executive Name')); ?></th>
                    <th data-breakpoints="md"><?php echo e(translate('Sales Target')); ?></th>
                    <th data-breakpoints="md"><?php echo e(translate('Total Sales')); ?></th>
                    <th data-breakpoints="md"><?php echo e(translate('Sales Achivement')); ?></th>
                    <th data-breakpoints="md"><?php echo e(translate('Target Customer')); ?></th>
                    <th data-breakpoints="md"><?php echo e(translate('Total New Customer')); ?></th>
                    <th data-breakpoints="md"><?php echo e(translate('Customer Achievement')); ?></th>
                    <th data-breakpoints="md"><?php echo e(translate('Recovery Target')); ?></th>
                    <th data-breakpoints="md"><?php echo e(translate('Monthly Due')); ?></th>
                    <th data-breakpoints="md"><?php echo e(translate('Total Due')); ?></th>
                    <!-- <th data-breakpoints="md"><?php echo e(translate('Due Collection Achievement')); ?></th> -->
                </tr>
            </thead>
            <tbody>

                <?php
                    $total_sales_target_count = 0;
                    $total_sales_count = 0;
                    $total_sales_acheivement_count = 0;
                    $total_target_new_customer_count = 0;
                    $total_new_customer_count = 0;
                    $total_customer_achievement_count = 0;
                    $total_recovery_target_count = 0;
                    $total_due_collection_count = 0;
                    $total_due_collection_achievement_count = 0;
                    $monthly_due_count = 0;


                    $i = 0;
                ?>
               <?php $__currentLoopData = $targets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $target): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>

                <?php
                    $total_sales_target_count += $target->total_target;
                    $total_sales_count += $target->total_sales;
                    $total_sales_acheivement_count += $target->sales_achievement;
                    $total_target_new_customer_count += $target->total_target_customer;
                    $total_new_customer_count += $target->customer_count;
                    $total_customer_achievement_count += $target->customer_achivement;
                    $total_recovery_target_count += $target->total_recovery_target;
                    $total_due_collection_count += $target->totaldue;
                    $total_due_collection_achievement_count += $target->total_due_collection;
                    $monthly_due_count += $target->monthlyTotaldue;

                    
                    $i ++;
                ?>

                    <td class='text-right'>
                    <?php echo e($key + 1); ?>

                    </td>

                    <td class='text-right'>
                    <?php echo e($target->month ? $target->month: ''); ?>

                    </td>

                    <td class='text-right'>
                    <?php echo e($target->user->staff->role->name ? $target->user->staff->role->name: ''); ?>

                    </td>

                    <td class='text-right'>
                    <?php echo e($target->user->name ? $target->user->name: ''); ?>

                    </td>

                    <td class='text-right'>
                    <?php echo e(isset($target->total_target) ? number_format($target->total_target) : '0'); ?>

                    </td>
                    
                    <td class='text-right'>

                   
                    <?php echo e(isset($target->total_sales) ? number_format($target->total_sales,2) : '0'); ?>

                    </td>
                    
                    <td class='text-right'>

                    <?php
                        // $target->sales_achievement = $target->total_sales;
                    ?>
                    <?php echo e(isset($target->sales_achievement) ? number_format($target->sales_achievement,2) : '0'); ?>%
                    </td>

                    <td class='text-right'>
                    <?php echo e(isset($target->total_target_customer) ? number_format($target->total_target_customer) : '0'); ?>

                    </td>

                    <td class='text-right'>
                   
                    <?php echo e(isset($target->customer_count) ? number_format($target->customer_count) : '0'); ?>

                    </td>

                    <td class='text-right'>
                    <?php
                        $target->customer_achivement = $target->customer_achivement;
                    ?>
                    <?php echo e(isset($target->customer_achivement) ? number_format($target->customer_achivement,2) : '0'); ?>%
                    </td>


                    <td class='text-right'>
                    <?php echo e(isset($target->total_recovery_target) ? number_format($target->total_recovery_target) : '0'); ?>

                    </td>

                    <td class='text-right'>
                        <?php echo e(isset($target->monthlyTotaldue) ? number_format($target->monthlyTotaldue,2) : '0'); ?>

                    </td>
                    
                    <td class='text-right'>
                        <?php echo e(isset($target->totaldue) ? number_format($target->totaldue) : '0'); ?>

                    </td>
                    
                   
                
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                
                <tr>
                    <td style="text-align:right;" colspan="4"><b>Total</b></td>
                    <td style="text-align:right;"><b><?php echo e(number_format($total_sales_target_count)); ?></b></td>
                    <td style="text-align:right;"><b><?php echo e(number_format($total_sales_count,2)); ?></b></td>
                    <td style="text-align:right;">
                        <b><?php echo e(number_format($total_sales_acheivement_count/($i ?: 1),2)); ?>%</b>
                    </td>

                    
                    <td style="text-align:right;"><b><?php echo e(number_format($total_target_new_customer_count)); ?></b></td>
                    <td style="text-align:right;"><b><?php echo e(number_format($total_new_customer_count)); ?></b></td>
                    <td style="text-align:right;">
                        <b><?php echo e(number_format($total_customer_achievement_count/($i ?: 1),2)); ?>%</b>
                    </td>
                    <td style="text-align:right;"><b><?php echo e(number_format($total_recovery_target_count)); ?></b></td>
                    <td style="text-align:right;"><b><?php echo e(number_format($monthly_due_count,2)); ?></b></td>
                    <td style="text-align:right;"><b><?php echo e(number_format($total_due_collection_count)); ?></b></td>

                </tr>
            </tbody>
        </table>

    </div>
</div>

<script type="text/javascript">
    function submitForm(url) {
        $('#culexpo').attr('action', url);
        $('#culexpo').submit();
    }
</script>

<script>
        document.getElementById("exportButton").addEventListener("click", function() {
            const table = document.getElementById("myTable");
            let csvContent = "data:text/xlsx;charset=utf-8,";

            for (const row of table.rows) {
                const rowData = Array.from(row.cells).map(cell => cell.innerText);
                const csvRow = rowData.join(",");
                csvContent += csvRow + "\n";
            }

            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "table_data.xlsx");
            document.body.appendChild(link);
            link.click();
        });
    </script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
<?php echo $__env->make('modals.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\bazarnao-v4-laravel-9\resources\views/backend/reports/employee_performance_report_sales_executive.blade.php ENDPATH**/ ?>