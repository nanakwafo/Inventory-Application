<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Session;
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
        ];
        $role->save();
        Session::flash('success','Permissions Updated successfully');
        return redirect('permission');
    }


    
  
}
