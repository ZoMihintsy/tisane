<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Client extends Component
{
    public $client;
    public function mount()
    {
        $this->client = User::orderBy('created_at','desc')->where('type','client')->orWhere('type','ex-client')->get();
    }
    public function render()
    {
        return view('livewire.admin.client');
    }
}
