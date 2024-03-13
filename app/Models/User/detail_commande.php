<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class detail_commande extends Model
{
    use HasFactory;   
    
     public function commande():BelongsTo{//dominant    
        return $this->belongsTo(Commande::class); 

    }
    public function produit():BelongsTo{//dominant    
        return $this->belongsTo(Produit::class); 

    }



}
