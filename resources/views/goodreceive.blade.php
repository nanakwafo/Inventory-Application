
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
                    <span>To Warehouse</span>
                </h2>
            </div>
            <!--//banner-->
            <!--content-->

            <div class="content-top">

                <form action="savegoodreceive" method="post">
                    {{csrf_field()}}
                <div class="col-md-4 ">
                    @include('partials.messages')

                    <div class="validation-system">

                        <div class="validation-form">
                            <!---->


                                <div class="vali-form">
                                    <div class="col-md-12 form-group1">
                                        <label class="control-label">GRN Number</label>
                                        <input type="text" readonly name="grnnumber" required="" value="{{\App\Helpers\AppHelper::get_grnnumber()}}" id="grnnumber">
                                    </div>
                                    <div class="col-md-12 form-group1">
                                        <label class="control-label">Date</label>
                                        <input type="date" name="date"  required="">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>

                                <div class="col-md-12 form-group2 group-mail">
                                    <label class="control-label">GRN Type</label>
                                    <select id="grntype" name="grntype">
                                        <option value="">Select</option>
                                        @foreach(App\Grntype::all() as $s)
                                            <option value="{{$s->id}}">{{$s->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 form-group2 group-mail">
                                    <label class="control-label">Warehouse To</label>
                                    <select id="warehouse_id" name="warehouse_id">
                                        <option value="">Select</option>
                                        @foreach(App\Warehouse::where('purpose','warehouse')->get() as $s)
                                            <option value="{{$s->id}}">{{$s->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-12 form-group1 ">
                                    <label class="control-label">Remark</label>
                                    <textarea  placeholder="Your Comment..." name="remark" required=""></textarea>
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
                                    <label class="control-label">Supplier</label>
                                    <select id="supplier_id" name="supplier_id">
                                        <option value="">Select Supplier</option>
                                        @foreach(App\Supplier::all() as $s)
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
                                            <th >quantity</th>
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


                <div class="col-md-12 ">
                       <table class="table table-bordered " id="warehousestat-table">
                           <thead>
                           <tr>
                               <th style="background-color: white;color: black">Warehouse </th>
                               <th style="background-color: white;color: black">Product Name</th>
                               <th style="background-color: white;color: black">Quantity In</th>

                           </tr>
                           </thead>
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

<script src="js/select2.min.js"></script>
<script type="text/javascript">
    $("#grntype,#warehouse_id,#supplier_id").select2({
        theme: "classic",
        width: 'resolve' // need to override the changed default
    });

    $(document).ready(function() {
        var currentItem = 0;
        var product=null;
        $(document).on('change','#supplier_id',function(e) {
            var supplier_id=$(this).val();

            $.ajax({
                type:"GET",
                url:"{{url('supplierproductselectbox')}}/"+supplier_id,
                success: function(data) {
                    product=data;
                    alert(product);

                }
            });
        });

        $('#addnew').click(function(){
            currentItem =currentItem+1;
            $('#number_of_items').val(currentItem);

            var strToAdd='<tr class="item">' +
                    '<td><div class="form-group"><select name="product[]" class="form-control" onchange="getquantity(this);"  >'+product+'</select> </div></td>' +
                    '<td><div class="form-group"><input name="quantity[]" class="form-control" type="number" /> </div> </td> ' +
                    '<td><div class="form-group"> <input name="description[]" class="form-control"  type="text" /> </div> </td> ' +
                    '<td><div class="form-group"> <input name="unit[]" class="form-control"  type="text" /> </div> </td>' +
                    '<td><button type="button" class="btn btn-default remove" name="remove" ><i class="fa fa-minus-circle" aria-hidden="true"></i></button> </td>'+
                    ' </tr>';
            $('#data').append(strToAdd);
        });
        $(document).on('click','.remove',function () {
            currentItem =$('#number_of_items').val() - 1;
            $('#number_of_items').val(currentItem);
            $(this).closest('tr').remove();
        })



    })

</script>
<script>
    function getquantity(sel)
    {
        var  productcode=sel.value;
        var supplier_id = $('#supplier_id').val();

        $.ajax({
        type:"GET",
        url:"{{url('productquantityleft')}}/"+productcode+"/"+supplier_id,
        success: function(data) {

             $('#attention').html(' <div class="alert alert-info" role="alert"> ' +
                     '<strong>Attention!</strong>quantity left is ' + data +
                     '</div>');


        }
        });
    }

</script>
<script>
    $(function() {
        $('#warehousestat-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('allwarehouseproductstats') !!}',
            columns: [
                { data: 'warehousename', name: 'warehousename'},
                { data: 'productname', name: 'productname' },
                { data: 'quantityleft', name: 'quantityleft' },

            ]
        });
    });
</script>
</body>
</html>

