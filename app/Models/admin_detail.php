<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class admin_detail extends Model
{
    protected $table = 'admin_details';
    protected $fillable = ['id', 'admin_id', 'nama', 'email', 'created_at', 'updated_at'];

    public function admins(){
        return $this->belongsTo(User::class, 'admin_id');
    }
}
