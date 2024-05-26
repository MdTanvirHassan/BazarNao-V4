<?php
namespace App\Models;
use DB;
use App\Models\User;
use App\Models\Search;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DownloadProductWiseSalesReportModel implements FromCollection, WithMapping, WithHeadings
{
    public function __construct($wearehouse_id,$start_date, $end_date,$search,$category_id,$product_id)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->search = $search;
        $this->category_id = $category_id;
        $this->product_id = $product_id;
        $this->wearehouse_id = $wearehouse_id;
        //dd($wearehouse_id);
    }

    public function collection()
    {
        $sort_by = null;
        $pro_sort_by = null;
        $start_date = date('Y-m-01 00:00:00');
        $end_date = date('Y-m-t 23:59:59');
        DB::enableQueryLog();

        $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('order_details', 'products.id', '=', 'order_details.product_id')
            ->leftJoin('orders', 'orders.id', '=', 'order_details.order_id')
            ->where('num_of_sale', '>', '0')->select('products.name as product_name','products.purchase_price',
            'categories.name as category_name',DB::raw('sum(order_details.price) AS price'),
            DB::raw('sum(quantity) AS quantity'),DB::raw('count(product_id) AS num_of_sale'))
            ->groupBy('products.id')->orderBy('num_of_sale', 'desc');
            
            

        if (!empty($this->category_id)) {
            $sort_by = $this->category_id;
            $products = $products->where('category_id', $sort_by);
        }

        if (!empty($this->product_id)) {
            $pro_sort_by = $this->product_id;
            $products = $products->where('products.id', $pro_sort_by);
        }

        if(!empty($this->wearehouse_id)){
            $wearhouse = $this->wearehouse_id;
            $products = $products->where('orders.warehouse',$wearhouse);
            
        }
        
        if (!empty($this->start_date) && !empty($this->end_date)) {

            $start_date = strtotime($this->start_date);
            $end_date = strtotime($this->end_date. ' +1 day');
        
            $products = $products->whereBetween('orders.date', [$start_date,$end_date]);
        }else{
            $products = $products->whereBetween('orders.date', [strtotime($start_date),
            strtotime($end_date)]);
        }
        
        $products->where('order_details.delivery_status','delivered');
        $products = $products->get();
        return collect($products);
    }

    public function headings(): array
    {
        return [
            'Product Name',
            'Category',
            'QTY',
            'Unit price',
            'Amount',
            'Num of Sales',
            'Profit',

        ];
    }

    public function map($products): array
    {
        if(!empty($products->quantity)){
            $qty = $products->quantity;
            }else{
            $qty = 1;}
            if (!empty($products->purchase_price)) {
                $profit = $products->price - ($products->purchase_price * $qty);
            }else{
                $profit = 'N/A';}
            
        return [
            $products->product_name,
            $products->category_name,
            $qty,
            $products->price/$qty,
            $products->price,
            $products->num_of_sale,
            $profit,

        ];
    }
}
