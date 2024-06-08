@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class=" align-items-center">
        <h1 class="h3">{{ translate('Employee Sales Performance Compare Yearly Report') }}</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <button class="btn btn-sm btn-info mx-2" onclick="printDiv()" type="button">{{ translate('Print') }}</button>

                <div class="printArea">
                    <style>
                        th, td { text-align: center; }
                    </style>

                    <div class="container">
                        <h4>{{ translate('Employee Sales Performance Compare Yearly Report') }}</h4>
                        <h6>Year: {{$year}}</h6>

                        <table class="table table-bordered table-responsive table-striped text-sm">
                            <thead>
                                <tr>
                                    <th>{{ translate('Employee Name') }}</th>
                                    @foreach ($months as $month)
                                        <th>{{ DateTime::createFromFormat('!m', $month)->format('F') }}</th>
                                    @endforeach
                                    <th>{{ translate('Total') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $monthly_totals = array_fill(1, 12, 0);
                                    $grand_total = 0;
                                @endphp
                                @foreach ($employeeData as $employee)
                                    @php
                                        $employee_total = 0;
                                    @endphp
                                    <tr>
                                        <td>{{ $employee['name'] }}</td>
                                        @foreach ($months as $month)
                                            @php
                                                $month_data = $employee['totals'][$month] ?? 0;
                                                $monthly_totals[$month] += $month_data;
                                                $employee_total += $month_data;
                                            @endphp
                                            <td>{{ single_price($month_data, 2) }}</td>
                                        @endforeach
                                        <td><b>{{ single_price($employee_total, 2) }}</b></td>
                                    </tr>
                                    @php
                                        $grand_total += $employee_total;
                                    @endphp
                                @endforeach
                                <tr>
                                    <td><b>Total:</b></td>
                                    @foreach ($months as $month)
                                        <td><b>{{ single_price($monthly_totals[$month], 2) }}</b></td>
                                    @endforeach
                                    <td><b>{{ single_price($grand_total, 2) }}</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- <div class="container mt-4">
                        <h2>{{ translate('Select Year') }}</h2>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    @for ($year = $currentYear; $year >= $currentYear - 2; $year--)
                                        <th><a href="{{ route('employee_sales_performance_compare_per_year.index', ['year' => $year]) }}" target="_blank">{{ $year }}</a></th>
                                    @endfor
                                </tr>
                            </thead>
                        </table>
                    </div> --}}

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
