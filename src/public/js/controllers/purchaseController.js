/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 15);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/controllers/purchaseController.js":
/*!***************************************************************!*\
  !*** ./resources/assets/js/controllers/purchaseController.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Created by nanakwafo on 23/02/2020.
 */
$("#productcategory_id,#product,#supplier").select2({
  theme: "classic",
  width: 'resolve' // need to override the changed default

});
$(function () {
  $('#users-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: '/allpurchasearrival',
    columns: [{
      data: 'rownum',
      name: 'rownum',
      orderable: false,
      searchable: false
    }, {
      data: 'datereceived',
      name: 'datereceived'
    }, {
      data: 'productcategory',
      name: 'productcategory'
    }, {
      data: 'product',
      name: 'product'
    }, {
      data: 'unit',
      name: 'unit'
    }, {
      data: 'unitprice',
      name: 'unitprice'
    }, {
      data: 'payamount',
      name: 'payamount'
    }, {
      data: 'quantity',
      name: 'quantity'
    }, {
      data: 'supplier',
      name: 'supplier'
    }, {
      data: 'purchaseordernumber',
      name: 'purchaseordernumber'
    }, {
      data: 'action',
      name: 'action',
      orderable: false,
      searchable: false
    }]
  });
});
$(document).on('click', '.editbtn', function () {
  $('#nameEdit').val($(this).data('name'));
  $('#datereceivedEdit').val($(this).data('datereceived'));
  $('#barcodeEdit').val($(this).data('barcode'));
  $('#productcodeEdit').val($(this).data('productcode'));
  $('#productcategory_idEdit').val($(this).data('productcategory_id'));
  $('#quantityEdit').val($(this).data('quantity'));
  $('#discountEdit').val($(this).data('discount'));
  $('#payamountEdit').val($(this).data('payamount'));
  $('#remarkEdit').val($(this).data('remark'));
  $('#unitEdit').val($(this).data('unit'));
  $('#unitpriceEdit').val($(this).data('unitprice'));
  $('#purchaseordernumberEdit').val($(this).data('purchaseordernumber'));
  $('#idEdit').val($(this).data('id'));
  $('#productcategory_idEdit').val($(this).data('productcategory_id')).select();
  $('#supplier_idEdit').val($(this).data('supplier_id')).select();
});
$(document).on('click', '.deletebtn', function () {
  $('#idDelete').val($(this).data('id'));
  $("#nameDelete").html($(this).data('product'));
});

/***/ }),

/***/ 15:
/*!*********************************************************************!*\
  !*** multi ./resources/assets/js/controllers/purchaseController.js ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\invent\src\resources\assets\js\controllers\purchaseController.js */"./resources/assets/js/controllers/purchaseController.js");


/***/ })

/******/ });