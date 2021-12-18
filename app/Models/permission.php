<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    protected $table = 'permissions';
    protected $fillable = ['id', 'name', 'guard_name', 'created_at', 'updated_at'];
}
