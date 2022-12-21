<?php

namespace App\Models;

use User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = "role";
    protected $fillable = [
        'role',
        'created_at',
        'updated_at',
    ];
}
