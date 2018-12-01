<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
class customerController extends Controller
{
    //
    public function index(){
        return view('customer');
    }
    public function allcustomer(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $customer =Customer::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'id',
            'name',
            'phonenumber',
            'address',
            'customercategory_id',
            'created_at',
            'updated_at']);

        $datatables =  Datatables::of($customer)

            ->addColumn('action', function ($customer) {
                return '
                  <a href="#edit-'.$customer->id.'" data-toggle="modal" data-target="#editmodal" ><i class="fa fa-pencil fa-2x" style="color:#8080ff" aria-hidden="true"></i> </a> |
                  <a href="#edit-'.$customer->id.'" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash fa-2x" style="color:#ff8080" aria-hidden="true"></i> </a>
                  ';
            })
        ->addColumn('customercategory', function ($customer) {
              return Customer::find($customer->id)->customercategory->name;

            });

       
        return $datatables->make(true);

    }
}
