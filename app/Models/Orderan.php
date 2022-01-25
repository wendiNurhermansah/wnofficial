<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderan extends Model
{
    protected $table = 'orderan';
    protected $fillable = [
        'id',
        'kode',
        'nama_cs',
        'telepon',
        'alamat',
        'jenis_pesanan_id',
        'jumlah_panjang',
        'jumlah_pendek',
        'model_panjang',
        'model_pendek',
        'harga',
        'total',
        'ket',
        'created_at',
        'updated_at'
    ];
}
