@extends('layouts.app')
@section('title','goodissue')
@section('content')
    <div class="content-main">

        <!--banner-->
        <div class="banner">

            <h2>
                <a href="dashboard">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>To Store</span>
            </h2>
        </div>
        <!--//banner-->
        <!--content-->
        <div class="content-top">

            <form id="" method="post" action="savegoodissue">
                {{csrf_field()}}
                <div class="col-md-4 ">
                    @include('partials.messages')
                    <div class="validation-system">

                        <div class="validation-form">

                            <div class="vali-form">
                                <div class="col-md-12 form-group1">
                                    <label class="control-label">ADD Number</label>
                                    <input type="text" name="addnumber" readonly value="{{\App\Helpers\AppHelper::get_addnumber()}}" required="">
                                </div>
                                <div class="col-md-12 form-group1">
                                    <label class="control-label">Date</label>
                                    <input type="date" name="adddate" required="">
                                </div>
                                <div class="clearfix"> </div>
                            </div>

                            <div class="col-md-12 form-group2 group-mail">
                                <label class="control-label">ADD Type</label>
                                <select name="addtype" id="addtype">
                                    <option value="">Select</option>
                                    <option value="fromwarehouse">From warehouse</option>
                                    <option value="fromindividual">From Individual</option>


                                </select>
                            </div>
                            <div class="col-md-12 form-group2 group-mail">
                                <label class="control-label">Warehouse From</label>
                                <select id="warehouse_from_id" name="warehouse_from_id">
                                    <option value="">Select</option>

                                    @foreach(App\Warehouse::where('purpose','warehouse')->get() as $s)
                                        <option value="{{$s->id}}">{{$s->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12 form-group1 ">
                                <label class="control-label">Description</label>
                                <textarea  name="remark" required=""></textarea>
                            </div>
                            <div class="clearfix"> </div>

                        </div>



                    </div>
                </div>
                <div class="col-md-8 ">
                    <div class="validation-system">

                        <div class="validation-form">
                            <!---->


                            <div class="vali-form">
                                <div class="col-md-12 form-group2 group-mail">
                                    <label class="control-label">Store To</label>
                                    <select id="store_to" name="warehouse_to_id">
                                        <option value="">Select</option>
                                        @foreach(App\Warehouse::where('purpose','store')->get() as $s)
                                            <option value="{{$s->id}}">{{$s->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <span id="attention"></span>
                                    <input type="hidden" id="number_of_items" name="number_of_items" value="0" />
                                    <table class="table table-hover table-inverse">
                                        <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Selling Price</th>
                                            <th>quantity</th>
                                            <th>Desciption</th>
                                            <th>Unit</th>
                                            <th> <button type="button" class="btn btn-default " id="addnew" ><i class="fa fa-plus-circle" aria-hidden="true"></i></button></th>
                                        </tr>
                                        </thead>
                                        <tbody id="data"></tbody>
                                    </table><br>
                                    <div class="col-md-12 form-group">
                                        <button type="submit" class="btn btn-default">Submit</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                            <div class="clearfix"> </div>


                            <!---->
                        </div>

                    </div>







                </div>
            </form>
            <div class="clearfix"> </div>
            <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <center><h4 class="modal-title">Edit Product Category Details</h4></center>
                        </div>
                        <div class="modal-body">
                            <div class="validation-system">

                                <div class="validation-form">
                                    <!---->

                                    <form>
                                        <div class="vali-form">
                                            <div class="col-md-12 form-group1">
                                                <label class="control-label">Product Category Name</label>
                                                <input type="text" placeholder="Fruits" required="">
                                            </div>

                                            <div class="clearfix"> </div>
                                        </div>



                                        <div class="col-md-12 form-group1 ">
                                            <label class="control-label">Description</label>
                                            <textarea  placeholder="Your Comment..." required="">use for.....</textarea>
                                        </div>
                                        <div class="clearfix"> </div>


                                    </form>

                                    <!---->
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="col-md-12 form-group">
                                <button type="submit" class="btn btn-default">Submit</button>

                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>

            <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <center><h4 class="modal-title">Remove Product Category</h4></center>
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <div class="col-md-12 form-group">
                                <button type="submit" class="btn btn-default">Submit</button>

                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>

        </div>

    </div>
@endsection


