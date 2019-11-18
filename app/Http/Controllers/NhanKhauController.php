<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhanKhau;
use App\XaPhuong;
use App\ThonXom;
use App\HoKhau;
use Illuminate\Support\Facades\Auth;

class NhanKhauController extends Controller
{
    public function getDanhSach(Request $request){
        $nhankhau = NhanKhau::paginate(10);
        $xaphuong = XaPhuong::all();
        $thonxom = ThonXom::all();

        $idThonXom = $request->ThonXom;
        $idXaPhuong = $request->XaPhuong;

        if(isset($idThonXom))
        {
            $nhankhau = NhanKhau::join("hokhau", "hokhau.id", "=", "nhankhau.idHoKhau")->where('hokhau.idThonXom', $idThonXom)->take(30)->paginate(10);
        }
        else if(isset($idXaPhuong))
        {
            // $xp = XaPhuong::find($idXaPhuong);
            // $hokhau = [];
            // $tx = $xp->thonxom;
            // foreach($tx as $item) {
                
            //     $hk = HoKhau::where('idThonXom', $item->id)->take(30)->paginate(10);
            //     $hokhau = array_merge($hokhau, $hk);
            //     // $hokhau = $hk;
                
            // }
            $nhankhau = NhanKhau::join("hokhau", "hokhau.id", "=", "nhankhau.idHoKhau")->join("thonxom", "hokhau.idThonXom", "=", "thonxom.id")
                                ->join("xaphuong", "xaphuong.id", "=", "thonxom.idXaPhuong")
                                ->where("xaphuong.id", $idXaPhuong)->take(30)->paginate(10);
        }

        return view('admin.nhankhau.index',compact('nhankhau', 'xaphuong', 'thonxom'));
    }

    public function getThem(){
        $hokhau = HoKhau::all();
        $xaphuong = XaPhuong::all();
        $thonxom = ThonXom::all();
        return view('admin.nhankhau.them', ['hokhau' => $hokhau, 'xaphuong' => $xaphuong, 'thonxom' => $thonxom]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,[
            'QuanHe' => 'required',
            'MaHK' => 'required',
            'HoTen' => 'required|min:4',
            'NgaySinh' => 'required',
            'ThonXom' => 'required',
            'DanToc' => 'required',
            'QuocTich' => 'required',
            'TonGiao' => 'required',
            'CMND' => 'required',
            'NgheNghiep' => 'required',
            
        ],
        [
            'QuanHe.required' => 'Bạn chưa chọn quan hệ',
            'MaHK.required' => 'Bạn chưa nhập mã hộ khẩu',
            // 'MaHK.min' => 'Mã hộ khẩu phải có độ dài là 4 ký tự',
            // 'MaHK.max' => 'Mã hộ khẩu phải có độ dài là 4 ký tự',
            'HoTen.required' => 'Bạn chưa nhập họ tên NK',
            'HoTen.min' => 'Họ tên NK phải có độ dài trên 4 ký tự',
            'NgaySinh.required' => 'Bạn chưa nhập ngày sinh',
            'ThonXom.required' => 'Bạn chưa chọn thôn xóm',
            'DanToc.required' => 'Bạn chưa chọn dân tộc',
            'QuocTich.required' => 'Bạn chưa chọn quốc tịch',
            'TonGiao.required' => 'Bạn chưa chọn tôn giáo',
            'CMND.required' => 'Bạn chưa nhập số CMND',
            'NgheNghiep.required' => 'Bạn chưa nhập nghề nghiệp',
        ]);
        $nhankhau = new NhanKhau;
        $ma = "1101".str_random(4);
        // while()
        // {
        //     $ma = "1101".str_random(4);
        // }
        // $mahk = $request->MaHK;
        // $hokhau = HoKhau::where('MaHoKhau', $mahk)->get();
        // $idHK = $hokhau->id;

        $nhankhau->MaNhanKhau = $ma;
        $nhankhau->QuanHe = $request->QuanHe;
        $nhankhau->HoTen = $request->HoTen;
        $nhankhau->HoTenKhac = $request->HoTenKhac;
        $nhankhau->GioiTinh = $request->GioiTinh;
        $nhankhau->NgaySinh = $request->NgaySinh;
        $nhankhau->DanToc = $request->DanToc;
        $nhankhau->QuocTich = $request->QuocTich;
        $nhankhau->TonGiao = $request->TonGiao;
        $nhankhau->CMND = $request->CMND;
        $nhankhau->HoChieu = $request->HoChieu;
        $nhankhau->NgheNghiep = $request->NgheNghiep;
        $nhankhau->NoiLamViec = $request->NoiLamViec;
        $nhankhau->NgayChuyenDen = $request->NgayChuyenDen;
        $nhankhau->ThuongTruTruoc = $request->ThuongTruTruoc;
        $nhankhau->LyDoXoa = $request->LyDoXoa;
        $nhankhau->idThonXom = $request->ThonXom;
        $nhankhau->idHoKhau = $request->MaHK;
        $nhankhau->save();
        return redirect('admin/nhankhau')->with('thongbao', 'Thêm nhân khẩu thành công');
    }

    public function getSua($id){
        $nhankhau = NhanKhau::find($id);
        $hokhau = HoKhau::all();
        $xaphuong = XaPhuong::all();
        $thonxom = ThonXom::all();
        return view('admin.nhankhau.sua', ['nhankhau' => $nhankhau, 'hokhau' => $hokhau, 'xaphuong' => $xaphuong, 'thonxom' => $thonxom]);
    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request,[
            'QuanHe' => 'required',
            'MaHK' => 'required',
            'HoTen' => 'required|min:4',
            'NgaySinh' => 'required',
            'ThonXom' => 'required',
            'DanToc' => 'required',
            'QuocTich' => 'required',
            'TonGiao' => 'required',
            'CMND' => 'required|min:10|max:11',
            'NgheNghiep' => 'required',
            
        ],
        [
            'QuanHe.required' => 'Bạn chưa chọn quan hệ',
            'MaHK.required' => 'Bạn chưa nhập mã hộ khẩu',
            // 'MaHK.min' => 'Mã hộ khẩu phải có độ dài là 4 ký tự',
            // 'MaHK.max' => 'Mã hộ khẩu phải có độ dài là 4 ký tự',
            'HoTen.required' => 'Bạn chưa nhập họ tên NK',
            'HoTen.min' => 'Họ tên NK phải có độ dài trên 4 ký tự',
            'NgaySinh.required' => 'Bạn chưa nhập ngày sinh',
            'ThonXom.required' => 'Bạn chưa chọn thôn xóm',
            'DanToc.required' => 'Bạn chưa chọn dân tộc',
            'QuocTich.required' => 'Bạn chưa chọn quốc tịch',
            'TonGiao.required' => 'Bạn chưa chọn tôn giáo',
            'CMND.required' => 'Bạn chưa nhập số CMND',
            'CMND.min' => 'Số CMND phải có độ dài từ 10 đến 11 ký tự',
            'CMND.max' => 'Số CMND phải có độ dài từ 10 đến 11 ký tự',
            'NgheNghiep.required' => 'Bạn chưa nhập nghề nghiệp',
        ]);
        $nhankhau = NhanKhau::find($id);
        $ma = $nhankhau->MaNhanKhau;
        // while()
        // {
        //     $ma = "1101".str_random(4);
        // }
        // $mahk = $request->MaHK;
        // $hokhau = HoKhau::where('MaHoKhau', $mahk)->get();
        // $idHK = $hokhau->id;

        $nhankhau->MaNhanKhau = $ma;
        $nhankhau->QuanHe = $request->QuanHe;
        $nhankhau->HoTen = $request->HoTen;
        $nhankhau->HoTenKhac = $request->HoTenKhac;
        $nhankhau->GioiTinh = $request->GioiTinh;
        $nhankhau->NgaySinh = $request->NgaySinh;
        $nhankhau->DanToc = $request->DanToc;
        $nhankhau->QuocTich = $request->QuocTich;
        $nhankhau->TonGiao = $request->TonGiao;
        $nhankhau->CMND = $request->CMND;
        $nhankhau->HoChieu = $request->HoChieu;
        $nhankhau->NgheNghiep = $request->NgheNghiep;
        $nhankhau->NoiLamViec = $request->NoiLamViec;
        $nhankhau->NgayChuyenDen = $request->NgayChuyenDen;
        $nhankhau->ThuongTruTruoc = $request->ThuongTruTruoc;
        $nhankhau->LyDoXoa = $request->LyDoXoa;
        $nhankhau->idThonXom = $request->ThonXom;
        $nhankhau->idHoKhau = $request->MaHK;
        $nhankhau->save();
        return redirect('admin/nhankhau/sua/'.$id)->with('thongbao', 'Sửa nhân khẩu thành công');
    }

    public function getXoa($id)
    {
        $nhankhau = NhanKhau::find($id);
        $nhankhau->delete();
        return redirect('admin/nhankhau')->with('thongbao', 'Xóa nhân khẩu thành công');
    }

    public function timkiem(Request $request)
    {
        $tukhoa = $request->tukhoa;
        $nhankhau = NhanKhau::where('MaNhanKhau','like',"%$tukhoa%")->orWhere('QuanHe','like',"%$tukhoa%")->orWhere('HoTen','like',"%$tukhoa%")->orWhere('GioiTinh','like',"%$tukhoa%")->orWhere('NgaySinh','like',"%$tukhoa%")->orWhere('DanToc','like',"%$tukhoa%")->orWhere('QuocTich','like',"%$tukhoa%")->orWhere('TonGiao','like',"%$tukhoa%")->orWhere('CMND','like',"%$tukhoa%")->orWhere('NgheNghiep','like',"%$tukhoa%")->orWhere('NoiLamViec','like',"%$tukhoa%")->take(30)->paginate(10);
        return view('admin.nhankhau.timkiem', ['tukhoa' => $tukhoa, 'nhankhau' => $nhankhau]);
    }
    
    public function chitiet($id)
    {
        $thonxom = ThonXom::all();
        $xaphuong = XaPhuong::all();
        $nhankhau = NhanKhau::find($id);
        $idHK = $nhankhau->idHoKhau;
        $hokhau = HoKhau::find($idHK);
        return view('admin.nhankhau.chitiet',['nhankhau' => $nhankhau,'hokhau'=>$hokhau, 'thonxom' => $thonxom, 'xaphuong' => $xaphuong]);
    }

    public function loc_diachi(Request $request)
    {
        $xaphuong = XaPhuong::all();
        $thonxom = ThonXom::all();
        $idThonXom = $request->ThonXom;
        $idXaPhuong = $request->XaPhuong;
        $xp = XaPhuong::find($idXaPhuong);
        if(isset($idThonXom))
        {
            $hokhau = HoKhau::where('idThonXom', $idThonXom)->take(30)->paginate(10);
            $nhankhau = [];
            foreach($hokhau as $item)
            {
                $idhk = $item['id'];
                $nk = NhanKhau::where('idHoKhau', $idhk)->get();
                $nhankhau[] = $nk;
            }
            return view('admin.nhankhau.diachi', ['nhankhau'=>$nhankhau, 'xaphuong' => $xaphuong, 'thonxom' => $thonxom]);
        }
        // else if(isset($idXaPhuong))
        // {
        //     $data = [];
        //     foreach($xp->thonxom as $item) :
        //     {
        //         $idTX = $item['id'];
        //         $hokhau = HoKhau::where('idThonXom', $idTX)->get();
        //         $data = $hokhau;
        //     }
            
        //     endforeach ;
            
        //     return view('admin.hokhau.diachi', ['hokhau'=>$data, 'xaphuong' => $xaphuong, 'thonxom' => $thonxom]);
        // }
        
    }
}
