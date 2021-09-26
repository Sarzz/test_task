<?php

namespace App\Controllers;

use App\Core\App;
use App\Models\User;

class UsersController
{
    public function login()
    {
        return view('login');
    }

    public function logOut(){
        unset($_SESSION['user']);
        return redirect('');
    }

    public function loginPost()
    {
        $name = $_POST["username"];
        $password = $_POST["password"];
        $name = User::login($name, $password);
        if($name === false){
            $error = "Неправильное имя или пароль";
            return view('login', compact('error'));
        }
        $_SESSION["user"] = $name["name"];
        return redirect('');
    }
}
