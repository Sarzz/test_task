<?php

namespace App\Core\Database;

use PDO;
use PDOException;

class QueryBuilder
{
    protected $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }


    public function selectUser($table, $params){
        try {
            $sql = "SELECT name FROM users WHERE name = :name AND password = :pass";
            $statement = $this->pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $statement->execute($params);
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Whoops, Something went wrong');
        }
    }

    public function selectOneId($table, $params){
        try {
            $sql = "SELECT * FROM {$table} WHERE id = :id";
            $statement = $this->pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $statement->execute($params);
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Whoops, Something went wrong');
        }
    }

    public function selectPagination($table, $params, $order){
        try {
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
            $sql = "SELECT * FROM {$table} {$order} LIMIT :start, :limits";
            $statement = $this->pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $statement->execute($params);
            return $statement->fetchAll();
        } catch (PDOException $e) {
            die('Whoops, Something went wrong');
        }
    }

    public function countTask($table){
        try {
            $statement = $this->pdo->prepare("select COUNT(*) from {$table}");
            $statement->execute();

            return $statement->fetchColumn();
        } catch (PDOException $e) {
            die('Whoops, Something went wrong');
        }
    }

    public function addTask($table, $params){
        try {
            $sql = "INSERT INTO {$table} (name, email, description) VALUES (:name, :email, :description)";
            $statement = $this->pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $statement->execute($params);
        } catch (PDOException $e) {
            die('Whoops, Something went wrong');
        }
    }

    public function updateTask($table, $params){
        try {
            $sql = "UPDATE {$table} SET edited_date = :edited, description = :description WHERE id=:id";
            $statement = $this->pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $statement->execute($params);
        } catch (PDOException $e) {
            die('Whoops, Something went wrong');
        }
    }

    public function updateStatus($table, $params){
        try {
            $sql = "UPDATE {$table} SET completed = :complated WHERE id=:id";
            $statement = $this->pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $statement->execute($params);
        } catch (PDOException $e) {
            die('Whoops, Something went wrong');
        }
    }

}
