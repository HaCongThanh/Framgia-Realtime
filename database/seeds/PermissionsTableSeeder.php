<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name'          =>  'view-posts',
            'display_name'  =>  'Xem bài viết',
        ]);

        Permission::create([
            'name'          =>  'edit-posts',
            'display_name'  =>  'Sửa bài viết',
        ]);

        Permission::create([
            'name'          =>  'add-posts',
            'display_name'  =>  'Thêm bài viết',
        ]);

        Permission::create([
            'name'          =>  'delete-posts',
            'display_name'  =>  'Xóa bài viết',
        ]);

        Permission::create([
            'name' => 'view-room-types',
            'display_name' => 'Xem danh sách loại phòng',
        ]);

        Permission::create([
            'name' => 'add-room-types',
            'display_name' => 'Thêm loại phòng',
        ]);

        Permission::create([
            'name' => 'detail-room-types',
            'display_name' => 'Xem chi tiết loại phòng',
        ]);

        Permission::create([
            'name' => 'edit-room-types',
            'display_name' => 'Sửa loại phòng',
        ]);

        Permission::create([
            'name' => 'delete-room-types',
            'display_name' => 'Xóa loại phòng',
        ]);

        Permission::create([
            'name'          =>  'add-rooms',
            'display_name'          =>  'Thêm phòng',
        ]);

        Permission::create([
            'name'          =>  'edit-rooms',
            'display_name'          =>  'Sửa phòng',
        ]);

        Permission::create([
            'name'          =>  'delete-rooms',
            'display_name'          =>  'Xóa phòng',
        ]);

        Permission::create([
            'name' => 'view-facilities',
            'display_name' => 'Xem danh sách tiện nghi',
        ]);

        Permission::create([
            'name' => 'add-facilities',
            'display_name' => 'Thêm tiện nghi',
        ]);

        Permission::create([
            'name' => 'detail-facilities',
            'display_name' => 'Xem tiện nghi',
        ]);

        Permission::create([
            'name' => 'edit-facilities',
            'display_name' => 'Sửa tiện nghi',
        ]);

        Permission::create([
            'name' => 'delete-facilities',
            'display_name' => 'Xóa tiện nghi',
        ]);

        Permission::create([
            'name' => 'view-booking-list',
            'display_name' => 'Xem danh sách đặt phòng',
        ]);

        Permission::create([
            'name' => 'view-categories',
            'display_name' => 'Xem danh sách danh mục',
        ]);

        Permission::create([
            'name' => 'add-categories',
            'display_name' => 'Thêm danh mục',
        ]);

        Permission::create([
            'name' => 'detail-categories',
            'display_name' => 'Xem chi tiết danh mục',
        ]);

        Permission::create([
            'name' => 'edit-categories',
            'display_name' => 'Sửa danh mục',
        ]);

        Permission::create([
            'name' => 'delete-categories',
            'display_name' => 'Xóa danh mục',
        ]);

        Permission::create([
            'name'          =>  'add-users',
            'display_name'          =>  'Thêm nhân viên',
        ]);

        Permission::create([
            'name'          =>  'edit-users',
            'display_name'          =>  'Sửa nhân viên',
        ]);

        Permission::create([
            'name'          =>  'delete-users',
            'display_name'          =>  'Xóa nhân viên',
        ]);

        Permission::create([
            'name'          =>  'view-customers',
            'display_name'          =>  'Xem chi tiết khách hàng',
        ]);

        Permission::create([
            'name'          =>  'delete-customers',
            'display_name'          =>  'Xóa khách hàng',
        ]);

        Permission::create([
            'name'          =>  'select-role-users',
            'display_name'  =>  'Chọn vai trò cho người dùng',
        ]);

        Permission::create([
            'name'          =>  'view-roles',
            'display_name'          =>  'Xem vai trò',
        ]);

        Permission::create([
            'name'          =>  'add-roles',
            'display_name'          =>  'Thêm vai trò',
        ]);

        Permission::create([
            'name'          =>  'edit-roles',
            'display_name'          =>  'Sửa vai trò',
        ]);

        Permission::create([
            'name'          =>  'delete-roles',
            'display_name'          =>  'Xóa vai trò',
        ]);

        Permission::create([
            'name'          =>  'select-permission',
            'display_name'          =>  'Chọn quyền hạn cho vai trò',
        ]);
        
        Permission::create([
            'name'          =>  'view-permission',
            'display_name'          =>  'Xem quyền hạn',
        ]);
    }
}
