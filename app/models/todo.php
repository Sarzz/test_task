<?php

namespace App\Models;

use App\Core\App;

class Todo
{
    static function getTasks($start, $limit, $by, $type){
        return  App::get('database')->selectPagination('todos',[":start"=>(int)$start, ":limits"=>(int)$limit],'ORDER BY '.$by.' '.$type);
    }

    static function addTask($name, $mail, $text){
        return  App::get('database')->addTask('todos',[":name"=>htmlspecialchars($name, ENT_QUOTES), ":email"=>$mail, ":description"=>htmlspecialchars($text, ENT_QUOTES)]);
    }

    static function getCount(){
        return  App::get('database')->countTask('todos');
    }

    static function getTask($id){
        return  App::get('database')->selectOneId('todos',[":id"=>$id]);
    }

    static function updateTask($id, $text){
        return  App::get('database')->updateTask('todos',[":id"=>$id, ":description"=>htmlspecialchars($text, ENT_QUOTES), ":edited" => date('Y-m-d H:i:s') ]);
    }

    static function updateStatus($id, $complated){
        return  App::get('database')->updateStatus('todos',[":id"=>$id, ":complated"=>(int)$complated]);
    }
}
