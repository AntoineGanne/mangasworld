<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});



// Afficher le formulaire d'authentification
Route::get('/getLogin','UtilisateurController@getLogin');

//réponse au clic sur valider du formulaire formLogin
route::post('/signIn','UtilisateurController@signIn');

//déloguer l'utilisateur
Route::get('/signOut','UtilisateurController@signOut')->middleware('autorise');

//afficher liste de tous les mangas
Route::get('/listerMangas','MangaController@getMangas')->middleware('autorise');

//afficher liste deroulante des genres
Route::get('/listerGenres','GenreController@getGenres')->middleware('autorise');

//lister tous les mangas d'un genre selectionné
Route::post('/listerMangasGenre','MangaController@getMangasGenre')->middleware('autorise');

//Afficher un manga pour pouvoir le modifier
Route::get('/modifierManga/{id}','MangaController@updateManga')->middleware('autorise');

//Enregistrer la mise a jour d'un manga
Route::post('/validerManga','MangaController@validateManga')->middleware('autorise');

Route::get('/ajouterManga','MangaController@addManga')->middleware('autorise');

Route::get('/supprimerManga/{id}','MangaController@deleteManga')->middleware('autorise');