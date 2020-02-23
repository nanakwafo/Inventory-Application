/**
 * Created by nanakwafo on 23/02/2020.
 */


$(function () {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/allusers',
        columns: [
            {data: 'rownum', name: 'rownum', orderable: false, searchable: false},
            {data: 'first_name', name: 'first_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'email', name: 'email'},
            {data: 'phonenumber', name: 'phonenumber'},
            {data: 'username', name: 'username'},
            {data: 'sex', name: 'sex'},
            {data: 'priviledge', name: 'priviledge'},
            {data: 'action', name: 'action', orderable: false, searchable: false}

        ]
    });
});

$(document).on('click', '.editmodal', function () {
//        alert($(this).data('priviledge'));
    $('#idEdit').val($(this).data('id'));
    $('#firstnameEdit').val($(this).data('firstname'));
    $('#lastnameEdit').val($(this).data('lastname'));
    $('#usernameEdit').val($(this).data('username'));
    $('#sexEdit').val($(this).data('sex')).change();
    $('#phonenumberEdit').val($(this).data('phonenumber'));
    $('#emailEdit').val($(this).data('email'));
    $('#roleEdit').val($(this).data('priviledge')).change();


});

$(document).on('click', '.deletemodal', function () {


    $('#idDelete').val($(this).data('id'));


    $("#name_delete").html($(this).data('firstname') + "" + $(this).data('lastname'));

});


