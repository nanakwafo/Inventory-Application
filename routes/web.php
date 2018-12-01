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
Route::get('productcategory',['as'=>'productcategory','uses'=>'productcategoryController@index']);
Route::get('customercategory',['as'=>'customercategory','uses'=>'customercategoryController@index']);
Route::get('user',['as'=>'user','uses'=>'userController@index']);
Route::get('warehouse',['as'=>'warehouse','uses'=>'warehouseController@index']);
Route::get('customer',['as'=>'customer','uses'=>'customerController@index']);
Route::get('supplier',['as'=>'supplier','uses'=>'supplierController@index']);
Route::get('product',['as'=>'product','uses'=>'productController@index']);
Route::get('x',['as'=>'x','uses'=>'warehouseitemController@index']);//route for warehouseitem
Route::get('storeitems',['as'=>'storeitems','uses'=>'storeitemController@index']);
Route::get('goodreceive',['as'=>'goodreceive','uses'=>'goodreceiveController@index']);
Route::get('goodissue',['as'=>'goodissue','uses'=>'goodissueController@index']);
Route::get('grntype',['as'=>'grntype','uses'=>'grntypeController@index']);
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
Route::get('allstoreitem',array('as'=>'allstoreitem','uses'=>'storeitemController@getstoreitemData'));


Route::post('login',['as'=>'login','uses'=>'loginController@login']);
Route::post('logout',['as'=>'logout','uses'=>'loginController@logout']);



