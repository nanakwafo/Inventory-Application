<?php

namespace App\Http\Controllers;

use App\Invoiceitem;
use App\Paymentinvoice;
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

    public function save(Request $request){
        $payinvoice= new Paymentinvoice();
        $payinvoice->invoicenumber= $request->invoicenumber;
        $payinvoice->subamount= $request->subamount;
        $payinvoice->totalamount= $request->totalamount;
        $payinvoice->discount=$request->discount;
        $payinvoice->save();

        $number_of_items=$request->number_of_items;
        for($i=0;$i < $number_of_items;$i++){
            $invoiceitem=new Invoiceitem();
            $invoiceitem->ordernumber= $request->invoicenumber;
            $invoiceitem->invoicedate=$request->invoicedate;
            $invoiceitem->duedate=$request->duedate;
            $invoiceitem->customer=$request->customer;

            $invoiceitem->product=$request->product[$i];
            $invoiceitem->store=$request->store[$i];
            $invoiceitem->rate=$request->rate[$i];
            $invoiceitem->quantity=$request->quantity[$i];
            $invoiceitem->total=$request->total[$i];
            $invoiceitem->save();

        }

//       


        Session::flash('success','New Invoice placed successfully ');
        Session::flash('printurl','orderreceiptpdf/'.$request->invoicenumber);
        return redirect('invoice');
    }

}
