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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin/room-type.js":
/***/ (function(module, exports) {

$(function () {
    /*DataTable*/
    var table = $('#room_types_table').DataTable({
        processing: true,
        serverSide: true,
        order: [],
        ajax: {
            url: route('admin.room_types.get_room_types')
        },
        columns: [{ data: 'DT_Row_Index', name: 'id' }, { data: 'name', name: 'name' }, { data: 'room_size', name: 'room_size' }, { data: 'bed', name: 'bed' }, { data: 'max_people', name: 'max_people' }, { data: 'price', name: 'price' }, {
            data: 'action',
            name: 'action',
            render: function render(data) {
                $string = '';

                if (data.detailRoomTypes == 1) {
                    $string = $string + '<a href="javascript:;" data-id="' + data.roomTypeId + '"\
                                            class="text-gray detail_room_type" title="Xem chi tiết">\
                                            <i class="ti-eye" style="color: #28a745; font-size: 20px;"></i></a>' + '&nbsp;&nbsp;';
                }

                if (data.editRoomTypes == 1) {
                    $string = $string + '&nbsp;&nbsp;' + '<a href="' + route('room-types.edit', data.roomTypeId) + '"\
                                            class="text-gray" title="Chỉnh sửa">\
                                            <i class="ti-pencil" style="color: #ffc107; font-size: 20px;"></i></a>' + '&nbsp;&nbsp;';
                }

                if (data.deleteRoomTypes == 1) {
                    $string = $string + '&nbsp;&nbsp;' + '<a href="javascript:;" data-id="' + data.roomTypeId + '"\
                                            class="text-gray delete_room_type" title="Xóa">\
                                            <i class="ti-trash" style="color: #dc3545; font-size: 20px;"></i></a>';
                }

                return $string;
            }
        }]
    });
    /*----------*/
});

/***/ }),

/***/ 2:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./resources/js/admin/room-type.js");


/***/ })

/******/ });