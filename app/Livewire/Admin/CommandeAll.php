<?php

namespace App\Livewire\Admin;

use App\Models\Categorie;
use App\Models\Commande;
use App\Models\Point;
use App\Models\Produit;
use Livewire\Component;

class CommandeAll extends Component
{
    public $commande;
    public $produit;
    public $categorie;
    public $point;
    public function mount()
    {
        $this->commande = Commande::orderBy('type','desc')->get();
        $this->produit = Produit::get();
        $this->categorie = Categorie::get();
        $this->point = Point::get();
    }
    public function render()
    {
        return view('livewire.admin.commande-all');
    }
}
