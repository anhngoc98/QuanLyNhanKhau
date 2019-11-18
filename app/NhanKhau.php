<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanKhau extends Model
{
    //
    protected $table = 'nhankhau';
    public function hokhau()
    {
        return $this->belongsTo('App\HoKhau', 'idHoKhau', 'id');
    }

    public function thonxom()
    {
        return $this->belongsTo('App\ThonXom', 'idThonXom', 'id');
    }
    
}
