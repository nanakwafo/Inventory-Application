<?php

namespace App\Http\Controllers;

use App\Productcode;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
use Session;
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
                  <a href="#" data-id="'.$productcode->id.'" data-productcode="'.$productcode->productcode.'" data-name="'.$productcode->name.'" data-toggle="modal" data-target="#editmodal" ><i class="fa fa-pencil fa-2x" style="color:#8080ff" aria-hidden="true"></i> </a> |
                  <a href="#" data-name="'.$productcode->name.'"  data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash fa-2x" style="color:#ff8080" aria-hidden="true"></i> </a>
                  ';
            });


        return $datatables->make(true);

    }
    
    public function save(Request $request){
        Productcode::create($request->all());
        Session::flash('success','Productcode record Added successfully');
        return redirect('productcode');
    }
    public function update(Request $request){
        $productcode =Productcode::find($request->idEdit);
        $productcode->name = $request->nameEdit;
        $productcode->productcode = $request->productcodeEdit;
        $productcode->save();
        Session::flash('success','Productcode record updated successfully');
        return redirect('productcategory');
    }
}
