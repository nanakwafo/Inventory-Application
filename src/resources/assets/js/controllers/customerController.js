/**
 * Created by nanakwafo on 24/02/2020.
 */

$(function() {
    $('#warehouse-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/allcustomer',
        columns: [
            { data: 'rownum', name: 'rownum', orderable: false, searchable: false},
            { data: 'name', name: 'name' },
            { data: 'phonenumber', name: 'phonenumber' },
            { data: 'email', name: 'email' },
            { data: 'address', name: 'address' },
            { data: 'customercategory', name: 'customercategory' ,searchable: false},
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});

$(document).on('click','.editbtn',function(){
    $('#nameEdit').val($(this).data('name'));
    $('#phonenumberEdit').val($(this).data('phonenumber'));
    $('#emailEdit').val($(this).data('email'));
    $('#addressEdit').val($(this).data('address'));
    $('#customercategory_idEdit').val($(this).data('customercategory_id'));
    $('#idEdit').val($(this).data('id'));


});

$(document).on('click','.deletebtn',function() {
    $('#idDelete').val($(this).data('id'));
    $("#nameDelete").html($(this).data('name'));

});
