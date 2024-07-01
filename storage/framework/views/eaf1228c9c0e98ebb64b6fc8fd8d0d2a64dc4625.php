

<?php $__env->startSection('content'); ?>
<style>
    #item_table .form-control{
        padding: 2px;
    }
</style>
<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6"><?php echo e(translate('Add New Transfer')); ?></h5>
</div>
<div class="">
    <div class="">
        <form class="form form-horizontal mar-top" action="<?php echo e(route('transfer.store')); ?>" method="POST" enctype="multipart/form-data" id="choice_form">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="added_by" value="admin">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6"><?php echo e(translate('Transfer')); ?></h5>
                </div>
                <div class="card-body">
                <div class="col-md-6 pull-left">
                        <label><?php echo e(translate('From Wearhouse')); ?> <span class="text-danger">*</span></label>

                        <select class="form-control aiz-selectpicker" name="from_wearhouse_id" id="from_wearhouse_id" data-live-search="true" required>
                            <?php $__currentLoopData = $wearhouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($supp->id); ?>"><?php echo e($supp->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                    </div>
                    <div class="col-md-6 pull-left">
    						<label for="name"><?php echo e(translate('To Wearhouse')); ?> <span class="text-danger">*</span></label>
    						<select name="to_wearhouse_id" id="to_wearhouse_id" class="form-control" required>
                                <option value=""><?php echo e(translate('Select Wearhouse')); ?></option>
                                <?php $__currentLoopData = $wearhouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
    					</div>
                    <div class="col-md-6 pull-left">
                        <label><?php echo e(translate('Product')); ?> <span class="text-danger">*</span></label>

                        <select class="form-control aiz-selectpicker" name="product_id" id="product_id" onchange="changeProduct(this.value)"  data-live-search="true" required>
                                        <option value="">Select Product</option>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option data-qty="<?php echo e($product->current_stock); ?>" data-price="<?php echo e($product->purchase_price); ?>" value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                    </div>
                    <div class="col-md-3 pull-left">
                        <label><?php echo e(translate('Stock Qty')); ?> <span class="text-danger">*</span></label>

                        <input type="text" class="form-control" disabled name="stock_qty" id="stock_qty" placeholder="" >

                    </div>
                    <div class="col-md-3 pull-left">
                        <label><?php echo e(translate('Transfer Qty')); ?> <span class="text-danger">*</span></label>

                        <input type="number" class="form-control" name="qty" id="transfer_qty" placeholder=""  required>

                    </div>
                
                	<div class="col-md-3 pull-left">
                    
                        <label><?php echo e(translate('Unit Price')); ?> <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="unit_price" id="unit_price" placeholder=""  required>

                    </div>
                    
                    <div class="col-md-6 pull-left">
                        <label><?php echo e(translate('Transfer Date')); ?> <span class="text-danger">*</span></label>

                        <input type="date" class="form-control" name="date" placeholder="<?php echo e(translate('Purchase Date')); ?>"  required>

                    </div>

                    
                    
                    <div class="col-md-6 pull-left">
                        <label><?php echo e(translate('Remarks')); ?> <span class="text-danger">*</span></label>

                        <input type="text" class="form-control" name="remarks" placeholder="<?php echo e(translate('Remarks')); ?>"  required>

                    </div>
                    
                    <div class="clearfix"></div>
                </div>
            </div>
            

            <div class="mb-3 text-right">
                <button type="submit" name="button" class="btn btn-primary"><?php echo e(translate('Save Transfer')); ?></button>
            </div>
        </form>
    </div>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script type="text/javascript">
    function changeProduct(id){
       
        var product_id = $('#product_id').val();
        var wearhouse_id = $('#from_wearhouse_id').val();
        if(wearhouse_id === '' || wearhouse_id ===undefined || wearhouse_id === null){
            alert('Please select from wearhouse');
            return false;
        }
       $.ajax({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               url: "<?php echo e(route('purchase_orders.get_puracher_product')); ?>",
               type: 'POST',
               data: {
                product_id: product_id,
                wearhouse_id: wearhouse_id
               },
               //dataType: 'html',
               success: function(data) {
             $('#stock_qty').val(data.qty);
             $('#transfer_qty').attr('max', data.qty);
               
               }
           }); 
       
      }

    
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\bazarnao-v4-laravel-9\resources\views/backend/transfer/add.blade.php ENDPATH**/ ?>