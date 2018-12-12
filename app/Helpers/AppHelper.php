<?php
namespace App\Helpers;

use App\Order;
use App\Product;
use App\Productcode;
use App\Storeitem;
use App\Warehouse;
use App\Warehouseitem;
use Illuminate\Support\Collection;
use DB;
class AppHelper
{
    public static function profileimage()
    {
        return  DB::table('profiles')->first();

    }

    public static function get_remaining_product_from_warehouse($warehouse_id,$productcode){
        $totalfrom_warehouseitem_table=Warehouseitem::where('warehouse_id',$warehouse_id)->where('productcode',$productcode)->sum('quantity');
        $totalfrom_storeitem_table=Storeitem::where('warehouse_issue_from',$warehouse_id)->where('productcode',$productcode)->sum('quantity');
        return (int)$totalfrom_warehouseitem_table - (int)$totalfrom_storeitem_table;

    }
    public static function gethourly_revenue($hour){
        $x= \App\Order::whereTime('updated_at', '<=',\Carbon\Carbon::createFromTimeString($hour))
                          ->whereDate('orderdate',date('Y-m-d'))
                          ->sum('total');

        return (int)$x;

    }
    public static function get_grnnumber(){
        $year=date('Y');
        $month=date('m');
        $date=date('d');
        $hour=date('h');
        $min=date('i');
        $sec=date('i');
        $tagname='GRN';
        return $year.$month.$date.$hour.$min.$sec.$tagname;
    }
    public static function get_addnumber(){
        $year=date('Y');
        $month=date('m');
        $date=date('d');
        $hour=date('h');
        $min=date('i');
        $sec=date('i');
        $tagname='ADD';
        return $year.$month.$date.$hour.$min.$sec.$tagname;
    }
    public static function get_ordernumber(){
        $year=date('Y');
        $month=date('m');
        $date=date('d');
        $hour=date('h');
        $min=date('s');
       
        $tagname='ORDER';
        return $tagname.$year.$month.$date.$hour.$min;
    }
    public static function get_out_stock_product(){
        $allproduct=Order::all();
        $count =0;
        foreach ($allproduct as $p){
            $quantity_in_store =  Storeitem::where('productcode',$p->product)->sum('quantity');
            $quantity_in_sold =  Order::where('product',$p->product)->sum('quantity');

            if($quantity_in_store - $quantity_in_sold == 0){
                $count =$count +1;
            }
            return $count;
        }
    }
    public static function get_out_stock_product_all(){
        $allstore=Storeitem::select('store_issue_to')->distinct('store_issue_to')->get();

        $allproduct=Order::all();

        $data  = [];

        foreach ($allstore as $s){
            foreach ($allproduct as $p){

                $x =  Storeitem::where('productcode',$p->product)->where('store_issue_to',$s->store_issue_to)->sum('quantity');

                $y =  Order::where('product',$p->product)->where('store',$s->store_issue_to)->sum('quantity');

                if((float)$x - (float)$y == 0.0){
                    $obj = new \stdClass;
                    $obj->store = Warehouse::find($s->store_issue_to)->name;
                    $obj->product = Productcode::find($p->product)->name;
                    $data[] = $obj;
                }

            }
        }
        $allitems = new Collection($data);
        return $allitems;
    }


}