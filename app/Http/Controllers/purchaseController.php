<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Purchase;
use App\Productcategory;
use App\Purchaseorder;
use App\Storeitem;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables;
use DB;
use Session;
use App\Productcode;
use Illuminate\Support\Collection;
class purchaseController extends Controller
{
    //
    public function index(){
        return view('purchase');
    }
    public function getproductrate($product_id,$store_id){
      $rate= Storeitem::where('productcode',$product_id)->where('store_issue_to',$store_id)->pluck('rate')->first();
      $totalquantity= Storeitem::where('productcode',$product_id)->where('store_issue_to',$store_id)->sum('quantity');
      $totalsold=AppHelper::quantityboughtinStore($store_id,$product_id);
      $quantityleft=$totalquantity - $totalsold;
      return $rate ."|". $quantityleft;
  }
    public function productpurchaseorder(){
        $output_product='<option value="">Select product</option>';
        $product_from=Productcode::all();


        foreach ($product_from as $p){
            $output_product.='<option value="'.$p->productcode.'">'.$p->name.'</option>';
        }
        return Response($output_product);
    }
    public function productselectbox(){
        $output_product='<option value="">Select product</option>';
        $product_from=Purchase::select('productcode')->groupBy('productcode')->get();
        foreach ($product_from as $p){
            $output_product.='<option value="'.$p->productcode.'">'.Productcode::find($p->productcode)->name.'</option>';
        }
        return Response($output_product);
    }



    public function allpurchasearrival(){
        DB::statement(DB::raw('set @rownum=0'));
        $purchasearrival =Purchase::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'id',
            'datereceived',
            'productcode',
            'productcategory_id',
            'unit',
            'unitprice',
            'payamount',
            'quantity',
            'supplier_id',
            'purchaseordernumber']);

        $datatables =  Datatables::of($purchasearrival)

            ->addColumn('action', function ($purchasearrival) {
                return '
                  <a href="#" class="editbtn" data-id="'.$purchasearrival->id.'" data-datereceived="'.$purchasearrival->datereceived.'" data-productcategory_id="'.$purchasearrival->productcategory_id.'" data-productcode="'.$purchasearrival->productcode.'" data-unit="'.$purchasearrival->unit.'" data-unitprice="'.$purchasearrival->unitprice.'" data-payamount="'.$purchasearrival->payamount.'" data-quantity="'.$purchasearrival->quantity.'" data-supplier_id="'.$purchasearrival->supplier_id.'"  data-purchaseordernumber="'.$purchasearrival->purchaseordernumber.'" data-toggle="modal" data-target="#editmodal" ><i class="fa fa-pencil fa-2x" style="color:#8080ff" aria-hidden="true"></i> </a> |
                  <a href="#" class="deletebtn" data-id="'.$purchasearrival->id.'" data-product="'.Productcode::find($purchasearrival->productcode)->name.'" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash fa-2x" style="color:#ff8080" aria-hidden="true"></i> </a>
                  ';
            })
            ->addColumn('supplier', function ($purchasearrival) {
                return Supplier::find($purchasearrival->supplier_id)->name;

            })
            ->addColumn('product', function ($purchasearrival) {
                return Productcode::find($purchasearrival->productcode)->name;

            })
            ->addColumn('productcategory', function ($purchasearrival) {
                return Productcategory::find($purchasearrival->productcategory_id)->name;

            })
        ;


        return $datatables->make(true);
    }
   

    public function save(Request $request){
        Purchase::create($request->all());
        Session::flash('success','Purchase record Added successfully');
        return redirect('purchase');
    }
    public  function update(Request $request){

     
        $product =Purchase::find($request->idEdit);
        $product->datereceived = $request->datereceivedEdit;
        $product->productcode = $request->productcodeEdit;
        $product->productcategory_id = $request->productcategory_idEdit;
        $product->unit = $request->unitEdit;
        $product->unitprice = $request->unitpriceEdit;
        $product->payamount = $request->payamountEdit;
        $product->quantity = $request->quantityEdit;
        $product->supplier_id = $request->supplier_idEdit;
        $product->remark = $request->remarkEdit;
        $product->purchaseordernumber = $request->purchaseordernumberEdit;
        $product->save();
        Session::flash('success','Purchase  record updated successfully');
        return redirect('purchase');
    }
    public function delete(Request $request){
        Purchase::find($request->idDelete)->delete();
        Session::flash('success','Purchase deleted successfully');
        return redirect('purchase');
    }
}
