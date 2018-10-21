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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

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
    }
}
