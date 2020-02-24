@extends('layouts.app')
@section('title','inventoryonhandstore')
@section('content')
    <div class="content-main">

        <!--banner-->
        <div class="banner">

            <h2>
                <a href="dashboard">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>Inventory On hand Report &nbsp;<b>STORE</b></span>
            </h2>
        </div>
        <!--//banner-->
        <!--content-->
        <div class="content-top">


            <div class="col-md-12">
                <div class="validation-system">

                    <div class="validation-form">
                        <!---->

                        <form id="search-form">
                            {{csrf_field()}}
                            <div class="vali-form">
                                <div class="col-md-3 form-group2 group-mail">
                                    <label class="control-label">Store</label>
                                    <select name="store" id="storedropdownvalue">
                                        <option value="">Select</option>
                                        @foreach(\App\Warehouse::where('purpose','store')->get() as $s)
                                            <option value="{{$s->id}}">{{$s->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 form-group2 group-mail">
                                    <label class="control-label">Product</label>
                                    <select name="product" id="productdropdownvalue">
                                        <option value="">Select</option>
                                        @foreach(\App\Purchase::select('productcode')->distinct('productcode')->get() as $s)
                                            <option value="{{$s->productcode}}">{{\App\Productcode::find($s->productcode)->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2 form-group1">
                                    <label class="control-label">From Date</label>
                                    <input type="date" name="fromdate" required="">
                                </div>
                                <div class="col-md-2 form-group1">
                                    <label class="control-label">To Date</label>
                                    <input type="date" name="todate" required="">
                                </div>



                                <div class="col-md-2 form-group">
                                    <button type="submit" class="btn btn-default">Search</button>

                                </div>
                            </div>

                            <div class="clearfix"> </div>
                        </form>

                        <!---->
                    </div>

                </div>
                <table class="table table-bordered " id="inventoryonhand-table">
                    <thead>
                    <tr>

                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="The Name Of the Product">Product name</a></th>
                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="The Product Identification Code">Product Code</a></th>
                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="The Store">Store</a></th>
                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="The Supplier of the Product">Supplier</a></th>
                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="The Category of the Product">Product Category</a></th>
                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="The Unit of the Product">Unit</a></th>
                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="The Cost Of the Product">Cost(GHC)</a></th>
                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="The Retail Price of the Product">Retail price(GHC) Each</a></th>
                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="The Purchase Order Number">Purchase Order Number</a></th>
                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="The number of units of a product on hand at the beginning of the
selected date range.">Starting inventory</a></th>
                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title=" The number of units of a product added in the viewed date range.">Received</a></th>
                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="The number of units of the product sold in the viewed date range">Usage</a></th>
                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="The current number of units of the product held in inventory at the location.">Onhand</a></th>
                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="The number of units of a product not accounted for">Variance</a></th>
                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="The total cost of the variance">Variance cost(GHC)</a></th>
                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="The Total cost of product available">Value on hand(GHC)</a></th>


                    </tr>
                    </thead>
                </table>





                <div class="col-md-3 form-group">
                    <a href="" id="inventoryonhandstorepdf" class="btn btn-default">Download PDF</a>
                    <a href="" id="inventoryonhandstoreexcel" class="btn btn-default">Download CSV</a>

                </div>


                <div class="clearfix"> </div>



            </div>
            <div class="clearfix"> </div>
        </div>
        <!---->


        <!---->
        @include('partials.footer')
    </div>
    @endsection


