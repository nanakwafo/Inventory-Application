
<nav class="navbar-default navbar-static-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <h1> <a class="navbar-brand" href="dashboard">EYSN</a></h1>
    </div>
    <div class=" border-bottom">
        <div class="full-left">
            <section class="full-top">
                <button id="toggle"><i class="fa fa-arrows-alt"></i></button>
            </section>
            <form class=" navbar-left-right">
                <input type="text"  value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
                <input type="submit" value="" class="fa fa-search">
            </form>
            <div class="clearfix"> </div>
        </div>


        <!-- Brand and toggle get grouped for better mobile display -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="drop-men" >
            <ul class=" nav_1">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret">
                            @if(Sentinel::check())
                                {{Sentinel::getUser()->first_name ." ".Sentinel::getUser()->last_name}}
                            @endif
                            <i class="caret"></i></span>

                        @if(!empty(\App\Helpers\AppHelper::profileimage()->logo))
                            <img src="images/{{\App\Helpers\AppHelper::profileimage()->logo}}" width="70" height="60">
                        @else
                            <img src="images/wo.jpg" width="70" height="60">
                        @endif
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        @if(Sentinel::findById(Sentinel::getUser()->id)->hasAccess(['profile']))
                        <li><a href="profile"><i class="fa fa-user"></i>Edit Profile</a></li>
                       @endif
                        <li>
                            &nbsp;
                            <form action="{{route('logout')}}" method="post" id="logout-form">
                                {{csrf_field()}}
                                <a href="#" onclick="document.getElementById('logout-form').submit()"><i class="fa fa-clipboard"></i>Logout</a>
                            </form>
                            &nbsp;
                            &nbsp;
                        </li>
                    </ul>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
        <div class="clearfix"></div>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">


                    @if(Sentinel::findById(Sentinel::getUser()->id)->hasAccess(['dasboard']))
                        <li>

                          <a href="dashboard" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboards</span> </a>
                        </li>
                    @endif
                    @if(Sentinel::findById(Sentinel::getUser()->id)->hasAccess(['masterentry']))
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-cogs nav_icon"></i> <span class="nav-label">Master Entry</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="grntype" class=" hvr-bounce-to-right"> <i class="fa fa-angle-double-down nav_icon"></i>Grn Type</a></li>
                            <li><a href="bankaccount" class=" hvr-bounce-to-right"> <i class="fa fa-angle-double-down nav_icon"></i>Bank Account</a></li>
                            <li><a href="productcode" class=" hvr-bounce-to-right"> <i class="fa fa-dot-circle-o nav_icon"></i>Product Codes</a></li>

                            <li><a href="productcategory" class=" hvr-bounce-to-right"> <i class="fa fa-shopping-basket nav_icon"></i>Product Category</a></li>

                            <li><a href="customercategory" class=" hvr-bounce-to-right"><i class="fa fa-users nav_icon"></i>Customer Category</a></li>
                            <li><a href="customer" class=" hvr-bounce-to-right"><i class="fa fa-user nav_icon"></i>Customer</a></li>
                            <li><a href="supplier" class=" hvr-bounce-to-right"><i class="fa fa-paper-plane nav_icon"></i> Supplier </a></li>
                            <li><a href="warehouse" class=" hvr-bounce-to-right"><i class="fa fa-home nav_icon"></i> Warehouse/Store </a></li>



                        </ul>
                    </li>
                    @endif

                   @if(Sentinel::findById(Sentinel::getUser()->id)->hasAccess(['product']))
                        <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-money nav_icon"></i> <span class="nav-label">Purchase Order</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="purchaseorder" class=" hvr-bounce-to-right"><i class="fa fa-product-hunt nav_icon"></i>New</a></li>
                            <li><a href="purchase" class=" hvr-bounce-to-right"><i class="fa fa-product-hunt nav_icon"></i>Arrivals</a></li>
                        </ul>
                    </li>
                    @endif
                        @if(Sentinel::findById(Sentinel::getUser()->id)->hasAccess(['inventory']))
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-database nav_icon"></i> <span class="nav-label">Inventory Adjustment</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="goodreceive" class=" hvr-bounce-to-right"> <i class="fa fa-credit-card nav_icon"></i>Goods Receive</a></li>
                            <li><a href="goodissue" class=" hvr-bounce-to-right"><i class="fa fa-credit-card nav_icon"></i>Goods Issue</a></li>
                            <li><a href="x" class=" hvr-bounce-to-right"><i class="fa fa-credit-card nav_icon"></i>Warehouse Items</a></li>
                            <li><a href="storeitems" class=" hvr-bounce-to-right"><i class="fa fa-credit-card nav_icon"></i>Store Items</a></li>


                        </ul>
                    </li>
                     @endif
                        @if(Sentinel::findById(Sentinel::getUser()->id)->hasAccess(['sale']))
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-credit-card nav_icon"></i> <span class="nav-label">Sales</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="order" class=" hvr-bounce-to-right"> <i class="fa fa-shopping-cart nav_icon"></i>Add Order</a></li>
                            <li><a href="manageorder" class=" hvr-bounce-to-right"><i class="fa fa-pencil-square-o nav_icon"></i>Manage Order</a></li>
                            <li><a href="waste" class=" hvr-bounce-to-right"><i class="fa fa-trash nav_icon"></i>Manage Waste</a></li>
                        </ul>
                    </li>
                        @endif
                        @if(Sentinel::findById(Sentinel::getUser()->id)->hasAccess(['invoice']))
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-transgender nav_icon"></i> <span class="nav-label">Invoices</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="invoice" class=" hvr-bounce-to-right"> <i class="fa fa-plus nav_icon"></i>New Invoice</a></li>
                            <li><a href="allinvoice" class=" hvr-bounce-to-right"><i class="fa fa-bars nav_icon"></i>All Invoices</a></li>

                        </ul>
                    </li>
                       @endif
                        @if(Sentinel::findById(Sentinel::getUser()->id)->hasAccess(['report']))
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-list nav_icon"></i> <span class="nav-label">Reports</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="inventoryonhand" class=" hvr-bounce-to-right"> <i class="fa fa-list nav_icon"></i>Store</a></li>
                            <li><a href="warehousereport" class=" hvr-bounce-to-right"> <i class="fa fa-list nav_icon"></i>Warehouse </a></li>
                            <li><a href="activepurchaseorder" class=" hvr-bounce-to-right"> <i class="fa fa-list nav_icon"></i>Active Purchase order</a></li>
                        </ul>
                    </li>
                        @endif
                        @if(Sentinel::findById(Sentinel::getUser()->id)->hasAccess(['promotion']))
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-certificate nav_icon"></i> <span class="nav-label">Promotion</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="sms" class=" hvr-bounce-to-right"> <i class="fa fa-comment nav_icon"></i>SMS</a></li>
                            <li><a href="email" class=" hvr-bounce-to-right"> <i class="fa fa-envelope-o nav_icon"></i>Email</a></li>
                        </ul>
                    </li>
                        @endif
                        @if(Sentinel::findById(Sentinel::getUser()->id)->hasAccess(['audit']))
                    <li>
                        <a href="audit" class=" hvr-bounce-to-right"><i class="fa fa-file-archive-o nav_icon"></i> <span class="nav-label">Audit Trails</span><span class="fa arrow"></span></a>

                    </li>
                        @endif
                        @if(Sentinel::findById(Sentinel::getUser()->id)->hasAccess(['user']))
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-user nav_icon"></i> <span class="nav-label">User Management</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="role" class=" hvr-bounce-to-right"> <i class="fa fa-comment nav_icon"></i>Role</a></li>
                            <li><a href="permission" class=" hvr-bounce-to-right"> <i class="fa fa-envelope-o nav_icon"></i>Permission</a></li>
                            <li><a href="user" class=" hvr-bounce-to-right"><i class="fa fa-user nav_icon"></i>User</a></li>
                        </ul>
                    </li>
                            @endif
                </ul>
            </div>
        </div>
    </div>
</nav>