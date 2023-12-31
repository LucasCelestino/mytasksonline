<?php

namespace App\Controllers\Web;

use App\Core\ExperienceHelper;
use App\Core\Helpers;
use App\Core\Session;
use App\Models\UserModel;

class LoginUserController extends Controller
{

    public function __construct()
    {
        if(Session::has('user_auth'))
        {
            Helpers::redirect(APP_URL."/");
            exit;
        }
    }

    public function showForm()
    {
        $this->render('login');
    }

    public function login($request)
    {
        $userModel = $this->model("UserModel");
        $levelSystemModel = $this->model("LevelSystemModel");

        $user = $userModel->find($request['email']);

        if(!$user)
        {
            echo json_encode(0);
            exit;
        }

        if(!Helpers::verifyPasswordHash($request['password'], $user->password))
        {
            echo json_encode(1);
            exit;
        }

        $levelSystemUser = $levelSystemModel->findByUserId($user->id);

        $session_user = [];

        $session_user['name'] = $user->name;
        $session_user['email'] = $user->email;
        $session_user['picture_url'] = $user->picture_url;
        $session_user['slug'] = $user->slug;
        $session_user['user_level'] = $levelSystemUser->actual_level;

        Session::set('user_auth',(object) $session_user);
        echo json_encode(2);
        exit;
    }

    public function sair()
    {
        echo 'oi';exit;
        Session::unset('user_auth');

        Helpers::redirect(APP_URL."/home");

        exit;
    }
}