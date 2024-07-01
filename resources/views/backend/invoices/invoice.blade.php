<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $order->code }}</title>
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
		@php
			$logo = get_setting('header_logo');


			if($order->user_id != null)
					$customer_id = \App\Models\Customer::where('user_id', $order->user_id)->first()->customer_id;
					else
					$customer_id = 'Guest ('.$order->guest_id.')';
		@endphp
		 
		<div style="background: #eceff4;padding: 2.5rem;padding-bottom:0;">
			<table>
				<tr>
					<td>
						@if($logo != null)
							<img loading="lazy"  src="{{ uploaded_asset($logo) }}" height="60" style="display:inline-block;">
						@else
							<img loading="lazy"  src="{{ static_asset('assets/img/logo.png') }}" height="60" style="display:inline-block;">
						@endif
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td style="font-size: 1.2rem;width:27%" class="strong">{{ get_setting('site_name') }}</td>
					<td class="text-right" style="width:50%"></td>
				</tr>
				<tr>
					<td class="gry-color small" style="width:27%">{{ get_setting('contact_address') }}</td>
					<td class="text-right"><span class="gry-color small">{{  translate('Customer ID') }}:</span> <span class="strong">{{ $customer_id }}</span></td>
				</tr>
				<tr>
					<td class="gry-color small" style="width:27%">{{  translate('Email') }}: {{ get_setting('contact_email') }}</td>
					<td class="text-right small" style="width:50%"><span class="gry-color small">{{  translate('Order ID') }}:</span> <span class="strong">{{ $order->code }}</span></td>
				</tr>
				<tr>
					<td class="gry-color small" style="width:27%">{{  translate('Phone') }}: {{ get_setting('contact_phone') }}</td>
					<td class="text-right small" style="width:50%"><span class="gry-color small">{{  translate('Order Date') }}:</span> <span class=" strong">{{ date('d-m-Y', $order->date) }}</span></td>
				</tr>
				<tr>
					<td class="gry-color small" style="width:27%">{{  translate('Bkash No') }}: {{ get_setting('bkash_no') }} , {{  translate('Nagad No') }}: {{ get_setting('nagad_no') }}</td>
					
				</tr>
			</table>

		</div>

		<div style="padding: 2.5rem;padding-bottom: 0;padding-top:5px;">
            <table style="width:35%">
				@php
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
				@endphp
				if($order->order_from != 'POS'){
					
				}
				<tr><td class="strong small gry-color" style="width:30%">{{ translate('Bill to') }}:</td></tr>
				<tr><td class="strong">{{ $shipping_address->name }}</td></tr>
				@if($order->order_from !='POS')
				<tr><td class="gry-color small" style="width:30%">{{ $shipping_address->address }},<br> {{ $shipping_address->city ? $shipping_address->city : '' }}, {{ $shipping_address->country }}</td></tr>
				<tr><td class="gry-color small" style="width:30%">{{ translate('Email') }}: {{ $shipping_address->email }}</td></tr>
				<tr><td class="gry-color small" style="width:30%">{{ translate('Phone') }}: {{ $shipping_address->phone }}</td></tr>
				@endif
				
				@if($order->payment_type =='cash_on_delivery')
				<tr><td class="gry-color small" style="width:30%">{{ translate('Payment Method') }}: {{ 'Cash on Delivery' }}</td></tr>
				@else
				<tr><td class="gry-color small" style="width:30%">{{ translate('Payment Method') }}: {{ $payment_type }}</td></tr>
				@endif
			</table>
		</div>

	    <div style="padding: 2.5rem;">
			<table class="padding text-left small border-bottom">
				<thead>
	                <tr class="gry-color" style="background: #eceff4;">
					<td>#</td>
	                    <td class="gry-color small"  style="font-weight:bold;width:500px;text-align:center">{{ translate('Product Name') }}</td>
	                    <td class="gry-color small" style="text-align:center;font-weight:bold;width:40px">{{ translate('Qty') }}</td>
	                    <td class="gry-color small" style="text-align:center;font-weight:bold;width:100px">{{ translate('Unit Price') }}</td>
	                    <td class="text-right small" style="font-weight:bold;width:120px">{{ translate('Total') }}</td>
						<td class="text-right small" style="font-weight:bold;width:100px">{{ translate('Discount') }}</td>
						<td class="text-right small" style="font-weight:bold;width:150px">{{ translate('Total Amount') }}</td>
	                </tr>
				</thead>
				<tbody class="strong">
				@php
					$total = 0;
					$subtotal = 0;
					$totalDisc = 0;
					$special = 0;
				@endphp
	                @foreach ($order->orderDetails as $key => $orderDetail)
		                @if ($orderDetail->product != null)
								@php
									$total += $orderDetail->price+$orderDetail->tax;
									$subtotal += ($orderDetail->price+$orderDetail->discount)+$orderDetail->tax;
									$totalDisc += $orderDetail->discount;
									$special += $orderDetail->special_discount;
								@endphp
							<tr class="prd">
							 	<td>{{ $key+1 }}</td>
							 	<td class="gry-color small">
									<?php
										$group_product_check = \App\Models\Product::where('id', $orderDetail->product_id)->value('is_group_product');
									?>
									@if($group_product_check == 1)
										<?php
											$group_product_items = \App\Models\Group_product::where('group_product_id', $orderDetail->product_id)->get();
										?>
										<strong>{{ $orderDetail->product->getTranslation('name') }}</strong><br>
										<ul>
											@foreach($group_product_items as $item)
												<?php
													$product_name = \App\Models\Product::where('id', $item->product_id)->value('name');
												?>
												<li>{{ $product_name }} ({{ $item->qty }})</li>
											@endforeach
										</ul>
									@else
										<strong>{{ $orderDetail->product->getTranslation('name') }} @if($orderDetail->variation != null) ({{ $orderDetail->variation }}) @endif</strong><br>
									@endif
								</td>

								<td class="gry-color" style="text-align:center">{{ $orderDetail->quantity }}</td>
								<td class="gry-color currency" style="text-align:center">{{ single_price(($orderDetail->price+$orderDetail->discount)/$orderDetail->quantity) }}</td>
			                    <td class="text-right currency">{{ single_price(($orderDetail->price+$orderDetail->discount)+$orderDetail->tax) }}</td>
								<td class="text-right currency">{{ single_price($orderDetail->discount) }}</td>
								<td class="text-right currency">{{ single_price(($orderDetail->price)+$orderDetail->tax) }}</td>
							</tr>
		                @endif
					@endforeach
					<tr>
						<td style="text-align:right;font-weight:bold" colspan="4">Total</td>
						<td class="text-right currency" style="font-weight:bold">{{ single_price($subtotal) }}</td>
						<td class="text-right currency" style="font-weight:bold">{{ single_price($totalDisc) }}</td>
						<td class="text-right currency" style="font-weight:bold">{{ single_price($total) }}</td>
					</tr>
	            </tbody>
			</table>
		</div>

	    <div style="padding:0 2.5rem;">
		<div style="width:50%;float:left;">
		@if(!empty($shipping_address->note))
					<b style="width:100%;text-align:center;">Note : {{$shipping_address->note}}</b>
						@endif
		</div>
		<div style="width:50%;float:right;">
	        <table style="width: 70%;margin-left:auto;" class="text-right sm-padding small strong">
		        <tbody>
			        <tr>
			            <th class="gry-color text-left">{{ translate('Sub Total') }}</th>
			            <td class="currency">{{ single_price($total) }}</td>
			        </tr>
			        <tr>
			            <th class="gry-color text-left">{{ translate('Shipping Cost') }}</th>
			            <td class="currency">{{ single_price($order->orderDetails->sum('shipping_cost')) }}</td>
			        </tr>
			        <tr>
			            <th class="gry-color text-left">{{ translate('Total Tax') }}</th>
			            <td class="currency">{{ single_price($order->orderDetails->sum('tax')) }}</td>
			        </tr>
                    <tr>
			            <th class="gry-color text-left">{{ translate('Coupon Discount') }}</th>
			            <td class="currency">{{ single_price($order->coupon_discount) }}</td>
			        </tr>
					<tr>
			            <th class="text-left strong">{{ translate('Special Discount') }}</th>
			            <td class="currency">{{ single_price($order->special_discount) }}</td>
			        </tr>
			        <tr>
			            <th class="text-left strong">{{ translate('Grand Total') }}</th>
			            <td class="currency">{{ single_price($order->grand_total) }}</td>
			        </tr>
					 @php 
                		$paid = 0;
						if(!empty($order->payment_details)){
						$payment = json_decode($order->payment_details);
						if(!empty($payment)){
							$paid = $payment->amount;
						}
						}
                	@endphp
					<tr>
			            <th class="text-left strong">{{ translate('Paid') }}</th>
			            <td class="currency">{{ single_price($paid) }}</td>
			        </tr>
					<tr>
			            <th class="text-left strong">{{ translate('Due') }}</th>
			            <td class="currency">{{ single_price($order->grand_total-$paid) }}</td>
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
					<tr>  
						<td>
							<b style="font-size:30px;">
								Product can be returned to the delivery man if found damaged or broken upfront.
							</b>
						</td>
					</tr>
				</tbody>
		    </table>
		</div>
	</footer>
	
</body>
</html>
