<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YeuCau extends Model
{
    //
    protected $table = 'yeucau';
    public function user()
    {
        return $this->belongsTo('App\User', 'idUser', 'id');
    }
}
