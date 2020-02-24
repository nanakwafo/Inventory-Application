/**
 * Created by nanakwafo on 24/02/2020.
 */

$(function() {
    $('#customercategory-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/allcustomercategory',
        columns: [
            { data: 'rownum', name: 'rownum', orderable: false, searchable: false},
            { data: 'name', name: 'name' },
            { data: 'description', name: 'description' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});

$(document).on('click','.editbtn',function(){
    $('#nameEdit').val($(this).data('name'));
    $('#descriptionEdit').val($(this).data('description'));
//        $('#addressEdit').val($(this).data('address'));
    $('#idEdit').val($(this).data('id'));


});

$(document).on('click','.deletebtn',function() {
    $('#idDelete').val($(this).data('id'));
    $("#nameDelete").html($(this).data('name'));

});
