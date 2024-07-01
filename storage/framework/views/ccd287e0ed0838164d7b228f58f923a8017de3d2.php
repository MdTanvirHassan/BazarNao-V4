

<?php $__env->startSection('content'); ?>
<section class="py-5">
    <div class="container">
        <div class="d-flex align-items-start">
            <?php echo $__env->make('frontend.inc.user_side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="aiz-user-panel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6"><?php echo e(translate('Applied Refund Request')); ?></h5>
                    </div>
                    <div class="card-body">
                        <table class="table aiz-table mb-0">
                            <thead>
                                <tr>
                                  <th>#</th>
                                  <th data-breakpoints="lg"><?php echo e(translate('Date')); ?></th>
                                  <th><?php echo e(translate('Order id')); ?></th>
                                  <th data-breakpoints="lg"><?php echo e(translate('Product')); ?></th>
                                  <th data-breakpoints="lg"><?php echo e(translate('Amount')); ?></th>
                                  <th><?php echo e(translate('Status')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                  <?php $__currentLoopData = $refunds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $refund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <tr>
                                          <td><?php echo e($key+1); ?></td>
                                          <td><?php echo e(date('d-m-Y', strtotime($refund->created_at))); ?></td>
                                          <td>
                                              <?php if($refund->order != null): ?>
                                                  <?php echo e($refund->order->code); ?>

                                              <?php endif; ?>
                                          </td>
                                          <td>
                                              <?php if($refund->orderDetail != null && $refund->orderDetail->product != null): ?>
                                                  <?php echo e($refund->orderDetail->product->getTranslation('name')); ?>

                                              <?php endif; ?>
                                          </td>
                                          <td>
                                              <?php if($refund->orderDetail != null): ?>
                                                  <?php echo e(single_price($refund->orderDetail->price)); ?>

                                              <?php endif; ?>
                                          </td>
                                          <td>
                                              <?php if($refund->refund_status == 1): ?>
                                                  <span class="badge badge-inline badge-success"><?php echo e(translate('Approved')); ?></span>
                                              <?php elseif($refund->refund_status == 2): ?>
                                                  <span class="badge badge-inline badge-danger"><?php echo e(translate('REJECTED')); ?></span>
                                                  <a href="javascript:void(0);" onclick="refund_reject_reason_show('<?php echo e(route('reject_reason_show', $refund->id )); ?>')" class="btn btn-soft-primary btn-icon btn-circle btn-sm" title="<?php echo e(translate('Reject Reason')); ?>">
                                                      <i class="las la-eye"></i>
                                                  </a>
                                              <?php else: ?>
                                                  <span class="badge badge-inline badge-info"><?php echo e(translate('PENDING')); ?></span>
                                              <?php endif; ?>
                                          </td>
                                      </tr>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <?php echo e($refunds->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
<div class="modal fade reject_reason_show_modal" id="modal-basic">
	<div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title h6"><?php echo e(translate('Refund Request Reject Reason')); ?></h5>
              <button type="button" class="close" data-dismiss="modal"></button>
          </div>
          <div class="modal-body reject_reason_show">
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-light" data-dismiss="modal"><?php echo e(translate('Close')); ?></button>
          </div>
      </div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
  function refund_reject_reason_show(url){
      $.get(url, function(data){
          $('.reject_reason_show').html(data);
          $('.reject_reason_show_modal').modal('show');
      });
  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\bazarnao-v4-laravel-9\resources\views/refund_request/frontend/refund_request/index.blade.php ENDPATH**/ ?>