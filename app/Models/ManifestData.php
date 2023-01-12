<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManifestData extends Model
{
    use HasFactory;
    protected $table = "manifest_data";
    protected $fillable = [
        'id',
        'manifest_id',
        'tipe',
        'client',
        'jumlah',
        'berat',
        'timestamps'
    ];
}
