$(function() {
    /*DataTable*/
    var table = $('#room_types_table').DataTable({
        processing: true,
        serverSide: true,
        order: [],
        ajax: {
            url: route('admin.room_types.get_room_types'),
        },
        columns: [
            {data: 'DT_Row_Index', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'room_size', name: 'room_size'},
            {data: 'bed', name: 'bed'},
            {data: 'max_people', name: 'max_people'},
            {data: 'price', name: 'price'},
            {
                data: 'action',
                name: 'action',
                render: function (data) {
                    $string = '';

                    if (data.detailRoomTypes == 1) {
                        $string = $string + '<a href="' + route('user.rooms.show', data.roomTypeId) + '" target="_blank" data-id="' + data.roomTypeId + '"\
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
                                            <i class="ti-trash" style="color: #dc3545; font-size: 20px;"></i></a>'
                    }

                    return $string;
                }
            }
        ]
    });
    /*----------*/

    /*Xóa loại phòng*/
    $(document).on('click', '.delete_room_type', function() {
        var roomTypeId = $(this).data('id');

        swal({
            title: 'Có chắc chắn xóa loại phòng này?',
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
                url: route('room-types.destroy', [roomTypeId]),
                success: function(res)
                {
                    toastr.success('Xóa loại phòng thành công');

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
