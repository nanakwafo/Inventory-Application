/**
 * Created by nanakwafo on 23/02/2020.
 */

    $(".supplier,.bankaccount").select2({
        theme: "classic",
        width: 'resolve' // need to override the changed default
    });


$(document).ready(function () {

    var currentItem = 0;
    var product = null;


    $.ajax({
        type: "GET",
        url: "/productpurchaseorder",
        success: function (data) {
            product = data;

        }
    });


    $('#addnew').click(function () {

        currentItem = currentItem + 1;
        $('#number_of_items').val(currentItem);

        var strToAdd = '<tr class="item">' +
            '<td><div class="form-group"><select name="productid[]" class="form-control product"  >' + product + '</select> </div></td>' +
            '<td><div class="form-group"><input name="rate[]" class="form-control" type="text" /> </div> </td> ' +
            '<td><div class="form-group"> <input name="quantity[]" class="form-control" onkeyup="getval3(this);"  type="text" /> </div> </td> ' +
            '<td><div class="form-group"> <input name="total[]" class="form-control total"  type="text" readonly /> </div> </td>' +
            '<td><div class="form-group"> <input name="status[]" class="form-control status"  type="text" value="Not Delivered" readonly /> </div> </td>' +
            '<td><button type="button" class="btn btn-default remove" name="remove" ><i class="fa fa-minus-circle" aria-hidden="true"></i></button> </td>' +
            ' </tr>';
        $('#data').append(strToAdd);
        $('.product').select2();


    });
    $(document).on('click', '.remove', function () {
        currentItem = $('#number_of_items').val() - 1;
        $('#number_of_items').val(currentItem);
        $(this).closest('tr').remove();
    })


})


calc_subamount();
function getval3(sel) {
    var row = $(sel).closest("tr").index();
    var col = 1;
    var rate = $('#data').find("tr").eq(row).find("td").eq(col).find("input[type='text']").val();
    var quantity = sel.value;

    var rowtotal = rate * quantity;

    $('#data').find("tr").eq(row).find("td").eq(3).find("input[type='text']").val(rowtotal);

    calc_subamount();

}
function calc_subamount() {

    var sum = 0;
    var vat = 13;//13%
    $(".total").each(function () {
        sum += parseFloat($(this).val());
    });
    $('#subamount').val(sum);
    $('#vat').val((13 / 100) * sum);
    $('#totalamount').val(((13 / 100) * sum) + sum);


}
$(document).on('keyup', '#discount', function (e) {
    var discount = this.value;
    $('#grandtotal').val($('#totalamount').val() - discount);
});
$(document).on('keyup', '#paidamount', function (e) {
    var paidamount = this.value;
    $('#dueamount').val($('#grandtotal').val() - paidamount);
});
