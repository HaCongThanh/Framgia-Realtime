<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@framgia.com',
            'password' => bcrypt('123123'),
            'gender' => 1,
            'birthday' => '1991-12-19',
            'mobile' => '0969991219',
            'address' => 'Số 4, ngách 105/41, ngõ 105, Yên Hòa, Cầu Giấy, Hà Nội.',
            'type' => 1,
            'expire' => 12,
            'card_type' => 'Visa',
            'card_number' => '0630199612191991',
            'year' => '2019',
        ]);

        User::create([
            'name' => 'Nhân viên',
            'email' => 'user@framgia.com',
            'password' => bcrypt('123123'),
            'gender' => 0,
            'birthday' => '1992-01-20',
            'mobile' => '0969991229',
            'address' => 'Số 5, ngách 216/52, ngõ 216, Yên Hòa, Cầu Giấy, Hà Nội.',
            'type' => 1,
            'expire' => 01,
            'card_type' => 'Master Card',
            'card_number' => '1741200723202002',
            'year' => '2020',
        ]);

        User::create([
            'name' => 'Khách hàng',
            'email' => 'customer@framgia.com',
            'password' => bcrypt('123123'),
            'gender' => 0,
            'birthday' => '1991-12-19',
            'mobile' => '0969990630',
            'address' => 'Số 4, ngách 105/41, ngõ 105, Yên Hòa, Cầu Giấy, Hà Nội.',
            'type' => 0,
            'expire' => 12,
            'card_type' => 'Visa',
            'card_number' => '0630199612191991',
            'year' => '2019',
        ]);
    }
}
