/**
 * Created by nanakwafo on 23/02/2020.
 */

$(function () {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/allwarehouseitem',
        columns: [
            {data: 'id', name: 'id', orderable: false, searchable: false},
            {data: 'date', name: 'date'},
            {data: 'goodreceive_grnnumber', name: 'goodreceive_grnnumber'},
            {data: 'warehousename', name: 'warehousename'},
            {data: 'suppliername', name: 'suppliername'},
            {data: 'product', name: 'product'},
            {data: 'description', name: 'description'},
            {data: 'quantity', name: 'quantity'},
        ],
        initComplete: function () {
            this.api().columns().every(function () {
                var column = this;

                //example for removing search field
                if (column.footer().className !== 'non_searchable') {
                    var input = document.createElement("input");
                    $(input).appendTo($(column.footer()).empty())
                        .keyup(function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
                }
            });
        }
    });
});
