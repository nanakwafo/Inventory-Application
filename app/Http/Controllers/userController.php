<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
use Session;
class userController extends Controller
{
    //
    public function index(){
        return view('user');
    }
    public function allusers(Request $request){

        DB::statement(DB::raw('set @rownum=0'));
        $users = EloquentUser::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'id',
            'first_name',
            'last_name',
            'sex',
            'email',
            'username',
            'phonenumber']);

        $datatables =  Datatables::of($users)

            ->addColumn('action', function ($users) {
                return '
                  <a href="#edit-'.$users->id.'" data-toggle="modal" data-target="#editmodal" ><i class="fa fa-pencil fa-2x" style="color:#8080ff" aria-hidden="true"></i> </a> |
                  <a href="#edit-'.$users->id.'" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash fa-2x" style="color:#ff8080" aria-hidden="true"></i> </a>
                  ';
            });

       
        return $datatables->make(true);
    }
}
