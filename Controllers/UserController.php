<?php

namespace task_manager\Controllers;

use task_manager\Models\User;
use task_manager\Mapping\User\UserMapper;
use task_manager\Views\View;

class UserController 
{
    public function index() {
        View::render('users/auth');
    }

    public function auth($login,$password) {
        $userMappper = new UserMapper();
        $user = new User($login,$password);
        $userFind = $userMappper->get($user);
        if ($userFind) {
            $result = $userFind['name'] . ', вы успешно вошли!';
        } else {
            $result = 'Вход не удался!';    
        }
        View::render('users/result', ['result' => $result]);
    }

    public function reg() {
        View::render('users/reg');
    }

    public function registr($name,$email,$login,$password) {
        $userMappper = new UserMapper();
        $user = new User($login,$password,$name,$email);
        $userMappper->save($user);
        View::render('users/auth');
    }


}