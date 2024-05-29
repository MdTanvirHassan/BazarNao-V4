
<?php
$user_name = auth()->user()->name;
?>

<?php if($user_name == 'Super Admin' || auth()->user()->staff->role->name == 'Sales Executive'): ?>
$staff_role = 'Sales Executive';

<?php endif; ?>
<?php $__env->startSection('content'); ?>

<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header">
          <h1 class="h2 fs-16 mb-0"><?php echo e(translate('Order Details')); ?></h1>
        </div>
    <?php if($user_name == 'Delivery Department'): ?>
        <div class="card-header row gutters-5">
  			<div class="col text-center text-md-left">
  			</div>
              <?php
                  $delivery_status = $order->orderDetails->first()->delivery_status;
                  $payment_status = $order->orderDetails->first()->payment_status;
              ?>
          
  			   <div class="col-md-3 ml-auto">
                  <label for="update_delivery_status"><?php echo e(translate('Delivery Status')); ?></label>
                  <select class="form-control aiz-selectpicker"  data-minimum-results-for-search="Infinity" id="update_delivery_status">
                      <option value="pending" <?php if($delivery_status == 'pending'): ?> selected <?php endif; ?>><?php echo e(translate('Pending')); ?></option>
                      <option value="cancel" <?php if($delivery_status == 'cancel'): ?> selected <?php endif; ?>><?php echo e(translate('Cancel')); ?></option>
                      <option value="confirmed" <?php if($delivery_status == 'confirmed'): ?> selected <?php endif; ?>><?php echo e(translate('Confirmed')); ?></option> 
                      <option value="on_delivery" <?php if($delivery_status == 'on_delivery'): ?> selected <?php endif; ?>><?php echo e(translate('On delivery')); ?></option>
					  <option value=""></option>
                      <option value="delivered" <?php if($delivery_status == 'delivered'): ?> selected <?php endif; ?>><?php echo e(translate('Delivered')); ?></option>
                      <option value="received" <?php if($delivery_status == 'received'): ?> selected <?php endif; ?>><?php echo e(translate('Received')); ?></option>
                  </select>
  			</div>
  		</div>
    
        <?php elseif($user_name == 'Operational Department'): ?>
		 <div class="card-header row gutters-5">
  			<div class="col text-center text-md-left">
  			</div>
              <?php
                  $delivery_status = $order->orderDetails->first()->delivery_status;
                  $payment_status = $order->orderDetails->first()->payment_status;
              ?>
  			   <div class="col-md-3 ml-auto">
                  <label for="update_delivery_status"><?php echo e(translate('Delivery Status')); ?></label>
                  <select class="form-control aiz-selectpicker"  data-minimum-results-for-search="Infinity" id="update_delivery_status">
				  <option value=""></option>
                      <option value="on_delivery" <?php if($delivery_status == 'on_delivery'): ?> selected <?php endif; ?>><?php echo e(translate('On delivery')); ?></option>
                  </select>
  			</div>
  		</div>
		<?php elseif($user_name == 'Sales Department'): ?>
		 <div class="card-header row gutters-5">
  			<div class="col text-center text-md-left">
  			</div>
              <?php
                  $delivery_status = $order->orderDetails->first()->delivery_status;
                  $payment_status = $order->orderDetails->first()->payment_status;
              ?>
  			   <div class="col-md-3 ml-auto">
                  <label for="update_delivery_status"><?php echo e(translate('Delivery Status')); ?></label>
                  <select class="form-control aiz-selectpicker"  data-minimum-results-for-search="Infinity" id="update_delivery_status">
					  <option value=""></option>
					  <option value="pending" <?php if($delivery_status == 'pending'): ?> selected <?php endif; ?>><?php echo e(translate('Pending')); ?></option>
            <option value="confirmed" <?php if($delivery_status == 'confirmed'): ?> selected <?php endif; ?>><?php echo e(translate('Confirmed')); ?></option>
					  <option value="cancel" <?php if($delivery_status == 'cancel'): ?> selected <?php endif; ?>><?php echo e(translate('Cancel')); ?></option>
                  </select>
  			</div>
  		</div>
		<?php else: ?>
        <div class="card-header row gutters-5">
  			<div class="col text-center text-md-left">
  			</div>
              <?php
                  $delivery_status = $order->orderDetails->first()->delivery_status;
                  $payment_status = $order->orderDetails->first()->payment_status;
              ?>
            <div class="col-md-3 ml-auto">
                <label for="update_payment_status"><?php echo e(translate('Payment Status')); ?></label>
                <select class="form-control aiz-selectpicker"  data-minimum-results-for-search="Infinity" id="update_payment_status">
                <?php if($user_name == 'Super Admin' || $user_name == 'Accountant Malibagh' || $user_name == 'Accountant Mirpur' || $user_name == 'Account Department' || $user_name == 'Sales Executive'): ?>
                    <option value=""><?php echo e(translate('Select Payment Status')); ?></option>
                    <option value="paid"><?php echo e(translate('Paid')); ?></option>
                    <!-- <option value="unpaid"><?php echo e(translate('Unpaid')); ?></option> -->
                    <option value="partial"><?php echo e(translate('Partial Payment')); ?></option>
                    <?php endif; ?>
                </select>
            </div>
            <?php if($user_name == 'Super Admin'): ?>
  			     <div class="col-md-3 ml-auto">
                  <label for=update_delivery_status""><?php echo e(translate('Delivery Status')); ?></label>
                  <?php if($delivery_status != 'delivered' && $delivery_status != 'cancel'): ?>
                  <select class="form-control aiz-selectpicker"  data-minimum-results-for-search="Infinity" id="update_delivery_status">
                  <?php if($user_name == 'Super Admin' || $user_name == 'Account Department'): ?>
                  <?php if($delivery_status == 'pending'): ?>
                      <option value="pending" <?php if($delivery_status == 'pending'): ?> selected <?php endif; ?>><?php echo e(translate('Pending')); ?></option>
                      <option value="cancel" <?php if($delivery_status == 'cancel'): ?> selected <?php endif; ?>><?php echo e(translate('Cancel')); ?></option>
                      <option value="confirmed" <?php if($delivery_status == 'confirmed'): ?> selected <?php endif; ?>><?php echo e(translate('Confirmed')); ?></option>
                      <?php elseif($delivery_status == 'confirmed'): ?>
                      <option value="confirmed" <?php if($delivery_status == 'confirmed'): ?> selected <?php endif; ?>><?php echo e(translate('Confirmed')); ?></option>
                      <option value="cancel" <?php if($delivery_status == 'cancel'): ?> selected <?php endif; ?>><?php echo e(translate('Cancel')); ?></option>
                      <option value="on_delivery" <?php if($delivery_status == 'on_delivery'): ?> selected <?php endif; ?>><?php echo e(translate('On delivery')); ?></option>
                      <?php elseif($delivery_status == 'on_delivery'): ?>
                      <option value="on_delivery" <?php if($delivery_status == 'on_delivery'): ?> selected <?php endif; ?>><?php echo e(translate('On delivery')); ?></option>
                      <option value="delivered" <?php if($delivery_status == 'delivered'): ?> selected <?php endif; ?>><?php echo e(translate('Delivered')); ?></option>
                      <option value="received" <?php if($delivery_status == 'received'): ?> selected <?php endif; ?>><?php echo e(translate('Received')); ?></option>
                      <option value="cancel" <?php if($delivery_status == 'cancel'): ?> selected <?php endif; ?>><?php echo e(translate('Cancel')); ?></option>
                      <?php else: ?>
                      <option value="delivered" <?php if($delivery_status == 'delivered'): ?> selected <?php endif; ?>><?php echo e(translate('Delivered')); ?></option>
                      <option value="received" <?php if($delivery_status == 'received'): ?> selected <?php endif; ?>><?php echo e(translate('Received')); ?></option>
                      <?php endif; ?>
                      <?php else: ?>
                      <option value="pending" <?php if($delivery_status == 'pending'): ?> selected <?php endif; ?>><?php echo e(translate('Pending')); ?></option>
                      <option value="cancel" <?php if($delivery_status == 'cancel'): ?> selected <?php endif; ?>><?php echo e(translate('Cancel')); ?></option>
                      <option value="confirmed" <?php if($delivery_status == 'confirmed'): ?> selected <?php endif; ?>><?php echo e(translate('Confirmed')); ?></option>
                      <?php endif; ?>
                  </select>
                  <?php else: ?>
                    <input type="text" class="form-control" value="<?php echo e($delivery_status); ?>" disabled>
                <?php endif; ?>
  			</div>
        <?php endif; ?>
  		</div>
    
     <?php endif; ?>
    	<div class="card-body">
        <div class="row gutters-5">
  			<div class="col text-center text-md-left">
            <address>
                <?php if(!empty($order->shipping_address)): ?>
                <strong class="text-main"><?php echo e(json_decode($order->shipping_address)->name); ?></strong><br>
                <?php echo e(json_decode($order->shipping_address)->email ?? ''); ?><br>
                <?php echo e(json_decode($order->shipping_address)->phone ?? ''); ?><br>
                <?php echo e(json_decode($order->shipping_address)->address ?? ''); ?>, <?php echo e(json_decode($order->shipping_address)->city ?? ''); ?>, <?php echo e(json_decode($order->shipping_address)->postal_code ?? ''); ?><br>
                <?php echo e(json_decode($order->shipping_address)->country ?? ''); ?>

                <?php endif; ?>
               
            </address>
            <?php if($order->manual_payment && is_array(json_decode($order->manual_payment_data, true))): ?>
                <br>
                <strong class="text-main"><?php echo e(translate('Payment Information')); ?></strong><br>
                <?php echo e(translate('Name')); ?>: <?php echo e(json_decode($order->manual_payment_data)->name); ?>, <?php echo e(translate('Amount')); ?>: <?php echo e(single_price(json_decode($order->manual_payment_data)->amount)); ?>, <?php echo e(translate('TRX ID')); ?>: <?php echo e(json_decode($order->manual_payment_data)->trx_id); ?>

                <br>
                <a href="<?php echo e(uploaded_asset(json_decode($order->manual_payment_data)->photo)); ?>" target="_blank"><img src="<?php echo e(uploaded_asset(json_decode($order->manual_payment_data)->photo)); ?>" alt="" height="100"></a>
            <?php endif; ?>
  				</div>
  				<div class="col-md-4 ml-auto">
            <table>
        				<tbody>
            				<tr>
            					<td class="text-main text-bold"><?php echo e(translate('Order #')); ?></td>
            					<td class="text-right text-info text-bold">	<?php echo e($order->code); ?></td>
            				</tr>
            				<tr>
                                <td class="text-main text-bold"><?php echo e(translate('Order Status')); ?></td>
                                    <?php
                                      $status = $order->orderDetails->first()->delivery_status;
                                    ?>
            					<td class="text-right">
                                    <?php if($status == 'delivered'): ?>
                                        <span class="badge badge-inline badge-success"><?php echo e(translate(ucfirst(str_replace('_', ' ', $status)))); ?></span>
                                    <?php else: ?>
                                        <span class="badge badge-inline badge-info"><?php echo e(translate(ucfirst(str_replace('_', ' ', $status)))); ?></span>
                                    <?php endif; ?>
      					        </td>
            				</tr>
            				<tr>
            					<td class="text-main text-bold"><?php echo e(translate('Payment Status')); ?>	</td>
            					<td class="text-right"><?php echo e($payment_status); ?></td>
            				</tr>
            				<tr>
            					<td class="text-main text-bold"><?php echo e(translate('Order Date')); ?>	</td>
            					<td class="text-right"><?php echo e(date('d-m-Y h:i A', $order->date)); ?></td>
            				</tr>
                    <tr>
            					<td class="text-main text-bold"><?php echo e(translate('Total amount')); ?>	</td>
            					<td class="text-right">
            						<?php echo e(single_price($order->grand_total)); ?>

            					</td>
            				</tr>
                    <tr>
            					<td class="text-main text-bold"><?php echo e(translate('Payment method')); ?></td>
            					<td class="text-right"><?php echo e(ucfirst(str_replace('_', ' ', $order->payment_type))); ?></td>
            				</tr>
        				</tbody>
    				</table>
  				</div>
  			</div>
    		<hr class="new-section-sm bord-no">
    		<div class="row">
    			<div class="col-lg-12 table-responsive">
    				<table class="table table-bordered aiz-table invoice-summary">
        				<thead>
            				<tr class="bg-trans-dark">
                        <th class="min-col">#</th>
                        <th width="10%"><?php echo e(translate('Photo')); ?></th>
        					      <th class="text-uppercase"><?php echo e(translate('Description')); ?></th>
                        <th class="text-uppercase"><?php echo e(translate('Delivery Type')); ?></th>
              					<th  class="min-col text-center text-uppercase"><?php echo e(translate('Qty')); ?></th>
              					<th class="min-col text-center text-uppercase"><?php echo e(translate('Price')); ?></th>
        					       <th  class="min-col text-right text-uppercase"><?php echo e(translate('Total')); ?></th>
            				</tr>
        				</thead>
        				<tbody>
                    <?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($key+1); ?></td>
                        <td>
                          <?php if($orderDetail->product != null): ?>
                            <a href="<?php echo e(route('product', $orderDetail->product->slug)); ?>" target="_blank"><img height="50" src="<?php echo e(uploaded_asset($orderDetail->product->thumbnail_img)); ?>"></a>
                          <?php else: ?>
                            <strong><?php echo e(translate('N/A')); ?></strong>
                          <?php endif; ?>
                          </td>
                        <td>
                          <?php if($orderDetail->product != null): ?>
                            <strong><a href="<?php echo e(route('product', $orderDetail->product->slug)); ?>" target="_blank" class="text-muted"><?php echo e($orderDetail->product->getTranslation('name')); ?></a></strong>
                            <small><?php echo e($orderDetail->variation); ?></small>
                          <?php else: ?>
                            <strong><?php echo e(translate('Product Unavailable')); ?></strong>
                          <?php endif; ?>
                        </td>
                        <td>
                          <?php if($orderDetail->shipping_type != null && $orderDetail->shipping_type == 'home_delivery'): ?>
                            <?php echo e(translate('Home Delivery')); ?>

                          <?php elseif($orderDetail->shipping_type == 'pickup_point'): ?>

                            <?php if($orderDetail->pickup_point != null): ?>
                              <?php echo e($orderDetail->pickup_point->getTranslation('name')); ?> (<?php echo e(translate('Pickup Point')); ?>)
                            <?php else: ?>
                              <?php echo e(translate('Pickup Point')); ?>

                            <?php endif; ?>
                          <?php endif; ?>
                        </td>
                        <td class="text-center"><?php echo e($orderDetail->quantity); ?></td>
                        <td class="text-center"><?php echo e(single_price(($orderDetail->price+$orderDetail->discount)/$orderDetail->quantity)); ?></td>
                        <td class="text-center"><?php echo e(single_price($orderDetail->price+$orderDetail->discount)); ?></td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        				</tbody>
    				</table>
    			</div>
    		</div>
    		<div class="clearfix float-right">
    			<table class="table">
        			<tbody>
        			<tr>
        				<td>
        					<strong class="text-muted"><?php echo e(translate('Sub Total')); ?> :</strong>
        				</td>
        				<td>
        					<?php echo e(single_price($order->orderDetails->sum('price')+$order->orderDetails->sum('discount'))); ?>

        				</td>
        			</tr>
        			<tr>
        				<td>
        					<strong class="text-muted"><?php echo e(translate('Tax')); ?> :</strong>
        				</td>
        				<td>
        					<?php echo e(single_price($order->orderDetails->sum('tax'))); ?>

        				</td>
        			</tr>
                    <tr>
        				<td>
        					<strong class="text-muted"><?php echo e(translate('Shipping')); ?> :</strong>
        				</td>
        				<td>
        					<?php echo e(single_price($order->orderDetails->sum('shipping_cost'))); ?>

        				</td>
        			</tr>
                    <tr>
        				<td>
        					<strong class="text-muted"><?php echo e(translate('Coupon')); ?> :</strong>
        				</td>
        				<td>
        					<?php echo e(single_price($order->coupon_discount)); ?>

        				</td>
        			</tr>
					<tr>
        				<td>
        					<strong class="text-muted"><?php echo e(translate('Discount')); ?> :</strong>
        				</td>
        				<td class="text-muted h5">
						<?php if($order->order_from=='Web'): ?>
							<?php echo e(single_price(\App\Models\Customer_ledger::where('type', 'Discount')->where('order_id',$order->id)->sum('credit'))); ?>

						<?php else: ?>
							<?php echo e(single_price($order->special_discount)); ?>

						<?php endif; ?>
        				</td>
        			</tr>
        			<tr>
        				<td>
        					<strong class="text-muted"><?php echo e(translate('TOTAL')); ?> :</strong>
        				</td>
        				<td class="text-muted h5">
        					<?php echo e(single_price($order->grand_total)); ?>

        				</td>
        			</tr>
              <tr>
        				<td>
        					<strong class="text-muted"><?php echo e(translate('Paid')); ?> :</strong>
        				</td>
        				<td class="text-muted h5">
                <?php 
                $paid = 0;
                    if(!empty($order->payment_details)){
                      $payment = json_decode($order->payment_details);
                      if(!empty($payment)){
                        $paid = $payment->amount;
                      }
                    }
                ?>
        					<?php echo e(single_price($paid)); ?>

                  <input type="hidden" id="total_paid" value="<?php echo e($paid); ?>">
        				</td>
        			</tr>
              <tr>
        				<td>
        					<strong class="text-muted"><?php echo e(translate('Due')); ?> :</strong>
        				</td>
        				<td class="text-muted h5">
                <?php echo e(single_price($order->grand_total-$paid)); ?><input type="hidden" id="total_due" value="<?php echo e($order->grand_total-$paid); ?>">
        				</td>
        			</tr>
                    
        			</tbody>
    			</table>
          <div class="text-right no-print">
            <a target="_blank" href="<?php echo e(route('invoice.download', $order->id)); ?>" type="button" class="btn btn-icon btn-light"><i class="las la-print"></i></a>
          </div>
    		</div>

    	</div>
    </div>
    <div class="modal fade" id="payment-modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel"><?php echo e(translate('Payment')); ?></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <div class="p-3">
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(translate('Amount')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <input type="number" id="payment_amount" value="<?php echo e($order->grand_total); ?>" class="form-control textarea-autogrow mb-3" placeholder="<?php echo e(translate('Amount')); ?>" rows="1" name="amount" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(translate('Payment Date')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <input type="date" id="payment_date" value="" class="form-control textarea-autogrow mb-3" placeholder="<?php echo e(translate('Date')); ?>" rows="1" name="date" required>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="save_payment" onclick="save_payment()" class="btn btn-primary"><?php echo e(translate('Save')); ?></button>
                </div>
        </div>
    </div>
    
</div>

<div class="modal fade" id="deliveryboy-modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-zoom" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h6 class="modal-title" id="exampleModalLabel"><?php echo e(translate('Select Delivery Man')); ?></h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
              <div class="modal-body">
                  <div class="p-3">
                      <div class="row">
                          <div class="col-md-2">
                              <label><?php echo e(translate('Select Delivery Man')); ?></label>
                          </div>
                          <div class="col-md-10">
                              <select class="form-control" id="delivery_boy">
                                <option value="">Select Delivery Man</option>
                                <?php $__currentLoopData = \App\Models\Staff::where('role_id','10')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($u->user->id); ?>"><?php echo e($u->user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                          </div>
                      </div>
                      
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" id="save_payment" onclick="save_delivery_man()" class="btn btn-primary"><?php echo e(translate('Save')); ?></button>
              </div>
      </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        $('#update_delivery_status').on('change', function(){
            var order_id = <?php echo e($order->id); ?>;
            var status = $('#update_delivery_status').val();
            if(status=='on_delivery'){
              alert('Please only utilize on delivery from the order scanning ');
              // $('#deliveryboy-modal').modal('show');
            }else if(status=='delivered'){
              $.post('<?php echo e(route('orders.product_stock_qty_check')); ?>',
               {_token:'<?php echo e(@csrf_token()); ?>',
               order_id:order_id,status:status},
                function(data){
                  if(data.message == 'true'){
                    AIZ.plugins.notify('warning', data.product+'Stock Qty Not Enough for Delivery');
                    return false;
                  }else{
                    $.post('<?php echo e(route('orders.update_delivery_status')); ?>', {_token:'<?php echo e(@csrf_token()); ?>',order_id:order_id,status:status}, function(data){
                    AIZ.plugins.notify('success', '<?php echo e(translate('Delivery status has been updated')); ?>');
                 });
              }
                });
          }else{
            $.post('<?php echo e(route('orders.update_delivery_status')); ?>', {_token:'<?php echo e(@csrf_token()); ?>',order_id:order_id,status:status}, function(data){
                    AIZ.plugins.notify('success', '<?php echo e(translate('Delivery status has been updated')); ?>');
                });
          }
        });

        $('#update_payment_status').on('change', function(){
            var order_id = <?php echo e($order->id); ?>;
            var dueAmount = parseInt($('#total_due').val());
            
            var status = $('#update_payment_status').val();
            if(status=='paid'){
              $('#payment-modal').modal('show');
              $('#payment_amount').val(dueAmount);
              $('#payment_amount').attr('disabled', true);
            }else if(status=='partial'){
              
              $('#payment-modal').modal('show');
              $('#payment_amount').val('');
              $('#payment_amount').val(dueAmount);
              $('#payment_amount').attr('disabled', false);
            }else if(status=='unpaid'){
              $.post('<?php echo e(route('orders.update_payment_status')); ?>', {_token:'<?php echo e(@csrf_token()); ?>',order_id:order_id,status:status}, function(data){
                AIZ.plugins.notify('success', '<?php echo e(translate('Payment status has been updated')); ?>');
                location.reload().setTimeOut(500);
            });
            }
            
        });
        
        function save_payment(){
          $('#save_payment').attr('disabled', true);
          var dueAmount = parseInt($('#total_due').val());
          
          var order_id = <?php echo e($order->id); ?>;
            var status = $('#update_payment_status').val();
            var payment_amount = parseInt($('#payment_amount').val());
            var payment_date = $('#payment_date').val();

            if(payment_amount > dueAmount){
            alert('Paid amount must be less than or equal from due amount');
            $('#payment_amount').val('');
            $('#save_payment').attr('disabled', false);
            return false;
            }
            
            if(payment_date == ''){
              alert('Please enter the date');
              $('#save_payment').attr('disabled', false);
              return false;
            }
            
          $.post('<?php echo e(route('orders.update_payment_status')); ?>', {_token:'<?php echo e(@csrf_token()); ?>',payment_amount:payment_amount,payment_date:payment_date,order_id:order_id,status:status}, function(data){
                AIZ.plugins.notify('success', '<?php echo e(translate('Payment status has been updated')); ?>');
                $('#payment-modal').modal('hide')
                location.reload().setTimeOut(500);
            });
        }
        
        function save_delivery_man(){
          var order_id = <?php echo e($order->id); ?>;
          var status = 'on_delivery';
          var delivery_boy = $('#delivery_boy').val();
            
            $.post('<?php echo e(route('orders.update_delivery_status')); ?>', {_token:'<?php echo e(@csrf_token()); ?>',order_id:order_id,status:status,delivery_boy:delivery_boy}, function(data){
                    AIZ.plugins.notify('success', '<?php echo e(translate('Delivery status has been updated')); ?>');
                    $('#deliveryboy-modal').modal('hide')
                    location.reload().setTimeOut(500);
                });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\bazarnao-v4-laravel-9\resources\views/backend/sales/all_orders/show.blade.php ENDPATH**/ ?>