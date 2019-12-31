<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    //
    public function notfound()
    {
        return view('errors.404');
    }
    public function fatal()
    {
        return view('errors.500');
    }
}
