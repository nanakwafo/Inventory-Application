@extends('layouts.app')
@section('title','Allinvoice')
@section('content')
    <div class="content-main">

        <!--banner-->
        <div class="banner">

            <h2>
                <a href="dashboard">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>All Invoice</span>
            </h2>
        </div>
        <!--//banner-->
        <!--content-->
        <div class="content-top">
            @include('partials.messages')
            <div class="col-md-12 ">
                <table class="table table-bordered " id="users-table">
                    <thead>
                    <tr>
                        <th style="background-color: white;color: black"></th>
                        <th style="background-color: white;color: black">No</th>
                        <th style="background-color: white;color: black">Invoice Date</th>
                        <th style="background-color: white;color: black">Invoice Number</th>
                        <th style="background-color: white;color: black">Customer</th>
                        <th style="background-color: white;color: black">Customer contact</th>
                        <th style="background-color: white;color: black">Total Order Item</th>

                        <th style="background-color: white;color: black">Action</th>

                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <td id="non_searchable"></td>
                        <td id="non_searchable"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                        <td id="non_searchable"></td>


                    </tr>
                    </tfoot>
                </table>

            </div>
            <div class="clearfix"> </div>

            <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <center><h4 class="modal-title">Remove</h4></center>
                        </div>
                        <form action="deletepaymentinvoice" method="post">
                            {{csrf_field()}}
                            <input type="hidden" id="idDelete" name="idDelete"/>
                            <div class="modal-body">
                                <h5>Would you like to delete <label ><span id="ordernameDelete"></span></label> Order</h5>
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
    @endsection
<
    <link rel="stylesheet" href="css/x.css">

    <script src="js/skycons.js"></script>

<script src="js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.js"></script>
<script src="jajra/handlebars-v4.0.12.js"></script>

<script id="details-template" type="text/x-handlebars-template">
    @verbatim
    <div class="label label-info"> invoice-{{invoicenumber}}  </div>
    <table class="table details-table" id="invoice-{{invoicenumber}}">
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

</body>
</html>

