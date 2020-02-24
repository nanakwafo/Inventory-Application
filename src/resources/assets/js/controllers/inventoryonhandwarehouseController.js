/**
 * Created by nanakwafo on 23/02/2020.
 */

var warehouse;
var fromdate;
var todate;
var product;
$("#warehousedropdownvalue,#productdropdownvalue,#purchaseorderdropdown").select2({
    theme: "classic",
    width: 'resolve' // need to override the changed default
});


var table =  $('#inventoryonhandwarehouse-table').DataTable({
    dom: "<'row'<'col-xs-12'<'col-xs-6'l><'col-xs-6'p>>r>"+
    "<'row'<'col-xs-12't>>"+
    "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
    processing: true,
    serverSide: true,
    ajax: {
        url: '/allinventoryonhandwarehouse',
        data: function (d) {
            d.warehouse = $('#warehousedropdownvalue').val();
            d.product = $('#productdropdownvalue').val();
            d.fromdate = $('input[name=fromdate]').val();
            d.todate = $('input[name=todate]').val();
        }
    },
    columns: [

        {data: 'receivedate', name: 'receivedate'},
        {data: 'product', name: 'product'},
        {data: 'productcode', name: 'productcode'},
        {data: 'warehouse', name: 'warehouse'},
        {data: 'quantity_in', name: 'supplier'},
        {data: 'quantity_out', name: 'productcategory'},
        {data: 'quantity_remaining', name: 'quantity_remaining'},
        {data: 'value_onhand', name: 'value_onhand'},

    ]
});

$('#search-form').on('submit', function(e) {
    table.draw();
    e.preventDefault();
    warehouse = $('#warehousedropdownvalue').val();
    product = $('#productdropdownvalue').val();
    fromdate = $('input[name=fromdate]').val();
    todate = $('input[name=todate]').val();

});

$('#inventoryonhandwarehousepdf').on('click', function(e) {

    e.preventDefault();

    warehouse = $('#warehousedropdownvalue').val();
    product = $('#productdropdownvalue').val();
    fromdate = $('input[name=fromdate]').val();
    todate = $('input[name=todate]').val();

    if(store === ''){
        warehouse = 'all';
        product = 'all';
        fromdate = 'all';
        todate = 'all';
    }

    var url='inventoryonhandwarehousepdf/'+ warehouse + '/' + fromdate + '/' + todate + '/' + product;

    document.location.href = url;

});
$('#inventoryonhandwarehouseexcel').on('click', function(e) {

    e.preventDefault();
    warehouse = $('#warehousedropdownvalue').val();
    product = $('#productdropdownvalue').val();
    fromdate = $('input[name=fromdate]').val();
    todate = $('input[name=todate]').val();

    if(store === ''){
        store = 'all';
        product = 'all';
        fromdate = 'all';
        todate = 'all';
    }
    var url='inventoryonhandwarehouseexcel/'+ warehouse + '/' + fromdate + '/' + todate + '/' + product;

    document.location.href = url;

});

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
