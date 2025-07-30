<?php

namespace App\Livewire\Admin;

use App\Models\Blog;
use App\Models\Categorie;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public $user;
    public $categorie;
    public $produit;
    public $coms;
    public $cmd;
    public function mount()
    {
        $this->user = User::where('type','client')->count();
        $this->categorie = Categorie::count();
        $this->produit = Produit::count();
        $this->coms = Blog::count();
        $this->cmd = Commande::count();
    }
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
