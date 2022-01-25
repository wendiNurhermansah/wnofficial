<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenis_pesanan extends Model
{
    protected $table = 'jenis_pesanan';
    protected $fillable = ['id', 'nama', 'created_at', 'updated_at'];
}
