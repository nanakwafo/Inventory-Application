<?php

namespace App\Http\Controllers;

use App\Invoiceitem;
use App\Paymentinvoice;
use Illuminate\Http\Request;
use Session;
use App\Customer;
use Illuminate\Support\Collection;
use Yajra\Datatables\Datatables;
use DB;
use App\Warehouse;
use App\Productcode;


class invoiceController extends Controller
{
    //
    public function invoice(){
        return view('invoice');
    }
    public function allinvoice(){
        return view('allinvoice');
    }
    public function allinvoicedata(){
        $invoicedata = Paymentinvoice::all();

        $data  = [];

        foreach ($invoicedata as $w) {

            $obj = new \stdClass;
            $obj->id = $w->id;
            $obj->invoicedate = Invoiceitem::find($w->invoicenumber)->pluck('invoicedate')->first();
            $obj->invoicenumber = $w->invoicenumber;
            $obj->customer = Customer::find(Invoiceitem::find($w->invoicenumber)->pluck('customer')->first())->name;
            $obj->customercontact = Customer::find(Invoiceitem::find($w->invoicenumber)->pluck('customer')->first())->phonenumber;
            $obj->totalorderitem = Invoiceitem::where('invoicenumber',$w->invoicenumber)->count();
            $obj->details_url =  route('paymentinvoicedetails', $w->invoicenumber);
            $obj->action = '
                  <a href="invoicereceiptpdf/'.$w->invoicenumber.'" class="printbtn"><i class="fa fa-print fa-1x" style="color:#8080ff" aria-hidden="true"></i> </a> |
                  <a href="#" class="deletebtn" data-invoicenumber="'.$w->invoicenumber.'"  data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash fa-1x" style="color:#ff8080" aria-hidden="true"></i> </a>
                  ';
            $data[] = $obj;
        }

        $invoicedataitems_sorted = new Collection($data);

        return Datatables::of($invoicedataitems_sorted) ->make(true);
    }
    public function getinvoices($invoicenumber)
    {
        $invoice =Paymentinvoice::findOrFail($invoicenumber)->invoiceitems;
        $data  = [];
        foreach ($invoice as $w) {
            $obj = new \stdClass;
            $obj->id = $w->id;
            $obj->invoicenumber = $w->invoicenumber;
            $obj->store = Warehouse::find($w->store)->name;
            $obj->invoicedate = $w->invoicedate;
            $obj->customer = Customer::find($w->customer)->name;
            $obj->product = Productcode::find($w->product)->name;
            $obj->rate = $w->rate;
            $obj->quantity = $w->quantity;
            $obj->total = $w->total;
            $data[] = $obj;
        }
        $invoice_sorted = new Collection($data);

        return Datatables::of($invoice_sorted)->make(true);
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
            $invoiceitem->invoicenumber= $request->invoicenumber;
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
        Session::flash('printurl','invoicereceiptpdf/'.$request->invoicenumber);
        return redirect('invoice');
    }

    public function deletepaymentinvoice(Request $request){
        Paymentinvoice::find($request->idDelete)->delete();
        Invoiceitem::find($request->idDelete)->delete();
        Session::flash('success','Invoice deleted successfully');
        return redirect('allinvoice');
    }
}
