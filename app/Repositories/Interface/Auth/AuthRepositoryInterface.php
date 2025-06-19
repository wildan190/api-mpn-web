<?php

namespace App\Repositories\Interface\Auth;

interface AuthRepositoryInterface
{
    public function register(array $data);

    public function login(array $data);

    public function logout($user);
}
