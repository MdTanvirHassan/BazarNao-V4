<?php

namespace App\Models;
use DB;
use App\Models\User;
use App\Models\Search;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DownloadSupplierLedgerReportModel implements FromCollection, WithMapping, WithHeadings
{
    public function __construct($start_date, $end_date,$warehouse)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->warehouse = $warehouse;
    }

    public function collection()
    {

        $start_date = date('Y-m-01');
        $end_date = date('Y-m-t');
        $cust = array();
        $orders = array();
        $wearhouse = $this->warehouse;

    //     $sql = "SELECT
    //     s.supplier_id,s.name,sum(sl.debit) as debit,sum(sl.credit) as credit,sum(sl.balance) as balance
    // FROM
    //     suppliers s
    //     LEFT JOIN supplier_ledger sl ON s.supplier_id = sl.supplier_id";
        
    //      if (!empty($this->start_date) && !empty($this->end_date)) {
    //         $start_date = date('Y-m-d',strtotime($this->start_date));
    //         $end_date = date('Y-m-d',strtotime($this->end_date));
    //         $sql.="	where sl.date between '".$start_date."' and '".$end_date."' or sl.date is null " ;
    //     }else{
    //         $sql.="	where sl.date between '".$start_date."' and '".$end_date."' or sl.date is null " ;
	// 	}



    //     $sql.=" and sl.debit != '0' and sl.credit != '0'
    //     GROUP BY s.supplier_id
    //     order by s.name asc";
    //     $customers = DB::select($sql);

            $suppliers = DB::table('suppliers as s')
            ->select('s.supplier_id', 's.name', DB::raw('SUM(sl.debit) as debit'), DB::raw('SUM(sl.credit) as credit'), DB::raw('SUM(sl.balance) as balance'))
            ->selectSub(function ($query) {
                $query->selectRaw('SUM(sll.debit - sll.credit)')
                    ->from('supplier_ledger as sll')
                    ->whereColumn('s.supplier_id', 'sll.supplier_id')
                    ->where('sll.date', '<', $this->start_date);
            }, 'opening_balance')
            ->leftJoin('supplier_ledger as sl', 's.supplier_id', '=', 'sl.supplier_id')
            ->leftJoin('purchase_order as po', 's.supplier_id', '=', 'po.supplier_id')
            ->where(function ($query) {
                $query->where('sl.debit', '!=', 0)
                    ->orWhere('sl.credit', '!=', 0);
            });


        if (!empty($wearhouse)) {
            $suppliers->where('po.wearhouse_id', $wearhouse);
        }

        if (!empty($this->start_date) && !empty($this->end_date)) {
            $start_date = date('Y-m-d', strtotime($this->start_date));
            $end_date = date('Y-m-d', strtotime($this->end_date));
            $suppliers->where(function ($query) use ($start_date, $end_date) {
                $query->whereBetween('sl.date', [$start_date, $end_date])
                    ->orWhereNull('sl.date');
            });
        } else {
            $suppliers->orWhereNull('sl.date');
        }

        $suppliers->orderBy('s.name', 'ASC');

        $customers = $suppliers->groupBy('s.supplier_id', 's.name')->get();

        return collect($customers);
    }

    public function headings(): array
    {
        return [
            'supplier ID',
            'supplier Name',
            'Opening Balance',
            'Debit',
            'Credit',
            'Balance',

        ];
    }

    public function map($customers): array
    {
        if (!empty($customers->opening_balance) && $customers->opening_balance != 0) {
            $opening_balance = $customers->opening_balance;
        } else {
            $opening_balance = '0.00';
        }
        
        return [
            $customers->supplier_id,
            $customers->name,
            $opening_balance,
            $customers->debit,
            $customers->credit,
            $customers->debit - $customers->credit,
        ];
    }
}
