<?php

namespace App\Http\Controllers;

use App\Goodreceive;
use App\Product;
use App\Productcategory;
use App\Productcode;
use App\Purchase;
use App\Warehouseitem;
use Illuminate\Http\Request;
use Session;
class goodreceiveController extends Controller
{
    //
    public function index(){
        return view('goodreceive',[
            'routeName'=> parent::getRouteName()
        ]);
    }
    public function  supplierproductselectbox($supplier_id){
        $output_product_for_supplier='<option value="">Select product</option>';
        $product_from_supplier=Purchase::where('supplier_id',$supplier_id)->select('productcode')->groupBy('productcode')->get();
        foreach ($product_from_supplier as $p){
            $output_product_for_supplier.='<option value="'.$p->productcode.'">'.Productcode::find($p->productcode)->name.'</option>';
        }
        return Response($output_product_for_supplier);
    }
    public function productquantityleft($productcode,$supplier_id){
         //get the quantity of product where productcode and supplier_id
        $totalquantity_product=Purchase::where('productcode',$productcode)->where('supplier_id',$supplier_id)->sum('quantity');
        $totalquantity_product_in_warehouse=Warehouseitem::where('productcode',$productcode)->where('supplier_id',$supplier_id)->sum('quantity');
        return (int)$totalquantity_product - (int)$totalquantity_product_in_warehouse;
       
    }
    public function save(Request $request){
        //dd($request->all());
        //first check if grnnumber already exist
        //if yes return good receive already exist
        $number_of_items=$request->number_of_items;
        if($number_of_items >0 ){
            $goodreceive= new Goodreceive();
            $goodreceive->grnnumber= $request->grnnumber;
            $goodreceive->grndate= $request->date;
            $goodreceive->grntype= $request->grntype;
            $goodreceive->warehouse_id=$request->warehouse_id;
            $goodreceive->remark=$request->remark;
            $goodreceive->save();
            for($i=0;$i < $number_of_items;$i++){
                $warehouseitem=new Warehouseitem();
                $warehouseitem->goodreceive_grnnumber= $request->grnnumber;
                $warehouseitem->warehouse_id=$request->warehouse_id;
                $warehouseitem->supplier_id=$request->supplier_id;


                $warehouseitem->productcode=$request->product[$i];
                $warehouseitem->quantity=$request->quantity[$i];
                $warehouseitem->description=$request->description[$i];
                $warehouseitem->unit=$request->unit[$i];

                $warehouseitem->save();

            }
            Session::flash('success','New Goods  added successfully');
        }else{
            Session::flash('error','No Product was Selected');
        }

      return redirect('goodreceive');
    }
}
