<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Commande;
use App\Models\User\Facture;
use App\Models\User\detail_commande;


class CommandeController extends Controller
{
    public function liste_commande(){
        $commandes=Commande::orderBy('id','DESC')->get();//permet de gerer le forenisseur d'ordre decroissant
        return view("commande.liste",compact('commandes'));
    }


    public function detail_commande($id){
        $commandes=Commande::find($id);
        if(!$commandes){
            toastr()->error("Informations indisponible !");
            return back();
        }

        $detail_commandes=detail_commande::where('commande_id',$commandes->id)->get();
        
        return view("commande.detail",compact('detail_commandes'));
    }


    public function valider_commande($id){
        $commandes=Commande::find($id);
        if(!$commandes){
            toastr()->error("Informations indisponible !");
            return back();
        }
       
        $commandes->status="Valider";
        $commandes->update();
        $factures=new Facture();
        $factures->date=date('Y-m-d');
        $factures->commande_id=$commandes->id;
        $factures->montant=$this->somme_factures($commandes->id);
        $factures->save();
        toastr()->success("Commandes valider avec success !");
        return back();
    }
    

}
