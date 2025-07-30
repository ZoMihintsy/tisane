<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <link rel="stylesheet" href="{{asset('style/assets/app-Ca8PHox1.css')}}">
        <script src="{{asset('style/assets/app-DNxiirP_.js')}}"></script>
    </head>
    <body class="font-sans text-gray-900 antialiased">
            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif
            <br>
            <br>
        <div class="min-h-screen mt-4 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="w-full mt-4 sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
        @include('guest.footer')
    </body>
</html>
