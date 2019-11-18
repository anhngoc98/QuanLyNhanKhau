<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("role")->insert([
            'TenQuyen' => 'Người dùng'
        ]);

        DB::table("role")->insert([
            'TenQuyen' => 'Quản lý cấp thôn xóm'
        ]);

        DB::table("role")->insert([
            'TenQuyen' => 'Quản lý cấp xã phường'
        ]);

        DB::table("role")->insert([
            'TenQuyen' => 'Quản trị hệ thống'
        ]);

        DB::table("role")->insert([
            'TenQuyen' => 'Lãnh đạo cấp tỉnh'
        ]);

        DB::table("role")->insert([
            'TenQuyen' => 'Lãnh đạo cấp huyện'
        ]);
    }
}
