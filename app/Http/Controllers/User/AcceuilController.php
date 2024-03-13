<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Produit;
use Illuminate\Support\Facades\DB;

class AcceuilController extends Controller
{
    public function liste_acceuil()
    {
        $produitAll=Produit::all();
         $panier=session()->get('panier',[]);
         $count=count($panier);
            // dd($panier);
            // session()->flush(); //Vider toutes les sessions
        return view('layout.client_front',compact('count','produitAll'));
    }


    public function liste_index()
    {
        return view('layout.index');
    }

    public function details_product($id){
        $produit=Produit::find($id);
        if(!$produit){
            toastr()->warning("Informations introuvable ou produit inexistant");
            return back();
        }
        $produitCategorie=DB::table('produits')
        ->join('categories','categories.id','=','produits.categorie_id')
        ->where('categories.categorie',$produit->categorie->categorie)//si la table categories.son atribu(categirie) puis leproduit associe au categorie
       ->select('produits.*','categories.*')->get();
        return view("layout.details_product",compact('produit','produitCategorie'));
    }

}
