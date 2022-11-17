<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = "tipe_barang";
    protected $fillable = [
        'barang',
        'created_at',
        'updated_at'
    ];
}
