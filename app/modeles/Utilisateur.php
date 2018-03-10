<?php

namespace App\modeles;

use Hamcrest\Util;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Utilisateur extends Model
{

    /**
     * Auth. l'utilisateur sur son login et mdp
     * ok -> id enregistré dans la session
     *     donne accès au menu général
     * @param string $login : login de l'utilisateur
     * @param string $pwd : mdp de l'utilisateur
     * @return boolean: true or false
     */
    public function login($login,$pwd){
        $connected=false;
        $user=DB::table('user')
            ->select()
            ->where('login','=',$login)
            ->first();
        if($user){
            //si mdp saisi identique mdp enregistré
            if($user->pwd == $pwd){
                Session::put('id',$user->user_id);
                $connected=true;
            }
        }
        return $connected;
    }

}
