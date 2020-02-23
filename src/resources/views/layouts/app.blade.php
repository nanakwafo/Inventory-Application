<!DOCTYPE HTML>
<html>
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
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

@if($routeName=='grntype')
    <script>
        $(function() {
            $('#productcategory-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('allgrntype') !!}',
                columns: [
                    { data: 'rownum', name: 'rownum', orderable: false, searchable: false},
                    { data: 'name', name: 'name' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>

    <script>
        $(document).on('click','.editbtn',function(){
            $('#nameEdit').val($(this).data('name'));
            $('#idEdit').val($(this).data('id'));
        });
    </script>
    <script>
        $(document).on('click','.deletebtn',function() {
            $('#idDelete').val($(this).data('id'));
            $("#nameDelete").html($(this).data('name'));

        });
    </script>
    @endif


</body>
</html>