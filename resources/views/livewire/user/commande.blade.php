<?php

use App\Livewire\User\Commande;

new Commande;
?>
<div>
@if($commande->isEmpty())
    <div>
        <h2>
            Il n'y a pas de commande pour le moment.
        </h2>
    </div>
@else
    <div class="card-grid">
        @foreach($commande as $cmd)
        
        <div class="card category-card orders">
        @if($cmd->type == "wait")
            <h2 class="text-center">
                Commande en attente
            </h2>
        @else 
            <h2 class="text-center">
                Commande éxpédier
            </h2>
        @endif
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
             <strong>Date et heure du retrait : </strong> {{ date("d/m/Y à  H:i", strtotime($cmd->date)) }}
             
            <div class="card-actions">
                @if($cmd->type == "wait")
                <a href="{{route('supprime.cmd',['id'=>$cmd->id])}}" onclick="if(confirm('supprimer cette commande ? ')){}else return false;"> <button class="delete">supprimer</button> </a>
            
            @else
                <b>Expédier {{$cmd->updated_at->diffForHumans() }}</b>
            @endif
            </div>
        </div>
        @endforeach
    </div>
@endif
</div>
