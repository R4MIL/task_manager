<?php

namespace App\Services\Auth;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function __construct(protected string $email, protected string $password)
    {
        
    }

    public function login()
    {
        try {
            $this->checkUser();
            return $this->generateToken($this->password);
        } catch (Exception $e) {
            return [
                'success' => false,
                'status' => 422,
                'message' => $e->getMessage()
            ];
        }
        
    }

    public function checkUser(): void
    {
        $user = User::where('email', $this->email)->first();
        if (!$user) {
            throw new Exception("User not found");
        }  
    }

    public function generateToken(): array
    {
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $user = Auth::user();
            $data = [
                'success' => true,
                'token' => $user->createToken('RestAPI')->plainTextToken,
                'user_id' => $user->id
            ];
            
            return $data;
        } else {
            throw new Exception("Wrong email or password");
        }
    }
}