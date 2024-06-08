@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class=" align-items-center">
        <h1 class="h3">{{ translate('Employee Sales Performance Compare Report') }}</h1>
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
                        <h2>{{ translate('Employee Sales Performance Compare Report') }}</h2>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ translate('Employee Name') }}</th>
                                    @for ($year = $currentYear; $year >= $currentYear - 2; $year--)
                                        <th><a href="{{ route('employee_sales_performance_compare_per_year.index', ['year' => $year]) }}" target="_blank">{{ $year }}</a></th>
                                    @endfor
                                </tr>
                            </thead>
                            <tbody>
                                @php $total_amount = 0; @endphp
                                @foreach ($employeeData as $employee)
                                @php $total_amount += array_sum(array_column($employee['totals'], 'amount')); @endphp
                                    <tr>
                                        <td>{{ $employee['name'] }}</td>
                                        @foreach ($employee['totals'] as $total)
                                            <td class="text-right">{{ single_price($total, 2) }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                                <tr>
                                    <td style="text-align:right;"><b>Total:</b></td>
                                    @foreach ($employeeData[0]['totals'] as $year => $yearTotal)
                                        <?php
                                            $total = 0;
                                            foreach ($employeeData as $employee) {
                                                $total += $employee['totals'][$year];
                                            }
                                        ?>
                                        <td style="text-align:right;"><b>{{ single_price($total, 2) }}</b></td>
                                    @endforeach
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
