<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\HoKhau;
use App\NhanKhau;
use App\XaPhuong;
class ThongKeController extends Controller
{
    public function thongke()
    {
        $hokhau = HoKhau::all();
        $hk = count($hokhau);
        $nhankhau = NhanKhau::all();
        $nk = count($nhankhau);
        $nam = count(NhanKhau::where('GioiTinh', 1)->get());
        $nu = count(NhanKhau::where('GioiTinh', 0)->get());
        $xaphuong = XaPhuong::paginate(10);
        $namht = Carbon::now()->year;
        $tuoi = 0;
        foreach($nhankhau as $item)
        {
           $tuoi+= $namht - (int)date('Y', strtotime($item['NgaySinh']));
        }
        
        $tuoitb = round($tuoi/$nk, 2);
        return view('admin.thongke.index', ['hokhau' => $hk, 'nhankhau' => $nk, 'nam' => $nam, 'nu' => $nu, 'xaphuong' => $xaphuong, 'tuoitb' => $tuoitb]);
    }

    public function chitiet($id)
    {
        $xaphuongall = XaPhuong::paginate(10);
        $xp = XaPhuong::find($id);
        $thonxom = $xp->thonxom;
        $hokhau = 0;
        $nhankhau = 0;
        $nam = 0;
        $tuoi = 0;
        $namht = Carbon::now()->year;
        foreach($thonxom as $item)
        {
            $hk = $item->hokhau;
            $hokhau+= count($hk);   
            foreach($hk as $item)
            {
                $idhk = $item->id;
                $nk = $item->nhankhau;
                foreach($nk as $item)
                {
                    $tuoi+= $namht - (int)date('Y', strtotime($item['NgaySinh']));
                }
                $nhankhau+= count($nk);
                $n = NhanKhau::where([['idHoKhau', '=', $idhk],['GioiTinh','=', 1]])->get();
                $nam+=count($n);
            }
            $nu = $nhankhau - $nam;
        }
        $tuoitb = round($tuoi/$nhankhau, 2);
        return view('admin.thongke.chitiet', ['xaphuongall' => $xaphuongall, 'xaphuong' => $xp, 'hokhau' => $hokhau, 'nhankhau' => $nhankhau, 'nam' => $nam, 'nu' => $nu, 'tuoitb' => $tuoitb]);
    }
}
