
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
    {{--<link href="https://datatables.yajrabox.com/css/datatables.bootstrap.css" rel="stylesheet">--}}

            <!----->
    <!--skycons-icons-->
    <script src="js/skycons.js"></script>
    <link href="css/select2.min.css" rel="stylesheet" />
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
                    <span>Purchase Order History</span>
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

                                    <div class="col-md-4 form-group2 group-mail">
                                        <label class="control-label">Status</label>
                                        <select name="status" id="status">
                                            <option value="">Select</option>
                                            <option value="Not Delivered">Not Delivered</option>
                                            <option value="Delivered">Delivered</option>

                                        </select>
                                    </div>

                                    <div class="col-md-3 form-group1">
                                        <label class="control-label">Created Date</label>
                                        <input type="date" name="fromdate" required="">
                                    </div>
                                    <div class="col-md-3 form-group1">
                                        <label class="control-label">Created Date</label>
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
                    <table class="table table-bordered " id="inventoryonhandwarehouse-table">
                        <thead>
                        <tr>

                            <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="">Date </a></th>
                            <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="">Purchase Order #</a></th>
                            <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="">Product</a></th>
                            <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="">Vendor</a></th>

                            <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="">Status</a></th>
                            <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="">Expected Date</a></th>
                            <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="">Quantity Ordered</a></th>
                            <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="">Quantity Received</a></th>
                            <th style="background-color: white;color: black"> <a href="#" style="color:black;text-decoration-line: underline;" data-toggle="tooltip" data-placement="top" title="">Amount(GHC)</a></th>



                        </tr>
                        </thead>
                    </table>





                    <div class="col-md-3 form-group">
                        <a href="" id="purchaseorderhistorypdf" class="btn btn-default">Download PDF</a>
                        <a href="" id="purchaseorderhistoryexcel" class="btn btn-default">Download CSV</a>

                    </div>


                    <div class="clearfix"> </div>



                </div>
                <div class="clearfix"> </div>
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

<script src="js/select2.min.js"></script>
<script>
    var status;
    var fromdate;
    var todate;

    $("#status,#productdropdownvalue,#purchaseorderdropdown").select2({
        theme: "classic",
        width: 'resolve' // need to override the changed default
    });


    var table =  $('#inventoryonhandwarehouse-table').DataTable({
        dom: "<'row'<'col-xs-12'<'col-xs-6'l><'col-xs-6'p>>r>"+
        "<'row'<'col-xs-12't>>"+
        "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
        processing: true,
        serverSide: true,
        ajax: {
            url: '{!! route('allpurchaseorderhistory') !!}',
            data: function (d) {
                d.status = $('#status').val();
                d.fromdate = $('input[name=fromdate]').val();
                d.todate = $('input[name=todate]').val();
            }
        },
        columns: [

            {data: 'purchaseorderdate', name: 'purchaseorderdate'},
            {data: 'purchaseordernumber', name: 'purchaseordernumber'},
            {data: 'product', name: 'product'},
            {data: 'vendor', name: 'vendor'},
            {data: 'status', name: 'status'},
            {data: 'expecteddeliverydate', name: 'expecteddeliverydate'},
            {data: 'quantityordered', name: 'quantityordered'},
            {data: 'quantityreceived', name: 'quantityreceived'},
            {data: 'amount', name: 'amount'},

        ]
    });

    $('#search-form').on('submit', function(e) {
        table.draw();
        e.preventDefault();
        status = $('#status').val();
        fromdate = $('input[name=fromdate]').val();
        todate = $('input[name=todate]').val();

    });



    $('#purchaseorderhistorypdf').on('click', function(e) {

        e.preventDefault();

        status = $('#status').val();
        fromdate = $('input[name=fromdate]').val();
        todate = $('input[name=todate]').val();

        if(status === ''){
            status = 'all';
            fromdate = 'all';
            todate = 'all';
        }

        var url='purchaseorderhistorypdf/'+ status + '/' + fromdate + '/' + todate ;

        document.location.href = url;

    });
    $('#purchaseorderhistoryexcel').on('click', function(e) {

        e.preventDefault();
        status = $('#status').val();
        fromdate = $('input[name=fromdate]').val();
        todate = $('input[name=todate]').val();

        if(status === ''){

            status = 'all';
            fromdate = 'all';
            todate = 'all';
        }
        var url='purchaseorderhistoryexcel/'+ status + '/' + fromdate + '/' + todate;

        document.location.href = url;

    });
</script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>
</html>

