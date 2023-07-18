<?php

namespace App\Controllers\Web;

use App\Models\UserModel;

class LoginUserController extends Controller
{
    public function showForm()
    {
        $this->render('cadastro');
    }

    public function login()
    {
        $this->render('cadastro');
    }
}