const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */


mix.js('resources/assets/js/app.js', 'public/js')
   .js('resources/assets/js/controllers/grntypeController.js', 'public/js/controllers')
   .js('resources/assets/js/controllers/manageorderController.js', 'public/js/controllers')
   .js('resources/assets/js/controllers/userController.js', 'public/js/controllers')
   .js('resources/assets/js/controllers/warehouseitemController.js', 'public/js/controllers')
   .js('resources/assets/js/controllers/wasteController.js', 'public/js/controllers')
   .js('resources/assets/js/controllers/warehouseController.js', 'public/js/controllers')
   .js('resources/assets/js/controllers/invoiceController.js', 'public/js/controllers')
   .js('resources/assets/js/controllers/bankaccountController.js', 'public/js/controllers')
   .js('resources/assets/js/controllers/productcodeController.js', 'public/js/controllers')
   .js('resources/assets/js/controllers/productcategoryController.js', 'public/js/controllers')
   .js('resources/assets/js/controllers/customercategoryController.js', 'public/js/controllers')
   .js('resources/assets/js/controllers/customerController.js', 'public/js/controllers')
   .js('resources/assets/js/controllers/supplierController.js', 'public/js/controllers')
   .js('resources/assets/js/controllers/purchaseorderController.js', 'public/js/controllers')
   .js('resources/assets/js/controllers/purchaseController.js', 'public/js/controllers')
   .js('resources/assets/js/controllers/goodreceiveController.js', 'public/js/controllers')
   .js('resources/assets/js/controllers/goodissueController.js', 'public/js/controllers')
   .js('resources/assets/js/controllers/storeitemsController.js', 'public/js/controllers')
   .js('resources/assets/js/controllers/orderController.js', 'public/js/controllers')

    .sass('resources/assets/sass/app.scss', 'public/css');
