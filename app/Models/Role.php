<?php

namespace App\Models;

use User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = "roles";
    protected $fillable = [
        'roles',
        'created_at',
        'updated_at',
    ];

    public function role() {
        return $this->hasOne(User::class, 'id', 'roles_id');
    }
}
