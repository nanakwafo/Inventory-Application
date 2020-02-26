<?php

namespace App\Http\Controllers;

use App\Storeitem;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\Datatables\Datatables;
use DB;
use Session;
use App\Warehouse;
use App\Productcode;
use App\Productcategory;
class storeitemController extends Controller
{
    public function index(){
     
        return view('storeitem',[
            'routeName'=> parent::getRouteName()
        ]);
    }
    public function getstoreitemData()
    {
        $storeitems = Storeitem::all();
        $data  = [];
        foreach ($storeitems as $w) {
            $obj = new \stdClass;
            $obj->id = $w->id;
            $obj->goodissue_addnumber = $w->goodissue_addnumber;
            $obj->date = $w->date;
            $obj->warehousenamefrom = Warehouse::find($w->warehouse_issue_from)->name;
            $obj->storeissueto = Warehouse::find($w->store_issue_to)->name;
            $obj->product = Productcode::find($w->productcode)->name;
            $obj->rate = $w->rate;
            $obj->description = $w->description;
            $obj->quantity = $w->quantity;
            $data[] = $obj;
        }
        $storeitems_sorted = new Collection($data);
        
        return Datatables::of($storeitems_sorted)->make(true);
    }
}
