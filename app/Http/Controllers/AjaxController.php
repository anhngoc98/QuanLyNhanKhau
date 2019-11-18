<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\XaPhuong;
use App\ThonXom;
use App\NhanKhau;

class AjaxController extends Controller
{
    //
    public function getThonXom($idXaPhuong)
    {
        $thonxom = ThonXom::where('idXaPhuong', $idXaPhuong)->get();
        echo "<option value='' selected>-- Chọn thôn xóm --</option>";
        foreach($thonxom as $tx)
        {
            echo "<option value='".$tx->id."'>".$tx->TenThonXom."</option>";
        }
    }

    public function GetMaNhanKhau($id = NULL)
    {
        $data = NhanKhau::where('MaNhanKhau','like',"%$id%")->get();
        $output = '<select name="cmbNhanKhau" id="cmbNhanKhau" onchange="SelectedTextChange()" style="position:absolute;top:0px;left:0px;width:200px; height:25px;line-height:20px;margin:0;padding:0;"
        onchange="document.getElementById("displayValue").value=this.options[this.selectedIndex].text; document.getElementById("idValue").value=this.options[this.selectedIndex].value;">
        <option></option>';

        foreach($data as $row)
        {
            $output .= '<option value="'.$row->id.'">'.$row->MaNhanKhau."</option>";
        }
        
        $output .= '</select>';
        return $output;
    }
}
