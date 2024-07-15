@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col-auto">
			<h1 class="h3">{{translate('All products')}}</h1>
		</div>
        @if($type != 'Seller')
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-auto">
                    <a href="{{ route('products.create') }}" class="btn btn-sm btn-rectangle btn-info">
                        <span>{{ translate('Add New Product') }}</span>
                    </a>
                </div>
                <div class="col-md-auto">
                    <a href="{{ route('group_products.create') }}" class="btn btn-sm btn-rectangle btn-info">
                        <span>{{ translate('Add New Group Product') }}</span>
                    </a>
                </div>
            </div>
        </div>

        @endif
	</div>
</div>
<br>

<div class="card">
	<form class="" id="sort_products" action="" method="GET">
		<div class="card-header row gutters-5">
			<div class="col-md-2 text-center text-md-left">
				<h5 class="mb-md-0 h6">{{ translate('All Product') }}</h5>
			</div>
            <div class="col-md-2 ml-2">
                <select id="demo-ease" class="aiz-selectpicker select2" name="product_id[]" data-live-search="true" multiple onchange="sort_products()">
                    <option value=''>{{ translate('All') }}</option>
                    @foreach (DB::table('products')->select('id', 'name')->get() as $prod)
                        <option @if(in_array($prod->id, (array)$pro_sort_by)) selected @endif value="{{ $prod->id }}">{{ $prod->name }}</option>
                    @endforeach
                </select>
            </div>

			@if($type == 'Seller')
			<div class="col-md-2 ml-auto">
				<select class="form-control form-control-sm aiz-selectpicker mb-2 mb-md-0" id="user_id" name="user_id" onchange="sort_products()">
					<option value="">{{ translate('All Sellers') }}</option>
		            @foreach (\App\Models\Seller::all() as $key => $seller)
		                @if ($seller->user != null && $seller->user->shop != null)
		                    <option value="{{ $seller->user->id }}" @if ($seller->user->id == $seller_id) selected @endif>{{ $seller->user->shop->name }} ({{ $seller->user->name }})</option>
		                @endif
		            @endforeach
				</select>
			</div>
			@endif
			@if($type == 'All')
			<div class="col-md-2 ml-auto">
				<select class="form-control form-control-sm aiz-selectpicker mb-2 mb-md-0" id="user_id" name="user_id" onchange="sort_products()">
					<option value="">{{ translate('All Sellers') }}</option>
		            @foreach (\App\Models\User::where('user_type', '=', 'admin')->orWhere('user_type', '=', 'seller')->get() as $key => $seller)
                		<option value="{{ $seller->id }}" @if ($seller->id == $seller_id) selected @endif>{{ $seller->name }}</option>
		            @endforeach
				</select>
			</div>
			@endif
			<div class="col-md-2 ml-auto">
            <select class="form-control form-control-sm aiz-selectpicker mb-2 mb-md-0" name="type" id="type" onchange="sort_products()">
					<option value="">{{ translate('Sort By') }}</option>
                    <option value="name,asc"@isset($col_name , $query) @if($col_name == 'name' && $query == 'asc') selected @endif @endisset>{{translate('A to Z (Order By Ascending)')}}</option>
			        <option value="name,desc"@isset($col_name , $query) @if($col_name == 'name' && $query == 'desc') selected @endif @endisset>{{translate('Z to A (Order By Descending)')}}</option>
                    <option value="last,added"@isset($col_name , $query) @if($col_name == 'name' && $query == 'desc') selected @endif @endisset>{{translate('Last Added Products')}}</option>

			        <!-- <option value="rating,desc" @isset($col_name , $query) @if($col_name == 'rating' && $query == 'desc') selected @endif @endisset>{{translate('Rating (High > Low)')}}</option>
			        <option value="rating,asc" @isset($col_name , $query) @if($col_name == 'rating' && $query == 'asc') selected @endif @endisset>{{translate('Rating (Low > High)')}}</option>
			        <option value="num_of_sale,desc"@isset($col_name , $query) @if($col_name == 'num_of_sale' && $query == 'desc') selected @endif @endisset>{{translate('Num of Sale (High > Low)')}}</option>
			        <option value="num_of_sale,asc"@isset($col_name , $query) @if($col_name == 'num_of_sale' && $query == 'asc') selected @endif @endisset>{{translate('Num of Sale (Low > High)')}}</option>
			        <option value="unit_price,desc"@isset($col_name , $query) @if($col_name == 'unit_price' && $query == 'desc') selected @endif @endisset>{{translate('Base Price (High > Low)')}}</option>
			        <option value="unit_price,asc"@isset($col_name , $query) @if($col_name == 'unit_price' && $query == 'asc') selected @endif @endisset>{{translate('Base Price (Low > High)')}}</option> -->
                  
                  
				</select>
			</div>
			<div class="col-md-2">
				<div class="form-group mb-0">
					<input type="text" class="form-control form-control-sm" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type & Enter') }}">
				</div>
			</div>
		</div>
	</from>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th data-breakpoints="lg">#</th>
                    <th width="30%">{{translate('Name')}}</th>
                    @if($type == 'Seller' || $type == 'All')
                        <th data-breakpoints="lg">{{translate('Added By')}}</th>
                    @endif
                    <th>{{translate('Barcode')}}</th>
                    <th>{{translate('Num of Sale')}}</th>
                    <th>{{translate('Total Stock')}}</th>
                    <th>{{translate('App Price')}}</th>
                    <th>{{translate('Web Price')}}</th>
                    <th>{{translate('Pos Price')}}</th>
                    <th data-breakpoints="lg">{{translate('Todays Deal')}}</th>
                    <th data-breakpoints="lg">{{translate('Rating')}}</th>
                    <th>{{translate('Published')}}</th>
                    <th>{{translate('Featured')}}</th>
                    <th>{{translate('Refundable')}}</th>
                    <th>{{translate('OutofStock')}}</th>
                    <th class="text-right">{{translate('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $key => $product)
                    <tr>
                        <td>{{ ($key+1) + ($products->currentPage() - 1)*$products->perPage() }}</td>
                        <td>
							<div class="row gutters-5">
								<div class="col-auto">
									<img src="{{ uploaded_asset($product->thumbnail_img)}}" alt="Image" class="size-50px img-fit">
								</div>
								<div class="col">
									<span class="text-muted text-truncate-2">{{ $product->getTranslation('name') }}</span>
								</div>
							</div>
                        </td>
                        @if($type == 'Seller' || $type == 'All')
                            @if(isset($product->user->name))
                            <td>{{ $product->user->name }}</td>
                            @else
                            <td> </td>
                            @endif
                        @endif
                        <td>{{ $product->barcode }}</td>
                        <td>{{ $product->num_of_sale }} {{translate('times')}}</td>
                        <td>
                            @php
                                $qty = 0;
                                if($product->variant_product){
                                    foreach ($product->stocks as $key => $stock) {
                                        $qty += $stock->qty;
                                    }
                                }
                                else{
                                    $qty = $product->current_stock;
                                }
                                echo $qty;
                            @endphp
                        </td>
                        <td>{{ number_format($product->app_unit_price,2) }}</td>
                        <td>{{ number_format($product->unit_price,2) }}</td>
                        <td>
                            @php
                                $prices = [];
                                foreach ($product->stocks as $stock) {
                                    $prices[] = number_format($stock->price, 2);
                                }
                            @endphp
                            {{ implode(', ', $prices) }}
                        </td>

                        <td>
							<label class="aiz-switch aiz-switch-success mb-0">
                              <input onchange="update_todays_deal(this)" value="{{ $product->id }}" type="checkbox" <?php if($product->todays_deal == 1) echo "checked";?> >
                              <span class="slider round"></span>
							</label>
						</td>
                        <td>{{ $product->rating }}</td>
                        <td>
							<label class="aiz-switch aiz-switch-success mb-0">
                              <input onchange="update_published(this)" value="{{ $product->id }}" type="checkbox" <?php if($product->published == 1) echo "checked";?> >
                              <span class="slider round"></span>
							</label>
						</td>
                      	<td>
							<label class="aiz-switch aiz-switch-success mb-0">
	                            <input onchange="update_featured(this)" value="{{ $product->id }}" type="checkbox" <?php if($product->featured == 1) echo "checked";?> >
	                            <span class="slider round"></span>
							</label>
						</td>
                        <td>
                        <label class="aiz-switch aiz-switch-success mb-0">
	                            <input onchange="update_refundable(this)" value="{{ $product->id }}" type="checkbox" <?php if($product->refundable == 1) echo "checked";?> >
	                            <span class="slider round"></span>
							</label>
						</td>
                        <td>
                        <label class="aiz-switch aiz-switch-success mb-0">
	                            <input onchange="update_outofstock(this)" value="{{ $product->id }}" type="checkbox" <?php if($product->outofstock == 1) echo "checked";?> >
	                            <span class="slider round"></span>
							</label>
						</td>
						<td class="text-right">
                            <a class="btn btn-soft-success btn-icon btn-circle btn-sm"  href="{{ route('product', $product->slug) }}" target="_blank" title="{{ translate('View') }}">
                               <i class="las la-eye"></i>
                           </a>
							@if ($type == 'Seller')
    	                      <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('products.seller.edit', ['id'=>$product->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="{{ translate('Edit') }}">
    	                          <i class="las la-edit"></i>
    	                      </a>
							@else
                                @if($product->is_group_product)
								<a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('group_products.admin.edit', ['id'=>$product->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="{{ translate('Group Product Edit') }}">
								   <i class="las la-edit"></i>
							   </a>
                               @else
                               <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('products.admin.edit', ['id'=>$product->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="{{ translate('Edit') }}">
								   <i class="las la-edit"></i>
							   </a>
                               @endif
							@endif
							<!-- <a class="btn btn-soft-success btn-icon btn-circle btn-sm" href="{{route('products.duplicate', ['id'=>$product->id, 'type'=>$type]  )}}" title="{{ translate('Duplicate') }}">
							   <i class="las la-copy"></i>
						   </a> -->
                           @if(auth()->user()->user_type == 'admin')
                                @if($product->is_group_product)
                                <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('group_products.destroy', $product->id)}}" title="{{ translate('Group Product Delete') }}">
                                    <i class="las la-trash"></i>
                                </a>
                                @else
                                <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('products.destroy', $product->id)}}" title="{{ translate('Delete') }}">
                                    <i class="las la-trash"></i>
                                </a>
                                @endif
                           @endif
                      </td>
                  	</tr>
                @endforeach
            </tbody>
        </table>
        <div class="aiz-pagination">
            {{ $products->appends(request()->input())->links() }}
        </div>
    </div>
</div>

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection


@section('script')
    <script type="text/javascript">

        $(document).ready(function(){
            //$('#container').removeClass('mainnav-lg').addClass('mainnav-sm');
        });

        function update_todays_deal(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('products.todays_deal') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '{{ translate('Todays Deal updated successfully') }}');
                }
                else{
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function update_published(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('products.published') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '{{ translate('Published products updated successfully') }}');
                }
                else{
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function update_featured(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('products.featured') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '{{ translate('Featured products updated successfully') }}');
                }
                else{
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function update_refundable(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('products.refundable') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '{{ translate('Refundable updated successfully') }}');
                }
                else{
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function update_outofstock(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('products.outofstock') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '{{ translate('Out Of Stock updated successfully') }}');
                }
                else{
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }


        function sort_products(el){
            $('#sort_products').submit();
        }

    </script>
@endsection
