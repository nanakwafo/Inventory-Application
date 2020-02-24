@extends('layouts.app')
@section('title','inventoryonhandwarehouse')
@section('content')
    <div class="content-main">

        <!--banner-->
        <div class="banner">

            <h2>
                <a href="dashboard">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>Inventory On hand Report &nbsp;<b>WAREHOUSE</b></span>
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
                                    <label class="control-label">Warehouse</label>
                                    <select name="warehouse" id="warehousedropdownvalue">
                                        <option value="">Select</option>
                                        @foreach(\App\Warehouse::where('purpose','warehouse')->get() as $s)
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
                                    <label class="control-label">From Arrival Date</label>
                                    <input type="date" name="fromdate" required="">
                                </div>
                                <div class="col-md-2 form-group1">
                                    <label class="control-label">To Arrival Date</label>
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
                <table class="table table-bordered " id="inventoryonhandwarehouse-table">
                    <thead>
                    <tr>

                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="The Date the Product was received ">Receive Date </a></th>
                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="Product Name">Product name</a></th>
                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="Product identification code">SKU</a></th>

                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="Warehouse Name">Warehouse</a></th>
                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="The Quantity of Product received">Quantity In</a></th>
                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="The Quantity of Product that is moved out">Quantity Out</a></th>
                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="The Quantity of Product Left">Quantity Remaining</a></th>
                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="The Total Cost of Product Left">Value On Hand</a></th>



                    </tr>
                    </thead>
                </table>





                <div class="col-md-3 form-group">
                    <a href="" id="inventoryonhandwarehousepdf" class="btn btn-default">Download PDF</a>
                    <a href="" id="inventoryonhandwarehouseexcel" class="btn btn-default">Download CSV</a>

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
