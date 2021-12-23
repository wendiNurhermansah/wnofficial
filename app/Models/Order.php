<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Order extends Model
{
   use AutoNumberTrait;

   protected $table = 'orders';
   protected $guarded = ''; 

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
