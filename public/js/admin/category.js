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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin/category.js":
/***/ (function(module, exports) {

$(function () {
    /*DataTable*/
    var table = $('#categories_table').DataTable({
        processing: true,
        serverSide: true,
        order: [],
        ajax: {
            url: route('admin.categories.get_categories')
        },
        columns: [{ data: 'DT_Row_Index', name: 'id' }, { data: 'name', name: 'name' }, {
            data: 'action',
            name: 'action',
            render: function render(data) {
                $string = '';

                if (data.editCategories == 1) {
                    $string = $string + '<a href="javascript:;" data-id="' + data.categoryId + '"\
                                            class="text-gray edit_category" title="Chỉnh sửa">\
                                            <i class="ti-pencil" style="color: #ffc107; font-size: 20px;"></i></a>' + '&nbsp;&nbsp;';
                }

                if (data.deleteCategories == 1) {
                    $string = $string + '&nbsp;&nbsp;' + '<a href="javascript:;" data-id="' + data.categoryId + '"\
                                            class="text-gray delete_category" title="Xóa">\
                                            <i class="ti-trash" style="color: #dc3545; font-size: 20px;"></i></a>';
                }

                return $string;
            }
        }]
    });
    /*----------*/

    /*Gọi Modal thêm mới danh mục*/
    $(document).on('click', '#add_category_call', function () {
        $('#add_category_modal').modal('show');
        $('#name').val('');
    });
    /*--------------------------*/

    /*Ấn nút Tạo danh mục mới*/
    $('#add_category_btn').on('click', function (event) {
        event.preventDefault();

        var name = $('#name').val();

        if (name == '') {
            toastr.error('Tên danh mục không được trống');
        } else {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: route('categories.store'),
                data: {
                    name: name
                },
                success: function success(res) {
                    if (res.error == 'valid') {
                        var arr = res.message;
                        var key = Object.keys(arr);

                        for (var i = 0; i < key.length; i++) {
                            toastr.error(arr[key[i]]);
                        }
                    } else if (res.error == false) {
                        toastr.success('Thêm danh mục thành công');

                        $('#add_category_modal').modal('hide');

                        table.ajax.reload();
                    } else {
                        //
                    }
                },
                error: function error(xhr, ajaxOptions, thrownError) {
                    // 
                }
            });
        }
    });
    /*------------------------*/

    /*Gọi Modal Cập nhật danh mục*/
    $(document).on('click', '.edit_category', function () {
        $('#edit_category_modal').modal('show');

        var categoryId = $(this).data('id');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: route('categories.edit', [categoryId]),
            success: function success(res) {
                $('#edit_name').val(res.category.name);
                $('#category_id').val(res.category.id);
            },
            error: function error(xhr, ajaxOptions, thrownError) {
                // 
            }
        });
    });
    /*--------------------------*/

    /*Ấn nút Cập nhật danh mục*/
    $('#edit_category_btn').on('click', function (event) {
        event.preventDefault();

        var name = $('#edit_name').val();
        var categoryId = $('#category_id').val();

        if (name == '') {
            toastr.error('Tên danh mục không được trống');
        } else {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'PUT',
                url: route('categories.update', [categoryId]),
                data: {
                    name: name
                },
                success: function success(res) {
                    if (res.error == 'valid') {
                        var arr = res.message;
                        var key = Object.keys(arr);

                        for (var i = 0; i < key.length; i++) {
                            toastr.error(arr[key[i]]);
                        }
                    } else if (res.error == false) {
                        toastr.success('Sửa danh mục thành công');

                        $('#edit_category_modal').modal('hide');

                        table.ajax.reload();
                    } else {
                        //
                    }
                },
                error: function error(xhr, ajaxOptions, thrownError) {
                    // 
                }
            });
        }
    });
    /*------------------------*/

    /*Xóa danh mục*/
    $(document).on('click', '.delete_category', function () {
        var categoryId = $(this).data('id');

        swal({
            title: 'Có chắc chắn xóa danh mục này?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            cancelButtonText: 'Không',
            confirmButtonText: 'Có'
        }, function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'DELETE',
                url: route('categories.destroy', [categoryId]),
                success: function success(res) {
                    toastr.success('Xóa danh mục thành công');

                    table.ajax.reload();
                },
                error: function error(xhr, ajaxOptions, thrownError) {
                    // 
                }
            });
        });
    });
    /*------------*/
});

/***/ }),

/***/ 3:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./resources/js/admin/category.js");


/***/ })

/******/ });