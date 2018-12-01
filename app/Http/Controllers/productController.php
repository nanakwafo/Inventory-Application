<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
class productController extends Controller
{
    //
    public function index(){
        return view('product');
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
                  <a href="#edit-'.$product->id.'" data-toggle="modal" data-target="#editmodal" ><i class="fa fa-pencil fa-2x" style="color:#8080ff" aria-hidden="true"></i> </a> |
                  <a href="#edit-'.$product->id.'" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash fa-2x" style="color:#ff8080" aria-hidden="true"></i> </a>
                  ';
            });

       
        return $datatables->make(true);
    }
}
