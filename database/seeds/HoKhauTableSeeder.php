<?php
use Illuminate\Database\Seeder;

class HoKhauTableSeeder extends Seeder {
    public function run() {
        $faker = Faker\Factory::create('vi_VN');
        $totalThonXom = DB::table("thonxom")->count();
        for($i = 0; $i < 100; $i++) {
            $mhk = rand(1000, 9999);
            $exist = DB::table("hokhau")->where("MaHoKhau", $mhk)->get();
            if($i > 0) {
                while(count($exist) != 0) {
                    $mhk = rand(1000, 9999);
                    $exist = DB::table("hokhau")->where("MaHoKhau", $mhk)->get();
                }
            }
            DB::table("hokhau")->insert([
                'MaHoKhau' => $mhk,
                'TenChuHo' => $faker->lastName . " " . $faker->firstName . " " . $faker->firstName,
                'idThonXom' => rand(1, $totalThonXom),
                'NgayCap' => $this->getRandomTimestamps(),
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

    function getRandomTimestamps($backwardDays = -800) {
        $backwardCreatedDays = rand($backwardDays, 0);
        return \Carbon\Carbon::now()->addDays($backwardCreatedDays)->addMinutes(rand(0, 60 * 23))->addSeconds(rand(0, 60));
    }
} 