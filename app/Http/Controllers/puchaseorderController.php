<?php

namespace App\Http\Controllers;

use App\Purchaseorder;
use App\Purchaseorderitem;
use Illuminate\Http\Request;
use Session;
class puchaseorderController extends Controller
{
    //
    public function index(){
        return view('purchaseorder');
    }

    public function save(Request $request){
        $number_of_items=$request->number_of_items;
        if($number_of_items > 0) {
            $purchaseorder = new Purchaseorder();
            $purchaseorder->purchaseordernumber = $request->purchaseordernumber;
            $purchaseorder->supplier_id = $request->supplier_id;
            $purchaseorder->date = $request->date;
            $purchaseorder->expecteddeliverydate = $request->expecteddeliverydate;
            $purchaseorder->subamount = $request->subamount;
            $purchaseorder->vat = $request->vat;
            $purchaseorder->subtotal = $request->totalamount;
            $purchaseorder->discount = $request->discount;
            $purchaseorder->grandtotal = $request->grandtotal;
            $purchaseorder->payamount = $request->paidamount;
            $purchaseorder->dueamount = $request->dueamount;
            $purchaseorder->paymenttype = $request->paymenttype;
            $purchaseorder->account = $request->bankaccount;
            $purchaseorder->save();

            for($i=0;$i < $number_of_items;$i++){
                $orderitem=new Purchaseorderitem();
                $orderitem->purchaseordernumber= $request->purchaseordernumber;
                $orderitem->productid=$request->productid[$i];
                $orderitem->quantity=$request->quantity[$i];
                $orderitem->rate=$request->rate[$i];
                $orderitem->amount=$request->total[$i];
                $orderitem->status=$request->status[$i];
                $orderitem->save();

            }
            Session::flash('printurl','purchaseorderreceiptpdf/'.$request->purchaseordernumber);
            Session::flash('success','New PurchaseOrder placed successfully ');
        }
        else{
            Session::flash('error','No Product was Selected');
        }

        return redirect('purchaseorder');
    }
    
}
