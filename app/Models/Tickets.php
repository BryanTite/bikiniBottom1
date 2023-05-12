<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'id_categorie',
        'price',
        'image',
    ];
    public function purchase()
    {
        return $this->belongsToMany(Purchases::class,'purchase_services');
    }
}
