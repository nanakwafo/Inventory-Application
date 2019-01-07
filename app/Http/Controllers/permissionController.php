<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
class permissionController extends Controller
{
    //
    public function index(){
      return view('permission');
    }
    public function assignpermission(Request $request){
        $role = Sentinel::findRoleById($request->id);

        $role->permissions = [
            'user.update' => true,
            'user.view' => true,
        ];

        $role->save();
    }
}
