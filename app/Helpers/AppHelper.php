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

    public static function get_quantity_in_warehouse($warehouse_id,$productcode){
        $totalfrom_warehouseitem_table=Warehouseitem::where('warehouse_id',$warehouse_id)->where('productcode',$productcode)->sum('quantity');

        return (int)$totalfrom_warehouseitem_table;

    }

    public static function get_quantity_out_warehouse($warehouse_id,$productcode){

        $totalfrom_storeitem_table=Storeitem::where('warehouse_issue_from',$warehouse_id)->where('productcode',$productcode)->sum('quantity');
        return (int)$totalfrom_storeitem_table;

    }
    public static function get_remaining_product_from_warehouse_between_dates($warehouse_id,$productcode,$fromdate,$todate){
        $totalfrom_warehouseitem_table=DB::table('warehouseitems')

            ->join('goodreceives', 'warehouseitems.goodreceive_grnnumber', '=', 'goodreceives.grnnumber')
            ->select([DB::raw('sum(warehouseitems.quantity)  as quantity')])
            ->where('warehouseitems.warehouse_id',$warehouse_id)
            ->where('warehouseitems.productcode',$productcode)
            ->whereDate('goodreceives.grndate','>=',$fromdate)->whereDate('goodreceives.grndate','<=',$todate)
            ->get();


        $totalfrom_storeitem_table=Storeitem::where('warehouse_issue_from',$warehouse_id)->where('productcode',$productcode)
            ->whereDate('date','>=',$fromdate)->whereDate('date','<=',$todate)
            ->sum('quantity');
        
        return (int)$totalfrom_warehouseitem_table - (int)$totalfrom_storeitem_table;

    }
    public static function get_quantity_in_warehouse_between_date($warehouse_id,$productcode,$fromdate,$todate){
        $totalfrom_warehouseitem_table=DB::table('warehouseitems')

            ->join('goodreceives', 'warehouseitems.goodreceive_grnnumber', '=', 'goodreceives.grnnumber')
            ->select([DB::raw('sum(warehouseitems.quantity)  as quantity')])
            ->where('warehouseitems.warehouse_id',$warehouse_id)
            ->where('warehouseitems.productcode',$productcode)
            ->whereDate('goodreceives.grndate','>=',$fromdate)->whereDate('goodreceives.grndate','<=',$todate)
            ->get();
        return (int)$totalfrom_warehouseitem_table;
    }
    public static function get_quantity_out_warehouse_between_date($warehouse_id,$productcode,$fromdate,$todate){
        $totalfrom_storeitem_table=Storeitem::where('warehouse_issue_from',$warehouse_id)->where('productcode',$productcode)
            ->whereDate('date','>=',$fromdate)->whereDate('date','<=',$todate)
            ->sum('quantity');
        return (int)$totalfrom_storeitem_table;
    }


    public static function getmontlyrevenue($month){
      $data=  \App\Paymentorder::whereMonth('updated_at', '01')->sum('paidamount');
      return  $data;

    }
    public static function x(){
        $allstore=Storeitem::select('store_issue_to')->distinct('store_issue_to')->get();
        return $allstore;
    }
    public static function get_grnnumber(){
        $month=date('m');
        $date=date('d');
        $hour=date('h');
        $min=date('i');
        $sec=date('i');
        $randnumber=rand(0, 1000);
        $tagname='GRN';
        return $randnumber.$month.$date.$hour.$min.$sec.$tagname;
    }
    public static function get_addnumber(){
        $month=date('m');
        $date=date('d');
        $hour=date('h');
        $min=date('i');
        $sec=date('i');
        $randnumber=rand(0, 1000);
        $tagname='ADD';
        return $randnumber.$month.$date.$hour.$min.$sec.$tagname;
    }
    public static function get_ordernumber(){
        $month=date('m');
        $date=date('d');
        $hour=date('h');
        $min=date('i');
        $sec=date('i');
        $randnumber=rand(0, 1000);
        $tagname='OR';
        return $randnumber.$month.$date.$hour.$min.$sec.$tagname;
    }
    public static function get_invoicenumber(){
        $month=date('m');
        $date=date('d');
        $hour=date('h');
        $min=date('i');
        $sec=date('i');
        $randnumber=rand(0, 1000);
        $tagname='INV';
        return $randnumber.$month.$date.$hour.$min.$sec.$tagname;
    }
    public static function get_purchaseordernumber(){
        $month=date('m');
        $date=date('d');
        $hour=date('h');
        $min=date('i');
        $sec=date('i');
        $randnumber=rand(0, 1000);
        $tagname='PO';
        return $randnumber.$month.$date.$hour.$min.$sec.$tagname;
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

    public static function quantityboughtinStore($store,$productcode){
        return Order::where('store',$store)->where('product',$productcode)->sum('quantity');
    }

}