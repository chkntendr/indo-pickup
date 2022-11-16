<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    use HasFactory;

    protected $table = "data_pickup";
    protected $fillable = ['id', 'tipe', 'client', 'jumlah', 'berat', 'tanggal', 'driver', 'created_at', 'updated_at'];
}
