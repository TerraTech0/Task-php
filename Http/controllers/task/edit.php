<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Core\Session;


$db = App::resolve(Database::class);

authorize($_SESSION['task']['is_admin'] ?? false);

if(!Validator::string($_POST['title'], 5, 255 )){
    $errors['title'] = 'Task Name Must be between 5 to 255 characters';
}

if(!Validator::string($_POST['description'], 10, 255)){
    $errors['description'] = 'Task Description Must be between 10 to 255 characters';
}

$task = $db->query('SELECT * FROM tasks WHERE id = :id', [
    'id' => $_GET['id']
])->findOrFail();

view("tasks/edit.view.php", [
    'heading' => 'Edit Task',
    'errors' => [],
    'task' => $$task
]);


Session::flash('success', 'Task updated successfully');
redirect('/tasks');
