/**
 * Created by nanakwafo on 23/02/2020.
 */

$(function () {
    $('#waste-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/allwaste',
        columns: [
            {data: 'rownum', name: 'rownum', orderable: false, searchable: false},
            {data: 'date', name: 'date'},
            {data: 'store', name: 'store'},
            {data: 'productcode', name: 'productcode'},
            {data: 'unit', name: 'unit'},
            {data: 'remark', name: 'remark'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});

$(document).on('click', '.editbtn', function () {
    $('#dateEdit').val($(this).data('date'));
    $('#store_idEdit').val($(this).data('store'));
    $('#productcodeEdit').val($(this).data('productcode'));
    $('#unitEdit').val($(this).data('unit'));
    $('#unitcostEdit').val($(this).data('unitcost'));
    $('#totalcostEdit').val($(this).data('totalcost'));
    $('#remarkEdit').val($(this).data('remark'));
    $('#idEdit').val($(this).data('id'));


});

$(document).on('click', '.deletebtn', function () {
    $('#idDelete').val($(this).data('id'));
    $("#nameDelete").html($(this).data('productcode'));

});
