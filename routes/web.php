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
    return view('welcome');
});

Route::get('dashboard',['as'=>'dashboard','uses'=>'dashboardController@index']);
Route::get('dash',['as'=>'dash','uses'=>'dashboardController@get_out_stock_product_all']);
Route::get('productcategory',['as'=>'productcategory','uses'=>'productcategoryController@index']);
Route::get('customercategory',['as'=>'customercategory','uses'=>'customercategoryController@index']);
Route::get('user',['as'=>'user','uses'=>'userController@index']);
Route::get('warehouse',['as'=>'warehouse','uses'=>'warehouseController@index']);
Route::get('customer',['as'=>'customer','uses'=>'customerController@index']);
Route::get('supplier',['as'=>'supplier','uses'=>'supplierController@index']);
Route::get('product',['as'=>'product','uses'=>'productController@index']);
Route::get('getproductrate/{product_id}/{store_id}',['as'=>'getproductrate','uses'=>'productController@getproductrate']);
Route::get('productselectbox',['as'=>'productselectbox','uses'=>'productController@productselectbox']);
Route::get('storeselectbox',['as'=>'storeselectbox','uses'=>'warehouseController@storeselectbox']);
Route::get('x',['as'=>'x','uses'=>'warehouseitemController@index']);//route for warehouseitems datatable list
Route::get('storeitems',['as'=>'storeitems','uses'=>'storeitemController@index']);
Route::get('profile',['as'=>'profile','uses'=>'profileController@index']);
Route::get('goodreceive',['as'=>'goodreceive','uses'=>'goodreceiveController@index']);
Route::get('goodissue',['as'=>'goodissue','uses'=>'goodissueController@index']);
Route::get('grntype',['as'=>'grntype','uses'=>'grntypeController@index']);
Route::get('order',['as'=>'order','uses'=>'orderController@index']);
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
Route::get('allcustomer',array('as'=>'allcustomer','uses'=>'customerController@allcustomer'));
Route::get('allsupplier',array('as'=>'allsupplier','uses'=>'supplierController@allsupplier'));
Route::get('allproduct',array('as'=>'allproduct','uses'=>'productController@allproduct'));
Route::get('allgrntype',array('as'=>'allgrntype','uses'=>'grntypeController@allgrntype'));
Route::get('allproductcode',array('as'=>'allproductcode','uses'=>'productcodeController@allproductcode'));
Route::get('allwarehouseitem',array('as'=>'allwarehouseitem','uses'=>'warehouseitemController@getwarehouseitemData'));
Route::get('allwarehouseproductstats',array('as'=>'allwarehouseproductstats','uses'=>'warehouseitemController@getwarehouseproductstats'));
Route::get('allstoreitem',array('as'=>'allstoreitem','uses'=>'storeitemController@getstoreitemData'));
Route::get('allorders',array('as'=>'allorders','uses'=>'orderController@allorders'));
Route::get('/paymentorderdetails/{ordernumber}', 'orderController@getorders')->name('paymentorderdetails');


Route::post('login',['as'=>'login','uses'=>'loginController@login']);
Route::post('logout',['as'=>'logout','uses'=>'loginController@logout']);


Route::post('savegrntype',['as'=>'savegrntype','uses'=>'grntypeController@save']);
Route::post('updategrntype',['as'=>'updategrntype','uses'=>'grntypeController@update']);
Route::post('deletegrntype',['as'=>'deletegrntype','uses'=>'grntypeController@delete']);

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

Route::post('saveproduct',['as'=>'saveproduct','uses'=>'productController@save']);
Route::post('updateproduct',['as'=>'updateproduct','uses'=>'productController@update']);
Route::post('deleteproduct',['as'=>'deleteproduct','uses'=>'productController@delete']);


Route::post('savegoodreceive',['as'=>'savegoodreceive','uses'=>'goodreceiveController@save']);
Route::post('savegoodissue',['as'=>'savegoodissue','uses'=>'goodissueController@save']);


Route::post('saveorder',['as'=>'saveorder','uses'=>'orderController@save']);

Route::post('updateprofile',['as'=>'updateprofile','uses'=>'profileController@updateprofile']);

