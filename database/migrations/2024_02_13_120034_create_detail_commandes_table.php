<?php

use App\Models\User\Commande;
use App\Models\User\Produit;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Produit::class);
            $table->foreignIdFor(Commande::class);
            $table->integer("qte_commande");
            $table->string("status")->nullable();
            $table->string("date_livraison")->nullable();
            $table->timestamps();
        });
    
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_commandes');
    }
};
