<?php

namespace App\Controllers\Web;

use App\Models\UserModel;

class TaskController extends Controller
{
    public function myTasks()
    {
        $this->render('minhas-tarefas');
    }

    public function addTask()
    {

    }

    public function deleteTask()
    {

    }
}