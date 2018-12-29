
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
                    <span>Order</span>
                </h2>
            </div>
            <!--//banner-->
            <!--content-->

            <div class="content-top">

                <form action="saveorder" method="post">
                    {{csrf_field()}}
                    <div class="col-md-12 ">
                        @include('partials.messages')

                        <div class="validation-system">

                            <div class="validation-form">
                                <!---->


                                <div class="vali-form">
                                    <div class="col-md-4 form-group1">
                                        <label class="control-label">Order Number</label>
                                        <input type="text" name="ordernumber" required="" readonly value="{{\App\Helpers\AppHelper::get_ordernumber()}}" id="ordernumber">
                                    </div>
                                    <div class="col-md-4 form-group1">
                                        <label class="control-label">Order Date</label>
                                        <input type="date" name="orderdate" required="" id="orderdate">
                                    </div>
                                    <div class="col-md-4 form-group2 group-mail">
                                        <label class="control-label">Customer</label>
                                        <select id="customer" name="customer" class="customer">
                                            <option value="">Select</option>
                                            @foreach(App\Customer::all() as $s)
                                                <option value="{{$s->id}}">{{$s->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="clearfix"> </div>
                                    <input type="hidden" id="number_of_items" name="number_of_items" value="0" />
                                    <table class="table table-hover table-inverse">
                                        <span id="attention"></span>
                                        <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Store</th>
                                            <th>Rate </th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th> <button type="button" class="btn btn-default " id="addnew" ><i class="fa fa-plus-circle" aria-hidden="true"></i></button></th>
                                        </tr>
                                        </thead>
                                        <tbody id="data"></tbody>

                                    </table>
                                    <div class="clearfix"> </div>
                                </div>




                            </div>

                        </div>
                    </div>



                <div class="col-md-12 ">

                    <div class="validation-system">

                        <div class="validation-form">
                            <!---->


                                <div class="vali-form">
                                    <div class="col-md-6 form-group1">
                                        <label class="control-label">Sub Amount:</label>
                                        <input type="text" id="subamount" name="subamount"  readonly>
                                    </div>
                                    <div class="col-md-6 form-group1">
                                        <label class="control-label">VAT(13%):</label>
                                        <input type="text" id="vat" name="vat" readonly>
                                    </div>
                                    <div class="col-md-6 form-group1">
                                        <label class="control-label">Total Amount:</label>
                                        <input type="text" id="totalamount" name="totalamount" readonly>
                                    </div>
                                    <div class="col-md-6 form-group1">
                                        <label class="control-label">Discount:</label>
                                        <input type="text" id="discount" name="discount" required="">
                                    </div>
                                    <div class="col-md-6 form-group1">
                                        <label class="control-label">Grand Total:</label>
                                        <input type="text" id="grandtotal" name="grandtotal" required="">
                                    </div>
                                    <div class="col-md-6 form-group1">
                                        <label class="control-label">Paid Amount:</label>
                                        <input type="text" id="paidamount" name="paidamount" required="">
                                    </div>
                                    <div class="col-md-6 form-group1">
                                        <label class="control-label">Due Amount:</label>
                                        <input type="text" id="dueamount" name="dueamount" required="">
                                    </div>
                                    <div class="col-md-6 form-group2 group-mail">
                                        <label class="control-label">Payment Type:</label>
                                        <select id="paymenttype" name="paymenttype">
                                            <option value="">Select</option>
                                            <option value="cash">Cash</option>
                                            <option value="cheque">Cheque</option>
                                            <option value="credit card">Credit Card</option>

                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group2 group-mail">
                                        <label class="control-label">Payment Status:</label>
                                        <select id="paymentstatus" name="paymentstatus">
                                            <option value="">Select</option>
                                            <option value="advance_payment">Advance Payment</option>
                                            <option value="full_payment">Full Payment</option>
                                            <option value="no_payment">No Payment</option>

                                        </select>
                                    </div>

                                    <div class="clearfix"> </div>
                                </div>


                                <div class="col-md-12 form-group">
                                    <button type="submit" class="btn btn-default">Submit</button>
                                    <button type="reset" class="btn btn-default">Reset</button>

                                </div>
                                <div class="clearfix"> </div>

                            <!---->
                        </div>

                    </div>
                </div>

                </form>

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
<script type="text/javascript">
    $(".customer").select2({
        theme: "classic",
        width: 'resolve' // need to override the changed default
    });


    $(document).ready(function() {

        var currentItem = 0;
        var product=null;
        var store=null;

       $.ajax({
                type:"GET",
                url:"{{url('productselectbox')}}",
                success: function(data) {
                    product=data;

                }
            });
        $.ajax({
                type:"GET",
                url:"{{url('storeselectbox')}}",
                success: function(data) {
                    store=data;

                }
            });


        $('#addnew').click(function(){

            currentItem =currentItem+1;
            $('#number_of_items').val(currentItem);

            var strToAdd='<tr class="item">' +
                    '<td><div class="form-group"><select name="product[]" class="form-control product" onchange="getval(this);"  >'+product+'</select> </div></td>' +
                    '<td><div class="form-group"><select name="store[]" class="form-control store" onchange="getval2(this);"  >'+store+'</select> </div></td>' +
                    '<td><div class="form-group"><input name="rate[]" class="form-control" type="text" readonly /> </div> </td> ' +
                    '<td><div class="form-group"> <input name="quantity[]" class="form-control" onkeyup="getval3(this);"  type="text" /> </div> </td> ' +
                    '<td><div class="form-group"> <input name="total[]" class="form-control total"  type="text" readonly /> </div> </td>' +
                    '<td><button type="button" class="btn btn-default remove" name="remove" ><i class="fa fa-minus-circle" aria-hidden="true"></i></button> </td>'+
                    ' </tr>';
            $('#data').append(strToAdd);
             $('.product').select2();
             $('.store').select2();

        });
        $(document).on('click','.remove',function () {
            $(this).closest('tr').remove();
        })




    })

</script>
<script>

    function getval(sel)
    {
        var  product_id=sel.value;

        var row = $(sel).closest("tr").index();
        var col = 1;
        var store_id = $('#data').find("tr").eq(row).find("td").eq(col).find("select").val();
        var ratecol=2;

        $.ajax({
            type:"GET",
            url:"{{url('getproductrate')}}/"+ product_id +"/"+ store_id,
            success: function(data) {

              var x=data.split('|');

               $('#data').find("tr").eq(row).find("td").eq(ratecol).find("input[type='text']").val(x[0]);
                $('#attention').html(' <div class="alert alert-info" role="alert"> ' +
                        '<strong>Attention!</strong>quantity left is ' + x[1] +
                        '</div>');
            }
        });
    }
    function getval2(sel)
    {
        var  store_id=sel.value;

        var row = $(sel).closest("tr").index();
        var col = 0;
        var product_id = $('#data').find("tr").eq(row).find("td").eq(col).find("select").val();
        var ratecol=2;

        $.ajax({
            type:"GET",
            url:"{{url('getproductrate')}}/"+ product_id +"/"+ store_id,
            success: function(data) {

                var x=data.split('|');
                $('#data').find("tr").eq(row).find("td").eq(ratecol).find("input[type='text']").val(x[0]);
                $('#attention').html(' <div class="alert alert-info" role="alert"> ' +
                        '<strong>Attention!</strong>quantity left is ' + x[1] +
                        '</div>');
            }
        });
    }
    calc_subamount();
    function getval3(sel)
    {
        var row = $(sel).closest("tr").index();
        var col = 2;
        var rate =$('#data').find("tr").eq(row).find("td").eq(col).find("input[type='text']").val();
        var  quantity =sel.value;
        var rowtotal= rate * quantity;

        $('#data').find("tr").eq(row).find("td").eq(4).find("input[type='text']").val(rowtotal);

        calc_subamount();

    }
    function calc_subamount() {

        var sum = 0;
        var vat=13;//13%
        $(".total").each(function(){
            sum += parseFloat($(this).val());
        });
      $('#subamount').val(sum);
      $('#vat').val((13/100)*sum);
      $('#totalamount').val(((13/100)*sum) + sum );



    }
    $(document).on('keyup','#discount',function(e) {
        var discount = this.value;
        $('#grandtotal').val($('#totalamount').val() - discount);
    });
    $(document).on('keyup','#paidamount',function(e) {
        var paidamount = this.value;
        $('#dueamount').val($('#grandtotal').val() - paidamount);
    });
</script>


</body>
</html>

