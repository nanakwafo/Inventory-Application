<?php
namespace App\Helpers;

use App\Order;
use App\Storeitem;
use App\Waste;

class ReportHelper
{
    public static function getproductioncost($fromdate,$todate,$store,$productcode){
        return 0;
    }
    public static function getstartinginventory($fromdate,$todate,$store,$productcode){
//        The number of units of a product on hand at the beginning of the
// selected date range. For example, if you are looking at the report for
// the month of March, this column displays the number of units on hand on March 1st.
      $x = Storeitem::whereDate('date','<=',$fromdate)->where('productcode',$productcode)->where('store_issue_to',$store)->sum('quantity');
        $y= Order::whereDate('orderdate','<',$fromdate)->where('product',$productcode)->where('store',$store)->sum('quantity');
            return $x -$y;
    }
    public static function received($fromdate,$todate,$store,$productcode){
//        The number of units of a product added in the viewed date range.
        $x = Storeitem::whereDate('date','>=',$fromdate)->whereDate('date','<=',$todate)->where('productcode',$productcode)->where('store_issue_to',$store)->sum('quantity');
        return $x;
    }
    public static function usage($fromdate,$todate,$store,$productcode){
        //The number of units of the product sold in the viewed date range
        $x = Order::whereDate('orderdate','>=',$fromdate)->whereDate('orderdate','<=',$todate)->where('product',$productcode)->where('store',$store)->sum('quantity');
        return $x;
    }
    public static function onhand($fromdate,$todate,$store,$productcode){
        //The current number of units of the product held in inventory at the location.
        $x = Storeitem::whereDate('date','>=',$fromdate)->whereDate('date','<=',$todate)->where('productcode',$productcode)->where('store_issue_to',$store)->sum('quantity');
        $y= Order::whereDate('orderdate','>=',$fromdate)->whereDate('orderdate','<=',$todate)->where('product',$productcode)->where('store',$store)->sum('quantity');
        return $x -$y;
    }
   
    public static  function variance($fromdate,$todate,$store,$productcode){
       // The number of units of a product not accounted for. For example, if you seem to have lost two units, this column will show -2. If you have an additional two units that wasn’t accounted for, this column will show 2.
        $x = Storeitem::whereDate('date','>=',$fromdate)->whereDate('date','<=',$todate)->where('productcode',$productcode)->where('store_issue_to',$store)->sum('quantity');
        $y= Order::whereDate('orderdate','>=',$fromdate)->whereDate('orderdate','<=',$todate)->where('product',$productcode)->where('store',$store)->sum('quantity');
        $v=Waste::whereDate('date','>=',$fromdate)->whereDate('date','<=',$todate)->where('productcode',$productcode)->where('store_id',$store)->count();
        return $x - $y - $v;
    }
    public static function variancecost($fromdate,$todate,$store,$productcode){
        //The total cost of the variance.
        return 0;
    }
}