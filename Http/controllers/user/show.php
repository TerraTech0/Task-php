<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

authorize($_SESSION['user']['is_admin'] ?? false);

$id = $_GET['id'] ?? null;

$user = $db->query('SELECT * FROM users WHERE id = :id', [
    'id' => $id
])->findOrFail();

view("users/show.view.php", [
    'heading' => 'User Details',
    'user' => $user
]);