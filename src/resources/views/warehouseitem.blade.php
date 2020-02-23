@extends('layouts.app')
@section('title','warehouseitem')
@section('content')
    <div class="content-main">

        <!--banner-->
        <div class="banner">

            <h2>
                <a href="dashboard">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>Warehouse Items</span>
            </h2>
        </div>
        <!--//banner-->
        <!--content-->
        <div class="content-top">

            <div class="col-md-12 ">
                <table class="table table-bordered " id="users-table">
                    <thead>
                    <tr>
                        <th style="background-color: white;color: black">No</th>
                        <th style="background-color: white;color: black">Date</th>
                        <th style="background-color: white;color: black">GRN Number</th>
                        <th style="background-color: white;color: black">Warehouse Name</th>
                        <th style="background-color: white;color: black">Supplier Name</th>
                        <th style="background-color: white;color: black">Product</th>
                        <th style="background-color: white;color: black">Description</th>
                        <th style="background-color: white;color: black">Quantity</th>

                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <td class="non_searchable"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        {{--<td></td>--}}
                        <td></td>
                        <td></td>


                    </tr>
                    </tfoot>
                </table>

            </div>
            <div class="clearfix"> </div>
        </div>

    </div>
    @endsection

