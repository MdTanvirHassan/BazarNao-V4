@extends('backend.layouts.app')
@section('content')
<section class="">
    
        <div class="row gutters-5">
            <div class="col-md">
            <form class="" action="" method="POST" enctype="multipart/form-data">
             @csrf
                <div class="row gutters-5 mb-3">
                    <div class="col-md-3 col-6">
                        <div class="d-flex border-bottom">
                            <div class="flex-grow-1">
                            <select name="order_id" class="form-control aiz-selectpicker pos-customer" data-live-search="true" onchange="getOrderDetails()">
                                    <option value="">Select Order</option>
                                    @foreach ($orders as $key => $ordr)
                                    <option value="{{ $ordr->id }}" data-contact="{{ $ordr->code }}">
                                        {{ $ordr->code }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="form-group mb-0">
                            <input class="form-control" type="text" id="barcode" name="keyword" placeholder="{{ translate('Barcode') }}">
                        </div>
                    </div>
                </div>
            </form>

                <div class="" id="OnlineOrder-details">
                    <div class="aiz-pos-cart-list mb-4 mt-3 c-scrollbar-light">
                        @if (Session::has('online.orderDetails'))
                        <ul class="list-group list-group-flush">
                            @forelse (Session::get('online.orderDetails') as $key => $OnlineOrderDetail)
                            @php
                            $product = \App\Models\Product::where('id',$OnlineOrderDetail['product_id'])
                            ->select('id','name','barcode','min_qty')->first();
                            @endphp
                            <li class="list-group-item py-0 pl-2">
                                <div class="row gutters-5 align-items-center">
                                    <div class="col-auto w-60px">
                                        <div class="row no-gutters align-items-center flex-column aiz-plus-minus">
                                        <span>Qty</span>
                                            <input type="text" name="qty-{{ $key }}" id="qty-{{ $key }}" class="col border-0 text-center flex-grow-1 fs-16 input-number" placeholder="1" value="{{ $OnlineOrderDetail['quantity'] }}"  max="{{ $product->max_qty }}">                             
                                        </div>
                                    </div>
                                    <div class="col">
                                        <span>Name</span>
                                        <div class="text-truncate-2">{{ $product->name }}</div>
                                    </div>
                                    <div class="col">
                                        <span>Barcode</span>
                                        <div class="text-truncate-2">{{ $product->barcode }}</div>
                                    </div>
                                    <div class="col">
                                        <span>Unitprice & Qty</span>
                                        <div class="fs-12 opacity-60">{{ single_price($OnlineOrderDetail['price']) }} x {{ $OnlineOrderDetail['quantity'] }}</div>
                                    </div>
                                    <div class="col">
                                        <span>Shipping</span>
                                        <div class="fs-12 opacity-60">{{ single_price($OnlineOrderDetail['shipping_cost']) }}</div>
                                    </div>
                                    <div class="col">
                                        <span>Discount</span>
                                        <div class="fs-12 opacity-60">{{ single_price($OnlineOrderDetail['discount']) }}</div>
                                    </div>
                                    <div class="col">
                                        <span>Total</span>
                                        <div class="fs-15 fw-600">{{ single_price($OnlineOrderDetail['price']*$OnlineOrderDetail['quantity']) }}</div>
                                    </div>
                                    
                                </div>
                            </li>
                            
                            @empty
                            <li class="list-group-item">
                                <div class="text-center">
                                    <i class="las la-frown la-3x opacity-50"></i>
                                    <p>{{ translate('No Order Added') }}</p>
                                </div>
                            </li>
                            @endforelse
                        </ul>
                        @else
                        <div class="text-center">
                            <i class="las la-frown la-3x opacity-50"></i>
                            <p>{{ translate('No Order Added') }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

          
            <div class="col-md-auto w-md-350px w-lg-400px w-xl-500px">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="" id="OnlineOrder-confirm">
                            <div class="aiz-pos-cart-list mb-4 mt-3 c-scrollbar-light">
                                @php
                                $subtotal = 0;
                                $tax = 0;
                                $shipping =0;
                                $discount = 0;
                                $coupon_discount = 0;
                                $order_id = 0;
                                @endphp
                                @if (Session::has('online.orderConfirm'))
                                <ul class="list-group list-group-flush">
                                    @forelse (Session::get('online.orderConfirm') as $key => $onlineOrderConf)
                                    
                                    @php
                                    $order_id = $onlineOrderConf['order_id'];
                                    $subtotal += $onlineOrderConf['price']*$onlineOrderConf['quantity'];
                                    $shipping += $onlineOrderConf['shipping_cost'];
                                    $discount += $onlineOrderConf['discount'];
                                    $tax += $onlineOrderConf['tax']*$onlineOrderConf['quantity'];
                                    $product = \App\Models\Product::find($onlineOrderConf['product_id']);
                                    $coupon_discount = \App\Models\Order::where('id',$onlineOrderConf['order_id'])->select('coupon_discount')->first();
                                    $coupon_discount = $coupon_discount->coupon_discount; 
                                    @endphp
                                    <li class="list-group-item py-0 pl-2">
                                        <div class="row gutters-5 align-items-center">
                                            <div class="col-auto w-60px">
                                                <div class="row no-gutters align-items-center flex-column aiz-plus-minus">
                                                <span>Qty</span> 
                                                    <input type="text" name="qty-{{ $key }}" id="qty-{{ $key }}" class="col border-0 text-center flex-grow-1 fs-16 input-number" placeholder="1" value="{{ $onlineOrderConf['quantity'] }}">                                 
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="text-truncate-2">{{ $product->name }}</div>
                                            </div>

                                            <div class="col-auto">
                                                <div class="fs-12 opacity-60">{{ single_price($onlineOrderConf['price']) }} x {{ $onlineOrderConf['quantity'] }}</div>
                                                <div class="fs-15 fw-600">{{ single_price($onlineOrderConf['price']*$onlineOrderConf['quantity']) }}</div>
                                            </div>
                                           
                                        </div>
                                    </li>
                                    @empty
                                    <li class="list-group-item">
                                        <div class="text-center">
                                            <i class="las la-frown la-3x opacity-50"></i>
                                            <p>{{ translate('No Order Added') }}</p>
                                        </div>
                                    </li>
                                    @endforelse
                                </ul>
                                @else
                                <div class="text-center">
                                    <i class="las la-frown la-3x opacity-50"></i>
                                    <p>{{ translate('No Order Added') }}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
               
                <div>
        
                    <div class="d-flex justify-content-between fw-600 mb-2 opacity-70">
                        <span>{{translate('Shipping')}}</span>
                        <span>{{ single_price($shipping) }}</span>
                    </div>
                    <div class="d-flex justify-content-between fw-600 mb-2 opacity-70">
                        <span>{{translate('Discount')}}</span>
                        <span>{{ single_price($discount) }}</span>
                    </div>
                    <div class="d-flex justify-content-between fw-600 mb-2 opacity-70">
                        <span>{{translate('Coupon Discount')}}</span>
                        <span>{{ single_price($coupon_discount) }}</span>
                    </div>
                    <div class="d-flex justify-content-between fw-600 fs-18 border-top pt-2">
                        <span>{{translate('Total')}}</span>
                        <span>{{ single_price($subtotal+$tax+ $shipping - $discount - $coupon_discount ) }}</span>
                    </div>
                </div>
                <form class="" action="" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="modal-footer">
                <button type="button" onclick="ClearOnlineOrderConfirm()"class="btn btn-secondary btn-base-3">{{translate('Clear')}}</button>
                <button type="button" onclick="set_delivery_boy()" class="btn btn-base-1 btn-success">{{ translate('Transfer To OnDelivery') }}</button>
            </div>
            </form>
            </div>
        
        </div>
    
</section>

<div class="modal fade" id="deliveryboy-modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-zoom" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h6 class="modal-title" id="exampleModalLabel">{{ translate('Select Delivery Man')}}</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
              <div class="modal-body">
                  <div class="p-3">
                      <div class="row">
                          <div class="col-md-2">
                              <label>{{ translate('Select Delivery Man')}}</label>
                          </div>
                          <div class="col-md-10">
                              <select class="form-control" id="delivery_boy">
                                <option value="">Select Delivery Man</option>
                                @foreach(\App\Models\Staff::where('role_id','10')->get() as $u)
                                <option value="{{$u->user->id}}">{{$u->user->name}}</option>
                                @endforeach
                              </select>
                          </div>
                      </div>
                      
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" id="save_payment" onclick="save_delivery_man()" class="btn btn-primary">{{  translate('Save') }}</button>
              </div>
      </div>
  </div>
</div>

@endsection

@section('script')

<script type="text/javascript">
    function getOrderDetails(){
        var order_id = $('select[name=order_id]').val()
        $.post('{{ route('online_orders.show') }}', {_token: AIZ.data.csrf,order_id: order_id},function(data){
                if (data.success == 1){
                    updateOnlineCart(data.view);
                }else{
                    AIZ.plugins.notify('danger', data.message);
                }
            });
    }

    function updateOnlineCart(data){
        $('#OnlineOrder-details').html(data);
        AIZ.extra.plusMinus();
    }

    function RemoveOnlineOrderDetails(key){
        $.post('{{ route('pos.RemoveOnlineOrderDetails') }}', {_token: AIZ.data.csrf,key: key},
            function(data){
                updateOnlineCart(data);
            });
    }
    window.onload = function () {
            var barcodeElement = document.getElementById('barcode');
            barcodeElement.focus();
        }


           $('#barcode').keypress(function (event){
            setTimeout(() =>{
                const barcode = $(this).val();
                if(barcode==''){
                    return false;
                }
                $('#barcode').val('');
                $.post("{{ route('pos.RemoveOnlineOrderDetails') }}",{_token:AIZ.data.csrf, barcode:barcode}, function(data){
                if(data){
                    $('#barcode').val('');
                    updateOnlineCart(data);
                    //location.reload();
                }
            });
            }, 100);
            
        });
    
    
        function set_delivery_boy(){
            $('#deliveryboy-modal').modal('show');
        }

        function ClearOnlineOrderConfirm(){
            $.post("{{ route('pos.ClearOnlineOrderConfirm') }}",{_token:AIZ.data.csrf,}, function(data){
                if(data){
                    updateOnlineCart(data);
                    location.reload();
                }
            });
        }

        function save_delivery_man(){
          var order_id = {{$order_id}};
          var status = 'on_delivery';
          var delivery_boy = $('#delivery_boy').val();
            $.post('{{ route('pos.update_online_order_delivery_status') }}', {_token:'{{ @csrf_token() }}',order_id:order_id,status:status,delivery_boy:delivery_boy},
            function(data){
                if(data.success == 1){
                    AIZ.plugins.notify('success', '{{ translate('Delivery status has been updated') }}');
                    $('#deliveryboy-modal').modal('hide')
                    if(data.redirect){
                    window.location.href = data.redirect;
                   }
                }else{
                    AIZ.plugins.notify('danger','{{ translate('All Product Not Matching') }}');
                    $('#deliveryboy-modal').modal('hide')
                    location.reload();
                }
                   
                });
        }
        
</script>
@endsection