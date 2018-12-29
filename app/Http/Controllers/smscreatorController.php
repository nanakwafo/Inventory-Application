<?php

namespace App\Http\Controllers;

use App\Jobs\processSMS;
use App\Smscreator;
use Illuminate\Http\Request;

class smscreatorController extends Controller
{
    //
    public function insert(Request $request){
        Smscreator::create($request->all());
    }

 
}
