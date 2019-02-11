<?php

namespace App\Http\Controllers;

use App\Productcode;
use App\Purchase;
use App\Supplier;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Collection;
use Yajra\Datatables\Datatables;
class purchaseorderhistoryController extends Controller
{
    //
    public function index(){
        return view('purchaseorderhistory');
    }

    public function allpurchaseorderhistory(Request $request){

        if ($request->has('status')) {
            $fromdate=$request->fromdate;
            $todate=$request->todate;
            $purchaseorderhistory = DB::table('purchaseorderhistory')->where('status',$request->status)
            ->whereDate('purchaseorderdate','>=',$fromdate)->whereDate('purchaseorderdate','<=',$todate)->get();

        }else{
            $fromdate=date('Y-m-d');
            $todate=date('Y-m-d');
            $purchaseorderhistory = DB::table('purchaseorderhistory')->get();
        }



        $data  = [];
        foreach ($purchaseorderhistory as $w) {
            $obj = new \stdClass;
            $obj->purchaseorderdate = $w->purchaseorderdate;
            $obj->purchaseordernumber = $w->purchaseordernumber;
            $obj->product = Productcode::find($w->productid)->name;
            $obj->vendor = \App\Supplier::find($w->supplier_id)->name;
            $obj->status = $w->status;
            $obj->expecteddeliverydate = $w->expecteddeliverydate;
            $obj->quantityordered = $w->quantity;
            $purchase= Purchase::select(['quantity'])->where('purchaseordernumber',$w->purchaseordernumber)->where('productcode',$w->productid)->first();

            $obj->quantityreceived =  is_null($purchase)? '0' :$purchase->quantity;
            $obj->amount = $w->quantity * $w->rate;
            $data[] = $obj;
        }
        $productitems_sorted = new Collection($data);
        return Datatables::of($productitems_sorted)->make(true);
    }
}
