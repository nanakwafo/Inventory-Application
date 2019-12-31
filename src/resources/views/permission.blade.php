
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
                    <span>Permission</span>
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

                            <form action="assignpermission" method="post">
                                {{csrf_field()}}
                                <div class="col-md-12 form-group2 group-mail">
                                    <label class="control-label">Role Name</label>
                                    <select name="roleid">
                                        <option value="">Select</option>
                                        @foreach(\Cartalyst\Sentinel\Roles\EloquentRole::all() as $s)
                                            <option value="{{$s->id}}">{{$s->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="checkbox" class="col-md-6 control-label"><h5>Select Permisssions</h5></label>
                                    <br/>
                                    <div class="col-sm-8">
                                        <div class="checkbox-inline1"><label><input id="permissiondashboard" type="checkbox" name="dashboard" value="false"> Dashboard</label></div>
                                        <div class="checkbox-inline1"><label><input id="permissionmasterentry" type="checkbox" name="masterentry" value="false" > Master Entry</label></div>
                                        <div class="checkbox-inline1"><label><input id="permissionpurchaseorder" type="checkbox" name="purchaseorder" value="false" > Purchase Order</label></div>
                                        <div class="checkbox-inline1"><label><input id="permissionitemadjustment" type="checkbox" name="itemadjustment" value="false" > Item Adjustment</label></div>
                                        <div class="checkbox-inline1"><label><input id="permissionsale" type="checkbox" name="sale" value="false" > Sales</label></div>
                                        <div class="checkbox-inline1"><label><input id="permissioninvoice" type="checkbox" name="invoice" value="false" > Invoices</label></div>
                                        <div class="checkbox-inline1"><label><input id="permissionreport" type="checkbox" name="report" value="false" > Report</label></div>
                                        <div class="checkbox-inline1"><label><input id="permissionpromotion" type="checkbox" name="promotion" value="false" > Promotion</label></div>
                                        <div class="checkbox-inline1"><label><input id="permissionaudit" type="checkbox" name="audit" value="false" > Audit</label></div>
                                        <div class="checkbox-inline1"><label><input id="permissionuser" type="checkbox" name="user" value="false" > User Mgn</label></div>
                                        <div class="checkbox-inline1"><label><input id="permissionprofile" type="checkbox" name="user" value="false" > Profile</label></div>

                                    </div>
                                </div>

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
                    <table class="table table-bordered " id="productcategory-table">
                        <thead>
                        <tr>
                            <th style="background-color: white;color: black">No.</th>
                            <th style="background-color: white;color: black">Name</th>

                            <th style="background-color: white;color: black;width: 20%">Permissions</th>
                        </tr>
                        </thead>
                    </table>

                </div>
                <div class="clearfix"> </div>


                <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <center><h4 class="modal-title">Permissions Assign to a Role </h4></center>
                            </div>


                                <div class="modal-body">
                                    <center><h3><span id="roleheader"></span></h3></center>
                                    <ul class="list-group">
                                        <li class="list-group-item"><span class="permissionicondashboard"></span>Dashboard </li>
                                        <li class="list-group-item"><span class="permissioniconmasterentry"></span>Master Entry </li>
                                        <li class="list-group-item"><span class="permissioniconpurchaseorder"></span>Purchase Order </li>
                                        <li class="list-group-item"><span class="permissioniconitemadjustment"></span>Item Adjustment </li>
                                        <li class="list-group-item"><span class="permissioniconsale"></span>Sales </li>
                                        <li class="list-group-item"><span class="permissioniconinvoice"></span>Invoices </li>
                                        <li class="list-group-item"><span class="permissioniconreport"></span>Report </li>
                                        <li class="list-group-item"><span class="permissioniconpromotion"></span>Promotion</li>
                                        <li class="list-group-item"><span class="permissioniconaudit"></span>Audit </li>
                                        <li class="list-group-item"><span class="permissioniconuser"></span>User Mgn </li>
                                        <li class="list-group-item"><span class="permissioniconprofile"></span>Profile </li>

                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    {{--<div class="col-md-12 form-group">--}}
                                        {{--<button type="submit" class="btn btn-default">Submit</button>--}}

                                    {{--</div>--}}
                                    <div class="clearfix"> </div>
                                </div>

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
<!--//scrolling js-->
<script src="js/bootstrap.min.js"> </script>

<script src="js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
{{--<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>--}}
<script>
    $('#permissiondashboard,#permissionmasterentry,#permissionpurchaseorder,#permissionitemadjustment,#permissionsale,#permissioninvoice,#permissionreport,#permissionpromotion,#permissionaudit,#permissionuser').change(function(){
        cb = $(this);
        cb.val(cb.prop('checked'));
    });
    $(function() {
        $('#productcategory-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('allpermissions') !!}',
            columns: [
                { data: 'rownum', name: 'rownum', orderable: false, searchable: false},
                { data: 'name', name: 'name' },
                { data: 'action', name: 'action' }

            ]
        });
    });
</script>

<script>
    $(document).on('click','.editbtn',function(){
        $('#roleheader').html($(this).data('name'));
       var roleid = $(this).data('id');

            $.ajax({
                type:"GET",
                url:"{{url('getpermission')}}/" + roleid,
                success: function(data) {

                    var dashboard=((data.slice(17, -3).split(",")[0]).split(":")[1]=='true')? '<i class="fa fa-check" style="color: green" aria-hidden="true"></i>':'<i class="fa fa-close" style="color: red" aria-hidden="true"></i>';
                    $('.permissionicondashboard').html(dashboard);

                    var masterentry=((data.slice(17, -3).split(",")[1]).split(":")[1]=='true')? '<i class="fa fa-check" style="color: green" aria-hidden="true"></i>':'<i class="fa fa-close" style="color: red" aria-hidden="true"></i>';
                    $('.permissioniconmasterentry').html(masterentry);

                    var product=((data.slice(17, -3).split(",")[2]).split(":")[1]=='true')? '<i class="fa fa-check" style="color: green" aria-hidden="true"></i>':'<i class="fa fa-close" style="color: red" aria-hidden="true"></i>';
                    $('.permissioniconpurchaseorder').html(product);

                    var inventory=((data.slice(17, -3).split(",")[3]).split(":")[1]=='true')? '<i class="fa fa-check" style="color: green" aria-hidden="true"></i>':'<i class="fa fa-close" style="color: red" aria-hidden="true"></i>';
                    $('.permissioniconitemadjustment').html(inventory);

                    var sales=((data.slice(17, -3).split(",")[4]).split(":")[1]=='true')? '<i class="fa fa-check" style="color: green" aria-hidden="true"></i>':'<i class="fa fa-close" style="color: red" aria-hidden="true"></i>';
                    $('.permissioniconsale').html(sales);

                    var invoice=((data.slice(17, -3).split(",")[5]).split(":")[1]=='true')? '<i class="fa fa-check" style="color: green" aria-hidden="true"></i>':'<i class="fa fa-close" style="color: red" aria-hidden="true"></i>';
                    $('.permissioniconinvoice').html(invoice);

                    var report=((data.slice(17, -3).split(",")[6]).split(":")[1]=='true')? '<i class="fa fa-check" style="color: green" aria-hidden="true"></i>':'<i class="fa fa-close" style="color: red" aria-hidden="true"></i>';
                    $('.permissioniconreport').html(report);

                    var promotion=((data.slice(17, -3).split(",")[7]).split(":")[1]=='true')? '<i class="fa fa-check" style="color: green" aria-hidden="true"></i>':'<i class="fa fa-close" style="color: red" aria-hidden="true"></i>';
                    $('.permissioniconpromotion').html(promotion);

                    var audit=((data.slice(17, -3).split(",")[8]).split(":")[1]=='true')? '<i class="fa fa-check" style="color: green" aria-hidden="true"></i>':'<i class="fa fa-close" style="color: red" aria-hidden="true"></i>';
                    $('.permissioniconaudit').html(audit);

                    var user=((data.slice(17, -3).split(",")[9]).split(":")[1]=='true')? '<i class="fa fa-check" style="color: green" aria-hidden="true"></i>':'<i class="fa fa-close" style="color: red" aria-hidden="true"></i>';
                    $('.permissioniconuser').html(user);

                    var profile=((data.slice(17, -3).split(",")[10]).split(":")[1]=='true')? '<i class="fa fa-check" style="color: green" aria-hidden="true"></i>':'<i class="fa fa-close" style="color: red" aria-hidden="true"></i>';
                    $('.permissioniconprofile').html(profile);

                }
            });
    });
</script>


</body>
</html>

