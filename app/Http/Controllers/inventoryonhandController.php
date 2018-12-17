<?php

namespace App\Http\Controllers;

use App\Helpers\ReportHelper;
use App\Productcategory;
use App\Supplier;
use App\Warehouse;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Collection;
use Yajra\Datatables\Datatables;
class inventoryonhandController extends Controller
{
    //
    public function inventoryonhand(){
        return view('inventoryonhand');
    }
    public function allinventoryonhand(Request $request){

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
            $obj->date = $w->date;
            $obj->productname = $w->name;
            $obj->productcode = $w->productcode;
            $obj->store = Warehouse::find($w->store_issue_to)->name;
            $obj->supplier = Supplier::find($w->supplier_id)->name;
            $obj->productcategory = Productcategory::find($w->productcategory_id)->name;
            $obj->unit = $w->unit;
            $obj->cost= ReportHelper::getproductioncost($fromdate,$todate,$w->store_issue_to,$w->productcode);
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

        return Datatables::of($productitems_sorted)->make(true);
    }
}
