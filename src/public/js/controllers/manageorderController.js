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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/controllers/manageorderController.js":
/*!******************************************************************!*\
  !*** ./resources/assets/js/controllers/manageorderController.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Created by nanakwafo on 23/02/2020.
 */
var template = Handlebars.compile($("#details-template").html());
var table = $('#users-table').DataTable({
  processing: true,
  serverSide: true,
  ajax: '/allorders',
  columns: [{
    "className": 'details-control',
    "orderable": false,
    "searchable": false,
    "data": null,
    "defaultContent": '<i style="color: #00dd00" class="fa fa-plus-circle" aria-hidden="true"></i>'
  }, {
    data: 'id',
    name: 'id',
    orderable: false,
    searchable: false
  }, {
    data: 'orderdate',
    name: 'orderdate'
  }, {
    data: 'ordernumber',
    name: 'ordernumber'
  }, {
    data: 'customer',
    name: 'customer'
  }, {
    data: 'customercontact',
    name: 'customercontact'
  }, {
    data: 'totalorderitem',
    name: 'totalorderitem'
  }, {
    data: 'paymentstatus',
    name: 'paymentstatus'
  }, {
    data: 'action',
    name: 'action'
  }],
  order: [[1, 'asc']],
  initComplete: function initComplete() {
    this.api().columns().every(function () {
      var column = this; //example for removing search field

      if (column.footer().id !== 'non_searchable') {
        var input = document.createElement("input");
        $(input).appendTo($(column.footer()).empty()).keyup(function () {
          column.search($(this).val(), false, false, true).draw();
        });
      }
    });
  }
});
$('#users-table tbody').on('click', 'td.details-control', function () {
  var tr = $(this).closest('tr');
  var row = table.row(tr);
  var tableId = 'orders-' + row.data().ordernumber;

  if (row.child.isShown()) {
    // This row is already open - close it
    row.child.hide();
    tr.removeClass('shown');
  } else {
    // Open this row
    row.child(template(row.data())).show();
    initTable(tableId, row.data());
    console.log(row.data());
    tr.addClass('shown');
    tr.next().find('td').addClass('no-padding bg-gray');
  }
});

function initTable(tableId, data) {
  $('#' + tableId).DataTable({
    processing: true,
    serverSide: true,
    ajax: data.details_url,
    columns: [{
      data: 'ordernumber',
      name: 'ordernumber'
    }, {
      data: 'store',
      name: 'store'
    }, {
      data: 'orderdate',
      name: 'orderdate'
    }, {
      data: 'customer',
      name: 'customer'
    }, {
      data: 'product',
      name: 'product'
    }, {
      data: 'rate',
      name: 'rate'
    }, {
      data: 'quantity',
      name: 'quantity'
    }, {
      data: 'total',
      name: 'total'
    }]
  });
}

$(document).on('click', '.deletebtn', function () {
  $('#idDelete').val($(this).data('ordernumber'));
  $('#ordernameDelete').html($(this).data('ordernumber'));
});
$(document).on('click', '.paymentbtn', function () {
  $('#idEdit').val($(this).data('ordernumber'));
  $('#payamountEdit').val($(this).data('paidamount'));
  $('#dueamountEdit').val($(this).data('dueamount'));
  $('#paymenttypeEdit').val($(this).data('paymenttype'));
  $('#paymentstatusEdit').val($(this).data('paymentstatus'));
});

/***/ }),

/***/ 2:
/*!************************************************************************!*\
  !*** multi ./resources/assets/js/controllers/manageorderController.js ***!
  \************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\invent\src\resources\assets\js\controllers\manageorderController.js */"./resources/assets/js/controllers/manageorderController.js");


/***/ })

/******/ });