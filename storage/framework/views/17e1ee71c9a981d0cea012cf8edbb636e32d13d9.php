

<?php $__env->startSection('content'); ?>
<style>
    #item_table .form-control{
        padding: 2px;
    }
</style>

<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6"><?php echo e(translate('Add New Purchase')); ?></h5>
</div>
<div class="">
    <div class="">
        <form class="form form-horizontal mar-top" action="<?php echo e(route('purchase_orders.store')); ?>" method="POST" enctype="multipart/form-data" id="choice_form">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="added_by" value="admin">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6"><?php echo e(translate('Supplier Information')); ?></h5>
                </div>
                <div class="card-body">

                    <div class="col-md-6 pull-left">
                        <label><?php echo e(translate('Supplier Name')); ?> <span class="text-danger">*</span></label>

                        <select class="form-control aiz-selectpicker" name="supplier_id" id="supplier_id" data-live-search="true" required>
                        <option value="">Select Supplier</option>
                            <?php $__currentLoopData = $supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($supp->supplier_id); ?>"><?php echo e($supp->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                    </div>
                    <div class="col-md-6 pull-left">
                        <label><?php echo e(translate('Purchase Date')); ?> <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="purchase_date" placeholder="<?php echo e(translate('Purchase Date')); ?>" onchange="update_sku()" required>
                    </div>

                    <div class="col-md-6 pull-left">
                        <label><?php echo e(translate('Remarks')); ?> <span class="text-danger">*</span></label>

                        <input type="text" class="form-control" name="remarks" placeholder="<?php echo e(translate('Remarks')); ?>" onchange="update_sku()" required>

                    </div>
                    <div class="col-md-6 pull-left">
    						<label for="name"><?php echo e(translate('Wearhouse')); ?> <span class="text-danger">*</span></label>
    						<select name="wearhouse_id" id="wearhouse_id" class="form-control" required>
                                <option value=""><?php echo e(translate('Select Wearhouse')); ?></option>
                                <?php $__currentLoopData = $wearhouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
    					</div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6"><?php echo e(translate('Product Information')); ?></h5>
                </div>
                <div class="card-body">
                    <table id="item_table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th style="width:42%;">Product</th>
                                <th style="width:15%;">Description</th>
                                <th style="width:8%;">Exp: Date</th>
                                <th style="width:10%;">Stock</th>
                                <th style="width:9%;">Quantity</th>
                                <th style="width:10%;">Unit Price</th>
                                <th style="width:5%;">Total</th>

                                <th style="width:5%;"><a href="javascript:" onclick="addItemRow()" class="btn btn-sm btn-primary"><i class="las la-plus"></i></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="row_1">
                                <td>
                                    <select class="form-control aiz-selectpicker" onchange="changeProduct(this)" name="product[]" id="product_1" data-live-search="true" required>
                                        <option value="">Select Product</option>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option data-qty="<?php echo e($product->current_stock); ?>" data-price="<?php echo e($product->purchase_price); ?>" value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" id="desc_1" name="desc[]" class="form-control">
                                </td>
                                <td>
                                    <input type="date" id="exp_1" name="exp[]" class="form-control">
                                </td>
                                <td>
                                    <input disabled type="text" id="stock_1" name="stock[]" class="form-control">
                                </td>
                                <td>
                                    <input type="number" id="qty_1" onchange="changePrice(this)" name="qty[]" class="form-control">
                                </td>
                                <td>
                                    <input type="text" id="price_1" onchange="changePrice(this)" name="price[]" class="form-control">
                                </td>
                                <td id="total_1">

                                </td>
                                <td>
                                    <a href="javascript:" onclick="removeItemRow(1)" class="btn btn-sm btn-danger"><i class="las la-minus"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="6" style="text-align:right">Total
                                <input type="hidden" name="total" id="total_input">
                                </th>
                                <th id="total"></th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>

            <div class="mb-3 text-right">
                <button type="submit" name="button" class="btn btn-primary"><?php echo e(translate('Save Purchase')); ?></button>
            </div>
        </form>
    </div>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script type="text/javascript">
    function changeProduct(e){
        var id = $(e).attr('id').split('_')[1];
        var product_id = $('#product_'+id).val();
        var wearhouse_id = $('#wearhouse_id').val();
        var price = Number($(e).find('option:selected').data('price'));
        if(wearhouse_id === '' || wearhouse_id ===undefined || wearhouse_id === null){
            alert('Please select wearhouse');
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
                
                var total = price * 1;
        $('#qty_' + id).val(1);
        $('#price_' + id).val(price);
        $('#stock_' + id).val(data.qty);
        $('#total_' + id).html(total);        
               }
           }); 
       
      }
    // function changeProduct(e) {
    //     var id = $(e).attr('id').split('_')[1];
    //     var price = Number($(e).find('option:selected').data('price'));
    //     var stock = $(e).find('option:selected').data('qty');
    //     var qty = Number($('#qty_' + id).val());
    //     if (!qty)
    //         qty = 1;
    //     var total = price * qty;
    //     $('#qty_' + id).val(qty);
    //     $('#price_' + id).val(price);
    //     $('#stock_' + id).val(stock);
    //     $('#total_' + id).html(total);
    //     calculateTotal();
    // }

    function changePrice(e) {
        var id = $(e).attr('id').split('_')[1];
        var price = Number($('#price_' + id).val());
        var qty = Number($('#qty_' + id).val());
        if (!qty)
            qty = 1;
        var total = price * qty;
        $('#total_' + id).html(total);
        calculateTotal();
    }

    function calculateTotal() {
        var total = 0;
        $('#item_table').find('tbody>tr').each(function() {
            var id = $(this).attr('id').split('_')[1];
            total += Number($('#total_' + id).html());
        });
        $('#total').html(total);
        $('#total_input').val(total);
    }

    function addItemRow() {
        var row = $('#item_table').find('tbody>tr').length;
        row++;
        var str = "<tr id='row_" + row + "'>";
        str += '<td><select class="form-control aiz-selectpicker"  onchange="changeProduct(this)" name="product[]" id="product_' + row + '" data-live-search="true" required><option value="">Select Product</option>';
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        str += '<option data-qty="<?php echo e($product->current_stock); ?>" data-price="<?php echo e($product->purchase_price); ?>" value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>';
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        str += '</select> </td>';
        str += '<td> <input type="text" id="desc_' + row + '" name="desc[]" class="form-control"> </td>';
        str += '<td> <input type="date" id="exp_' + row + '" name="exp[]" class="form-control"> </td>';
        str += '<td><input disabled type="text" id="stock_' + row + '" name="stock[]" class="form-control"></td>';
        str += ' <td><input type="number" id="qty_' + row + '" onchange="changePrice(this)" name="qty[]" class="form-control"></td>';
        str += '<td><input type="text" id="price_' + row + '" onchange="changePrice(this)" name="price[]" class="form-control"></td>';
        str += '<td id="total_' + row + '"></td>';
        str += ' <td><a href="javascript:" onclick="removeItemRow(' + row + ')" class="btn btn-sm btn-danger"><i class="las la-minus"></i></a></td>';
        str += "</tr>";

        $('#item_table').find('tbody').append(str);
        $('.aiz-selectpicker').selectpicker();
        calculateTotal();
    }

    function removeItemRow(id) {
        if (confirm('Are you sure to Remove ? ') == true) {
            $('#row_' + id).remove();
            calculateTotal();
        }
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\bazarnao-v4-laravel-9\resources\views/backend/purchase_order/add.blade.php ENDPATH**/ ?>