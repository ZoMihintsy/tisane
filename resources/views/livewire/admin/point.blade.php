<?php

use App\Livewire\Admin\Point;

new Point
?>
<div>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f7f6;
            color: #333;
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
        .form-group input[type="number"],
        .form-group select,
        .form-group textarea {
            width: calc(100% - 22px); /* Ajuste pour le padding et la bordure */
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            box-sizing: border-box; /* Inclut padding et bordure dans la largeur */
        }
         /* Style spécifique pour le champ de type fichier pour qu'il s'aligne mieux */
        .form-group input[type="file"] {
            padding: 8px 0; /* Moins de padding que les autres inputs */
            border: none;
            background-color: transparent;
            width: auto; /* Permet au navigateur de gérer la largeur par défaut */
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
        .card .product-image {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        /* Styles spécifiques pour les actions dans les cartes */
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
        <h2>Ajouter un nouveau point de vente</h2>
        <form  wire:submit="savePoint">
            <div class="form-group">
                <label for="nomCategorie">Nom du point de vente :</label>
                <input type="text" wire:model="nom" id="nomCategorie" name="nomCategorie" required placeholder="Ex: La boire">
            </div>

            <div class="form-group">
                <label for="descriptionCategorie1">Ville :</label>
                <input type="text" wire:model="ville" id="descriptionCategorie1" name="nomCategorie" required placeholder="Ex: La Reunion">
            </div>
            <div class="form-group">
                <label for="descriptionCategorie2">Code postale :</label>
                <input type="text" wire:model="code_postale" id="descriptionCategorie2" name="nomCategorie" required placeholder="Ex: St Denis xxxx">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">Ajouter le point de vente</button>
            </div>
        </form>

    </div>
    <div class="dashboard-section">
        <h2>Gestion des points de vente</h2>
        @if($point->isEmpty())
            <p class="text-center">
                Il n'y a pas de point de vente pour l'instant
            </p>
        @else
        @foreach($point as $points)
        <div class="card-grid">
            <div class="card category-card">
                <h3>{{$points->nom}}</h3>
                <p><strong>Ville:</strong> {{$points->ville}}</p>
                <p><strong>Code postale:</strong> {!! $points->code_postale !!}</p>
                <div class="card-actions">
                    <button x-data="" 
                    x-on:click.prevent="$dispatch('open-modal','modal_{{$points->id}}')">Éditer</button>
                    <a href="{{route('delete.point',['id'=>$points->id])}}"><button class="delete">Supprimer</button></a>
                </div> 
        
            </div>
            <x-modal name="modal_{{$points->id}}" :show="$errors->isNotEmpty()">
                <br>
            <h2 class="text-center text-3xl">Modifier le point de vente</h2>
            <form  action="{{route('modif.point',['id'=>$points->id])}}" method="post">
                @csrf 
                @method('put')
                <div class="form-group">
                    <label for="nomCategorie">Nom du point de vente :</label>
                    <input type="text"  id="nomCategorie" name="nom" value="{{$points->nom}}" required placeholder="Ex: La boire">
                </div>

                <div class="form-group">
                    <label for="descriptionCategorie1">Ville :</label>
                    <input type="text"  id="descriptionCategorie1" name="ville" value="{{$points->ville}}"  required placeholder="Ex: La Reunion">
                </div>
                <div class="form-group">
                    <label for="descriptionCategorie2">Code postale :</label>
                    <input type="text"  id="descriptionCategorie2" name="code_postale" value="{{$points->code_postale}}"  required placeholder="Ex: St Denis xxxx">
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-submit">Modifier le point de vente</button>
                </div>
                <br>
                <br>
            </form>
            </x-modal>
        @endforeach
        @endif
    </div>
</div>
