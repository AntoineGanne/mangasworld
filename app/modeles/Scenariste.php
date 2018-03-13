<?php

namespace App\modeles;

use Illuminate\Database\Eloquent\Model;
use DB;

class Scenariste extends Model
{
    public function getScenaristes(){
        $scenaristes=DB::table('scenariste')->get();
        return $scenaristes;
    }
}
