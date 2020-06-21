<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
    protected $table      = 'pemesanan'; 
    protected $primaryKey = 'id_pemesanan';
    protected $fillable   = [
         'id_produk', 'id_pelanggan', 'foto_ktp' 
    ];



    public function produk(){
        return $this->belongsTo('App\Produk', 'id_produk');
    }
     public function pelanggan(){
        return $this->belongsTo('App\Pelanggan', 'id_pelanggan');
    }
}
