<?php

namespace App\Http\Controllers;

use App\Productcode;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
class productcodeController extends Controller
{
    //
    public  function index(){
        return view('productcode');
    }

    public function allproductcode(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $productcode = Productcode::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'id',
            'productcode',
            'name'
            
        ]);

        $datatables =  Datatables::of($productcode)

            ->addColumn('action', function ($productcode) {
                return '
                  <a href="#edit-'.$productcode->id.'" data-toggle="modal" data-target="#editmodal" ><i class="fa fa-pencil fa-2x" style="color:#8080ff" aria-hidden="true"></i> </a> |
                  <a href="#edit-'.$productcode->id.'" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash fa-2x" style="color:#ff8080" aria-hidden="true"></i> </a>
                  ';
            });


        return $datatables->make(true);

    }
}
