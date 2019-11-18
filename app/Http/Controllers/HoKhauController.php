<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HoKhau;
use App\ThonXom;
use App\XaPhuong;
use App\NhanKhau;
use DB;

class HoKhauController extends Controller
{
    //
    public function getDanhSach(Request $request){
        $hokhau = HoKhau::paginate(10);
        $xaphuong = XaPhuong::all();
        $thonxom = ThonXom::all();

        $idThonXom = $request->ThonXom;
        $idXaPhuong = $request->XaPhuong;
        
        
        if(isset($idThonXom))
        {
            $hokhau = HoKhau::where('idThonXom', $idThonXom)->take(30)->paginate(10);
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
            $hokhau = HoKhau::join("thonxom", "hokhau.idThonXom", "=", "thonxom.id")
                                ->join("xaphuong", "xaphuong.id", "=", "thonxom.idXaPhuong")
                                ->where("xaphuong.id", $idXaPhuong)->take(30)->paginate(10);
        }

        return view('admin.hokhau.index', compact('hokhau', 'xaphuong', 'thonxom'));
    }

    public function getThem(){
        $xaphuong = XaPhuong::all();
        $thonxom = ThonXom::all();
        return view('admin.hokhau.them',['xaphuong' => $xaphuong, 'thonxom' => $thonxom]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,[
            'MaHK' => 'required|unique:hokhau,MaHoKhau|min:4|max:4',
            'TenChuHo' => 'required|min:3|max:50',
            'ThonXom' => 'required',
            'NgayCap' => 'required'
        ],
        [
            'MaHK.required' => 'Bạn chưa nhập mã hộ khẩu',
            'MaHK.unique' => 'Mã hộ khẩu đã tồn tại',
            'MaHK.min' => 'Mã hộ khẩu phải có độ dài là 4 ký tự',
            'MaHK.max' => 'Mã hộ khẩu phải có độ dài là 4 ký tự',
            'TenChuHo.required' => 'Bạn chưa nhập tên chủ hộ',
            'TenChuHo.min' => 'Tên chủ hộ phải có độ dài từ 3 đến 50 ký tự',
            'TenChuHo.max' => 'Tên chủ hộ phải có độ dài từ 3 đến 50 ký tự',
            'ThonXom.required' => 'Bạn chưa chọn thôn xóm',
            'NgayCap.required' => 'Bạn chưa nhập ngày cấp',
        ]);
        $hokhau = new HoKhau;
        $hokhau->MaHoKhau = $request->MaHK;
        $hokhau->TenChuHo = $request->TenChuHo;
        $hokhau->idThonXom = $request->ThonXom;
        $hokhau->NgayCap = $request->NgayCap;
        $hokhau->HoSoHK = $request->HSHK;
        $hokhau->SoDKTT = $request->ĐKTT;
        $hokhau->ToSo = $request->ToSo;
        $hokhau->save();
        return redirect('admin/hokhau')->with('thongbao', 'Thêm hộ khẩu thành công');
    }

    public function getSua($id){
        $hokhau = HoKhau::find($id);
        $xaphuong = XaPhuong::all();
        $thonxom = ThonXom::all();
        return view('admin.hokhau.sua', ['hokhau'=>$hokhau, 'xaphuong' => $xaphuong, 'thonxom' => $thonxom]);
    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request,[
            'MaHK' => 'required|unique:hokhau,MaHoKhau|min:4|max:4',
            'TenChuHo' => 'required|min:3|max:50',
            'ThonXom' => 'required',
            'NgayCap' => 'required'
        ],
        [
            'MaHK.required' => 'Bạn chưa nhập mã hộ khẩu',
            'MaHK.unique' => 'Mã hộ khẩu đã tồn tại',
            'MaHK.min' => 'Mã hộ khẩu phải có độ dài là 4 ký tự',
            'MaHK.max' => 'Mã hộ khẩu phải có độ dài là 4 ký tự',
            'TenChuHo.required' => 'Bạn chưa nhập tên chủ hộ',
            'TenChuHo.min' => 'Tên chủ hộ phải có độ dài từ 3 đến 50 ký tự',
            'TenChuHo.max' => 'Tên chủ hộ phải có độ dài từ 3 đến 50 ký tự',
            'ThonXom.required' => 'Bạn chưa chọn thôn xóm',
            'NgayCap.required' => 'Bạn chưa nhập ngày cấp',
        ]);
        $hokhau = HoKhau::find($id);
        $hokhau->MaHoKhau = $request->MaHK;
        $hokhau->TenChuHo = $request->TenChuHo;
        $hokhau->idThonXom = $request->ThonXom;
        $hokhau->NgayCap = $request->NgayCap;
        $hokhau->HoSoHK = $request->HSHK;
        $hokhau->SoDKTT = $request->ĐKTT;
        $hokhau->ToSo = $request->ToSo;
        $hokhau->save();
        return redirect('admin/hokhau/sua/'.$id)->with('thongbao', 'Sửa hộ khẩu thành công');
    }
    
    public function getXoa($id)
    {
        $hokhau = HoKhau::find($id);
        $hokhau->delete();
        return redirect('admin/hokhau')->with('thongbao', 'Xóa hộ khẩu thành công');
    }

    public function timkiem(Request $request)
    {
        $xaphuong = XaPhuong::all();
        $thonxom = ThonXom::all();
        $tukhoa = $request->tukhoa;
        $hokhau = HoKhau::where('MaHoKhau','like',"%$tukhoa%")->orWhere('TenChuHo','like',"%$tukhoa%")->orWhere('NgayCap','like',"%$tukhoa%")->take(30)->paginate(10);
        return view('admin.hokhau.timkiem', ['tukhoa' => $tukhoa, 'hokhau' => $hokhau, 'xaphuong' => $xaphuong, 'thonxom' => $thonxom]);
    }

    // public function loc_diachi(Request $request)
    // {
    //     $xaphuong = XaPhuong::all();
    //     $thonxom = ThonXom::all();
    //     $idThonXom = $request->ThonXom;
    //     $idXaPhuong = $request->XaPhuong;
        
        
    //     if(isset($idThonXom))
    //     {
    //         $hokhau = HoKhau::where('idThonXom', $idThonXom)->take(30)->paginate(10);
    //         return view('admin.hokhau.diachi', ['hokhau'=>$hokhau, 'xaphuong' => $xaphuong, 'thonxom' => $thonxom]);
    //     }
    //     else if(isset($idXaPhuong))
    //     {
    //         $hokhau = DB::table('xaphuong')
    //         ->join('thonxom', 'xaphuong.id', '=', 'thonxom.idXaPhuong')
    //         ->join('hokhau', 'thonxom.id', '=', 'hokhau.idThonXom')
    //         ->where("xaphuong.id", $idXaPhuong)
    //         ->get();

    //         return back('admin.hokhau.diachi', ['hokhau'=>$hokhau, 'xaphuong' => $xaphuong, 'thonxom' => $thonxom]);
    //     }
    //     // else if(empty($idThonXom) && empty($idXaPhuong))
    //     // {
    //     //     return view('admin.hokhau.index', ['xaphuong' => $xaphuong,'thonxom' => $thonxom]);
    //     // }
        
    // }

    public function chitiet($id)
    {
        $thonxom = ThonXom::all();
        $xaphuong = XaPhuong::all();
        $nhankhau = NhanKhau::where('idHoKhau', $id)->get();
        return view('admin.hokhau.chitiet',['nhankhau' => $nhankhau, 'thonxom' => $thonxom, 'xaphuong' => $xaphuong]);
    }

}
