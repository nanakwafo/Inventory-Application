<?php

namespace App\Http\Controllers;

use App\Emailcreator;
use Illuminate\Http\Request;

class emailcreatorController extends Controller
{
    //
    public function insert(Request $request){
       Emailcreator::create($request->all());


    }
}
