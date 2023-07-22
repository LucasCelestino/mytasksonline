<?php

namespace App\Controllers\Web;

use App\Core\ExperienceHelper;
use App\Core\Helpers;
use App\Core\Session;
use App\Models\UserModel;

class TaskController extends Controller
{
    public function __construct()
    {
        if(!Session::has('user_auth'))
        {
            Helpers::redirect(APP_URL."/login");
            exit;
        }
    }

    public function showForm()
    {
        $categoryModel = $this->model("CategoryModel");

        $categories = $categoryModel->findAll();

        $this->render('adicionar-tarefa', '', ['categories'=>$categories]);
    }

    public function addTask($request)
    {
        $levelSystemModel = $this->model("LevelSystemModel");
        $taskModel = $this->model("TaskModel");

        $title = $request['title'];
        $category_id = $request['category'];
        $public = $request['public'];

        if(empty($title) || $category_id == 0 || $public == 0)
        {
            echo json_encode(0);
            exit;
        }

        $user_id = $this->model("UserModel")->find($_SESSION['user_auth']->email)->id;

        $levelSystemUser = $levelSystemModel->findByUserId($user_id);
        $experience = ExperienceHelper::setTaskReceivedExperience(intval($levelSystemUser->actual_level));

        ExperienceHelper::upForNextLevel(
            $levelSystemUser->experience_bar,
            $levelSystemUser->experience_gauge,
            $levelSystemUser,
            $experience
        );


        $task = $taskModel->bootstrap($user_id, $category_id, $title, $public, $experience);

        $taskId = $task->save();

        // Task Status //
        $taskStatusModel = $this->model("TaskStatusModel");

        $taskStatus = $taskStatusModel->bootstrap(intval($taskId), 0);

        $taskStatus->save();
        // ------------- //

        // Avaliable Tasks Notes //
        $availableTasksNotesModel = $this->model("AvailableTaskNoteModel");

        $availableTasksNotes = $availableTasksNotesModel->findByUserId(intval($user_id));

        $availableTasksNotes->available -= 1;

        $availableTasksNotes->save();
        // ------------- //

        echo json_encode(1);
    }

    public function myTasks()
    {
        Session::destroy();
        Helpers::redirect(APP_URL."/");
        exit;
    }

    public function completeTask()
    {

    }

    public function deleteTask()
    {

    }
}