<?php

use App\Livewire\User\Dashboard;

new Dashboard;
?>
<div>
<div class="dashboard-overview">
    <h2>Statistiques Clés</h2>
    <div class="summary-card-grid">

        <div class="summary-card orders">
            <h3>Commandes</h3>
            <p class="count-number">{{$commandes}}</p>
            <p class="description">Commandes en attente</p>
        </div>

        <div class="summary-card users">
            <h3>Commandes</h3>
            <p class="count-number">
               {{$commande}}
            </p>
            <p class="description">Commandes efféctuer</p>
        </div>

        <div class="summary-card messages">
            <h3>Messages</h3>
            <p class="count-number">{{$coms}}</p>
            <p class="description">Commentaires efféctuer</p>
        </div>

    </div>
</div>
</div>
