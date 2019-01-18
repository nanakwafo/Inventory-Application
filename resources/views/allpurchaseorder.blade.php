
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

    @include('partials.navbar')
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">

            <!--banner-->
            <div class="banner">

                <h2>
                    <a href="dashboard">Home</a>
                    <i class="fa fa-angle-right"></i>
                    <span>All Purchase Orders</span>
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
                            <th style="background-color: white;color: black">Action</th>
                            <th style="background-color: white;color: black">Action</th>
                            <th style="background-color: white;color: black">Action</th>
                            <th style="background-color: white;color: black">Action</th>
                            <th style="background-color: white;color: black">Action</th>
                            <th style="background-color: white;color: black">Action</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <td id="non_searchable"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
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
            @include('partials.footer')
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
    <div class="label label-info"> purchaseorder#-{{purchaseordernumber}}  </div>
    <table class="table details-table" id="purchaseorders#-{{purchaseordernumber}}">
        <thead>
        <tr>

            <th>Purchase Order Number</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Rate</th>
            <th>Amount</th>

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
        ajax: '{!! route('allpurchaseorders') !!}',
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
            { data: 'purchaseordernumber', name: 'purchaseordernumber' },
            { data: 'vendor', name: 'vendor' },
            { data: 'expecteddeliverydate', name: 'expecteddeliverydate' },
            { data: 'subamount', name: 'subamount' },
            { data: 'vat', name: 'vat' },
            { data: 'subtotal', name: 'subtotal' },
            { data: 'discount', name: 'discount' },
            { data: 'grandtotal', name: 'grandtotal' },
            { data: 'payamount', name: 'payamount' },
            { data: 'dueamount', name: 'dueamount' },
            { data: 'paymenttype', name: 'paymenttype' },
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
        var tableId = 'purchaseorders-' + row.data().purchaseordernumber;

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

                { data: 'purchaseordernumber', name: 'purchaseordernumber' },
                { data: 'product', name: 'product'},
                { data: 'quantity', name: 'quantity'},
                { data: 'rate', name: 'rate'},
                { data: 'amount', name: 'amount'},

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

