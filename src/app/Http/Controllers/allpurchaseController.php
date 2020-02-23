<?php

namespace App\Http\Controllers;

use App\Productcode;
use App\Purchaseorder;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\Datatables\Datatables;
use DB;
use Session;
class allpurchaseController extends Controller
{
    //
    public function index(){
        return view('allpurchaseorder',[
            'routeName'=> parent::getRouteName()
        ]);
    }

    public function allpurchaseorders(){
        $purchaseorder = Purchaseorder::all();

        $data  = [];

        foreach ($purchaseorder as $w) {

            $obj = new \stdClass;
            $obj->id = $w->id;
            $obj->orderdate = $w->date;
            $obj->purchaseordernumber = $w->purchaseordernumber;
            $obj->vendor = Supplier::find($w->supplier_id)->name;
            $obj->expecteddeliverydate= $w->expecteddeliverydate;
            $obj->subamount = $w->subamount;
            $obj->vat= $w->vat;
            
            $obj->subtotal= $w->subtotal;
            $obj->discount= $w->discount;
            $obj->grandtotal= $w->grandtotal;
            $obj->payamount= $w->payamount;
            $obj->dueamount= $w->dueamount;
            $obj->paymenttype= $w->paymenttype;
            $obj->details_url =  route('purchaseorderdetails', $w->purchaseordernumber);
            $obj->action = '
                     <a href="purchaseorderreceiptpdf/'.$w->purchaseordernumber.'" class="printbtn"><i class="fa fa-print fa-1x" style="color:#8080ff" aria-hidden="true"></i> </a> |
                    ';
            $data[] = $obj;
        }

        $purchaseorderitems_sorted = new Collection($data);

        return Datatables::of($purchaseorderitems_sorted) ->make(true);
    }
    public function getpurchaseorders($purchaseordernumber)
    {
        $orders =Purchaseorder::findOrFail($purchaseordernumber)->purchaseorderitems;
        $data  = [];
        foreach ($orders as $w) {
            $obj = new \stdClass;
            $obj->id = $w->id;
            $obj->purchaseordernumber = $w->purchaseordernumber;
            $obj->product = Productcode::find($w->productid)->name;
            $obj->quantity = $w->quantity;
            $obj->rate = $w->rate;
            $obj->amount = $w->amount;
            
            $data[] = $obj;
        }
        $orders_sorted = new Collection($data);

        return Datatables::of($orders_sorted)->make(true);
    }
}
