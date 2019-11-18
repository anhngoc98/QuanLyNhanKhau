<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoKhau extends Model
{
    //
    protected $table = "hokhau";
    public function nhankhau()
    {
        return $this->hasMany('App\NhanKhau', 'idHoKhau','id');
    }

    public function thonxom()
    {
        return $this->belongsTo('App\ThonXom', 'idThonXom', 'id');
    }
}
