<?php

namespace App\Controllers\Web;

use App\Core\Helpers;
use App\Models\UserModel;
use App\Core\Session;

class HomeController extends Controller
{
    public function __construct()
    {
        if(!Session::has('user_auth'))
        {
            Helpers::redirect(APP_URL."/login");
            exit;
        }
    }

    public function index()
    {
        $this->render('cadastro');
    }

    public function login()
    {
        $this->render('cadastro');
    }
}