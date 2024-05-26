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
<link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/2.4.85/css/materialdesignicons.css" rel="stylesheet" />

@section('content')
<div class="row gutters-10">
    <div class="col-lg-12">

        <div id="accordion">
            {{-- Statistics Start here --}}
            <div class="card border-bottom-0">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0" style="width:100%">
                        <button class="btn btn-light w-100 text-left" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="mdi mdi-chevron-up float-right"></i>
                            Statistics of : {{ auth()->user()->name }}
                        </button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    {{-- <div class="col-md-3 ml-3">
                        <div class="card">
                            <div class="card-header text-white" style="background-color:#A73986">
                                <h4 class="mb-0">Warehouse</h4>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    @foreach($data['warehousearray'] as $warehouse)
                                    <h5><li>{{ $warehouse }}</li></h5>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row card-body">
                        <div class="col-md-3">
                            <label><b>Employee Name : {{ Auth::user()->name }}</b></label> <br>
                            <label><b>Employee ID : {{ Auth::user()->id }}</b></label>
                        </div>
                        <!-- <div class="col-md-9">
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width:25%">Total Delivery Qty : </th>
                                    <td style="width:25%">{{ $data['total_order_qty'] }}</td>
                                    <th style="width:30%">Target: </th>
                                    <td style="width:20%">{{ $data['target'] }}</td>
                                </tr>
                                <tr>
                                    <th style="width:25%">Delivered Qty : </th>
                                    <td style="width:25%">{{ $data['delivered_qty'] }}</td>
                                    <th style="width:25%">Achivement: </th>
                                    <td style="width:25%">{{ $data['achivement'] }}</td>
                                </tr>
                                <tr>
                                    <th style="width:25%">Pending Qty : </th>
                                    <td style="width:25%">{{ $data['pending_qty'] }}</td>
                                    <th style="width:25%">Performance: </th>
                                    <td style="width:25%">{{ $data['performance'] }}</td>
                                </tr>
                                <tr>
                                    <th style="width:25%">Cash balance : </th>
                                    <td style="width:25%">{{ $data['cash_balance'] }}</td>

                                </tr>
                            </table>
                        </div> -->
                    </div>
                </div>
            </div>
            {{-- Statistics End here --}}

            @include('backend.staff_panel.account_executive.account_executive_nav')

            <div class="card border-bottom-0">

                <div class="card-body">
                    <!-- <form action="{{route('staff.activity_save')}}" method="post">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <th>Sl</th>
                                <th style="width:180px">Order ID</th>
                                <th>Name</th>
                                <th>Customer ID</th>
                                <th>Address</th>
                                <th>Mobile</th>
                                <th>Area</th>
                                <th>Amount</th>
                                <th>Cash Collection</th>
                                <th>Status</th>
                                
                            </tr>
                            <tbody id="activity_table">
                                @if(count($data['order_daily_activities'])>0)
                                @foreach($data['order_daily_activities'] as $key=>$activity)
                                <?php
                                    $shipping_address = json_decode($activity->shipping_address);
                                    if(!empty($activity->user_id)){
                                        $c_id = $activity->customer_id;
                                        $area = $activity->areaname;
                                    }else{
                                        $c_id = $activity->guest_id;
                                        $area = $shipping_address->area;
                                    }
                                    
                                    ?>
                                <tr id="row_{{$key+1}}">
                                    <td>{{$key+1}}</td>
                                    <td>
                                        <input name="order_no[{{$key+1}}]" value="{{$activity->code}}" onkeyup="get_byorderid('{{$key+1}}')" type="text" class="form-control gtorderid" placeholder="Order ID">
                                        <input name="order_id[{{$key+1}}]" id="order_id_{{$key+1}}" value="{{$activity->id}}"  type="hidden" class="form-control " placeholder="Enter Phone">
                                    </td>
                                    <td>
                                        <input name="name[{{$key+1}}]" value="{{$shipping_address->name}}" type="text" class="form-control" placeholder="Enter Name">
                                    </td>
                                    <td>
                                        <input name="id[{{$key+1}}]" value="{{$c_id}}" type="text" class="form-control" placeholder="Enter ID">
                                    </td>
                                    <td>
                                        <input name="address[{{$key+1}}]" value="{{$shipping_address->address}}" type="text" class="form-control" title="{{$shipping_address->address}}" placeholder="Enter Address">
                                    </td>
                                    <td>
                                        <input name="phone[{{$key+1}}]" value="{{$shipping_address->phone}}" type="text" class="form-control" placeholder="Enter Phone">
                                    </td>

                                    <td>
                                        <input name="area[{{$key+1}}]" value="{{$area}}" type="text" class="form-control" placeholder="Enter Area">
                                    </td>

                                    <td>
                                        <input name="amount[{{$key+1}}]" value="{{$activity->grand_total}}" type="text" class="form-control" placeholder="Enter Amount">
                                    </td>

                                    <td>
                                        <input name="cash_collection[{{$key+1}}]" value="{{$activity->cash_collection}}" type="text" class="form-control" placeholder="Enter cash collection" required>
                                    </td>
                                    <td>
                                        <select class="form-control" name="status[{{$key+1}}]" onchange="update_delivery_status(this.value,{{$activity->id}})">
                                        @if($activity->delivery_status=='on_delivery')
                                        <option value="">Change status</option>
                                            <option @if($activity->delivery_status=='delivered') {{'selected'}} @endif value="delivered">Delivered</option>
                                            @elseif($activity->delivery_status=='delivered')
                                            <option @if($activity->delivery_status=='delivered') {{'selected'}} @endif value="delivered">Delivered</option>
                                            @endif
                                        </select>
                                    </td>
                                    
                                </tr>
                                @endforeach
                                @else
                                <tr id="row_1">
                                    <td style="text-align: center;" colspan="10">No Data Found</td>
                                    
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <input type="submit" class="btn btn-sm btn-primary pull-right" value="Save Activity">
                    </form> -->

                    <!-- form 2 start -->
                <h3 style="text-align:center">Delivery Executive Payment list</h3>
                    <!-- <form action="{{route('staff.delivery_executive_ledger')}}" method="post">
                        @csrf -->
                        <table class="table table-bordered">
                            <tr>
                                <th>Sl</th>
                                <th>Order ID</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Collection Amount</th>
                                <th>Delivery Name</th>
                                <th>Status</th>
                                <!-- <th><a href="javascript:" onclick="addRow2()" class="btn btn-xs btn-success"><i class="las la-plus"></i></a></th> -->
                                <th>Action</th>
                            </tr>
                            <tbody id="activity_table2">
                               
                                @if(count($data2['delivery_executive_ledger'])>0)
                                @foreach($data2['delivery_executive_ledger'] as $key=>$activity)
                                
                                <tr id="row2_{{$key+1}}">
                                    <td>{{$key+1}}</td>
                                    <td>
                                        <input name="order_no[{{$key+1}}]" value="{{$activity->order_no}}" type="number" class="form-control gtorderid" placeholder="Enter Order ID" maxlength="10" readonly>
                                    </td>

                                    <td>
                                        <input name="date[{{$key+1}}]" value="{{$activity->date}}" type="date" class="form-control" placeholder="Enter date" readonly>
                                    </td>
                                  
                                    <td>
                                        <input name="name[{{$key+1}}]" value="{{$activity->name}}" type="text" class="form-control" placeholder="Enter Name" readonly>
                                    </td>
                                   
                                    <td>
                                        <input name="credit[{{$key+1}}]" value="{{$activity->credit}}" type="number" class="form-control" placeholder="Enter Payment Amount" readonly>
                                    </td>
                                    <td>
                                    <select class="form-control" name="note[{{$key+1}}]" disabled>
                                        @foreach(\App\Models\Staff::where('user_id',$activity->user_id)->get() as $u)
                                    <option <?php if($activity->user_id == $u->user_id) echo 'selected';?> value="{{$u->user_id}}">{{$u->user->name}}</option>
                                    @endforeach
                                        </select>
                                        <!-- <input name="note[{{$key+1}}]" value="{{$activity->note}}" type="text" class="form-control" placeholder="Enter Paid To"> -->
                                    </td>
                                  

                                    <td>
                                        <select class="form-control" name="status[{{$key+1}}]" disabled>
                                            <option @if($activity->status=='Pending') {{'selected'}} @endif value="Pending">Pending</option>
                                            <option @if($activity->status=='Paid') {{'selected'}} @endif value="Paid">Paid</option>
                                        </select>
                                    </td>

                                    <td>@if($activity->status=='Pending')
                                    <a href="{{ route('delivery_payment_paid.index',$activity->id)}}" class="btn btn-xs btn-info" onclick="return confirm('Are you sure?')">Paid</a>
                                    @endif
                                        
                                    </td>
                                </tr>
                                
                                @endforeach
                               
                                @else
                                <tr id="row_1">
                                    <td colspan="8" style="text-align:center ;">No Data Available</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <!-- <input type="submit" class="btn btn-sm btn-primary pull-right" value="Save Activity"> -->
                    <!-- </form> -->
                </div>

                
                
                <!-- form2 end -->

            </div>
        </div>
    </div>

</div>


</div>
@endsection
@section('script')
<script type="text/javascript">
    function toggleChevron(e) {
        $(e.target)
            .prev('.card-header')
            .find("i.mdi")
            .toggleClass('mdi-chevron-down mdi-chevron-up');
    }

    $('#accordion').on('hidden.bs.collapse', toggleChevron);
    $('#accordion').on('shown.bs.collapse', toggleChevron);

    function addRow() {
        var row = $('#activity_table').find('tr').length;
        row++;
        var str = '<tr id="row_' + row + '"><td>' + row + '</td><td><input name="order_no[' + row + ']" onkeyup="get_byorderid(' + row + ')" type="text" class="form-control gtorderid" placeholder="Enter Order ID"></td>';
        str += '<td><input name="name[' + row + ']" type="text" class="form-control" placeholder="Enter Name"></td><td><input name="id[' + row + ']" type="text" class="form-control" placeholder="Enter Customer ID"></td><td><input name="addree[' + row + ']" type="text" class="form-control" placeholder="Enter Address"></td>';
        str += '<td><input name="phone[' + row + ']" type="text" class="form-control" placeholder="Enter Phone"></td>  <td><input name="area[' + row + ']" type="text" class="form-control" placeholder="Enter Area"></td> <td> <input name="amount[' + row + ']" type="text" class="form-control" placeholder="Enter Amount"></td>';
        str += '<td><input name="cash_collection[' + row + ']" type="text" class="form-control" placeholder="Enter Cash Collection"></td>';
        str += '<td><select class="form-control" name="status[' + row + ']"><option value="">Select One</option><option value="pending">Pending</option><option value="delivered">Delivered</option></select></td><td><a href="javascript:" onclick="removeRow(' + row + ')" class="btn btn-xs btn-danger"><i class="las la-minus"></i></a></td></tr>';
        $('#activity_table').append(str);
    }

    function removeRow(row) {
        var row = $('#row_' + row).remove();
        $('#activity_table').find('tr').each(function(i, v) {
            $(v).attr('id', 'row_' + (i + 1));
            $(v).find('td').eq(0).html((i + 1));
            $(v).find('td').eq(10).html('<a href="javascript:" onclick="removeRow(' + (i + 1) + ')" class="btn btn-xs btn-danger"><i class="las la-minus"></i></a>');
        })
    }

    function get_byorderid(row) {

        site_url = get_site_url();
        var token = "{{ csrf_token()}}";
        var ordernumber = $('#row_' + row).find('.gtorderid').val();

        if (ordernumber.length >= 10) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                url: site_url + '/get_customer_service_order',
                type: "POST",
                data: {

                    ordernumber: ordernumber,
                },

                success: function(data) {
                    var shipping = JSON.parse(data.shipping_address)
                    $('#row_' + row).find('td').eq(2).find('input').val(shipping.name);
                    $('#row_' + row).find('td').eq(3).find('input').val(data.customer_id);
                    $('#row_' + row).find('td').eq(4).find('input').val(shipping.address);
                    $('#row_' + row).find('td').eq(5).find('input').val(shipping.phone);
                    $('#row_' + row).find('td').eq(6).find('input').val(data.areaname);
                    $('#row_' + row).find('td').eq(7).find('input').val(data.grand_total);
                }

            })


        }


    }


    function addRow2() {
        var row = $('#activity_table2').find('tr').length;
        row++;
        var str = '<tr id="row2_' + row + '"><td>' + row + '</td><td><input name="order_no[' + row + ']"  type="number" class="form-control gtorderid" placeholder="Enter Order No" maxlength="10" required></td>';
        str += '<td><input name="name[' + row + ']" type="text" class="form-control" placeholder="Enter Name"></td>';
        str += '<td><input name="credit[' + row + ']" type="number" class="form-control" placeholder="Enter Payment Amount"></td><td><input name="note[' + row + ']" type="text" class="form-control" placeholder="Enter Paid To"></td>';
        str += '<td> <input name="date[' + row + ']" type="date" class="form-control" placeholder="Enter date"></td>';
        str += '<td><select class="form-control" name="status[' + row + ']"><option value="">Select One</option><option value="Pending">Pending</option><option value="Paid">Paid</option></select></td><td><a href="javascript:" onclick="removeRow2(' + row + ')" class="btn btn-xs btn-danger"><i class="las la-minus"></i></a></td></tr>';
        $('#activity_table2').append(str);
    }

    function removeRow2(row) {
        var row = $('#row2_' + row).remove();
        $('#activity_table2').find('tr').each(function(i, v) {
            $(v).attr('id', 'row2_' + (i + 1));
            $(v).find('td').eq(0).html((i + 1));
            $(v).find('td').eq(10).html('<a href="javascript:" onclick="removeRow2(' + (i + 1) + ')" class="btn btn-xs btn-danger"><i class="las la-minus"></i></a>');
        })
    }

    function update_delivery_status(status,order_id){
        if(status=='on_delivery'){
            alert('Only From Online Order Scan');
        }else{
            //var order_id = $('#order_id_'+row).val();
            $.post('{{ route('orders.update_delivery_status') }}', {_token:'{{ @csrf_token() }}',order_id:order_id,status:status}, function(data){
                AIZ.plugins.notify('success', '{{ translate('Delivery status has been updated') }}');
            });
        }
    }

    //     $( document ).ready(function() {
    //         setTimeout(function() { 
    //             location.reload(true);
    // }, 50000);
            
    //        });

</script>
@endsection