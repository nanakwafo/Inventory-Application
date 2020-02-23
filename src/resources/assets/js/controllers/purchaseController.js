/**
 * Created by nanakwafo on 23/02/2020.
 */

$("#productcategory_id,#product,#supplier").select2({
    theme: "classic",
    width: 'resolve' // need to override the changed default
});

$(function () {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/allpurchasearrival',
        columns: [
            {data: 'rownum', name: 'rownum', orderable: false, searchable: false},
            {data: 'datereceived', name: 'datereceived'},
            {data: 'productcategory', name: 'productcategory'},
            {data: 'product', name: 'product'},
            {data: 'unit', name: 'unit'},
            {data: 'unitprice', name: 'unitprice'},
            {data: 'payamount', name: 'payamount'},
            {data: 'quantity', name: 'quantity'},
            {data: 'supplier', name: 'supplier'},
            {data: 'purchaseordernumber', name: 'purchaseordernumber'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});

$(document).on('click', '.editbtn', function () {
    $('#nameEdit').val($(this).data('name'));
    $('#datereceivedEdit').val($(this).data('datereceived'));
    $('#barcodeEdit').val($(this).data('barcode'));
    $('#productcodeEdit').val($(this).data('productcode'));
    $('#productcategory_idEdit').val($(this).data('productcategory_id'));
    $('#quantityEdit').val($(this).data('quantity'));
    $('#discountEdit').val($(this).data('discount'));
    $('#payamountEdit').val($(this).data('payamount'));
    $('#remarkEdit').val($(this).data('remark'));
    $('#unitEdit').val($(this).data('unit'));
    $('#unitpriceEdit').val($(this).data('unitprice'));
    $('#purchaseordernumberEdit').val($(this).data('purchaseordernumber'));
    $('#idEdit').val($(this).data('id'));
    $('#productcategory_idEdit').val($(this).data('productcategory_id')).select();
    $('#supplier_idEdit').val($(this).data('supplier_id')).select();


});

$(document).on('click', '.deletebtn', function () {
    $('#idDelete').val($(this).data('id'));
    $("#nameDelete").html($(this).data('product'));

});
