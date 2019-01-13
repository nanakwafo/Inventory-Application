
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <title>ESYN</title>
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
    {{--<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="css/datatable/1.10.7/jquery.dataTables.min.css">
    <link href="https://datatables.yajrabox.com/css/datatables.bootstrap.css" rel="stylesheet">
    <!----->
    <!--skycons-icons-->
    <script src="js/skycons.js"></script>
    <!--//skycons-icons-->
</head>
<body>
<div id="wrapper">

    @include('partials.navbar')
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">

            <!--banner-->
            <div class="banner">

                <h2>
                    <a href="dashboard">Home</a>
                    <i class="fa fa-angle-right"></i>
                    <span>User</span>
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

                            <form action="adduser" method="post">
                                {{csrf_field()}}
                                <div class="vali-form">
                                    <div class="col-md-6 form-group1">
                                        <label class="control-label">First Name</label>
                                        <input type="text" name="first_name"  required="">
                                    </div>
                                    <div class="col-md-6 form-group1">
                                        <label class="control-label">Last Name</label>
                                        <input type="text" name="last_name"  required="">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="vali-form">
                                    <div class="col-md-6 form-group1">
                                        <label class="control-label">Email</label>
                                        <input type="text" name="email"  required="">
                                    </div>
                                    <div class="col-md-6 form-group1">
                                        <label class="control-label">Phone Number</label>
                                        <input type="text" name="phonenumber" required="">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>

                                <div class="vali-form">
                                    <div class="col-md-6 form-group1">
                                        <label class="control-label">Username</label>
                                        <input type="text" name="username" required="">
                                    </div>
                                    <div class="col-md-6 form-group1">
                                        <label class="control-label">Password</label>
                                        <input type="text" name="password"  required="">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="col-md-12 form-group2 group-mail">
                                    <label class="control-label">Sex</label>
                                    <select name="sex">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-12 form-group2 group-mail">
                                    <label class="control-label">Role</label>
                                    <select name="role">
                                        <option value="">Select</option>
                                        @foreach(\Cartalyst\Sentinel\Roles\EloquentRole::all() as $s)
                                        <option value="{{$s->name}}">{{$s->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="clearfix"> </div>

                                <div class="col-md-12 form-group">
                                    <button type="submit" class="btn btn-default">Submit</button>
                                    <button type="reset" class="btn btn-default">Reset</button>
                                </div>
                                <div class="clearfix"> </div>
                            </form>

                            <!---->
                        </div>

                    </div>
                </div>
                <div class="col-md-8 ">
                    <table class="table table-bordered " id="users-table">
                        <thead>
                        <tr>
                            <th style="background-color: white;color: black">No.</th>
                            <th style="background-color: white;color: black">First Name</th>
                            <th style="background-color: white;color: black">Last Name</th>
                            <th style="background-color: white;color: black;">Email</th>
                            <th style="background-color: white;color: black;">Phone number</th>
                            <th style="background-color: white;color: black;">Username</th>
                            <th style="background-color: white;color: black;">Sex</th>
                            <th style="background-color: white;color: black;">Role</th>
                            <th style="background-color: white;color: black;">Action</th>
                        </tr>
                        </thead>
                    </table>

                </div>
                <div class="clearfix"> </div>
                <div id="editmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <form action="{{route('edituser')}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Edit</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" id="idEdit" name="idEdit" />
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="field-1" class="control-label">Firstname</label>
                                                <input type="text" class="form-control"  id="firstnameEdit" name="firstnameEdit">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="field-1" class="control-label">Lastname</label>
                                                <input type="text" class="form-control"  id="lastnameEdit" name="lastnameEdit">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="field-1" class="control-label">Username</label>
                                                <input type="text" class="form-control" id="usernameEdit"  name="usernameEdit">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="field-1" class="control-label">Email</label>
                                                <input type="text" class="form-control" id="emailEdit"  name="emailEdit">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="field-1" class="control-label">Sex</label>
                                                <select name="sexEdit" class="form-control" id="sexEdit" >
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>

                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="field-1" class="control-label">Phone number</label>
                                                <input type="text" class="form-control" id="phonenumberEdit"  name="phonenumberEdit">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group2 group-mail">
                                                <label for="field-1" class="control-label">Role</label>
                                                <select name="roleEdit" id="roleEdit">
                                                    <option value="">Select</option>
                                                    @foreach(\Cartalyst\Sentinel\Roles\EloquentRole::all() as $s)
                                                        <option value="{{$s->id}}">{{$s->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="field-1" class="control-label">Password</label>
                                                <input type="password" class="form-control"  id="passwordEdit"  name="passwordEdit" required>
                                            </div>
                                        </div>


                                    </div>



                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    <button  type="submit" class="btn  waves-effect waves-light">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal -->
                <div id="deletemodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <form action="{{route('deleteuser')}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Delete</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="field-1" class="control-label">Are you sure you want to delete <span id="name_delete"></span>?</label>
                                                <input type="hidden" class="form-control" id="idDelete" placeholder="John" name="idDelete" >
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    <button  type="submit" class="btn  waves-effect waves-light">Delete</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal -->
                <div id="forgotpasswordModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->

                        <div class="modal-content">


                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Forgot Password</h4>
                            </div>
                            <div class="modal-body">

                                <input type="hidden" id="useridedit"  name="userid" class="form-control" >


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email:</label>
                                    <input type="email" id="useremail" name="email"class="form-control"  >
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
                                <a type="submit" id="add-row" class="sendcode btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Send Code</a>
                            </div>




                        </div>
                    </div>
                </div>
            </div>
            <!---->


            <!---->
            @include('partials.footer')
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!---->
<!--scrolling js-->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!--//scrolling js-->
<script src="js/bootstrap.min.js"> </script>

<script src="js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
{{--<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>--}}
<script>
    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('allusers') !!}',
            columns: [
                { data: 'rownum', name: 'rownum', orderable: false, searchable: false},
                { data: 'first_name', name: 'first_name' },
                { data: 'last_name', name: 'last_name' },
                { data: 'email', name: 'email' },
                { data: 'phonenumber', name: 'phonenumber' },
                { data: 'username', name: 'username' },
                { data: 'sex', name: 'sex' },
                { data: 'priviledge', name: 'priviledge' },
                { data: 'action', name: 'action', orderable: false, searchable: false}

            ]
        });
    });
</script>
<script>
    $(document).on('click','.editmodal',function() {
//        alert($(this).data('priviledge'));
        $('#idEdit').val($(this).data('id'));
        $('#firstnameEdit').val($(this).data('firstname'));
        $('#lastnameEdit').val($(this).data('lastname'));
        $('#usernameEdit').val($(this).data('username'));
        $('#sexEdit').val($(this).data('sex')).change();
        $('#phonenumberEdit').val($(this).data('phonenumber'));
        $('#emailEdit').val($(this).data('email'));
        $('#roleEdit').val($(this).data('priviledge')).change();



    });
</script>
<script>
    $(document).on('click','.deletemodal',function() {
//        alert("Hey");

        $('#idDelete').val($(this).data('id'));


        $("#name_delete").html($(this).data('firstname')+""+$(this).data('lastname'));

    });
</script>
</body>
</html>

