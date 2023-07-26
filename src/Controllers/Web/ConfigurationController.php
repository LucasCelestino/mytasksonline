<?php

namespace App\Controllers\Web;

use App\Core\Helpers;
use App\Core\Session;

class ConfigurationController extends Controller
{
    public function __construct()
    {
        if(!Session::has('user_auth'))
        {
            Helpers::redirect(APP_URL."/login");
            exit;
        }
    }

    public function configuration()
    {
        // $_SESSION['user_auth'];
        $this->render('configuracoes');
    }

    public function updateName()
    {
        // $_SESSION['user_auth'];
        $this->render('configuracoes');
    }

    public function updateEmail()
    {
        // $_SESSION['user_auth'];
        $this->render('configuracoes');
    }

    public function updatePassword()
    {
        // $_SESSION['user_auth'];
        $this->render('configuracoes');
    }

    public function updatePicture()
    {
        // $_SESSION['user_auth'];
        $this->render('configuracoes');
    }
}