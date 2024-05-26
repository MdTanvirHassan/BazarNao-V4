<div class="" id="OnlineOrder-details">
    <div class="aiz-pos-cart-list mb-4 mt-3 c-scrollbar-light">
    @php
    $subtotal = 0;
    $tax = 0;
    $shipping =0;
    $discount = 0;
    
    @endphp
        @if (Session::has('online.orderDetails'))
        <ul class="list-group list-group-flush">
            @forelse (Session::get('online.orderDetails') as $key => $OnlineOrderDetail)
            @php
           
            $product = \App\Models\Product::where('id',$OnlineOrderDetail['product_id'])
            ->select('id','name','barcode','min_qty')->first();
            $price = ($OnlineOrderDetail['price'] / $OnlineOrderDetail['quantity']);
            
            @endphp
            <li class="list-group-item py-0 pl-2">
                <div class="row gutters-5 align-items-center">
                    <div class="col-auto w-60px">
                          <span>Qty</span>
                            <input type="text" name="qty-{{ $key }}" id="qty-{{ $key }}" class="col border-0 text-center flex-grow-1 fs-16 input-number" placeholder="1" value="{{ $OnlineOrderDetail['quantity'] }}">
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
                        <div class="fs-12 opacity-60">{{  $price }} x {{ $OnlineOrderDetail['quantity'] }}</div>
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
                        <div class="fs-15 fw-600">{{ ($price * $OnlineOrderDetail['quantity']) }}</div>
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
    <div>
</div>