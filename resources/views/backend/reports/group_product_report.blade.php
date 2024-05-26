@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class=" align-items-center">
      
    </div>
</div>

<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h1 class="h6">{{ translate('Group Products Report') }}</h1>
            </div>
            <div class="col-md-2 d-flex">
                <button class="btn btn-sm btn-info" onclick="printDiv()" type="button">{{ translate('Print') }}</button>
                <form id="culexpo" method="POST" action="{{ route('group_product_export') }}">
                    @csrf
                    <button class="btn btn-sm btn-success mx-2" type="submit">{{ translate('Excel') }}</button>
                </form>
            </div>
            <div class="printArea">
                <style>
                    th{text-align:center;}
                </style>
                
                <div class="card-body">
                    <table class="table table-bordered aiz-table mb-0">
                        <thead>
                            <tr>
                                <th>{{ translate('SL') }}</th>
                                <th>{{ translate('Product Name') }}</th>
                                <th>{{ translate('Price') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1 @endphp
                            @foreach ($products as $key => $product)
                                @if(!empty($product->name))
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ single_price($product->unit_price) }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="aiz-pagination mt-4">
                    
            </div>
        </div>
    </div>
</div>
<script>
    function submitForm(url){
       $('#culexpo').attr('action',url);
       $('#culexpo').submit();
    }
</script>

@endsection
