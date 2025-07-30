<?php

use App\Livewire\Admin\Categorie;

new Categorie;
?>
<div>
<style>
        .dashboard-section {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            padding: 20px;
        }
        .dashboard-section h2 {
            color: #2c3e50;
            margin-top: 0;
            margin-bottom: 25px;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 10px;
        }

        /* Styles pour le formulaire */
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        .form-group input[type="text"],
        .form-group textarea {
            width: calc(100% - 22px); /* Ajuste pour le padding et la bordure */
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            box-sizing: border-box; /* Inclut padding et bordure dans la largeur */
        }
        .form-group textarea {
            resize: vertical; /* Permet le redimensionnement vertical */
            min-height: 80px;
        }
        .form-actions {
            margin-top: 20px;
            text-align: right;
        }
        .btn-submit {
            background-color: #28a745; /* Vert pour ajouter */
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1em;
            transition: background-color 0.2s ease-in-out;
        }
        .btn-submit:hover {
            background-color: #218838; /* Vert plus foncé au survol */
        }
        .dashboard-section {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            padding: 20px;
        }
        .dashboard-section h2 {
            color: #2c3e50;
            margin-top: 0;
            margin-bottom: 25px;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 10px;
        }

        /* Styles pour la grille de cartes */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); /* Responsive columns */
            gap: 20px; /* Espace entre les cartes */
        }

        /* Styles pour chaque carte */
        .card {
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease-in-out;
            display: flex; /* Pour que le contenu s'adapte bien */
            flex-direction: column;
            justify-content: space-between;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            color: #34495e;
            margin-top: 0;
            margin-bottom: 15px;
            font-size: 1.2em;
        }

        .card p {
            margin: 8px 0;
            line-height: 1.5;
            color: #555;
            font-size: 0.95em;
        }

        .card p strong {
            color: #333;
        }

        /* Styles spécifiques pour les actions dans les cartes (si vous voulez ajouter des boutons éditer/supprimer) */
        .card-actions {
            margin-top: 15px;
            text-align: right;
        }
        .card-actions button {
            background-color: #007bff;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9em;
            margin-left: 8px;
        }
        .card-actions button.delete {
            background-color: #dc3545;
        }
        .card-actions button:hover {
            opacity: 0.9;
        }

</style>
    <x-auth-session-status class="mb-4" :status="session('status')" />

<div class="dashboard-section">
        <h2>Ajouter une Nouvelle Catégorie</h2>
        <form  wire:submit="saveCategory">
            <div class="form-group">
                <label for="nomCategorie">Nom de la Catégorie :</label>
                <input type="text" wire:model="nom" id="nomCategorie" name="nomCategorie" required placeholder="Ex: Tisanes Relaxantes">
            </div>

            <div class="form-group">
                <label for="descriptionCategorie">Description de la Catégorie :</label>
                <textarea id="descriptionCategorie" wire:model="description" name="descriptionCategorie" rows="4" placeholder="Décrivez brièvement le type de produits que cette catégorie contiendra."></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">Ajouter la Catégorie</button>
            </div>
        </form>

    </div>

    <div class="dashboard-section">
        <h2>Gestion des Catégories</h2>
        @if($categorie->isEmpty())
            <p class="text-center">
                Il n'y a pas de categorie pour l'instant
            </p>
        @else
        <div class="card-grid">
        @foreach($categorie as $categories)
        
            <div class="card category-card">
                <h3>{{$categories->nom}}</h3>
                <p><strong>ID:</strong> {{$categories->id}}</p>
                <p><strong>Description:</strong> {!! $categories->description !!}</p>
                <div class="card-actions">
                    <button  x-data="" 
                        x-on:click.prevent="$dispatch('open-modal','modal_{{$categories->id}}')">Éditer</button>
                        <a href="{{route('delete.cat',['id'=>$categories->id])}}" onclick="if(confirm('Si vous allez supprimer cette catégorie, toutes les produits et commandes relier à cet catégorie seront aussi supprimés, action irreversible.')){}else return false"><button class="delete">Supprimer</button></a>
                </div>
            </div>
            <x-modal name="modal_{{$categories->id}}" :show="$errors->isNotEmpty()">
            <form  action="{{route('modif.categorie',['id'=>$categories->id])}}" method="post" enctype="form-data/multipart">
                @csrf 
                @method('put')
            <div class="form-group">
                <label for="nomCategorie">Nom de la Catégorie :</label>
                <input type="text" name="nom" id="nomCategorie" value="{{$categories->nom}}" required placeholder="Ex: Tisanes Relaxantes">
            </div>

            <div class="form-group">
                <label for="descriptionCategorie">Description de la Catégorie :</label>
                <textarea id="descriptionCategorie" name="description"  rows="4" placeholder="Décrivez brièvement le type de produits que cette catégorie contiendra.">{{str_replace('<br />','',$categories->nom)}}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">Modifier la Catégorie</button>
            </div>
        </form>
            </x-modal>
        @endforeach
        </div>
        @endif
    </div>
</div>
