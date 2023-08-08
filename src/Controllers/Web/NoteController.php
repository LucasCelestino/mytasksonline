<?php

namespace App\Controllers\Web;

use App\Core\ExperienceHelper;
use App\Core\Helpers;
use App\Core\Session;
use App\Core\TaskHelper;
use App\Models\UserModel;

class NoteController extends Controller
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

    public function showForm()
    {
        $categoryModel = $this->model("CategoryModel");

        $categories = $categoryModel->findAll();

        $this->render('adicionar-anotacao', '', ['categories'=>$categories]);
    }

    public function addNote($request)
    {
        $noteModel = $this->model("NoteModel");
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
        $anotation_text = $request['anotation_text'];
        $public = $request['public'];

        if(empty($title) || $category_id == 0 || $public == 0 || empty($anotation_text))
        {
            echo json_encode(1);
            exit;
        }

        $levelSystemUser = $levelSystemModel->findByUserId($user_id);
        $experience = ExperienceHelper::setReceivedExperience(intval($levelSystemUser->actual_level));

        $note = $noteModel->bootstrap($user_id, $category_id, $title, $anotation_text, $public, $experience, 0);

        $note->save();

        ExperienceHelper::upForNextLevel(
            $levelSystemUser->experience_bar,
            $levelSystemUser->experience_gauge,
            $levelSystemUser,
            $experience
        );

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

        $availableTasksNotes = $availableTasksNotesModel->findAvailableTasksByUserId($user_id);

        TaskHelper::upgradeAvailableTasks($availableTasksNotes, $levelSystemUser);

        if($levelSystemUser->actual_level > $_SESSION['user_auth']->user_level)
        {
            $_SESSION['user_auth']->user_level = $levelSystemUser->actual_level;
        }

        echo json_encode(2);
        exit;
    }

    public function myNotes()
    {
        $availableTasksNotesModel = $this->model("AvailableTaskNoteModel");
        $categoryModel = $this->model("CategoryModel");
        $noteModel = $this->model("NoteModel");

        $user_id = $this->model("UserModel")->find($_SESSION['user_auth']->email)->id;

        $availableTasksNotes = $availableTasksNotesModel->findAvailableTasksByUserId($user_id);

        $note_deleted = 0;

        if($noteModel->findAllByUserIdAndStatus($user_id, 1) != null)
        {
            foreach ($noteModel->findAllByUserIdAndStatus($user_id, 1) as $key => $value)
            {
                $note_deleted++;
            }
        }

        $this->data['available_tasks_notes'] = $availableTasksNotes;
        $this->data['note_deleted'] = $note_deleted;
        $this->data['note_total'] = count((array)$noteModel->findAllByUserId($user_id));
        $this->data['notes'] = $noteModel->findAllByUserIdAndStatus($user_id, 0);

        if(isset($this->data['notes']) && !empty($this->data['notes']))
        {
            for ($i=0; $i < count($this->data['notes']) ; $i++)
            {
                array_push($this->data['notes'][$i], $categoryModel->load($this->data['notes'][$i]['category_id']));
            }
        }

        $this->render('minhas-anotacoes', '', $this->data);
    }

    public function deleteNote($request)
    {
        $noteModel = $this->model("NoteModel");

        $user_id = $this->model("UserModel")->find($_SESSION['user_auth']->email)->id;

        $note = $noteModel->findByUserIdAndNoteId($user_id, $request['note_id']);

        if($note == null)
        {
            echo json_encode(0);
            exit;
        }

        $note->status = 1;

        $note->save();

        echo json_encode(1);
    }

    public function showNote($request)
    {
        $noteModel = $this->model("NoteModel");
        $categoryModel = $this->model("CategoryModel");

        $user_id = $this->model("UserModel")->find($_SESSION['user_auth']->email)->id;

        $note = $noteModel->load($request['id']);

        if($note == null)
        {
            Helpers::redirect(APP_URL."/minhas-anotacoes");
        }

        if($note->user_id == $user_id)
        {
            $this->data['note'] = $note;

            $category = $categoryModel->load($this->data['note']->category_id);

            $this->data['category'] = $category;
        }
        else
        {
            $note = $noteModel->findByIdAndPublic($note->id, 1);

            if($note == null)
            {
                Helpers::redirect(APP_URL."/minhas-anotacoes");
            }

            $this->data['note'] = $note;

            $category = $categoryModel->load($this->data['note']->category_id);

            $this->data['category'] = $category;
        }

        $this->render("anotacao", '', $this->data);
    }
}