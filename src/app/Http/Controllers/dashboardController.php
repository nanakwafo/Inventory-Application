<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
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
        return view('dashboard',[
            'routeName'=> parent::getRouteName()
        ]);
    }
    public static function get_out_stock_product_all(){
        $allstore=Storeitem::select('store_issue_to')->distinct('store_issue_to')->get();

        $allproduct=Productcode::all();

        $data  = [];

        foreach ($allstore as $s){
            foreach ($allproduct as $p){

                $x =  Storeitem::where('productcode',$p->productcode)->where('store_issue_to',$s->store_issue_to)->sum('quantity');

                $y =  Order::where('product',$p->productcode)->where('store',$s->store_issue_to)->sum('quantity');


                if((float)$x - (float)$y == 0){
                    $obj = new \stdClass;
                    $obj->store = Warehouse::find($s->store_issue_to)->name;
                    $obj->product = Productcode::find($p->productcode)->name;
                    $data[] = $obj;
                }

            }
        }
        $allitems = new Collection($data);

        dd($allitems);

    }
    
 
}
