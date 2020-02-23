@extends('layouts.app')
@section('title','purchase')
@section('content')
    <div class="content-main">

        <!--banner-->
        <div class="banner">

            <h2>
                <a href="dashboard">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>Purchase Arrival</span>
            </h2>
        </div>
        <!--//banner-->
        <!--content-->
        <div class="content-top">


            <div class="col-md-3 ">
                @include('partials.messages')
                <div class="validation-system">

                    <div class="validation-form">
                        <!---->

                        <form method="post" action="savepurchase">
                            {{csrf_field()}}
                            <div class="vali-form">
                                <div class="col-md-12 form-group1">
                                    <label class="control-label">Receive date</label>
                                    <input type="date" name="datereceived" required="">
                                </div>
                                <div class="col-md-12 form-group2 group-mail">
                                    <label class="control-label">Product Category</label>
                                    <select name="productcategory_id" id="productcategory_id">
                                        <option value="">Select</option>
                                        @foreach(\App\Productcategory::all() as $s)
                                            <option value="{{$s->id}}">{{$s->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 form-group2 group-mail">
                                    <label class="control-label">Product</label>
                                    <select name="productcode" id="product">
                                        <option value="">Select</option>
                                        @foreach(\App\Productcode::all() as $s)
                                            <option value="{{$s->productcode}}">{{$s->name .'-'. $s->productcode}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{--<div class="col-md-12 form-group1">--}}
                                {{--<label class="control-label">Barcode</label>--}}
                                {{--<input type="text" name="barcode" required="">--}}
                                {{--</div>--}}
                                <div class="col-md-12 form-group1">
                                    <label class="control-label">Unit</label>
                                    <input type="text" name="unit" required="">
                                </div>
                                <div class="col-md-12 form-group1">
                                    <label class="control-label">Unit Price</label>
                                    <input type="text" name="unitprice" required="">
                                </div>
                                <div class="col-md-12 form-group1">
                                    <label class="control-label">Quantity</label>
                                    <input type="text" name="quantity" required="">
                                </div>

                                <div class="col-md-12 form-group1">
                                    <label class="control-label">Pay amount(Production Cost)</label>
                                    <input type="text" name="payamount" required="">
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="col-md-12 form-group2 group-mail">
                                <label class="control-label">Supplier</label>
                                <select name="supplier_id" id="supplier">
                                    <option value="">Select</option>
                                    @foreach(\App\Supplier::all() as $s)
                                        <option value="{{$s->id}}">{{$s->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 form-group1">
                                <label class="control-label">purchase order number</label>
                                <input type="text" name="purchaseordernumber" required="">
                            </div>
                            <div class="col-md-12 form-group1 ">
                                <label class="control-label">Remark</label>
                                <textarea  name="remark" required=""></textarea>
                            </div>
                            <div class="clearfix"> </div>

                            <div class="col-md-12 form-group">
                                <button type="submit" class="btn btn-default">Submit</button>

                            </div>
                            <div class="clearfix"> </div>
                        </form>

                        <!---->
                    </div>

                </div>
            </div>
            <div class="col-md-9 ">
                <table class="table table-bordered " id="users-table">
                    <thead>
                    <tr>
                        <th style="background-color: white;color: black"></th>
                        <th style="background-color: white;color: black">Receive Date</th>
                        <th style="background-color: white;color: black">Product Category</th>
                        <th style="background-color: white;color: black">Product Code</th>
                        <th style="background-color: white;color: black">Unit</th>
                        <th style="background-color: white;color: black">Unit Price</th>
                        <th style="background-color: white;color: black">Payamount</th>
                        <th style="background-color: white;color: black">Quantity</th>
                        <th style="background-color: white;color: black">Supplier</th>
                        <th style="background-color: white;color: black">Purchase Order</th>
                        <th style="background-color: white;color: black">Action</th>

                    </tr>
                    </thead>
                </table>

            </div>
            <div class="clearfix"> </div>
            <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <center><h4 class="modal-title">Edit Details</h4></center>
                        </div>
                        <form method="post" action="updatepurchase">
                            {{csrf_field()}}
                            <div class="modal-body">
                                <div class="validation-system">



                                    <input id="idEdit" name="idEdit" type="hidden"/>

                                    <div class="vali-form">
                                        <div class="col-md-12 form-group1">
                                            <label class="control-label">Receive date</label>
                                            <input type="date" id="datereceivedEdit" name="datereceivedEdit" required="">
                                        </div>

                                        <div class="col-md-12 form-group2 group-mail">
                                            <label class="control-label">Product Category</label>
                                            <select id="productcategory_idEdit" name="productcategory_idEdit">
                                                <option value="">Select</option>
                                                @foreach(\App\Productcategory::all() as $s)
                                                    <option value="{{$s->id}}">{{$s->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12  form-group2 group-mail">
                                            <label class="control-label">Product </label>
                                            <select id="productcodeEdit" name="productcodeEdit">
                                                <option value="">Select</option>
                                                @foreach(\App\Productcode::all() as $s)
                                                    <option value="{{$s->productcode}}">{{$s->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-12 form-group1">
                                            <label class="control-label">Unit </label>
                                            <input type="text" id="unitEdit" name="unitEdit" required="">
                                        </div>
                                        <div class="col-md-12 form-group1">
                                            <label class="control-label">Unit Price</label>
                                            <input type="text" name="unitpriceEdit" id="unitpriceEdit" required="">
                                        </div>
                                        <div class="col-md-12 form-group1">
                                            <label class="control-label">Quantity</label>
                                            <input type="text" id="quantityEdit" name="quantityEdit" required="">
                                        </div>

                                        <div class="col-md-12 form-group1">
                                            <label class="control-label">Pay amount(Production Cost)</label>
                                            <input type="text" id="payamountEdit" name="payamountEdit" required="">
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="col-md-12 form-group2 group-mail">
                                        <label class="control-label">Supplier</label>
                                        <select name="supplier_idEdit" id="supplier_idEdit">
                                            <option value="">Select</option>
                                            @foreach(\App\Supplier::all() as $s)
                                                <option value="{{$s->id}}">{{$s->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 form-group1">
                                        <label class="control-label">purchase order number</label>
                                        <input type="text" name="purchaseordernumberEdit" id="purchaseordernumberEdit" required="">
                                    </div>
                                    <div class="col-md-12 form-group1 ">
                                        <label class="control-label">Remark</label>
                                        <textarea  id="remarkEdit" name="remarkEdit" required=""></textarea>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="col-md-12 form-group">
                                    <button type="submit" class="btn btn-default">Submit</button>

                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>

            <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <center><h4 class="modal-title">Remove</h4></center>
                        </div>
                        <form action="deletepurchase" method="post">
                            {{csrf_field()}}
                            <div class="modal-body">
                                <p>Do You Want To Delete <span id="nameDelete"></span>  From System?</p>
                                <input type="hidden" id="idDelete" name="idDelete"/>
                            </div>
                            <div class="modal-footer">
                                <div class="col-md-12 form-group">
                                    <button type="submit" class="btn btn-default">Submit</button>

                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>

        </div>

    </div>
    @endsection
