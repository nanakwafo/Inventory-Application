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

        return view('audit',[
            'routeName'=> parent::getRouteName()
        ]);

    }
    public function allaudit(){
        
        $audit =DB::table('audits')->get();

        $datatables =  Datatables::of($audit)
            ->addColumn('user', function ($audit) {
                return  EloquentUser::find($audit->user_id)->first_name;

            });


        return $datatables->make(true);
    }
}
