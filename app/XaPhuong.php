<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class XaPhuong extends Model
{
    //
    protected $table = "xaphuong";

    public function thonxom()
    {
        return $this->hasMany('App\ThonXom', 'idXaPhuong', 'id');
    }

    public function hokhau()
    {
        return $this->hasManyThrough('App\HoKhau', 'App\ThonXom', 'idXaPhuong', 'idThonXom', 'id');
    }

    public function nhankhau()
    {
        return $this->hasManyThrough('App\NhanKhau', 'App\ThonXom', 'idXaPhuong', 'idThonXom', 'id');
    }
}
