<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Categorie extends Model
{
    use HasFactory;
    public function produit():HasMany
    {
        return $this->hasMany(Produit::class);
    }
}
