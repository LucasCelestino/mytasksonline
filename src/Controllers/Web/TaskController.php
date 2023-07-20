<?php

namespace App\Controllers\Web;

use App\Core\Helpers;
use App\Core\Session;
use App\Models\UserModel;

class TaskController extends Controller
{
    public function myTasks()
    {
        Session::destroy();
        Helpers::redirect(APP_URL."/");
        exit;
    }

    public function addTask()
    {

    }

    public function deleteTask()
    {

    }
}