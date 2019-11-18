<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThonXom extends Model
{
    //
    protected $table = "thonxom";
    
    public function xaphuong()
    {
        return $this->belongsTo('App\XaPhuong','idXaPhuong','id');
    }

    public function hokhau()
    {
        return $this->hasMany('App\HoKhau', 'idThonXom', 'id');
    }
    
    public function nhankhau()
    {
        return $this->hasMany('App\NhanKhau', 'idThonXom', 'id');
    }
}
