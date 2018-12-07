<?php

namespace App\Http\Controllers;

use App\Product;
use App\Productcode;
use App\Warehouse;
use App\Storeitem;
use App\Order;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Collection;
class dashboardController extends Controller
{
    //
    public function index(){
        return view('dashboard');
    }
    public function get_out_stock_product_all(){
        $allstore=Warehouse::where('purpose','store')->get();

        $allproduct=Productcode::all();
        $data  = [];
       
        foreach ($allstore as $s){
            foreach ($allproduct as $p){
                $x =  Storeitem::where('productcode',$p->productcode)->where('store_issue_to',$s->id)->sum('quantity');
                $y =  Order::where('product',$p->productcode)->where('store',$s->id)->sum('quantity');
                if($x - $y == 0){
                    $obj = new \stdClass;
                    $obj->store = Warehouse::find($s->id)->name;
                    $obj->product = Productcode::find($p->productcode)->name;
                    $data[] = $obj;
                }
               
            }
        }
        $allitems = new Collection($data);
        dd($allitems);
        
    }
}
