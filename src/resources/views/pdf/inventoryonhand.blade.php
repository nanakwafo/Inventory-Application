<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Daily Stock taking report</title>
    <style>
        body {

            font-family: Arial, sans-serif;

            font-family: SourceSansPro;
        }
        #datarecord,#brieftable {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 8px;
        }

        #datarecord td, #datarecord th {
            border: 1px solid black;
            padding: 8px;
        }

        #datarecord tr:nth-child(even){background-color: #f2f2f2;}

        #datarecord tr:hover {background-color: #ddd;}

        #datarecord th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #d95459;
            color: black;
            font-size: 8px;
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
        #logo {
            float: left;
            margin-top: 8px;
        }

        #logo img {
            height: 70px;
        }

        #company {
            float: inherit;
            text-align: right;
        }

    </style>
</head>
<body>
<div>


    <div class="page">

            <div id="logo">
                @if(!empty(\App\Helpers\AppHelper::profileimage()->logo))
                    <img src="images/{{\App\Helpers\AppHelper::profileimage()->logo}}" width="70" height="60">
                @else
                    <img src="images/wo.jpg" width="70" height="60">
                @endif
            </div>
            <div id="company">
                <h2 class="name">{{$profile->companyname}}</h2>
                <div>{{$profile->address}}</div>
                <div>{{$profile->mobile}}</div>
                <div><a href="">{{$profile->email}}</a></div>
            </div>


        <h4><center><b>INVENTORY ON HAND REPORT</b></center></h4>



        <br>
        <table id="datarecord">
            <thead>
            <tr>

                <th >Product name</th>
                <th >Product code</th>
                <th >Store</th>
                <th >Supplier</th>
                <th >Product category</th>
                <th >Unit</th>
                <th >Cost(GHC)</th>
                <th >Retail price(GHC)</th>
                {{--<th >Reorder limit</th>--}}
                <th >Starting inventory</th>
                <th >Received</th>
                <th >Usage</th>
                <th >Onhand</th>
                <th >Variance</th>
                <th >Variance cost(GHC)</th>
                <th >Value on hand(GHC)</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $totalonhandvalue=0;
            $totalvariancecost=0;
            $totalvariance=0;
            $totalonhand=0;
            ?>
            @foreach($data as $d)
                <?php
                $totalonhandvalue = $totalonhandvalue + $d->onhandvalue;
                $totalvariancecost = $totalvariancecost + $d->variancecost;
                $totalvariance = $totalvariance + $d->variance;
                $totalonhand = $totalonhand + $d->onhand;
                ?>
                <tr>

                    <td>{{$d->productname}}</td>
                    <td>{{$d->productcode}}</td>
                    <td>{{$d->store}}</td>
                    <td>{{$d->supplier}}</td>
                    <td>{{$d->productcategory}}</td>
                    <td>{{$d->unit}}</td>
                    <td>{{$d->cost}}</td>
                    <td>{{$d->retailprice}}</td>

                    <td>{{$d->startinginventory}}</td>
                    <td>{{$d->received}}</td>
                    <td>{{$d->usage}}</td>
                    <td>{{$d->onhand}}</td>
                    <td>{{$d->variance}}</td>
                    <td>{{$d->variancecost}}</td>
                    <td>{{$d->onhandvalue}}</td>
                </tr>
            @endforeach
            <tbody>
            <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{$totalonhand}}</td>
                <td>{{$totalvariance}}</td>
                <td>{{$totalvariancecost}}</td>
                <td>{{$totalonhandvalue}}</td>
            </tr>
            </tfoot>
        </table>

    </div>



</div>


</body>
</html>