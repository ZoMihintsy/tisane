<?php

use App\Livewire\User\Panier;

new Panier;
?>
<div>
<div class="dashboard-section">
@php
        $cart = Session::get('panier', []);

        $totalItemsInCart = 0;
    @endphp
    <x-auth-session-status class="mb-4" :status="session('status')" />

    @if(empty($cart))
        <p>
            <center>
                Votre panier est vide
            </center>
        </p>
    @else
    
    @foreach($cart as $carts)
    
        @foreach($produit as $prod)
            @if($prod->id == $carts['id'])
                <div class="card product-card">
                    <h4>
                        Nom du produit : <strong>{{$prod->nom}}</strong>
                    </h4>
                    <strong>Description du produit:</strong>
                    {!! $prod->description1 !!}
                    {!! $prod->description2 !!}
                    @foreach($categorie as $cat)
                        @if($cat->id == $prod->categorie_id)
                    <h3>
                        Catégorie : <strong>{{$cat->nom}}</strong>
                    </h3>
                        @endif
                    @endforeach
                    <h3>
                        Nombre en stock : <strong>{{$prod->stock}}</strong>
                        <br>
                        Nombre à prendre : <strong>{{$carts['stock']}}</strong>
                        <br>
                        Prix de l'un : <strong>{{$prod->prix}} &euro;</strong>
                        <br>

                        Prix en total : <strong>{{$carts['stock'] * $prod->prix}} &euro;</strong>
                        <br>
                        Date du rendez-vous : <strong>{{ date('d/m/y à H:i',strtotime($carts['date']))}}</strong>
                    </h3>
                    <div class="card-actions">
                    <a href="{{route('valide.cmds',['id'=>$prod->id])}}">
                        <button>
                            Valider 
                        </button>
                    </a>
                    @php 
                        $id = $carts['id'];
                    @endphp
                    <button 
                    x-data="" 
                    x-on:click.prevent="$dispatch('open-modal','modal_{{$id}}')"
                     class="warning">
                        Modifier 
                    </button>
                    
                    <a href="{{route('delete.paniers',['id'=>$prod->id])}}">
                        <x-danger-button>
                            Supprimer
                        </x-danger-button>
                    </a>
                    </div>
                </div>
<x-modal name="modal_{{$carts['id']}}" :show="$errors->isNotEmpty()">
    <h2 class="text-3xl text-center">
        Modification du commande {{$prod->nom}}
    </h2>
    <form action="{{route('auth.paniers',['id'=>$prod->id])}}" method="post">
        @csrf
        @method('put')
        <strong>Nom </strong>
        {{Auth::user()->name}}
        <br>
        <strong>E-mail</strong>
        {{Auth::user()->email}}
        <br>
        <strong>Point de retrait</strong>
        <select name="retrait" class="w-full rounded" id="">
            <option value="">--{{ __('renseignement.point_commande') }}--</option>
            @if($point->isEmpty())
                <option value="">---il n'y a pas de point de vente disponible ---</option>
            @else
                @foreach($point as $points)
                    <option value="{{$points->id}}">{{$points->nom}} : {{$points->code_postale}}</option>
                @endforeach
            @endif
        </select>
        <br>
        <br>
        <strong>Nombre à prendre </strong>
        <x-text-input type="number" class="w-full" value="{{$carts['stock']}}" name="stock" placeholder="Nombre a prendre" />
        <br>
        <strong>Date et heure  du rendez-vous</strong>
        <br>
        <input type="datetime-local" name="date" value="{{$carts['date']}}" id="">
        <br>
        <div class="card-actions">
            <button>{{ __('renseignement.bouton_commande') }}</button>
        </div>
        
        
        <br>
        <br>
    </form>
</x-modal>
            @endif
        @endforeach
    @endforeach
    @endif
</div>
</div>
