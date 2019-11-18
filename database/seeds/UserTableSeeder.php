<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');

        $totalNhanKhau = DB::table("nhankhau")->count();
        $totalRole = DB::table("role")->count();

        for($i = 1; $i <= $totalNhanKhau; $i++) {
            DB::table("users")->insert([
                'idNhanKhau' => $i,
                'TenDangNhap' => $this->generateRandomString(10),
                'password' => bcrypt('123456'),
                'SoDienThoai' => $faker->phoneNumber,
                'idRole' => rand(1, $totalRole)
            ]);
        }
    }
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
