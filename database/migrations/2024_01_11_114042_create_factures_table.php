<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User\Commande;
use App\Models\User\Produit;
use App\Models\User\Client;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->integer('montant');
            $table->string('details');
            $table->foreignIdFor(Commande::class);
            $table->foreignIdFor(Client::class);
            $table->foreignIdFor(Produit::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
