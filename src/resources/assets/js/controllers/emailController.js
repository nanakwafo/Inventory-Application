/**
 * Created by nanakwafo on 24/02/2020.
 */

$(".customercat").select2({
    theme: "classic",
    width: 'resolve' // need to override the changed default
});
var table =  $('#contacts-table').DataTable({
    dom: "<'row'<'col-xs-12'<'col-xs-6'l><'col-xs-6'p>>r>"+
    "<'row'<'col-xs-12't>>"+
    "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
    processing: true,
    serverSide: true,
    ajax: {
        url: '/allcontact',
        data: function (d) {
            d.customercat = $('#customercat').val();

        }
    },
    columns: [
        {data: 'no', name: 'no',orderable: false, searchable: false},
        {data: 'select', name: 'select',orderable: false, searchable: false},
        {data: 'name', name: 'name', orderable: false, searchable: false},
        {data: 'email', name: 'email',orderable: false, searchable: false},


    ]
});
$('#search-form').on('submit', function(e) {
    table.draw();
    e.preventDefault();
    customercat = $('#customercat').val();


});

$('input[type="checkbox"][name="checkAll"]').change(function() {
    if(this.checked) {
        var table = document.getElementById('contacts-table');
        var val = table.rows[0].cells[1].children[0].checked;
        for (var i = 1; i < table.rows.length; i++)
        {
            table.rows[i].cells[1].children[0].checked = val;
        }
    }else{
        var table = document.getElementById('contacts-table');
        var val = table.rows[0].cells[1].children[0].unchecked;
        for (var i = 1; i < table.rows.length; i++)
        {
            table.rows[i].cells[1].children[0].checked = val;
        }
    }
});
$('#send_bulk_sms').on('click',function(e) {
    e.preventDefault();
    var totalchecked=$('#contacts-table-data').find('input[type="checkbox"]:checked').length;
    var count=0;

    $('#contacts-table-data').find('input[type="checkbox"]:checked').each(function () {
        var name=$(this).data('name');
        var email=$(this).data('email');
        var sender=$('#sender').val();
        var messagecontent=$('#messagecontent').val();
        $.ajax({
            type:'post' ,
            url: '/insertemail',
            data:{
                '_token':$('input[name=_token]').val(),
                'name':name,
                'email':email,
                'sender':sender,
                'messagecontent':messagecontent



            }, beforeSend: function() {
                // setting a timeout
                $('#send_bulk_sms').html("Processing....");
            },
            success:function(data){

            },complete: function() {
                // alert("messages has been scheduled");
                $('#send_bulk_sms').html("Send");
            }
        });
    });
});
