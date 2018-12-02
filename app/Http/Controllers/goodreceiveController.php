<?php

namespace App\Http\Controllers;

use App\Product;
use App\Productcode;
use App\Warehouseitem;
use Illuminate\Http\Request;
use Session;
class goodreceiveController extends Controller
{
    //
    public function index(){
        return view('goodreceive');
    }
    public function  supplierproductselectbox($supplier_id){
        $output_product_for_supplier='<option value="">Select product</option>';
        $product_from_supplier=Product::where('supplier_id',$supplier_id)->get();
        foreach ($product_from_supplier as $p){
            $output_product_for_supplier.='<option value="'.$p->productcode.'">'.Productcode::find($p->productcode)->name.'</option>';
        }
        return Response($output_product_for_supplier);
    }
    public function productquantityleft($productcode,$supplier_id){
         //get the quantity of product where productcode and supplier_id
        $totalquantity_product=Product::where('productcode',$productcode)->where('supplier_id',$supplier_id)->sum('quantity');
        $totalquantity_product_in_warehouse=Warehouseitem::where('productcode',$productcode)->where('supplier_id',$supplier_id)->sum('quantity');
        return (int)$totalquantity_product - (int)$totalquantity_product_in_warehouse;
       
    }
}
