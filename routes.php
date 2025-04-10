<?php

$router->get('/', 'index.view.php');


$router->get('/login', 'session/create.php')->only('guest');
$router->post('/login', 'session/store.php')->only('guest');
$router->delete('/logout', 'session/destroy.php')->only('auth');

$router->get('/users', 'user/index.php')->only('auth');         
$router->get('/users/create', 'user/create.php')->only('auth'); 
$router->post('/users', 'user/store.php')->only('auth');        
$router->get('/users/{id}', 'user/show.php')->only('auth');      
$router->get('/users/{id}/edit', 'user/edit.php')->only('auth'); 
$router->put('/users/{id}', 'user/update.php')->only('auth');   
$router->patch('/users/{id}/status', 'user/status.php')->only('auth');
$router->delete('/users/{id}', 'user/destroy.php')->only('auth');

$router->get('/tasks', 'task/index.php')->only('auth');         
$router->get('/tasks/create', 'task/create.php')->only('auth'); 
$router->post('/tasks', 'task/store.php')->only('auth');        
$router->get('/tasks/{id}', 'task/show.php')->only('auth');     
$router->get('/tasks/{id}/edit', 'task/edit.php')->only('auth');
$router->put('/tasks/{id}', 'task/update.php')->only('auth');   
$router->patch('/tasks/{id}/status', 'task/status.php')->only('auth');
$router->delete('/tasks/{id}', 'task/destroy.php')->only('auth');
$router->patch('/tasks/{id}/status', 'task/status.php')->only('auth');
$router->delete('/tasks/{id}', 'task/destroy.php')->only('auth');