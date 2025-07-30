<?php

use App\Livewire\Guest\Produit;

new Produit;
?>
<div>
<div class="dashboard-section">
        <h2>Les produits</h2>
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="card-grid">
        
            @if($produit->isEmpty())
                <p>
                    Il n'y a pas de produit pour le moment
                </p>
            @else
            @foreach($produit as $produits)
                <div class="card product-card">
                    <h3>{{$produits->nom}}</h3>
                    <p><strong>ID:</strong> {{$produits->id}}</p>
                    <p><strong>Catégorie:</strong> @foreach($categorie as $category) @if($category->id == $produits->categorie_id) {{$category->nom}} @endif @endforeach</p>
                    <p><strong>Prix:</strong> {{$produits->prix}} €</p>
                    <p><strong>Stock:</strong> {{$produits->stock}}</p>
                    <p><strong>Description:</strong> {!! $produits->description1 !!} {!! $produits->description2 !!}</p>
                    <p><strong>Image:</strong> <img src="{{asset('storage/'.$produits->photo)}}" style="width:5cm;height:5cm" alt="" srcset=""></p>
                    <div class="card-actions">
                        @if($produits->stock == 0)

                        @else
                        <button x-data=""
                            x-on:click.prevent="$dispatch('open-modal','modal_{{$produits->id}}')">Panier</button>
                        @endif
                    </div>
                </div> 

                <x-modal name="modal_{{$produits->id}}" :show="$errors->isNotEmpty()" focusable>
                    @include('guest.modal.produit',['prod'=>$produit , 'id'=>$produits->id,'point'=>$point])
                </x-modal>
            @endforeach
            @endif
        </div>
    </div>
</div>
