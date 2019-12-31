<?php

namespace App\Http\Controllers;

use App\Goodreceive;
use App\Helpers\AppHelper;
use App\Helpers\ReportHelper;
use App\Productcategory;
use App\Productcode;
use App\Supplier;
use App\Warehouse;
use App\Warehouseitem;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Collection;
use Yajra\Datatables\Datatables;
class inventoryonhandController extends Controller
{
    //
    public function inventoryonhandstore(){
        return view('inventoryonhandstore');
    } 
    public function inventoryonhandwarehouse(){
        return view('inventoryonhandwarehouse');
    }
    public function allinventoryonhandstore(Request $request){

        if ($request->has('store')) {
            $fromdate=$request->fromdate;
            $todate=$request->todate;
            $productitems = DB::table('inventoryonhand')
                ->where('store_issue_to',$request->store)
                ->where('productcode',$request->product)
                ->whereDate('date','>=',$fromdate)->whereDate('date','<=',$todate)
                ->get();
        }else{
            $fromdate=date('Y-m-d');
            $todate=date('Y-m-d');
            $productitems = DB::table('inventoryonhand')->get();
        }



        $data  = [];

        foreach ($productitems as $w) {
            $obj = new \stdClass;
//            $obj->date = $w->date;
            $obj->productname = $w->name;
            $obj->productcode = $w->productcode;
            $obj->store = Warehouse::find($w->store_issue_to)->name;
            $obj->supplier = Supplier::find($w->supplier_id)->name;
            $obj->productcategory = Productcategory::find($w->productcategory_id)->name;
            $obj->unit = $w->unit;
            $obj->cost= ($w->quantity)* ( ReportHelper::getproductionunitcost($fromdate,$todate,$w->store_issue_to,$w->productcode));
            $obj->retailprice = $w->rate;
            $obj->purchaseordernumber = $w->purchaseordernumber;
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

        return Datatables::of($productitems_sorted)->make(true);
    }
    
    public function allinventoryonhandwarehouse(Request $request){

        if ($request->has('warehouse')) {
            $fromdate=$request->fromdate;
            $todate=$request->todate;
            $productitems = DB::table('warehousesummary')
                  ->where('warehouse_id',$request->warehouse)
                ->where('productcode',$request->product)
                ->whereDate('grndate','>=',$fromdate)->whereDate('grndate','<=',$todate)
                ->groupBy('warehouse_id')
                ->get();

        }else{
            $fromdate=date('Y-m-d');
            $todate=date('Y-m-d');
            $productitems = DB::table('warehousesummary')->get();
        }



        $data  = [];
        foreach ($productitems as $w) {
            $obj = new \stdClass;
            $obj->receivedate = $w->grndate;
            $obj->product = Productcode::find($w->productcode)->name;
            $obj->productcode = $w->productcode;
            $obj->warehouse = Warehouse::find($w->warehouse_id)->name;
            $obj->quantity_in = $request->has('warehouse')? AppHelper::get_quantity_in_warehouse_between_date($w->warehouse_id,$w->productcode,$fromdate,$todate) : AppHelper::get_quantity_in_warehouse($w->warehouse_id,$w->productcode);

            $obj->quantity_out = $request->has('warehouse')? AppHelper::get_quantity_out_warehouse_between_date($w->warehouse_id,$w->productcode,$fromdate,$todate) : AppHelper::get_quantity_out_warehouse($w->warehouse_id,$w->productcode);

            $obj->quantity_remaining =$request->has('warehouse')? AppHelper::get_remaining_product_from_warehouse_between_dates($w->warehouse_id,$w->productcode,$fromdate,$todate) : AppHelper::get_remaining_product_from_warehouse($w->warehouse_id,$w->productcode);
            $obj->value_onhand = 1;
            $data[] = $obj;
        }
        $productitems_sorted = new Collection($data);
        return Datatables::of($productitems_sorted)->make(true);
    }
    
}
