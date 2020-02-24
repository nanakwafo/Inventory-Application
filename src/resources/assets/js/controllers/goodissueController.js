/**
 * Created by nanakwafo on 24/02/2020.
 */

    $("#addtype,#warehouse_from_id,#store_to").select2({
        theme: "classic",
        width: 'resolve' // need to override the changed default
    });

$(document).ready(function() {
    var currentItem = 0;
    var product=null;
    $(document).on('change','#warehouse_from_id',function(e) {
        var warehouse_from_id=$(this).val();

        $.ajax({
            type:"GET",
            url:"/warehouseproductselectbox/"+warehouse_from_id,
            success: function(data) {
                product=data;

            }
        });
    });

    $('#addnew').click(function(){
        currentItem =currentItem+1;
        $('#number_of_items').val(currentItem);

        var strToAdd='<tr class="item">' +
            '<td><div class="form-group"><select name="product[]" class="form-control" onchange="getquantity(this);"  >'+product+'</select> </div></td>' +
            '<td><div class="form-group"><input name="rate[]" class="form-control" type="number" /> </div> </td> ' +
            '<td><div class="form-group"><input name="quantity[]" class="form-control" type="number" /> </div> </td> ' +
            '<td><div class="form-group"> <input name="description[]" class="form-control"  type="text" /> </div> </td> ' +
            '<td><div class="form-group"> <input name="unit[]" class="form-control"  type="text" /> </div> </td>' +
            '<td><button type="button" class="btn btn-default remove" name="remove" ><i class="fa fa-minus-circle" aria-hidden="true"></i></button> </td>'+
            ' </tr>';
        $('#data').append(strToAdd);
//            alert(currentItem);
    });
    $(document).on('click','.remove',function () {
        currentItem =$('#number_of_items').val() - 1;
        $('#number_of_items').val(currentItem);
        $(this).closest('tr').remove();
//            alert(currentItem);
    })



})

function getquantity(sel)
{
    var  productcode=sel.value;
    var warehouse_from = $('#warehouse_from_id').val();
    $.ajax({
        type:"GET",
        url:"/productquantityleftwarehouse/"+productcode+"/"+warehouse_from,
        success: function(data) {
       
            $('#attention').html(' <div class="alert alert-info" role="alert"> ' +
                '<strong>Attention!</strong>quantity left is ' + data +
                '</div>');


        }
    });
}
