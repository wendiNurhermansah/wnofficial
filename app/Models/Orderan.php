<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Jumlah_orderan;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Orderan extends Model
{
    use AutoNumberTrait;

    protected $table = 'orderan';
    protected $fillable = [
        'id',
        'kode',
        'nama_cs',
        'telepon',
        'alamat',
        'ket',
        'tanggal',
        'sub_total',
        'gambar',
        'status',
        'status_bayar',
        'hpp_produksi',
        'created_at',
        'updated_at'
    ];

    public function jumlah_pesanan()
    {
        return $this->belongsTo(Jumlah_orderan::class, 'id', 'id_orderan');
    }

    public static function getAutoNumberOptions()
    {
        return [
            'kode' => [
                'format' => 'WN?', // Format kode yang akan digunakan.
                'length' => 5 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }
}
