/**
 * Created by nanakwafo on 24/02/2020.
 */
var store;
var fromdate;
var todate;
var product;
$("#storedropdownvalue,#productdropdownvalue").select2({
    theme: "classic",
    width: 'resolve' // need to override the changed default
});


var table =  $('#inventoryonhand-table').DataTable({
    dom: "<'row'<'col-xs-12'<'col-xs-6'l><'col-xs-6'p>>r>"+
    "<'row'<'col-xs-12't>>"+
    "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
    processing: true,
    serverSide: true,
    ajax: {
        url: '/allinventoryonhandstore',
        data: function (d) {
            d.store = $('#storedropdownvalue').val();
            d.product = $('#productdropdownvalue').val();
            d.fromdate = $('input[name=fromdate]').val();
            d.todate = $('input[name=todate]').val();
        }
    },
    columns: [
//            {data: 'date', name: 'date'},
        {data: 'productname', name: 'productname'},
        {data: 'productcode', name: 'productcode'},
        {data: 'store', name: 'store'},
        {data: 'supplier', name: 'supplier'},
        {data: 'productcategory', name: 'productcategory'},
        {data: 'unit', name: 'unit'},
        {data: 'cost', name: 'cost'},
        {data: 'retailprice', name: 'retailprice'},
        {data: 'purchaseordernumber', name: 'purchaseordernumber'},
        {data: 'startinginventory', name: 'startinginventory'},
        {data: 'received', name: 'received'},
        {data: 'usage', name: 'usage'},
        {data: 'onhand', name: 'onhand'},
        {data: 'variance', name: 'variance'},
        {data: 'variancecost', name: 'variancecost'},
        {data: 'onhandvalue', name: 'onhandvalue'},

    ]
});

$('#search-form').on('submit', function(e) {
    table.draw();
    e.preventDefault();
    store = $('#storedropdownvalue').val();
    product = $('#productdropdownvalue').val();
    fromdate = $('input[name=fromdate]').val();
    todate = $('input[name=todate]').val();

});

$('#inventoryonhandstorepdf').on('click', function(e) {

    e.preventDefault();

    store = $('#storedropdownvalue').val();
    product = $('#productdropdownvalue').val();
    fromdate = $('input[name=fromdate]').val();
    todate = $('input[name=todate]').val();

    if(store === ''){
        store = 'all';
        product = 'all';
        fromdate = 'all';
        todate = 'all';
    }

    var url='inventoryonhandstorepdf/'+ store + '/' + fromdate + '/' + todate + '/' + product;

    document.location.href = url;

});
$('#inventoryonhandstoreexcel').on('click', function(e) {

    e.preventDefault();
    store = $('#storedropdownvalue').val();
    product = $('#productdropdownvalue').val();
    fromdate = $('input[name=fromdate]').val();
    todate = $('input[name=todate]').val();

    if(store === ''){
        store = 'all';
        product = 'all';
        fromdate = 'all';
        todate = 'all';
    }
    var url='inventoryonhandstoreexcel/'+ store + '/' + fromdate + '/' + todate + '/' + product;

    document.location.href = url;

});

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
