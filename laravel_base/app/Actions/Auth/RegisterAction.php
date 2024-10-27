<?php

namespace App\Actions\Auth;

use App\Models\User;

class RegisterAction 
{
    public function __invoke($email, $password, $name)
    {
        $user = User::create([
            'name' => $name,
            'email' => trim(strtolower($email)),
            'password' => bcrypt($password)
        ]);     

        return [
            'id' => $user->id
        ];
    }

} 