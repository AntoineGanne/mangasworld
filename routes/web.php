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
Route::get('/signOut','UtilisateurController@signOut');

//afficher liste de tous les mangas
Route::get('/listerMangas','MangaController@getMangas');

//afficher liste deroulante des genres
Route::get('/listerGenres','GenreController@getGenres');

//lister tous les mangas d'un genre selectionné
Route::post('/listerMangasGenre','MangaController@getMangasGenre');

//Afficher un manga pour pouvoir le modifier
Route::get('/modifierManga/{id}','MangaController@updateManga');