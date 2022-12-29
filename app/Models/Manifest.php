<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;

class Manifest extends Model
{
    use HasFactory;
    
    protected $table = "manifest";
    protected $fillable = [
        'id',
        'm_id',
        'uploaded_at',
        'total',
        'timestamps'
    ];

    public function invoice() {
        return $this->hasOne(Invoice::class, 'mnf_id', 'id');
    }
}
