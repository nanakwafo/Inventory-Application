<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\Warehouse;
use App\Productcode;
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
            $obj->action = '
                  <a href="#" class="paymentbtn" data-ordernumber="'.$w->ordernumber.'" data-paidamount="'.$w->paidamount.'" data-dueamount="'.$w->dueamount.'" data-paymenttype="'.$w->paymenttype.'" data-paymentstatus="'.$w->paymentstatus.'" data-toggle="modal" data-target="#paymentmodal" ><i class="fa fa-money fa-1x" style="color:#8080ff" aria-hidden="true"></i> </a> |
                  <a href="#" class="printbtn" data-ordernumber="'.$w->ordernumber.'"  data-toggle="modal" data-target="#printmodal" ><i class="fa fa-print fa-1x" style="color:#8080ff" aria-hidden="true"></i> </a> |
                  <a href="#" class="deletebtn" data-ordernumber="'.$w->ordernumber.'"  data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash fa-1x" style="color:#ff8080" aria-hidden="true"></i> </a>
                  ';
            $data[] = $obj;
        }

        $paymentoderitems_sorted = new Collection($data);

        return Datatables::of($paymentoderitems_sorted) ->make(true);
    }
    public function getorders($ordernumber)
    {
        $orders =Paymentorder::findOrFail($ordernumber)->orders;
        $data  = [];
        foreach ($orders as $w) {
            $obj = new \stdClass;
            $obj->id = $w->id;
            $obj->ordernumber = $w->ordernumber;
            $obj->store = Warehouse::find($w->store)->name;
            $obj->orderdate = $w->orderdate;
            $obj->customer = Customer::find($w->customer)->name;
            $obj->product = Productcode::find($w->product)->name;
            $obj->rate = $w->rate;
            $obj->quantity = $w->quantity;
            $obj->total = $w->total;
            $data[] = $obj;
        }
        $orders_sorted = new Collection($data);

        return Datatables::of($orders_sorted)->make(true);
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
            $orderitem->ordertime=date("H:i");
            $orderitem->customer=$request->customer;

            $orderitem->product=$request->product[$i];
            $orderitem->store=$request->store[$i];
            $orderitem->rate=$request->rate[$i];
            $orderitem->quantity=$request->quantity[$i];
            $orderitem->Total=$request->total[$i];
            $orderitem->save();

        }

        $customernumber=Customer::find($request->customer)->pluck('phonenumber')->first();
        $sender = "inven";
        $message = "It was really a pleasure doing business with you! Thank you for choosing us!";
        $receipient = preg_replace('/^0/','233',$customernumber);
        $msg = urlencode($message);
        $api = 'http://api.nalosolutions.com/bulksms/?username=naname&password=christ123!@&type=0&dlr=1&destination=' . $receipient . '&source=' . $sender . '&message=' . $msg;
        file_get_contents($api);


        Session::flash('success','New Order placed successfully ');
        Session::flash('printurl','orderreceiptpdf/'.$request->ordernumber);
        return redirect('order');
    }

    public function updatepaymentorder(Request $request){
        
        $paymentorder =Paymentorder::find($request->idEdit);
        $paymentorder->paidamount = $request->payamountEdit;
        $paymentorder->dueamount = $request->dueamountEdit;
        $paymentorder->paymenttype = $request->paymenttypeEdit;
        $paymentorder->paymentstatus = $request->paymentstatusEdit;
        $paymentorder->save();
        Session::flash('success','Payment Record updated successfully');
        return redirect('manageorder');
    }
    public function deletepaymentorder(Request $request){
        Paymentorder::find($request->idDelete)->delete();
        Order::find($request->idDelete)->delete();
        Session::flash('success','Order deleted successfully');
        return redirect('manageorder');
    }
}
