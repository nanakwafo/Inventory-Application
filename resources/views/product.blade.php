
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

    <link rel="stylesheet" href="css/datatable/1.10.7/jquery.dataTables.min.css">
    <link href="https://datatables.yajrabox.com/css/datatables.bootstrap.css" rel="stylesheet">
    <link href="https://datatables.yajrabox.com/css/datatables.bootstrap.css" rel="stylesheet">
    <script src="js/skycons.js"></script>
    <link href="css/select2.min.css" rel="stylesheet" />
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
                    <span>Product</span>
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

                            <form method="post" action="saveproduct">
                                {{csrf_field()}}
                                <div class="vali-form">
                                    <div class="col-md-12 form-group1">
                                        <label class="control-label">Receive date</label>
                                        <input type="date" name="datereceived" required="">
                                    </div>
                                    <div class="col-md-12 form-group2 group-mail">
                                        <label class="control-label">Product Category</label>
                                        <select name="productcategory_id" id="productcategory_id">
                                            <option value="">Select</option>
                                            @foreach(\App\Productcategory::all() as $s)
                                                <option value="{{$s->id}}">{{$s->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 form-group2 group-mail">
                                        <label class="control-label">Product</label>
                                        <select name="productcode" id="product">
                                            <option value="">Select</option>
                                            @foreach(\App\Productcode::all() as $s)
                                                <option value="{{$s->productcode}}">{{$s->name .'-'. $s->productcode}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12 form-group1">
                                        <label class="control-label">Unit</label>
                                        <input type="text" name="unit" required="">
                                    </div>
                                    <div class="col-md-12 form-group1">
                                        <label class="control-label">Unit Price</label>
                                        <input type="text" name="unitprice" required="">
                                    </div>
                                    <div class="col-md-12 form-group1">
                                        <label class="control-label">Quantity</label>
                                        <input type="text" name="quantity" required="">
                                    </div>

                                    <div class="col-md-12 form-group1">
                                        <label class="control-label">Pay amount(Production Cost)</label>
                                        <input type="text" name="payamount" required="">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="col-md-12 form-group2 group-mail">
                                    <label class="control-label">Supplier</label>
                                    <select name="supplier_id" id="supplier">
                                        <option value="">Select</option>
                                        @foreach(\App\Supplier::all() as $s)
                                        <option value="{{$s->id}}">{{$s->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 form-group1">
                                    <label class="control-label">Re order Limit</label>
                                    <input type="text" name="reorderlimit" required="">
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
                    <table class="table table-bordered " id="users-table">
                        <thead>
                        <tr>
                            <th style="background-color: white;color: black"></th>
                            <th style="background-color: white;color: black">No</th>
                            <th style="background-color: white;color: black">Product Code</th>
                            <th style="background-color: white;color: black">Product Name</th>
                            <th style="background-color: white;color: black">Date Received</th>

                            <th style="background-color: white;color: black">Unit price</th>
                            <th style="background-color: white;color: black">Qty</th>
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
                                <center><h4 class="modal-title">Edit Details</h4></center>
                            </div>
                            <form method="post" action="updateproduct">
                                {{csrf_field()}}
                            <div class="modal-body">
                                <div class="validation-system">



                                            <input id="idEdit" name="idEdit" type="hidden"/>

                                            <div class="vali-form">
                                                <div class="col-md-12 form-group1">
                                                    <label class="control-label">Receive date</label>
                                                    <input type="date" id="datereceivedEdit" name="datereceivedEdit" required="">
                                                </div>

                                                <div class="col-md-12 form-group2 group-mail">
                                                    <label class="control-label">Product Category</label>
                                                    <select id="productcategory_idEdit" name="productcategory_idEdit">
                                                        <option value="">Select</option>
                                                        @foreach(\App\Productcategory::all() as $s)
                                                            <option value="{{$s->id}}">{{$s->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-12  form-group2 group-mail">
                                                    <label class="control-label">Product </label>
                                                       <select id="productcodeEdit" name="productcodeEdit">
                                                        <option value="">Select</option>
                                                        @foreach(\App\Productcode::all() as $s)
                                                            <option value="{{$s->productcode}}">{{$s->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-12 form-group1">
                                                    <label class="control-label">Unit </label>
                                                    <input type="text" id="unitEdit" name="unitEdit" required="">
                                                </div>
                                                <div class="col-md-12 form-group1">
                                                    <label class="control-label">Unit Price</label>
                                                    <input type="text" name="unitpriceEdit" id="unitpriceEdit" required="">
                                                </div>
                                                <div class="col-md-12 form-group1">
                                                    <label class="control-label">Quantity</label>
                                                    <input type="text" id="quantityEdit" name="quantityEdit" required="">
                                                </div>

                                                <div class="col-md-12 form-group1">
                                                    <label class="control-label">Pay amount(Production Cost)</label>
                                                    <input type="text" id="payamountEdit" name="payamountEdit" required="">
                                                </div>
                                                <div class="clearfix"> </div>
                                            </div>
                                            <div class="col-md-12 form-group2 group-mail">
                                                <label class="control-label">Supplier</label>
                                                <select name="supplier_idEdit" id="supplier_idEdit">
                                                    <option value="">Select</option>
                                                    @foreach(\App\Supplier::all() as $s)
                                                        <option value="{{$s->id}}">{{$s->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    <div class="col-md-12 form-group1">
                                        <label class="control-label">Re order Limit</label>
                                        <input type="text" name="reorderlimitEdit" id="reorderlimitEdit" required="">
                                    </div>
                                            <div class="col-md-12 form-group1 ">
                                                <label class="control-label">Remark</label>
                                                <textarea  id="remarkEdit" name="remarkEdit" required=""></textarea>
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
                            <form action="deleteproduct" method="post">
                                {{csrf_field()}}
                            <div class="modal-body">

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
<script src="js/bootstrap.min.js"> </script>
<!--//scrolling js-->
<script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
<script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
<script src="https://datatables.yajrabox.com/js/handlebars.js"></script>
<!-- Bootstrap JavaScript -->
{{--<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>--}}

<script src="js/select2.min.js"></script>
    <script id="details-template" type="text/x-handlebars-template">
        @verbatim
        <table class="table">

            <tr>
                <td>Reorder limit:</td>
                <td>{{reorderlimit}}</td>
            </tr>
            <tr>
                <td>Remark:</td>
                <td>{{remark}}</td>
            </tr>
            <tr>
                <td>Supplier :</td>
                <td>{{supplier_id}}</td>
            </tr>

        </table>
        @endverbatim
    </script>

    <script>
        $("#productcategory_id,#product,#supplier").select2({
            theme: "classic",
            width: 'resolve' // need to override the changed default
        });

        var template = Handlebars.compile($("#details-template").html());
        var table = $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('allproduct') !!}',
            columns: [
                {
                    "className":      'details-control',
                    "orderable":      false,
                    "searchable":     false,
                    "data":           null,
                    "defaultContent": ''
                },
                { data: 'rownum', name: 'rownum', orderable: false, searchable: false},
                { data: 'productcode', name: 'productcode' },
                { data: 'productname', name: 'productname' },
                { data: 'datereceived', name: 'datereceived' },
                { data: 'unit', name: 'unit' },
                { data: 'quantity', name: 'quantity' },
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            order: [[1, 'asc']]
        });

        $('#users-table tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );

            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child( template(row.data()) ).show();
                tr.addClass('shown');
            }
        });

    </script>


<script>
    $(document).on('click','.editbtn',function(){
        $('#nameEdit').val($(this).data('name'));
        $('#datereceivedEdit').val($(this).data('datereceived'));
        $('#barcodeEdit').val($(this).data('barcode'));

        $('#productcodeEdit').val($(this).data('productcode'));
        $('#quantityEdit').val($(this).data('quantity'));
        $('#discountEdit').val($(this).data('discount'));
        $('#payamountEdit').val($(this).data('payamount'));
        $('#remarkEdit').val($(this).data('remark'));
        $('#unitEdit').val($(this).data('unit'));
        $('#unitpriceEdit').val($(this).data('unitprice'));
        $('#reorderlimitEdit').val($(this).data('reorderlimit'));
        $('#idEdit').val($(this).data('id'));
        $('#productcategory_idEdit').val($(this).data('productcategory_id')).select();
        $('#supplier_idEdit').val($(this).data('supplier_id')).select();


    });
</script>
<script>
    $(document).on('click','.deletebtn',function() {
        $('#idDelete').val($(this).data('id'));
        $("#nameDelete").html($(this).data('name'));

    });
</script>
</body>
</html>

