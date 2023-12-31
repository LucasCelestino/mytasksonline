<?php

namespace App\Core;

use App\Core\Session;

class Helpers
{
        /**
     * @param string $email
     *
     * @return bool
     */
    function is_email(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * @param string $string
     *
     * @return string
     */
    function str_title(string $string): string
    {
        return mb_convert_case(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS), MB_CASE_TITLE);
    }

    /**
     * @param string $url
     *
     * @return void
     */
    public static function redirect(string $url): void
    {
        header("HTTP/1.1 302 Redirect");
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            header("Location: {$url}");
            exit;
        }
    }

    public static function csrf_input()
    {
        $sessionCsrfToken = Session::csrf();
        return $sessionCsrfToken;
    }

    public static function movePhotosToPath(String $path, String $fileName)
    {
        move_uploaded_file($path, IMAGES_PATH."/".$fileName);
    }

    public static function verifyPassword($password, $confirmedPassword)
    {
        return $password == $confirmedPassword ? true : false;
    }

    public static function verifyPasswordLength($password)
    {
        return strlen($password) > 5 ? true : false;
    }

    public static function verifyPasswordHash($password, $hash)
    {
        return password_verify($password, $hash) ? true : false;
    }
}