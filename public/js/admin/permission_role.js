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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin/permission_role.js":
/***/ (function(module, exports) {

$(function () {
    /*DataTable*/
    var role_id = $('#role_id').val();

    var table = $('#permission_role_table').DataTable({
        processing: true,
        language: {
            processing: "<div id='loader'>Đang tìm! Chờ chút. Hmm...!</div>"
        },
        serverSide: true,
        // ordering: false,
        order: [],
        ajax: {
            url: route('admin.roles.get_list_permission_role', [role_id])
        },
        columns: [{ data: 'DT_Row_Index', name: 'id' }, { data: 'display_name', name: 'display_name' }, { data: 'description', name: 'description' }, { data: 'created_at', name: 'created_at' }, { data: 'action', name: 'action' }]
    });
    /*----------*/

    /*Thêm - Xóa quyền hạn*/
    function updatePermission(role_id, permission_id) {
        var checked = $('#checked-' + permission_id).val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: route('admin.roles.update_permission_role'),
            data: {
                checked: checked,
                role_id: role_id,
                permission_id: permission_id
            },
            success: function success(res) {
                if (res.message == 'deleted') {
                    $('#action-' + permission_id).removeClass('fa-check-circle').addClass('fa-circle-o');
                    $('#checked-' + permission_id).val(0);
                    toastr.success('Xóa thành công');
                }

                if (res.message == 'added') {
                    $('#action-' + permission_id).removeClass('fa-circle-o').addClass('fa-check-circle');
                    $('#checked-' + permission_id).val(1);
                    toastr.success('Thêm thành công');
                }
            },
            error: function error(xhr, ajaxOptions, thrownError) {
                toastr.error(thrownError);
            }
        });
    }
    /*--------------------*/
});

/***/ }),

/***/ 6:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./resources/js/admin/permission_role.js");


/***/ })

/******/ });