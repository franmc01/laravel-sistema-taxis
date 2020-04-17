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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/vehicle.js":
/*!*********************************!*\
  !*** ./resources/js/vehicle.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('#vehicle_table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: "{{ route('vehiculos.index') }}"
    },
    columns: [{
      data: 'marca',
      name: 'marca'
    }, {
      data: 'tipoVehiculo',
      name: 'tipoVehiculo'
    }, {
      data: 'placa',
      name: 'placa'
    }, {
      data: 'anio',
      name: 'anio'
    }, {
      data: 'users.nombres',
      name: 'users.nombres'
    }, {
      data: 'users.apellidos',
      name: 'users.apellidos'
    }, {
      data: 'action',
      name: 'action',
      orderable: false
    }]
  });
  $('#sample_form').on('submit', function (event) {
    event.preventDefault();

    if ($('#action').val() == "Edit") {
      $.ajax({
        url: "{{ route('vehiculos.update') }}",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        dataType: "json",
        success: function success(data) {
          var html = '';

          if (data.errors) {
            html = '<div class="alert alert-danger alert-dismissible">';
            html += '<ul>';

            for (var count = 0; count < 1; count++) {
              html += '<li>' + data.errors[count] + '</li>';
            }

            html += '</ul';
            html += '</div>';
          }

          if (data.success) {
            html = '<div class="alert alert-success">' + data.success + '</div>';
            $('#sample_form')[0].reset();
            $('#store_image').html('');
            $('#vehicle_table').DataTable().ajax.reload();
          }

          $('#form_result').html(html);
        }
      });
    }
  });
  $(document).on('click', '.edit', function () {
    var id = $(this).attr('id');
    $('#form_result').html('');
    $.ajax({
      url: "/vehiculos/" + id + "/edit",
      dataType: "json",
      success: function success(html) {
        $('#marca').val(html.data.marca);
        $('#tipoVehiculo').val(html.data.tipoVehiculo);
        $('#placa').val(html.data.placa);
        $('#anio').val(html.data.anio);
        $('#user_id').val(html.data.user_id); //                  $('#store_image').html("<img src= {{ URL::to('/') }}/images/" + html.data.image + " width='70' class='img-thumbnail' />");

        $('#hidden_id').val(html.data.id);
        $('.modal-title').text("Edit New Record");
        $('#action_button').val("Edit");
        $('#action').val("Edit");
        $('#formModal').modal('show');
      }
    });
  }); //inicia el desmadre

  $(document).on('click', '.view', function () {
    var id = $(this).attr('id');
    $('#form_result').html('');
    $.ajax({
      url: "/vehiculos/" + id,
      dataType: "json",
      success: function success(html) {
        $('#vmarca').text(html.data.marca);
        $('#vtipoVehiculo').text(html.data.tipoVehiculo);
        $('#vplaca').text(html.data.placa);
        $('#vanio').text(html.data.anio);
        $('#vuser_id').text(html.data.user_id);
        $('#vusernombres').text(html.data.users.nombres);
        $('#vuserapellidos').text(html.data.users.apellidos);
        $('#vstore_image').html("<img src= {{ URL::to('storage') }}/" + html.data.users.foto_perfil + " style='text-align:center' class='img-rounded img-fill' height='220' width='220'/>");
        $('#exampleModal').modal('show');
      }
    });
  }); //termina el desmadre

  var user_id;
  $(document).on('click', '.delete', function () {
    user_id = $(this).attr('id');
    $('#confirmModal').modal('show');
  });
  $('#ok_button').click(function () {
    $.ajax({
      url: "vehiculos/destroy/" + user_id,
      beforeSend: function beforeSend() {
        $('#ok_button').text('Deleting...');
      },
      success: function success(data) {
        setTimeout(function () {
          $('#confirmModal').modal('hide');
          $('#vehicle_table').DataTable().ajax.reload();
        }, 2000);
      }
    });
  });
});

/***/ }),

/***/ 1:
/*!***************************************!*\
  !*** multi ./resources/js/vehicle.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\Trabajo\taxis\Version-BETA\resources\js\vehicle.js */"./resources/js/vehicle.js");


/***/ })

/******/ });