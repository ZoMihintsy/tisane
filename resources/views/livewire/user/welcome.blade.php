
<main class="flex-grow pt-20 bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-4xl font-bold text-center text-green-800 my-8">Bienvenue dans notre univers de Tisanes !</h1>
        <p class="text-center text-gray-700 mb-12 max-w-2xl mx-auto">
            Découvrez notre sélection de tisanes bio, sélectionnées avec soin pour votre bien-être.
        </p>
        <br>
        <div class="h-96 bg-green-500 text-white flex items-center justify-center text-2xl mb-8 rounded">
        <section class="py-12">
            <div class="slider-wrapper">
                <div id="slider-track" class="slider-track h-96">
                    <div class="slider-image-container"><img src="{{asset('img/img1.png')}}" alt="image1"></div>
                    <div class="slider-image-container"><img src="{{asset('img/img2.png')}}" alt="image2"></div>
                    <div class="slider-image-container"><img src="{{asset('img/img3.png')}}" alt="image3"></div>
                    <div class="slider-image-container"><img src="{{asset('img/img4.png')}}" alt="image4"></div>
                    <div class="slider-image-container"><img src="{{asset('img/img5.png')}}" alt="image5"></div>
                    <div class="slider-image-container"><img src="{{asset('img/img6.png')}}" alt="image6"></div>
                    <div class="slider-image-container"><img src="{{asset('img/img7.png')}}" alt="image7"></div>
                    <div class="slider-image-container"><img src="{{asset('img/img8.png')}}" alt="image8"></div>
                </div>
                <button id="prev-btn" class="slider-nav-button prev-btn">&#10094;</button>
                <button id="next-btn" class="slider-nav-button next-btn">&#10095;</button>
            </div>
        </section>
        </div>
        <div class="h-96 bg-green-600 text-white flex items-center justify-center text-2xl mb-8 rounded">
        <div class="container mx-auto px-4 border-b text-center">
                    <h2 class="text-3xl font-bold mb-8">
                        {{ __('accueil.engagements_title')}}
                    </h2>
                    <div class="grid md:grid-cols-3 gap-8">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold mt-2 mb-2">
                                {{ __('accueil.engagements_text_1')}}
                            </h3>
                            <p>
                            {{ __('accueil.engagements_text_2')}}
                            </p>
                        </div>
                    </div>
                </div>
        </div>
        <div class="h-96 bg-green-700 text-white flex items-center justify-center text-2xl rounded">
        <div class="container mx-auto px-4 border-b ">
                <h2 class="text-3xl font-bold text-green-800 mb-4 text-center">
                    {{ __('accueil.decouvert_saveur_title') }}
                </h2>
                <br>
                <p class="mb-8 text-lg">
                    {{ __('accueil.decouvert_saveur_text') }}
                </p>
        </div>
        </div>
        </div>
</main>
