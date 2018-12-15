
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
                                <li><a href="product" class=" hvr-bounce-to-right"><i class="fa fa-product-hunt nav_icon"></i> Product </a></li>
                                <li><a href="user" class=" hvr-bounce-to-right"><i class="fa fa-user nav_icon"></i>User</a></li>


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
                    <span>Manage Orders</span>
                </h2>
            </div>
            <!--//banner-->
            <!--content-->
            <div class="content-top">
                @include('partials.messages')
                <div class="col-md-12 ">
                    <table class="table table-bordered " id="users-table">
                        <thead>
                        <tr>
                            <th style="background-color: white;color: black"></th>
                            <th style="background-color: white;color: black">No</th>
                            <th style="background-color: white;color: black">Order Date</th>
                            <th style="background-color: white;color: black">Order Number</th>
                            <th style="background-color: white;color: black">Customer</th>
                            <th style="background-color: white;color: black">Customer contact</th>
                            <th style="background-color: white;color: black">Total Order Item</th>
                            <th style="background-color: white;color: black">Payment Mode</th>
                            <th style="background-color: white;color: black">Action</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <td id="non_searchable"></td>
                            <td id="non_searchable"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td id="non_searchable"></td>


                        </tr>
                        </tfoot>
                    </table>

                </div>
                <div class="clearfix"> </div>

                <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <center><h4 class="modal-title">Remove</h4></center>
                            </div>
                            <form action="deletepaymentorder" method="post">
                                {{csrf_field()}}
                                <input type="hidden" id="idDelete" name="idDelete"/>
                                <div class="modal-body">
                                  <h5>Would you like to delete <label ><span id="ordernameDelete"></span></label> Order</h5>
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
                <div class="modal fade" id="paymentmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <center><h4 class="modal-title">Edit Payment Order  Details</h4></center>
                            </div>
                            <form method="post" action="updatepaymentorder">
                                {{csrf_field()}}
                                <div class="modal-body">
                                    <div class="validation-system">



                                        <input id="idEdit" name="idEdit" type="hidden"/>

                                        <div class="vali-form">
                                            <div class="col-md-12 form-group1">
                                                <label class="control-label">Due Amount</label>
                                                <input type="text" id="dueamountEdit" name="dueamountEdit" required="" readonly>
                                            </div>
                                             <div class="col-md-12 form-group1">
                                                <label class="control-label">Pay Amount</label>
                                                <input type="text" id="payamountEdit" name="payamountEdit" required="">
                                            </div>
                                            <div class="col-md-12 form-group2 group-mail">
                                                <label class="control-label">Payment Type</label>
                                                <select id="paymenttypeEdit" name="paymenttypeEdit">
                                                    <option value="">Select</option>
                                                    <option value="cash">Cash</option>
                                                    <option value="cheque">Cheque</option>
                                                    <option value="credit card">Credit Card</option>

                                                </select>
                                            </div>

                                            <div class="col-md-12 form-group2 group-mail">
                                                <label class="control-label">Payment Status</label>
                                                <select id="paymentstatusEdit" name="paymentstatusEdit">
                                                    <option value="">Select</option>
                                                    <option value="advance_payment">Advance Payment</option>
                                                    <option value="full_payment">Full Payment</option>
                                                    <option value="no_payment">No Payment</option>

                                                </select>
                                            </div>
                                            <div class="clearfix"> </div>
                                        </div>



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
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<script src="js/bootstrap.min.js"> </script>
<!--//scrolling js-->
<script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
<script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
<script src="https://datatables.yajrabox.com/js/handlebars.js"></script>


<script id="details-template" type="text/x-handlebars-template">
    @verbatim
    <div class="label label-info"> order-{{ordernumber}}  </div>
    <table class="table details-table" id="orders-{{ordernumber}}">
        <thead>
        <tr>

            <th>Order Number</th>
            <th>Store</th>
            <th>Order Date</th>
            <th>Customer</th>
            <th>Product</th>
            <th>Rate</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
        </thead>
    </table>
    @endverbatim
</script>
<script>

        var template = Handlebars.compile($("#details-template").html());
        var table = $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('allorders') !!}',
            columns: [
                {
                    "className":     'details-control',
                    "orderable":      false,
                    "searchable":     false,
                    "data":           null,
                    "defaultContent": ''
                },
                { data: 'id', name: 'id', orderable: false, searchable: false},
                { data: 'orderdate', name: 'orderdate' },
                { data: 'ordernumber', name: 'ordernumber' },
                { data: 'customer', name: 'customer' },
                { data: 'customercontact', name: 'customercontact' },
                { data: 'totalorderitem', name: 'totalorderitem' },
                { data: 'paymentstatus', name: 'paymentstatus' },
                { data: 'action', name: 'action' },
            ],
            order: [[1, 'asc']],
            initComplete: function () {
                this.api().columns().every(function () {
                    var column = this;

                    //example for removing search field
                    if (column.footer().id !== 'non_searchable') {
                        var input = document.createElement("input");
                        $(input).appendTo($(column.footer()).empty())
                                .keyup(function () {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                    }
                });
            }
        });

    $('#users-table tbody').on('click', 'td.details-control', function () {

        var tr = $(this).closest('tr');
        var row = table.row(tr);
        var tableId = 'orders-' + row.data().ordernumber;

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            row.child(template(row.data())).show();
            initTable(tableId, row.data());
            console.log(row.data());
            tr.addClass('shown');
            tr.next().find('td').addClass('no-padding bg-gray');
        }
    });
    function initTable(tableId, data) {
        $('#' + tableId).DataTable({
            processing: true,
            serverSide: true,
            ajax: data.details_url,
            columns: [

                { data: 'ordernumber', name: 'ordernumber' },
                { data: 'store', name: 'store'},
                { data: 'orderdate', name: 'orderdate'},
                { data: 'customer', name: 'customer'},
                { data: 'product', name: 'product'},
                { data: 'rate', name: 'rate'},
                { data: 'quantity', name: 'quantity'},
                { data: 'total', name: 'total'},
            ]
        })
    }
</script>
<script>
    $(document).on('click','.deletebtn',function() {
        $('#idDelete').val($(this).data('ordernumber'));
        $('#ordernameDelete').html($(this).data('ordernumber'));
    });
    $(document).on('click','.paymentbtn',function() {

        $('#idEdit').val($(this).data('ordernumber'));
        $('#payamountEdit').val($(this).data('paidamount'));
        $('#dueamountEdit').val($(this).data('dueamount'));
        $('#paymenttypeEdit').val($(this).data('paymenttype'));
        $('#paymentstatusEdit').val($(this).data('paymentstatus'));


    });
</script>
</body>
</html>

