<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\User;
use App\Role;
use App\NhanKhau;


class UserController extends Controller
{
    public function getDanhSach(){
        $users = User::paginate(10);
        return view('admin.users.index', ['users' => $users]);
    }

    public function getThem(){
        $quyen = Role::all();
        return view('admin.users.them', ['quyen' => $quyen]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,[
            'TenDangNhap' => 'required|unique:users,TenDangNhap',
            'MatKhau' => 'required|min:3|max:32',
            'MatKhauAgain' => 'required|same:MatKhau',
            'Quyen' => 'required'
        ],
        [
            'TenDangNhap.required' => 'Bạn chưa nhập tên đăng nhập',
            'TenDangNhap.unique' => 'Tên đăng nhập đã tồn tại',
            'MatKhau.required' => 'Bạn chưa nhập mật khẩu',
            'MatKhau.min' => 'Mật khẩu phải có ít nhất 3 ký tự',
            'MatKhau.max' => 'Mật khẩu chỉ được có tối đa 32 ký tự',
            'MatKhauAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'MatKhauAgain.same' => 'Mật khẩu chưa khớp',
            'Quyen.required' => 'Bạn chưa chọn quyền sử dụng',
        ]);
        $user = new User;
        $user->TenDangNhap = $request->TenDangNhap;
        $user->password = bcrypt($request->MatKhau);
        $user->idRole = $request->Quyen;
        $user->SoDienThoai = $request->SoDienThoai;
        $user->save();
        return redirect('admin/user')->with('thongbao','Thêm user thành công');

    }

    public function getSua($id){
        $user = User::find($id);
        $quyen = Role::all();
        return view('admin.users.sua', ['user' => $user, 'quyen' => $quyen]);
    }
    public function postSua(Request $request, $id)
    {
        $user = User::find($id);
        $this->validate($request,[
            'Quyen' => 'required'
        ],
        [
            'Quyen.required' => 'Bạn chưa chọn quyền sử dụng',
        ]);
       
        if($request->changePassword == "on")
        {
            $this->validate($request,[
                'MatKhau' => 'required|min:3|max:32',
                'MatKhauAgain' => 'required|same:MatKhau',
            ],
            [
                'MatKhau.required' => 'Bạn chưa nhập mật khẩu',
                'MatKhau.min' => 'Mật khẩu phải có ít nhất 3 ký tự',    
                'MatKhau.max' => 'Mật khẩu chỉ được có tối đa 32 ký tự',
                'MatKhauAgain.required' => 'Bạn chưa nhập lại mật khẩu',
                'MatKhauAgain.same' => 'Mật khẩu chưa khớp',
            ]);
            $user->password = bcrypt($request->MatKhau);
        }
        
        $user->TenDangNhap = $request->TenDangNhap;
        $user->idRole = $request->Quyen;
        $user->SoDienThoai = $request->SoDienThoai;
        $user->save();
        return redirect('admin/user/sua/'.$id)->with('thongbao','Sửa user thành công');
    }

    public function getXoa($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user')->with('thongbao', 'Xóa user thành công');
    }

    public function getDangNhap()
    {
        return view('admin.dangnhap');
    }

    
    public function postDangNhap(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ],
        [
            'username.required' => 'Bạn chưa nhập tên đăng nhập',
            'password.required' => 'Bạn chưa nhập mật khẩu',
        ]);
        if(Auth::attempt(['TenDangNhap' => $request->username, 'password' => $request->password]))
        {
            $user = Auth::user();
            if($user->idRole == 1)
                return redirect('trangchu');
            else if($user->idRole == 2)
                return redirect('admin/nhankhau');
            else if($user->idRole == 3)
                return redirect('admin/hokhau');
            else if($user->idRole == 4)
                return redirect('admin/user');
            else if($user->idRole == 6)
            {
                return redirect('admin/thongke');
            }
        }
        else
        {
            return redirect('/')->with('thongbao','Đăng nhập thất bại');
        }
        
    }

    public function getDangXuat()
    {
        Auth::logout();
        return redirect('/');
    }

    public function getEdit()
    {
        $quyen = Role::all();
        if(Auth::check())
        {
            $user = Auth::user();
        }
        return view('admin.editaccount', compact('user', 'quyen'));
    }
    public function postEdit(Request $request)
    {
        $account = Auth::user();
        $user = User::find($account->id);
        $this->validate($request, [
            'SoDienThoai' => 'required',
        ],
        [
            'SoDienThoai.required' => 'Bạn chưa nhập số điện thoại',
        ]);
        if($request->changePassword == 'on')
        {
            $this->validate($request, [
                'MatKhau' => 'required|min:3|max:32',
                'MatKhauAgain' => 'required|same:MatKhau',
            ],
            [
                'MatKhauCu' => 'Bạn chưa nhập lại mật khẩu cũ',
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
        $user->idRole = $request->Quyen;
        $user->save();
        return redirect('admin/editaccount')->with('thongbao', 'Sửa tài khoản thành công');
        
    }

    public function getDangKy()
    {
        $nhankhau = NhanKhau::all();
        return view('admin.dangky', ['nhankhau' => $nhankhau]);
    }

    public function postDangKy(Request $request)
    {
        $this->validate($request,[
            'phone' => 'required|min:10|max:11',
            'username' => 'required|min:3|unique:users,TenDangNhap',
            'password' => 'required|min:3|max:32',
            'passwordAgain' => 'required|same:password',
        ],[
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'phone.min' => 'Số điện thoại phải có 10 hoặc 11 số',
            'phone.max' => 'Số điện thoại phải có 10 hoặc 11 số',
            'password.min' => 'Mật khẩu phải có độ dài trên 3 ký tự',
            'password.max' => 'Mật khẩu phải có độ dài dưới 32 ký tự',
            'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same' => 'Mật khẩu không khớp',
        ]);
        $mank = $request->MaNK;
        
        $nk = NhanKhau::where('MaNhanKhau', $mank)->get();
        if(count($nk) == 0)
        {
            return redirect('dangky')->with('error', 'Mã nhân khẩu không tồn tại');
        }
        foreach($nk as $item)
        {
            $id_nk = $item->id;
        }
        $user = new User;
        $user->idNhanKhau = $id_nk;
        $user->TenDangNhap = $request->username;
        $user->password = bcrypt($request->password);
        $user->SoDienThoai = $request->phone;
        $user->idRole = 1;
        $user->save();
        return redirect('dangky')->with('thongbao','Đăng ký tài khoản thành công');
    }    
}
