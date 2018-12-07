<?php

namespace App\Http\Controllers;

use App\Product;
use App\Storeitem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables;
use DB;
use Session;
use App\Productcode;
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
        DB::statement(DB::raw('set @rownum=0'));
        $product =Product::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'id',
            'datereceived',
            'productcode',
            'productcategory_id',
            'unit',
            'payamount',
            'quantity',
            'supplier_id',
            'remark',
        ]);

        $datatables =  Datatables::of($product)

            ->addColumn('action', function ($product) {
                return '
                  <a href="#" class="editbtn" data-id="'.$product->id.'" data-datereceived="'.$product->datereceived.'" data-productcode="'.$product->productcode.'" data-productcategory_id="'.$product->productcategory_id.'" data-unit="'.$product->unit.'" data-payamount="'.$product->payamount.'" data-quantity="'.$product->quantity.'" data-supplier_id="'.$product->supplier_id.'" data-remark="'.$product->remark.'" data-toggle="modal" data-target="#editmodal" ><i class="fa fa-pencil fa-2x" style="color:#8080ff" aria-hidden="true"></i> </a> |
                  <a href="#" class="deletebtn" data-id="'.$product->id.'" data-productcode="'.$product->productcode.'"  data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash fa-2x" style="color:#ff8080" aria-hidden="true"></i> </a>
                  ';
            });

       
        return $datatables->make(true);
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
