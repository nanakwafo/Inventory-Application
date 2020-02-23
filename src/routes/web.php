<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::group(['middleware' => ['checkauth']], function () {
    Route::get('dashboard',['as'=>'dashboard','uses'=>'dashboardController@index']);
    Route::get('purchaseorderhistory',['as'=>'purchaseorderhistory','uses'=>'purchaseorderhistoryController@index']);
    Route::get('allpurchaseorder',['as'=>'allpurchaseorder','uses'=>'allpurchaseController@index']);
    Route::get('welcome',['as'=>'welcome','uses'=>'welcomeController@index']);
    Route::get('dash',['as'=>'dash','uses'=>'dashboardController@dash']);
    Route::get('purchaseorder',['as'=>'purchaseorder','uses'=>'puchaseorderController@index']);
    Route::get('role',['as'=>'role','uses'=>'roleController@index']);
    Route::get('permission',['as'=>'permission','uses'=>'permissionController@index']);
    Route::get('productcategory',['as'=>'productcategory','uses'=>'productcategoryControlle
    
    r@index']);
    Route::get('customercategory',['as'=>'customercategory','uses'=>'customercategoryController@index']);
    Route::get('user',['as'=>'user','uses'=>'userController@index']);
    Route::get('waste',['as'=>'waste','uses'=>'wasteController@index']);
    Route::get('inventoryonhandstore',['as'=>'inventoryonhandstore','uses'=>'inventoryonhandController@inventoryonhandstore']);
    Route::get('inventoryonhandwarehouse',['as'=>'inventoryonhandwarehouse','uses'=>'inventoryonhandController@inventoryonhandwarehouse']);
    Route::get('warehouse',['as'=>'warehouse','uses'=>'warehouseController@index']);
    Route::get('customer',['as'=>'customer','uses'=>'customerController@index']);
    Route::get('supplier',['as'=>'supplier','uses'=>'supplierController@index']);
    Route::get('purchase',['as'=>'purchase','uses'=>'purchaseController@index']);
    Route::get('getproductrate/{product_id}/{store_id}',['as'=>'getproductrate','uses'=>'purchaseController@getproductrate']);
    Route::get('getpermission/{roleid}',['as'=>'getpermission','uses'=>'permissionController@getpermission']);
    Route::get('productselectbox',['as'=>'productselectbox','uses'=>'purchaseController@productselectbox']);
    Route::get('productpurchaseorder',['as'=>'productpurchaseorder','uses'=>'purchaseController@productpurchaseorder']);
    Route::get('storeselectbox',['as'=>'storeselectbox','uses'=>'warehouseController@storeselectbox']);
    Route::get('x',['as'=>'x','uses'=>'warehouseitemController@index']);//route for warehouseitems datatable list
    Route::get('storeitems',['as'=>'storeitems','uses'=>'storeitemController@index']);
    Route::get('profile',['as'=>'profile','uses'=>'profileController@index']);
    Route::get('goodreceive',['as'=>'goodreceive','uses'=>'goodreceiveController@index']);
    Route::get('goodissue',['as'=>'goodissue','uses'=>'goodissueController@index']);
    Route::get('grntype',['as'=>'grntype','uses'=>'grntypeController@index']);
    Route::get('bankaccount',['as'=>'bankaccount','uses'=>'bankaccountController@index']);
    Route::get('order',['as'=>'order','uses'=>'orderController@index']);
    Route::get('sms',['as'=>'sms','uses'=>'smsController@index']);
    Route::get('email',['as'=>'email','uses'=>'emailController@index']);
    Route::get('404', ['as' => '404', 'uses' => 'ErrorController@notfound']);
    Route::get('500', ['as' => '500', 'uses' => 'ErrorController@fatal']);
    Route::get('audit', ['as' => 'audit', 'uses' => 'auditController@index']);
    Route::get('manageorder',['as'=>'manageorder','uses'=>'orderController@manageorder']);
    Route::get('productcode',['as'=>'productcode','uses'=>'productcodeController@index']);
    Route::get('supplierproductselectbox/{supplier_id}',['as'=>'supplierproductselectbox','uses'=>'goodreceiveController@supplierproductselectbox']);
    Route::get('warehouseproductselectbox/{warehouse_id}',['as'=>'warehouseproductselectbox','uses'=>'goodissueController@warehouseproductselectbox']);
    Route::get('productquantityleft/{productcode}/{supplier_id}',['as'=>'productquantityleft','uses'=>'goodreceiveController@productquantityleft']);
    Route::get('productquantityleftwarehouse/{productcode}/{warehouse_from}',['as'=>'productquantityleftwarehouse','uses'=>'goodissueController@productquantityleftwarehouse']);

    Route::get('allproductcategory',array('as'=>'allproductcategory','uses'=>'productcategoryController@allproductcategory'));
    Route::get('allcustomercategory',array('as'=>'allcustomercategory','uses'=>'customercategoryController@allcustomercategory'));
    Route::get('allusers',array('as'=>'allusers','uses'=>'userController@allusers'));
    Route::get('allwarehouse',array('as'=>'allwarehouse','uses'=>'warehouseController@allwarehouse'));
    Route::get('allinventoryonhandstore',array('as'=>'allinventoryonhandstore','uses'=>'inventoryonhandController@allinventoryonhandstore'));
    Route::get('allinventoryonhandwarehouse',array('as'=>'allinventoryonhandwarehouse','uses'=>'inventoryonhandController@allinventoryonhandwarehouse'));
    Route::get('allpurchaseorderhistory',array('as'=>'allpurchaseorderhistory','uses'=>'purchaseorderhistoryController@allpurchaseorderhistory'));
    Route::get('allcontact',array('as'=>'allcontact','uses'=>'smsController@allcontact'));
    Route::get('allcustomer',array('as'=>'allcustomer','uses'=>'customerController@allcustomer'));
    Route::get('allpurchasearrival',array('as'=>'allpurchasearrival','uses'=>'purchaseController@allpurchasearrival'));
    Route::get('allsupplier',array('as'=>'allsupplier','uses'=>'supplierController@allsupplier'));
    Route::get('allproduct',array('as'=>'allproduct','uses'=>'purchaseController@allproduct'));
    Route::get('allgrntype',array('as'=>'allgrntype','uses'=>'grntypeController@allgrntype'));
    Route::get('allbankaccount',array('as'=>'allbankaccount','uses'=>'bankaccountController@allbankaccount'));
    Route::get('allroles',array('as'=>'allroles','uses'=>'roleController@allroles'));
    Route::get('allpermissions',array('as'=>'allpermissions','uses'=>'permissionController@allpermissions'));
    Route::get('allproductcode',array('as'=>'allproductcode','uses'=>'productcodeController@allproductcode'));
    Route::get('allwarehouseitem',array('as'=>'allwarehouseitem','uses'=>'warehouseitemController@getwarehouseitemData'));
    Route::get('allwarehouseproductstats',array('as'=>'allwarehouseproductstats','uses'=>'warehouseitemController@getwarehouseproductstats'));
    Route::get('allstoreitem',array('as'=>'allstoreitem','uses'=>'storeitemController@getstoreitemData'));
    
    Route::get('allorders',array('as'=>'allorders','uses'=>'orderController@allorders'));
    Route::get('/paymentorderdetails/{ordernumber}', 'orderController@getorders')->name('paymentorderdetails');
    
  
    Route::get('allpurchaseorders',array('as'=>'allpurchaseorders','uses'=>'allpurchaseController@allpurchaseorders'));
    Route::get('/purchaseorderdetails/{purchaseordernumber}', 'allpurchaseController@getpurchaseorders')->name('purchaseorderdetails');
    Route::get('allaudit',array('as'=>'allaudit','uses'=>'auditController@allaudit'));
    Route::get('allwaste',array('as'=>'allwaste','uses'=>'wasteController@allwaste'));
    Route::get('/inventoryonhandstorepdf/{store}/{fromdate}/{todate}/{product}',['as'=>'inventoryonhandstorepdf','uses'=>'pdfController@inventoryonhandstorepdf']);
    Route::get('/inventoryonhandstoreexcel/{store}/{fromdate}/{todate}/{product}',['as'=>'inventoryonhandstoreexcel','uses'=>'excelController@inventoryonhandstoreexcel']);
    Route::get('/inventoryonhandwarehousepdf/{warehouse}/{fromdate}/{todate}/{product}',['as'=>'inventoryonhandwarehousepdf','uses'=>'pdfController@inventoryonhandwarehousepdf']);
    Route::get('/inventoryonhandwarehouseexcel/{warehouse}/{fromdate}/{todate}/{product}',['as'=>'inventoryonhandwarehouseexcel','uses'=>'excelController@inventoryonhandwarehouseexcel']);
    Route::get('/orderreceiptpdf/{ordernumber}',['as'=>'orderreceiptpdf','uses'=>'pdfController@orderreceiptpdf']);
    Route::get('/purchaseorderreceiptpdf/{purchaseordernumber}',['as'=>'purchaseorderreceiptpdf','uses'=>'pdfController@purchaseorderreceiptpdf']);
    Route::get('/invoicereceiptpdf/{invoicenumber}',['as'=>'invoicereceiptpdf','uses'=>'pdfController@invoicereceiptpdf']);
    Route::get('invoice',['as'=>'invoice','uses'=>'invoiceController@invoice']);
    Route::get('allinvoice',['as'=>'allinvoice','uses'=>'invoiceController@allinvoice']);
    Route::get('allinvoicedata',['as'=>'allinvoicedata','uses'=>'invoiceController@allinvoicedata']);
    Route::get('/paymentinvoicedetails/{invoicenumber}', 'invoiceController@getinvoices')->name('paymentinvoicedetails');



});

Route::post('login',['as'=>'login','uses'=>'loginController@login']);
Route::post('logout',['as'=>'logout','uses'=>'loginController@logout']);


Route::post('adduser',['as'=>'adduser','uses'=>'userController@adduser']);
Route::post('edituser',['as'=>'edituser','uses'=>'userController@edituser']);
Route::post('deleteuser',['as'=>'deleteuser','uses'=>'userController@deleteuser']);

Route::post('savegrntype',['as'=>'savegrntype','uses'=>'grntypeController@save']);
Route::post('updategrntype',['as'=>'updategrntype','uses'=>'grntypeController@update']);
Route::post('deletegrntype',['as'=>'deletegrntype','uses'=>'grntypeController@delete']);

Route::post('savebankaccount',['as'=>'savebankaccount','uses'=>'bankaccountController@save']);
Route::post('updatebankaccount',['as'=>'updatebankaccount','uses'=>'bankaccountController@update']);
Route::post('deletebankaccount',['as'=>'deletebankaccount','uses'=>'bankaccountController@delete']);

Route::post('saveproductcode',['as'=>'saveproductcode','uses'=>'productcodeController@save']);
Route::post('updateproductcode',['as'=>'updateproductcode','uses'=>'productcodeController@update']);
Route::post('deleteproductcode',['as'=>'deleteproductcode','uses'=>'productcodeController@delete']);

Route::post('saveproductcategory',['as'=>'saveproductcategory','uses'=>'productcategoryController@save']);
Route::post('updateproductcategory',['as'=>'updateproductcategory','uses'=>'productcategoryController@update']);
Route::post('deleteproductcategory',['as'=>'deleteproductcategory','uses'=>'productcategoryController@delete']);

Route::post('savecustomercategory',['as'=>'savecustomercategory','uses'=>'customercategoryController@save']);
Route::post('updatecustomercategory',['as'=>'updatecustomercategory','uses'=>'customercategoryController@update']);
Route::post('deletecustomercategory',['as'=>'deletecustomercategory','uses'=>'customercategoryController@delete']);

Route::post('savecustomer',['as'=>'savecustomer','uses'=>'customerController@save']);
Route::post('updatecustomer',['as'=>'updatecustomer','uses'=>'customerController@update']);
Route::post('deletecustomer',['as'=>'deletecustomer','uses'=>'customerController@delete']);

Route::post('savesupplier',['as'=>'savesupplier','uses'=>'supplierController@save']);
Route::post('updatesupplier',['as'=>'updatesupplier','uses'=>'supplierController@update']);
Route::post('deletesupplier',['as'=>'deletesupplier','uses'=>'supplierController@delete']);

Route::post('savewarehouse',['as'=>'savewarehouse','uses'=>'warehouseController@save']);
Route::post('updatewarehouse',['as'=>'updatewarehouse','uses'=>'warehouseController@update']);
Route::post('deletewarehouse',['as'=>'deletewarehouse','uses'=>'warehouseController@delete']);

Route::post('savepurchase',['as'=>'savepurchase','uses'=>'purchaseController@save']);
Route::post('updatepurchase',['as'=>'updatepurchase','uses'=>'purchaseController@update']);
Route::post('deletepurchase',['as'=>'deletepurchase','uses'=>'purchaseController@delete']);


Route::post('savegoodreceive',['as'=>'savegoodreceive','uses'=>'goodreceiveController@save']);
Route::post('savegoodissue',['as'=>'savegoodissue','uses'=>'goodissueController@save']);


Route::post('saveorder',['as'=>'saveorder','uses'=>'orderController@save']);
Route::post('updatepaymentorder',['as'=>'updatepaymentorder','uses'=>'orderController@updatepaymentorder']);
Route::post('deletepaymentorder',['as'=>'deletepaymentorder','uses'=>'orderController@deletepaymentorder']);

Route::post('saveinvoice',['as'=>'saveinvoice','uses'=>'invoiceController@save']);
Route::post('deletepaymentinvoice',['as'=>'deletepaymentinvoice','uses'=>'invoiceController@deletepaymentinvoice']);

Route::post('insertsms',['as'=>'insertsms','uses'=>'smscreatorController@insert']);
Route::post('insertemail',['as'=>'insertemail','uses'=>'emailcreatorController@insert']);

Route::post('savewaste',['as'=>'savewaste','uses'=>'wasteController@save']);
Route::post('updatewaste',['as'=>'updatewaste','uses'=>'wasteController@update']);
Route::post('deletewaste',['as'=>'deletewaste','uses'=>'wasteController@delete']);

Route::post('updateprofile',['as'=>'updateprofile','uses'=>'profileController@updateprofile']);

Route::post('newrole',['as'=>'newrole','uses'=>'roleController@newrole']);
Route::post('deleterole',['as'=>'deleterole','uses'=>'roleController@delete']);

Route::post('assignpermission',['as'=>'assignpermission','uses'=>'permissionController@assignpermission']);

Route::post('savepurchaseorder',['as'=>'savepurchaseorder','uses'=>'puchaseorderController@save']);