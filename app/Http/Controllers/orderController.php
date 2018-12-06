<?php

namespace App\Http\Controllers;

use App\Order;
use App\Paymentorder;
use Illuminate\Http\Request;

class orderController extends Controller
{
    //
    public function index(){
        
        return view('order');
    }

    public function save(Request $request){
        $payorder= new Paymentorder();
        $payorder->ordernumber= $request->ordernumber;
        $payorder->subamount= $request->subamount;
        $payorder->totalamount= $request->totalamount;
        $payorder->discount=$request->discount;
        $payorder->paidamount=$request->paidamount;
        $payorder->dueamount=$request->dueamount;
        $payorder->paymenttype=$request->paymenttype;
        $payorder->paymentstatus=$request->paymentstatus;
        $payorder->save();
        
        $number_of_items=$request->number_of_items;
        for($i=0;$i < $number_of_items;$i++){
            $orderitem=new Order();
            $orderitem->ordernumber= $request->ordernumber;
            $orderitem->orderdate=$request->orderdate;
            $orderitem->customer=$request->customer;

            $orderitem->product=$request->product[$i];
            $orderitem->store=$request->store[$i];
            $orderitem->rate=$request->rate[$i];
            $orderitem->quantity=$request->quantity[$i];
            $orderitem->Total=$request->total[$i];

//     
            $orderitem->save();

        }
        Session::flash('success','
<p>New Order placed successfully</p>
<a href="downloadorderreceipt" class="btn btn-primary" type="button"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
                                    ');
        return redirect('order');
    }
}
