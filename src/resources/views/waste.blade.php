@extends('layouts.app')
@section('title','waste')
@section('content')
    <div class="content-main">

        <!--banner-->
        <div class="banner">

            <h2>
                <a href="dashboard">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>Wastes</span>
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

                        <form method="post" action="savewaste">
                            {{csrf_field()}}
                            <div class="vali-form">
                                <div class="col-md-12 form-group1">
                                    <label class="control-label">Date:</label>
                                    <input type="date" name="date" required="">
                                </div>
                                <div class="col-md-12 form-group2 group-mail">
                                    <label class="control-label">Store</label>
                                    <select  name="store_id">
                                        <option></option>
                                        @foreach(\App\Warehouse::where('purpose','store')->get() as $s)
                                            <option value="{{$s->id}}">{{$s->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-md-12 form-group1">
                                    <label class="control-label">Product code</label>
                                    <input type="text" name="productcode" required="">
                                </div>
                                <div class="col-md-12 form-group1">
                                    <label class="control-label">Unit</label>
                                    <input type="text" name="unit" required="">
                                </div>
                                <div class="col-md-12 form-group1">
                                    <label class="control-label">Unit Cost</label>
                                    <input type="text" name="unitcost" required="">
                                </div>
                                <div class="col-md-12 form-group1">
                                    <label class="control-label">Total Cost</label>
                                    <input type="text" name="totalcost" required="">
                                </div>

                                <div class="clearfix"> </div>
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
            <div class="col-md-8 ">
                <table class="table table-bordered " id="waste-table">
                    <thead>
                    <tr>
                        <th style="background-color: white;color: black">No.</th>
                        <th style="background-color: white;color: black">Date</th>
                        <th style="background-color: white;color: black">Store</th>
                        <th style="background-color: white;color: black">Product Code</th>
                        <th style="background-color: white;color: black">Unit</th>
                        <th style="background-color: white;color: black">Remark</th>

                        <th style="background-color: white;color: black;width: 20%">Action</th>
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
                            <center><h4 class="modal-title">Edit  Details</h4></center>
                        </div>
                        <form method="post" action="updatewaste">
                            {{csrf_field()}}
                            <div class="modal-body">
                                <div class="validation-system">




                                    <input id="idEdit" name="idEdit" type="hidden"/>
                                    <div class="vali-form">
                                        <div class="col-md-12 form-group1">
                                            <label class="control-label">Date:</label>
                                            <input type="date" name="dateEdit" id="dateEdit" required="">
                                        </div>
                                        <div class="col-md-12 form-group2 group-mail">
                                            <label class="control-label">Store</label>
                                            <select  name="store_idEdit" id="store_idEdit">
                                                <option></option>
                                                @foreach(\App\Warehouse::where('purpose','store')->get() as $s)
                                                    <option value="{{$s->id}}">{{$s->name}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col-md-12 form-group1">
                                            <label class="control-label">Product code</label>
                                            <input type="text" name="productcodeEdit" id="productcodeEdit" required="">
                                        </div>
                                        <div class="col-md-12 form-group1">
                                            <label class="control-label">Unit</label>
                                            <input type="text" name="unitEdit" id="unitEdit" required="">
                                        </div>
                                        <div class="col-md-12 form-group1">
                                            <label class="control-label">Unit Cost</label>
                                            <input type="text" name="unitcostEdit" id="unitcostEdit" required="">
                                        </div>
                                        <div class="col-md-12 form-group1">
                                            <label class="control-label">Total Cost</label>
                                            <input type="text" name="totalcostEdit" id="totalcostEdit" required="">
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="col-md-12 form-group1 ">
                                        <label class="control-label">Remark</label>
                                        <textarea  name="remarkEdit" id="remarkEdit" required=""></textarea>
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
                        <form action="deletewaste" method="post">
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

