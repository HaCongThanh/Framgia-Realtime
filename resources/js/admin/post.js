$(function() {
    /*DataTable*/
    var table = $('#posts_table').DataTable({
        processing: true,
        serverSide: true,
        order: [],
        ajax: {
            url: route('admin.posts.get_posts'),
        },
        columns: [
            {data: 'DT_Row_Index', name: 'id'},
            {data: 'action2', name: 'image'},
            {data: 'name', name: 'name'},
            {data: 'category_id', name: 'category_id'},
            {data: 'user_id', name: 'user_id'},
            {data: 'status', name: 'status'},
            {
                data: 'action',
                name: 'action',
                render: function (data) {
                    $string = '';

                    if (data.editPosts == 1) {
                        $string = $string + '<a href="' + route('posts.edit', data.postId) + '" data-id="' + data.postId + '"\
                                            class="text-gray edit_post" title="Chỉnh sửa">\
                                            <i class="ti-pencil" style="color: #ffc107; font-size: 20px;"></i></a>' + '&nbsp;&nbsp;';
                    }

                    if (data.deletePosts == 1) {
                        $string = $string + '&nbsp;&nbsp;' + '<a href="javascript:;" data-id="' + data.postId + '"\
                                            class="text-gray delete_post" title="Xóa">\
                                            <i class="ti-trash" style="color: #dc3545; font-size: 20px;"></i></a>'
                    }

                    return $string;
                }
            }
        ]
    });
    /*----------*/

    /*Xóa bài viết*/
    $(document).on('click', '.delete_post', function() {
        var postId = $(this).data('id');

        swal({
            title: 'Có chắc chắn xóa bài viết này?',
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
                url: route('posts.destroy', [postId]),
                success: function(res)
                {
                    toastr.success('Xóa bài viết thành công');

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
