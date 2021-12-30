<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenis_orderan extends Model
{
    protected $table = 'jenis_orderan';
    protected $fillable = ['id', 'id_orders', 'id_jenis_barang', 'haraga', 'qty', 'total'];

    public function orderan(){
        return $this->belongsTo(Order::class, 'id_orders');
    }

    public function barang(){
        return $this->belongsTo(Jenis_barang::class, 'id_jenis_barang');
    }
}
