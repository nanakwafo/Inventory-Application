/**
 * Created by nanakwafo on 24/02/2020.
 */


var template = Handlebars.compile($("#details-template").html());
var table = $('#users-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: '/allpurchaseorders',
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
        { data: 'purchaseordernumber', name: 'purchaseordernumber' },
        { data: 'vendor', name: 'vendor' },
        { data: 'expecteddeliverydate', name: 'expecteddeliverydate' },
        { data: 'subamount', name: 'subamount' },
        { data: 'vat', name: 'vat' },
        { data: 'subtotal', name: 'subtotal' },
        { data: 'discount', name: 'discount' },
        { data: 'grandtotal', name: 'grandtotal' },
        { data: 'payamount', name: 'payamount' },
        { data: 'dueamount', name: 'dueamount' },
        { data: 'paymenttype', name: 'paymenttype' },
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
    var tableId = 'purchaseorders-' + row.data().purchaseordernumber;

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

            { data: 'purchaseordernumber', name: 'purchaseordernumber' },
            { data: 'product', name: 'product'},
            { data: 'quantity', name: 'quantity'},
            { data: 'rate', name: 'rate'},
            { data: 'amount', name: 'amount'},

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
