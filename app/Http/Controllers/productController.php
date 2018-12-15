<?php

namespace App\Http\Controllers;

use App\Product;
use App\Productcategory;
use App\Storeitem;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables;
use DB;
use Session;
use App\Productcode;
use Illuminate\Support\Collection;
class productController extends Controller
{
    //
    public function index(){
        return view('product');
    }
  public function getproductrate($product_id,$store_id){

      return Storeitem::where('productcode',$product_id)->where('store_issue_to',$store_id)->pluck('rate');
  }
    public function productselectbox(){
        $output_product='<option value="">Select product</option>';
        $product_from=Product::all();
        foreach ($product_from as $p){
            $output_product.='<option value="'.$p->productcode.'">'.Productcode::find($p->productcode)->name.'</option>';
        }
        return Response($output_product);
    }
    public function allproduct(Request $request){
        $productitems = Product::all();
        $data  = [];
        $rownum=1;
        foreach ($productitems as $w) {
            $obj = new \stdClass;
            $obj->id = $w->id;
            $obj->rownum = $rownum ++;
            $obj->datereceived = $w->datereceived;
            $obj->productcode = $w->productcode;
            $obj->productname = Productcode::find($w->productcode)->name;
            $obj->productcategory_id = Productcategory::find($w->productcategory_id)->name;
            $obj->unit = $w->unit;
            $obj->payamount = $w->payamount;
            $obj->quantity = $w->quantity;
            $obj->supplier_id = Supplier::find($w->supplier_id)->name ;
            $obj->remark = $w->remark;
            $obj->reorderlimit = $w->reorderlimit;
            $obj->action = '
                  <a href="#" class="editbtn" data-id="'.$w->id.'" data-reorderlimit="'.$w->reorderlimit.'" data-datereceived="'.$w->datereceived.'" data-productcode="'.$w->productcode.'" data-productcategory_id="'.$w->productcategory_id.'" data-unit="'.$w->unit.'" data-payamount="'.$w->payamount.'" data-quantity="'.$w->quantity.'" data-supplier_id="'.$w->supplier_id.'" data-remark="'.$w->remark.'" data-toggle="modal" data-target="#editmodal" ><i class="fa fa-pencil fa-2x" style="color:#8080ff" aria-hidden="true"></i> </a> |
                  <a href="#" class="deletebtn" data-id="'.$w->id.'" data-productcode="'.$w->productcode.'"  data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash fa-2x" style="color:#ff8080" aria-hidden="true"></i> </a>
                  ';
            $data[] = $obj;
        }
        $productitems_sorted = new Collection($data);

        return Datatables::of($productitems_sorted)->make(true);
    }
    public function save(Request $request){
        Product::create($request->all());
        Session::flash('success','Product record Added successfully');
        return redirect('product');
    }
    public  function update(Request $request){

     
        $product =Product::find($request->idEdit);
        $product->datereceived = $request->datereceivedEdit;
        $product->productcode = $request->productcodeEdit;
        $product->productcategory_id = $request->productcategory_idEdit;
        $product->unit = $request->unitEdit;
        $product->payamount = $request->payamountEdit;
        $product->quantity = $request->quantityEdit;
        $product->supplier_id = $request->supplier_idEdit;
        $product->remark = $request->remarkEdit;
        $product->reorderlimit = $request->reorderlimitEdit;
        $product->save();
        Session::flash('success','Product  record updated successfully');
        return redirect('product');
    }
    public function delete(Request $request){
        Product::find($request->idDelete)->delete();
        Session::flash('success','Product deleted successfully');
        return redirect('product');
    }
}
