<?php

use App\Livewire\Admin\CommandeWait;

new CommandeWait;
?>
<div>
@if($commande->isEmpty())
    <div>
        <h2>
            Il n'y a pas de commande pour le moment.
        </h2>
    </div>
@else
<x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="card-grid">
        @foreach($commande as $cmd)
        
        <div class="card category-card orders">
       
            <h2 class="text-center">
                Commande éxpédier
            </h2>
            <strong>Nom </strong>{{$cmd->nom}}
             <br>
             <strong>E-mail </strong> <a href="mailto:{{$cmd->email}}">{{$cmd->email}}</a>
             @foreach($produit as $prd)
                @if($prd->id == $cmd->produit_id)
                <strong>Nom du produit </strong>    {{$prd->nom}}
                <strong>Prix </strong> {{$prd->prix}} &euro;
                <strong>Nombre à prendre </strong> {{$cmd->stock}}
                <strong>Prix en total </strong>
                {{$prd->prix * $cmd->stock}} &euro;
                @endif
            @endforeach
            <strong>Point du retrait </strong> @foreach($point as $pt) @if($pt->id == $cmd->retrait) {{$pt->nom. ' : '. $pt->code_postale}} @endif @endforeach
             <br>
            <div class="card-actions">
                <a href="{{route('expedie.cmd',['id'=>$cmd->id])}}"> <button>Expédier</button> </a>
            </div>
        </div>
        @endforeach
    </div>
@endif
</div>
