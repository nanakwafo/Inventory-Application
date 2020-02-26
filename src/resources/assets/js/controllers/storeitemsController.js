/**
 * Created by nanakwafo on 23/02/2020.
 */

$(function () {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/allstoreitem',
        columns: [
            {data: 'id', name: 'id', orderable: false, searchable: false},
            {data: 'goodissue_addnumber', name: 'goodissue_addnumber'},
            {data: 'date', name: 'date'},
            {data: 'warehousenamefrom', name: 'warehousenamefrom'},
            {data: 'storeissueto', name: 'storeissueto'},
            {data: 'product', name: 'product'},
            {data: 'rate', name: 'rate'},
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
