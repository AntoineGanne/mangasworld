<?php

namespace App\Http\Controllers;

use App\modeles\Dessinateur;
use App\modeles\Genre;
use App\modeles\Manga;
use App\modeles\Scenariste;
use Request;
use Exception;
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
        $id_genre= Request::input('cbGenre');  //le probleme est ici
        if($id_genre){
            $manga=new Manga();
            $mangas=$manga->getMangasGenre($id_genre);
            //echo $id_genre;
            return view('listeMangas',compact('mangas','erreur'));
        } else{
            $erreur="Il faut selectioner un genre!";
           // echo $erreur;
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


    public function validateManga(){
        $id_manga= Request::input('id_manga');
        $id_dessinateur=Request::input('cbDessinateur');;
        $prix=Request::input('prix');;
        $id_scenariste=Request::input('cbScenariste');;
        $titre=Request::input('titre');;
        $id_genre=Request::input('cbGenre');;

        if(Request::hasfile('couverture')){
            $image=Request::file('couverture');
            $couverture=$image->getClientOriginalName();
            Request::file('couverture')->move(base_path().'/public/images/',$couverture);
        }else{
            $couverture=Request::input('couvertureHidden');
        }
        $manga=new Manga();
        try{
            if($id_manga>0){
                $manga->updateManga($id_manga,$titre,$couverture,$prix,$id_dessinateur,$id_genre,$id_scenariste);
            }else{
                $manga->insertManga($titre,$couverture,$prix,$id_dessinateur,$id_genre,$id_scenariste);
            }
        }catch(Exception $ex) {
            if($id_manga>0){
                $erreur ="echec de la modification!";
                if($prix <= 0) $erreur.=" prix négatif!!!!!";
                return $this->updateManga($id_manga, $erreur);
            }else{
                $erreur ="echec de la modification!";
                if($prix <= 0) $erreur.=" prix négatif!!!!!";
                return $this->addManga($erreur);
            }
        }
        return redirect('/listerMangas');
    }

    public function addManga($erreur=""){
        $manga=new Manga();
        $genre=new Genre();
        $genres=$genre->getGenres();
        $dessinateur=new Dessinateur();
        $dessinateurs=$dessinateur->getDessinateurs();
        $scenariste=new Scenariste();
        $scenaristes=$scenariste->getScenaristes();
        $titreVue="Ajout d'un Manga";
        return view('formManga',compact('manga','genres','dessinateurs',
            'scenaristes','titreVue','erreur'));
    }

    public function deleteManga($id_manga,$erreur=""){
        $manga=new Manga();
        try{
            $manga->deleteManga($id_manga);
        }catch(Exception $ex){
            $erreur="echec de la suppresion";
            return view('listeMangas',compact('mangas','erreur'));
        }
        return redirect('/listerMangas');
    }
}
