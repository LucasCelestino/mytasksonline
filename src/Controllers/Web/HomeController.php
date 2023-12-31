<?php

namespace App\Controllers\Web;

use App\Core\Helpers;
use App\Models\UserModel;
use App\Core\Session;
use App\Core\TaskHelper;
use App\Core\ExperienceHelper;

class HomeController extends Controller
{
    public function __construct()
    {
        if(!Session::has('user_auth'))
        {
            Helpers::redirect(APP_URL."/login");
            exit;
        }

        ExperienceHelper::setFreeAvailableTasksNotesPerDay();
    }

    public function index()
    {
        // var_dump($_SESSION['user_auth']);exit;
        $this->render('home');
    }

    public function login()
    {
        $this->render('cadastro');
    }
}