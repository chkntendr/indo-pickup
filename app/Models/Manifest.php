<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manifest extends Model
{
    use HasFactory;
    
    protected $table = "manifest";
    protected $fillable = [
        'm_id',
        'uploaded_at',
        'total',
        'timestamps'
    ];
}
