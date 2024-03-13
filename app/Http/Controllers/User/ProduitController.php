<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Produit;
use App\Models\User\Fournisseur;
use App\Models\User\Categorie;

class ProduitController extends Controller
{
    public function liste_produit(){
        $produits=Produit::orderBy('id','DESC')->get();//permet de gerer le produit d'ordre decroissant
        $fournisseurAll=Fournisseur::all();//le meme variable $fournisseurAll on le declare au niveau de liste produit de view pour faire de boocle et recupere le nom de fournisseur
        $categorieAll=Categorie::all();
        $codeProduit=Produit::count();//
        return view("produit.liste",compact('codeProduit','produits','fournisseurAll','categorieAll')); 
    }



    public function ajouter_produit_traitement(Request $request)//store
    {
        // Valider les données de la requête entrante
        $request->validate([
            'designation'=>'required',
            'prix'=>'required',
            'stock'=>'required',
            'fournisseur_id'=>'required|exists:fournisseurs,id',//ici cest la jointure
            'categorie_id'=>'required|exists:categories,id',//ici cest la jointure
            'code'=>'required'
        
        ]);

        // Si la validation réussit, créer une nouvelle instance d'Etudiant
        
        $produit = new Produit();
        $produit->designation = $request->designation;
        $produit->code = $request->code;
        $produit->prix = $request->prix;
        $produit->stock = $request->stock;
        $produit->fournisseur_id = $request->fournisseur_id;
        $produit->categorie_id = $request->categorie_id;
        $produit->photo_first = "";
        $produit->photo_second = "";
        $produit->photo_third = "";



       
        $produit->save();
         toastr()->success("produit ajouté avec success ✨😃");
        return back();

    }


    public function details_produit($id){

        $produit = Produit::where('id', $id)->first();
        $fournisseurAll=Fournisseur::all();
        $categorieAll=Categorie::all();

        if (!$produit) {
        return redirect('/produit')->with('error', "produit n'a pas été trouvé");
        }   

        return view('produit.detail', compact('produit','categorieAll','fournisseurAll'));
     }



     public function update_produit(Request  $request){//traitement 
        $request->validate([
            'designation'=>'required',//les names
            'prix'=>'required',
            'stock'=>'required',
            'fournisseur_id'=>'required|exists:fournisseurs,id',//ici cest la jointure
            'categorie_id'=>'required|exists:categories,id',//ici cest la jointure
        ]);

        $produit=produit::find($request->id);
        $produit->designation = $request->designation;//1 base de donner et 2 le name de formulaire
        $produit->prix = $request->prix;
        $produit->stock = $request->stock;
        $produit->fournisseur_id = $request->fournisseur_id;
        $produit->categorie_id = $request->categorie_id;
        $produit->photo_first = "";
   

        /* if($request->hasFile("profil")){
            $fournisseur->profile = $request->file('profil')->store('profile','public');
        }
     */

        $produit->update();
         toastr()->success("produit mise a jour avec success ✨😃");
        return back();

    }


    public function ajouter_image_traitement(Request $request)//store 
    {
        // valide les données de la requête entrante
        $request->validate([
            'image1'=>'nullable|image|mimes:png,jpg,jpeg',
            'image2'=>'nullable|image|mimes:png,jpg,jpeg',
            'image3'=>'nullable|image|mimes:png,jpg,jpeg',
                     
        ]);

        // Si la validation réussit, créer une nouvelle instance de 
        //Cette ligne récupère le produit associé à l'identifiant (id) fourni dans la requête.
        $produit=produit::find($request->id);
        //Vérifie si un fichier avec le nom de champ 'image1' a été envoyé avec la requête.
        if($request->hasFile('image1')){
            $produit->photo_first = $request->file('image1')->store('profile','public');//ici c'est pour recuperer l'image1 et stocker dans profile qui est dans public
        }
        if($request->hasFile('image2')){
            $produit->photo_second = $request->file('image2')->store('profile','public');
        }
        if($request->hasFile('image3')){
            $produit->photo_third= $request->file('image3')->store('profile','public');
        }        

       
        $produit->save();
         toastr()->success("image ajouté avec success ✨😃");
        return back();

    }


}
