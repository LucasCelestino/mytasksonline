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

    public function showNameForm()
    {
        // $_SESSION['user_auth'];
        $this->render('atualizar-nome');
    }

    public function showEmailForm()
    {
        // $_SESSION['user_auth'];
        $this->render('atualizar-email');
    }

    public function showPasswordForm()
    {
        // $_SESSION['user_auth'];
        $this->render('atualizar-senha');
    }

    public function showPictureForm()
    {
        // $_SESSION['user_auth'];
        $this->render('atualizar-foto');
    }
}