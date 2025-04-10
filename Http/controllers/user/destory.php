<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

authorize($_SESSION['user']['is_admin'] ?? false);

if ($_SESSION['user']['id'] == $_POST['id']) {
    Session::flash('error', 'You cannot delete your own account');
    redirect('/users');
}

$db->query('DELETE FROM users WHERE id = :id', [
    'id' => $_POST['id']
]);

Session::flash('success', 'User deleted successfully');
redirect('/users');