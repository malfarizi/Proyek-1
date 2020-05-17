<?php

namespace App;
use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Pelanggan extends Authenticatable
{
     use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "pelanggan";

    protected $primaryKey = "id_pelanggan";
    protected $fillable = [
        'username','password', 'nama_pelanggan', 'alamat', 'no_hp'
    ];


    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
