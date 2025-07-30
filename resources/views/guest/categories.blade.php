<x-guest>
<x-slot name="header">
        <h2 class="font-semibold mt-4 top-2 text-xl text-gray-800 leading-tight">
            <br>
            <br>
            {{ __('Catégorie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @livewire('guest.categories',['id'=>$id])
                </div>
            </div>
        </div>
    </div>
</x-guest>