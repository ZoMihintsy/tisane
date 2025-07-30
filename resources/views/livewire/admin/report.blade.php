<?php

use App\Livewire\Admin\Report;

new Report;
?>
<div>
<x-auth-session-status class="mb-4" :status="session('status')" />

<div class="dashboard-section">
    @if($blog->isEmpty())
    <div class="card-grid">
        <h3 class="text-center">
            Il n'y a pas de commentaire pour l'instant
        </h3>
    </div>
    @else
        <div class="card-grid">
            @foreach($blog as $blogs)
        
        <div class="card category-card">
        <h3 class="text-center">
            {{ $blogs->nom }}
        </h3>
        <h4>
            <strong>E-mail : </strong><a href="mailto:{{$blogs->email}}">{{$blogs->email}}</a>
        </h4>
        <p>
            {!! $blogs->commentaire !!}
        </p>
        <div class="card-actions">
            {{$blogs->created_at->diffForHumans()}}
            <br>
            <br>
           <label for="delete" style="border: 1px solid red;color:white;background-color:red; border-radius:2px;padding:5px 5px;cursor:pointer">Supprimer </label>
            <input type="radio" name="" id="delete" wire:model="delete" wire:input="delet"  value="{{$blogs->id}}" class="hidden">
        </div>
        </div>
        @endforeach
        </div>
    @endif
</div>
</div>
