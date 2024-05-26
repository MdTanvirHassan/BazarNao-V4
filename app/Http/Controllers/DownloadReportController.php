<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Models\DownloadcuReportModel;
use App\Models\DownloadsalesReportModel;
use App\Models\DownloadPOSsalesReportModel;
use App\Models\DownloadSupplierLedgerReportModel;
use App\Models\DownloadProductWiseSalesReportModel;
use App\Models\CustomersExport;
use App\Models\DownloadMonthlyProductStockLedgerReport;
use App\Models\DownloadWareHouseWiseProductStockLedger;
use App\Models\DownloadProductwisePurchaseReportModel;

class DownloadReportController extends Controller
{

    public function customer_ledg_export(Request $request){
       
        return Excel::download(new DownloadcuReportModel($request->start_date,$request->end_date,$request->user_id,$request->warehouse), 'cusledger.xlsx');
    } 
    public function group_child_product_export(Request $request)
    {
        return Excel::download(new DownloadGroupChildReportModel($request->start_date), 'group_child_product_report.xlsx');
    }
    public function group_product_export(Request $request)
    {
        return Excel::download(new DownloadGroupReportModel($request->start_date), 'group_product_report.xlsx');
    }


    public function sales_ledger_export(Request $request){
       
        return Excel::download(new DownloadsalesReportModel($request->start_date,$request->end_date,$request->search,$request->date,$request->user_id,$request->warehouse), 'salesledger.xlsx');
    }

    public function product_wise_purchase_export(Request $request){
        return Excel::download(new DownloadProductwisePurchaseReportModel($request->start_date,$request->end_date,$request->wearhouse_id,$request->product_id,$request->supplier_id), 'productwisepurchase.xlsx');
    }

    public function pos_sales_ledger_export(Request $request){
        return Excel::download(new DownloadPOSsalesReportModel($request->start_date,$request->end_date,$request->search,$request->date,$request->user_id,$request->warehouse), 'POSsalesledger.xlsx');
    } 


    public function supplier_ledger_export(Request $request){
       
        return Excel::download(new DownloadSupplierLedgerReportModel($request->start_date,$request->end_date,$request->warehouse), 'suppledger.xlsx');
    }
    
    public function customerexport(){
        return Excel::download(new CustomersExport, 'customers.xlsx');
    }

    public function product_sales_export(Request $request){
       
        return Excel::download(new DownloadProductWiseSalesReportModel($request->warehouse,$request->start_date,$request->end_date,$request->search,$request->category_id,$request->product_id), 'ProductWiseSale.xlsx');
    }

   
        public function order_status_changer_report_export(Request $request)
        {
            return Excel::download(new DownloadDailyActivitiesReportModel(
                $request->from_date,
                $request->to_date,
                $request->sort_search,
                $request->user_name,
                $request->order_status
            ), 'DailyActivities.xlsx');
        }


    public function export_wearhouse_wise_stock_ledger_report(Request $request){
        return Excel::download(new DownloadWareHouseWiseProductStockLedger($request->wearhouse_id,$request->product_id,$request->category_id,$request->from_date,$request->to_date), 'WHProductStock.xlsx');
    }

    public function export_monthly_stock_ledger_report(Request $request){
        return Excel::download(new DownloadMonthlyProductStockLedgerReport($request->warehouse_id,$request->category_id,$request->product_id,$request->to_date,$request->from_date), 'MonthlyProductStockLedger.xlsx');
    }
    
}
