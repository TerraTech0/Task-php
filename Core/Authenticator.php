<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)
            ->query('SELECT * FROM users WHERE email = :email', [
                'email' => $email
            ])->find();

        if ($user && password_verify($password, $user['password'])) {
            $this->login($user);
            return true;
        }

        return false;
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email'],
            'is_admin' => $user['is_admin']
        ];

        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }

    public static function isAdmin()
    {
        return $_SESSION['user']['is_admin'] ?? false;
    }
}