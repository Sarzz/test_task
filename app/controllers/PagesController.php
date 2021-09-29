<?php

namespace App\Controllers;

use App\Core\App;
use App\Models\Todo;

class PagesController
{
    public function home()
    {
        $total_results = Todo::getCount();
        $limit = 3;
        $by = 'id';
        $type = 'DESC';
        $totalPages = ceil($total_results/$limit);
        if (!isset($_GET['pg'])) {
            $page = 1;
        } else{
            $page = $_GET['pg'];
        }
        $page_link = '?pg=';
        if (!isset($_GET['nm'])) {
            $nm = 1;
        } else{
            if($_GET['nm'] == 1){
                $by = 'name';
                $type = 'ASC';
                $nm = 0;
                $page_link = '?nm=1&pg=';
            }else{
                $by = 'name';
                $type = 'DESC';
                $nm = 1;
                $page_link = '?nm=0&pg=';
            }

        }

        if (!isset($_GET['em'])) {
            $em = 1;
        } else{
            if($_GET['em'] == 1){
                $by = 'email';
                $type = 'ASC';
                $em = 0;
                $page_link = '?em=1&pg=';
            }else{
                $by = 'email';
                $type = 'DESC';
                $em = 1;
                $page_link = '?em=0&pg=';
            }
        }

        if (!isset($_GET['ds'])) {
            $ds = 1;
        } else{
            if($_GET['ds'] == 1){
                $by = 'description';
                $type = 'ASC';
                $ds = 0;
                $page_link = '?ds=1&pg=';
            }else{
                $by = 'description';
                $type = 'DESC';
                $ds = 1;
                $page_link = '?ds=0&pg=';
            }
        }
        if (!isset($_GET['st'])) {
            $st = 1;
        } else{
            if($_GET['st'] == 1){
                $by = 'completed';
                $type = 'DESC';
                $st = 0;
                $page_link = '?st=1&pg=';
            }else{
                $by = 'completed';
                $type = 'ASC';
                $st = 1;
                $page_link = '?st=0&pg=';
            }
        }
        $starting_limit = ($page-1)*$limit;
        $insert = false;
        if(isset($_SESSION["sucess"])){
            $insert = true;
        }
        unset($_SESSION['sucess']);

        $param = [":start"=>$starting_limit, ":limits"=>$limit];

        $tasks = Todo::getTasks($starting_limit, $limit, $by, $type);
        return view('index', compact('tasks','totalPages', 'page_link', 'page', 'nm', 'em', 'ds', 'st', 'insert'));
    }

    public function task(){
        if(!$_SESSION["user"]){
            return redirect('/login');
        }
        $error = "";
        $task = "";
        if(!isset($_GET["id"])){
            $error = "Неправильный URL";
        }else if(!is_numeric($_GET["id"])){
            $error = "неправильный URL";
        }else{
            $task = Todo::getTask($_GET["id"]);
        }
        return view('task', compact('task', 'error'));
    }

    public function updateTask(){
        if(!$_SESSION["user"]){
            return redirect('/login');
        }
        if(isset($_POST["id"])){
            $task = Todo::updateTask($_POST["id"], $_POST["text"]);
        }
        return redirect('');
    }

    public function updateStatus(){
        if(!$_SESSION["user"]){
            return redirect('/login');
        }else{
            if(isset($_POST["id"])){
                $task = Todo::updateStatus($_POST["id"], $_POST["val"]);
            }
        }
    }

    public function newTask()
    {
        $name = $_POST["name"];
        $mail = $_POST["email"];
        $text = $_POST["text"];

        $new_insert = Todo::addTask($name, $mail, $text);
        if(is_numeric($new_insert)){
            $_SESSION["sucess"] = "success";
        }

        return redirect('');
    }
}
