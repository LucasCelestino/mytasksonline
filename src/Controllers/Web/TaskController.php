<?php

namespace App\Controllers\Web;

use App\Core\Helpers;
use App\Core\Session;
use App\Models\UserModel;

class TaskController extends Controller
{
    public function __construct()
    {
        if(!Session::has('user_auth'))
        {
            Helpers::redirect(APP_URL."/login");
            exit;
        }
    }

    public function showForm()
    {
        $categoryModel = $this->model("CategoryModel");

        $categories = $categoryModel->findAll();

        $this->render('adicionar-tarefa', '', ['categories'=>$categories]);
    }

    public function addTask($request)
    {

    }

    public function myTasks()
    {
        Session::destroy();
        Helpers::redirect(APP_URL."/");
        exit;
    }

    public function deleteTask()
    {

    }
}