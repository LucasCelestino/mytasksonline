<?php

namespace App\Controllers\Web;

use App\Core\Helpers;
use App\Models\UserModel;
use App\Core\Session;
use App\Core\TaskHelper;

class SearchController extends Controller
{
    private array $data = [];

    public function __construct()
    {
        if(!Session::has('user_auth'))
        {
            Helpers::redirect(APP_URL."/login");
            exit;
        }
    }

    public function search($request)
    {
        $userModel = $this->model("UserModel");
        $levelSystemModel = $this->model("LevelSystemModel");

        $search_value = filter_var($_GET['search'], FILTER_SANITIZE_SPECIAL_CHARS);

        if($search_value == null)
        {
            Helpers::redirect(APP_URL."/home");
        }

        $search = $userModel->search($search_value);

        if($search != null)
        {
            foreach ($search as $user)
            {
                $levelSystem = $levelSystemModel->findByUserId($user['id']);

                array_push($user, $levelSystem);

                $this->data['users_search'][] = $user;
            }
        }

        $this->render("pesquisa", '', $this->data);
    }
}