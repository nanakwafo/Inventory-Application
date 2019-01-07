
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
    @include('partials.navbar')
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

