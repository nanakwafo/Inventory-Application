<?php

namespace App\Http\Controllers;

use App\Goodreceive;
use App\Helpers\AppHelper;
use App\Product;
use App\Productcategory;
use App\Productcode;
use App\Supplier;
use App\Warehouse;
use App\Warehouseitem;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\Datatables\Datatables;
use DB;
use Session;
class warehouseitemController extends Controller
{
    //
    public function index(){
        return view('warehouseitem',[
            'routeName'=> parent::getRouteName()
        ]);

    }
    public function getwarehouseitemData()
    {
        $warehouseitems = Warehouseitem::all();
        $data  = [];
        foreach ($warehouseitems as $w) {
            $obj = new \stdClass;
            $obj->id = $w->id;
            $obj->date = Goodreceive::find($w->goodreceive_grnnumber)->grndate;

            $obj->goodreceive_grnnumber = $w->goodreceive_grnnumber;
            $obj->warehousename = Warehouse::find($w->warehouse_id)->name;
            $obj->suppliername = Supplier::find($w->supplier_id)->name;
            $obj->product = Productcode::find($w->productcode)->name;
//            $obj->productcategory = ",mkmkdss";//Productcategory::find($w->productcode)->name;
            $obj->description = $w->description;
            $obj->quantity = $w->quantity;
            $data[] = $obj;
        }

        $warehouseitems_sorted = new Collection($data);

        return Datatables::of($warehouseitems_sorted)->make(true);
    }

    public function getwarehouseproductstats(){
        $warehouseitems = Warehouseitem::select('warehouse_id','productcode')->groupBy('warehouse_id','productcode')->get();

        $data  = [];
        foreach ($warehouseitems as $w) {
            $obj = new \stdClass;
            $obj->warehousename = Warehouse::find($w->warehouse_id)->name;
            $obj->productname = Productcode::find($w->productcode)->name;
            $obj->quantityleft = AppHelper::get_remaining_product_from_warehouse($w->warehouse_id,$w->productcode);
            $data[] = $obj;
        }
        $warehouseitems_sorted = new Collection($data);

        return Datatables::of($warehouseitems_sorted)->make(true);
    }
}
