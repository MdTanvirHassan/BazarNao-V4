

<?php $__env->startSection('content'); ?>
<?php
    $refund_request_addon = App\Models\Addon::where('unique_identifier', 'refund_request')->first();
?>
<div class="card">
      <form class="" action="" method="GET">
        <div class="card-header row gutters-5">
          <div class="col text-center text-md-left">
            <h5 class="mb-md-0 h6"><a href="<?php echo e(Route('transfer.create')); ?>" class="btn btn-info"><?php echo e(translate('Add Transfer')); ?></a></h5>
          </div>
          <div class="col-lg-2">
              <div class="form-group mb-0">
                  <input type="text" class="aiz-date-range form-control" value="" name="date" placeholder="<?php echo e(translate('Filter by date')); ?>" data-format="DD-MM-Y" data-separator=" to " data-advanced-range="true" autocomplete="off">
              </div>
          </div>
          <div class="col-lg-2">
            <div class="form-group mb-0">
              <input type="text" class="form-control" id="search" name="search"<?php if(isset($sort_search)): ?> value="<?php echo e($sort_search); ?>" <?php endif; ?> placeholder="<?php echo e(translate('Type Order code & hit Enter')); ?>">
            </div>
          </div>
          <div class="col-auto">
            <div class="form-group mb-0">
              <button type="submit" class="btn btn-primary"><?php echo e(translate('Filter')); ?></button>
            </div>
          </div>
        </div>
    </form>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th data-breakpoints="md"><?php echo e(translate('Product')); ?></th>
                    <th data-breakpoints="md"><?php echo e(translate('From wearhouse')); ?></th>
                    <th data-breakpoints="md"><?php echo e(translate('To wearhouse')); ?></th>
                    <th data-breakpoints="md"><?php echo e(translate('Qty')); ?></th>
                	<th data-breakpoints="md"><?php echo e(translate('Unit Price')); ?></th>
                    <th data-breakpoints="md"><?php echo e(translate('date')); ?></th>
                    <th data-breakpoints="md"><?php echo e(translate('Status')); ?></th>
                    <th class="text-right" width="18%"><?php echo e(translate('options')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $transfer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php echo e(($key+1) + ($transfer->currentPage() - 1)*$transfer->perPage()); ?>

                        </td>
                        <td>
                            <?php echo e($order->product->name); ?>

                        </td>
                        <td>
                        <?php echo e(getWearhouseName($order->from_wearhouse_id)); ?> 
                        </td>
                        <td>
                        <?php echo e(getWearhouseName($order->to_wearhouse_id)); ?>

                        </td>
                        <td>
                            <?php echo e($order->qty); ?>

                        </td>
                    
                    	<td>
                            <?php echo e($order->unit_price); ?>

                        </td>
                    
                        <td>
                            <?php echo e($order->date); ?>

                        </td>
                        <td>
                            <?php echo e($order->status); ?>

                        </td>
                        
                        
                        <td class="text-right">
                            <?php if($order->status =='Pending'): ?>
                           <a href="<?php echo e(route('transfer.edit', $order->id)); ?>" class="btn btn-soft-primary btn-icon btn-circle btn-sm" title="<?php echo e(translate('Edit')); ?>">
                                   <i class="las la-edit"></i>
                            </a>
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="<?php echo e(route('transfer.approve', $order->id)); ?>" title="<?php echo e(translate('Approve')); ?>">
                                <i class="las la-eye"></i>
                            </a>
                        
                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="<?php echo e(route('transfer.destroy', $order->id)); ?>" title="<?php echo e(translate('Cancel')); ?>">
                                <i class="las la-trash"></i>
                            </a>
                          <?php endif; ?> 
                            
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="aiz-pagination">
            <?php echo e($transfer->appends(request()->input())->links()); ?>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('modals.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\bazarnao-v4-laravel-9\resources\views/backend/transfer/index.blade.php ENDPATH**/ ?>