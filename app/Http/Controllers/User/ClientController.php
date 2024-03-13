<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Client;
use App\Models\User\Produit;
use App\Models\User\Commande;
use App\Models\User\detail_commande;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class ClientController extends Controller
{
    public function listes_client(){
        $clients=Client::orderBy('id','DESC')->get();//permet de gerer le client d'ordre decroissant
        return view("client.liste",compact('clients'));
     }


      public function ajouter_client_traitement(Request $request)//store
     {
        // Valider les données de la requête entrante
        $request->validate([
            'nom'=>'required',
            'adresse'=>'nullable',
            'tel'=>'required',
            'email'=>'nullable',
            
            
        ]);

        // Si la validation réussit, créer une nouvelle instance d'Etudiant
       $client = new Client();
       $client->nom = $request->nom;
       $client->adresse = $request->adresse;
       $client->tel = $request->tel;
       $client->email = $request->email;
      
        
       $client->save();
         toastr()->success("client ajouté avec success ✨😃");
        return back();

     }

     public function update_client(Request  $request){//traitement 
        $request->validate([
            'nom'=>'required',
            'adresse'=>'nullable',
            'tel'=>'required',
            'email'=>'nullable',
            'id'=>'required'
        ]);


       $client = Client::find( $request->id);
       $client->nom = $request->nom;
       $client->adresse = $request->adresse;
       $client->tel = $request->tel;
       $client->email = $request->email;

    
       $client->update();
         toastr()->success("client mise a jour avec success ✨😃");
        return back();

     }

        public function details_client ($id){

        $client = Client::where('id', $id)->first();

        if (!$client) {
        return redirect('/client')->with('error', "client n'a pas été trouvé");
        }   

        return view('client.detail', compact('client'));
     }



            // connexion pour le client c'est une requete
        public function login_client(Request $request){//ici validate c'est pour verifier si les information existe dans la requete  il nous envoie dans la base de donnees sinon il nous demande remplire le champ
            if($request->has(['EmailOrTel','password'])){
                toastr()->info("Les champs sont obligatoire");
                return back();
            }
            //verification si le client existe dans la base de donnees
            $clientExist=Client::where('email',$request->emailOrTel)->Orwhere('tel',$request->emailOrTel)->first();//cette ligne de code effectuer une recherche dans la base de données.

            if(!$clientExist){//ici cest pour dire si le client n'existe pas dans la base on lui dit de creer un compt
                toastr()->error("Informations introuvable ou veuillez creer un compte");
                return back();
            }
            if(!Hash::check($request->password,$clientExist->password)){//ici ce pour verifier si le mdp fourni corespond au mdp qui est dans la basse 
                toastr()->error("Informations introuvable ou veuillez creer un compte");
                return back();
            }

            //cette session va recuperer l'id du client pour stock dans variable client qui dans session
            session(['client'=>$clientExist->id]);

            return redirect()->route('acceuil.client.dasboard');//si tout est correcte il nous redrige ver la page d'accueil

        }       
        //ici permet le client de regarder cet touce qu'il a commander
        public function acceuil_client(){
            //apartire de variable client on peut recuperer id du client
            $idClient=session()->get('client');
            //on rcherche le client dans la base de donné
            $clientExist=Client::find($idClient);

            if(!$clientExist){
              toastr()->error("Connecter vous pour avoir acces à cette page !");
             return redirect()->route('listes.acceuil');
            }
 
            $commande=DB::table('detail_commandes')
            ->leftJoin('commandes','commandes.id','=','detail_commandes.commande_id')
            ->leftJoin('produits','produits.id','=','detail_commandes.produit_id')
            ->where('commandes.client_id',$clientExist->id)
            ->orderBydesc('commandes.date')
            ->select('commandes.date','commandes.status as stat','produits.designation','produits.prix','produits.photo_first','detail_commandes.*')->paginate(5);
        
                return view("layout.dashboard",compact('commande','clientExist'));
        }

        // si on clique il nous redrige ver page d'enregistrement

        public function  register_client(){
           
            return view("layout.register");
        }

            // creation de compte de client s'il na pas de compt
        public function create_client(Request $request){//ajout client
        $request->validate([
            'name'=>'required',
            'tel'=>"required",
            'adresse'=>'nullable',
            'password'=>"required",
            'confirmation_password'=>"required"
        ]);

        if($request->password !=$request->confirmation_password){
            toastr()->warning("Les Mots de passes ne sont pas identiques !!");
            return back();
        }

        $clientExist=Client::where('email',$request->email)->Orwhere('tel',$request->tel)->first();//cette ligne de code effectuer une recherche dans la base de données s'il existe il nou renvoi une information+.
         if( $clientExist){
            toastr()->warning("Email ou Numéro de téléphone déjà existant !");
            return back();
         }
        $client=new Client();
        $client->nom=$request->name;
        $client->tel=$request->tel;
        $client->adresse=$request->adresse ?:"";
        $client->email=$request->email ?:"";
        $client->password=Hash::make($request->password);
        $client->save();
        toastr()->info("Compte creer avec succes 👍👍✔!!");
        return back();


        }


      public function  add_product_panier(Request $request){

        // La méthode commence par rechercher le produit dans la base de données
        // en utilisant son ID, qui est passé dans la requête.
        $produit=Produit::where('id',$request->id)->first();

        //Vérification de l'existence du produit dans le panier 
        if(!$produit){
            return response()->json(['erreur'=>'Le produit n\'existe pas '], 404);

        }
        //Ensuite, la méthode récupère le contenu du panier depuis la session
        $panier=session()->get('panier',[]);
        //on suppose que le produit n'existe pas dans le panier.
        $produitExist=false;

        // Une boucle foreach parcourt chaque élément du panier.
        foreach($panier as $prod){
            if($request->id == $prod['produit_id']){//ici c'est si l'id du du produit dans la requête ($request->id)= l'ID du produit dans le panier ($prod['produit_id']).

                //Si une correspondance est trouvée (c'est-à-dire si le produit est déjà présent dans le panier),
                // la variable $produitExist est définie sur true
                $produitExist=true;
                
                //la boucle est interrompue avec break
                 break;
               
            }

        } 
            //Si $produitExist est égal à true, cela signifie que le produit existe déjà dans le panier.
            if($produitExist == true){
            
            return response()->json(['error' => 'Le produit est déjà dans le panier'], 404);

         }

         
         //Un nouvel élément de panier est créé sous la forme d'un tableau associatif.
         $panier[]=[
            'produit_id'=>$produit->id,
            'designation'=>$produit->designation,
            'prix'=>$produit->prix,
            'categorie'=>$produit->categorie->categorie,
            'qte_commande'=>1,
            'profile'=>$produit->photo_first

         ];

         // La méthode session()->put('panier', $panier) est utilisée pour stocker le tableau $panier
         // contenant les éléments du panier dans la session. Cela permet de sauvegarder le panier
         // et de le récupérer ultérieurement dans la même session.

         session()->put('panier',$panier);
         //Calcul du nombre d'éléments dans le panier
         $count=$this->count_tab($panier);
         //ici c'est pour mettre à jour dynamiquement l'affichage du nombre d'éléments dans le panier, sans avoir à recharger la page
          return response()->json(['count' => $count]);

            
    }


    //c'est pour compter le nobre d'element dans le panier
    public function count_tab($array){
        return count($array);
    }

     // cette méthode récupère le panier de la session, calcule la somme totale des produits dans le panier,
    public function vue_panier(){
        //Récupération du panier depuis la session
        $panier=session()->get('panier',[]);//Si aucun panier n'existe en session, un tableau vide est retourné par défaut.
        $sommeTotal=0; //initialisée à zéro pour stocker la somme totale du panier.
        foreach($panier as $prod){
         $sommeTotal=$sommeTotal+($prod['prix']*$prod['qte_commande']);
        } 
        
          return view("layout.liste_panier",compact('panier','sommeTotal'));
     }


    public function update_panier(Request $request){
            //Vérification de la disponibilité du produit en stock
            //pour récupérer le produit à partir de la base de données en fonction de l'ID passé dans la requête
            $produitVerification=Produit::find($request->id);
            //il vérifie si la quantité demandée dépasse la quantité en stock du produit 
            if($produitVerification->stock<$request->qte_commande){
                //Si oui, un avertissement est affiché à l'utilisateur à l'aide de
                toastr()->warning("Désolé nous avons plus cette quantité en stock !");
                return back();
            }
            // le panier est récupéré depuis la session à l'aide de 
            $panier = session()->get('panier', []);

            $productId = $request->id;

            $newQuantity = $request->qte_commande;

            // Utilisation de array_map pour mettre à jour le produit spécifique
            // array_map permet de modifier uniquement l'élément spécifique du panier sans modifier les autres éléments.
            // ici $item c'est comme une boucle qui parcourt le tableau
            $panier = array_map(function ($item) use ($productId, $newQuantity) {
                if ($item['produit_id'] == $productId) {
                    $item['qte_commande'] = $newQuantity;//si les deux id son pareil il peut modifier la quantite
                }
                return $item;//tu nous retourne item et ajoute dans panier
            }, $panier);

            session()->put('panier', $panier);
            toastr()->success("Quantité modifiée avec succès !");
            return back();
        }

        //Vérifie si les champs "EmailOrTel" et "password" sont présents dans la requête
        public function valide_commande(Request $request){
            if($request->has(['EmailOrTel','password'])){
                          toastr()->info("Les champs sont obligatoire");
                          return back();
                   }
                   //Recherche du client dans la base de données 
                   $clientExist=Client::where('email',$request->emailOrTel)->Orwhere('tel',$request->emailOrTel)->first();//cette ligne de code effectuer une recherche dans la base de données.
           
                   if(!$clientExist){//Si aucun client n'est trouvé, un message d'erreur est affiché à l'utilisateur lui demandant de créer un compte
                       toastr()->error("Informations introuvable ou veuillez creer un compte");
                       return back();
                   }
                   //Vérifie si le mot de passe fourni correspond au mot de passe haché stocké dans la base de données pour ce client
                   //Si le mot de passe ne correspond pas, un message d'erreur est affiché à l'utilisateur et la méthode retourne à la page précédente
                    if(!Hash::check($request->password,$clientExist->password)){
                       toastr()->error("Informations introuvable ou veuillez creer un compte");
                       return back();
                    }
                    $panier=session()->get('panier',[]);
                    //Génère un numéro de facture unique basé sur des caractères aléatoires et l'ID du client.
                    $caracteres_aleatoires = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                    $facture = 'INV' . substr(str_shuffle($caracteres_aleatoires), 0, 7);
                    
                    //Crée un nouvel enregistrement dans la table des commandes
                    $commandes=new Commande();
                    $commandes->matricule=$facture.$clientExist->id;        
                    $commandes->date=date('Y-m-d');
                    $commandes->livraison=date('Y-m-d');
                    $commandes->status="En-cours";
                    $commandes->client_id=$clientExist->id;
                    $commandes->quantite= 0;

                    $commandes->save();
                    //Parcourt chaque produit dans le panier
                    foreach($panier as $prod){
                        //Pour chaque produit, récupère les détails du produit depuis la base de données.
                       $produit = Produit::findOrFail($prod['produit_id']);
                       //Crée un nouvel enregistrement dans la table des détails de la commande
                       // avec l'ID de la commande, l'ID du produit et la quantité commandée.
                       $ventes=new detail_commande();
                       $ventes->produit_id=$prod['produit_id'];
                       $ventes->commande_id=$commandes->id;
                       $ventes->qte_commande=$prod['qte_commande'];
                       $ventes->save();
                       //Met à jour le stock du produit en soustrayant la quantité commandée.
                       $produit->update(['stock' => $produit->stock - $prod['qte_commande']]);
                    }
                    //Une fois que toutes les commandes ont été enregistrées avec succès, le panier est effacé
                    session()->forget('panier');
                    //Confirmation de la validation des commandes 
                    toastr()->info("Vos commandes sont valider avec success");
                   return back();
               }
           


}

