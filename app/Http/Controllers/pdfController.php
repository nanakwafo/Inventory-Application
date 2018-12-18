<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use PDF;
use DB;
use App\Warehouse;
use App\Supplier;
use App\Productcategory;
use App\Helpers\AppHelper;
use App\Helpers\ReportHelper;
use Illuminate\Support\Collection;
class pdfController extends Controller
{
    //
    public function inventoryonhandpdf($store,$fromdate,$todate,$product){
        if ($store=="all") {
            $productitems = DB::table('inventoryonhand')->get();
        }else{
            $productitems = DB::table('inventoryonhand')
                ->where('store_issue_to',$store)
                ->where('productcode',$product)
                ->whereDate('date','>=',$fromdate)->whereDate('date','<=',$todate)
                ->get();
        }


        $data  = [];

        foreach ($productitems as $w) {
            $obj = new \stdClass;
            $obj->date = $w->date;
            $obj->productname = $w->name;
            $obj->productcode = $w->productcode;
            $obj->store = Warehouse::find($w->store_issue_to)->name;
            $obj->supplier = Supplier::find($w->supplier_id)->name;
            $obj->productcategory = Productcategory::find($w->productcategory_id)->name;
            $obj->unit = $w->unit;
            $obj->cost= ($w->quantity)* ( ReportHelper::getproductionunitcost($fromdate,$todate,$w->store_issue_to,$w->productcode));
            $obj->retailprice = $w->rate;
            $obj->reorderlimit = $w->reorderlimit;
            $obj->startinginventory = ReportHelper::getstartinginventory($fromdate,$todate,$w->store_issue_to,$w->productcode);
            $obj->received = ReportHelper::received($fromdate,$todate,$w->store_issue_to,$w->productcode);
            $obj->usage = ReportHelper::usage($fromdate,$todate,$w->store_issue_to,$w->productcode);
            $obj->onhand = ReportHelper::onhand($fromdate,$todate,$w->store_issue_to,$w->productcode);
            $obj->variance = ReportHelper::variance($fromdate,$todate,$w->store_issue_to,$w->productcode);
            $obj->variancecost = ReportHelper::variancecost($fromdate,$todate,$w->store_issue_to,$w->productcode);
            $obj->onhandvalue = $w->quantity * $w->rate;
            $data[] = $obj;
        }

        $productitems_sorted = new Collection($data);
        
        
        
        $html=view('pdf.inventoryonhand')->with([
           'data'=>$productitems_sorted
           ])->render();

        $mypdf= new  PDF();
        $mypdf::filename('inventoryonhand'.date('Y-m-d'));

        return $mypdf::load($html, 'A4', 'landscape')->show();
    }
    
    public function orderreceiptpdf($ordernumber){
        $data=Order::where('ordernumber',$ordernumber)->get();
        $html=view('pdf.orderreceipt')->with([
            'data'=>$data,
            'ordernumber'=>$ordernumber
        ])->render();
        return PDF::load($html)->show();
    }
}
