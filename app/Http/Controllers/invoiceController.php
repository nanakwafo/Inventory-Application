<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class invoiceController extends Controller
{
    //
    public function invoice(){
        return view('invoice');
    }
    public function allinvoice(){
        return view('allinvoice');
    }
}
