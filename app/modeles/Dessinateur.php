<?php

namespace App\modeles;

use Illuminate\Database\Eloquent\Model;
use DB;

class Dessinateur extends Model
{
    public function getDessinateurs(){
        $dessinateurs=DB::table('dessinateur')->get();
        return $dessinateurs;
    }
}
