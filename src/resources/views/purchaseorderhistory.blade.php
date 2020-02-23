@extends('layouts.app')
@section('title','purchaseorderhistory')
@section('content')
    <div class="content-main">

        <!--banner-->
        <div class="banner">

            <h2>
                <a href="dashboard">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>Purchase Order History</span>
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

                                <div class="col-md-4 form-group2 group-mail">
                                    <label class="control-label">Status</label>
                                    <select name="status" id="status">
                                        <option value="">Select</option>
                                        <option value="Not Delivered">Not Delivered</option>
                                        <option value="Delivered">Delivered</option>

                                    </select>
                                </div>

                                <div class="col-md-3 form-group1">
                                    <label class="control-label">Created Date</label>
                                    <input type="date" name="fromdate" required="">
                                </div>
                                <div class="col-md-3 form-group1">
                                    <label class="control-label">Created Date</label>
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

                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="">Date </a></th>
                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="">Purchase Order #</a></th>
                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="">Product</a></th>
                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="">Vendor</a></th>

                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="">Status</a></th>
                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="">Expected Date</a></th>
                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="">Quantity Ordered</a></th>
                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="">Quantity Received</a></th>
                        <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="">Amount(GHC)</a></th>



                    </tr>
                    </thead>
                </table>





                <div class="col-md-3 form-group">
                    <a href="" id="purchaseorderhistorypdf" class="btn btn-default">Download PDF</a>
                    <a href="" id="purchaseorderhistoryexcel" class="btn btn-default">Download CSV</a>

                </div>


                <div class="clearfix"> </div>



            </div>
            <div class="clearfix"> </div>
        </div>

    </div>
    @endsection

