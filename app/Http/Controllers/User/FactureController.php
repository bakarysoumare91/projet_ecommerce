<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Facture;

class FactureController extends Controller
{
    //

    public function listes_facture(){
        $facture=Facture::orderBy('id','DESC')->get();//permet de gerer le forenisseur d'ordre decroissant
        return view("facture.liste",compact('facture')); 
    }
}
