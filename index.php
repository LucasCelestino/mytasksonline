<?php

session_start();

require ('vendor/autoload.php');
require('config/config.php');

use CoffeeCode\Router\Router;

$router = new Router(APP_URL);

$router->namespace("App\Controllers\Web");

$router->get("/teste", "LoggoutController:loggout");

$router->get("/", "HomeController:index");

$router->get("/cadastro", "RegisterUserController:showForm");
$router->post("/cadastro", "RegisterUserController:register");

$router->get("/login", "LoginUserController:showForm");
$router->post("/login", "LoginUserController:login");

$router->get("/adicionar-tarefa", "TaskController:showForm");
$router->post("/adicionar-tarefa", "TaskController:addTask");

$router->get("/minhas-tarefas", "TaskController:myTasks");

$router->get("/perfil", "ProfileController:index");

// $router->get("/users/{id}", "UserController:show");
// $router->put("/users/update", "UserController:update");

$router->dispatch();
