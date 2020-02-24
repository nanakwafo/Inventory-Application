@extends('layouts.app')
@section('title','Grntype')
@section('content')
    <div class="content-main">

        <!--banner-->
        <div class="banner">

            <h2>
                <a href="dashboard">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>To Warehouse</span>
            </h2>
        </div>
        <!--//banner-->
        <!--content-->

        <div class="content-top">

            <form action="savegoodreceive" method="post">
                {{csrf_field()}}
                <div class="col-md-4 ">
                    @include('partials.messages')

                    <div class="validation-system">

                        <div class="validation-form">
                            <!---->


                            <div class="vali-form">
                                <div class="col-md-12 form-group1">
                                    <label class="control-label">GRN Number</label>
                                    <input type="text" readonly name="grnnumber" required="" value="{{\App\Helpers\AppHelper::get_grnnumber()}}" id="grnnumber">
                                </div>
                                <div class="col-md-12 form-group1">
                                    <label class="control-label">Date</label>
                                    <input type="date" name="date"  required="">
                                </div>
                                <div class="clearfix"> </div>
                            </div>

                            <div class="col-md-12 form-group2 group-mail">
                                <label class="control-label">GRN Type</label>
                                <select id="grntype" name="grntype">
                                    <option value="">Select</option>
                                    @foreach(App\Grntype::all() as $s)
                                        <option value="{{$s->id}}">{{$s->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 form-group2 group-mail">
                                <label class="control-label">Warehouse To</label>
                                <select id="warehouse_id" name="warehouse_id">
                                    <option value="">Select</option>
                                    @foreach(App\Warehouse::where('purpose','warehouse')->get() as $s)
                                        <option value="{{$s->id}}">{{$s->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12 form-group1 ">
                                <label class="control-label">Remark</label>
                                <textarea  placeholder="Your Comment..." name="remark" required=""></textarea>
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
                                    <label class="control-label">Supplier</label>
                                    <select id="supplier_id" name="supplier_id">
                                        <option value="">Select Supplier</option>
                                        @foreach(App\Supplier::all() as $s)
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
                                            <th >quantity</th>
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


            <div class="col-md-12 ">
                <table class="table table-bordered " id="warehousestat-table">
                    <thead>
                    <tr>
                        <th style="background-color: white;color: black">Warehouse </th>
                        <th style="background-color: white;color: black">Product Name</th>
                        <th style="background-color: white;color: black">Quantity In</th>

                    </tr>
                    </thead>
                </table>



            </div>
            <div class="clearfix"> </div>


        </div>
        <!---->


        <!---->
        @include('partials.footer')
    </div>
@endsection




