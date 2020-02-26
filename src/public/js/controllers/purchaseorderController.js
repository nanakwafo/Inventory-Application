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
/******/ 	return __webpack_require__(__webpack_require__.s = 14);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/controllers/purchaseorderController.js":
/*!********************************************************************!*\
  !*** ./resources/assets/js/controllers/purchaseorderController.js ***!
  \********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Created by nanakwafo on 23/02/2020.
 */
$(".supplier,.bankaccount").select2({
  theme: "classic",
  width: 'resolve' // need to override the changed default

});
$(document).ready(function () {
  var currentItem = 0;
  var product = null;
  $.ajax({
    type: "GET",
    url: "/productpurchaseorder",
    success: function success(data) {
      product = data;
    }
  });
  $('#addnew').click(function () {
    currentItem = currentItem + 1;
    $('#number_of_items').val(currentItem);
    var strToAdd = '<tr class="item">' + '<td><div class="form-group"><select name="productid[]" class="form-control product"  >' + product + '</select> </div></td>' + '<td><div class="form-group"><input name="rate[]" class="form-control" type="text" /> </div> </td> ' + '<td><div class="form-group"> <input name="quantity[]" class="form-control mycustom"   type="text" /> </div> </td> ' + '<td><div class="form-group"> <input name="total[]" class="form-control total"  type="text" readonly /> </div> </td>' + '<td><div class="form-group"> <input name="status[]" class="form-control status"  type="text" value="Not Delivered" readonly /> </div> </td>' + '<td><button type="button" class="btn btn-default remove" name="remove" ><i class="fa fa-minus-circle" aria-hidden="true"></i></button> </td>' + ' </tr>';
    $('#data').append(strToAdd);
    $('.product').select2();
  });
  $(document).on('click', '.remove', function () {
    currentItem = $('#number_of_items').val() - 1;
    $('#number_of_items').val(currentItem);
    $(this).closest('tr').remove();
  });
  calc_subamount();
  $(document).on('keyup', '.mycustom', function (e) {
    e.preventDefault();
    getval3(this);
  });

  function getval3(sel) {
    var row = $(sel).closest("tr").index();
    var col = 1;
    var rate = $('#data').find("tr").eq(row).find("td").eq(col).find("input[type='text']").val();
    var quantity = sel.value;
    var rowtotal = rate * quantity;
    $('#data').find("tr").eq(row).find("td").eq(3).find("input[type='text']").val(rowtotal);
    calc_subamount();
  }

  function calc_subamount() {
    var sum = 0;
    var vat = 13; //13%

    $(".total").each(function () {
      sum += parseFloat($(this).val());
    });
    $('#subamount').val(sum);
    $('#vat').val(13 / 100 * sum);
    $('#totalamount').val(13 / 100 * sum + sum);
  }

  $(document).on('keyup', '#discount', function (e) {
    var discount = this.value;
    $('#grandtotal').val($('#totalamount').val() - discount);
  });
  $(document).on('keyup', '#paidamount', function (e) {
    var paidamount = this.value;
    $('#dueamount').val($('#grandtotal').val() - paidamount);
  });
});

/***/ }),

/***/ 14:
/*!**************************************************************************!*\
  !*** multi ./resources/assets/js/controllers/purchaseorderController.js ***!
  \**************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\invent\src\resources\assets\js\controllers\purchaseorderController.js */"./resources/assets/js/controllers/purchaseorderController.js");


/***/ })

/******/ });