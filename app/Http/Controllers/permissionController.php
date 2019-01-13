<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Roles\EloquentRole;
use Illuminate\Http\Request;
use Sentinel;
use Session;
use Yajra\Datatables\Datatables;
use DB;

class permissionController extends Controller
{
    //
    public function index(){
      return view('permission');
    }
    public function assignpermission(Request $request){
        
        $role = Sentinel::findRoleById($request->roleid);
        $role->permissions = [
            'dasboard' => is_null($request->dashboard)? false:true,
            'masterentry' => is_null($request->masterentry)? false:true,
            'product' => is_null($request->product)? false:true,
            'inventory' => is_null($request->inventory)? false:true,
            'sale' => is_null($request->sale)? false:true,
            'invoice' => is_null($request->invoice)? false:true,
            'report' => is_null($request->report)? false:true,
            'promotion' => is_null($request->promotion)? false:true,
            'audit' => is_null($request->audit)? false:true,
            'user' => is_null($request->user)? false:true,
            'profile' => is_null($request->profile)? false:true,
        ];
        $role->save();



        $users = $role->users()->with('roles')->get();
        foreach($users as $user){
            Sentinel::update($user, array(
                'permissions'=>Sentinel::findRoleById($request->roleid)->permissions
            ));

        }

        Session::flash('success','Permissions Updated successfully');
        return redirect('permission');
    }

    public function allpermissions(Request $request){

        DB::statement(DB::raw('set @rownum=0'));
        $roletype = EloquentRole::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'id',
            'name',
            'permissions'
        ]);

        $datatables =  Datatables::of($roletype)

            ->addColumn('action', function ($roletype) {
//
                return '
                <a href="#" class="editbtn" data-id="'.$roletype->id.'" data-name="'.$roletype->name.'"  data-toggle="modal"  data-target="#deletemodal" >view </a> 
                  ';
            });


        return $datatables->make(true);
    }

    public function getpermission($roleid){

        $roles= EloquentRole::select('permissions')->where('id',$roleid)->get();
        return json_encode($roles);
    }
    
  
}
