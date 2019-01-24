
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <title>EYSN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/font-awesome.css" rel="stylesheet">
    <script src="js/jquery.min.js"> </script>
    <!-- Mainly scripts -->
    <script src="js/jquery.metisMenu.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <!-- Custom and plugin javascript -->
    <link href="css/custom.css" rel="stylesheet">
    <script src="js/custom.js"></script>
    <script src="js/screenfull.js"></script>
    <script>
        $(function () {
            $('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

            if (!screenfull.enabled) {
                return false;
            }



            $('#toggle').click(function () {
                screenfull.toggle($('#container')[0]);
            });



        });
    </script>

    {{--<link rel="stylesheet" href="css/datatable/1.10.7/jquery.dataTables.min.css">--}}
    {{--<link href="https://datatables.yajrabox.com/css/datatables.bootstrap.css" rel="stylesheet">--}}
    {{--<link href="https://datatables.yajrabox.com/css/datatables.bootstrap.css" rel="stylesheet">--}}
    <script src="js/skycons.js"></script>

</head>
<body>


    <!----->


    <div class="gray-bg dashbard-1">
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

            <!---->


            <!---->
            @include('partials.footer')
        </div>
        <div class="clearfix"> </div>
    </div>

<!---->
<!--scrolling js-->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<script src="js/bootstrap.min.js"> </script>
<!--//scrolling js-->
{{--<script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>--}}
{{--<script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>--}}
{{--<script src="https://datatables.yajrabox.com/js/handlebars.js"></script>--}}
<!-- Bootstrap JavaScript -->
{{--<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>--}}



    <script>
        function readURL(input){
            if(input.files && input.files[0]){
                var reader=new FileReader();

                reader.onload=function(e){
                    $('#preview_image').attr('src',e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).on('change','input[type="file"]',function(){
            readURL(this);

        })
    </script>
</body>
</html>

