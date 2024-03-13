<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User\Categorie;
use App\Models\User\Fournisseur;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('designation');
            $table->string('prix');
            $table->string('photo_first');
            $table->string('photo_second');
            $table->string('photo_third');
            $table->string('stock');
            $table->foreignIdFor(Categorie::class);
            $table->foreignIdFor(Fournisseur::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
