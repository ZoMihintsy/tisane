<?php

namespace App\Livewire\User;

use App\Models\Categorie;
use App\Models\Commande as ModelsCommande;
use App\Models\Point;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Commande extends Component
{
    public $commande;
    public $produit;
    public $categorie;
    public $point;
    public function mount()
    {
        $this->commande = ModelsCommande::orderBy('type','desc')->where('email',Auth::user()->email)->get();
        $this->produit = Produit::get();
        $this->categorie = Categorie::get();
        $this->point = Point::get();
    }
    public function render()
    {
        return view('livewire.user.commande');
    }
}
