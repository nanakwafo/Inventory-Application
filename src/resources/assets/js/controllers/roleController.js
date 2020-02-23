/**
 * Created by nanakwafo on 23/02/2020.
 */

$(function () {
    $('#productcategory-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/allroles',
        columns: [
            {data: 'rownum', name: 'rownum', orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});

$(document).on('click', '.editbtn', function () {
    $('#nameEdit').val($(this).data('name'));
    $('#idEdit').val($(this).data('id'));
});

$(document).on('click', '.deletebtn', function () {
    $('#idDelete').val($(this).data('id'));
    $("#nameDelete").html($(this).data('name'));

});
