@extends('layouts.app')
<link rel="stylesheet" href="css/x.css">
@section('title','Customer')
@section('content')
    <div class="content-main">

        <!--banner-->
        <div class="banner">

            <h2>
                <a href="dashboard">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>All Purchase Orders</span>
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
                        <th style="background-color: white;color: black">Order Date</th>
                        <th style="background-color: white;color: black">Order Number</th>
                        <th style="background-color: white;color: black">Customer</th>
                        <th style="background-color: white;color: black">Customer contact</th>
                        <th style="background-color: white;color: black">Total Order Item</th>
                        <th style="background-color: white;color: black">Payment Mode</th>
                        <th style="background-color: white;color: black">Action</th>
                        <th style="background-color: white;color: black">Action</th>
                        <th style="background-color: white;color: black">Action</th>
                        <th style="background-color: white;color: black">Action</th>
                        <th style="background-color: white;color: black">Action</th>
                        <th style="background-color: white;color: black">Action</th>
                        <th style="background-color: white;color: black">Action</th>

                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <td id="non_searchable"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
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
                        <form action="deletepaymentorder" method="post">
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
            <div class="modal fade" id="paymentmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <center><h4 class="modal-title">Edit Payment Order  Details</h4></center>
                        </div>
                        <form method="post" action="updatepaymentorder">
                            {{csrf_field()}}
                            <div class="modal-body">
                                <div class="validation-system">



                                    <input id="idEdit" name="idEdit" type="hidden"/>

                                    <div class="vali-form">
                                        <div class="col-md-12 form-group1">
                                            <label class="control-label">Due Amount</label>
                                            <input type="text" id="dueamountEdit" name="dueamountEdit" required="" readonly>
                                        </div>
                                        <div class="col-md-12 form-group1">
                                            <label class="control-label">Pay Amount</label>
                                            <input type="text" id="payamountEdit" name="payamountEdit" required="">
                                        </div>
                                        <div class="col-md-12 form-group2 group-mail">
                                            <label class="control-label">Payment Type</label>
                                            <select id="paymenttypeEdit" name="paymenttypeEdit">
                                                <option value="">Select</option>
                                                <option value="cash">Cash</option>
                                                <option value="cheque">Cheque</option>
                                                <option value="credit card">Credit Card</option>

                                            </select>
                                        </div>

                                        <div class="col-md-12 form-group2 group-mail">
                                            <label class="control-label">Payment Status</label>
                                            <select id="paymentstatusEdit" name="paymentstatusEdit">
                                                <option value="">Select</option>
                                                <option value="advance_payment">Advance Payment</option>
                                                <option value="full_payment">Full Payment</option>
                                                <option value="no_payment">No Payment</option>

                                            </select>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>



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

        </div>
        <!---->


        <!---->
        @include('partials.footer')
    </div>
    @endsection



    <script src="js/skycons.js"></script>

<script src="js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.js"></script>
<script src="jajra/handlebars-v4.0.12.js"></script>
<script id="details-template" type="text/x-handlebars-template">
    @verbatim
    <div class="label label-info"> purchaseorder#-{{purchaseordernumber}}  </div>
    <table class="table details-table" id="purchaseorders#-{{purchaseordernumber}}">
        <thead>
        <tr>

            <th>Purchase Order Number</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Rate</th>
            <th>Amount</th>

        </tr>
        </thead>
    </table>
    @endverbatim
</script>
</body>
</html>

