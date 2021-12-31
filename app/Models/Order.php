<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Order extends Model
{
   use AutoNumberTrait;

   protected $table = 'orders';
   protected $fillable = ['id', 'nama', 'kode', 'gambar', 'alamat', 'no_hp', 'tanggal_order', 'estimasi', 'ket',
                            'status', 'total_semua', 'qty_semua', 'dp']; 

    public function jenis_orderan()
    {
         return $this->hasMany(Jenis_orderan::class, 'id_orders', 'id');
    }

   public function getAutoNumberOptions()
   {
       return [
           'kode' => [
               'format' => 'WNO-?', // Format kode yang akan digunakan.
               'length' => 5 // Jumlah digit yang akan digunakan sebagai nomor urut
           ]
       ];
   }
}
