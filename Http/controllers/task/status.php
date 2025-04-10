<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;

$db = App::resolve(Database::class);

authorize($_SESSION['task']['is_admin'] ?? false);

$id = $_POST['id'] ?? null;
$status = $_POST['status'] ?? null;

$errors = [];

// if (!Validator::exists($id)) {
//     $errors['id'] = 'Task ID is required';
// }

if ( empty($id)) {
    $errors['id'] = 'Task ID is required';
}

if (!in_array($taskStatus, ['0', '1'])) {
    $errors['status'] = 'Invalid status value';
}

$task = $db->query('SELECT * FROM tasks WHERE id = :id', [
    'id' => $id
])->findOrFail();

if ($user['id'] === $_SESSION['task']['id'] && $status === '0') {
    $errors['status'] = 'You cannot deactivate your own task';
}

if (!empty($errors)) {
    return view('tasks/status.view.php', [
        'heading' => 'Change Task Status',
        'errors' => $errors,
        'task' => $task
    ]);
}

$db->query('UPDATE tasks SET status = :status WHERE id = :id', [
    'status' => $status,
    'id' => $id
]);

Session::flash('success', 'Task status updated successfully');
redirect('/tasks');