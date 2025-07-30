<div>
    <center>
        <h2>
            {{$produits->nom}}
        </h2>
    </center>
    <strong>
        Description du produit :
    </strong>
    <br>
    <h6>
        {!! $produits->description1 !!}
        <br>
        {!! $produits->description2 !!}
    </h6>
    <big>
        <strong>
            Prix : 
        </strong>
        {{$produits->prix}} &euro;
        <br>
        <strong>
            Stock :
        </strong>
        {{$produits->stock}}
    </big>
    <form action="{{route('auth.panier',['id'=>$produits->id])}}" method="post">
        @csrf
        @method('put')
        <select name="retrait" class="w-full rounded" id="">
            <option value="">--{{ __('renseignement.point_commande') }}--</option>
            @if($point->isEmpty())
                <option value="">---il n'y a pas de point de vente disponible ---</option>
            @else
                @foreach($point as $points)
                    <option value="{{$points->id}}">{{$points->nom}} : {{$points->code_postale}}</option>
                @endforeach
            @endif
        </select>
        <x-input-error :messages="$errors->get('retrait')" />

        <br>
        <br>
        <x-text-input type="number" class="w-full" name="stock" placeholder="Nombre a prendre" />
        <x-input-error :messages="$errors->get('stock')" />
        
        <br>
        <br>
        <strong>Date et heure du retrait</strong>
        <input type="datetime-local" name="date" id="">
        <x-input-error :messages="$errors->get('date')" />

        <x-primary-button class="right-0">
        {{ __(' Ajouter au panier ') }}
        </x-primary-button>
        <br>
        <br>

    </form>
</div>
