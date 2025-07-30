

<div>
    <div class="summary-card-grid">
        @foreach($categorie as $category)
                @php 
                    $i = 0;
                @endphp
            @foreach($produit as $produits)
                
                @if($produits->categorie_id == $category->id)
                @php 
                    $i++;
                @endphp
                @else

                @endif
             @endforeach
             <a href="{{route('prod',['id'=>$category->id])}}">
                <div class="summary-card products">
                    <h3>Catégorie</h3>
                    <p class="count-number">{{$category->nom}}</p>
                    <p class="count-number">{{$i}}</p>
                    <p class="description">Total produits actifs</p>
                </div>
            </a>
           
        @endforeach
    </div>
</div>
