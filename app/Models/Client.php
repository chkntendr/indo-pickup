<?php

namespace App\Models;

use Pickup;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = "data_client";
    protected $fillable = ['id', 'kode_client', 'client', 'created_at', 'updated_at'];

    public function pickup() {
        return $this->hasOne(Pickup::class, 'id', 'client_id');
    }

    public $timestamps = true;
}
