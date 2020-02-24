@extends('layouts.app')
@section('title','goodissue')
@section('content')
    <div class="content-main">

        <!--banner-->
        <div class="banner">

            <h2>
                <a href="dashboard">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>Promotion Email</span>
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

                        <form action="savecustomer" method="post">
                            {{csrf_field()}}
                            <div class="vali-form">
                                <div class="col-md-12 form-group1">
                                    <label class="control-label">From:</label>
                                    <input type="text" name="sender" id="sender" required="">
                                </div>
                                <div class="col-md-12 form-group1">
                                    <label class="control-label">Message</label>
                                    <textarea row="5" name="messagecontent" id="messagecontent" required ></textarea>
                                </div>


                                <div class="clearfix"> </div>
                            </div>


                            <div class="col-md-12 form-group">
                                <button type="submit" id="send_bulk_sms" class="btn btn-default">Send</button>

                            </div>
                            <div class="clearfix"> </div>
                        </form>

                        <!---->
                    </div>

                </div>
            </div>
            <div class="col-md-8 ">
                <div class="validation-system">

                    <div class="validation-form">
                        <!---->

                        <form id="search-form">
                            {{csrf_field()}}
                            <div class="vali-form">
                                <div class="col-md-4 form-group2 group-mail">
                                    <label class="control-label">Customer Category</label>
                                    <select name="customercat" id="customercat" class="customercat">
                                        <option value="">Select</option>
                                        @foreach(\App\Customercategory::all() as $s)
                                            <option value="{{$s->id}}">{{$s->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <button type="submit" class="btn btn-default">Search</button>

                                </div>
                            </div>

                            <div class="clearfix"> </div>
                        </form>

                    </div>

                </div>
                <table class="table table-bordered " id="contacts-table">
                    <thead>
                    <tr>
                        <th style="background-color: white;color: black">No.</th>
                        <th style="background-color: white;color: black"><input type="checkbox" id="checkAll" name="checkAll" />&nbsp;Select All</th>
                        <th style="background-color: white;color: black">Name</th>
                        <th style="background-color: white;color: black">Email</th>

                    </tr>
                    </thead>
                    <tbody id="contacts-table-data"></tbody>
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
                        <form method="post" action="updatecustomer">
                            {{csrf_field()}}
                            <div class="modal-body">
                                <div class="validation-system">



                                    <input id="idEdit" name="idEdit" type="hidden"/>
                                    <div class="col-md-12 form-group1">
                                        <label class="control-label">Customer Name</label>
                                        <input type="text"  id="nameEdit" name="nameEdit" required="">
                                    </div>

                                    <div class="clearfix"> </div>

                                    <div class="col-md-12 form-group1">
                                        <label class="control-label">Phone number</label>
                                        <input type="text"  id="phonenumberEdit" name="phonenumberEdit" required="">
                                    </div>

                                    <div class="clearfix"> </div>

                                    <div class="col-md-12 form-group1">
                                        <label class="control-label">Address</label>
                                        <input type="text"  id="addressEdit" name="addressEdit" required="">
                                    </div>

                                    <div class="clearfix"> </div>

                                    <div class="col-md-12 form-group2 group-mail">
                                        <label class="control-label">Customer Category</label>
                                        <select id="customercategory_idEdit" name="customercategory_idEdit">
                                            <option value="">Select</option>
                                            @foreach(\App\Customercategory::all() as $s)
                                                <option value="{{$s->id}}">{{$s->name}}</option>
                                            @endforeach
                                        </select>
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
                        <form method="post" action="deletecustomer">
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
        <!---->


        <!---->
        @include('partials.footer')
    </div>
@endsection




