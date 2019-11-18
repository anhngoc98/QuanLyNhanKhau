<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(XaPhuongTableSeeder::class);
        $this->call(ThonXomTableSeeder::class);
        $this->call(HoKhauTableSeeder::class);
        $this->call(NhanKhauTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);

    }
}
