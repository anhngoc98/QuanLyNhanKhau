<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\YeuCau;

class YeuCauController extends Controller
{
    //
    public function getDanhSach()
    {
        $ycall = YeuCau::paginate(10);
        return view("admin.yeucau.index", ['ycall' => $ycall]);
    }
    public function yeucaunk()
    {
        $ycnk = YeuCau::where('DoiTuong', 1)->paginate(10);
        return view("admin.yeucau.yeucaunk", ['ycnk' => $ycnk]);
    }
    public function getXoa($id)
    {
        $user = Auth::user();
        $idRole = $user->idRole;
        $yeucau = YeuCau::find($id);
        $yeucau->delete();
        if($idRole == 2)
            return redirect("admin/yeucau/nhankhau")->with('thongbao', 'Xóa yêu cầu thành công');
        else if($idRole =3)
            return redirect("admin/yeucau")->with('thongbao', 'Xóa yêu cầu thành công');
    }
}
