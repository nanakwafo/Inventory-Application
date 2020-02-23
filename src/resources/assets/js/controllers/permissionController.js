/**
 * Created by nanakwafo on 23/02/2020.
 */

$('#permissiondashboard,#permissionmasterentry,#permissionpurchaseorder,#permissionitemadjustment,#permissionsale,#permissioninvoice,#permissionreport,#permissionpromotion,#permissionaudit,#permissionuser').change(function () {
    cb = $(this);
    cb.val(cb.prop('checked'));
});
$(function () {
    $('#productcategory-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/allpermissions',
        columns: [
            {data: 'rownum', name: 'rownum', orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action'}

        ]
    });
});

$(document).on('click', '.editbtn', function () {
    $('#roleheader').html($(this).data('name'));
    var roleid = $(this).data('id');

    $.ajax({
        type: "GET",
        url: "/getpermission/" + roleid,
        success: function (data) {

            var dashboard = ((data.slice(17, -3).split(",")[0]).split(":")[1] == 'true') ? '<i class="fa fa-check" style="color: green" aria-hidden="true"></i>' : '<i class="fa fa-close" style="color: red" aria-hidden="true"></i>';
            $('.permissionicondashboard').html(dashboard);

            var masterentry = ((data.slice(17, -3).split(",")[1]).split(":")[1] == 'true') ? '<i class="fa fa-check" style="color: green" aria-hidden="true"></i>' : '<i class="fa fa-close" style="color: red" aria-hidden="true"></i>';
            $('.permissioniconmasterentry').html(masterentry);

            var product = ((data.slice(17, -3).split(",")[2]).split(":")[1] == 'true') ? '<i class="fa fa-check" style="color: green" aria-hidden="true"></i>' : '<i class="fa fa-close" style="color: red" aria-hidden="true"></i>';
            $('.permissioniconpurchaseorder').html(product);

            var inventory = ((data.slice(17, -3).split(",")[3]).split(":")[1] == 'true') ? '<i class="fa fa-check" style="color: green" aria-hidden="true"></i>' : '<i class="fa fa-close" style="color: red" aria-hidden="true"></i>';
            $('.permissioniconitemadjustment').html(inventory);

            var sales = ((data.slice(17, -3).split(",")[4]).split(":")[1] == 'true') ? '<i class="fa fa-check" style="color: green" aria-hidden="true"></i>' : '<i class="fa fa-close" style="color: red" aria-hidden="true"></i>';
            $('.permissioniconsale').html(sales);

            var invoice = ((data.slice(17, -3).split(",")[5]).split(":")[1] == 'true') ? '<i class="fa fa-check" style="color: green" aria-hidden="true"></i>' : '<i class="fa fa-close" style="color: red" aria-hidden="true"></i>';
            $('.permissioniconinvoice').html(invoice);

            var report = ((data.slice(17, -3).split(",")[6]).split(":")[1] == 'true') ? '<i class="fa fa-check" style="color: green" aria-hidden="true"></i>' : '<i class="fa fa-close" style="color: red" aria-hidden="true"></i>';
            $('.permissioniconreport').html(report);

            var promotion = ((data.slice(17, -3).split(",")[7]).split(":")[1] == 'true') ? '<i class="fa fa-check" style="color: green" aria-hidden="true"></i>' : '<i class="fa fa-close" style="color: red" aria-hidden="true"></i>';
            $('.permissioniconpromotion').html(promotion);

            var audit = ((data.slice(17, -3).split(",")[8]).split(":")[1] == 'true') ? '<i class="fa fa-check" style="color: green" aria-hidden="true"></i>' : '<i class="fa fa-close" style="color: red" aria-hidden="true"></i>';
            $('.permissioniconaudit').html(audit);

            var user = ((data.slice(17, -3).split(",")[9]).split(":")[1] == 'true') ? '<i class="fa fa-check" style="color: green" aria-hidden="true"></i>' : '<i class="fa fa-close" style="color: red" aria-hidden="true"></i>';
            $('.permissioniconuser').html(user);

            var profile = ((data.slice(17, -3).split(",")[10]).split(":")[1] == 'true') ? '<i class="fa fa-check" style="color: green" aria-hidden="true"></i>' : '<i class="fa fa-close" style="color: red" aria-hidden="true"></i>';
            $('.permissioniconprofile').html(profile);

        }
    });
});
