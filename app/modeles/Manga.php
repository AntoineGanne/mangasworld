<?php

namespace App\modeles;

use Illuminate\Database\Eloquent\Model;
use DB;

class Manga extends Model
{
    /**
     * lecture de tous les mangas
     * mise en oeuvre de jointures
     * @return Collection de Manga
     */
    public function getMangas(){
        $mangas=DB::table('manga')
            ->Select('id_manga','titre','genre.lib_genre','dessinateur.nom_dessinateur',
                'scenariste.nom_scenariste','prix')
            ->join('genre','manga.id_genre','=','genre.id_genre')
            ->join('dessinateur','manga.id_dessinateur','=','dessinateur.id_dessinateur')
            ->join('scenariste','manga.id_scenariste','=','scenariste.id_scenariste')
            ->get();
        return $mangas;
    }

    /**
     * lecture de tous les mangas d'un genre
     * @param $id_genre
     * @return collection de manga
     */
    public function getMangasGenre($id_genre){
        $mangas=DB::table('manga')
            ->Select('id_manga','titre','genre.lib_genre','dessinateur.nom_dessinateur',
                'scenariste.nom_scenariste','prix')
            ->where('manga.id_genre','=',$id_genre)
            ->join('genre','manga.id_genre','=','genre.id_genre')
            ->join('dessinateur','manga.id_dessinateur','=','dessinateur.id_dessinateur')
            ->join('scenariste','manga.id_scenariste','=','scenariste.id_scenariste')
            ->get();
        return $mangas;
    }

    public function getManga($idManga){
        $manga=DB::table('manga')
            ->select()
            ->where('id_manga','=',$idManga)
            ->first();
        return $manga;
    }
}
