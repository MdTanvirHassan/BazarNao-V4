@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="align-items-center">
        <h1 class="h3">{{ translate('Sales by Platform Report') }}</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <form id="prowasales" action="{{ route('sales_by_platform.index') }}" method="get">
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label>Filter By Warehouse :</label>
                            <select class="aiz-selectpicker select2" name="warehouse[]" id="warehouse" multiple>
                                @foreach(\App\Models\Wearhouse::all() as $warehouse)
                                    <option value="{{ $warehouse->id }}" @if(in_array($warehouse->id, (array)$warehouseIds)) selected @endif>{{ $warehouse->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label>&nbsp;</label>
                            <br>
                            <div class="d-flex">
                                <button class="btn btn-sm btn-primary" type="submit">{{ translate('Filter') }}</button>
                                <button class="btn btn-sm btn-info mx-2" onclick="printDiv()" type="button">{{ translate('Print') }}</button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="printArea">
                    <style>
                        th, td { text-align: center; }
                    </style>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Platform</th>
                                <th>Order Qty</th>
                                <th>Customer Qty</th>
                                <th>Sales Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($platformData as $platform => $data)
                                <tr>
                                    <td>{{ $platform }}</td>
                                    <td>{{ $data['total_orders'] }}</td>
                                    <td>{{ $data['total_customers'] }}</td>
                                    <td>{{ single_price($data['total_order_price']) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td style="text-align:right;" colspan="3"><b>Total:</b></td>
                                <td style="text-align:right;"><b>
                                    @php
                                        $grandTotal = 0;
                                        foreach ($platformData as $data) {
                                            $grandTotal += $data['total_order_price'];
                                        }
                                    @endphp
                                    {{ single_price($grandTotal) }}
                                </b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

<script>
function printDiv() {
    var divContents = document.querySelector(".printArea").innerHTML;
    var a = window.open('', '', 'height=500, width=500');
    a.document.write('<html>');
    a.document.write('<body>');
    a.document.write(divContents);
    a.document.write('</body></html>');
    a.document.close();
    a.print();
}
</script>
