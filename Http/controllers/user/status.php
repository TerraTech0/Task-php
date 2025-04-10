<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;

$db = App::resolve(Database::class);

authorize($_SESSION['user']['is_admin'] ?? false);

$id = $_POST['id'] ?? null;
$status = $_POST['status'] ?? null;

$errors = [];

// if (!Validator::exists($id)) {
//     $errors['id'] = 'User ID is required';
// }


if (!in_array($status, ['0', '1'])) {
    $errors['status'] = 'Invalid status value';
}

$user = $db->query('SELECT * FROM users WHERE id = :id', [
    'id' => $id
])->findOrFail();

if ($user['id'] === $_SESSION['user']['id'] && $status === '0') {
    $errors['status'] = 'You cannot deactivate your own account';
}

if (!empty($errors)) {
    return view('users/status.view.php', [
        'heading' => 'Change User Status',
        'errors' => $errors,
        'user' => $user
    ]);
}

$db->query('UPDATE users SET status = :status WHERE id = :id', [
    'status' => $status,
    'id' => $id
]);

Session::flash('success', 'User status updated successfully');
redirect('/users');