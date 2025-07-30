<?php

use App\Http\Controllers\TisaneController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('admin/catégories', 'admin.categorie')
    ->middleware(['auth'])
    ->name('admin.categorie');

Route::view('admin/produits', 'admin.produit')
    ->middleware(['auth'])
    ->name('admin.produit');

Route::view('admin/Gestion+du+stock', 'admin.gstock')
    ->middleware(['auth'])
    ->name('admin.gstock');

Route::get('produit/{id?}',[TisaneController::class, 'gstock'])
    ->middleware(['auth'])
    ->name('prod');

Route::view('admin/client','admin.client')
    ->middleware(['auth'])
    ->name('client');

Route::view('admin/marketing+emplacement','admin.point')
    ->middleware(['auth'])
    ->name('marketing');

Route::view('admin/report','admin.report')
    ->middleware(['auth'])
    ->name('report');

Route::view('admin/commande','admin.commande_all')
    ->middleware(['auth'])
    ->name('commande.all');

Route::view('admin/commande+en+attente','admin.commande_wait')
    ->middleware(['auth'])
    ->name('commande.wait');

Route::view('admin/commande+éxpédiées','admin.commande_ok')
    ->middleware(['auth'])
    ->name('commande.ok');

Route::get('admin/commande={id}/expedie/',[TisaneController::class, 'expedie'])
    ->middleware(['auth'])
    ->name('expedie.cmd');

Route::put('Modification/prod={id}',[TisaneController::class, 'saveModif'])
    ->middleware(['auth'])
    ->name('modif.produit');

Route::get('Supprimer/produit={id}',[TisaneController::class, 'delete_prod'])
    ->middleware(['auth'])
    ->name('delete.prod');
    
Route::put('Modification/categorie={id}',[TisaneController::class, 'saveModifCat'])
    ->middleware(['auth'])
    ->name('modif.categorie');

Route::get('Supprimer/categorie={id}',[TisaneController::class, 'delete_cat'])
    ->middleware(['auth'])
    ->name('delete.cat');

Route::put('Modification/point={id}',[TisaneController::class, 'saveModifpts'])
    ->middleware(['auth'])
    ->name('modif.point');

Route::get('Supprimer/point={id}',[TisaneController::class, 'delete_pts'])
    ->middleware(['auth'])
    ->name('delete.point');

    Route::get('Attacher/client={id}',[TisaneController::class, 'clients_atch'])
    ->middleware(['auth'])
    ->name('client.atach');

    Route::get('Detacher/client={id}',[TisaneController::class, 'clients_dtch'])
    ->middleware(['auth'])
    ->name('client.dtach');

//guest route 


Route::view('produits','guest.produit')
    ->middleware(['guest'])
    ->name('produit');
    
Route::put('/panier/q={id}',[TisaneController::class, 'panier'])
    ->middleware(['guest'])
    ->name('guest.panier');

Route::put('/modification/panier/q={id}',[TisaneController::class, 'modificationGuestPanier'])
    ->middleware(['guest'])
    ->name('guest.paniers');

Route::get('/delete/panier/q={id}',[TisaneController::class, 'deleteGuestPanier'])
    ->middleware(['guest'])
    ->name('delete.panier');

Route::get('valide/commande/q={id}',[TisaneController::class, 'commandePanier'])
    ->middleware(['guest'])
    ->name('valide.cmd');

Route::view('panier','guest.panier')
    ->middleware(['guest'])
    ->name('panier.guest');

Route::view('point+de+vente','guest.point')
    ->middleware(['guest'])
    ->name('point.guest');

Route::view('catégorie','guest.categorie')
    ->middleware(['guest'])
    ->name('categorie.guest');

Route::view('catégorie/q={id}','guest.categories')
    ->middleware(['guest'])
    ->name('categorie.guests');

Route::view('Promotion','guest.promotion')
    ->middleware(['guest'])
    ->name('promotion.guest');

Route::view('/blog','guest.blog')
    ->middleware(['guest']);
//user route 

Route::view('/user/produit','user.produit')
    ->middleware(['auth'])
    ->name('produit.user');
    
Route::put('/q={id}/panier',[TisaneController::class, 'paniers'])
    ->middleware(['auth'])
    ->name('auth.panier');

Route::put('/panier/modification/q={id}',[TisaneController::class, 'modificationAuthPanier'])
    ->middleware(['auth'])
    ->name('auth.paniers');

Route::get('/panier/delete/q={id}',[TisaneController::class, 'deleteAuthPanier'])
    ->middleware(['auth'])
    ->name('delete.paniers');

Route::get('/commande/valide/q={id}',[TisaneController::class, 'commandePanier'])
    ->middleware(['auth'])
    ->name('valide.cmds');

Route::view('/paniers','user.panier')
    ->middleware(['auth'])
    ->name('paniers');


Route::view('/point+de+ventes','user.point')
    ->middleware(['auth'])
    ->name('point.auth');

Route::view('toutes+les+catégories','user.categorie')
    ->middleware(['auth'])
    ->name('categorie.auth');

Route::view('catégorie={id}','user.categories')
    ->middleware(['auth'])
    ->name('categorie.auths');

Route::view('Promotions','user.promotion')
    ->middleware(['auth'])
    ->name('promotion.auth');

Route::view('/blog+et/ou+commentaire','user.blog')
    ->middleware(['auth'])
    ->name('blog');

Route::view('/commande','user.commande')
    ->middleware(['auth'])
    ->name('commande');

Route::get('/supprimer/cmd={id}',[TisaneController::class, 'delete_p'])
    ->middleware(['auth'])
    ->name('supprime.cmd');

require __DIR__.'/auth.php';
