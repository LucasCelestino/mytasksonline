<?php

namespace App\Controllers\Web;

use App\Core\Helpers;
use App\Core\Session;
use App\Models\UserModel;

class LoggoutUserController extends Controller
{

    public function __construct()
    {
        if(!Session::has('user_auth'))
        {
            Helpers::redirect(APP_URL."/login");
            exit;
        }
    }

    public function sair()
    {
        Session::destroy();

        Helpers::redirect(APP_URL."/home");

        exit;
    }
}