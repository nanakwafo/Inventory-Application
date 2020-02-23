/**
 * Created by nanakwafo on 23/02/2020.
 */


$(function () {
    $('#warehouse-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/allsupplier',
        columns: [
            {data: 'rownum', name: 'rownum', orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'phonenumber', name: 'phonenumber'},
            {data: 'address', name: 'address'},
            {data: 'description', name: 'description'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});

$(document).on('click', '.editbtn', function () {
    $('#nameEdit').val($(this).data('name'));
    $('#descriptionEdit').val($(this).data('description'));
    $('#addressEdit').val($(this).data('address'));
    $('#phonenumberEdit').val($(this).data('phonenumber'));
    $('#idEdit').val($(this).data('id'));


});

$(document).on('click', '.deletebtn', function () {
    $('#idDelete').val($(this).data('id'));
    $("#nameDelete").html($(this).data('name'));

});

