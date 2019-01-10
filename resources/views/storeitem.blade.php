
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
                    <span>Store Items</span>
                </h2>
            </div>
            <!--//banner-->
            <!--content-->
            <div class="content-top">

                <div class="col-md-12 ">
                    <table class="table table-bordered " id="users-table">
                        <thead>
                        <tr>
                            <th style="background-color: white;color: black">No</th>
                            <th style="background-color: white;color: black">Add Number</th>
                            <th style="background-color: white;color: black">Add Date</th>
                            <th style="background-color: white;color: black">Warehouse From</th>
                            <th style="background-color: white;color: black">Store To</th>
                            <th style="background-color: white;color: black">Product</th>
                            <th style="background-color: white;color: black">Rate</th>
                            <th style="background-color: white;color: black">Description</th>
                            <th style="background-color: white;color: black">Quantity</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <td class="non_searchable"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="non_searchable"></td>
                            <td></td>
                            <td></td>


                        </tr>
                        </tfoot>
                    </table>

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
<script>
    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('allstoreitem') !!}',
            columns: [
                { data: 'id', name: 'id', orderable: false, searchable: false},
                { data: 'goodissue_addnumber', name: 'goodissue_addnumber' },
                { data: 'date', name: 'date' },
                { data: 'warehousenamefrom', name: 'warehousenamefrom' },
                { data: 'storeissueto', name: 'storeissueto' },
                { data: 'product', name: 'product' },
                { data: 'rate', name: 'rate' },
                { data: 'description', name: 'description' },
                { data: 'quantity', name: 'quantity' },
            ],
            initComplete: function () {
                this.api().columns().every(function () {
                    var column = this;

                    //example for removing search field
                    if (column.footer().className !== 'non_searchable') {
                        var input = document.createElement("input");
                        $(input).appendTo($(column.footer()).empty())
                                .keyup(function () {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                    }
                });
            }
        });
    });
</script>
</body>
</html>

