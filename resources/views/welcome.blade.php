<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tisane</title>

       
        <!-- Scripts -->
        <link rel="stylesheet" href="{{asset('style/assets/app-Ca8PHox1.css')}}">
        <script src="{{asset('style/assets/app-DNxiirP_.js')}}"></script>

    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif
            @include('guest.welcome') 
        </div>
            @include('guest.footer')
    </body>
    
<script>
    const sliderTrack = document.getElementById('slider-track');
    const images = sliderTrack.querySelectorAll('.slider-image-container');
    let currentIndex = 0;
    const imagesCount = images.length;

    function showImage(index) {

        currentIndex = (index + imagesCount) % imagesCount; 
        sliderTrack.style.transform = `translateX(-${currentIndex * 100}%)`;
    }

    document.getElementById('next-btn').addEventListener('click', () => showImage(currentIndex + 1));
    document.getElementById('prev-btn').addEventListener('click', () => showImage(currentIndex - 1));
    var img = setInterval(()=>{
        showImage(currentIndex +1);
    },5000);
    showImage(0);
</script>
</html>
