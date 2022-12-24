<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = "invoice";
    protected $fillable = [
        'mnf_id',
        'uploaded_at',
        'total',
        'tujuan',
        'barcode',
        'koli',
        'berat',
        'harga',
        'packing',
        'total_kiriman',
        'keterangan',
    ];
}
