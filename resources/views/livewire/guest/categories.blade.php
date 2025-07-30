<?php

use App\Livewire\Guest\Categories;

new Categories;
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
     <div class="card-grid">
     
            <div class="card category-card">
                <h3>{{$categorie->nom}}</h3>
                <p><strong>ID:</strong> {{$categorie->id}}</p>
                <p><strong>Description:</strong> {!! $categorie->description !!}</p>
                <p>
                    <strong>Produits actif :</strong> {{$produit}}
                </p>
            </div>
        
     
    </div>

</div>
