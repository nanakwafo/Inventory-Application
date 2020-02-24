@extends('layouts.app')
@section('title','Audit')
@section('content')
    <div class="content-main">

        <!--banner-->
        <div class="banner">

            <h2>
                <a href="dashboard">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>Audits</span>
            </h2>
        </div>
        <!--//banner-->
        <!--content-->
        <div class="content-top">



            <div class="col-md-12 ">
                <table class="table table-bordered " id="audit-table">
                    <thead>
                    <tr>

                        <th style="background-color: white;color: black">User</th>
                        <th style="background-color: white;color: black">Action</th>
                        <th style="background-color: white;color: black">Audit Type</th>
                        <th style="background-color: white;color: black">Old Values</th>
                        <th style="background-color: white;color: black">New VAlues</th>

                    </tr>
                    </thead>
                </table>

            </div>
            <div class="clearfix"> </div>


        </div>
        <!---->


        <!---->
        <!---->
        @include('partials.footer')
    </div>
    @endsection



