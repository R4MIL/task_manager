<?php


namespace task_manager\Mapping\User;

use task_manager\Models\User;
use task_manager\Database\DBConnection;
use task_manager\Services\User\UserRepository;

class UserMapper implements UserRepository
{
    public function get(User $user) {
        $conn = DBConnection::get()->connect();
        $sql = "SELECT * FROM users WHERE login=:login AND password=:password";
        $query = $conn->prepare($sql);
        $query->execute([
            ':login' => $user->getLogin(),
            ':password' =>  $user->getPassword()
        ]);
        return $query->fetch();
    }

    public function save(User $user) {
        $conn = DBConnection::get()->connect();
        $sql = "INSERT INTO users(name,login,email,password) VALUES(:name,:login,:email,:password)";
        $query = $conn->prepare($sql);
        $query->execute([
            ':name' => $user->getName(),
            ':email' =>  $user->getEmail(),
            ':login' => $user->getLogin(),
            ':password' =>  $user->getPassword()
        ]);
        return $query->fetch();
    }

}
