<?php

namespace App\Livewire\Layout;

use App\Livewire\Actions\Logout;
use App\Models\Categorie;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Navigation extends Component
{
    public $categorie;
    public function mount()
    {
        $this->categorie = Categorie::get();
    }
    public function logout(Logout $logout): void
    {
        $logout();
        Session::remove('panier');
        $this->redirect('/');
    }
    public function render()
    {
        return view('livewire.layout.navigation');
    }
}
