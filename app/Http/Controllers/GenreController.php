<?php

namespace App\Http\Controllers;

use App\modeles\Genre;

use Illuminate\Support\Facades\Session;

class GenreController extends Controller
{
    /**
     * Afficher les genres dans une liste deroulante
     * @return Vue formGenre
     */
    public  function getGenres(){
        $erreur=Session::get('erreur');
        Session::forget('erreur');
        $genre=new Genre();
        $genres=$genre->getGenres();
        return view('formGenre',compact('genres','erreur'));
    }
}
