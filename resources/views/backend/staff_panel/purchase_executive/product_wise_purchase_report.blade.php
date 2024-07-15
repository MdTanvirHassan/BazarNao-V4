@if(auth()->user()->user_type == 'admin')

@elseif(auth()->user()->user_type == 'staff')
@extends('backend.layouts.staff')
@endif
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
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/2.4.85/css/materialdesignicons.css" rel="stylesheet" />

@section('content')
<div class="row gutters-10">
    <div class="col-lg-12">

        <div id="accordion">
        @if(auth()->user()->user_type == 'staff')
        @include('backend.staff_panel.purchase_manager.purchase_manager_nav')
        @endif
            <div class="card border-bottom-0">
                <div class="card-body">
                    <form id="culexpo" action="{{ route('product_wise_purchase_report.index') }}" method="GET">
                        <div class="form-group row">
                        <div class="col-md-2">
                        <label>Start Date :</label>
                            <input type="date" name="start_date" id="start_date" class="form-control" value="{{$start_date}}">
                            
                    </div>
                    <div class="col-md-2">
                        <label>End Date :</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" value="{{$end_date}}">
                            
                    </div>
                    @if(auth()->user()->user_type == 'admin')
                    <div class="col-md-2">
    						<label for="name">{{translate('Wearhouse')}} <span class="text-danger">*</span></label>
    						<select name="wearhouse_id" id="wearhouse_id" class="form-control" required>
                                <option value="">{{translate('Select Wearhouse')}}</option>
                                @foreach($wearhouses = \App\Models\Warehouse::all() as $row)
                                <option <?php if($wearhouse_id == $row->id) echo 'selected';?> value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
    					</div>
                    @elseif(auth()->user()->user_type == 'staff')
                         <div class="col-md-2">
    						<label for="name">{{translate('Wearhouse')}} <span class="text-danger">*</span></label>
    						<select name="wearhouse_id" id="wearhouse_id" class="form-control" required>
                                <option value="">{{translate('Select Wearhouse')}}</option>
                                @foreach($wearhouses as $row)
                                <option <?php if($wearhouse_id == $row->id) echo 'selected';?> value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
    					</div>
                        @endif
                     

                            <div class="col-md-3">
                                <label for="name">{{ translate('Sort by Product') }}:</label>
                                <select id="demo-ease" class="aiz-selectpicker select2" name="product_id[]" data-live-search="true" multiple>
                                    <option value=''>{{ translate('All') }}</option>
                                    @foreach (DB::table('products')->select('id', 'name')->get() as $prod)
                                        <option @if(in_array($prod->id, (array)$pro_sort_by)) selected @endif value="{{ $prod->id }}">{{ $prod->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col-md-3">
                                <label for="name">{{ translate('Sort by Supplier') }} :</label>
                                <select name="supplier_id" id="supplier_id" class="form-control"  data-live-search="true">
                                    <option value="">{{translate('All')}}</option>
                                    @foreach (DB::table('suppliers')->select('supplier_id','name')->get() as $key => $prod)
                                        <option {{ $sup_sort_by == $prod->supplier_id ? 'selected' : '' }} value="{{ $prod->supplier_id }}">{{ $prod->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col-md-4 mt-4">
                                <button class="btn btn-secondary" type="button" onclick="clearFilters()">Clear Filters</button>
                                <button class="btn btn-primary" onclick="SubmitForm('{{route('product_wise_purchase_report.index')}}')">{{ translate('Filter') }}</button>
                                <button class="btn btn-success btn-info" onclick="printDiv()" type="button">{{ translate('Print') }}</button>
                                <button class="btn btn-danger" onclick="submitForm('{{ route('product_wise_purchase_export') }}')">Excel</button>
                            </div>
                        </div>
                    </form>
                <div class="card-body printArea">
                <style>
                    th {
                        text-align: center;
                    }
                </style>
                    <table class="table aiz-table mb-0" style="width:100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ translate('Purchase No') }}</th>
                                <th>{{ translate('Product Name') }}</th>
                                <th>{{ translate('Supplier') }}</th>
                                <th>{{ translate('QTY') }}</th>
                                <th>{{ translate('Price') }}</th>
                                <th>{{ translate('Amount') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $totalamount = 0; 
                            $totalqty = 0; 
                            $totalprice = 0; 
                            @endphp
                            @foreach ($product_wise_purchase_list as $key => $order)

                            @php 
                            $totalamount += $order->qty*$order->price;
                            $totalprice += $order->price;
                            $totalqty  += $order->qty;
                            @endphp
                            <tr>
                                <td>
                                    {{ ($key+1) }}
                                </td>

                                <td>
                                    {{ $order->purchase_no }}
                                </td>
                                <td>
                                    {{ $order->name }}
                                </td>
                                <td>
                                    {{ $order->suppliername }}
                                </td>

                                <td style="text-align:right;">
                                    {{$order->qty }}
                                </td>
                              
                                <td style="text-align:right;">
                                {{$order->price }}
                                </td>
                                <td style="text-align:right;">
                                {{$order->qty*$order->price }}
                                </td>
                            </tr>
                            @endforeach
                            <tr style="font-weight:bold;text-align:right;">
                                <td colspan="4">Total</td>
                                <td>{{$totalqty}}</td>
                                <td>{{$totalprice}}</td>
                                <td>{{$totalamount}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
@endsection
@section('script')
<script>

    function clearFilters() {
 
        // Reset start date input
        document.getElementById('start_date').value = '';

        // Reset end date input
        document.getElementById('end_date').value = '';
        document.getElementById('wearhouse_id').value = '';
        document.getElementById('supplier_id').value = '';
        
        // Clear selected options in the product select
        $('#demo-ease').val(null).trigger('change');

    }


    function submitForm(url){
        $('#culexpo').attr('action',url);
        $('#culexpo').submit();
    }
</script>
@endsection