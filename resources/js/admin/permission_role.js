$(function() {
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
            url: route('admin.roles.get_list_permission_role', [role_id]),
        },
        columns: [
            {data: 'DT_Row_Index', name: 'id'},
            {data: 'display_name', name: 'display_name'},
            {data: 'description', name: 'description'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action'}
        ]
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
                permission_id: permission_id,
            },
            success: function(res)
            {
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
            error: function (xhr, ajaxOptions, thrownError) {
                toastr.error(thrownError);
            }
        });
    }
    /*--------------------*/
});
