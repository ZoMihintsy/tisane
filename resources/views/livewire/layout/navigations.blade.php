<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/login'); 
    }
}; ?>

<nav x-data="{ open: false, submenuOpen: false }" class="bg-gray-800 text-white shadow-md fixed w-full top-0 left-0 z-40">
    <!-- Primary Navigation Menu (Admin) -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center">
                <!-- Logo Admin -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" wire:navigate class="text-2xl rounded-full font-bold text-green-400 hover:text-green-300">
                       <x-application-logo class="block h-9 w-auto fill-current text-gray-200 rounded-full" /> 
                    </a>
                </div>

                <!-- Navigation Links (Desktop Admin) -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate class="text-gray-200 hover:text-green-300 font-medium">
                        {{ __('Tableau de Bord') }}
                    </x-nav-link>
                    
                    <div class="relative group" x-data="{ open: false }" @click.away="open = false">
                        <a @click="open = ! open" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-200 hover:text-green-300 hover:border-green-300 focus:outline-none focus:text-green-300 focus:border-green-300 transition duration-150 ease-in-out cursor-pointer">
                            Commandes
                            <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute z-50 mt-2 w-48 rounded-md shadow-lg origin-top-right right-0" style="display: none;">
                            <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
                                <a href="{{route('commande.all')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" wire:navigate>Toutes les commandes</a>
                                <a href="{{route('commande.wait')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" wire:navigate>Commandes en attente</a>
                                <a href="{{route('commande.ok')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" wire:navigate>Commandes expédiées</a>
                                <a href="/admin/orders/returns" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" wire:navigate>Retours / Remboursements</a>
                            </div>
                        </div>
                    </div>

                    <div class="relative group" x-data="{ open: false }" @click.away="open = false">
                        <a @click="open = ! open" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-200 hover:text-green-300 hover:border-green-300 focus:outline-none focus:text-green-300 focus:border-green-300 transition duration-150 ease-in-out cursor-pointer">
                            Produits
                            <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute z-50 mt-2 w-48 rounded-md shadow-lg origin-top-right right-0" style="display: none;">
                            <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
                                <a href="{{route('admin.produit')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" wire:navigate>Ajouter un produit</a>
                                <a href="{{route('admin.categorie')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" wire:navigate>Catégories</a>
                                <a href="{{route('admin.gstock')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" wire:navigate>Gestion du stock</a>
                            </div>
                        </div>
                    </div>

                    <x-nav-link href="{{route('client')}}" wire:navigate class="text-gray-200 hover:text-green-300 font-medium">Clients</x-nav-link>
                    <x-nav-link href="{{route('marketing')}}" wire:navigate class="text-gray-200 hover:text-green-300 font-medium">Marketing</x-nav-link>
                    <x-nav-link href="{{route('report')}}" wire:navigate class="text-gray-200 hover:text-green-300 font-medium">Rapports</x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown (Admin Profile) -->
            <div class="flex items-center space-x-4">
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-200 bg-gray-700 hover:text-green-300 hover:bg-gray-600 focus:outline-none transition ease-in-out duration-150">
                                <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile')" wire:navigate>
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <button wire:click="logout" class="w-full text-start">
                                <x-dropdown-link>
                                    {{ __('Déconnexion') }}
                                </x-dropdown-link>
                            </button>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger (Admin) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Admin) -->
    <div :class="{'block': open, 'hidden': ! open}"  style="overflow-y: scroll" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                {{ __('Tableau de Bord') }}
            </x-responsive-nav-link>
            
            <div x-data="{ open: false }" class="relative">
                <x-responsive-nav-link @click="open = ! open" class="flex justify-between items-center">
                    Commandes
                    <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </x-responsive-nav-link>
                <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="pl-4 mt-2 space-y-2" style="display: none;">
                <x-responsive-nav-link href="{{route('commande.all')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" wire:navigate>Toutes les commandes</x-responsive-nav-link>
                <x-responsive-nav-link href="{{route('commande.wait')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" wire:navigate>Commandes en attente</x-responsive-nav-link>
                    <x-responsive-nav-link href="{{route('commande.ok')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" wire:navigate>Commandes expédiées</x-responsive-nav-link>
                            </div>
            </div>

            <div x-data="{ open: false }" class="relative">
                <x-responsive-nav-link @click="open = ! open" class="flex justify-between items-center">
                    Produits
                    <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </x-responsive-nav-link>
                <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="pl-4 mt-2 space-y-2" style="display: none;">
                <x-responsive-nav-link href="{{route('admin.produit')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" wire:navigate>Ajouter un produit</x-responsive-nav-link>
                                <x-responsive-nav-link href="{{route('admin.categorie')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" wire:navigate>Catégories</x-responsive-nav-link>
                                <x-responsive-nav-link href="{{route('admin.gstock')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" wire:navigate>Gestion du stock</x-responsive-nav-link>
                </div>
            </div>

            <x-responsive-nav-link href="{{route('client')}}" wire:navigate>Clients</x-responsive-nav-link>
            <x-responsive-nav-link href="{{route('marketing')}}" wire:navigate>Marketing</x-responsive-nav-link>
            <x-responsive-nav-link href="{{route('report')}}" wire:navigate>Rapports</x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options (Admin Profile) -->
        <div class="pt-4 pb-1 border-t border-gray-700">
            <div class="px-4">
                <div class="font-medium text-base text-gray-200" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="font-medium text-sm text-gray-400">{{ auth()->user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" wire:navigate>
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link>
                        {{ __('Déconnexion') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>
