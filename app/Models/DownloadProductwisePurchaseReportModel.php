<?php
namespace App\Models;
use DB;
use auth;
use App\Models\User;
use App\Models\Search;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DownloadProductwisePurchaseReportModel implements FromCollection, WithMapping, WithHeadings
{
    public function __construct($start_date, $end_date,$wearehouse_id,$product_id,$supplier_id)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->wearehouse_id = $wearehouse_id;
        $this->product_id = $product_id;
        $this->supplier_id = $supplier_id;
    }

    public function collection()
    {
        $pro_sort_by = null;
        $sup_sort_by = null;
        $start_date = date('Y-m-01');
        $end_date = date('Y-m-t');
        $wearhouse_id = null;

        $product_wise_purchase_list = Purchase_order::leftjoin(
            'suppliers',
            'suppliers.supplier_id',
            '=',
            'purchase_order.supplier_id'
        )
            ->join('purchase_order_item', 'purchase_order.id', 'purchase_order_item.po_id')
            ->join('products', 'purchase_order_item.product_id', 'products.id')
            ->select(
                'products.name',
                'suppliers.name as suppliername',
                'purchase_order.purchase_no',
                'purchase_order_item.qty',
                'purchase_order_item.discount',
                'purchase_order_item.price'
            )
            ->where('purchase_order.status', '=', 2);
            
            
        if (!empty($this->wearehouse_id)) {
            $wearhouse_id = $this->wearehouse_id;
            $product_wise_purchase_list =  $product_wise_purchase_list->where('purchase_order_item.wearhouse_id', $wearhouse_id);
        }

        if (!empty($this->product_id)) {
            $pro_sort_by = $this->product_id;
            $product_wise_purchase_list = $product_wise_purchase_list->whereIn('purchase_order_item.product_id', $pro_sort_by);

        }

        if (!empty($this->supplier_id)) {
            $sup_sort_by = $this->supplier_id;
            $product_wise_purchase_list =  $product_wise_purchase_list->where('purchase_order.supplier_id', $sup_sort_by);
        }

        
        if (!empty($this->start_date) && !empty($this->end_date)) {

            $start_date = date('Y-m-d 00:00:00',strtotime($this->start_date));
            $end_date = date('Y-m-d 23:59:59',strtotime($this->end_date));
        
            $product_wise_purchase_list = $product_wise_purchase_list->whereBetween('date', [$start_date,$end_date]);
        }else{
            $product_wise_purchase_list = $product_wise_purchase_list->whereBetween('date', [strtotime($start_date),
            strtotime($end_date)]);
        }
        
        $product_wise_purchase_list =   $product_wise_purchase_list->get();
        // dd($product_wise_purchase_list);
        return collect($product_wise_purchase_list);
    }

    public function headings(): array
    {
        return [
            'Purchase No',
            'Product Name',
            'Supplier',
            'QTY',
            'Price',
            'Amount',
        ];
    }

    public function map($product_wise_purchase_list): array
    {
        return [
            $product_wise_purchase_list->purchase_no,
            $product_wise_purchase_list->name,
            $product_wise_purchase_list->suppliername,
            $product_wise_purchase_list->qty,
            $product_wise_purchase_list->price,
            $product_wise_purchase_list->qty*$product_wise_purchase_list->price
        ];
    }
}
