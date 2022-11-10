<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    use HasFactory;
    protected $table = "tipe_barang";
    protected $fillable = ['id', 'barang', 'created_at', 'updated_at'];

    public function pickup() {
        return $this->hasOne(Pickup::class, 'id', 'tipe_id');
    }
}
