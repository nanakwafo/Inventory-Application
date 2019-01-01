
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
    {{--<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="css/datatable/1.10.7/jquery.dataTables.min.css">
    <link href="https://datatables.yajrabox.com/css/datatables.bootstrap.css" rel="stylesheet">

    <!----->
    <!--skycons-icons-->
    <script src="js/skycons.js"></script>
    <link href="css/select2.min.css" rel="stylesheet" />
    <!--//skycons-icons-->
</head>
<body>
<div id="wrapper">

    <!----->
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
                    <span>Inventory On hand Report</span>
                </h2>
            </div>
            <!--//banner-->
            <!--content-->
            <div class="content-top">


                <div class="col-md-12">
                    <div class="validation-system">

                        <div class="validation-form">
                            <!---->

                            <form id="search-form">
                                {{csrf_field()}}
                                <div class="vali-form">
                                    <div class="col-md-3 form-group2 group-mail">
                                        <label class="control-label">Store</label>
                                        <select name="store" id="storedropdownvalue">
                                            <option value="">Select</option>
                                            @foreach(\App\Warehouse::where('purpose','store')->get() as $s)
                                                <option value="{{$s->id}}">{{$s->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 form-group2 group-mail">
                                        <label class="control-label">Product</label>
                                        <select name="product" id="productdropdownvalue">
                                            <option value="">Select</option>
                                            @foreach(\App\Product::select('productcode')->distinct('productcode')->get() as $s)
                                                <option value="{{$s->productcode}}">{{\App\Productcode::find($s->productcode)->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2 form-group1">
                                        <label class="control-label">From Date</label>
                                        <input type="date" name="fromdate" required="">
                                    </div>
                                    <div class="col-md-2 form-group1">
                                        <label class="control-label">To Date</label>
                                        <input type="date" name="todate" required="">
                                    </div>



                                    <div class="col-md-2 form-group">
                                        <button type="submit" class="btn btn-default">Search</button>

                                    </div>
                                </div>

                                <div class="clearfix"> </div>
                            </form>

                            <!---->
                        </div>

                    </div>
                    <table class="table table-bordered " id="inventoryonhand-table">
                        <thead>
                        <tr>
                            <th style="background-color: white;color: black">Date</th>
                            <th style="background-color: white;color: black">Product name</th>
                            <th style="background-color: white;color: black">Product code</th>
                            <th style="background-color: white;color: black">Store</th>
                            <th style="background-color: white;color: black">Supplier</th>
                            <th style="background-color: white;color: black">Product category</th>
                            <th style="background-color: white;color: black">Unit</th>
                            <th style="background-color: white;color: black">Cost(GHC)</th>
                            <th style="background-color: white;color: black">Retail price(GHC)</th>
                            <th style="background-color: white;color: black">Reorder limit</th>
                            <th style="background-color: white;color: black">Starting inventory</th>
                            <th style="background-color: white;color: black">Received</th>
                            <th style="background-color: white;color: black">Usage</th>
                            <th style="background-color: white;color: black">Onhand</th>
                            <th style="background-color: white;color: black">Variance</th>
                            <th style="background-color: white;color: black">Variance cost(GHC)</th>
                            <th style="background-color: white;color: black">Value on hand(GHC)</th>

                        </tr>
                        </thead>
                    </table>





                                    <div class="col-md-3 form-group">
                                        <a href="" id="inventoryonhandpdf" class="btn btn-default">Download PDF</a>
                                        <a href="" id="inventoryonhandexcel" class="btn btn-default">Download CSV</a>

                                    </div>


                                <div class="clearfix"> </div>



                </div>
                <div class="clearfix"> </div>
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

<script src="js/select2.min.js"></script>
<script>
    var store;
    var fromdate;
    var todate;
    var product;
    $("#storedropdownvalue,#productdropdownvalue").select2({
        theme: "classic",
        width: 'resolve' // need to override the changed default
    });


  var table =  $('#inventoryonhand-table').DataTable({
        dom: "<'row'<'col-xs-12'<'col-xs-6'l><'col-xs-6'p>>r>"+
        "<'row'<'col-xs-12't>>"+
        "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
        processing: true,
        serverSide: true,
        ajax: {
            url: '{!! route('allinventoryonhand') !!}',
            data: function (d) {
                d.store = $('#storedropdownvalue').val();
                d.product = $('#productdropdownvalue').val();
                d.fromdate = $('input[name=fromdate]').val();
                d.todate = $('input[name=todate]').val();
            }
        },
        columns: [
            {data: 'date', name: 'date'},
            {data: 'productname', name: 'productname'},
            {data: 'productcode', name: 'productcode'},
            {data: 'store', name: 'store'},
            {data: 'supplier', name: 'supplier'},
            {data: 'productcategory', name: 'productcategory'},
            {data: 'unit', name: 'unit'},
            {data: 'cost', name: 'cost'},
            {data: 'retailprice', name: 'retailprice'},
            {data: 'reorderlimit', name: 'reorderlimit'},
            {data: 'startinginventory', name: 'startinginventory'},
            {data: 'received', name: 'received'},
            {data: 'usage', name: 'usage'},
            {data: 'onhand', name: 'onhand'},
            {data: 'variance', name: 'variance'},
            {data: 'variancecost', name: 'variancecost'},
            {data: 'onhandvalue', name: 'onhandvalue'},

        ]
    });

    $('#search-form').on('submit', function(e) {
        table.draw();
        e.preventDefault();
        store = $('#storedropdownvalue').val();
        product = $('#productdropdownvalue').val();
        fromdate = $('input[name=fromdate]').val();
        todate = $('input[name=todate]').val();

    });

  $('#inventoryonhandpdf').on('click', function(e) {

      e.preventDefault();

         store = $('#storedropdownvalue').val();
         product = $('#productdropdownvalue').val();
         fromdate = $('input[name=fromdate]').val();
         todate = $('input[name=todate]').val();

          if(store === ''){
              store = 'all';
              product = 'all';
              fromdate = 'all';
              todate = 'all';
          }

         var url='inventoryonhandpdf/'+ store + '/' + fromdate + '/' + todate + '/' + product;

      document.location.href = url;

  });
  $('#inventoryonhandexcel').on('click', function(e) {

      e.preventDefault();
      store = $('#storedropdownvalue').val();
      product = $('#productdropdownvalue').val();
      fromdate = $('input[name=fromdate]').val();
      todate = $('input[name=todate]').val();

      if(store === ''){
          store = 'all';
          product = 'all';
          fromdate = 'all';
          todate = 'all';
      }
      var url='inventoryonhandexcel/'+ store + '/' + fromdate + '/' + todate + '/' + product;

     document.location.href = url;

  });
</script>

</body>
</html>

