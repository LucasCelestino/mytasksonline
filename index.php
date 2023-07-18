<?php

session_start();

require ('vendor/autoload.php');
require('config/config.php');

use CoffeeCode\Router\Router;

$router = new Router(APP_URL);

$router->namespace("App\Controllers\Web");

$router->get("/tarefas", "TaskController:myTasks");

$router->get("/cadastro", "RegisterUserController:showForm");
$router->post("/cadastro", "RegisterUserController:register");

$router->get("/login", "LoginUserController:showForm");
$router->post("/login", "LoginUserController:register");

$router->get("/users/{id}", "UserController:show");

$router->get("/users/create", "UserController:create");
$router->post("/users/store", "UserController:store");

$router->get("/users/edit/{id}", "UserController:edit");
$router->put("/users/update", "UserController:update");

$router->delete("/users/destroy/{id}", "UserController:destroy");

$router->dispatch();
