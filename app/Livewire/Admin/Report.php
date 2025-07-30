<?php

namespace App\Livewire\Admin;

use App\Models\Blog;
use Livewire\Component;

class Report extends Component
{
    public $blog;
    public $delete;
    public function mount()
    {
        $this->blog = Blog::orderBy('created_at','desc')->get();
    }
    public function delet()
    {
        if(!empty($this->delete))
        {
            Blog::where('id',$this->delete)->delete();
        }
        $this->redirect('/admin/report');
    }
    public function render()
    {
        return view('livewire.admin.report');
    }
}
