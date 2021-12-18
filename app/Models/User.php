<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

// Model
use App\Models\admin_detail;
use App\Models\model_has_role;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $table    = 'admins';
    protected $fillable = ['id', 'username', 'password', 'created_at', 'updated_at'];

    public function admin_detail()
    {
        return $this->hasMany(admin_detail::class, 'admin_id', 'id');
    }

    public function role()
    {
        return $this->hasMany(model_has_role::class, 'model_id', 'id');
    }
}
