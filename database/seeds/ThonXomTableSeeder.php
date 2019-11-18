<?php

use Illuminate\Database\Seeder;

class ThonXomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');

        $totalXaPhuong = DB::table("xaphuong")->count();

        for($i = 0; $i < 30; $i++) {
            DB::table("thonxom")->insert([
                'TenThonXom' => "Thôn " . $faker->firstName . " " . $faker->firstName,
                'idXaPhuong' => rand(1, $totalXaPhuong)
            ]);
        }
    }
}
