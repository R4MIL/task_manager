<?php

namespace task_manager\Services\User;


use task_manager\Models\User;

interface UserRepository
{
    public function get(User $user);
    public function save(User $user);
}
