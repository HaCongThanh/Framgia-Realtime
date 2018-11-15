<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $role = Role::where('name', 'super-admin')->first();

        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            DB::table('permission_role')->insert([
                'role_id' => $role->id,
                'permission_id' => $permission->id,
            ]);
        }
    }
}
