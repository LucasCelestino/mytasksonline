<?php
//App Root
define('APP_ROOT', dirname(dirname(__FILE__)));
define('APP_URL', 'http://localhost/tasks-online');
define('APP_PATH', 'tasks-online');

define('PUBLIC_PATH', $_SERVER["DOCUMENT_ROOT"]."/".APP_PATH."/public");

define('VIEW_ROOT', APP_ROOT . '\views\\');

define('CSS_URL', APP_URL."/public/assets/css");
define('JS_URL', APP_URL."/public/assets/javascript");

define('IMAGES_PATH', PUBLIC_PATH."/assets/images");
define('IMAGES_URL', APP_URL."/public/assets/images");

//DB Params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'tasks-db');

// EMAIL Params
define('MAIL_USERNAME', 'email@email.com');
define('MAIL_PASSWORD', '12345');
define('MAIL_SMTPSECURE', 'tls');
define('MAIL_HOST', 'smtp.gmail.com');
define('MAIL_PORT', 587);