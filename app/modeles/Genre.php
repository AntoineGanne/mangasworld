<?php

namespace App\modeles;

use Illuminate\Database\Eloquent\Model;
use DB;

class Genre extends Model
{
    /**
     * liste des genres
     * @return Collection de Genre
     */
    public function getGenres(){
        $genres= DB::table('genre')->get();
        return $genres;
    }
}
