<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Core\Session;

$db = App::resolve(Database::class);

authorize($_SESSION['user']['is_admin'] ?? false);

$errors = [];


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


$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $_POST['email']
])->find();

if ($user) {
    $errors['email'] = 'Email already in use';
}

if (! empty($errors)) {
    return view('users/create.view.php', [
        'heading' => 'Create User',
        'errors' => $errors,
        'user' => $_POST
    ]);
}

$db->query('INSERT INTO users(name, email, password, status, is_admin) VALUES(:name, :email, :password, :status, :is_admin)', [
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
    'status' => isset($_POST['status']) ? 1 : 0,
    'is_admin' => isset($_POST['is_admin']) ? 1 : 0
]);

Session::flash('success', 'User created successfully');
redirect('/users');