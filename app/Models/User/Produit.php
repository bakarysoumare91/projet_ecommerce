<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Produit extends Model //cardianlité 1.1
{
    use HasFactory;
    protected $fillable = [
        'stock',
        
    ];

    //ici le produit est le dominer d'ou les dominants fournisseur et categorie ont porté BelonTo
    public function fournisseur():BelongsTo{//dominant cardianlité 1.n
        return $this->belongsTo(Fournisseur::class); 

    }
    public function categorie():BelongsTo{//dominant    
        return $this->belongsTo(Categorie::class); 

    }

    public function detail_commande():HasMany{//dominant    
        return $this->hasMany(detail_commande::class); 

    }
}
