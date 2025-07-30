<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold mt-4 top-2 text-xl text-gray-800 leading-tight">
            <br>
            <br>
            {{ __('Catégories : '.$id->nom)  }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="dashboard-section">
        <h2>Gestion des produits</h2>
        <div class="card-grid">
            @if($produit->isEmpty())
                <p>
                    Il n'y a pas de produit pour le moment
                </p>
            @else
            @foreach($produit as $produits)
                <div class="card product-card">
                    <h3>{{$produits->nom}}</h3>
                    <p><strong>ID:</strong> {{$produits->id}}</p>
                    <p><strong>Catégorie:</strong> @foreach($categorie as $category) @if($category->id == $produits->categorie_id) {{$category->nom}} @endif @endforeach</p>
                    <p><strong>Prix:</strong> {{$produits->prix}} €</p>
                    <p><strong>Stock:</strong> {{$produits->stock}}</p>
                    <p><strong>Description:</strong> {!! $produits->description1 !!} {!! $produits->description2 !!}</p>
                    <p><strong>Image:</strong> <img src="{{asset('storage/'.$produits->photo)}}" style="width:5cm;height:5cm" alt="" srcset=""></p>
                    <div class="card-actions">
                        <button x-data="" 
                        x-on:click.prevent="$dispatch('open-modal','modal_{{$produits->id}}')">Éditer</button>
                        <a href="{{route('delete.prod',['id'=>$produits->id])}}" onclick="if(confirm('Si vous allez supprimer cette produit, toutes les commandes relier à cet produit sera aussi supprimé, action irreversible')){}else return false"><button class="delete">Supprimer</button></a>
                    </div>
                </div> 
                <x-modal name="modal_{{$produits->id}}" :show="$errors->isNotEmpty()">
                    <br>
                <h2 class="text-center text-3xl">Modifier le produit</h2>
        <form action="{{route('modif.produit',['id'=>$produits->id])}}" method="post" enctype="multipart/form-data">
            @csrf 
            @method("put")
            <div class="form-group">
                <label for="nomProduit">Nom du Produit :</label>
                <input type="text" id="nomProduit" name="nom" value="{{$produits->nom}}" name="nomProduit" required placeholder="Ex: Tisane Bonne Nuit">
                <x-input-error :messages="$errors->get('nom')" />
            
            </div>

            <div class="form-group">
                <label for="categorieProduit">Catégorie :</label>
                <select id="categorieProduit" name="categorie_id"  required>
                    <option value="">Sélectionnez une catégorie</option>
                    @if($categorie->isEmpty())
                        <option value="">Il n'y a pas de catégorie</option>
                    @else
                    @foreach($categorie as $category)
                        <option value="{{$category->id}}">{{$category->nom}}</option>
                    @endforeach
                    @endif
                    </select>
                    <x-input-error :messages="$errors->get('categorie_id')" />
            </div>

            <div class="form-group">
                <label for="prixProduit">Prix (€) :</label>
                <input type="number" id="prixProduit" value="{{$produits->prix}}" name="prix"  step="0.01" min="0" required placeholder="Ex: 9.99">
                <x-input-error :messages="$errors->get('prix')" />
            
            </div>

            <div class="form-group">
                <label for="stockProduit">Stock :</label>
                <input type="number" value="{{$produits->stock}}" id="stockProduit" name="stock" min="0" required placeholder="Ex: 100">
                <x-input-error :messages="$errors->get('stock')" />
           
            </div>

            <div class="form-group">
                <label for="descriptionCourte">Description Courte :</label>
                <textarea id="descriptionCourte" name="description1" rows="3" placeholder="Une brève description du produit (ex: mélange de plantes bio pour la détente).">{{str_replace('<br />' , '' , $produits->description1)}}</textarea>
                <x-input-error :messages="$errors->get('description1')" />
            
            </div>

            <div class="form-group">
                <label for="descriptionLongue">Description Détaillée (optionnel) :</label>
                <textarea id="descriptionLongue"  name="description2" rows="6" placeholder="Description complète avec les ingrédients, bienfaits détaillés, conseils d'utilisation...">{{str_replace('<br />' , '' , $produits->description2)}}</textarea>
                <x-input-error :messages="$errors->get('description2')" />
            
            </div>

            <div class="form-group">
                <label for="imageProduit">Image du Produit :</label>
                <input type="file" id="imageProduit" name="photo" accept="image/*">
                <x-input-error :messages="$errors->get('photo')" />
            
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">Modifier le produit</button>
            </div>
            <br>
            <br>
        </form>
                </x-modal>
            @endforeach
            @endif
        </div>   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>