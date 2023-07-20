<?php

namespace App\Controllers\Web;

use App\Core\Helpers;
use App\Core\Session;

class LoggoutController extends Controller
{
    public function loggout()
    {
        Session::destroy();
        Helpers::redirect(APP_URL."/");
        exit;
    }
}