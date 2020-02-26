/**
 * Created by nanakwafo on 24/02/2020.
 */

    $("#grntype,#warehouse_id,#supplier_id").select2({
        theme: "classic",
        width: 'resolve' // need to override the changed default
    });

$(document).ready(function() {
    var currentItem = 0;
    var product=null;

    $(document).on('change','#supplier_id',function(e) {
        var supplier_id=$(this).val();

        $.ajax({
            type:"GET",
            url:"/supplierproductselectbox/"+supplier_id,
            success: function(data) {
                product=data;
                //alert(product);

            }
        });
    });

    $('#addnew').click(function(){
        currentItem =currentItem+1;
        $('#number_of_items').val(currentItem);

        var strToAdd='<tr class="item">' +
            '<td><div class="form-group"><select name="product[]" class="form-control getuantity">'+product+'</select> </div></td>' +
            '<td><div class="form-group"><input name="quantity[]" class="form-control" type="number" /> </div> </td> ' +
            '<td><div class="form-group"> <input name="description[]" class="form-control"  type="text" /> </div> </td> ' +
            '<td><div class="form-group"> <input name="unit[]" class="form-control"  type="text" /> </div> </td>' +
            '<td><button type="button" class="btn btn-default remove" name="remove" ><i class="fa fa-minus-circle" aria-hidden="true"></i></button> </td>'+
            ' </tr>';
        $('#data').append(strToAdd);
    });
    $(document).on('click','.remove',function () {
        currentItem =$('#number_of_items').val() - 1;
        $('#number_of_items').val(currentItem);
        $(this).closest('tr').remove();
    })

    $(document).on('change','.getuantity',function(e) {
        getquantity(this);
    });

})

function getquantity(sel)
{
    var  productcode=sel.value;
    var supplier_id = $('#supplier_id').val();

    $.ajax({
        type:"GET",
        url:"/productquantityleft/"+productcode+"/"+supplier_id,
        success: function(data) {

            $('#attention').html(' <div class="alert alert-info" role="alert"> ' +
                '<strong>Attention!</strong>quantity left is ' + data +
                '</div>');


        }
    });
}

$(function() {
    $('#warehousestat-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/allwarehouseproductstats/',
        columns: [
            { data: 'warehousename', name: 'warehousename'},
            { data: 'productname', name: 'productname' },
            { data: 'quantityleft', name: 'quantityleft' },

        ]
    });
});
