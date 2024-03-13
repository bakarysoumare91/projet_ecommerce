<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Categorie;

class CategorieController extends Controller
{
    public function listes_categorie(){
        $categorie=Categorie::orderBy('id','DESC')->get();//permet de gerer le forenisseur d'ordre decroissant
        return view("categorie.liste",compact('categorie'));
    }


    public function ajouter_Categorie_traitement(Request $request)//store
    {
        // Valider les données de la requête entrante
        $request->validate([
            'categorie'=>'required',
            
        ]);

        // Si la validation réussit, créer une nouvelle instance d'Etudiant
        $categorie = new Categorie();
        $categorie->categorie = $request->categorie;
    
        $categorie->save();
         toastr()->success("categorie a eté bien ajouté avec success ✨😃");
        return back();


    }


    public function details_categorie ($id){

        $cate = Categorie::where('id', $id)->first();
        //ici on prend $cate qui parcour la table au niaveau de la liste
        if (!$cate) {
        return redirect('/categorie')->with('error', "categorie n'a pas été trouvé");
        }   

        return view('categorie.detail', compact('cate'));
     }

     public function update_Categorie(Request $request)//store
    {
        // Valider les données de la requête entrante
        $request->validate([
            'categorie'=>'required',
            'id'=>'required',
            
        ]);

         // Si la validation réussit, créer une nouvelle instance d'Etudiant
         $categorie =Categorie::find($request->id);
         $categorie->categorie = $request->categorie;
     
         $categorie->update();
          toastr()->success("categorie a eté mise a jour avec success ✨😃");
         return back();
 
 
    }


   
}
