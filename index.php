<?php

session_start();

require ('vendor/autoload.php');
require('config/config.php');

use CoffeeCode\Router\Router;

$router = new Router(APP_URL);

$router->namespace("App\Controllers\Web");

$router->get("/", "HomeController:index");
$router->get("/home", "HomeController:index");

$router->get("/configuracoes", "ConfigurationController:configuration");
$router->get("/configuracoes/nome", "ConfigurationController:showNameForm");
$router->get("/configuracoes/email", "ConfigurationController:showEmailForm");
$router->get("/configuracoes/senha", "ConfigurationController:showPasswordForm");
$router->get("/configuracoes/foto", "ConfigurationController:showPictureForm");

$router->post("/configuracoes/nome", "ConfigurationUpdateController:updateName");
$router->post("/configuracoes/email", "ConfigurationUpdateController:updateEmail");
$router->post("/configuracoes/senha", "ConfigurationUpdateController:updatePassword");
$router->post("/configuracoes/foto", "ConfigurationUpdateController:updatePicture");

$router->get("/cadastro", "RegisterUserController:showForm");
$router->post("/cadastro", "RegisterUserController:register");

$router->get("/login", "LoginUserController:showForm");
$router->post("/login", "LoginUserController:login");

$router->get("/sair", "LoggoutUserController:sair");

$router->get("/adicionar-tarefa", "TaskController:showForm");
$router->post("/adicionar-tarefa", "TaskController:addTask");

$router->get("/adicionar-anotacao", "NoteController:showForm");
$router->post("/adicionar-anotacao", "NoteController:addNote");

$router->get("/minhas-tarefas", "TaskController:myTasks");
$router->get("/minhas-anotacoes", "NoteController:myNotes");

$router->post("/concluir-tarefa", "TaskController:completeTask");
$router->post("/excluir-tarefa", "TaskController:deleteTask");
$router->post("/excluir-anotacao", "NoteController:deleteNote");

$router->get("/anotacao/{id}", "NoteController:showNote");


$router->get("/usuarios", "SearchController:search");

$router->get("/perfil", "ProfileController:myProfile");

// $router->get("/users/{id}", "UserController:show");
// $router->put("/users/update", "UserController:update");

$router->dispatch();
