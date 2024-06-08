@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class=" align-items-center">
        <h1 class="h3">{{translate('Single Employee Sales Performance Report')}}</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <form id="prowasales" action="{{ route('single_employee_sales_performance.index') }}" method="get">
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="col-form-label">{{translate('Sort by Employe Name')}} :</label>
                            <select id="user_id" class="aiz-selectpicker select2" name="user_id" data-live-search="true">
                                <option value=''>All</option>
                                @foreach (DB::table('staff')->leftJoin('users','staff.user_id','=','users.id')->select('staff.*','users.id as userId','users.name')->get() as $key => $user)
                                <option @if(request('user_id') == $user->userId) selected @endif value="{{ $user->userId }}">{{ $user->name }}</option>
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
                        th{text-align:center;}
                    </style>
                  
                    <div class="container">
                        <h2>Single Employee Sales Performance Report</h2>
                        <h6>Employee's Name: <span> {{ $users->isNotEmpty() ? $users[0]->name : "Select Employee from dropdown" }} </span></h6>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="2">Month</th>
                                    @for ($year = $currentYear; $year >= $currentYear - 2; $year--)
                                        <th colspan="1">{{ $year }}</th>
                                    @endfor
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($months as $monthData)
                                <tr>
                                    <td>{{ $monthData['name'] }}</td>
                                    @for ($year = $currentYear; $year >= $currentYear - 2; $year--)
                                        <td class="text-right">{{ single_price($monthData[$year]['amount'], 2) }}</td>
                                    @endfor
                                </tr>
                                @endforeach
                                <tr>
                                    <td style="text-align:right;" colspan="1"><b>Total</b></td>
                                    @for ($year = $currentYear; $year >= $currentYear - 2; $year--)
                                        <td style="text-align:right;"><b>{{ single_price($totals[$year]['amount'], 2) }}</b></td>
                                    @endfor
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

<script>
function printDiv() {
    var printContents = document.querySelector('.printArea').innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>
