<?php

use App\Core\App;
use App\Core\Database\Connection;
use App\Core\Database\QueryBuilder;

App::bind('config', require 'config.php');
App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));
session_start();

function view($viewName, $data = [])
{
    extract($data);

    if(isset($_SESSION["user"])){
        define("USER", $_SESSION["user"]);
    }else{
        define("USER", false);
    }

    return require "app/views/{$viewName}.view.php";
}

function redirect($path)
{
    header("location: /{$path}");
}

function dd($var)
{
    echo '<pre>';
    die(var_dump($var));
}
