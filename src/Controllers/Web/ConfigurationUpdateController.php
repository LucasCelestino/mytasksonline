<?php

namespace App\Controllers\Web;

use App\Core\Helpers;
use App\Core\Session;

class ConfigurationUpdateController extends Controller
{
    public function __construct()
    {
        if(!Session::has('user_auth'))
        {
            Helpers::redirect(APP_URL."/login");
            exit;
        }
    }

    public function updateName($request)
    {
        $user = $this->Model("UserModel")->find($_SESSION['user_auth']->email);

        $userPassword = $request['password'];
        $userNewName = $request['name'];

        if(!password_verify($userPassword, $user->password))
        {
            echo json_encode(0);
            exit;
        }

        $user->name = $userNewName;

        $user->save();

        $_SESSION['user_auth']->name = $userNewName;

        echo json_encode(1);
        exit;
    }

    public function updateEmail($request)
    {
        $user = $this->Model("UserModel")->find($_SESSION['user_auth']->email);

        $userPassword = $request['password'];

        $userNewEmail = $request['email'];

        $emailExists = $this->Model("UserModel")->find($userNewEmail);

        if($emailExists)
        {
            echo json_encode(0);
            exit;
        }

        if(!password_verify($userPassword, $user->password))
        {
            echo json_encode(1);
            exit;
        }

        $user->email = $userNewEmail;

        $user->save();

        $_SESSION['user_auth']->email = $userNewEmail;

        echo json_encode(2);
        exit;
    }

    public function updatePassword($request)
    {
        $user = $this->Model("UserModel")->find($_SESSION['user_auth']->email);

        $userPassword = $request['password'];
        $userNewPassword = $request['new_password'];

        if(!password_verify($userPassword, $user->password))
        {
            echo json_encode(0);
            exit;
        }

        $user->password = password_hash($userNewPassword, PASSWORD_BCRYPT);

        $user->save();

        echo json_encode(1);
        exit;
    }

    public function updatePicture($request)
    {
        $user = $this->Model("UserModel")->find($_SESSION['user_auth']->email);

        $userPassword = $request['password'];

        if(!password_verify($userPassword, $user->password))
        {
            $data['status'] = 'error-password';

            $this->render('atualizar-foto', '', $data);
            exit;
        }

        $photo = (object) $_FILES['user_photo'];

        $photoName = md5($photo->name.rand()).time().".jpg";

        Helpers::movePhotosToPath($photo->tmp_name, $photoName);

        $user->picture_url = $photoName;

        $user->save();

        $_SESSION['user_auth']->picture_url = $photoName;

        $data['status'] = 'success';

        $this->render('atualizar-foto', '', $data);
        exit;
    }
}