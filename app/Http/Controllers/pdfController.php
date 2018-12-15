<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use PDF;

class pdfController extends Controller
{
    //
    public function inventoryonhandpdf($store,$fromdate,$todate){

        $html=view('pdf.inventoryonhand')->with([
           'value'=>'inventoryonhandpdf'
           ])->render();
        return PDF::load($html)->show();
    }
}
