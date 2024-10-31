<?php

namespace App\Actions\Policy;

use Exception;
use Illuminate\Support\Facades\Gate;

class PolicyAction 
{
    public static function check($method,$entity) {
        if (!Gate ::allows($method,$entity)) {
            throw new Exception("You have no rights for $method");   
        }
    } 
}