<?php

namespace App\Http\Controllers;

use App\modeles\Dessinateur;
use App\modeles\Genre;
use App\modeles\Manga;
use App\modeles\Scenariste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MangaController extends Controller
{
    /**
     * affiche la liste de tous les mangas
     * si la Seesion contient un msg d'erreur
     * on le recup et on le supprime de la Session
     * @return Vue lissterMangas
     */
    public function getMangas(){
        $erreur=Session::get('erreur');
        Session::forget('erreur');
        $manga=new Manga();
        //on recup la liste
        $mangas=$manga->getMangas();
        //on l'affiche
        return view('listeMangas',compact('mangas','erreur'));
    }

    /**
     * afficher la liste de tous lesmangas d'un genre.
     * Si on n'as pas selectionné de genre alors on place un msg d'erreur
     * et on relance le formulaire de selction d'un genre
     * @return Vue listerManga
     */
    public function getMangasGenre(){
        $erreur="";
        $id_genre= (new Request)->input('cbGenre');
        if($id_genre){
            $manga=new Manga();
            $mangas=$manga->getMangasGenre($id_genre);
            return view('listeMangas',compact('mangas','erreur'));
        } else{
            $erreur="Il faut selectioner un genre!";
            Session::put('erreur',$erreur);
            return redirect('/listerGenres');
        }
    }

    public function getGenres(){
        $erreur=Session::get('erreur');
        Session::forget('erreur');
        $genre= new Genre();
    }

    /**
     * initialise toutes les listes deroulantes
     * lit le manga a modifier
     * initialise le formulaire en mode Modification
     * @param $id int id du manga a modifier
     * @param string $erreur message d'erreur (optionnel)
     * @return Vue formManga
     */
    public function updateManga($id,$erreur=""){
        $leManga=new Manga();
        $manga=$leManga->getManga($id);
        $genre=new Genre();
        $genres=$genre->getGenres();
        $dessinateur=new Dessinateur();
        $dessinateurs=$dessinateur->getDessinateurs();
        $scenariste=new Scenariste();
        $scenaristes=$scenariste->getScenaristes();
        $titreVue="Modification d'un Manga";
        return view('formManga',compact('manga','genres','dessinateurs',
            'scenaristes','titreVue','erreur'));

    }
}
