<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

authorize($_SESSION['user']['is_admin'] ?? false);

$users = $db->query('SELECT * FROM users ORDER BY id DESC')->get();

$stats = $db->query('
    SELECT 
        SUM(status = 1) as active_count,
        SUM(status = 0) as inactive_count,
        SUM(is_admin = 1) as admin_count
    FROM users
')->find();

view('users/index.view.php', [
    'heading' => 'User Management',
    'users' => $users,
    'stats' => $stats
]);