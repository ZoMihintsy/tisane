<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'categorie_id',
        'prix',
        'stock',
        'description1',
        'description2',
        'photo'
    ];
}
