<?php

use Illuminate\Database\Seeder;

class XaPhuongTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');

        for($i = 0; $i < 10; $i++) {
            DB::table("xaphuong")->insert([
                'TenXaPhuong' => "Xã " . $faker->firstName . " " . $faker->firstName
            ]);
        }
    }
}
