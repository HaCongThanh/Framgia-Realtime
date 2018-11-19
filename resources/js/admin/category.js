$(function() {
    /*DataTable*/
    var table = $('#categories_table').DataTable({
        processing: true,
        serverSide: true,
        order: [],
        ajax: {
            url: route('admin.categories.get_categories'),
        },
        columns: [
            {data: 'DT_Row_Index', name: 'id'},
            {data: 'name', name: 'name'},
            {
                data: 'action',
                name: 'action',
                render: function (data) {
                    $string = '';

                    if (data.editCategories == 1) {
                        $string = $string + '<a href="javascript:;" data-id="' + data.categoryId + '"\
                                            class="text-gray edit_category" title="Chỉnh sửa">\
                                            <i class="ti-pencil" style="color: #ffc107; font-size: 20px;"></i></a>' + '&nbsp;&nbsp;';
                    }

                    if (data.deleteCategories == 1) {
                        $string = $string + '&nbsp;&nbsp;' + '<a href="javascript:;" data-id="' + data.categoryId + '"\
                                            class="text-gray delete_category" title="Xóa">\
                                            <i class="ti-trash" style="color: #dc3545; font-size: 20px;"></i></a>'
                    }

                    return $string;
                }
            }
        ]
    });
    /*----------*/

    /*Gọi Modal thêm mới danh mục*/
    $(document).on('click', '#add_category_call', function() {
        $('#add_category_modal').modal('show');
        $('#name').val('');
    });
    /*--------------------------*/

    /*Ấn nút Tạo danh mục mới*/
    $('#add_category_btn').on('click', function (event) {
        event.preventDefault();

        var name = $('#name').val();

        if (name == '') {
            toastr.error('Tên danh mục không được trống')
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
                    name: name,
                },
                success: function (res) {
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
                error: function (xhr, ajaxOptions, thrownError) {
                    // 
                }
            });
        }
    });
    /*------------------------*/

    /*Gọi Modal Cập nhật danh mục*/
    $(document).on('click', '.edit_category', function() {
        $('#edit_category_modal').modal('show');

        var categoryId =  $(this).data('id');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: route('categories.edit', [categoryId]),
            success: function (res)
            {
                $('#edit_name').val(res.category.name);
                $('#category_id').val(res.category.id);
            },
            error: function (xhr, ajaxOptions, thrownError) {
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
            toastr.error('Tên danh mục không được trống')
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
                    name: name,
                },
                success: function (res) {
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
                error: function (xhr, ajaxOptions, thrownError) {
                    // 
                }
            });
        }
    });
    /*------------------------*/

    /*Xóa danh mục*/
    $(document).on('click', '.delete_category', function() {
        var categoryId = $(this).data('id');

        swal({
            title: 'Có chắc chắn xóa danh mục này?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            cancelButtonText: 'Không',
            confirmButtonText: 'Có',
        },
        function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'DELETE',
                url: route('categories.destroy', [categoryId]),
                success: function(res)
                {
                    toastr.success('Xóa danh mục thành công');

                    table.ajax.reload();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    // 
                }
            });
        });
    });
    /*------------*/
});
