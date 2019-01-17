
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
                    <span>Purchase Order</span>
                </h2>
            </div>
            <!--//banner-->
            <!--content-->

            <div class="content-top">

                <form action="savepurchaseorder" method="post">
                    {{csrf_field()}}
                    <div class="col-md-12 ">
                        @include('partials.messages')

                        <div class="validation-system">

                            <div class="validation-form">
                                <!---->


                                <div class="vali-form">
                                    <div class="col-md-4 form-group1">
                                        <label class="control-label">Purchase Order#</label>
                                        <input type="text" name="purchaseordernumber" required="" readonly value="{{\App\Helpers\AppHelper::get_ordernumber()}}" id="purchaseordernumber">
                                    </div>
                                    <div class="col-md-2 form-group1">
                                        <label class="control-label">Date</label>
                                        <input type="date" name="date" required="" id="date">
                                    </div>
                                    <div class="col-md-2 form-group1">
                                        <label class="control-label">Expected Delivery Date</label>
                                        <input type="date" name="expecteddeliverydate" required="" id="expecteddeliverydate">
                                    </div>
                                    <div class="col-md-4 form-group2 group-mail">
                                        <label class="control-label">Supplier</label>
                                        <select id="supplier_id" name="supplier_id" class="supplier">
                                            <option value="">Select</option>
                                            @foreach(App\Supplier::all() as $s)
                                                <option value="{{$s->id}}">{{$s->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="clearfix"> </div>
                                    <input type="hidden" id="number_of_items" name="number_of_items" value="0" />
                                    <table class="table table-hover table-inverse">
                                        <span id="attention"></span>
                                        <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Rate </th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th> <button type="button" class="btn btn-default " id="addnew" ><i class="fa fa-plus-circle" aria-hidden="true"></i></button></th>
                                        </tr>
                                        </thead>
                                        <tbody id="data"></tbody>

                                    </table>
                                    <div class="clearfix"> </div>
                                </div>




                            </div>

                        </div>
                    </div>



                    <div class="col-md-12 ">

                        <div class="validation-system">

                            <div class="validation-form">
                                <!---->


                                <div class="vali-form">
                                    <div class="col-md-6 form-group1">
                                        <label class="control-label">Sub Amount:</label>
                                        <input type="text" id="subamount" name="subamount"  readonly>
                                    </div>
                                    <div class="col-md-6 form-group1">
                                        <label class="control-label">VAT(13%):</label>
                                        <input type="text" id="vat" name="vat" readonly>
                                    </div>
                                    <div class="col-md-6 form-group1">
                                        <label class="control-label">Total Amount:</label>
                                        <input type="text" id="totalamount" name="totalamount" readonly>
                                    </div>
                                    <div class="col-md-6 form-group1">
                                        <label class="control-label">Discount:</label>
                                        <input type="text" id="discount" name="discount" required="">
                                    </div>
                                    <div class="col-md-6 form-group1">
                                        <label class="control-label">Grand Total:</label>
                                        <input type="text" id="grandtotal" name="grandtotal" required="">
                                    </div>
                                    <div class="col-md-6 form-group1">
                                        <label class="control-label">Paid Amount:</label>
                                        <input type="text" id="paidamount" name="paidamount" required="">
                                    </div>
                                    <div class="col-md-6 form-group1">
                                        <label class="control-label">Due Amount:</label>
                                        <input type="text" id="dueamount" name="dueamount" required="">
                                    </div>
                                    <div class="col-md-6 form-group2 group-mail">
                                        <label class="control-label">Payment Type:</label>
                                        <select id="paymenttype" name="paymenttype">
                                            <option value="">Select</option>
                                            <option value="cash">Cash</option>
                                            <option value="cheque">Cheque</option>
                                            <option value="credit card">Credit Card</option>

                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group2 group-mail">
                                        <label class="control-label">Account:</label>
                                        <select id="bankaccount" name="bankaccount" class="bankaccount">

                                            <option value="">Select</option>
                                            @foreach(\App\Bankaccount::all() as $s)
                                            <option value="{{$s->accountnumber}}">{{$s->name}}</option>
                                           @endforeach

                                        </select>
                                    </div>

                                    <div class="clearfix"> </div>
                                </div>


                                <div class="col-md-12 form-group">
                                    <button type="submit" class="btn btn-default">Submit</button>
                                    <button type="reset" class="btn btn-default">Reset</button>

                                </div>
                                <div class="clearfix"> </div>

                                <!---->
                            </div>

                        </div>
                    </div>

                </form>

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
    $(".supplier,.bankaccount").select2({
        theme: "classic",
        width: 'resolve' // need to override the changed default
    });


    $(document).ready(function() {

        var currentItem = 0;
        var product=null;


        $.ajax({
            type:"GET",
            url:"{{url('productpurchaseorder')}}",
            success: function(data) {
                product=data;

            }
        });



        $('#addnew').click(function(){

            currentItem =currentItem+1;
            $('#number_of_items').val(currentItem);

            var strToAdd='<tr class="item">' +
                    '<td><div class="form-group"><select name="productid[]" class="form-control product"  >'+product+'</select> </div></td>' +
                    '<td><div class="form-group"><input name="rate[]" class="form-control" type="text" /> </div> </td> ' +
                    '<td><div class="form-group"> <input name="quantity[]" class="form-control" onkeyup="getval3(this);"  type="text" /> </div> </td> ' +
                    '<td><div class="form-group"> <input name="total[]" class="form-control total"  type="text" readonly /> </div> </td>' +
                    '<td><button type="button" class="btn btn-default remove" name="remove" ><i class="fa fa-minus-circle" aria-hidden="true"></i></button> </td>'+
                    ' </tr>';
            $('#data').append(strToAdd);
            $('.product').select2();


        });
        $(document).on('click','.remove',function () {
            currentItem =$('#number_of_items').val() - 1;
            $('#number_of_items').val(currentItem);
            $(this).closest('tr').remove();
        })




    })

</script>
<script>


    calc_subamount();
    function getval3(sel)
    {
        var row = $(sel).closest("tr").index();
        var col = 1;
        var rate =$('#data').find("tr").eq(row).find("td").eq(col).find("input[type='text']").val();
        var  quantity =sel.value;

        var rowtotal= rate * quantity;

        $('#data').find("tr").eq(row).find("td").eq(3).find("input[type='text']").val(rowtotal);

        calc_subamount();

    }
    function calc_subamount() {

        var sum = 0;
        var vat=13;//13%
        $(".total").each(function(){
            sum += parseFloat($(this).val());
        });
        $('#subamount').val(sum);
        $('#vat').val((13/100)*sum);
        $('#totalamount').val(((13/100)*sum) + sum );



    }
    $(document).on('keyup','#discount',function(e) {
        var discount = this.value;
        $('#grandtotal').val($('#totalamount').val() - discount);
    });
    $(document).on('keyup','#paidamount',function(e) {
        var paidamount = this.value;
        $('#dueamount').val($('#grandtotal').val() - paidamount);
    });
</script>


</body>
</html>

