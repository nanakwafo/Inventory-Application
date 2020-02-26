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
/******/ 	return __webpack_require__(__webpack_require__.s = 16);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/controllers/goodreceiveController.js":
/*!******************************************************************!*\
  !*** ./resources/assets/js/controllers/goodreceiveController.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Created by nanakwafo on 24/02/2020.
 */
$("#grntype,#warehouse_id,#supplier_id").select2({
  theme: "classic",
  width: 'resolve' // need to override the changed default

});
$(document).ready(function () {
  var currentItem = 0;
  var product = null;
  $(document).on('change', '#supplier_id', function (e) {
    var supplier_id = $(this).val();
    $.ajax({
      type: "GET",
      url: "/supplierproductselectbox/" + supplier_id,
      success: function success(data) {
        product = data; //alert(product);
      }
    });
  });
  $('#addnew').click(function () {
    currentItem = currentItem + 1;
    $('#number_of_items').val(currentItem);
    var strToAdd = '<tr class="item">' + '<td><div class="form-group"><select name="product[]" class="form-control getuantity">' + product + '</select> </div></td>' + '<td><div class="form-group"><input name="quantity[]" class="form-control" type="number" /> </div> </td> ' + '<td><div class="form-group"> <input name="description[]" class="form-control"  type="text" /> </div> </td> ' + '<td><div class="form-group"> <input name="unit[]" class="form-control"  type="text" /> </div> </td>' + '<td><button type="button" class="btn btn-default remove" name="remove" ><i class="fa fa-minus-circle" aria-hidden="true"></i></button> </td>' + ' </tr>';
    $('#data').append(strToAdd);
  });
  $(document).on('click', '.remove', function () {
    currentItem = $('#number_of_items').val() - 1;
    $('#number_of_items').val(currentItem);
    $(this).closest('tr').remove();
  });
  $(document).on('change', '.getuantity', function (e) {
    getquantity(this);
  });
});

function getquantity(sel) {
  var productcode = sel.value;
  var supplier_id = $('#supplier_id').val();
  $.ajax({
    type: "GET",
    url: "/productquantityleft/" + productcode + "/" + supplier_id,
    success: function success(data) {
      $('#attention').html(' <div class="alert alert-info" role="alert"> ' + '<strong>Attention!</strong>quantity left is ' + data + '</div>');
    }
  });
}

$(function () {
  $('#warehousestat-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: '/allwarehouseproductstats/',
    columns: [{
      data: 'warehousename',
      name: 'warehousename'
    }, {
      data: 'productname',
      name: 'productname'
    }, {
      data: 'quantityleft',
      name: 'quantityleft'
    }]
  });
});

/***/ }),

/***/ 16:
/*!************************************************************************!*\
  !*** multi ./resources/assets/js/controllers/goodreceiveController.js ***!
  \************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\invent\src\resources\assets\js\controllers\goodreceiveController.js */"./resources/assets/js/controllers/goodreceiveController.js");


/***/ })

/******/ });