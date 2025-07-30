<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold mt-4 top-2 text-xl text-gray-800 leading-tight">
            <br>
            <br>
            {{ __('Gestion du stock') }}
        </h2>
    </x-slot>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f7f6;
            color: #333;
        }
        .dashboard-overview {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            padding: 20px;
        }
        .dashboard-overview h2 {
            color: #2c3e50;
            margin-top: 0;
            margin-bottom: 25px;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 10px;
        }

        /* Conteneur pour les cartes récapitulatives */
        .summary-card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); /* Responsive, min 220px par carte */
            gap: 25px; /* Espace entre les cartes */
        }

        /* Style de chaque carte récapitulative */
        .summary-card {
            background-color: #5cb85c; /* Couleur verte par défaut */
            color: white;
            padding: 25px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            cursor: pointer; /* Indique que la carte pourrait être cliquable */
        }

        .summary-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .summary-card h3 {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 1.3em;
            font-weight: normal;
            color: rgba(255, 255, 255, 0.85);
        }

        .summary-card .count-number {
            font-size: 3.5em; /* Grande taille pour le nombre */
            font-weight: bold;
            line-height: 1;
            margin-bottom: 10px;
        }

        .summary-card .description {
            font-size: 0.9em;
            opacity: 0.9;
        }

        /* Couleurs spécifiques pour chaque type de carte (optionnel) */
        .summary-card.products { background-color: #007bff; /* Bleu */ }
        .summary-card.categories { background-color: #ffc107; /* Jaune/Orange */ }
        .summary-card.orders { background-color: #28a745; /* Vert */ }
        .summary-card.users { background-color: #6c757d; /* Gris */ }
        .summary-card.messages { background-color: #dc3545; /* Rouge */ }


</style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:admin.gstock />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>