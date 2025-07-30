<?php

use App\Livewire\Welcome\Navigation;

new Navigation;
?>
<div>
    @php
        $cart = Session::get('panier', []);
        $totalItemsInCart = 0;
        foreach ($cart as $item) {
            $totalItemsInCart++;
        }
    @endphp
    <header class="bg-white shadow-md py-4 fixed w-full top-0 left-0 z-30">
        <nav class="container mx-auto flex items-center justify-between px-4">
            <div class="flex-shrink-0">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <ul id="main-nav-links" class="hidden md:flex space-x-6 lg:space-x-8 text-lg">
                <li>
                    <a href="{{route('produit')}}" class="text-gray-700 hover:text-green-600 font-medium">Produits</a>
                </li>
                <li class="relative group">
                    <a href="{{route('categorie.guest')}}" class="text-gray-700 hover:text-green-600 font-medium flex items-center">
                        Catégories
                        <svg class="ml-1 w-4 h-4 submenu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </a>
                    <ul class="absolute hidden group-hover:block bg-white shadow-lg rounded-md mt-0 w-48 py-2 z-20">
                        @foreach($categorie as $categories)
                        <li><a href="{{route('categorie.guests',['id'=>$categories->id])}}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">{{$categories->nom}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{route('point.guest')}}" class="text-gray-700 hover:text-green-600 font-medium">Point de vente</a></li>
                <li><a href="{{route('promotion.guest')}}" class="text-gray-700 hover:text-green-600 font-medium">Promotions</a></li>
                <li><a href="/blog" class="text-gray-700 hover:text-green-600 font-medium">Blog</a></li>
                <li><a href="/notre-histoire" class="text-gray-700 hover:text-green-600 font-medium">Notre Histoire</a></li>
            </ul>

            <div class="flex items-center space-x-4">
               

                <a href="{{route('panier.guest')}}" class="relative text-gray-700 hover:text-green-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.182 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    <span class="absolute -top-2 -right-2 bg-green-500 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">{{$totalItemsInCart}}</span>
                </a>

                <button id="mobile-menu-button" class="md:hidden text-gray-700 hover:text-green-600 focus:outline-none">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>

                <div class="hidden md:flex text-end space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" >Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" >Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" >Register</a>
                        @endif
                    @endauth
                </div>
            </div>
        </nav>

        <div  id="mobile-menu-overlay"   class="fixed inset-0 bg-black bg-opacity-70 hidden"></div>
        <div  id="mobile-menu" style="overflow-y: scroll" class="fixed top-0 right-0 h-full w-64 bg-white shadow-lg transform translate-x-full overflow transition-transform duration-300 ease-in-out p-6 md:hidden">
            <div class="flex justify-end mb-6">
                <button id="close-mobile-menu-button" class="text-gray-700 hover:text-green-600 focus:outline-none">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <ul class="flex flex-col space-y-4 text-lg"  name="menu">
                <li><a href="{{route('produit')}}" class="text-gray-700 hover:text-green-600 font-medium py-2 block">Produits</a></li>
                <li>
                    <details class="group">
                        <summary class="flex items-center justify-between text-gray-700 hover:text-green-600 font-medium py-2 cursor-pointer">
                        Catégories
                            <svg class="ml-1 w-4 h-4 submenu-icon transform group-open:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <ul class="pl-4 mt-2 space-y-2">
                            <li><a href="{{route('categorie.guest')}}">Les catégories</a></li>
                        @foreach($categorie as $categories)
                        <li><a href="{{route('categorie.guests',['id'=>$categories->id])}}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">{{$categories->nom}}</a></li>
                        @endforeach
                        </ul>
                    </details>
                </li>
                <li><a href="{{route('point.guest')}}" class="text-gray-700 hover:text-green-600 font-medium py-2 block">point de vente</a></li>
                <li><a href="{{route('promotion.guest')}}" class="text-gray-700 hover:text-green-600 font-medium py-2 block">Promotions</a></li>
                <li><a href="/blog" class="text-gray-700 hover:text-green-600 font-medium py-2 block">Blog & Conseils</a></li>
                <li><a href="/notre-histoire" class="text-gray-700 hover:text-green-600 font-medium py-2 block">Notre Histoire</a></li>
                <li class="pt-4 border-t border-gray-200">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 py-2 block">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 py-2 block" >Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 py-2 block" >Register</a>
                        @endif
                    @endauth
                </li>
            </ul>
        </div>
    </header>
<script>
    const mobileMenuButton = document.getElementById('mobile-menu-button');
const mobileMenu = document.getElementById('mobile-menu');
const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
const closeMobileMenuButton = document.getElementById('close-mobile-menu-button');

function toggleMobileMenu() {
    mobileMenu.classList.toggle('translate-x-full'); 
    mobileMenuOverlay.classList.toggle('hidden');     
    document.body.classList.toggle('overflow-hidden'); 
}

mobileMenuButton.addEventListener('click', toggleMobileMenu);
closeMobileMenuButton.addEventListener('click', toggleMobileMenu);
mobileMenuOverlay.addEventListener('click', toggleMobileMenu);
</script>
</div>
