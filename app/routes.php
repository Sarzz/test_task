<?php

$router->get('', 'PagesController@home');

$router->get('task', 'PagesController@task');

$router->get('login', 'UsersController@login');
$router->get('logout', 'UsersController@logOut');

$router->post('status', 'PagesController@updateStatus');
$router->post('update', 'PagesController@updateTask');
$router->post('login', 'UsersController@loginPost');
$router->post('new-task', 'PagesController@newTask');
