@extends('layouts.app')
@section('title','permission')

@section('content')
    <div class="content-main">

        <!--banner-->
        <div class="banner">

            <h2>
                <a href="dashboard">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>Permission</span>
            </h2>
        </div>
        <!--//banner-->
        <!--content-->
        <div class="content-top">


            <div class="col-md-4 ">
                @include('partials.messages')
                <div class="validation-system">

                    <div class="validation-form">
                        <!---->

                        <form action="assignpermission" method="post">
                            {{csrf_field()}}
                            <div class="col-md-12 form-group2 group-mail">
                                <label class="control-label">Role Name</label>
                                <select name="roleid">
                                    <option value="">Select</option>
                                    @foreach(\Cartalyst\Sentinel\Roles\EloquentRole::all() as $s)
                                        <option value="{{$s->id}}">{{$s->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="checkbox" class="col-md-6 control-label"><h5>Select Permisssions</h5></label>
                                <br/>
                                <div class="col-sm-8">
                                    <div class="checkbox-inline1"><label><input id="permissiondashboard" type="checkbox" name="dashboard" value="false"> Dashboard</label></div>
                                    <div class="checkbox-inline1"><label><input id="permissionmasterentry" type="checkbox" name="masterentry" value="false" > Master Entry</label></div>
                                    <div class="checkbox-inline1"><label><input id="permissionpurchaseorder" type="checkbox" name="purchaseorder" value="false" > Purchase Order</label></div>
                                    <div class="checkbox-inline1"><label><input id="permissionitemadjustment" type="checkbox" name="itemadjustment" value="false" > Item Adjustment</label></div>
                                    <div class="checkbox-inline1"><label><input id="permissionsale" type="checkbox" name="sale" value="false" > Sales</label></div>
                                    <div class="checkbox-inline1"><label><input id="permissioninvoice" type="checkbox" name="invoice" value="false" > Invoices</label></div>
                                    <div class="checkbox-inline1"><label><input id="permissionreport" type="checkbox" name="report" value="false" > Report</label></div>
                                    <div class="checkbox-inline1"><label><input id="permissionpromotion" type="checkbox" name="promotion" value="false" > Promotion</label></div>
                                    <div class="checkbox-inline1"><label><input id="permissionaudit" type="checkbox" name="audit" value="false" > Audit</label></div>
                                    <div class="checkbox-inline1"><label><input id="permissionuser" type="checkbox" name="user" value="false" > User Mgn</label></div>
                                    <div class="checkbox-inline1"><label><input id="permissionprofile" type="checkbox" name="user" value="false" > Profile</label></div>

                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <button type="submit" class="btn btn-default">Submit</button>

                            </div>
                            <div class="clearfix"> </div>
                        </form>

                        <!---->
                    </div>

                </div>
            </div>
            <div class="col-md-8 ">
                <table class="table table-bordered " id="productcategory-table">
                    <thead>
                    <tr>
                        <th style="background-color: white;color: black">No.</th>
                        <th style="background-color: white;color: black">Name</th>

                        <th style="background-color: white;color: black;width: 20%">Permissions</th>
                    </tr>
                    </thead>
                </table>

            </div>
            <div class="clearfix"> </div>


            <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <center><h4 class="modal-title">Permissions Assign to a Role </h4></center>
                        </div>


                        <div class="modal-body">
                            <center><h3><span id="roleheader"></span></h3></center>
                            <ul class="list-group">
                                <li class="list-group-item"><span class="permissionicondashboard"></span>Dashboard </li>
                                <li class="list-group-item"><span class="permissioniconmasterentry"></span>Master Entry </li>
                                <li class="list-group-item"><span class="permissioniconpurchaseorder"></span>Purchase Order </li>
                                <li class="list-group-item"><span class="permissioniconitemadjustment"></span>Item Adjustment </li>
                                <li class="list-group-item"><span class="permissioniconsale"></span>Sales </li>
                                <li class="list-group-item"><span class="permissioniconinvoice"></span>Invoices </li>
                                <li class="list-group-item"><span class="permissioniconreport"></span>Report </li>
                                <li class="list-group-item"><span class="permissioniconpromotion"></span>Promotion</li>
                                <li class="list-group-item"><span class="permissioniconaudit"></span>Audit </li>
                                <li class="list-group-item"><span class="permissioniconuser"></span>User Mgn </li>
                                <li class="list-group-item"><span class="permissioniconprofile"></span>Profile </li>

                            </ul>
                        </div>
                        <div class="modal-footer">
                            {{--<div class="col-md-12 form-group">--}}
                            {{--<button type="submit" class="btn btn-default">Submit</button>--}}

                            {{--</div>--}}
                            <div class="clearfix"> </div>
                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
        </div>

    </div>
        @endsection


