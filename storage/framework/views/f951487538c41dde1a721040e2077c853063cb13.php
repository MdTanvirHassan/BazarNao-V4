
<style>
    tr,
    th,
    td {
        padding: 3px !important;
    }

    th {
        background: #AE3C86;
        color: #fff;
        font-weight: bold
    }

    li.nav-item {
        width: 100%;
    }

    .navbar-nav {
        width: 100%;
    }
    .form-control {
    padding: 10px 2px !important;
}
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/2.4.85/css/materialdesignicons.css"
    rel="stylesheet" />

<?php $__env->startSection('content'); ?>

    <div class="row gutters-10">
        <div class="col-lg-12">

            <div id="accordion">
          
                <div class="card border-bottom-0">

                         <!-- form1 start -->
                    
                <form action="<?php echo e(route('staff.customer_service_activity_save')); ?>" id="customer_service_activity_save" method="post">
                            <?php echo csrf_field(); ?>
                        <table class="table table-bordered">
                            <tr>
                                <th>Sl</th>
                                <th>Order NO</th>
                                <th>Name</th>
                                <th>Customer ID</th>
                                <th>Exe. Name</th>
                                <th>Mobile No</th>
                                <th>Address</th>
                                <th>Amount</th>
                                <th>Warehouse</th>
                                <th>Status</th>
                                
                            </tr>
                            <tbody id="activity_table1">
                                <?php if(count($pending_order)>0): ?>
                                    <?php $__currentLoopData = $pending_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $shipping_address = json_decode($activity->shipping_address);
                                    if(!empty($activity->user_id)){
                                        $c_id = $activity->customer_id;
                                    }else{
                                        $c_id = $activity->guest_id;
                                    }
                                    $staff_name = getUsernameBycustomerstaffId($activity->staff_id);
                                    ?>
                                    <tr id="row_<?php echo e($key+1); ?>">
                                        <td><?php echo e($key+1); ?></td>
                                        <td>
                                            <input  name="order_id[<?php echo e($key+1); ?>]" value="<?php echo e($activity->id); ?>"  type="hidden" class="form-control" placeholder="Enter OrderNo">
                                            <input  name="order_no[<?php echo e($key+1); ?>]" value="<?php echo e($activity->code); ?>" onkeyup="getorder_id(<?php echo e($key+1); ?>)" type="text" class="form-control order_no" placeholder="Enter OrderNo" readonly>
                                            
                                         </td>
                                        <td>
                                            <input name="name[<?php echo e($key+1); ?>]" value="<?php echo e(!empty($shipping_address->name) ? $shipping_address->name :''); ?>" type="text" class="form-control" placeholder="Enter Name" readonly>
                                         </td>

                                        <td>
                                            <input name="customer_id[<?php echo e($key+1); ?>]" value="<?php echo e($c_id); ?>" type="text" class="form-control" placeholder="Enter ID" readonly>
                                         </td>
                                        <td>
                                            <input name="executive_name[<?php echo e($key+1); ?>]" value="<?php echo e($staff_name); ?>" type="text" class="form-control" placeholder="Enter ID" readonly>
                                         </td>
                                         <td>
                                            <input name="phone[<?php echo e($key+1); ?>]" value="<?php echo e(!empty($shipping_address->phone) ?$shipping_address->phone:''); ?>" type="number" class="form-control" placeholder="Enter Phone" readonly>
                                         </td>
                                       
                                        <td>
                                            <input name="address[<?php echo e($key+1); ?>]" value="<?php echo e(!empty($shipping_address->address) ?$shipping_address->address:''); ?>" type="text" class="form-control" title="<?php echo e(!empty($shipping_address->address)?$shipping_address->address:''); ?>" placeholder="Enter Address" readonly>
                                         </td>
                                        
                                         <td>
                                            <input name="amount[<?php echo e($key+1); ?>]" value="<?php echo e($activity->grand_total); ?>" type="number" class="form-control" placeholder="Enter Amount" readonly>
                                         </td>
                                       
                                        <td>
                                         <select class="form-control" name="warehouse[<?php echo e($key+1); ?>]" id="warehouse_id_<?php echo e($key+1); ?>" onchange="update_warehouse(this.value,'<?php echo e($activity->id); ?>')">
                                        <option value="">Select One</option>
                                        <?php $__currentLoopData = \App\Models\Wearhouse::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehousees): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option  <?php if($activity->warehouse == $warehousees->id): ?> <?php echo e('selected'); ?> <?php endif; ?> value="<?php echo e($warehousees->id); ?>" ><?php echo e($warehousees->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                         </td>

                                         <td>
                                            <select class="form-control" name="status[<?php echo e($key+1); ?>]" onchange="update_delivery_status(this.value,'<?php echo e($activity->id); ?>',<?php echo e($key+1); ?>)">
                                            <?php if($activity->delivery_status=='pending'): ?>
                                             <option <?php if($activity->delivery_status=='pending'): ?> selected <?php endif; ?> value="pending">Pending</option>
                                             <option <?php if($activity->delivery_status=='confirmed'): ?> selected <?php endif; ?> value="confirmed">Confirm</option>
                                             <option <?php if($activity->delivery_status=='cancel'): ?> selected <?php endif; ?> value="cancel">Cancel</option>
                                             <?php elseif($activity->delivery_status=='confirmed' || $activity->delivery_status=='cancel'): ?>
                                             <option <?php if($activity->delivery_status=='pending'): ?> selected <?php endif; ?> value="pending">Pending</option>
                                             <option <?php if($activity->delivery_status=='confirmed'): ?> selected <?php endif; ?> value="confirmed">Confirm</option>
                                             <option <?php if($activity->delivery_status=='cancel'): ?> selected <?php endif; ?> value="cancel">Cancel</option>
                                             <?php elseif($activity->delivery_status=='on_delivery'): ?>
                                             <option <?php if($activity->delivery_status=='on_delivery'): ?> selected <?php endif; ?>  value="on_delivery">On Delivery</option>
                                             <option <?php if($activity->delivery_status=='cancel'): ?> selected <?php endif; ?> value="cancel">Cancel</option>
                                             <?php elseif($activity->delivery_status=='delivered'): ?>
                                                <option <?php if($activity->delivery_status=='delivered'): ?> selected <?php endif; ?>  value="delivered">Delivered</option>
                                             <?php endif; ?>
                                            </select>
                                         </td>
                                         
                                     </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                            <tr id="row_1">
                               <td colspan="10">No Data Found</td>
                               
                            </tr>
                            <?php endif; ?>
                            </tbody>
                            
                        </table>
                        <!-- <input type="submit"   class="btn btn-sm btn-primary pull-right" value="Save Activity"> -->
                    </form>
                    <!-- form1 end -->


                  
                </div>
            </div>
        </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function activity_save(id){
            $('#'+id).submit();
        }
        function toggleChevron(e) {
            $(e.target)
                .prev('.card-header')
                .find("i.mdi")
                .toggleClass('mdi-chevron-down mdi-chevron-up');
        }

        $('#accordion').on('hidden.bs.collapse', toggleChevron);
        $('#accordion').on('shown.bs.collapse', toggleChevron);

        
        function addRow2(){
            var row = $('#activity_table').find('tr').length;
            row++;
            var str = '<tr id="row2_'+row+'"><td>'+row+'</td><td><input onkeyup="get_byphone('+row+')" name="phone['+row+']" type="text" class="form-control phone" placeholder="Enter Phone"></td> <input  name="type['+row+']" value="1"  type="hidden" class="form-control">';
                str += '<td><input name="name['+row+']" type="text" class="form-control" placeholder="Enter Name"></td><td><input name="id['+row+']" type="text" class="form-control" placeholder="Enter ID"></td><td><input name="area['+row+']" type="text" class="form-control" placeholder="Enter Area"></td>';
                str += '<td><input name="address['+row+']" type="text" class="form-control" placeholder="Enter Address"></td><td><input name="comment['+row+']" type="text" class="form-control" placeholder="Enter Comment"></td><td> <input name="complain['+row+']" type="text" class="form-control" placeholder="Enter Complain"></td>';
                str += '<td><select class="form-control" name="order_confirm['+row+']"><option value="">Select One</option><option value="yes">Yes</option><option value="no">No</option></select></td>';
                str += '<td><input name="order_id['+row+']" type="text" class="form-control" placeholder="Enter Order ID"></td><td><a href="javascript:" onclick="removeRow2('+row+')" class="btn btn-xs btn-danger"><i class="las la-minus"></i></a></td></tr>';
                $('#activity_table').append(str);
        }
        function removeRow2(row){
            var row = $('#row2_'+row).remove();
            $('#activity_table').find('tr').each(function(i,v){
                $(v).attr('id','row2_'+(i+1));
                $(v).find('td').eq(0).html((i+1));
                $(v).find('td').eq(10).html('<a href="javascript:" onclick="removeRow2('+(i+1)+')" class="btn btn-xs btn-danger"><i class="las la-minus"></i></a>');
            })
            
        }


        
function get_byphone(row){
    
    site_url = get_site_url();
   
    var token = "<?php echo e(csrf_token()); ?>";
    var phone = $('#row2_'+row).find('.phone').val();

      if(phone.length>=11){
          $.ajax({
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              url: site_url + '/get_customer_by_phone',
                 type: "POST",
                 data: {
                phonenumber:phone,
                },
  
              success: function (data) {
                $('#row2_'+row).find('td').eq(2).find('input').val(data.name);
                $('#row2_'+row).find('td').eq(3).find('input').val(data.customer_id);
                $('#row2_'+row).find('td').eq(4).find('input').val(data.areaname);
                $('#row2_'+row).find('td').eq(5).find('input').val(data.address);
                
              }
          });
      }
  
  }

  // for form2 end

  function update_delivery_status(status,order_id,key){
            let warehouse_id = $('#warehouse_id_'+key).val();
            if(status=='confirmed'){
                if(warehouse_id == ''){
                alert('Please select warehouse');
                return true;
            }
            }
            if(status=='on_delivery'){
                alert('Only From Online Order Scan');
            }
           
            
            if(status=='cancel'){
                $('#cancel_order_id').val(order_id);
              $('#deliveryboy-modal').modal('show');
            }else{
            $.post('<?php echo e(route('orders.update_delivery_status')); ?>', {_token:'<?php echo e(@csrf_token()); ?>',order_id:order_id,status:status}, function(data){
                    AIZ.plugins.notify('success', '<?php echo e(translate('Delivery status has been updated')); ?>');
                    location.reload();
                });
            }
        }

        function save_delivery_man(){
          let order_id = $('#cancel_order_id').val();
            let status = 'cancel';
            let reason_of_cancel = $('#reason_of_cancel').val();
            
            $.post('<?php echo e(route('orders.update_delivery_status')); ?>', {_token:'<?php echo e(@csrf_token()); ?>',order_id:order_id,status:status,reason_of_cancel:reason_of_cancel}, function(data){
                    AIZ.plugins.notify('success', '<?php echo e(translate('Delivery status has been updated')); ?>');
                    $('#deliveryboy-modal').modal('hide')
                    location.reload().setTimeOut(500);
                });
        }

        function update_warehouse(id,order_id){
                $.post('<?php echo e(route('orders.update_warehouse')); ?>', {_token:'<?php echo e(@csrf_token()); ?>',order_id:order_id,warehouse_id:id}, function(data){
                    AIZ.plugins.notify('success', '<?php echo e(translate('Warehouse has been updated')); ?>');
                });
        }
    
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\bazarnao-v4-laravel-9\resources\views/backend/sales/all_orders/pending_orders.blade.php ENDPATH**/ ?>