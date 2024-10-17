<?php
namespace task_manager\Models;

use task_manager\Database\DBConnection;

class User 
{
    public static function get($login,$password) {
        $conn = DBConnection::get()->connect();
        $sql = "SELECT * FROM users WHERE login=:login AND password=:password";
        $query = $conn->prepare($sql);
        $query->execute([
            ':login' => $login,
            ':password' =>  $password
        ]);
        return $query->fetch();
    }

    public static function save($name,$email,$login,$password) {
        $conn = DBConnection::get()->connect();
        $sql = "INSERT INTO users(name,email,login,password) VALUES(:name,:email,:login,:password)";
        $query = $conn->prepare($sql);
        $query->execute([
            ':name' => $name,
            ':email' =>  $email,
            ':login' => $login,
            ':password' =>  $password
        ]);
        return $query->fetch();
    }
}