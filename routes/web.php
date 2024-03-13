<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\User\FournisseurController;
use \App\Http\Controllers\User\FactureController;
use \App\Http\Controllers\User\CategorieController;
use \App\Http\Controllers\User\ClientController;
use \App\Http\Controllers\User\ProduitController;
use \App\Http\Controllers\User\CommandeController;
use \App\Http\Controllers\User\AcceuilController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
                //partie pour administrateur
Route::get('/dasbord', function () {return view('master');})->name("homeAdmin");

                //partie pour fournisseur
Route::get('/fournisseur',[FournisseurController::class,'listes_fournisseur'])->name('listes.fournisseur');
Route::post('/ajout-fournisseur',[FournisseurController::class,'ajouter_fournisseur_traitement'])->name('ajouter.fournisseur');
Route::get('/fournisseur/detail/{id}',[FournisseurController::class,'details_fournisseur'])->name('details.fournisseur');
Route::post('/fournisseur/update/',[FournisseurController::class,'update_fournisseur'])->name('update.fourniseur');

                //partie pour categorie
Route::get('/categorie',[CategorieController::class,'listes_categorie'])->name('listes.categorie');
Route::post('/ajout-categorie',[CategorieController::class,'ajouter_categorie_traitement'])->name('ajouter.categorie');
Route::get('/categorie/detail/{id}',[CategorieController::class,'details_categorie'])->name('details.categorie');
Route::post('/categorie/update/',[CategorieController::class,'update_categorie'])->name('update.categorie');

                //partie pour client
Route::get('/client',[ClientController::class,'listes_client'])->name('listes.client');
Route::post('/ajout-client',[ClientController::class,'ajouter_client_traitement'])->name('ajouter.client');
Route::get('/client/detail/{id}',[ClientController::class,'details_client'])->name('details.client');
Route::post('/client/update/',[ClientController::class,'update_client'])->name('update.client');
Route::post('/client_auth',[ClientController::class,'login_client'])->name('client.login');
Route::get('/client_register',[ClientController::class,'register_client'])->name('register.client');
Route::post('/client_create',[ClientController::class,'create_client'])->name('client.create');
Route::post('/add_product_to_panier',[ClientController::class,'add_product_panier'])->name('product.panier');
Route::get('/panier_client/client/',[ClientController::class,'vue_panier'])->name('panier.vue.client');
Route::post('/update_panier_client',[ClientController::class,'update_panier'])->name('update.panier.client');
Route::post('/valide_commande',[ClientController::class,'valide_commande'])->name('valider.commande.panier');
Route::get('/acceuil/client/',[ClientController::class,'acceuil_client'])->name('acceuil.client.dasboard');

                //partie pour produit
route::get('/produit',[ProduitController::class,'liste_produit'])->name('listes.produit');
Route::post('/ajout-produit',[ProduitController::class,'ajouter_produit_traitement'])->name('ajouter.produit');
Route::get('/produit/detail/{id}',[ProduitController::class,'details_produit'])->name('details.produit');
Route::post('/produit/update/',[ProduitController::class,'update_produit'])->name('update.produit');    

Route::post('/ajout-image',[ProduitController::class,'ajouter_image_traitement'])->name('ajouter.image');

                //partie pour commande
Route::get('/commande',[CommandeController::class,'liste_commande'])->name('listes.commande');
Route::get('/details_commande/{id}',[CommandeController::class,'detail_commande'])->name('detail.commandes');
Route::get('admin/valider_commande/{id}',[CommandeController::class,'valider_commande'])->name('valider.commandes');

                //partie pour acueille  
Route::get('/',[AcceuilController::class,'liste_acceuil'])->name('listes.acceuil');
Route::get('/inconnue',[AcceuilController::class,'liste_index'])->name('listes.index');
Route::get('/details_product/{id}',[AcceuilController::class,'details_product'])->name('product.details');




