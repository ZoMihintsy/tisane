<?php

namespace App\Livewire\User;

use App\Models\Blog as ModelsBlog;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Blog extends Component
{
    public string $commentaire = "";
    public $blog;
    public $delete;
    public function mount()
    {
        $this->blog = ModelsBlog::orderBy('created_at','desc')->get();
    }
    public function saveComs()
    {
        $this->validate([
            'commentaire'=>'required'
        ]);
        ModelsBlog::create([
            'nom'=>Auth::user()->name,
            'email'=>Auth::user()->email,
            'commentaire'=>nl2br($this->commentaire)
        ]);
      $this->redirect("/blog+et/ou+commentaire");
    }
    public function delet()
    {
        if(!empty($this->delete))
        {
            ModelsBlog::where('id',$this->delete)->delete();
        }
        $this->redirect("/blog+et/ou+commentaire");

    }
    public function render()
    {
        return view('livewire.user.blog');
    }
}
