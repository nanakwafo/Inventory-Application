
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
    @include('partials.navbar')
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">

            <!--banner-->
            <div class="banner">

                <h2>
                    <a href="dashboard">Home</a>
                    <i class="fa fa-angle-right"></i>
                    <span>Purchase Arrival</span>
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

                            <form method="post" action="savepurchase">
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
                                    {{--<div class="col-md-12 form-group1">--}}
                                        {{--<label class="control-label">Barcode</label>--}}
                                        {{--<input type="text" name="barcode" required="">--}}
                                    {{--</div>--}}
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
                            <form method="post" action="updatepurchase">
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
                            <form action="deletepurchase" method="post">
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
            @include('partials.footer')
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

