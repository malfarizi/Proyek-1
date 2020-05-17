<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
       protected $table      = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';
    protected $fillable   = [
         'jml_pesan', 'total', 'id_produk', 'id_pelanggan', 'status' ,'harga_pcs','desain'
    ];



    public function produk(){
        return $this->belongsTo('App\Produk', 'id_produk');
    }
     public function pelanggan(){
        return $this->belongsTo('App\Pelanggan', 'id_pelanggan');
    }
}
