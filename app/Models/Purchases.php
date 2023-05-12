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
    public function purchase()
    {
        return $this->belongsToMany(Purchases::class,'purchase_services','id_purchase','id_ticket');
    }
}
