<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'email',
        'stock',
        'produit_id',
        'retrait',
        'date',
        'type',
    ];
}
