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

        // 0 => The passwords are different
        // 1 => The email is already registered
        // 1 => Success

        // $photo = (object) $_FILES['user_photo'];
        // $photoName = md5($photo->name.rand()).time().".jpg";
        // Helpers::movePhotosToPath($photo->tmp_name, $photoName);

        if(!Helpers::verifyPassword($request['password'], $request['confirmPassword']))
        {
            echo json_encode(0);
            exit;
        }

        if(!Helpers::verifyPasswordLength($request['password']))
        {
            echo json_encode(1);
            exit;
        }

        $slug = md5(uniqid().$request['email'].rand());

        $user = $userModel->bootstrap(
                $request['name'],
                $request['email'],
                password_hash($request['password'], PASSWORD_BCRYPT),
                $slug
        );

        if($user->save() == 1)
        {
            echo json_encode(2);
            exit;
        }

        echo json_encode(3);
    }
}