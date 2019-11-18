<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\NhanKhau;
use App\HoKhau;
use App\XaPhuong;
use App\ThonXom;
use App\User;
use App\YeuCau;


class PagesController extends Controller
{
    //

    public function trangchu()
    {
        $user = Auth::user();
        $id = $user->idNhanKhau;
        $nhankhau = NhanKhau::find($id);
        return view('pages.index', ['nhankhau' => $nhankhau, 'user' => $user]);
    }

    public function hokhau()
    {
        $user = Auth::user();
        $idhk = $user->nhankhau->hokhau->id;
        $hokhau = HoKhau::find($idhk);
        return view('pages.hokhau', ['hokhau' => $hokhau, 'user' => $user]);
    }
    public function nhankhau()
    {
        $user = Auth::user();
        $idhk = $user->nhankhau->hokhau->id;
        $nhankhau = NhanKhau::where('idHoKhau', $idhk)->get();
        return view('pages.nhankhau', ['nhankhaus' => $nhankhau, 'user' => $user]);
    }

    public function yeucau()
    {
        $user = Auth::user();
        $id = $user->idNhanKhau;
        $nhankhau = NhanKhau::find($id);
        return view('pages.yeucau', ['nhankhau' => $nhankhau, 'user' => $user]);
    }

    public function guiyeucau(Request $request)
    {
        $this->validate($request, [
            'TieuDe' => 'required|min:10|max:50',
            'NoiDung' => 'required|min:10',
        ],
        [
            'TieuDe.required' => 'Bạn chưa nhập tiêu đề',
            'TieuDe.min' => 'Tiêu đề phải có từ 10 đến 50 ký tự',
            'TieuDe.max' => 'Tiêu đề phải có từ 10 đến 50 ký tự',
            'NoiDung.required' => 'Bạn chưa nhập nội dung',
            'NoiDung.min' => 'Nội dung phải có trên 10 ký tự',
        ]);
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $user = Auth::user();
        $yeucau = new YeuCau;
        $yeucau->TieuDe = $request->TieuDe;
        $yeucau->NoiDung = $request->NoiDung;
        $yeucau->NgayGui = $dt->toDateString();
        $yeucau->TrangThai = 0;
        $yeucau->DoiTuong = $request->DoiTuong;
        $yeucau->idUser = $user->id;
        $yeucau->save();
        return redirect('yeucau')->with('Gửi yêu cầu cập nhật thành công');
    }

    public function dangxuat()
    {
        Auth::logout();
        return redirect('/');
    }
    
    public function getEdit()
    {
        $user = Auth::user();
        return view('pages.suatk', ['user' => $user]);
    }
    public function postEdit(Request $request)
    {
        $account = Auth::user();
        $user = User::find($account->id);
        $TenDangNhap = $request->TenDangNhap;
        if($TenDangNhap != $user->TenDangNhap)
        {
            $this->validate($request,[
                'TenDangNhap' => 'required|unique:users,TenDangNhap'
            ],[
                
            'TenDangNhap.required' => 'Bạn chưa nhập tên đăng nhập',
            'TenDangNhap.unique' => 'Tên đăng nhập đã tồn tại',

            ]);
        }
        else
        {
            $this->validate($request, [
                'SoDienThoai' => 'required',
            ],
            [
                'SoDienThoai.required' => 'Bạn chưa nhập số điện thoại',
            ]);

        }
        
        if($request->changePassword == 'on')
        {
            $this->validate($request, [
                'MatKhau' => 'required|min:3|max:32',
                'MatKhauAgain' => 'required|same:MatKhau',
            ],
            [
                'MatKhau.required' => 'Bạn chưa nhập mật khẩu',
                'MatKhau.min' => 'Mật khẩu phải có độ dài trên 3 ký tự',
                'MatKhau.max' => 'Mật khẩu phải có độ dài dưới 32 ký tự',
                'MatKhauAgain.required' => 'Bạn chưa nhập lại mật khẩu',
                'MatKhauAgain.same' => 'Mật khẩu không khớp',
            ]);
            $user->password = bcrypt($request->MatKhau);
        }
        $user->SoDienThoai = $request->SoDienThoai;
        $user->TenDangNhap = $request->TenDangNhap;
        $user->idRole = 1;
        $user->save();
        return redirect('editAccount')->with('thongbao', 'Sửa tài khoản thành công');
    }

}
