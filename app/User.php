<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function nhankhau()
    {
        return $this->belongsTo('App\NhanKhau', 'idNhanKhau', 'id');
    }

    public function role()
    {
        return $this->belongsTo('App\Role', 'idRole', 'id');
    }

    public function isUser() {
        return $this->idRole == 1;
    }

    public function isQLThon() {
        return $this->idRole == 2;
    }

    public function isQLXa() {
        return $this->idRole == 3;
    }

    public function isQuanTri() {
        return $this->idRole == 4;
    }

    public function isLanhDaoTinh() {
        return $this->idRole == 5;
    }

    public function isLanhDaoHuyen() {
        return $this->idRole == 6;
    }
}
