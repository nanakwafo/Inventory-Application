<!DOCTYPE HTML>
<html>
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css'/>
    <link href="css/style.css" rel='stylesheet' type='text/css'/>
    <link href="css/font-awesome.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.metisMenu.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>

    <link href="css/custom.css" rel="stylesheet">
    <script src="js/custom.js"></script>
    <script src="js/screenfull.js"></script>
    <link rel="stylesheet" href="css/datatable/1.10.7/jquery.dataTables.min.css">

    <script src="js/skycons.js"></script>

    @if($routeName=='sms'||'purchaseorderhistory'||'order'||'invoice')
        <link href="css/select2.min.css" rel="stylesheet"/>
    @endif
    @if($routeName == 'manageorder')

        <link rel="stylesheet" href="css/x.css">
    @endif
</head>
<body>
<div id="wrapper">

    @include('partials.navbar')
    <div id="page-wrapper" class="gray-bg dashbard-1">
        @yield('content')
        @include('partials.footer')
        <div class="clearfix"></div>
    </div>
</div>

<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>

<script src="js/bootstrap.min.js"></script>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/select2.min.js"></script>
<script src="{{asset('js/controllers/'.$routeName.'Controller.js')}}"></script>

@if($routeName =='manageorder')
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.js"></script>
    <script src="jajra/handlebars-v4.0.12.js"></script>

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
    <script src="{{asset('js/controllers/manageorderController.js')}}"></script>
@endif

</body>
</html>