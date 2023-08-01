<?php

namespace App\Controllers\Web;

use App\Core\ExperienceHelper;
use App\Core\Helpers;
use App\Core\Session;
use App\Core\TaskHelper;
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
        $taskModel = $this->model("TaskModel");
        $availableTasksNotesModel = $this->model("AvailableTaskNoteModel");
        $levelSystemModel = $this->model("LevelSystemModel");
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
        $experience = ExperienceHelper::setReceivedExperience(intval($levelSystemUser->actual_level));

        $task = $taskModel->bootstrap($user_id, $category_id, $title, $public, $experience, 0);

        $taskId = $task->save();

        // Avaliable Tasks Notes //
        $availableTasksNotes = $availableTasksNotesModel->findByUserId(intval($user_id));

        if($availableTasksNotes->available == 1)
        {
            $availableTasksNotes->available = 0;
        }
        else
        {
            $availableTasksNotes->available -= 1;
        }

        $availableTasksNotes->save();
        // ------------- //

        echo json_encode(2);
    }

    public function myTasks()
    {
        $availableTasksNotesModel = $this->model("AvailableTaskNoteModel");
        $taskStatusModel = $this->model("TaskStatusModel");
        $categoryModel = $this->model("CategoryModel");
        $taskModel = $this->model("TaskModel");

        $user_id = $this->model("UserModel")->find($_SESSION['user_auth']->email)->id;

        $availableTasksNotes = $availableTasksNotesModel->findAvailableTasksByUserId($user_id);

        $task_in_progress = 0;

        if($taskModel->findAllByUserIdAndStatus($user_id, 0) != null)
        {
            foreach ($taskModel->findAllByUserIdAndStatus($user_id, 0) as $key => $value)
            {
                $task_in_progress++;
            }
        }

        $task_completed = 0;

        if($taskModel->findAllByUserIdAndStatus($user_id, 1) != null)
        {
            foreach ($taskModel->findAllByUserIdAndStatus($user_id, 1) as $key => $value)
            {
                $task_completed++;
            }
        }

        $task_deleted = 0;

        if($taskModel->findAllByUserIdAndStatus($user_id, 2) != null)
        {
            foreach ($taskModel->findAllByUserIdAndStatus($user_id, 2) as $key => $value)
            {
                $task_deleted++;
            }
        }

        $this->data['available_tasks_notes'] = $availableTasksNotes;
        $this->data['task_in_progress'] = $task_in_progress;
        $this->data['task_completed'] = $task_completed;
        $this->data['task_deleted'] = $task_deleted++;
        $this->data['tasks'] = $taskModel->findAllByUserIdAndStatus($user_id, 0);

        if(isset($this->data['tasks']) && !empty($this->data['tasks']))
        {
            for ($i=0; $i < count($this->data['tasks']) ; $i++)
            {
                array_push($this->data['tasks'][$i], $categoryModel->load($this->data['tasks'][$i]['category_id']));
            }
        }


        $this->render("minhas-tarefas", '', $this->data);
    }

    public function completeTask($request)
    {
        $taskModel = $this->model("TaskModel");
        $levelSystemModel = $this->model("LevelSystemModel");
        $availableTasksNotesModel = $this->model("AvailableTaskNoteModel");

        $user_id = $this->model("UserModel")->find($_SESSION['user_auth']->email)->id;

        $task = $taskModel->findByUserIdAndTaskId($user_id, $request['task_id']);

        if($task == null)
        {
            echo json_encode(0);
            exit;
        }

        $task->status = 1;

        $task->save();

        $levelSystemUser = $levelSystemModel->findByUserId($user_id);
        $experience = ExperienceHelper::setReceivedExperience(intval($levelSystemUser->actual_level));

        ExperienceHelper::upForNextLevel(
            $levelSystemUser->experience_bar,
            $levelSystemUser->experience_gauge,
            $levelSystemUser,
            $experience
        );

        $availableTasksNotes = $availableTasksNotesModel->findAvailableTasksByUserId($user_id);

        TaskHelper::upgradeAvailableTasks($availableTasksNotes, $levelSystemUser);

        if($levelSystemUser->actual_level > $_SESSION['user_auth']->user_level)
        {
            $_SESSION['user_auth']->user_level = $levelSystemUser->actual_level;
        }

        echo json_encode(1);
    }

    public function deleteTask($request)
    {
        $taskModel = $this->model("TaskModel");

        $user_id = $this->model("UserModel")->find($_SESSION['user_auth']->email)->id;

        $task = $taskModel->findByUserIdAndTaskId($user_id, $request['task_id']);

        if($task == null)
        {
            echo json_encode(0);
            exit;
        }

        $task->status = 2;

        $task->save();

        $availableTasksNotesModel = $this->model("AvailableTaskNoteModel");

        $availableTasksNotes = $availableTasksNotesModel->findByUserId($user_id );

        $availableTasksNotes->available += 1;

        $availableTasksNotes->save();

        echo json_encode(1);
    }
}