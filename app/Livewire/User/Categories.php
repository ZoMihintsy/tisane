<?php

namespace App\Livewire\User;

use App\Models\Categorie;
use App\Models\Produit;
use Livewire\Component;

class Categories extends Component
{
    public $categorie;
    public $produit;
    public $id;
    public function mount()
    {
        $this->categorie = Categorie::where('id',$this->id)->first();
        $this->produit = Produit::where('categorie_id',$this->id)->count();
    }
    public function render()
    {
        return view('livewire.user.categories');
    }
}
