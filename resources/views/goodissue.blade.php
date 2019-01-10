
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
                    <span>Good Issue</span>
                </h2>
            </div>
            <!--//banner-->
            <!--content-->
            <div class="content-top">

                <form id="" method="post" action="savegoodissue">
                    {{csrf_field()}}
                <div class="col-md-4 ">
                    @include('partials.messages')
                    <div class="validation-system">

                        <div class="validation-form">

                                <div class="vali-form">
                                    <div class="col-md-12 form-group1">
                                        <label class="control-label">ADD Number</label>
                                        <input type="text" name="addnumber" readonly value="{{\App\Helpers\AppHelper::get_addnumber()}}" required="">
                                    </div>
                                    <div class="col-md-12 form-group1">
                                        <label class="control-label">Date</label>
                                        <input type="date" name="adddate" required="">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>

                                <div class="col-md-12 form-group2 group-mail">
                                    <label class="control-label">ADD Type</label>
                                    <select name="addtype" id="addtype">
                                        <option value="">Select</option>
                                        <option value="fromwarehouse">From warehouse</option>
                                        <option value="fromindividual">From Individual</option>


                                    </select>
                                </div>
                                <div class="col-md-12 form-group2 group-mail">
                                    <label class="control-label">Warehouse From</label>
                                    <select id="warehouse_from_id" name="warehouse_from_id">
                                        <option value="">Select</option>

                                        @foreach(App\Warehouse::where('purpose','warehouse')->get() as $s)
                                            <option value="{{$s->id}}">{{$s->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-12 form-group1 ">
                                    <label class="control-label">Description</label>
                                    <textarea  name="remark" required=""></textarea>
                                </div>
                                <div class="clearfix"> </div>

                        </div>



                    </div>
                </div>
                <div class="col-md-8 ">
                    <div class="validation-system">

                        <div class="validation-form">
                            <!---->


                            <div class="vali-form">
                                <div class="col-md-12 form-group2 group-mail">
                                    <label class="control-label">Store To</label>
                                    <select id="store_to" name="warehouse_to_id">
                                        <option value="">Select</option>
                                            @foreach(App\Warehouse::where('purpose','store')->get() as $s)
                                            <option value="{{$s->id}}">{{$s->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <span id="attention"></span>
                                    <input type="hidden" id="number_of_items" name="number_of_items" value="0" />
                                    <table class="table table-hover table-inverse">
                                        <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Rate</th>
                                            <th>quantity</th>
                                            <th>Desciption</th>
                                            <th>Unit</th>
                                            <th> <button type="button" class="btn btn-default " id="addnew" ><i class="fa fa-plus-circle" aria-hidden="true"></i></button></th>
                                        </tr>
                                        </thead>
                                        <tbody id="data"></tbody>
                                    </table><br>
                                    <div class="col-md-12 form-group">
                                        <button type="submit" class="btn btn-default">Submit</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                            <div class="clearfix"> </div>


                            <!---->
                        </div>

                    </div>







                </div>
                </form>
                <div class="clearfix"> </div>
                <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <center><h4 class="modal-title">Edit Product Category Details</h4></center>
                            </div>
                            <div class="modal-body">
                                <div class="validation-system">

                                    <div class="validation-form">
                                        <!---->

                                        <form>
                                            <div class="vali-form">
                                                <div class="col-md-12 form-group1">
                                                    <label class="control-label">Product Category Name</label>
                                                    <input type="text" placeholder="Fruits" required="">
                                                </div>

                                                <div class="clearfix"> </div>
                                            </div>



                                            <div class="col-md-12 form-group1 ">
                                                <label class="control-label">Description</label>
                                                <textarea  placeholder="Your Comment..." required="">use for.....</textarea>
                                            </div>
                                            <div class="clearfix"> </div>


                                        </form>

                                        <!---->
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="col-md-12 form-group">
                                    <button type="submit" class="btn btn-default">Submit</button>

                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>

                <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <center><h4 class="modal-title">Remove Product Category</h4></center>
                            </div>
                            <div class="modal-body">

                            </div>
                            <div class="modal-footer">
                                <div class="col-md-12 form-group">
                                    <button type="submit" class="btn btn-default">Submit</button>

                                </div>
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
<script src="js/select2.min.js"></script>
<script type="text/javascript">
    $("#addtype,#warehouse_from_id,#store_to").select2({
        theme: "classic",
        width: 'resolve' // need to override the changed default
    });

    $(document).ready(function() {
        var currentItem = 0;
        var product=null;
        $(document).on('change','#warehouse_from_id',function(e) {
            var warehouse_from_id=$(this).val();

            $.ajax({
                type:"GET",
                url:"{{url('warehouseproductselectbox')}}/"+warehouse_from_id,
                success: function(data) {
                    product=data;

                }
            });
        });

        $('#addnew').click(function(){
            currentItem =currentItem+1;
            $('#number_of_items').val(currentItem);

            var strToAdd='<tr class="item">' +
                    '<td><div class="form-group"><select name="product[]" class="form-control" onchange="getquantity(this);"  >'+product+'</select> </div></td>' +
                    '<td><div class="form-group"><input name="rate[]" class="form-control" type="number" /> </div> </td> ' +
                    '<td><div class="form-group"><input name="quantity[]" class="form-control" type="number" /> </div> </td> ' +
                    '<td><div class="form-group"> <input name="description[]" class="form-control"  type="text" /> </div> </td> ' +
                    '<td><div class="form-group"> <input name="unit[]" class="form-control"  type="text" /> </div> </td>' +
                    '<td><button type="button" class="btn btn-default remove" name="remove" ><i class="fa fa-minus-circle" aria-hidden="true"></i></button> </td>'+
                    ' </tr>';
            $('#data').append(strToAdd);
            alert(currentItem);
        });
        $(document).on('click','.remove',function () {
            currentItem =$('#number_of_items').val() - 1;
            $('#number_of_items').val(currentItem);
            $(this).closest('tr').remove();
            alert(currentItem);
        })



    })

</script>
<script>
    function getquantity(sel)
    {
        var  productcode=sel.value;
        var warehouse_from = $('#warehouse_from_id').val();
        $.ajax({
            type:"GET",
            url:"{{url('productquantityleftwarehouse')}}/"+productcode+"/"+warehouse_from,
            success: function(data) {
                //alert(data);
                $('#attention').html(' <div class="alert alert-info" role="alert"> ' +
                        '<strong>Attention!</strong>quantity left is ' + data +
                        '</div>');


            }
        });
    }

</script>
</body>
</html>

