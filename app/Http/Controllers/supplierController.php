<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
use Session;
class supplierController extends Controller
{
    //
    public function index(){
        return view('supplier');
    }
    public function allsupplier(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $supplier =Supplier::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'id',
            'name',
            'phonenumber',
            'address',
            'description',
            'created_at',
            'updated_at']);

        $datatables =  Datatables::of($supplier)

            ->addColumn('action', function ($supplier) {
                return '
                  <a href="#edit-'.$supplier->id.'" data-toggle="modal" data-target="#editmodal" ><i class="fa fa-pencil fa-2x" style="color:#8080ff" aria-hidden="true"></i> </a> |
                  <a href="#edit-'.$supplier->id.'" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash fa-2x" style="color:#ff8080" aria-hidden="true"></i> </a>
                  ';
            });

       
        return $datatables->make(true);

    }
    public function save(Request $request){
        Supplier::create($request->all());
        Session::flash('success','Supplier record Added successfully');
        return redirect('supplier');
    }

    public function update(Request $request){
        $address =Supplier::find($request->idEdit);
        $address->name = $request->nameEdit;
        $address->phonenumber = $request->phonenumberEdit;
        $address->address = $request->addressEdit;
        $address->description = $request->descriptionEdit;
        $address->save();
        Session::flash('success','Supplier record updated successfully');
        return redirect('product');
    }
}
