<?php

namespace App\Http\Controllers;

use App\Customer;

use DB;
use Illuminate\Support\Collection;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class smsController extends Controller
{
    //
    public function index(){
        return view('sms');
    }
    public function allcontact(Request $request){

        if ($request->has('customercat')) {
           $allcontact = Customer::where('customercategory_id',$request->customercat)->get();
        }else{
            $allcontact = Customer::all();
        }

        $data  = [];
        $x=1;
        foreach ($allcontact as $w) {
            $obj = new \stdClass;
            $obj->name = $w->name;
            $obj->no = $x++;
            $obj->contact = $w->phonenumber;
            $obj->email = $w->email;

            $data[] = $obj;
        }
        $datatables =  Datatables::of($data)

            ->addColumn('select', function ($data) {
                return '<input type="checkbox" data-phonenumber="'.$data->contact.'" data-email="'.$data->email.'"data-name="'.$data->name.'">';
            })
          
             ->rawColumns(['select']);
        return $datatables->make(true);
    }
}
