<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Core\Session;


$db = App::resolve(Database::class);

authorize($_SESSION['user']['is_admin'] ?? false);

if (! Validator::string($_POST['name'], 3, 255)) {
    $errors['name'] = 'Name must be between 3 and 255 characters';
}

if (! Validator::email($_POST['email'])) {
    $errors['email'] = 'Please provide a valid email address';
}

if (! Validator::string($_POST['password'], 8, 255)) {
    $errors['password'] = 'Password must be at least 8 characters';
}

if ($_POST['password'] !== $_POST['password_confirmation']) {
    $errors['password_confirmation'] = 'Passwords do not match';
}


$user = $db->query('SELECT * FROM users WHERE id = :id', [
    'id' => $_GET['id']
])->findOrFail();

view("users/edit.view.php", [
    'heading' => 'Edit User',
    'errors' => [],
    'user' => $user
]);


Session::flash('success', 'User updated successfully');
redirect('/users');