<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Jenis_pesanan;

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
        'gender_a',
        'gender_b',
        'harga',
        'total',
        'ket',
        'created_at',
        'updated_at'
    ];

    public function jenis_pesanan(){
        return $this->belongsTo(Jenis_pesanan::class, 'jenis_pesanan_id');
    }
}
