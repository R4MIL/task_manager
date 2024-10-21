<?php

namespace task_manager\Controllers;

use task_manager\Models\User;
use task_manager\Views\View;

class UserController 
{
    public function auth() {
        View::render('users/authentication');
    }

    public function authentication($login,$password) {
        $userFind = User::auth($login,$password);
        if ($userFind) {
            header('Location: /users/list');
        } else {
            $result = 'Вход не удался!';    
            View::render('users/error', ['result' => $result]);
        }
    }

    public function reg() {
        View::render('users/registration');
    }

    public function registration($name,$email,$login,$password) {
        User::create([
            'name' => $name,
            'email' =>  $email,
            'login' => $login,
            'password' =>  $password
        ]);
        View::render('users/authentication');
    }

    public function usersList() {
        $users = User::all();
        View::render('users/list', ['users' => $users]);     
    }

    public function userGet($id) {
        $user = User::find($id);
        View::render('users/data', ['user' => $user]);     
    }
    


}