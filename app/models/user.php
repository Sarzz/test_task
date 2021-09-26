<?php

namespace App\Models;

use App\Core\App;

class User
{
    static function login($name, $password){
        return  App::get('database')->selectUser('users',[":name"=>$name, ":pass"=>md5($password)]);
    }
}
