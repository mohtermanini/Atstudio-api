<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function getUserByCredentialsOrFail($email, $password)
    {
        $user = (new UserService)->getUser(email: $email);

        if (!$user || !Hash::check($password, $user->password)) {
            throw new \Exception("Invalid credentials", 422);
        }

        return $user;
    }
}
