/**
 * Created by nanakwafo on 24/02/2020.
 */

$(function() {
    $('#productcategory-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/allbankaccount',
        columns: [
            { data: 'rownum', name: 'rownum', orderable: false, searchable: false},
            { data: 'name', name: 'name' },
            { data: 'accountnumber', name: 'accountnumber' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});

$(document).on('click','.editbtn',function(){
    $('#nameEdit').val($(this).data('name'));

    $('#accountnumberEdit').val($(this).data('account'));
    $('#idEdit').val($(this).data('id'));
});

$(document).on('click','.deletebtn',function() {
    $('#idDelete').val($(this).data('id'));

    $("#nameDelete").html($(this).data('name'));

});
