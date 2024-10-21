<?php
namespace task_manager\Models;

use task_manager\Database\DBConnection;

class User extends Model
{
   
    private string $name;
    private string $email;


    public function getName():string {
        return $this->name;
    }

    public function getEmail():string {
        return $this->email;
    }

    protected static function getTableName(): string
    {
        return 'users';
    }

    protected static function getFields(): array
    {   
        return ['name','email','login','password'];
    }

    public static function auth($login,$password) {
        $conn = DBConnection::get()->connect();
        $sql = "SELECT * FROM users WHERE login=:login AND password=:password";
        $query = $conn->prepare($sql);
        $query->execute([
            'login' => $login,
            'password' =>  $password
        ]);
        return $query->fetch();
    }

    public function tasks(): array {
        return $this->hasMany(Task::class, 'owner_id', $this->id);
    }

}