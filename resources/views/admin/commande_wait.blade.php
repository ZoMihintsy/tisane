<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold mt-4 top-2 text-xl text-gray-800 leading-tight">
            <br>
            <br>
            {{ __('Les commandes en attente ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:admin.commande-wait />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>