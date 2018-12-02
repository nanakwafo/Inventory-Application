<?php
namespace App\Helpers;

use App\Storeitem;
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

}