@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class=" align-items-center">
        <h1 class="h3">{{translate('Sales Profit report')}}</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <form id="prowasales" action="{{ route('sale_profit_report.index') }}" method="get">
                    <div class="form-group row">

                        <div class="col-md-3">
                            <label class="col-form-label">{{translate('Sort by Category')}} :</label>
                            <select id="demo-ease" class="aiz-selectpicker select2" name="category_id" data-live-search="true">
                                <option value=''>All</option>
                                @foreach (\App\Models\Category::all() as $key => $category)
                                <option @php if($sort_by==$category->id)
                                    echo 'selected';
                                    @endphp
                                    value="{{ $category->id }}">{{ $category->getTranslation('name') }}</option>
                                @endforeach
                            </select>
                        </div>

                        
                        <div class="col-md-3">
                            <label class="col-form-label">{{translate('Sort by Warehouse')}} :</label>
                            <select id="warehouse" class="aiz-selectpicker select2" name="warehouse" data-live-search="true">
                                <option value=''>All</option>
                                @foreach (\App\Models\Wearhouse::all() as $key => $warehous)
                                <option @php if($wearhouse ==$warehous->id)
                                    echo 'selected';
                                    @endphp
                                    value="{{ $warehous->id }}">{{ $warehous->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="col-form-label">{{translate('Sort by Product')}} :</label>
                            <select id="demo-ease" class="aiz-selectpicker select2" name="product_id" data-live-search="true">
                                <option value=''>All</option>
                                @foreach (DB::table('products')->select('id','name')->get(); as $key => $prod)
                                <option @php if($pro_sort_by==$prod->id)
                                    echo 'selected';
                                    @endphp
                                    value="{{ $prod->id }}">{{ $prod->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        
                        {{-- <div class="col-md-3">
                            <label>Date Range :</label>
                            <div class="col-md-12">
                                <input type="date" name="start_date" class="form-control" value="{{$start_date}}">
                            </div>
                            <div class="col-md-12">
                                <input type="date" name="end_date" class="form-control" value="{{$end_date}}">
                            </div>
                            <div class="clearfix"></div>
                        </div> --}}
                        {{-- <div class="col-lg-2">
                            <div class="form-group mb-0">
                                <label>Month :</label>
                                <input type="month" name="month" id="month" class="form-control" @isset($month) value="{{ $month_year }}-{{ $month }}" @endisset>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group mb-0">
                                <label>Year :</label>
                                <select name="year" id="year" class="form-control">
                                    <option value="">Select One</option>
                                    @php
                                    $currentYear = date('Y');
                                    $startYear = $currentYear - 5;
                                    $endYear = $currentYear + 10; 
                                    @endphp
                                    @for ($i = $startYear; $i <= $endYear; $i++)
                                        <option value="{{ $i }}" @if(isset($year) && $year == $i) selected @endif>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div> --}}
                        <div class="col-md-3">
                            <label>&nbsp;</label>
                            <br>
                            <button class="btn btn-sm btn-primary" onclick="submitForm ('{{ route('sale_profit_report.index') }}')">{{ translate('Filter') }}</button>
                            
                            <button class="btn btn-sm btn-info" onclick="printDiv()" type="button">{{ translate('Print') }}</button>
                            <button class="btn btn-sm btn-info" onclick="submitForm('{{route('product_sales_export')}}')">Excel</button>
                            
                        </div>
                    </div>
                </form>

                <div class="printArea">
                <style>
                    th{text-align:center;}
                </style>
                    <h3 style="text-align:center;">{{translate('Sales Profit report')}}</h3>
                    <table class="table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:5%">SL</th>
                                <th style="width:30%">{{ translate('Product Name') }}</th>
                                <th style="width:10%">{{ translate('Category') }}</th>
                                <th style="width:10%">{{ translate('Selling Qty') }}</th>
                                <th style="width:10%">{{ translate('Selling Unit Price') }}</th>
                                <th style="width:10%">{{ translate('Selling Amount') }}</th>
                                <th style="width:10%">{{ translate('Purchase Unit Price') }}</th>
                                <th style="width:10%">{{ translate('Purchase Price') }}</th>
                                <th style="width:15%">{{ translate('Profit') }}</th>
                                {{-- <th style="width:10%">{{ translate('Num of Sales') }}</th> --}}
                                
                            </tr>
                        </thead>
                        <tbody>
                        @php $total = 0;$total_profit=0;$total_purchase=0;$qty = 1; @endphp
                            @foreach ($products as $key => $product)
                            @php $total = $total+($product->price); @endphp
                            @php $total_purchase = $total_purchase+($product->purchase_price); @endphp
                            @php $total_profit = $total - $total_purchase; @endphp
                        
                        <?php if(!empty($product->quantity)){
                        $qty = $product->quantity;
                        }else{
                        $qty = 1;
                        }
                        ?>                   
                            <tr>
                                <td>{{ ($key+1)}}</td>
                                <td>{{ $product->getTranslation('product_name') }}</td>
                                <td>{{ $product->getTranslation('category_name') }}</td>
                                <td style="text-align:center;">{{ $product->getTranslation('quantity') }}</td>
                                <td style="text-align:right;">{{ single_price($product->getTranslation('price')/ $qty) }}</td>
                                <td style="text-align:right;">{{ single_price($product->price) }}</td>
                                {{-- <td style="text-align:center;">{{ $product->num_of_sale }}</td> --}}
                                <td style="text-align:right;">{{ single_price($product->getTranslation('purchase_price')/ $qty) }}</td>
                                <td style="text-align:right;">{{ single_price($product->purchase_price) }}</td>
                                <td style="text-align:center;">{{ single_price(($product->price - $product->purchase_price)) }}</td>

                            </tr>
                            @endforeach
                            <tr>
                    <td style="text-align:right;" colspan="5"><b>Total</b></td>
                    <td style="text-align:right;"><b>{{single_price($total)}}</b></td>
                    <td style="text-align:right;"><b></b></td>
                    <td style="text-align:right;"><b>{{single_price($total_purchase)}}</b></td>
                    <td style="text-align:right;"><b>{{single_price($total_profit)}}</b></td>
                </tr>
                        </tbody>
                    </table>
                    {{-- <div class="aiz-pagination">
                        {{ $products->appends(request()->input())->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
 function submitForm(url){
    $('#prowasales').attr('action',url);
    $('#prowasales').submit();
 }
</script>
<script>
    document.getElementById('month').addEventListener('input', function() {
        document.getElementById('year').selectedIndex = 0;
    });

    document.getElementById('year').addEventListener('input', function() {
        document.getElementById('month').value = '';
    });
</script>

@endsection