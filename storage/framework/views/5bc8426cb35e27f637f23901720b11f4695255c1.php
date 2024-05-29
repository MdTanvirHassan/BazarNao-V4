

<?php $__env->startSection('content'); ?>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6"><?php echo e(translate('Refund Request All')); ?></h5>
    </div>
    <div class="card-body">
        <table class="table aiz-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(translate('Order Code')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Seller Name')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Product')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Price')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Seller Approval')); ?></th>
                    <th><?php echo e(translate('Refund Status')); ?></th>
                    <th data-breakpoints="lg" width="15%" class="text-right"><?php echo e(translate('Options')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $refunds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $refund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(($key+1) + ($refunds->currentPage() - 1)*$refunds->perPage()); ?></td>
                        <td>
                            <?php if($refund->order != null): ?>
                                <?php echo e($refund->order->code); ?>

                            <?php else: ?>
                                <?php echo e(translate('Order deleted')); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($refund->seller != null): ?>
                                <?php echo e($refund->seller->name); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($refund->orderDetail != null && $refund->orderDetail->product != null): ?>
                              <a href="<?php echo e(route('product', $refund->orderDetail->product->slug)); ?>" target="_blank" class="media-block">
                                <div class="row">
                                  <div class="col-auto">
                                    <img src="<?php echo e(uploaded_asset($refund->orderDetail->product->thumbnail_img)); ?>" alt="Image" class="size-50px">
                                  </div>
                                  <div class="col">
                                    <div class="media-body text-truncate-2"><?php echo e($refund->orderDetail->product->getTranslation('name')); ?></div>
                                  </div>
                                </div>
                              </a>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($refund->orderDetail != null): ?>
                                <?php echo e(single_price($refund->orderDetail->price)); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($refund->orderDetail != null && $refund->orderDetail->product != null && $refund->orderDetail->product->added_by == 'admin'): ?>
                                <span class="badge badge-inline badge-warning"><?php echo e(translate('Own Product')); ?></span>
                            <?php else: ?>
                                <?php if($refund->seller_approval == 1): ?>
                                    <span class="badge badge-inline badge-success"><?php echo e(translate('Approved')); ?></span>
                                <?php elseif($refund->seller_approval == 2): ?>
                                    <span class="badge badge-inline badge-danger"><?php echo e(translate('Rejected')); ?></span>
                                <?php else: ?>
                                    <span class="badge badge-inline badge-primary"><?php echo e(translate('Pending')); ?></span>
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($refund->refund_status == 1): ?>
                              <span class="badge badge-inline badge-success"><?php echo e(translate('Paid')); ?></span>
                            <?php else: ?>
                              <span class="badge badge-inline badge-warning"><?php echo e(translate('Non-Paid')); ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="text-right d-flex align-items-center">
                            <div class="dropdown mr-2">
                                <button class="btn btn-soft-primary btn-sm dropdown-toggle" type="button" id="approvalDropdown<?php echo e($refund->id); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo e(translate('Select')); ?>

                                </button>
                                <div class="dropdown-menu" aria-labelledby="approvalDropdown<?php echo e($refund->id); ?>">
                                    <a class="dropdown-item" href="javascript:void(0)" onclick="approve_refund('<?php echo e($refund->id); ?>', 'refund')"><?php echo e(translate('Approve Refund')); ?></a>
                                    <a class="dropdown-item" href="javascript:void(0)" onclick="approve_refund('<?php echo e($refund->id); ?>', 'return')"><?php echo e(translate('Approve Return')); ?></a>
                                </div>
                            </div>
                            <a class="btn btn-soft-danger btn-icon btn-circle btn-sm mr-2" onclick="reject_refund('<?php echo e(route('reject_reason_show', $refund->id )); ?>', '<?php echo e($refund->id); ?>', '<?php echo e($refund->order->code); ?>')"  title="<?php echo e(translate('Reject Refund Request')); ?>">
                                <i class="las la-trash"></i>
                            </a>
                            <a href="<?php echo e(route('reason_show', $refund->id)); ?>" class="btn btn-soft-primary btn-icon btn-circle btn-sm" title="<?php echo e(translate('View Reason')); ?>">
                                <i class="las la-eye"></i>
                            </a>
                        </td>                        
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="clearfix">
            <div class="pull-right">
                <?php echo e($refunds->appends(request()->input())->links()); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
  <div class="modal fade reject_refund_request" id="modal-basic">
    	<div class="modal-dialog">
    		<div class="modal-content">
            <form class="form-horizontal member-block" action="<?php echo e(route('reject_refund_request')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="refund_id" id="refund_id" value="">
                <div class="modal-header">
                    <h5 class="modal-title h6"><?php echo e(translate('Reject Refund Request !')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label"><?php echo e(translate('Order Code')); ?></label>
                        <div class="col-md-9">
                          <input type="text" value="" id="order_id" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label"><?php echo e(translate('Reject Reason')); ?></label>
                        <div class="col-md-9">
                            <textarea type="text" name="reject_reason" id="reject_reason" rows="5" class="form-control" placeholder="<?php echo e(translate('Reject Reason')); ?>" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal"><?php echo e(translate('Close')); ?></button>
                    <button type="submit" class="btn btn-success"><?php echo e(translate('Submit')); ?></button>
                </div>
            </form>
      	</div>
    	</div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function update_refund_approval(el){
            $.post('<?php echo e(route('vendor_refund_approval')); ?>',{_token:'<?php echo e(@csrf_token()); ?>', el:el}, function(data){
                if (data == 1) {
                    AIZ.plugins.notify('success', '<?php echo e(translate('Approval has been done successfully')); ?>');
                }
                else {
                    AIZ.plugins.notify('danger', '<?php echo e(translate('Something went wrong')); ?>');
                }
            });
        }

        function approve_refund(el, refund_type){
            $.post('<?php echo e(route('approve_refund_request')); ?>', {_token: '<?php echo e(@csrf_token()); ?>', el: el, refund_type: refund_type}, function(data){
                if (data == 1) {
                    location.reload();
                    AIZ.plugins.notify('success', '<?php echo e(translate('Refund has been sent successfully')); ?>');
                } else {
                    AIZ.plugins.notify('danger', '<?php echo e(translate('Something went wrong')); ?>');
                }
            });
        }


        // function refund_request_money(el){
        //     $.post('<?php echo e(route('refund_request_money_by_admin')); ?>',{_token:'<?php echo e(@csrf_token()); ?>', el:el}, function(data){
        //         if (data == 1) {
        //             location.reload();
        //             AIZ.plugins.notify('success', '<?php echo e(translate('Refund has been sent successfully')); ?>');
        //         }
        //         else {
        //             AIZ.plugins.notify('danger', '<?php echo e(translate('Something went wrong')); ?>');
        //         }
        //     });
        // }

        function reject_refund_request(url, id, order_id){
          $.get(url, function(data){
              $('.reject_refund_request').modal('show');
              $('#refund_id').val(id);
              $('#order_id').val(order_id);
              $('#reject_reason').html(data);
          });
         }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\bazarnao-v4-laravel-9\resources\views/refund_request/index.blade.php ENDPATH**/ ?>