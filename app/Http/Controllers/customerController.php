<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
use Session;
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
                  <a href="#" data-id="'.$customer->id.'" data-name="'.$customer->name.'" data-phonenumber="'.$customer->phonenumber.'" data-address="'.$customer->address.'" data-customercategory_id="'.$customer->customercategory_id.'" data-toggle="modal" data-target="#editmodal" ><i class="fa fa-pencil fa-2x" style="color:#8080ff" aria-hidden="true"></i> </a> |
                  <a href="#" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash fa-2x" style="color:#ff8080" aria-hidden="true"></i> </a>
                  ';
            })
        ->addColumn('customercategory', function ($customer) {
              return Customer::find($customer->id)->customercategory->name;

            });

       
        return $datatables->make(true);

    }
    public function save(Request $request){
        Customer::create($request->all());
        Session::flash('success','Customer record Added successfully');
        return redirect('customer');
    }
    public function update(Request $request){
        $customer =Customer::find($request->idEdit);
        $customer->name = $request->nameEdit;
        $customer->phonenumber = $request->phonenumberEdit;
        $customer->address = $request->addressEdit;
        $customer->customercategory_id = $request->customercategory_idEdit;
        $customer->save();
        Session::flash('success','Customer category record updated successfully');
        return redirect('customer');
    }
}
