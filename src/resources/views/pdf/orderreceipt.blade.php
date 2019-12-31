<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Example 2</title>
    <style>
        @font-face {
            font-family: SourceSansPro;
            src: url(SourceSansPro-Regular.ttf);
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #0087C3;
            text-decoration: none;
        }

        body {
            position: static;
            width: 100%;
            height: 100%;
            margin: 0 auto;
            color: #555555;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 8px;
            font-family: SourceSansPro;
        }

        header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
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


        #details {
            margin-bottom: 50px;
        }

        #client {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
            float: left;
        }

        #client .to {
            color: #777777;
        }

        h2.name {
            font-size: 1.4em;
            font-weight: normal;
            margin: 0;
        }

        #invoice {
            float: inherit;
            text-align: right;
        }

        #invoice h1 {
            color: #0087C3;
            font-size: 1.0em;
            line-height: 1em;
            font-weight: normal;
            margin: 0  0 10px 0;
        }

        #invoice .date {
            font-size: 1.1em;
            color: #777777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table th,
        table td {
            /*padding: 20px;*/
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid black;
        }

        table th {
            white-space: nowrap;
            font-weight: normal;
        }

        table td {
            text-align: right;
        }

        /*table td h3{*/
        /*color: #57B223;*/
        /*font-size: 1.2em;*/
        /*font-weight: normal;*/
        /*margin: 0 0 0.2em 0;*/
        /*}*/

        table .no {
            color: #FFFFFF;
            font-size: 1.6em;
            background: #57B223;
        }

        table .desc {
            text-align: left;
        }

        table .unit {
            background: #DDDDDD;
        }

        table .qty {
        }

        table .total {
            background: #DDDDDD;
            /*color: #FFFFFF;*/
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table tbody tr:last-child td {
            border: none;
        }

        table tfoot td {
            padding: 10px 20px;
            background: #FFFFFF;
            border-bottom: none;
            font-size: 1.2em;
            white-space: nowrap;
            border-top: 1px solid #AAAAAA;
        }

        table tfoot tr:first-child td {
            border-top: none;
        }

        table tfoot tr:last-child td {
            color: #57B223;
            font-size: 1.4em;
            border-top: 1px solid #57B223;

        }

        table tfoot tr td:first-child {
            border: none;
        }

        #thanks{
            font-size: 2em;
            margin-bottom: 50px;
        }

        #notices{
            padding-left: 6px;
            border-left: 6px solid #0087C3;
        }

        #notices .notice {
            font-size: 1.2em;
        }

        footer {
            color: #777777;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #AAAAAA;
            padding: 8px 0;
            text-align: center;
        }


    </style>
</head>
<body>
<header class="clearfix">
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
    </div>
</header>
<main>
    <div id="details" class="clearfix">
        <div id="client">
            <div class="to">RECEIPT TO:</div>
            <h2 class="name">{{\App\Customer::find($orderdate->customer)->name}}</h2>
            <div class="address">{{\App\Customer::find($orderdate->customer)->address}}</div>
            <div class="email">{{\App\Customer::find($orderdate->customer)->email}}</div>
            <div class="email">{{\App\Customer::find($orderdate->customer)->phonenumber}}</div>
        </div>
        <div id="invoice">
            <div class="date">RECEIPT {{$ordernumber}}</div>
            <div class="date">Date of Order: {{$orderdate->orderdate}}</div>

        </div>
    </div>
    <table border="0" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th class="no">#</th>
            <th class="desc">DESCRIPTION</th>
            <th class="unit">UNIT PRICE</th>
            <th class="qty">QUANTITY</th>
            <th class="total">TOTAL</th>
        </tr>
        </thead>
        <tbody>
        <?php $count=1; $subtotal=0;?>
        @foreach($data as $s)
            <?php $subtotal=$subtotal + $s->total ?>
        <tr>
            <td class="no">{{$count++}}</td>
            <td class="desc"><h3>{{\App\Productcode::find($s->product)->name}}</h3></td>
            <td class="unit">GHC &nbsp;{{$s->rate}}</td>
            <td class="qty">{{$s->quantity}}</td>
            <td class="total">GHC &nbsp;{{ $s->total}}</td>
        </tr>
       @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td>GHC &nbsp;{{ $subtotal}}</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="2">VAT 13%</td>
            <td>{{(0.13) * $subtotal}}</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="2">Discount</td>
            <td>GHC &nbsp;{{$paymentorder->discount}}</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>GHC &nbsp;{{$subtotal + ((0.13) * $subtotal)}}</td>
        </tr>
        </tfoot>
    </table>
    <div id="thanks">Thank you!</div>
    {{--<div id="notices">--}}
        {{--<div>NOTICE:</div>--}}
        {{--<div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>--}}
    {{--</div>--}}
</main>
<footer>
    Order was created on a computer and is valid without the signature and seal.
</footer>
</body>
</html>