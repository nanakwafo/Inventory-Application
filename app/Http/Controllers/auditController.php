<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class auditController extends Controller
{
    //
    public function index(){
        $audit=DB::table('audits')->get();
        return view('audit')->with(['audit'=>$audit]);
    }
}
