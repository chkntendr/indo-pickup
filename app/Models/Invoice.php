<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;
use App\Models\Manifest;

class Invoice extends Model
{
    use HasFactory;
    protected $table = "invoice";
    protected $fillable = [
        'id',
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

    public function manifest() {
        return $this->BelongsTo(Manifest::class, 'mnf_id', 'id');
    }
}
