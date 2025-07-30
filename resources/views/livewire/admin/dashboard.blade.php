<?php

use App\Livewire\Admin\Dashboard;

new Dashboard;
?>
<div>
<div class="dashboard-overview">
    <h2>Statistiques Clés</h2>
    <div class="summary-card-grid">

        <div class="summary-card products">
            <h3>Produits</h3>
            <p class="count-number">{{$produit}}</p>
            <p class="description">Total produits actifs</p>
        </div>

        <div class="summary-card categories">
            <h3>Catégories</h3>
            <p class="count-number">{{$categorie}}</p>
            <p class="description">Catégories de tisanes</p>
        </div>

        <div class="summary-card orders">
            <h3>Commandes</h3>
            <p class="count-number">{{$cmd}}</p>
            <p class="description">Commandes en cours</p>
        </div>

        <div class="summary-card users">
            <h3>Utilisateurs</h3>
            <p class="count-number">
               {{$user}}
            </p>
            <p class="description">Utilisateurs enregistrés</p>
        </div>

        <div class="summary-card messages">
            <h3>Messages</h3>
            <p class="count-number">{{$coms}}</p>
            <p class="description">Nouveaux messages clients</p>
        </div>

    </div>
</div>
</div>
