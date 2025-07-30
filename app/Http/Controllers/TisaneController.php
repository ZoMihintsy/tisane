<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Commande;
use App\Models\Point;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use function Livewire\Features\SupportSession\exists;

class TisaneController extends Controller
{
    //
    public function panier(Request $request , Produit $id)
    {
        
       
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'retrait' => 'required|string|max:255',
            'stock' => 'required|integer|min:1',
            'date' => 'required'
        ]);
       $inquiries = Session::get('panier', []);
        $n = 0;
        $stock = $request->stock;
        foreach ($inquiries as $key => $cartItem) {
            if ($cartItem['id'] == $id->id) {
                $n++;
                $inquiries[$key]['stock'] = $stock + $cartItem['stock'];
                break;
            }
        }
            if($n == 0)
            {
                $inquiries[] = [
                'id' => $id->id,
                'nom' => $request->nom,
                'email' => $request->email,
                'retrait' => $request->retrait,
                'stock' => $request->stock,
                'date'=>$request->date,
                'timestamp' => now()->toDateTimeString(), 
            ];
        
        }
        Session::put('panier', $inquiries);
        Session::flash('status', 'Votre demande a été enregistrée temporairement dans votre session !');
        return back();
    }

    public function paniers(Request $request , Produit $id)
    {
        
       
        $request->validate([
            'retrait' => 'required|string|max:255',
            'stock' => 'required|integer|min:1',
            'date' => 'required'
        ]);
       $inquiries = Session::get('panier', []);
        $n = 0;
        $stock = $request->stock;
        foreach ($inquiries as $key => $cartItem) {
            if ($cartItem['id'] == $id->id) {
                $n++;
                $inquiries[$key]['stock'] = $stock + $cartItem['stock'];
                break;
            }
        }
            if($n == 0)
            {
                $inquiries[] = [
                'id' => $id->id,
                'nom' => Auth::user()->name,
                'email' => Auth::user()->email,
                'retrait' => $request->retrait,
                'stock' => $request->stock,
                'date'=>$request->date,
                'timestamp' => now()->toDateTimeString(), 
            ];
        
        }
        Session::put('panier', $inquiries);
        Session::flash('status', 'Votre demande a été enregistrée temporairement dans votre session !');
        return back();
    }
    public function modificationGuestPanier(Request $request, Produit $id)
    
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'retrait' => 'required|string|max:255',
            'stock' => 'required|integer|min:1',
            'date' =>'required'
        ]);
       $inquiries = Session::get('panier', []);
        $n = 0;
        $stock = $request->stock;
        foreach ($inquiries as $key => $cartItem) {
            if ($cartItem['id'] == $id->id) {
                $n++;
                $inquiries[$key]['stock'] = $stock ;
                $inquiries[$key]['nom'] = $request->nom;
                $inquiries[$key]['email'] = $request->email;
                $inquiries[$key]['retrait'] = $request->retrait;
                $inquiries[$key]['date'] = $request->date;
                break;
            }
        }
        Session::put('panier', $inquiries);
        return back();
    }
    public function modificationAuthPanier(Request $request, Produit $id)
    
    {
        $request->validate([
            'retrait' => 'required|string|max:255',
            'stock' => 'required|integer|min:1',
            'date' =>'required'
        ]);
       $inquiries = Session::get('panier', []);
        $n = 0;
        $stock = $request->stock;
        foreach ($inquiries as $key => $cartItem) {
            if ($cartItem['id'] == $id->id) {
                $n++;
                $inquiries[$key]['stock'] = $stock ;
                $inquiries[$key]['retrait'] = $request->retrait;
                $inquiries[$key]['date'] = $request->date;
                break;
            }
        }
        Session::put('panier', $inquiries);
        return back();
    }
    public function deleteGuestPanier(Produit $id)
    {
        $inquiries = Session::get('panier', []);
        $n = 0;
        foreach ($inquiries as $key => $cartItem) {
            if ($cartItem['id'] == $id->id) {
                $n++;
                unset($inquiries[$key]);
                break;
            }
        }
        $inquiries = array_values($inquiries);
        Session::put('panier', $inquiries);
    
        return back();
    }
    public function commandePanier(Produit $id)
    {
        $inquiries = Session::get('panier', []);
        foreach ($inquiries as $key => $cartItem) {
            if ($cartItem['id'] == $id->id) {
                $nom = $cartItem['nom'];
                $email = $cartItem['email'];
                $stock = $cartItem['stock'];
                $produit_id = $cartItem['id'];
                $retrait = $cartItem['retrait'];
                $date = $cartItem['date'];
                unset($inquiries[$key]);
            break;
            }

        }
        
        if($id->stock >= 1 && $stock <= $id->stock)
        {
    Commande::create([
        'nom' => $nom,
        'email' =>$email,
        'stock'=>$stock,
        'produit_id'=>$produit_id,
        'retrait'=>$retrait,
        'date'=>$date,
        'type'=>"wait",
        ]);
        $id->update([
            'stock'=>$id->stock - $stock,
        ]);
        $inquiries = array_values($inquiries);
        Session::put('panier', $inquiries);
        session()->flash('status','Votre commande a été envoyer avec succès.');
        }else{
            session()->flash('status','Votre commande n\'est pas envoyée , le nombre a demander est plus élevée que le nombre de produit en stock ');
        }
        
        return back();
    }
    //admin 
    public function expedie(Commande $id)
    {
        $id->update([
            'type'=>'exp'
        ]);
        return back();
    }
    public function saveModif(Request $request, Produit $id)
    {
        $request->validate([
            'nom'=>'required',
            'categorie_id'=>'required',
            'prix'=>'required',
            'stock'=>'required',
            'description1'=>'required',
        ]);
        if(empty($request->photo)){
            $photo = $id->photo;
        }else{
         $request->photo->store('public');
        $photo = $request->photo->store();   
        }
        $id->update([
            'nom'=> $request->nom,
            'categorie_id'=> $request->categorie_id,
            'prix'=> $request->prix,
            'stock'=> $request->stock,
            'description1'=> nl2br($request->description1),
            'description2'=> nl2br($request->description2),
            'photo'=>$photo,
        ]);
        return back();
    }
    public function delete_prod(Produit $id)
    {
        Commande::where('produit_id',$id->id)->delete();
        $id->delete();
        return back();

    }
    public function delete_cat(Categorie $id)
    {
        
        $prod = Produit::where('categorie_id',$id->id)->first();
        if($prod)
        {
        Commande::where('produit_id',$prod->id)->delete();
        Produit::where('categorie_id',$id->id)->delete();
        }
        $id->delete();
        Session::flash('status', 'Catégorie bien supprimée.');
        return back();
        
        

    }
    public function delete_pts(Point $id)
    {
        
        $prod = Commande::where('retrait',$id->id)->first();
        if($prod)
        { 
        Produit::where('id',$prod->produit_id)->delete();
        Commande::where('retrait',$prod->id)->delete();
        }
        $id->delete();
        Session::flash('status', 'Point de vente bien supprimée.');

        return back();

    }

    public function saveModifCat(Request $request, Categorie $id)
    {
        $request->validate([
            'nom'=>'required',
        ]);
        
        $id->update([
            'nom'=> $request->nom,
            'description'=> nl2br($request->description),
        ]);
        Session::flash('status', 'La catégorie est bien modifiée.');

        return back();
    }
    public function saveModifpts(Request $request, Point $id)
    {
        $request->validate([
            'nom'=>'required',
            'ville'=>'required',
            'code_postale'=>'required'
        ]);
        
        $id->update([
            'nom'=> $request->nom,
            'ville'=> $request->ville,
            'code_postale'=> $request->code_postale,
        ]);
        Session::flash('status', 'Le point de vente est bien modifiée.');

        return back();
    }

    public function clients_atch(User $id)
    {
        $id->update([
            'type'=>'client'
        ]);
        return back();
    }
    public function clients_dtch(User $id)
    {
        $id->update([
            'type'=>'ex-client'
        ]);
        Session::flash('status', 'Le client est détaché du site');

        return back();
    }

    // ModelsCategorie::create([
    //     'nom'=>$this->nom,
    //     'description'=>nl2br($this->description)
    // ]);
    //User
    public function delete_p(Commande $id)
    {
        if($id->type == "wait")
        {
        $prod = Produit::where('id',$id->produit_id)->first();
        Produit::where('id',$id->produit_id)->update([
            'stock'=> $prod->stock + $id->stock,
        ]);
        Session::flash('status', 'Le client est reattaché au site');

        $id->delete(); 
        }
       
        return back();
    }
    public function gstock(Categorie $id)
    {
        // $cat = Categorie::where("id",$id->id)->first();
       
        
        
        $categorie = Categorie::get();
        $produit = Produit::where('categorie_id',$id->id)->get(); 
            return view('admin.getion_prod',['id'=>$id,'produit'=>$produit , 'categorie'=>$categorie]);       
    }
}
