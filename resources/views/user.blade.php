
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <title>best inventory</title>
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

    <nav class="navbar-default navbar-static-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h1> <a class="navbar-brand" href="dashboard">EYSN</a></h1>
        </div>
        <div class=" border-bottom">
            <div class="full-left">
                <section class="full-top">
                    <button id="toggle"><i class="fa fa-arrows-alt"></i></button>
                </section>
                <form class=" navbar-left-right">
                    <input type="text"  value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
                    <input type="submit" value="" class="fa fa-search">
                </form>
                <div class="clearfix"> </div>
            </div>


            <!-- Brand and toggle get grouped for better mobile display -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="drop-men" >
                <ul class=" nav_1">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret">
                                @if(Sentinel::check())
                                    {{Sentinel::getUser()->first_name ." ".Sentinel::getUser()->last_name}}
                                @endif
                                <i class="caret"></i></span>

                            @if(!empty(\App\Helpers\AppHelper::profileimage()->logo))
                                <img src="images/{{\App\Helpers\AppHelper::profileimage()->logo}}" width="70" height="60">
                            @else
                                <img src="images/wo.jpg" width="70" height="60">
                            @endif
                        </a>
                        <ul class="dropdown-menu " role="menu">
                            <li><a href="profile"><i class="fa fa-user"></i>Edit Profile</a></li>
                            {{--<li><a href="task"><i class="fa fa-clipboard"></i>Tasks</a></li>--}}
                            <li>
                                &nbsp;
                                <form action="{{route('logout')}}" method="post" id="logout-form">
                                    {{csrf_field()}}
                                    <a href="#" onclick="document.getElementById('logout-form').submit()"><i class="fa fa-clipboard"></i>Logout</a>
                                </form>
                                &nbsp;
                                &nbsp;
                            </li>



                        </ul>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
            <div class="clearfix">

            </div>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="dashboard" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboards</span> </a>
                        </li>

                        <li>
                            <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-cogs nav_icon"></i> <span class="nav-label">Master Entry</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="grntype" class=" hvr-bounce-to-right"> <i class="fa fa-angle-double-down nav_icon"></i>Grn Type</a></li>
                                <li><a href="productcode" class=" hvr-bounce-to-right"> <i class="fa fa-dot-circle-o nav_icon"></i>Product Codes</a></li>

                                <li><a href="productcategory" class=" hvr-bounce-to-right"> <i class="fa fa-shopping-basket nav_icon"></i>Product Category</a></li>

                                <li><a href="customercategory" class=" hvr-bounce-to-right"><i class="fa fa-users nav_icon"></i>Customer Category</a></li>
                                <li><a href="customer" class=" hvr-bounce-to-right"><i class="fa fa-user nav_icon"></i>Customer</a></li>
                                <li><a href="supplier" class=" hvr-bounce-to-right"><i class="fa fa-paper-plane nav_icon"></i> Supplier </a></li>
                                <li><a href="warehouse" class=" hvr-bounce-to-right"><i class="fa fa-home nav_icon"></i> Warehouse/Store </a></li>
                              <li><a href="user" class=" hvr-bounce-to-right"><i class="fa fa-user nav_icon"></i>User</a></li>


                            </ul>
                        </li>
                        <li>
                            <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-plus-circle nav_icon"></i> <span class="nav-label">Product</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="product" class=" hvr-bounce-to-right"><i class="fa fa-product-hunt nav_icon"></i> New Product </a></li>


                            </ul>
                        </li>
                        <li>
                            <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-plus-circle nav_icon"></i> <span class="nav-label">Inventory</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="goodreceive" class=" hvr-bounce-to-right"> <i class="fa fa-credit-card nav_icon"></i>Goods Receive</a></li>
                                <li><a href="goodissue" class=" hvr-bounce-to-right"><i class="fa fa-credit-card nav_icon"></i>Goods Issue</a></li>
                                <li><a href="x" class=" hvr-bounce-to-right"><i class="fa fa-credit-card nav_icon"></i>Warehouse Items</a></li>
                                <li><a href="storeitems" class=" hvr-bounce-to-right"><i class="fa fa-credit-card nav_icon"></i>Store Items</a></li>


                            </ul>
                        </li>

                        <li>
                            <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-credit-card nav_icon"></i> <span class="nav-label">Sales</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="order" class=" hvr-bounce-to-right"> <i class="fa fa-shopping-cart nav_icon"></i>Add Order</a></li>
                                <li><a href="manageorder" class=" hvr-bounce-to-right"><i class="fa fa-pencil-square-o nav_icon"></i>Manage Order</a></li>
                                <li><a href="waste" class=" hvr-bounce-to-right"><i class="fa fa-trash nav_icon"></i>Manage Waste</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-transgender nav_icon"></i> <span class="nav-label">Invoices</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="invoice" class=" hvr-bounce-to-right"> <i class="fa fa-plus nav_icon"></i>New Invoice</a></li>
                                <li><a href="allinvoice" class=" hvr-bounce-to-right"><i class="fa fa-bars nav_icon"></i>All Invoices</a></li>

                            </ul>
                        </li>

                        <li>
                            <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-list nav_icon"></i> <span class="nav-label">Reports</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="inventoryonhand" class=" hvr-bounce-to-right"> <i class="fa fa-list nav_icon"></i>Inventory On Hand </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-certificate nav_icon"></i> <span class="nav-label">Promotion</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="sms" class=" hvr-bounce-to-right"> <i class="fa fa-comment nav_icon"></i>SMS</a></li>
                                <li><a href="email" class=" hvr-bounce-to-right"> <i class="fa fa-envelope-o nav_icon"></i>Email</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
    </nav>

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
                                        <option value="Admin">Admin</option>
                                        <option value="Rep">Rep</option>
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
                            <th style="background-color: white;color: black">No</th>
                            <th style="background-color: white;color: black">First Name</th>
                            <th style="background-color: white;color: black">Last Name</th>
                            <th style="background-color: white;color: black">Email</th>
                            <th style="background-color: white;color: black">Phone number</th>
                            <th style="background-color: white;color: black;width: 20%">Username</th>
                            <th style="background-color: white;color: black;width: 20%">Sex</th>
                            <th style="background-color: white;color: black;width: 20%">Action</th>
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
                                            <div class="form-group">
                                                <label for="field-1" class="control-label">Role</label>
                                                <select name="roleEdit" class="form-control" id="roleEdit" >
                                                    <option value="Admin">Admin</option>
                                                    <option value="Rep">Rep</option>

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
            <div class="copy">
                <p> &copy; 2018 best inventory. All Rights Reserved | Design by <a href="http://nanakwafomensah.info/" target="_blank">onetech</a> </p>
            </div>
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

