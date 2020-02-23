@extends('layouts.app')
@section('title','profile')
@section('content')
    <div class="content-main">

        <!--banner-->
        <div class="banner">

            <h2>
                <a href="dashboard">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>Profile</span>
            </h2>
        </div>
        <!--//banner-->

        <div class="col-md-12 ">

            <div class="validation-system">

                <div class="validation-form">
                    <!---->

                    <form method="post" action="updateprofile" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="vali-form">
                            <input type="hidden" name="id" value="{{$details->id}}"/>
                            <div class="col-md-4 form-group1">
                                <section class="panel panel-default">
                                    <div class="panel-body">
                                        @if(!empty($details->logo))
                                            <div><img id="preview_image" src="images/{{$details->logo}}" width="300px" height="300px" class="img-responsive text-center" ></div>
                                        @else
                                            <div><img src="images/wo.jpg" width="270px" height="270px" class="img-responsive text-center" ></div>

                                        @endif
                                        <br>
                                        <br>
                                        {{--//<form enctype="multipart/form-data"  action=""></form>--}}
                                        <input type="file" id="imgInp" name="logo" class="form-control">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    </div>
                                </section>
                            </div>
                            <div class="col-md-4 form-group1">
                                <label class="control-label">Company Name:</label>
                                <input type="text" name="companyname" value="{{$details->companyname}}" required="">
                            </div>


                            <div class="col-md-4 form-group1">
                                <label class="control-label">Phone:</label>
                                <input type="text" name="phone" value="{{$details->phone}}" required="">
                            </div>
                            <div class="col-md-4 form-group1">
                                <label class="control-label">Email:</label>
                                <input type="text" name="email" value="{{$details->email}}" required="">
                            </div>


                            <div class="col-md-4 form-group1">
                                <label class="control-label">Address:</label>
                                <input type="text" name="address" value="{{$details->address}}" required="">
                            </div>
                            <div class="col-md-4 form-group1">
                                <label class="control-label">Mobile:</label>
                                <input type="text" name="mobile" value="{{$details->mobile}}" required="">
                            </div>

                            <div class="col-md-4 form-group1">
                                <label class="control-label">Website:</label>
                                <input type="text" name="website" value="{{$details->website}}" required="">
                            </div>
                            <div class="clearfix"> </div>
                            <div class="col-md-4 form-group1">
                                <label class="control-label">Fax:</label>
                                <input type="text" name="fax" value="{{$details->fax}}" required="">
                            </div>
                            <div class="clearfix"> </div>
                        </div>




                        <div class="col-md-4 form-group">
                            <button type="submit" class="btn btn-default">Submit</button>

                        </div>
                        <div class="clearfix"> </div>
                    </form>

                    <!---->
                </div>

            </div>
        </div>

        <div class="clearfix"> </div>


    </div>
@endsection


