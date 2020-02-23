/**
 * Created by nanakwafo on 23/02/2020.
 */


var template = Handlebars.compile($("#details-template").html());
var table = $('#users-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: '/allorders',
    columns: [
        {
            "className":     'details-control',
            "orderable":      false,
            "searchable":     false,
            "data":           null,
            "defaultContent": '<i style="color: #00dd00" class="fa fa-plus-circle" aria-hidden="true"></i>'
        },
        { data: 'id', name: 'id', orderable: false, searchable: false},
        { data: 'orderdate', name: 'orderdate' },
        { data: 'ordernumber', name: 'ordernumber' },
        { data: 'customer', name: 'customer' },
        { data: 'customercontact', name: 'customercontact' },
        { data: 'totalorderitem', name: 'totalorderitem' },
        { data: 'paymentstatus', name: 'paymentstatus' },
        { data: 'action', name: 'action' },
    ],
    order: [[1, 'asc']],
    initComplete: function () {
        this.api().columns().every(function () {
            var column = this;

            //example for removing search field
            if (column.footer().id !== 'non_searchable') {
                var input = document.createElement("input");
                $(input).appendTo($(column.footer()).empty())
                    .keyup(function () {
                        column.search($(this).val(), false, false, true).draw();
                    });
            }
        });
    }
});

$('#users-table tbody').on('click', 'td.details-control', function () {

    var tr = $(this).closest('tr');
    var row = table.row(tr);
    var tableId = 'orders-' + row.data().ordernumber;

    if (row.child.isShown()) {
        // This row is already open - close it
        row.child.hide();
        tr.removeClass('shown');
    } else {
        // Open this row
        row.child(template(row.data())).show();
        initTable(tableId, row.data());
        console.log(row.data());
        tr.addClass('shown');
        tr.next().find('td').addClass('no-padding bg-gray');
    }
});
function initTable(tableId, data) {
    $('#' + tableId).DataTable({
        processing: true,
        serverSide: true,
        ajax: data.details_url,
        columns: [

            { data: 'ordernumber', name: 'ordernumber' },
            { data: 'store', name: 'store'},
            { data: 'orderdate', name: 'orderdate'},
            { data: 'customer', name: 'customer'},
            { data: 'product', name: 'product'},
            { data: 'rate', name: 'rate'},
            { data: 'quantity', name: 'quantity'},
            { data: 'total', name: 'total'},
        ]
    })
}

$(document).on('click','.deletebtn',function() {
    $('#idDelete').val($(this).data('ordernumber'));
    $('#ordernameDelete').html($(this).data('ordernumber'));
});
$(document).on('click','.paymentbtn',function() {

    $('#idEdit').val($(this).data('ordernumber'));
    $('#payamountEdit').val($(this).data('paidamount'));
    $('#dueamountEdit').val($(this).data('dueamount'));
    $('#paymenttypeEdit').val($(this).data('paymenttype'));
    $('#paymentstatusEdit').val($(this).data('paymentstatus'));


});
