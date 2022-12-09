<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    use HasFactory;

    protected $table = "data_pickup";
    protected $fillable = ['id', 'tipe', 'client', 'luar_kota', 'dalam_kota', 'sp1', 'sp2', 'sp3', 'jumlah', 'berat', 'tanggal', 'driver', 'created_at', 'updated_at', 'description'];
}
