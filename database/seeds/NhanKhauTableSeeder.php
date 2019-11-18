<?php

use Illuminate\Database\Seeder;

class NhanKhauTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');

        $totalThonXom = DB::table("thonxom")->count();
        $totalHoKhau = DB::table("hokhau")->count();

        $relations = ['ông', 'bà', 'bố', 'mẹ', 'con', 'con dâu', 'chồng','vợ'];
        $jobs = ['học sinh', 'sinh viên', 'công nhân', 'bác sỹ', 'nông dân', 'giáo Viên'];


        for($i = 1; $i <= $totalHoKhau; $i++) {
            // Random số người trong 1 hộ từ 2->5 người
            $totalPerson = rand(2, 5);
            for($j = 0; $j < $totalPerson; $j++) {

                $relation = $relations[rand(0, count($relations)-1)];
                $name = $faker->lastName . " " . $faker->firstName . " " . $faker->firstName;
                if($j == 0) {
                    $relation = 'chủ hộ';
                    $name = DB::table("hokhau")->where("id", $i)->get();
                    $name = $name[0]->TenChuHo;
                }

                DB::table("nhankhau")->insert([
                    'MaNhanKhau' => $this->generateRandomString(3) . rand(1000,9999),
                    'QuanHe' => $relation,
                    'HoTen' => $name,
                    'GioiTinh' => rand(0,1),
                    'NgaySinh' => $this->getRandomTimestamps(-70*365),
                    'DanToc' => 'Kinh',
                    'QuocTich' => 'VietNam',
                    'CMND' => rand(11111111,99999999),
                    'NgheNghiep' => $jobs[rand(0, count($jobs)-1)],
                    'NoiLamViec' => $faker->city,
                    'idHoKhau' => $i
                ]);
            }

            
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

    function getRandomTimestamps($backwardDays = -800)
	{
		$backwardCreatedDays = rand($backwardDays, 0);

		return \Carbon\Carbon::now()->addDays($backwardCreatedDays)->addMinutes(rand(0, 60 * 23))->addSeconds(rand(0, 60));
	}
}
