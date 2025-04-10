<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

authorize($_SESSION['task']['is_admin'] ?? false);

if ($_SESSION['task']['id'] == $_POST['id']) {
    Session::flash('error', 'You cannot delete your own task');
    redirect('/tasks');
}

$db->query('DELETE FROM tasks WHERE id = :id', [
    'id' => $_POST['id']
]);

Session::flash('success', 'Task deleted successfully');
redirect('/tasks');