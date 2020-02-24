/**
 * Created by nanakwafo on 24/02/2020.
 */

$(function() {
    $('#audit-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/allaudit',
        columns: [

            { data: 'user', name: 'user' },
            { data: 'event', name: 'event' },
            { data: 'auditable_type', name: 'auditable_type' },
            { data: 'old_values', name: 'old_values' },
            { data: 'new_values', name: 'new_values' },

        ]
    });
});
