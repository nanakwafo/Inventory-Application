<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Inventory On Hand</title>
    <style>
        #datarecord,#heading {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 9px;
        }
        #dated{
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;

            font-size: 11px;
        }
        #datarecord td, #datarecord th {
            border: 1px solid black;
            padding: 8px;
        }

        #datarecord tr:nth-child(even){background-color: #f2f2f2;}

        #datarecord tr:hover {background-color: #ddd;}

        #datarecord th {
            padding-top: 9px;
            padding-bottom: 9px;
            text-align: left;
            background-color:  white;
            color: white;
            font-size: 9px;
        }
        div.page
        {
            page-break-after: always;
            page-break-inside: avoid;
        }
        #brieftable td {
            border-top: thin solid;
            border-bottom: thin solid;
        }

        #brieftable td:first-child {
            border-left: thin solid;
        }

        #brieftable td:last-child {
            border-right: thin solid;
        }
        #triangleimage { background: url("assets/img/tri.PNG") no-repeat; }

    </style>
</head>
<body>
<div>

    @if(!empty(\App\Helpers\AppHelper::profileimage()->logo))
        <img src="images/{{\App\Helpers\AppHelper::profileimage()->logo}}" width="70" height="60">
    @else
        <img src="images/wo.jpg" width="70" height="60">
    @endif
    <br>
    <table id="datarecord">
        <tr style="line-height: 1px;">
            <th style='text-align:center;vertical-align:middle;width: 50%;background-color: #d95459;'>
                <p>{{\App\profile::pluck('companyname')->first()}}</p><br>
                <p>{{\App\profile::pluck('address')->first()}}</p>
            </th>
            <th style='text-align:center;vertical-align:middle;width: 50%;background-color: white;'>
              {{\App\profile::pluck('companyname')->first()}}
            </th>

        </tr>
    </table>



    <br>
    <span style="float: right; clear:both ; " id="dated">{{date("D M jS, Y", strtotime(date('Y-m-d')))}}</span>
    <br>
    <br>



    <h3 id="heading"><center>INVENTORY ON HAND</center></h3>
    <table class="table table-bordered " id="datarecord">
        <thead>
        <tr>
            <th style="background-color: #d95459;color: white">Date</th>
            <th style="background-color: #d95459;color: white">Product name</th>
            <th style="background-color: #d95459;color: white">Product code</th>
            <th style="background-color: #d95459;color: white">Store</th>
            <th style="background-color: #d95459;color: white">Supplier</th>
            <th style="background-color: #d95459;color: white">Product category</th>
            <th style="background-color: #d95459;color: white">Unit</th>
            <th style="background-color: #d95459;color: white">Cost(GHC)</th>
            <th style="background-color: #d95459;color: white">Retail price(GHC)</th>
            <th style="background-color: #d95459;color: white">Reorder limit</th>
            <th style="background-color: #d95459;color: white">Starting inventory</th>
            <th style="background-color: #d95459;color: white">Received</th>
            <th style="background-color: #d95459;color: white">Usage</th>
            <th style="background-color: #d95459;color: white">Onhand</th>
            <th style="background-color: #d95459;color: white">Variance</th>
            <th style="background-color: #d95459;color: white">Variance cost(GHC)</th>
            <th style="background-color: #d95459;color: white">Value on hand(GHC)</th>

        </tr>
        </thead>
        <tbody>
           @foreach($data as $d)
               <tr>
                   <td>{{$d->date}}</td>
                   <td>{{$d->productname}}</td>
                   <td>{{$d->productcode}}</td>
                   <td>{{$d->store}}</td>
                   <td>{{$d->supplier}}</td>
                   <td>{{$d->productcategory}}</td>
                   <td>{{$d->unit}}</td>
                   <td>{{$d->cost}}</td>
                   <td>{{$d->retailprice}}</td>
                   <td>{{$d->reorderlimit}}</td>
                   <td>{{$d->startinginventory}}</td>
                   <td>{{$d->received}}</td>
                   <td>{{$d->usage}}</td>
                   <td>{{$d->onhand}}</td>
                   <td>{{$d->variance}}</td>
                   <td>{{$d->variancecost}}</td>
                   <td>{{$d->onhandvalue}}</td>
               </tr>
               @endforeach
        </tbody>
    </table>





</div>


</div>


</body>
</html>