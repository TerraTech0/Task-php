<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

authorize($_SESSION['task']['is_admin'] ?? false);

$id = $_GET['id'] ?? null;


$task = $db->query('SELECT * FROM tasks WHERE id = :id', [
    'id' => $id
])->findOrFail();

view("tasks/show.view.php", [
    'heading' => 'Task Details',
    'task' => $task
]);