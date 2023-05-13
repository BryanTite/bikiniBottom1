<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
    ];
    public function tickets()
    {
        return $this->belongsToMany(Purchases::class,'purchases_services')->withTimestamps();
    }
}
