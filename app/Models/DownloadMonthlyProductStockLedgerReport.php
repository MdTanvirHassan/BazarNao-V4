<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class DownloadMonthlyProductStockLedgerReport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize
{
    private $warehouse_id;
    private $category_id;
    private $product_id;
    private $to_date;
    private $from_date;

    public function __construct($warehouse_id, $category_id, $product_id, $to_date, $from_date)
    {
        $this->warehouse_id = $warehouse_id;
        $this->category_id = $category_id;
        $this->product_id = $product_id;
        $this->to_date = $to_date;
        $this->from_date = $from_date;
    }

    public function collection()
    {

        $category_id = '';
        $product_id = '';
        $warehouse_id = '';

        if (!empty($this->from_date) && !empty($this->to_date)) {
            $from_date = date('Y-m-d 00:00:00', strtotime($this->from_date));
            $to_date = date('Y-m-d 23:59:59', strtotime($this->to_date));
            $startDate = date('Y-m-d', strtotime($this->from_date));
            $endDate = date('Y-m-d', strtotime($this->to_date));
        } else {
            $from_date = date('Y-m-01 00:00:00');
            $to_date = date('Y-m-t 23:59:59');
            $startDate = date('Y-m-01');
            $endDate = date('Y-m-t');
        }

        if (!empty($this->warehouse_id)) {
            $warehouse_id = $this->warehouse_id;

            $products = Product::select('products.*', 'categories.id as cat_id', 'categories.name as cat_name')
                ->leftjoin('categories', 'products.category_id', 'categories.id')
                ->where('products.parent_id', '=', null);

            if (!empty($this->category_id) && !empty($this->product_id)) {
                $category_id = $this->category_id;
                $product_id = $this->product_id;
                $products = $products->where('categories.id', $this->category_id)->where('products.id', $this->product_id)->get();
            } elseif (!empty($this->category_id)) {
                $category_id = $this->category_id;
                $products = $products->where('categories.id', $this->category_id)->get();
            } else {
                $products = $products->get();
            }

            $opening_stock_qty = 0;
            $opening_stock_amount = 0;
            $receive_qty = 0;
            $receive_amount = 0;
            $purchase_qty = 0;
            $purchase_amount = 0;
            $sales_qty = 0;
            $sales_amount = 0;
            $damage_qty = 0;
            $damage_amount = 0;
            $transfer_qty = 0;
            $transfer_amount = 0;
            $closing_stock_qty = 0;
            $closing_stock_amount = 0;

            foreach ($products as $key => $value) {
                // Added Stock Part
                $opening_stocks = OpeningStock::where('product_id', $value->id)->where('wearhouse_id', $warehouse_id)->whereBetween('created_at', array($from_date, $to_date))->get();
                foreach ($opening_stocks as $openStock) {
                    $products[$key]->opening_stock_qty += $openStock->qty;
                    $products[$key]->opening_stock_amount += $openStock->qty * $openStock->price;
                }

                $purchases = Purchase_order_item::select('purchase_order_item.id', 'purchase_order_item.po_id', 'purchase_order_item.product_id', 'purchase_order_item.wearhouse_id', 'purchase_order_item.qty', 'purchase_order_item.price', 'purchase_order_item.amount', 'purchase_order.status', 'purchase_order.date')->leftjoin('purchase_order', 'purchase_order.id', '=', 'purchase_order_item.po_id')->where('purchase_order.status', 2)->where('purchase_order_item.product_id', $value->id)->where('purchase_order_item.wearhouse_id', $warehouse_id)->whereBetween('purchase_order.date', array($startDate, $endDate))->get();
                foreach ($purchases as $purchase) {
                    $products[$key]->purchase_qty += $purchase->qty;
                    $products[$key]->purchase_amount += $purchase->qty * $purchase->price;
                }

                $received = Transfer::select('transfers.id', 'transfers.product_id', 'transfers.to_wearhouse_id', 'transfers.qty', 'transfers.unit_price as price', 'transfers.amount', 'transfers.status', 'transfers.date')->where('product_id', $value->id)->where('status', 'Approved')->where('to_wearhouse_id', $warehouse_id)->whereBetween('date', array($startDate, $endDate))->get();
                foreach ($received as $rece) {
                    $products[$key]->receive_qty += $rece->qty;
                    $products[$key]->receive_amount += $rece->qty * $rece->price;
                }

                // Minus Stock Part
                $main_orders = OrderDetail::select('order_details.id', 'order_details.order_id', 'order_details.product_id', 'order_details.price', 'order_details.quantity as qty', 'order_details.delivery_status', 'orders.warehouse', 'order_details.created_at', 'order_details.updated_at')->leftjoin('orders', 'orders.id', '=', 'order_details.order_id')->where('order_details.delivery_status', 'delivered')->where('order_details.product_id', $value->id)->where('orders.warehouse', $warehouse_id)->whereBetween('order_details.created_at', array($from_date, $to_date))->get();
                $child_orders = Product::select('order_details.id', 'order_details.order_id', 'order_details.product_id', 'order_details.price', DB::raw('products.deduct_qty * order_details.quantity as qty'), 'order_details.delivery_status', 'orders.warehouse', 'order_details.created_at', 'order_details.updated_at')->leftjoin('order_details', 'order_details.product_id', 'products.id')->leftjoin('orders', 'orders.id', 'order_details.order_id')->where('parent_id', $value->id)->where('orders.warehouse', $warehouse_id)->where('order_details.delivery_status', 'delivered')->whereBetween('order_details.created_at', array($from_date, $to_date))->get();
                $orders = $main_orders->merge($child_orders);
                foreach ($orders as $o_key => $o_value) {
                    $products[$key]['sales_qty'] += $o_value->qty;
                    $products[$key]['sales_amount'] += $o_value->price;
                }

                $transfers = Transfer::select('transfers.id', 'transfers.product_id', 'transfers.from_wearhouse_id', 'transfers.qty', 'transfers.unit_price as price', 'transfers.amount', 'transfers.status', 'transfers.date')->where('product_id', $value->id)->where('status', 'Approved')->where('from_wearhouse_id', $warehouse_id)->whereBetween('date', array($startDate, $endDate))->get();
                foreach ($transfers as $t_key => $t_value) {
                    $products[$key]['transfer_qty'] += $t_value->qty;
                    $products[$key]['transfer_amount'] += $t_value->qty * $t_value->price;
                }

                $damages = Damage::select('damages.id', 'damages.product_id', 'damages.wearhouse_id', 'damages.qty', 'damages.total_amount as amount', 'damages.status', 'damages.date')->where('product_id', $value->id)->where('status', 'Approved')->where('wearhouse_id', $warehouse_id)->whereBetween('date', array($startDate, $endDate))->get();
                foreach ($damages as $d_key => $d_value) {
                    $products[$key]['damage_qty'] += $d_value->qty;
                    $products[$key]['damage_amount'] += $d_value->qty * $d_value->price;
                }

                // Marge Added Stock Product
                $purchase_item = $opening_stocks->merge($purchases)->merge($received);

                // Marge Minus Stock Product
                $sales = $main_orders->merge($child_orders)->merge($transfers)->merge($damages);

                // FIFO Calculation
                foreach ($sales->toArray() as $sale_key => $sale) {
                    $purAmount = 0;
                    $balance = $sale['qty'];

                    $detail = [];
                    foreach ($purchase_item->toArray() as $pur_key => $pur) {
                        if ($balance != 0) {
                            if ($pur['qty'] <= $balance) {
                                $purchase_item[$pur_key]['qty'] = 0;
                                $temPur[] = $pur;
                                unset($purchase_item[$pur_key]);
                                $purAmount += $pur['qty'] * $pur['price'];
                                $detail[] = $pur['qty'] . "*" . $pur['price'] . "=" . $pur['qty'] * $pur['price'];
                                $balance -= $pur['qty'];
                            } else {
                                if ($pur['qty'] > $balance) {
                                    $balance -= $pur['qty'];
                                    $saleQty = $pur['qty'] - abs($balance);
                                    $purchase_item[$pur_key]['qty'] = abs($balance);
                                    if ($balance != 0) {
                                        $purAmount += $saleQty * $pur['price'];
                                        $detail[] = $saleQty . "*" . $pur['price'] . "=" . $saleQty * $pur['price'];
                                    }
                                    $balance = max(0, $balance);
                                    break;
                                }
                            }
                        }
                    }
                    $sales[$sale_key]['details'] = $detail;
                    $sales[$sale_key]['purAmt'] = $purAmount;
                    $sales[$sale_key]['amount'] =  $sales[$sale_key]['qty'] * $sales[$sale_key]['price'];
                    $sales[$sale_key]['gainLoss'] =  $sales[$sale_key]['amount'] - $sales[$sale_key]['purAmt'];
                }

                foreach ($purchase_item as $new_pur_value) {
                    $products[$key]->closing_stock_qty += $new_pur_value->qty;
                    $products[$key]->closing_stock_amount += $new_pur_value->qty * $new_pur_value->price;
                }

                $opening_stock_qty += $value->opening_stock_qty;
                $opening_stock_amount += $value->opening_stock_amount;
                $receive_qty += $value->receive_qty;
                $receive_amount += $value->receive_amount;
                $purchase_qty += $value->purchase_qty;
                $purchase_amount += $value->purchase_amount;
                $sales_qty += $value->sales_qty;
                $sales_amount += $value->sales_amount;
                $damage_qty += $value->damage_qty;
                $damage_amount += $value->damage_amount;
                $transfer_qty += $value->transfer_qty;
                $transfer_amount += $value->transfer_amount;
                $closing_stock_qty += $value->closing_stock_qty;
                $closing_stock_amount += $value->closing_stock_amount;

                $lastRow = [
                    'name'                  => 'Total',
                    'opening_stock_qty'     => $opening_stock_qty,
                    'opening_stock_amount'  => $opening_stock_amount,
                    'receive_qty'           => $receive_qty,
                    'receive_amount'        => $receive_amount,
                    'purchase_qty'          => $purchase_qty,
                    'purchase_amount'       => $purchase_amount,
                    'sales_qty'             => $sales_qty,
                    'sales_amount'          => $sales_amount,
                    'damage_qty'            => $damage_qty,
                    'damage_amount'         => $damage_amount,
                    'transfer_qty'          => $transfer_qty,
                    'transfer_amount'       => $transfer_amount,
                    'closing_stock_qty'     => $closing_stock_qty,
                    'closing_stock_amount'  => $closing_stock_amount,
                ];

            }
            $products->push((object)$lastRow);

        } else {
            $products = '';
        }
        return collect($products);
    }

    public function headings(): array
    {
        return [
            'Product Name',
            'O.S.Qty',
            'O.S.Amount',
            'Trns.R.Qty',
            'Trns.R.Amount',
            'P.Qty',
            'P.Amount',
            'Sa.Qty',
            'Sa.Amount',
            'D.Qty',
            'D.Amount',
            'Trns.Qty',
            'Trns.Amount',
            'C.Qty',
            'C.Amount',
        ];
    }

    public function map($products): array
    {
        return[
            $products->name,
            $products->opening_stock_qty ? $products->opening_stock_qty : '0',
            $products->opening_stock_amount ? single_price($products->opening_stock_amount) : single_price('0.00'),
            $products->receive_qty ? $products->receive_qty : '0',
            $products->receive_amount ? single_price($products->receive_amount) : single_price('0.00'),
            $products->purchase_qty ? $products->purchase_qty : '0',
            $products->purchase_amount ? single_price($products->purchase_amount) : single_price('0.00'),
            $products->sales_qty ? $products->sales_qty : '0',
            $products->sales_amount ? single_price($products->sales_amount) : single_price('0.00'),
            $products->damage_qty ? $products->damage_qty : '0',
            $products->damage_amount ? single_price($products->damage_amount) : single_price('0.00'),
            $products->transfer_qty ? $products->transfer_qty : '0',
            $products->transfer_amount ? single_price($products->transfer_amount) : single_price('0.00'),
            $products->closing_stock_qty ?   $products->closing_stock_qty : '0',
            $products->closing_stock_amount ? single_price($products->closing_stock_amount) : single_price('0.00')
        ];
    }
}
