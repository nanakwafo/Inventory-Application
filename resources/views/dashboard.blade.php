
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <title>EYSN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/font-awesome.css" rel="stylesheet">
    <script src="js/jquery.min.js"> </script>
    <!-- Mainly scripts -->
    <script src="js/jquery.metisMenu.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <!-- Custom and plugin javascript -->
    <link href="css/custom.css" rel="stylesheet">
    <script src="js/custom.js"></script>
    <script src="js/screenfull.js"></script>
    <script>
        $(function () {
            $('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

            if (!screenfull.enabled) {
                return false;
            }



            $('#toggle').click(function () {
                screenfull.toggle($('#container')[0]);
            });



        });
    </script>

    <!----->

    <!--pie-chart--->
    <script src="js/pie-chart.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#3bb2d0',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#fbb03b',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ed6498',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });


        });

    </script>
    <!--skycons-icons-->
    <script src="js/skycons.js"></script>
    <!--//skycons-icons-->
</head>
<body>
<div id="wrapper">

    @include('partials.navbar')
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">

            <!--banner-->
            <div class="banner">

                <h2>
                    <a href="dashboard">Home</a>
                    <i class="fa fa-angle-right"></i>
                    <span>Dashboard</span>
                </h2>
            </div>
            <!--//banner-->
            <!--content-->
            <div class="content-top-2">
                <div class="col-md-3">
                    <div class="content-top-1" style="background-color: #d95459;color: white">

                        Number of Warehouses
                        <span class="badge badge-success" style="background-color: white;color: black;">{{\App\Warehouse::where('purpose','warehouse')->count()}}</span>


                        <div class="clearfix"> </div>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="content-top-1" style="background-color: #d95459;color: white">

                        Number of Stores
                        <span class="badge badge-primary" style="background-color: white;color: black;">{{\App\Warehouse::where('purpose','store')->count()}}</span>


                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="content-top-1"style="background-color: #46b86b;color: white">

                        Number of Customers
                        <span class="badge badge-primary" style="background-color: white;color: black;">{{\App\Customer::count()}}</span>


                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="content-top-1" style="background-color: #46b86b;color: white">

                       Number of Suppliers
                        <span class="badge badge-primary" style="background-color: white;color: black;">{{\App\Supplier::count()}}</span>


                        <div class="clearfix"> </div>
                    </div>
                </div>
             </div>

            <div class="content-top">


                <div class="col-md-4 ">
                    <div class="content-top-1">
                        <div class="col-md-6 top-content">
                            <h5>Total Revenue Today(GHC)</h5>
                            <label>{{\App\Paymentorder::whereDate('updated_at',date('Y-m-d'))->sum('paidamount')}}</label>
                        </div>
                        <div class="col-md-6 top-content1">
                            <div id="demo-pie-1" class="pie-title-center" data-percent="25"> <span class="pie-value"></span> </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="content-top-1">
                        <div class="col-md-6 top-content">
                            <h5>Out of Stock Product</h5>
                            <label>{{is_null(\App\Helpers\AppHelper::get_out_stock_product())? 0 : \App\Helpers\AppHelper::get_out_stock_product()}}</label>
                        </div>
                        <div class="col-md-6 top-content1">
                            <div id="demo-pie-2" class="pie-title-center" data-percent="50"> <span class="pie-value"></span> </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="content-top-1">
                        <div class="col-md-6 top-content">
                            <h5>Total Orders Today</h5>
                            <label>{{\App\Order::distinct('ordernumber')->whereDate('orderdate',date('Y-m-d'))->count()}}</label>
                        </div>
                        <div class="col-md-6 top-content1">
                            <div id="demo-pie-3" class="pie-title-center" data-percent="75"> <span class="pie-value"></span> </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="col-md-8 content-top-2">
                    <!---start-chart---->
                    <!----->
                    <div id="container" style="height: 542px"></div>
                </div>
                <div class="clearfix"> </div>

     </div>

            <div class="content-mid">

                <div class="col-md-5">
                    <div class="cal1 cal_2"><div class="clndr"><div class="clndr-controls"><div class="clndr-control-button"><p class="clndr-previous-button">previous</p></div><div class="month">July 2015</div><div class="clndr-control-button rightalign"><p class="clndr-next-button">next</p></div></div><table class="clndr-table" border="0" cellspacing="0" cellpadding="0"><thead><tr class="header-days"><td class="header-day">S</td><td class="header-day">M</td><td class="header-day">T</td><td class="header-day">W</td><td class="header-day">T</td><td class="header-day">F</td><td class="header-day">S</td></tr></thead><tbody><tr><td class="day adjacent-month last-month calendar-day-2015-06-28"><div class="day-contents">28</div></td><td class="day adjacent-month last-month calendar-day-2015-06-29"><div class="day-contents">29</div></td><td class="day adjacent-month last-month calendar-day-2015-06-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-01"><div class="day-contents">1</div></td><td class="day calendar-day-2015-07-02"><div class="day-contents">2</div></td><td class="day calendar-day-2015-07-03"><div class="day-contents">3</div></td><td class="day calendar-day-2015-07-04"><div class="day-contents">4</div></td></tr><tr><td class="day calendar-day-2015-07-05"><div class="day-contents">5</div></td><td class="day calendar-day-2015-07-06"><div class="day-contents">6</div></td><td class="day calendar-day-2015-07-07"><div class="day-contents">7</div></td><td class="day calendar-day-2015-07-08"><div class="day-contents">8</div></td><td class="day calendar-day-2015-07-09"><div class="day-contents">9</div></td><td class="day calendar-day-2015-07-10"><div class="day-contents">10</div></td><td class="day calendar-day-2015-07-11"><div class="day-contents">11</div></td></tr><tr><td class="day calendar-day-2015-07-12"><div class="day-contents">12</div></td><td class="day calendar-day-2015-07-13"><div class="day-contents">13</div></td><td class="day calendar-day-2015-07-14"><div class="day-contents">14</div></td><td class="day calendar-day-2015-07-15"><div class="day-contents">15</div></td><td class="day calendar-day-2015-07-16"><div class="day-contents">16</div></td><td class="day calendar-day-2015-07-17"><div class="day-contents">17</div></td><td class="day calendar-day-2015-07-18"><div class="day-contents">18</div></td></tr><tr><td class="day calendar-day-2015-07-19"><div class="day-contents">19</div></td><td class="day calendar-day-2015-07-20"><div class="day-contents">20</div></td><td class="day calendar-day-2015-07-21"><div class="day-contents">21</div></td><td class="day calendar-day-2015-07-22"><div class="day-contents">22</div></td><td class="day calendar-day-2015-07-23"><div class="day-contents">23</div></td><td class="day calendar-day-2015-07-24"><div class="day-contents">24</div></td><td class="day calendar-day-2015-07-25"><div class="day-contents">25</div></td></tr><tr><td class="day calendar-day-2015-07-26"><div class="day-contents">26</div></td><td class="day calendar-day-2015-07-27"><div class="day-contents">27</div></td><td class="day calendar-day-2015-07-28"><div class="day-contents">28</div></td><td class="day calendar-day-2015-07-29"><div class="day-contents">29</div></td><td class="day calendar-day-2015-07-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-31"><div class="day-contents">31</div></td><td class="day adjacent-month next-month calendar-day-2015-08-01"><div class="day-contents">1</div></td></tr></tbody></table></div></div>
                    <!----Calender -------->
                    <link rel="stylesheet" href="css/clndr.css" type="text/css" />
                    <script src="js/underscore-min.js" type="text/javascript"></script>
                    <script src= "js/moment-2.2.1.js" type="text/javascript"></script>
                    <script src="js/clndr.js" type="text/javascript"></script>
                    <script src="js/site.js" type="text/javascript"></script>
                    <!----End Calender -------->
                </div>
                <div class="col-md-7 compose">

                    <h2>Out of Stock Product from Stores</h2>
                    <nav class="nav-sidebar">
                        <ul class="nav tabs">
                            @foreach(\App\Helpers\AppHelper::get_out_stock_product_all() as $s)
                            <li class=""><a><i class="fa fa-star-o"></i>{{$s->store.'---------------'.$s->product}}</a></li>
                            @endforeach
                        </ul>
                    </nav>

                </div>

                <div class="clearfix"> </div>
            </div>
            <!----->




            <!---->
            @include('partials.footer')
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!---->
<!--scrolling js-->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!--//scrolling js-->
<script src="js/bootstrap.min.js"> </script>
<script src="js/highcharts.js"></script>
<script src="js/series-label.js"></script>
<script src="js/exporting.js"></script>
<script src="js/export-data.js"></script>
<script>
    Highcharts.chart('container', {

        title: {
            text: 'Sales Value'
        },

        subtitle: {
            text: 'Source: EYSN'
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Total Sales'
            }
        },
         legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
        plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },

        }
    },
        series: [

            {
            name: 'Sales',
            data: [{{\App\Helpers\AppHelper::getmontlyrevenue(01)}}, {{\App\Helpers\AppHelper::getmontlyrevenue(02)}}, {{\App\Helpers\AppHelper::getmontlyrevenue(03)}}, {{\App\Helpers\AppHelper::getmontlyrevenue(04)}}, {{\App\Helpers\AppHelper::getmontlyrevenue(05)}}, {{\App\Helpers\AppHelper::getmontlyrevenue(06)}}, {{\App\Helpers\AppHelper::getmontlyrevenue(07)}}, {{\App\Helpers\AppHelper::getmontlyrevenue(8)}}, {{\App\Helpers\AppHelper::getmontlyrevenue(9)}}, {{\App\Helpers\AppHelper::getmontlyrevenue(10)}}, {{\App\Helpers\AppHelper::getmontlyrevenue(11)}}, {{\App\Helpers\AppHelper::getmontlyrevenue(12)}}]
         }



        ],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

    });
</script>
</body>
</html>

