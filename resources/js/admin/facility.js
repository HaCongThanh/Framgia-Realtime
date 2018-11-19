$(function() {
    /*DataTable*/
    var table = $('#facilities_table').DataTable({
        processing: true,
        serverSide: true,
        order: [],
        ajax: {
            url: route('admin.facilities.get_facilities'),
        },
        columns: [
            {data: 'DT_Row_Index', name: 'id'},
            {data: 'name', name: 'name'},
            {
                data: 'action',
                name: 'action',
                render: function (data) {
                    $string = '';

                    if (data.editFacilities == 1) {
                        $string = $string + '<a href="javascript:;" data-id="' + data.facilityId + '"\
                                            class="text-gray edit_facility" title="Chỉnh sửa">\
                                            <i class="ti-pencil" style="color: #ffc107; font-size: 20px;"></i></a>' + '&nbsp;&nbsp;';
                    }

                    if (data.deleteFacilities == 1) {
                        $string = $string + '&nbsp;&nbsp;' + '<a href="javascript:;" data-id="' + data.facilityId + '"\
                                            class="text-gray delete_facility" title="Xóa">\
                                            <i class="ti-trash" style="color: #dc3545; font-size: 20px;"></i></a>'
                    }

                    return $string;
                }
            }
        ]
    });
    /*----------*/

    /*Gọi Modal thêm mới tiện nghi*/
    $(document).on('click', '#add_facility_call', function() {
        $('#add_facility_modal').modal('show');
        $('#name').val('');
    });
    /*--------------------------*/

    /*Ấn nút Tạo tiện nghi mới*/
    $('#add_facility_btn').on('click', function (event) {
        event.preventDefault();

        var name = $('#name').val();

        if (name == '') {
            toastr.error('Tên tiện nghi không được trống')
        } else {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: route('facilities.store'),
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
                        toastr.success('Thêm tiện nghi thành công');

                        $('#add_facility_modal').modal('hide');

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

    /*Gọi Modal Cập nhật tiện nghi*/
    $(document).on('click', '.edit_facility', function() {
        $('#edit_facility_modal').modal('show');

        var facilityId =  $(this).data('id');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: route('facilities.edit', [facilityId]),
            success: function (res)
            {
                $('#edit_name').val(res.facility.name);
                $('#facility_id').val(res.facility.id);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                // 
            }
        });
    });
    /*--------------------------*/

    /*Ấn nút Cập nhật tiện nghi*/
    $('#edit_facility_btn').on('click', function (event) {
        event.preventDefault();

        var name = $('#edit_name').val();
        var facilityId = $('#facility_id').val();

        if (name == '') {
            toastr.error('Tên tiện nghi không được trống')
        } else {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'PUT',
                url: route('facilities.update', [facilityId]),
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
                        toastr.success('Sửa tiện nghi thành công');

                        $('#edit_facility_modal').modal('hide');

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

    /*Xóa tiện nghi*/
    $(document).on('click', '.delete_facility', function() {
        var facilityId = $(this).data('id');

        swal({
            title: 'Có chắc chắn xóa tiện nghi này?',
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
                url: route('facilities.destroy', [facilityId]),
                success: function(res)
                {
                    toastr.success('Xóa tiện nghi thành công');

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
