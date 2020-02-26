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
/******/ 	return __webpack_require__(__webpack_require__.s = 19);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/controllers/orderController.js":
/*!************************************************************!*\
  !*** ./resources/assets/js/controllers/orderController.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Created by nanakwafo on 23/02/2020.
 */
$(".customer").select2({
  theme: "classic",
  width: 'resolve' // need to override the changed default

});
$(document).ready(function () {
  var currentItem = 0;
  var product = null;
  var store = null;
  $.ajax({
    type: "GET",
    url: "/productselectbox",
    success: function success(data) {
      product = data;
    }
  });
  $.ajax({
    type: "GET",
    url: "/storeselectbox",
    success: function success(data) {
      store = data;
    }
  });
  $('#addnew').click(function () {
    currentItem = currentItem + 1;
    $('#number_of_items').val(currentItem);
    var strToAdd = '<tr class="item">' + '<td><div class="form-group"><select name="product[]" class="form-control product"  >' + product + '</select> </div></td>' + '<td><div class="form-group"><select name="store[]" class="form-control store"  >' + store + '</select> </div></td>' + '<td><div class="form-group"><input name="rate[]" class="form-control" type="text" readonly /> </div> </td> ' + '<td><div class="form-group"> <input name="quantity[]" class="form-control quantity"   type="text" /> </div> </td> ' + '<td><div class="form-group"> <input name="total[]" class="form-control total"  type="text" readonly /> </div> </td>' + '<td><div class="form-group"> <input name="deliverystatus[]" class="form-control" value="Delivery" type="text" readonly /> </div> </td>' + '<td><button type="button" class="btn btn-default remove" name="remove" ><i class="fa fa-minus-circle" aria-hidden="true"></i></button> </td>' + ' </tr>';
    $('#data').append(strToAdd);
    $('.product').select2();
    $('.store').select2();
  });
  $(document).on('change', '.product', function (e) {
    getval(this);
  });
  $(document).on('change', '.store', function (e) {
    getval2(this);
  });
  $(document).on('change', '.quantity', function (e) {
    getval3(this);
  });
  $(document).on('click', '.remove', function () {
    currentItem = $('#number_of_items').val() - 1;
    $('#number_of_items').val(currentItem);
    $(this).closest('tr').remove();
  });

  function getval(sel) {
    var product_id = sel.value;
    var row = $(sel).closest("tr").index();
    var col = 1;
    var store_id = $('#data').find("tr").eq(row).find("td").eq(col).find("select").val();
    var ratecol = 2;
    $.ajax({
      type: "GET",
      url: "/getproductrate/" + product_id + "/" + store_id,
      success: function success(data) {
        alert(data);
        var x = data.split('|');
        $('#data').find("tr").eq(row).find("td").eq(ratecol).find("input[type='text']").val(x[0]);
        $('#attention').html(' <div class="alert alert-info" role="alert"> ' + '<strong>Attention!</strong>quantity left is ' + x[1] + '</div>');
      }
    });
  }

  function getval2(sel) {
    var store_id = sel.value;
    var row = $(sel).closest("tr").index();
    var col = 0;
    var product_id = $('#data').find("tr").eq(row).find("td").eq(col).find("select").val();
    var ratecol = 2;
    $.ajax({
      type: "GET",
      url: "/getproductrate/" + product_id + "/" + store_id,
      success: function success(data) {
        var x = data.split('|');
        $('#data').find("tr").eq(row).find("td").eq(ratecol).find("input[type='text']").val(x[0]);
        $('#attention').html(' <div class="alert alert-info" role="alert"> ' + '<strong>Attention!</strong>quantity left is ' + x[1] + '</div>');
      }
    });
  }

  calc_subamount();

  function getval3(sel) {
    var row = $(sel).closest("tr").index();
    var col = 2;
    var rate = $('#data').find("tr").eq(row).find("td").eq(col).find("input[type='text']").val();
    var quantity = sel.value;
    var rowtotal = rate * quantity;
    $('#data').find("tr").eq(row).find("td").eq(4).find("input[type='text']").val(rowtotal);
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

/***/ 19:
/*!******************************************************************!*\
  !*** multi ./resources/assets/js/controllers/orderController.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\invent\src\resources\assets\js\controllers\orderController.js */"./resources/assets/js/controllers/orderController.js");


/***/ })

/******/ });