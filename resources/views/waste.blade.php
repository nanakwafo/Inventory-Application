
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
                    <span>Wastes</span>
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

                            <form method="post" action="savewaste">
                                {{csrf_field()}}
                                <div class="vali-form">
                                    <div class="col-md-12 form-group1">
                                        <label class="control-label">Date:</label>
                                        <input type="date" name="date" required="">
                                    </div>
                                    <div class="col-md-12 form-group2 group-mail">
                                        <label class="control-label">Store</label>
                                        <select  name="store_id">
                                            <option></option>
                                            @foreach(\App\Warehouse::where('purpose','store')->get() as $s)
                                                <option value="{{$s->id}}">{{$s->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-12 form-group1">
                                        <label class="control-label">Product code</label>
                                        <input type="text" name="productcode" required="">
                                    </div>
                                    <div class="col-md-12 form-group1">
                                        <label class="control-label">Unit</label>
                                        <input type="text" name="unit" required="">
                                    </div>
                                    <div class="col-md-12 form-group1">
                                        <label class="control-label">Unit Cost</label>
                                        <input type="text" name="unitcost" required="">
                                    </div>
                                    <div class="col-md-12 form-group1">
                                        <label class="control-label">Total Cost</label>
                                        <input type="text" name="totalcost" required="">
                                    </div>

                                    <div class="clearfix"> </div>
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
                    <table class="table table-bordered " id="waste-table">
                        <thead>
                        <tr>
                            <th style="background-color: white;color: black">No.</th>
                            <th style="background-color: white;color: black">Date</th>
                            <th style="background-color: white;color: black">Store</th>
                            <th style="background-color: white;color: black">Product Code</th>
                            <th style="background-color: white;color: black">Unit</th>
                            <th style="background-color: white;color: black">Remark</th>

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
                                <center><h4 class="modal-title">Edit  Details</h4></center>
                            </div>
                            <form method="post" action="updatewaste">
                                {{csrf_field()}}
                                <div class="modal-body">
                                    <div class="validation-system">




                                        <input id="idEdit" name="idEdit" type="hidden"/>
                                        <div class="vali-form">
                                            <div class="col-md-12 form-group1">
                                                <label class="control-label">Date:</label>
                                                <input type="date" name="dateEdit" id="dateEdit" required="">
                                            </div>
                                            <div class="col-md-12 form-group2 group-mail">
                                                <label class="control-label">Store</label>
                                                <select  name="store_idEdit" id="store_idEdit">
                                                    <option></option>
                                                    @foreach(\App\Warehouse::where('purpose','store')->get() as $s)
                                                        <option value="{{$s->id}}">{{$s->name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="col-md-12 form-group1">
                                                <label class="control-label">Product code</label>
                                                <input type="text" name="productcodeEdit" id="productcodeEdit" required="">
                                            </div>
                                            <div class="col-md-12 form-group1">
                                                <label class="control-label">Unit</label>
                                                <input type="text" name="unitEdit" id="unitEdit" required="">
                                            </div>
                                            <div class="col-md-12 form-group1">
                                                <label class="control-label">Unit Cost</label>
                                                <input type="text" name="unitcostEdit" id="unitcostEdit" required="">
                                            </div>
                                            <div class="col-md-12 form-group1">
                                                <label class="control-label">Total Cost</label>
                                                <input type="text" name="totalcostEdit" id="totalcostEdit" required="">
                                            </div>
                                            <div class="clearfix"> </div>
                                        </div>
                                        <div class="col-md-12 form-group1 ">
                                            <label class="control-label">Remark</label>
                                            <textarea  name="remarkEdit" id="remarkEdit" required=""></textarea>
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
                            <form action="deletewaste" method="post">
                                <div class="modal-body">
                                    <p>Do You Want To Delete <span id="nameDelete"></span>  From System?</p>
                                    <input type="hidden" id="idDelete" name="idDelete"/>
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
<!--//scrolling js-->
<script src="js/bootstrap.min.js"> </script>

<script src="js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
{{--<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>--}}
<script>
    $(function() {
        $('#waste-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('allwaste') !!}',
            columns: [
                { data: 'rownum', name: 'rownum', orderable: false, searchable: false},
                { data: 'date', name: 'date' },
                { data: 'store', name: 'store' },
                { data: 'productcode', name: 'productcode' },
                { data: 'unit', name: 'unit' },
                { data: 'remark', name: 'remark' },
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
<script>
    $(document).on('click','.editbtn',function(){
        $('#dateEdit').val($(this).data('date'));
        $('#store_idEdit').val($(this).data('store'));
        $('#productcodeEdit').val($(this).data('productcode'));
        $('#unitEdit').val($(this).data('unit'));
        $('#unitcostEdit').val($(this).data('unitcost'));
        $('#totalcostEdit').val($(this).data('totalcost'));
        $('#remarkEdit').val($(this).data('remark'));
        $('#idEdit').val($(this).data('id'));


    });
</script>
<script>
    $(document).on('click','.deletebtn',function() {
        $('#idDelete').val($(this).data('id'));
        $("#nameDelete").html($(this).data('productcode'));

    });
</script>
</body>
</html>

