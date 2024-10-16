<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perangkat extends Model
{
    use HasFactory;

    public function perangkat()
    {
        return $this->belongsTo(Perangkat::class);
    }
}
