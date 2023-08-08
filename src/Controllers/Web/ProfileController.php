<?php

namespace App\Controllers\Web;

use App\Core\ExperienceHelper;
use App\Core\Helpers;
use App\Models\UserModel;
use App\Core\Session;

class ProfileController extends Controller
{
    private array $data = [];

    public function __construct()
    {
        if(!Session::has('user_auth'))
        {
            Helpers::redirect(APP_URL."/login");
            exit;
        }

        ExperienceHelper::setFreeAvailableTasksNotesPerDay();
    }

    public function myProfile($request)
    {
        $userModel = $this->model("UserModel");
        $taskModel = $this->model("TaskModel");
        $noteModel = $this->model("NoteModel");
        $levelSystemModel = $this->model("LevelSystemModel");

        $slug = filter_var($_GET['id'], FILTER_SANITIZE_SPECIAL_CHARS);

        $user = $userModel->findBySlug($slug);

        $publicTasks = $taskModel->findByUserIdAndPublic($user->id, 1);
        $publicNotes = $noteModel->findByUserIdAndPublic($user->id, 1);
        $levelSystem = $levelSystemModel->findByUserId($user->id);

        $this->data['user'] = $user;
        $this->data['tasks'] = $publicTasks;
        $this->data['notes'] = $publicNotes;
        $this->data['level_system'] = $levelSystem;

        // $_SESSION['user_auth'];
        $this->render('meu-perfil', '', $this->data);
    }
}