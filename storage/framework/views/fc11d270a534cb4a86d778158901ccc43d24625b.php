<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($order->code); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="UTF-8">
	<style media="all">
        @page {
			margin: 0;
			padding:0;
		}
		body{
			font-size: 0.875rem;
            font-family: '<?php echo  $font_family ?>';
            font-weight: normal;
            direction: <?php echo  $direction ?>;
            text-align: <?php echo  $text_align ?>;
			padding:0;
			margin:0; 
		}
		.gry-color *,
		.gry-color{
			color:#000000;
		}
		table{
			width: 100%;
		}
		table th{
			font-weight: normal;
		}
		table.padding th{
			padding: .25rem .7rem;
		}
		table.padding td{
			padding: .25rem .7rem;
		}
		table.sm-padding td{
			padding: .1rem .7rem;
		}
		.border-bottom td,
		.border-bottom th{
			border-bottom:1px solid #eceff4;
			font-size:16px;
		}
		.text-left{
			text-align:<?php echo  $text_align ?>;
		}
		.text-right{
			text-align:<?php echo  $not_text_align ?>;
		}
			footer {
                position: fixed; 
                bottom: 0px; 
                left: 0px; 
                right: 0px;
                height: 50px; 
                text-align: center;
                line-height: 35px;
            }
			.prd td{
				font-size:17px;
			}
	</style>
</head>
<body>
<div>
		<?php
			$logo = get_setting('header_logo');


			if($order->user_id != null)
					$customer_id = \App\Models\Customer::where('user_id', $order->user_id)->first()->customer_id;
					else
					$customer_id = 'Guest ('.$order->guest_id.')';
		?>
		 
		<div style="background: #eceff4;padding: 2.5rem;padding-bottom:0;">
			<table>
				<tr>
					<td>
						<?php if($logo != null): ?>
							<img loading="lazy"  src="<?php echo e(uploaded_asset($logo)); ?>" height="60" style="display:inline-block;">
						<?php else: ?>
							<img loading="lazy"  src="<?php echo e(static_asset('assets/img/logo.png')); ?>" height="60" style="display:inline-block;">
						<?php endif; ?>
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td style="font-size: 1.2rem;width:27%" class="strong"><?php echo e(get_setting('site_name')); ?></td>
					<td class="text-right" style="width:50%"></td>
				</tr>
				<tr>
					<td class="gry-color small" style="width:27%"><?php echo e(get_setting('contact_address')); ?></td>
					<td class="text-right"><span class="gry-color small"><?php echo e(translate('Customer ID')); ?>:</span> <span class="strong"><?php echo e($customer_id); ?></span></td>
				</tr>
				<tr>
					<td class="gry-color small" style="width:27%"><?php echo e(translate('Email')); ?>: <?php echo e(get_setting('contact_email')); ?></td>
					<td class="text-right small" style="width:50%"><span class="gry-color small"><?php echo e(translate('Order ID')); ?>:</span> <span class="strong"><?php echo e($order->code); ?></span></td>
				</tr>
				<tr>
					<td class="gry-color small" style="width:27%"><?php echo e(translate('Phone')); ?>: <?php echo e(get_setting('contact_phone')); ?></td>
					<td class="text-right small" style="width:50%"><span class="gry-color small"><?php echo e(translate('Order Date')); ?>:</span> <span class=" strong"><?php echo e(date('d-m-Y', $order->date)); ?></span></td>
				</tr>
				<tr>
					<td class="gry-color small" style="width:27%"><?php echo e(translate('Bkash No')); ?>: <?php echo e(get_setting('bkash_no')); ?> , <?php echo e(translate('Nagad No')); ?>: <?php echo e(get_setting('nagad_no')); ?></td>
					
				</tr>
			</table>

		</div>

		<div style="padding: 2.5rem;padding-bottom: 0;padding-top:5px;">
            <table style="width:35%">
				<?php
					$shipping_address = json_decode($order->shipping_address);
					if(!empty($order->payment_details) && $order->payment_type =='bkash'){
                      $payment = json_decode($order->payment_details);
                      if(!empty($payment)){
                        if(!empty($payment->paymentID)){
							$payment_type = 'bkash';
						}else{
							$payment_type = ucfirst('Nagad');
						}
                      }
                    }else{
						$payment_type = $order->payment_type;
					}
				?>
				if($order->order_from != 'POS'){
					
				}
				<tr><td class="strong small gry-color" style="width:30%"><?php echo e(translate('Bill to')); ?>:</td></tr>
				<tr><td class="strong"><?php echo e($shipping_address->name); ?></td></tr>
				<?php if($order->order_from !='POS'): ?>
				<tr><td class="gry-color small" style="width:30%"><?php echo e($shipping_address->address); ?>,<br> <?php echo e($shipping_address->city ? $shipping_address->city : ''); ?>, <?php echo e($shipping_address->country); ?></td></tr>
				<tr><td class="gry-color small" style="width:30%"><?php echo e(translate('Email')); ?>: <?php echo e($shipping_address->email); ?></td></tr>
				<tr><td class="gry-color small" style="width:30%"><?php echo e(translate('Phone')); ?>: <?php echo e($shipping_address->phone); ?></td></tr>
				<?php endif; ?>
				
				<?php if($order->payment_type =='cash_on_delivery'): ?>
				<tr><td class="gry-color small" style="width:30%"><?php echo e(translate('Payment Method')); ?>: <?php echo e('Cash on Delivery'); ?></td></tr>
				<?php else: ?>
				<tr><td class="gry-color small" style="width:30%"><?php echo e(translate('Payment Method')); ?>: <?php echo e($payment_type); ?></td></tr>
				<?php endif; ?>
			</table>
		</div>

	    <div style="padding: 2.5rem;">
			<table class="padding text-left small border-bottom">
				<thead>
	                <tr class="gry-color" style="background: #eceff4;">
					<td>#</td>
	                    <td class="gry-color small"  style="font-weight:bold;width:500px;text-align:center"><?php echo e(translate('Product Name')); ?></td>
	                    <td class="gry-color small" style="text-align:center;font-weight:bold;width:40px"><?php echo e(translate('Qty')); ?></td>
	                    <td class="gry-color small" style="text-align:center;font-weight:bold;width:100px"><?php echo e(translate('Unit Price')); ?></td>
	                    <td class="text-right small" style="font-weight:bold;width:120px"><?php echo e(translate('Total')); ?></td>
						<td class="text-right small" style="font-weight:bold;width:100px"><?php echo e(translate('Discount')); ?></td>
						<td class="text-right small" style="font-weight:bold;width:150px"><?php echo e(translate('Total Amount')); ?></td>
	                </tr>
				</thead>
				<tbody class="strong">
				<?php
					$total = 0;
					$subtotal = 0;
					$totalDisc = 0;
					$special = 0;
				?>
	                <?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                <?php if($orderDetail->product != null): ?>
								<?php
									$total += $orderDetail->price+$orderDetail->tax;
									$subtotal += ($orderDetail->price+$orderDetail->discount)+$orderDetail->tax;
									$totalDisc += $orderDetail->discount;
									$special += $orderDetail->special_discount;
								?>
							<tr class="prd">
							 <td><?php echo e($key+1); ?></td>
								<td class="gry-color small"><?php echo e($orderDetail->product->getTranslation('name')); ?> <?php if($orderDetail->variation != null): ?> (<?php echo e($orderDetail->variation); ?>) <?php endif; ?></td>
								<td class="gry-color" style="text-align:center"><?php echo e($orderDetail->quantity); ?></td>
								<td class="gry-color currency" style="text-align:center"><?php echo e(single_price(($orderDetail->price+$orderDetail->discount)/$orderDetail->quantity)); ?></td>
			                    <td class="text-right currency"><?php echo e(single_price(($orderDetail->price+$orderDetail->discount)+$orderDetail->tax)); ?></td>
								<td class="text-right currency"><?php echo e(single_price($orderDetail->discount)); ?></td>
								<td class="text-right currency"><?php echo e(single_price(($orderDetail->price)+$orderDetail->tax)); ?></td>
							</tr>
		                <?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td style="text-align:right;font-weight:bold" colspan="4">Total</td>
						<td class="text-right currency" style="font-weight:bold"><?php echo e(single_price($subtotal)); ?></td>
						<td class="text-right currency" style="font-weight:bold"><?php echo e(single_price($totalDisc)); ?></td>
						<td class="text-right currency" style="font-weight:bold"><?php echo e(single_price($total)); ?></td>
					</tr>
	            </tbody>
			</table>
		</div>

	    <div style="padding:0 2.5rem;">
		<div style="width:50%;float:left;">
		<?php if(!empty($shipping_address->note)): ?>
					<b style="width:100%;text-align:center;">Note : <?php echo e($shipping_address->note); ?></b>
						<?php endif; ?>
		</div>
		<div style="width:50%;float:right;">
	        <table style="width: 70%;margin-left:auto;" class="text-right sm-padding small strong">
		        <tbody>
			        <tr>
			            <th class="gry-color text-left"><?php echo e(translate('Sub Total')); ?></th>
			            <td class="currency"><?php echo e(single_price($total)); ?></td>
			        </tr>
			        <tr>
			            <th class="gry-color text-left"><?php echo e(translate('Shipping Cost')); ?></th>
			            <td class="currency"><?php echo e(single_price($order->orderDetails->sum('shipping_cost'))); ?></td>
			        </tr>
			        <tr>
			            <th class="gry-color text-left"><?php echo e(translate('Total Tax')); ?></th>
			            <td class="currency"><?php echo e(single_price($order->orderDetails->sum('tax'))); ?></td>
			        </tr>
                    <tr>
			            <th class="gry-color text-left"><?php echo e(translate('Coupon Discount')); ?></th>
			            <td class="currency"><?php echo e(single_price($order->coupon_discount)); ?></td>
			        </tr>
					<tr>
			            <th class="text-left strong"><?php echo e(translate('Special Discount')); ?></th>
			            <td class="currency"><?php echo e(single_price($order->special_discount)); ?></td>
			        </tr>
			        <tr>
			            <th class="text-left strong"><?php echo e(translate('Grand Total')); ?></th>
			            <td class="currency"><?php echo e(single_price($order->grand_total)); ?></td>
			        </tr>
					 <?php 
                $paid = 0;
                    if(!empty($order->payment_details)){
                      $payment = json_decode($order->payment_details);
                      if(!empty($payment)){
                        $paid = $payment->amount;
                      }
                    }
                ?>
					<tr>
			            <th class="text-left strong"><?php echo e(translate('Paid')); ?></th>
			            <td class="currency"><?php echo e(single_price($paid)); ?></td>
			        </tr>
					<tr>
			            <th class="text-left strong"><?php echo e(translate('Due')); ?></th>
			            <td class="currency"><?php echo e(single_price($order->grand_total-$paid)); ?></td>
			        </tr>
		        </tbody>
		    </table>
	    </div>
	    </div>
		
	</div>
	
	<footer>
	    <div style="padding:2.5rem;">
	<table style="width:100%;text-align:center;">
		        <tbody>
						<tr>  <td><b style="font-size:30px;">Product can be returned to the delivery man if found damaged or broken upfront.</b></td>
			        </tr>
					</tbody>
		    </table>
		    	</div>
        </footer>
	
</body>
</html>
<?php /**PATH D:\xampp8.2.12\htdocs\bazarnao-v4-laravel-9\resources\views/backend/invoices/invoice.blade.php ENDPATH**/ ?>