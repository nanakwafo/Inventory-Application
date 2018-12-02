<?php

namespace App\Http\Controllers;

use App\Productcode;
use App\Storeitem;
use App\Warehouse;
use App\Warehouseitem;
use Illuminate\Http\Request;
use Session;
class goodissueController extends Controller
{
    //
    public function index(){
        return view('goodissue');
        }

    public function  warehouseproductselectbox($warehouse_id){
        $output_product_for_warehouse='<option value="">Select product</option>';
        $product_from_warehouse=Warehouseitem::where('warehouse_id',$warehouse_id)->select('productcode')->distinct()->get();
        foreach ($product_from_warehouse as $p){
            $output_product_for_warehouse.='<option value="'.$p->productcode.'">'.Productcode::find($p->productcode)->name.'</option>';
        }
        return Response($output_product_for_warehouse);
    }
    public function productquantityleftwarehouse($productcode,$warehouse_from){
        //get the quantity of product where productcode and warehouse_id
        $totalquantity_product=Warehouseitem::where('productcode',$productcode)->where('warehouse_id',$warehouse_from)->sum('quantity');
        $totalquantity_product_in_store=Storeitem::where('productcode',$productcode)->where('warehouse_issue_from',$warehouse_from)->sum('quantity');
        return (int)$totalquantity_product - (int)$totalquantity_product_in_store;

    }
}
