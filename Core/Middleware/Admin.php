<?php
namespace Core\Middleware;

class Admin
{
    public function handle(): void
    {
        if (!isset($_SESSION['user']['is_admin']) || !$_SESSION['user']['is_admin']) {
            header('Location: /');
            exit();
        }
    }
}