<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class model_has_role extends Model
{
    protected $table = 'model_has_roles';
    protected $fillable = ['role_id', 'model_type', 'model_id', 'created_at', 'updated_at'];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
