<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_pemesanan extends Model
{
    protected $table      = 'detail_pemesanan'; 
    protected $primaryKey = 'id_detail_pemesanan';
    protected $fillable   = [
         'id_produk', 'id_pelanggan', 'id_pemesanan', 'status', 'total', 'harga', 'jml_pesan' 
    ];



    public function produk(){
        return $this->belongsTo('App\Produk', 'id_produk');
    }
     public function pelanggan(){
        return $this->belongsTo('App\Pelanggan', 'id_pelanggan');
    }
         public function pemesanan(){
        return $this->belongsTo('App\pemesanan', 'id_pemesanan');
    }
}
