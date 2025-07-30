<?php

use App\Livewire\Admin\Produit;

new Produit;
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
        <h2>Ajouter un Nouveau Produit</h2>
        <form wire:submit="saveProduct">
            <div class="form-group">
                <label for="nomProduit">Nom du Produit :</label>
                <input type="text" id="nomProduit" wire:model="nom" name="nomProduit" required placeholder="Ex: Tisane Bonne Nuit">
                <x-input-error :messages="$errors->get('nom')" />
            
            </div>

            <div class="form-group">
                <label for="categorieProduit">Catégorie :</label>
                <select id="categorieProduit" wire:model="categorie_id" name="categorieProduit" required>
                    <option value="">Sélectionnez une catégorie</option>
                    @if($categorie->isEmpty())
                        <option value="">Il n'y a pas de catégorie</option>
                    @else
                    @foreach($categorie as $category)
                        <option value="{{$category->id}}">{{$category->nom}}</option>
                    @endforeach
                    @endif
                    </select>
                    <x-input-error :messages="$errors->get('categorie_id')" />
            </div>

            <div class="form-group">
                <label for="prixProduit">Prix (€) :</label>
                <input type="number" id="prixProduit" wire:model="prix" name="prixProduit" step="0.01" min="0" required placeholder="Ex: 9.99">
                <x-input-error :messages="$errors->get('prix')" />
            
            </div>

            <div class="form-group">
                <label for="stockProduit">Stock :</label>
                <input type="number" id="stockProduit" wire:model="stock" name="stockProduit" min="0" required placeholder="Ex: 100">
                <x-input-error :messages="$errors->get('stock')" />
           
            </div>

            <div class="form-group">
                <label for="descriptionCourte">Description Courte :</label>
                <textarea id="descriptionCourte" name="descriptionCourte" wire:model="description1" rows="3" placeholder="Une brève description du produit (ex: mélange de plantes bio pour la détente)."></textarea>
                <x-input-error :messages="$errors->get('description1')" />
            
            </div>

            <div class="form-group">
                <label for="descriptionLongue">Description Détaillée (optionnel) :</label>
                <textarea id="descriptionLongue" name="descriptionLongue" wire:model="description2" rows="6" placeholder="Description complète avec les ingrédients, bienfaits détaillés, conseils d'utilisation..."></textarea>
                <x-input-error :messages="$errors->get('description2')" />
            
            </div>

            <div class="form-group">
                <label for="imageProduit">Image du Produit :</label>
                <input type="file" id="imageProduit" wire:model="photo" name="imageProduit" accept="image/*">
                <x-input-error :messages="$errors->get('photo')" />
            
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">Ajouter le Produit</button>
            </div>
        </form>
    </div>
    <div class="dashboard-section">
        <h2>Gestion des Produits</h2>
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
                        <button x-data="" 
                        x-on:click.prevent="$dispatch('open-modal','modal_{{$produits->id}}')">Éditer</button>
                        <a href="{{route('delete.prod',['id'=>$produits->id])}}" onclick="if(confirm('Si vous allez supprimer cette produit, toutes les commandes relier à cet produit sera aussi supprimé, action irreversible')){}else return false"><button class="delete">Supprimer</button></a>
                    </div>
                </div> 
                <x-modal name="modal_{{$produits->id}}" :show="$errors->isNotEmpty()">
                    <br>
                <h2 class="text-center text-3xl">Modifier le produit</h2>
        <form action="{{route('modif.produit',['id'=>$produits->id])}}" method="post" enctype="multipart/form-data">
            @csrf 
            @method("put")
            <div class="form-group">
                <label for="nomProduit">Nom du Produit :</label>
                <input type="text" id="nomProduit" name="nom" value="{{$produits->nom}}" name="nomProduit" required placeholder="Ex: Tisane Bonne Nuit">
                <x-input-error :messages="$errors->get('nom')" />
            
            </div>

            <div class="form-group">
                <label for="categorieProduit">Catégorie :</label>
                <select id="categorieProduit" name="categorie_id"  required>
                    <option value="">Sélectionnez une catégorie</option>
                    @if($categorie->isEmpty())
                        <option value="">Il n'y a pas de catégorie</option>
                    @else
                    @foreach($categorie as $category)
                        <option value="{{$category->id}}">{{$category->nom}}</option>
                    @endforeach
                    @endif
                    </select>
                    <x-input-error :messages="$errors->get('categorie_id')" />
            </div>

            <div class="form-group">
                <label for="prixProduit">Prix (€) :</label>
                <input type="number" id="prixProduit" value="{{$produits->prix}}" name="prix"  step="0.01" min="0" required placeholder="Ex: 9.99">
                <x-input-error :messages="$errors->get('prix')" />
            
            </div>

            <div class="form-group">
                <label for="stockProduit">Stock :</label>
                <input type="number" value="{{$produits->stock}}" id="stockProduit" name="stock" min="0" required placeholder="Ex: 100">
                <x-input-error :messages="$errors->get('stock')" />
           
            </div>

            <div class="form-group">
                <label for="descriptionCourte">Description Courte :</label>
                <textarea id="descriptionCourte" name="description1" rows="3" placeholder="Une brève description du produit (ex: mélange de plantes bio pour la détente).">{{str_replace('<br />' , '' , $produits->description1)}}</textarea>
                <x-input-error :messages="$errors->get('description1')" />
            
            </div>

            <div class="form-group">
                <label for="descriptionLongue">Description Détaillée (optionnel) :</label>
                <textarea id="descriptionLongue"  name="description2" rows="6" placeholder="Description complète avec les ingrédients, bienfaits détaillés, conseils d'utilisation...">{{str_replace('<br />' , '' , $produits->description2)}}</textarea>
                <x-input-error :messages="$errors->get('description2')" />
            
            </div>

            <div class="form-group">
                <label for="imageProduit">Image du Produit :</label>
                <input type="file" id="imageProduit" name="photo" accept="image/*">
                <x-input-error :messages="$errors->get('photo')" />
            
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">Modifier le produit</button>
            </div>
            <br>
            <br>
        </form>
                </x-modal>
            @endforeach
            @endif
        </div>
    </div>
</div>
