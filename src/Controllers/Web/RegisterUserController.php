<?php

namespace App\Controllers\Web;

use App\Core\Helpers;
use App\Models\UserModel;

class RegisterUserController extends Controller
{
    public function showForm()
    {
        $data['csrf_token'] = Helpers::csrf_input();

        $this->render('cadastro', '', $data);
    }

    public function register($request)
    {
        $userModel = new UserModel();

        // $photo = (object) $_FILES['user_photo'];

        // $photoName = md5($photo->name.rand()).time().".jpg";

        // Helpers::movePhotosToPath($photo->tmp_name, $photoName);

        $user = $userModel->bootstrap($request['name'], $request['email'], $request['password']);

        echo json_encode(true);

        $user->save();
    }
}