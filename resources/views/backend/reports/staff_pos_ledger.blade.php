@extends('backend.layouts.staff')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class=" align-items-center">
        <h1 class="h3">{{translate('Staff Pos Ledger')}}</h1>
    </div>
</div>
@include('backend.staff_panel.sales_executive_nav')
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <form id="culexpo" class="" action="" method="GET">

                <div class="row">
                    <button class="btn btn-sm btn-info" onclick="printDiv()" type="button">{{ translate('Print') }}</button>
                    <hr>
                    @if((auth()->user()->staff->role->name == 'Sales Executive'))
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#paymentModal" type="button">{{ translate('Pay To Accounts') }}</button>
                    @endif
                </div>
                <hr>
                <div class="printArea">
                    <style>
                        th {
                            text-align: center;
                        }
                    </style>
                    @if(!empty($cust))
                    <div class=row>
                        <div class="col-md-3">
                            <div class="form-group mb-0">
                                <label>Date Range :</label>
                                <input type="date" name="start_date" class="form-control" value="{{$start_date}}">
                                <input type="date" name="end_date" class="form-control" value="{{$end_date}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-0">
                                <label>Filter By Payment :</label>
                                <select class="form-control" name="pos_type" id="pos_type">
                                    <option value="">Select One</option>
                                    <option  value="Payment" @if($pos_type == "Payment") selected @endif >Payment </option>   
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-0">
                                <label>Status of Payment :</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="">Select One</option>
                                    <option  value="Pending" @if($status == "Pending") selected @endif >Pending </option>   
                                    <option  value="Accepted" @if($status == "Accepted") selected @endif >Accepted </option>   
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <button class="btn btn-sm btn-primary" onclick="submitForm ('{{ route('staff_pos_ledger') }}')">{{ translate('Filter') }}</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12" style="text-align: center;">
                            <p><b>POS Ledger Details</b></p>
                            <p><b> Period : </b> {{date('d-m-Y',strtotime($start_date))}} to {{date('d-m-Y',strtotime($end_date))}}</p>
                        </div>
                    </div>
                    @endif
                    <table class="table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ translate('Date') }}</th>
                                <th>{{ translate('Ordr ID') }}</th>
                                <th>{{ translate('Type') }}</th>
                                <th>{{ translate('Order Amount') }}</th>
                                <th>{{ translate('Due') }}</th>
                                <th>{{ translate('Debit') }}</th>
                                <th>{{ translate('Credit') }}</th>
                                <th>{{ translate('Balance') }}</th>
                                <th>{{ translate('Invoice') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $order_amount = 0;
                            $due_amount = 0;
                            $debit = 0;
                            $credit = 0;
                            $balance = $opening[0]->opening_balance;
                            $invoice_number = 0;
                            $invoice_code = 0;
                            @endphp

                            <tr>
                                <td colspan="8" style="text-align:right">Opening Balance</td>
                                <td style="text-align:right;">{{ single_price($balance) }}</td>
                            </tr>
                            @foreach($statements as $key=>$statement)
                            <?php

                            $debit += $statement->debit;
                            $order_amount += $statement->order_amount;
                            $due_amount = $order_amount - $debit;

                            if($statement->accounts_executive_status == "Pending"){
                            $acamount = 0;
                            }else{
                            $acamount = $statement->credit;
                            }

                            $credit += $acamount;

                            if($statement->accounts_executive_status == "Pending"){
                            $balance += $statement->debit - 0;
                            }else{
                            $balance += $statement->debit - $statement->credit;
                            }

	              
                            $invoice_number = \App\Models\Order::select('code')
                                ->where('id', $statement->order_id)
                                ->first();

                            if ($invoice_number) {
                                $invoice_code = $invoice_number->code;
                            } else {
                                $invoice_code = 'N/A'; // Or any default value you prefer
                            }

                            

                            ?>
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ date('d-m-Y',strtotime($statement->date)) }}</td>
                                <td>
                                    <a href="{{route('all_orders.show', encrypt($statement->order_id))}}" target="_blank" title="{{ translate('View') }}">{{ $statement->order_id }}</a>
                                </td>
                                <td>{{ $statement->type }}</td>
                                <td style="text-align:right">{{ $statement->order_amount }}</td>
                                <td style="text-align:right">{{ single_price($statement->due) }}</td>
                                <td style="text-align:right">{{ single_price($statement->debit) }}</td>
                                <td style="text-align:right">

                                    @if(($statement->accounts_executive_status == 'Pending') && (auth()->user()->staff->role->name == 'Account Executive'))
                                    <a href="{{ route('pos_amount_transfer_accept',$statement->poslid)}}" class="btn btn-xs btn-info" onclick="return confirm('Are you sure?')">Accept</a>
                                    @endif
                                    <span class="@if($statement->accounts_executive_status == 'Pending')text-danger @else text-success @endif">

                                        {{($statement->accounts_executive_status) }}</span>
                                    {{single_price($statement->credit) }}
                                </td>
                                <td style="text-align:right;">{{ single_price($balance) }}</td>
                                <td style="text-align:center">
                                    <a href="{{ url('/pos/gen-invoice/'.$statement->order_id) }}" target="_blank" title="{{ translate('Invoice') }}">{{ $invoice_code  }}</a>
                                </td>

                            </tr>
                            @endforeach
                            <tr>
                                <th colspan="4" style="text-align:right">Total</th>
                                <th style="text-align:right">{{single_price($order_amount,2)}}</th>
                                <th style="text-align:right">{{single_price($due_amount,2)}}</th>
                                <th style="text-align:right">{{single_price($debit,2)}}</th>
                                <th style="text-align:right">{{single_price($credit,2)}}</th>
                                <th style="text-align:right;"><b>{{single_price($balance)}}</b></th>
                                <th style="text-align:right;"><b></b></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>


<!-- The modal -->
<div class="modal" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Pay To Accounts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="paymentAmount">Amount:</label>
                    <input type="number" class="form-control" id="Amount" name="Amount" value="{{ $balance }}" readonly>
                </div>
                <div class="form-group">
                    <label for="paymentAmount">Payment Amount:</label>
                    <input type="number" class="form-control" id="paymentAmount" name="paymentAmount" required>
                </div>
                <button type="button" onclick="submitAmount()" class="btn btn-primary">Submit Payment</button>
            </div>
        </div>
    </div>
</div>

<script>
    function submitAmount(){
        let paymentAmountbyname = $('input[name=paymentAmount]').val();
        let paymentAmountbyid = parseInt($('#paymentAmount').val());
        let total_due = parseInt({{ $balance }});
         if(paymentAmountbyid > total_due ){
            AIZ.plugins.notify('danger', '{{ translate('Pay amount must be less than or equal balance') }}');
            $('#paymentModal').modal('hide');
            return false;
         }else{
            $.post('{{ route('pos_amount_transfer') }}',{
                _token                  : AIZ.data.csrf, 
                paymentAmountbyid       : paymentAmountbyid,
            },function(data){
                if(data.success==1){
                $('#paymentModal').modal('hide');
                 AIZ.plugins.notify('success','Amount Submited Successfully');
                 location.reload().setTimeOut(500);
                }else{
                 $('#paymentModal').modal('hide');
                 AIZ.plugins.notify('danger','Not Allow If Has Any Pending Request');
                 
                }
            });
         }
    }

    function submitForm(url) {
        $('#culexpo').attr('action', url);
        $('#culexpo').submit();
    }

</script>
@endsection