<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $table      = 'transfer';
    protected $primaryKey = 'id_transfer';
    protected $fillable   = [
         'foto_transfer', 'id_pelanggan','id_detail_pemesanan', 'metode_pembayaran'
    ];




     public function pelanggan(){
        return $this->belongsTo('App\Pelanggan', 'id_pelanggan');
    }
     public function pemesanan(){
        return $this->belongsTo('App\Detail_pemesanan', 'id_detail_pemesanan');
    }
}
