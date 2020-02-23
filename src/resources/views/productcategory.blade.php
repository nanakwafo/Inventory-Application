@extends('layouts.app')
@section('title','productcategory')
@section('content')
    <div class="content-main">

        <!--banner-->
        <div class="banner">

            <h2>
                <a href="dashboard">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>Product Category</span>
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

                    <form action="saveproductcategory" method="post">
                        {{csrf_field()}}
                        <div class="vali-form">
                            <div class="col-md-12 form-group1">
                                <label class="control-label">Product Category Name</label>
                                <input type="text" name="name" required="">
                            </div>

                            <div class="clearfix"> </div>
                        </div>



                        <div class="col-md-12 form-group1 ">
                            <label class="control-label">Description</label>
                            <textarea  name="description" required=""></textarea>
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
            <table class="table table-bordered " id="productcategory-table">
                <thead>
                <tr>
                    <th style="background-color: white;color: black">No.</th>
                    <th style="background-color: white;color: black">Name</th>
                    <th style="background-color: white;color: black">Description</th>
                    <th style="background-color: white;color: black">Created At</th>
                    <th style="background-color: white;color: black">Updated At</th>
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
                    <form method="post" action="updateproductcategory">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <div class="validation-system">


                                <input id="idEdit" name="idEdit" type="hidden"/>
                                <div class="col-md-12 form-group1">
                                    <label class="control-label">Product Category Name</label>
                                    <input type="text" id="nameEdit" name="nameEdit" required="">
                                </div>

                                <div class="clearfix"> </div>




                                <div class="col-md-12 form-group1 ">
                                    <label class="control-label">Description</label>
                                    <textarea  name="descriptionEdit" id="descriptionEdit" required=""></textarea>
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
                        <center><h4 class="modal-title">Remove </h4></center>
                    </div>
                    <form action="deleteproductcategory" method="post">
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

