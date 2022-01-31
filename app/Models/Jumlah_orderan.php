<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Orderan;

class Jumlah_orderan extends Model
{
    protected $table = 'jumlah_orderan';
    protected $fillable = ['id', 'id_orderan', 'jenis_pesanan', 'jenis_lengan', 'harga', 'total', 'created_at', 'updated_at'];

    public function j_orderan()
    {
        return $this->belongsTo(Orderan::class, 'id_orderan');
    }

    public function Pesanan()
    {
        return $this->belongsTo(Jenis_pesanan::class, 'jenis_pesanan');
    }
}
