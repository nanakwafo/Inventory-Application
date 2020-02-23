/**
 * Created by nanakwafo on 23/02/2020.
 */

var status;
var fromdate;
var todate;

$("#status,#productdropdownvalue,#purchaseorderdropdown").select2({
    theme: "classic",
    width: 'resolve' // need to override the changed default
});


var table = $('#inventoryonhandwarehouse-table').DataTable({
    dom: "<'row'<'col-xs-12'<'col-xs-6'l><'col-xs-6'p>>r>" +
    "<'row'<'col-xs-12't>>" +
    "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
    processing: true,
    serverSide: true,
    ajax: {
        url: '/allpurchaseorderhistory',
        data: function (d) {
            d.status = $('#status').val();
            d.fromdate = $('input[name=fromdate]').val();
            d.todate = $('input[name=todate]').val();
        }
    },
    columns: [

        {data: 'purchaseorderdate', name: 'purchaseorderdate'},
        {data: 'purchaseordernumber', name: 'purchaseordernumber'},
        {data: 'product', name: 'product'},
        {data: 'vendor', name: 'vendor'},
        {data: 'status', name: 'status'},
        {data: 'expecteddeliverydate', name: 'expecteddeliverydate'},
        {data: 'quantityordered', name: 'quantityordered'},
        {data: 'quantityreceived', name: 'quantityreceived'},
        {data: 'amount', name: 'amount'},

    ]
});

$('#search-form').on('submit', function (e) {
    table.draw();
    e.preventDefault();
    status = $('#status').val();
    fromdate = $('input[name=fromdate]').val();
    todate = $('input[name=todate]').val();

});


$('#purchaseorderhistorypdf').on('click', function (e) {

    e.preventDefault();

    status = $('#status').val();
    fromdate = $('input[name=fromdate]').val();
    todate = $('input[name=todate]').val();

    if (status === '') {
        status = 'all';
        fromdate = 'all';
        todate = 'all';
    }

    var url = 'purchaseorderhistorypdf/' + status + '/' + fromdate + '/' + todate;

    document.location.href = url;

});
$('#purchaseorderhistoryexcel').on('click', function (e) {

    e.preventDefault();
    status = $('#status').val();
    fromdate = $('input[name=fromdate]').val();
    todate = $('input[name=todate]').val();

    if (status === '') {

        status = 'all';
        fromdate = 'all';
        todate = 'all';
    }
    var url = 'purchaseorderhistoryexcel/' + status + '/' + fromdate + '/' + todate;

    document.location.href = url;

});

$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});
