<!DOCTYPE HTML>
<html>
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css'/>

    <link href="css/style.css" rel='stylesheet' type='text/css'/>
    <link href="css/font-awesome.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>

    <script src="js/jquery.metisMenu.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>

    <link href="css/custom.css" rel="stylesheet">
    <script src="js/custom.js"></script>
    <script src="js/screenfull.js"></script>
    <link rel="stylesheet" href="css/datatable/1.10.7/jquery.dataTables.min.css">

    <script src="js/skycons.js"></script>

    @if($routeName=='sms')
    <link href="css/select2.min.css" rel="stylesheet" />

        @endif
</head>
<body>
<div id="wrapper">

    @include('partials.navbar')
    <div id="page-wrapper" class="gray-bg dashbard-1">
        @yield('content')
        @include('partials.footer')
        <div class="clearfix"></div>
    </div>
</div>

<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>

<script src="js/bootstrap.min.js"></script>

<script src="js/jquery.dataTables.min.js"></script>

@if($routeName=='grntype')
    <script>
        $(function() {
            $('#productcategory-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('allgrntype') !!}',
                columns: [
                    { data: 'rownum', name: 'rownum', orderable: false, searchable: false},
                    { data: 'name', name: 'name' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>

    <script>
        $(document).on('click','.editbtn',function(){
            $('#nameEdit').val($(this).data('name'));
            $('#idEdit').val($(this).data('id'));
        });
    </script>
    <script>
        $(document).on('click','.deletebtn',function() {
            $('#idDelete').val($(this).data('id'));
            $("#nameDelete").html($(this).data('name'));

        });
    </script>
    @endif
@if($routeName=='waste')
    <script>
        $(function() {
            $('#waste-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('allwaste') !!}',
                columns: [
                    { data: 'rownum', name: 'rownum', orderable: false, searchable: false},
                    { data: 'date', name: 'date' },
                    { data: 'store', name: 'store' },
                    { data: 'productcode', name: 'productcode' },
                    { data: 'unit', name: 'unit' },
                    { data: 'remark', name: 'remark' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
    <script>
        $(document).on('click','.editbtn',function(){
            $('#dateEdit').val($(this).data('date'));
            $('#store_idEdit').val($(this).data('store'));
            $('#productcodeEdit').val($(this).data('productcode'));
            $('#unitEdit').val($(this).data('unit'));
            $('#unitcostEdit').val($(this).data('unitcost'));
            $('#totalcostEdit').val($(this).data('totalcost'));
            $('#remarkEdit').val($(this).data('remark'));
            $('#idEdit').val($(this).data('id'));


        });
    </script>
    <script>
        $(document).on('click','.deletebtn',function() {
            $('#idDelete').val($(this).data('id'));
            $("#nameDelete").html($(this).data('productcode'));

        });
    </script>
    @endif
@if($routeName=='warehouseitem')
    <script>
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('allwarehouseitem') !!}',
                columns: [
                    { data: 'id', name: 'id', orderable: false, searchable: false},
                    { data: 'date', name: 'date' },
                    { data: 'goodreceive_grnnumber', name: 'goodreceive_grnnumber' },
                    { data: 'warehousename', name: 'warehousename' },
                    { data: 'suppliername', name: 'suppliername' },
                    { data: 'product', name: 'product' },

                    { data: 'description', name: 'description' },
                    { data: 'quantity', name: 'quantity' },
                ],
                initComplete: function () {
                    this.api().columns().every(function () {
                        var column = this;

                        //example for removing search field
                        if (column.footer().className !== 'non_searchable') {
                            var input = document.createElement("input");
                            $(input).appendTo($(column.footer()).empty())
                                    .keyup(function () {
                                        column.search($(this).val(), false, false, true).draw();
                                    });
                        }
                    });
                }
            });
        });
    </script>

@endif@if($routeName=='user')
    <script>
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('allusers') !!}',
                columns: [
                    { data: 'rownum', name: 'rownum', orderable: false, searchable: false},
                    { data: 'first_name', name: 'first_name' },
                    { data: 'last_name', name: 'last_name' },
                    { data: 'email', name: 'email' },
                    { data: 'phonenumber', name: 'phonenumber' },
                    { data: 'username', name: 'username' },
                    { data: 'sex', name: 'sex' },
                    { data: 'priviledge', name: 'priviledge' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}

                ]
            });
        });
    </script>
    <script>
        $(document).on('click','.editmodal',function() {
//        alert($(this).data('priviledge'));
            $('#idEdit').val($(this).data('id'));
            $('#firstnameEdit').val($(this).data('firstname'));
            $('#lastnameEdit').val($(this).data('lastname'));
            $('#usernameEdit').val($(this).data('username'));
            $('#sexEdit').val($(this).data('sex')).change();
            $('#phonenumberEdit').val($(this).data('phonenumber'));
            $('#emailEdit').val($(this).data('email'));
            $('#roleEdit').val($(this).data('priviledge')).change();



        });
    </script>
    <script>
        $(document).on('click','.deletemodal',function() {
//        alert("Hey");

            $('#idDelete').val($(this).data('id'));


            $("#name_delete").html($(this).data('firstname')+""+$(this).data('lastname'));

        });
    </script>

@endif
@if($routeName=='warehouse')
    <script>
        $(function() {
            $('#warehouse-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('allwarehouse') !!}',
                columns: [
                    { data: 'rownum', name: 'rownum', orderable: false, searchable: false},
                    { data: 'name', name: 'name' },
                    { data: 'location', name: 'location' },
                    { data: 'purpose', name: 'purpose' },
                    { data: 'description', name: 'description' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
    <script>
        $(document).on('click','.editbtn',function(){
            $('#nameEdit').val($(this).data('name'));
            $('#descriptionEdit').val($(this).data('description'));
            $('#locationEdit').val($(this).data('location'));
            $('#purposeEdit').val($(this).data('purpose'));
            $('#idEdit').val($(this).data('id'));


        });
    </script>
    <script>
        $(document).on('click','.deletebtn',function() {
            $('#idDelete').val($(this).data('id'));
            $("#nameDelete").html($(this).data('name'));

        });
    </script>

@endif
@if($routeName=='supplier')
    <script>
        $(function() {
            $('#warehouse-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('allsupplier') !!}',
                columns: [
                    { data: 'rownum', name: 'rownum', orderable: false, searchable: false},
                    { data: 'name', name: 'name' },
                    { data: 'phonenumber', name: 'phonenumber' },
                    { data: 'address', name: 'address' },
                    { data: 'description', name: 'description' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
    <script>
        $(document).on('click','.editbtn',function(){
            $('#nameEdit').val($(this).data('name'));
            $('#descriptionEdit').val($(this).data('description'));
            $('#addressEdit').val($(this).data('address'));
            $('#phonenumberEdit').val($(this).data('phonenumber'));
            $('#idEdit').val($(this).data('id'));


        });
    </script>
    <script>
        $(document).on('click','.deletebtn',function() {
            $('#idDelete').val($(this).data('id'));
            $("#nameDelete").html($(this).data('name'));

        });
    </script>

@endif
@if($routeName=='storeitem')
    <script>
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('allstoreitem') !!}',
                columns: [
                    { data: 'id', name: 'id', orderable: false, searchable: false},
                    { data: 'goodissue_addnumber', name: 'goodissue_addnumber' },
                    { data: 'date', name: 'date' },
                    { data: 'warehousenamefrom', name: 'warehousenamefrom' },
                    { data: 'storeissueto', name: 'storeissueto' },
                    { data: 'product', name: 'product' },
                    { data: 'rate', name: 'rate' },
                    { data: 'description', name: 'description' },
                    { data: 'quantity', name: 'quantity' },
                ],
                initComplete: function () {
                    this.api().columns().every(function () {
                        var column = this;

                        //example for removing search field
                        if (column.footer().className !== 'non_searchable') {
                            var input = document.createElement("input");
                            $(input).appendTo($(column.footer()).empty())
                                    .keyup(function () {
                                        column.search($(this).val(), false, false, true).draw();
                                    });
                        }
                    });
                }
            });
        });
    </script>
    @endif
@if($routeName=='sms')
    <script>
        $(".customercat").select2({
            theme: "classic",
            width: 'resolve' // need to override the changed default
        });
        var table =  $('#contacts-table').DataTable({
            dom: "<'row'<'col-xs-12'<'col-xs-6'l><'col-xs-6'p>>r>"+
            "<'row'<'col-xs-12't>>"+
            "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
            processing: true,
            serverSide: true,
            ajax: {
                url: '{!! route('allcontact') !!}',
                data: function (d) {
                    d.customercat = $('#customercat').val();

                }
            },
            columns: [
                {data: 'no', name: 'no',orderable: false, searchable: false},
                {data: 'select', name: 'select',orderable: false, searchable: false},
                {data: 'name', name: 'name', orderable: false, searchable: false},
                {data: 'contact', name: 'contact',orderable: false, searchable: false},


            ]
        });
        $('#search-form').on('submit', function(e) {
            table.draw();
            e.preventDefault();
            customercat = $('#customercat').val();


        });

        $('input[type="checkbox"][name="checkAll"]').change(function() {
            if(this.checked) {
                var table = document.getElementById('contacts-table');
                var val = table.rows[0].cells[1].children[0].checked;
                for (var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].cells[1].children[0].checked = val;
                }
            }else{
                var table = document.getElementById('contacts-table');
                var val = table.rows[0].cells[1].children[0].unchecked;
                for (var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].cells[1].children[0].checked = val;
                }
            }
        });
        $('#send_bulk_sms').on('click',function(e) {
            e.preventDefault();
            var totalchecked=$('#contacts-table-data').find('input[type="checkbox"]:checked').length;
            var count=0;

            $('#contacts-table-data').find('input[type="checkbox"]:checked').each(function () {
                var name=$(this).data('name');
                var telephone=$(this).data('phonenumber');
                var sender=$('#sender').val();
                var messagecontent=$('#messagecontent').val();
                $.ajax({
                    type:'post' ,
                    url: '{{URL::to('insertsms')}}',
                    data:{
                        '_token':$('input[name=_token]').val(),
                        'name':name,
                        'telephone':telephone,
                        'sender':sender,
                        'messagecontent':messagecontent



                    }, beforeSend: function() {
                        // setting a timeout
                        $('#send_bulk_sms').html("Processing....");
                    },
                    success:function(data){

                    },complete: function() {
                        // alert("messages has been scheduled");
                        $('#send_bulk_sms').html("Send");
                    }
                });
            });
        });
    </script>
    <script src="js/select2.min.js"></script>
    @endif
@if($routeNAme=='role')
    <script>
        $(function() {
            $('#productcategory-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('allroles') !!}',
                columns: [
                    { data: 'rownum', name: 'rownum', orderable: false, searchable: false},
                    { data: 'name', name: 'name' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>

    <script>
        $(document).on('click','.editbtn',function(){
            $('#nameEdit').val($(this).data('name'));
            $('#idEdit').val($(this).data('id'));
        });
    </script>
    <script>
        $(document).on('click','.deletebtn',function() {
            $('#idDelete').val($(this).data('id'));
            $("#nameDelete").html($(this).data('name'));

        });
    </script>

@endif
</body>
</html>