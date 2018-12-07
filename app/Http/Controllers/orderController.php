<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\Paymentorder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\Datatables\Datatables;
use DB;
use Session;
class orderController extends Controller
{
    //
    public function index(){
        
        return view('order');
    }
    public function manageorder(){
        return view('manageorder');
    }
    public function allorders(){
        $paymentoder = Paymentorder::all();
  
        $data  = [];

        foreach ($paymentoder as $w) {

            $obj = new \stdClass;
            $obj->id = $w->id;
            $obj->orderdate = Order::find($w->ordernumber)->pluck('orderdate')->first();
            $obj->ordernumber = $w->ordernumber;
            $obj->customer = Customer::find(Order::find($w->ordernumber)->pluck('customer')->first())->name;
            $obj->customercontact = Customer::find(Order::find($w->ordernumber)->pluck('customer')->first())->phonenumber;
            $obj->totalorderitem = Order::where('ordernumber',$w->ordernumber)->count();
            $obj->paymentstatus = $w->paymentstatus;
            $obj->details_url =  route('paymentorderdetails', $w->ordernumber);

            $data[] = $obj;
        }

        $paymentoderitems_sorted = new Collection($data);

        return Datatables::of($paymentoderitems_sorted) ->make(true);
    }
    public function getorders($ordernumber)
    {
        $orders =Paymentorder::findOrFail($ordernumber)->orders;   

        return Datatables::of($orders)->make(true);
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
            $orderitem->save();

        }

        Session::flash('success','New Order placed successfully ');
        return redirect('order');
    }
}
