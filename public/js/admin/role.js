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
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin/role.js":
/***/ (function(module, exports) {

$(function () {
    /*DataTable*/
    var table = $('#roles_table').DataTable({
        processing: true,
        language: {
            processing: "<div id='loader'>Đang tìm! Chờ chút. Hmm...!</div>"
        },
        serverSide: true,
        // ordering: false,
        order: [],
        ajax: {
            url: route('admin.roles.get_list_roles')
        },
        columns: [{ data: 'DT_Row_Index', name: 'id' }, { data: 'display_name', name: 'display_name' }, { data: 'name', name: 'name' }, { data: 'description', name: 'description' }, { data: 'created_at', name: 'created_at' }, { data: 'action', name: 'action' }]
    });
    /*----------*/

    /*Gọi Modal thêm mới vai trò*/
    $(document).on('click', '#call_add_role', function () {
        $('#add_role_modal').modal('show');
        $('#name').val('');
        $('#display_name').val('');
        $('#description').val('');
    });
    /*--------------------------*/

    /*Ấn nút Tạo vai trò mới*/
    $('#add_role').on('click', function (event) {
        event.preventDefault();

        var form = $('#add_role_form');
        var formData = form.serialize();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: route('roles.store'),
            data: formData,
            success: function success(res) {
                if (res.error == 'valid') {
                    var arr = res.message;
                    var key = Object.keys(arr);

                    for (var i = 0; i < key.length; i++) {
                        toastr.error(arr[key[i]]);
                    }
                } else if (res.error == false) {
                    toastr.success("Thành công");

                    $('#add_role_modal').modal('hide');

                    table.ajax.reload();
                } else {
                    //
                }
            },
            error: function error(xhr, ajaxOptions, thrownError) {
                // 
            }
        });
    });
    /*------------------------*/

    /*Gọi Modal Cập nhật vai trò*/
    $(document).on('click', '.role_edit', function () {
        $('#edit_role_modal').modal('show');

        var role_id = $(this).data('id');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: route('roles.edit', [role_id]),
            success: function success(res) {
                $('#edit_display_name').val(res.role['display_name']);
                $('#edit_name').val(res.role['name']);
                $('#edit_description').val(res.role['description']);
                $('#role_id').val(res.role['id']);
            },
            error: function error(xhr, ajaxOptions, thrownError) {
                toastr.error(thrownError);
            }
        });
    });
    /*--------------------------*/

    /*Ấn nút Cập nhật vai trò*/
    $('#edit_role').on('click', function (event) {
        event.preventDefault();

        var role_id = $('#role_id').val();
        var form = $('#edit_role_form');
        var formData = form.serialize();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'PUT',
            url: route('roles.update', [role_id]),
            data: formData,
            success: function success(res) {
                if (res.error == 'valid') {
                    var arr = res.message;
                    var key = Object.keys(arr);

                    for (var i = 0; i < key.length; i++) {
                        toastr.error(arr[key[i]]);
                    }
                } else if (res.error == false) {
                    toastr.success("Cập nhật vai trò thành công!");

                    $('#edit_role_modal').modal('hide');

                    table.ajax.reload();
                } else {
                    //
                }
            },
            error: function error(xhr, ajaxOptions, thrownError) {
                // 
            }
        });
    });
    /*------------------------*/

    /*Xóa vai trò*/
    $(document).on('click', '.role_delete', function () {
        var role_id = $(this).data('id');

        swal({
            title: "Bạn có chắc muốn xóa?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            cancelButtonText: "Không",
            confirmButtonText: "Có"
        }, function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'DELETE',
                url: route('roles.destroy', [role_id]),
                success: function success(res) {
                    toastr.success('Xóa thành công vai trò!');

                    table.ajax.reload();
                },
                error: function error(xhr, ajaxOptions, thrownError) {
                    toastr.error(thrownError);
                }
            });
        });
    });
    /*------------*/
});

/***/ }),

/***/ 5:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./resources/js/admin/role.js");


/***/ })

/******/ });