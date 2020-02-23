@extends('layouts.app')
@section('title','purchaseorder')
@section('content')
    <div class="content-main">

        <!--banner-->
        <div class="banner">

            <h2>
                <a href="dashboard">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>Purchase Order</span>
            </h2>
        </div>
        <!--//banner-->
        <!--content-->

        <div class="content-top">

            <form action="savepurchaseorder" method="post">
                {{csrf_field()}}
                <div class="col-md-12 ">
                    @include('partials.messages')

                    <div class="validation-system">

                        <div class="validation-form">
                            <!---->


                            <div class="vali-form">
                                <div class="col-md-4 form-group1">
                                    <label class="control-label">Purchase Order#</label>
                                    <input type="text" name="purchaseordernumber" required="" readonly value="{{\App\Helpers\AppHelper::get_purchaseordernumber()}}" id="purchaseordernumber">
                                </div>
                                <div class="col-md-2 form-group1">
                                    <label class="control-label">Date</label>
                                    <input type="date" name="date" required="" id="date">
                                </div>
                                <div class="col-md-2 form-group1">
                                    <label class="control-label">Expected Delivery Date</label>
                                    <input type="date" name="expecteddeliverydate" required="" id="expecteddeliverydate">
                                </div>
                                <div class="col-md-4 form-group2 group-mail">
                                    <label class="control-label">Supplier</label>
                                    <select id="supplier_id" name="supplier_id" class="supplier">
                                        <option value="">Select</option>
                                        @foreach(App\Supplier::all() as $s)
                                            <option value="{{$s->id}}">{{$s->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="clearfix"> </div>
                                <input type="hidden" id="number_of_items" name="number_of_items" value="0" />
                                <table class="table table-hover table-inverse">
                                    <span id="attention"></span>
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Rate </th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th> <button type="button" class="btn btn-default " id="addnew" ><i class="fa fa-plus-circle" aria-hidden="true"></i></button></th>
                                    </tr>
                                    </thead>
                                    <tbody id="data"></tbody>

                                </table>
                                <div class="clearfix"> </div>
                            </div>




                        </div>

                    </div>
                </div>



                <div class="col-md-12 ">

                    <div class="validation-system">

                        <div class="validation-form">
                            <!---->


                            <div class="vali-form">
                                <div class="col-md-6 form-group1">
                                    <label class="control-label">Sub Amount:</label>
                                    <input type="text" id="subamount" name="subamount"  readonly>
                                </div>
                                <div class="col-md-6 form-group1">
                                    <label class="control-label">VAT(13%):</label>
                                    <input type="text" id="vat" name="vat" readonly>
                                </div>
                                <div class="col-md-6 form-group1">
                                    <label class="control-label">Total Amount:</label>
                                    <input type="text" id="totalamount" name="totalamount" readonly>
                                </div>
                                <div class="col-md-6 form-group1">
                                    <label class="control-label">Discount:</label>
                                    <input type="text" id="discount" name="discount" required="">
                                </div>
                                <div class="col-md-6 form-group1">
                                    <label class="control-label">Grand Total:</label>
                                    <input type="text" id="grandtotal" name="grandtotal" required="">
                                </div>
                                <div class="col-md-6 form-group1">
                                    <label class="control-label">Paid Amount:</label>
                                    <input type="text" id="paidamount" name="paidamount" required="">
                                </div>
                                <div class="col-md-6 form-group1">
                                    <label class="control-label">Due Amount:</label>
                                    <input type="text" id="dueamount" name="dueamount" required="">
                                </div>
                                <div class="col-md-6 form-group2 group-mail">
                                    <label class="control-label">Payment Type:</label>
                                    <select id="paymenttype" name="paymenttype">
                                        <option value="">Select</option>
                                        <option value="cash">Cash</option>
                                        <option value="cheque">Cheque</option>
                                        <option value="credit card">Credit Card</option>

                                    </select>
                                </div>
                                <div class="col-md-6 form-group2 group-mail">
                                    <label class="control-label">Account:</label>
                                    <select id="bankaccount" name="bankaccount" class="bankaccount" required>

                                        <option value="">Select</option>
                                        @foreach(\App\Bankaccount::all() as $s)
                                            <option value="{{$s->accountnumber}}">{{$s->name}}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="clearfix"> </div>
                            </div>


                            <div class="col-md-12 form-group">
                                <button type="submit" class="btn btn-default">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>

                            </div>
                            <div class="clearfix"> </div>

                            <!---->
                        </div>

                    </div>
                </div>

            </form>

        </div>
        <div class="clearfix"> </div>


    </div>
    @endsection


