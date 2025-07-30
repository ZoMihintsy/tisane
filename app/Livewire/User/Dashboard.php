<?php

namespace App\Livewire\User;

use App\Models\Blog;
use App\Models\Commande;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $commande;
    public $commandes;
    public $coms;
    public function mount()
    {
        $this->coms = Blog::where('email',Auth::user()->email)->count();
        $this->commande = Commande::where('email',Auth::user()->email)->where('type','exp')->count();
        $this->commandes = Commande::where('email',Auth::user()->email)->where('type','wait')->count();
    }
    public function render()
    {
        return view('livewire.user.dashboard');
    }
}
