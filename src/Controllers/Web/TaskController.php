<?php

namespace App\Controllers\Web;

use App\Core\ExperienceHelper;
use App\Core\Helpers;
use App\Core\Session;
use App\Models\UserModel;

class TaskController extends Controller
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
        $availableTasksNotesModel = $this->model("AvailableTaskNoteModel");
        $user_id = $this->model("UserModel")->find($_SESSION['user_auth']->email)->id;

        if($availableTasksNotesModel->findByUserId($user_id)->available == 0)
        {
            echo json_encode(0);
            exit;
        }

        $title = $request['title'];
        $category_id = $request['category'];
        $public = $request['public'];

        if(empty($title) || $category_id == 0 || $public == 0)
        {
            echo json_encode(1);
            exit;
        }

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

        $taskStatus = $taskStatusModel->bootstrap(intval($taskId),intval($user_id), 0);

        $taskStatus->save();
        // ------------- //

        // Avaliable Tasks Notes //
        $availableTasksNotes = $availableTasksNotesModel->findByUserId(intval($user_id));

        $availableTasksNotes->available -= 1;

        $availableTasksNotes->save();
        // ------------- //

        echo json_encode(2);
    }

    public function myTasks()
    {
        $availableTasksNotesModel = $this->model("AvailableTaskNoteModel");
        $taskStatusModel = $this->model("TaskStatusModel");

        $user_id = $this->model("UserModel")->find($_SESSION['user_auth']->email)->id;

        $availableTasksNotes = $availableTasksNotesModel->findAvailableTasksByUserId($user_id);

        $task_in_progress = 0;

        if($taskStatusModel->findByTaskStatus($user_id, 0) != null)
        {
            foreach ($taskStatusModel->findByTaskStatus($user_id, 0) as $key => $value)
            {
                $task_in_progress++;
            }
        }

        $task_completed = 0;

        if($taskStatusModel->findByTaskStatus($user_id, 1) != null)
        {
            foreach ($taskStatusModel->findByTaskStatus($user_id, 1) as $key => $value)
            {
                $task_completed++;
            }
        }

        $task_deleted = 0;

        if($taskStatusModel->findByTaskStatus($user_id, 2) != null)
        {
            foreach ($taskStatusModel->findByTaskStatus($user_id, 2) as $key => $value)
            {
                $task_deleted++;
            }
        }

        $this->data['available_tasks_notes'] = $availableTasksNotes;
        $this->data['task_in_progress'] = $task_in_progress;
        $this->data['task_completed'] = $task_completed;
        $this->data['task_deleted'] = $task_deleted++;

        $this->render("minhas-tarefas", '', $this->data);
    }

    public function completeTask()
    {

    }

    public function deleteTask()
    {

    }
}