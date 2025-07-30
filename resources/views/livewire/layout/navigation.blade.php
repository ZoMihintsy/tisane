<?php

use App\Livewire\Actions\Logout;
use App\Livewire\Layout\Navigation;
use Illuminate\Support\Facades\Session;
use Livewire\Volt\Component;
new Navigation;
?>

<nav x-data="{ open: false, submenuOpen: false }" class="bg-white border-b border-gray-100 shadow-md fixed w-full top-0 left-0 z-30">
    @php
        $cart = Session::get('panier', []);
        $totalItemsInCart = 0;
        foreach ($cart as $item) {
            $totalItemsInCart++;
        }
    @endphp
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/dashboard" wire:navigate class="text-2xl font-bold text-green-700 hover:text-green-800">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" /> 
                    </a>
                </div>

                <!-- Navigation Links (Desktop) -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate class="text-gray-700 hover:text-green-600 font-medium">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    @if(Auth::user()->type == "client")
                    <a href="{{route('produit.user')}}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-700 hover:text-green-600 hover:border-green-300 focus:outline-none focus:text-green-600 focus:border-green-300 transition duration-150 ease-in-out">Produit</a>
                    
                    <div class="relative group" x-data="{ open: false }" @click.away="open = false">
                        <b href="/nos-tisanes" @click="open = ! open" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-700 hover:text-green-600 hover:border-green-300 focus:outline-none focus:text-green-600 focus:border-green-300 transition duration-150 ease-in-out cursor-pointer">
                            Catégories
                            <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </b>
                        <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute z-50 mt-2 w-48 rounded-md shadow-lg origin-top-right right-0" style="display: none;">
                            <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
                            @foreach($categorie as $categories)
                                <a href="{{route('categorie.auths',['id'=>$categories->id])}}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100" wire:navigate>{{$categories->nom}}</a>
                            @endforeach
                            </div>
                        </div>
                    </div>
                    <a wire:navigate href="{{route('blog')}}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-700 hover:text-green-600 hover:border-green-300 focus:outline-none focus:text-green-600 focus:border-green-300 transition duration-150 ease-in-out">Blog</a>
                    <a wire:navigate href="{{route('promotion.auth')}}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-700 hover:text-green-600 hover:border-green-300 focus:outline-none focus:text-green-600 focus:border-green-300 transition duration-150 ease-in-out">Promotions</a>
                </div>
            </div>

            
            <div class="flex items-center space-x-4">
                

             
                <a wire:navigate href="{{route('paniers')}}" class="relative text-gray-700 hover:text-green-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.182 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    <span class="absolute -top-2 -right-2 bg-green-500 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">{{$totalItemsInCart}}</span>
                </a>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
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
                            <a href="{{route('commande')}}" class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" wire:navigate>
                                Mes Commandes
                            </a>

                        @endif    <!-- Authentication -->
                            <button wire:click="logout" class="w-full text-start">
                                <x-dropdown-link>
                                    {{ __(' Déconnexion ') }}
                                </x-dropdown-link>
                            </button>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
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

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            @if(Auth::user()->type == "client")
            <x-responsive-nav-link href="{{route('produit.user')}}" wire:navigate>Produits</x-responsive-nav-link>
            
            <div x-data="{ open: false }" class="relative">
                <x-responsive-nav-link @click="open = ! open" class="flex justify-between items-center">
                    Catégories
                    <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </x-responsive-nav-link>
                <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="pl-4 mt-2 space-y-2" style="display: none;">
                @foreach($categorie as $categories)
                                <x-responsive-nav-link href="{{route('categorie.auths',['id'=>$categories->id])}}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100" wire:navigate>{{$categories->nom}}</x-responsive-nav-link>
                            @endforeach
                </div>
            </div>
            <x-responsive-nav-link wire:navigate href="{{route('blog')}}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-700 hover:text-green-600 hover:border-green-300 focus:outline-none focus:text-green-600 focus:border-green-300 transition duration-150 ease-in-out">Blog</x-responsive-nav-link>
                    <x-responsive-nav-link wire:navigate href="{{route('promotion.auth')}}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-700 hover:text-green-600 hover:border-green-300 focus:outline-none focus:text-green-600 focus:border-green-300 transition duration-150 ease-in-out">Promotions</x-responsive-nav-link>
            
           
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" wire:navigate>
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{route('commande')}}" wire:navigate>
                    Mes Commandes
                </x-responsive-nav-link>
            @endif
                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link>
                        {{ __(' Déconnexion ') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>
