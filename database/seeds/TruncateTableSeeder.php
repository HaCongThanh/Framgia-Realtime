<?php

use Illuminate\Database\Seeder;

class TruncateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('role_user')->truncate();
        DB::table('permissions')->truncate();
        DB::table('permission_role')->truncate();
        DB::table('revenues')->truncate();
        DB::table('room_rental_lists')->truncate();
        DB::table('rooms')->truncate();
        DB::table('facility_room_type')->truncate();
        DB::table('images')->truncate();
        DB::table('customer_booking_logs')->truncate();
        DB::table('room_types')->truncate();
        DB::table('email_templates')->truncate();
        DB::table('comments')->truncate();
        DB::table('category_post')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
