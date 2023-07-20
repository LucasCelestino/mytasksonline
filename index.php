<?php

session_start();

require ('vendor/autoload.php');
require('config/config.php');

use CoffeeCode\Router\Router;

$router = new Router(APP_URL);

$router->namespace("App\Controllers\Web");

$router->get("/", "HomeController:index");

$router->get("/cadastro", "RegisterUserController:showForm");
$router->post("/cadastro", "RegisterUserController:register");

$router->get("/login", "LoginUserController:showForm");
$router->post("/login", "LoginUserController:login");

// $router->get("/users/{id}", "UserController:show");
// $router->put("/users/update", "UserController:update");

$router->dispatch();
