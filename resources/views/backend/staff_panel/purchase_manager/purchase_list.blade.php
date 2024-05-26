@extends('backend.layouts.staff')
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/2.4.85/css/materialdesignicons.css"
    rel="stylesheet" />

@section('content')
    <div class="row gutters-10">
        <div class="col-lg-12">

            <div id="accordion">
              @include('backend.staff_panel.purchase_manager.purchase_manager_nav')
                <div class="card border-bottom-0">

                    <div class=" card-body">
                    <form id="culexpo" action="{{ route('purchase_list.index') }}" method="GET">
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label>Purchase Start Date :</label>
                                <input type="date" name="start_date" class="form-control" value="{{$start_date}}">
                            </div>
                            <div class="col-md-3">
                                <label>Purchase End Date :</label>
                                <input type="date" name="end_date" class="form-control" value="{{$end_date}}">
                            </div>
                            {{-- <div class="col-md-3">
                                <label>Expire Start Date :</label>
                                <input type="date" name="expiry_date_start" class="form-control" value="{{$expiry_date_start}}">
                            </div>
                            <div class="col-md-3">
                                <label>Expire End Date :</label>
                                <input type="date" name="expiry_date_end" class="form-control" value="{{$expiry_date_end}}">
                            </div> --}}
                            <div class="col-md-3 mt-4">
                                <button class="btn btn-primary">{{ translate('Filter') }}</button>
                            </div>
                        </div>
                    </form>

                    <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th data-breakpoints="md">{{ translate('Purchase Date') }}</th>
                    {{-- <th data-breakpoints="md">{{ translate('Expired Date') }}</th> --}}
                    <th data-breakpoints="md">{{ translate('Purchase Order') }}</th>
                    <th data-breakpoints="md">{{ translate('Supplier') }}</th>
                    <th data-breakpoints="md">{{ translate('Executive Name') }}</th>
                    <th data-breakpoints="md" >{{ translate('Status') }}</th>
                    <th data-breakpoints="md">{{ translate('Total') }}</th>
                    <th class="text-right">{{translate('options')}}</th>
                </tr>
            </thead>
            <tbody>
                @php
                 $total = 0; 
                @endphp
                @foreach ($data as $key => $order)
                 
                @php
                $total += $order->total_value;
                $exe_name = getUsernameBycustomerstaffId($order->created_by);
                @endphp
                    <tr>
                        <td>
                        {{ ($key+1) }}
                        </td>
                        <td>
                            {{ $order->date }}
                        </td>
                        {{-- <td>
                            {{ $order->expiry_date }}
                        </td> --}}
                        <td>
                        <a  href="{{route('purchase_orders_view', $order->id)}}" title="{{ translate('View') }}">
                        {{ $order->purchase_no }}
                        </a>
                           
                        </td>
                        <td>
                        {{ $order->name }}
                        </td>
                        <td>{{$exe_name}}</td>
                        <td>
                        @if($order->status == 1)
                        Pending
                        @elseif($order->status == 2)
                        Approved
                        @else
                        Rejected
                        @endif
                        </td>
                        <td>
                            {{ single_price($order->total_value) }}
                        </td>
                        
                        
                        <td class="text-right">
                        @if($order->status == 1)
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" onclick="return confirm('Are you sure?')" href="{{route('purchase_approve.index', $order->id)}}" title="{{ translate('Approve') }}">
                            <i class="las la-check-circle"></i>
                            </a>
                        
                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('purchase_reject.index', $order->id)}}" title="{{ translate('Delete') }}">
                                <i class="las la-trash"></i>
                            </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td style="text-align:right;" colspan="6">Total</td>
                <td >{{single_price($total)}}</td>
            </tr>
            </tfoot>
        </table> 
         
                    </div>

                </div>
            </div>
        </div>

    </div>


    </div>
@endsection
@section('modal')
    @include('modals.delete_modal')
@endsection
@section('script')
    <script type="text/javascript">
        
    </script>
@endsection
