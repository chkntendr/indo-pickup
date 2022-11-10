<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $table = "data_driver";
    protected $fillable = [
        'id', 'name', 'created_at', 'updated_at'
    ];

    public function pickup() {
        return $this->hasOne(Pickup::class, 'id', 'driver_id');
    }
}
