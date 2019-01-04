<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
use Session;
class auditController extends Controller
{
    //
    public function index(){

        return view('audit');

    }
    public function allaudit(){
        
        $customer =DB::table('audits')->get();

        $datatables =  Datatables::of($customer)
            ->addColumn('user', function ($customer) {
                return  EloquentUser::find($customer->id)->first_name;

            });

        return $datatables->make(true);
    }
}
