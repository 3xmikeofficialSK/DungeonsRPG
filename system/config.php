<?php 

    session_start();

    // Encoding
    mb_internal_encoding("UTF-8");
    date_default_timezone_set("Europe/Bratislava");

    // Databaza
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dungeons_rpg";

    // Defines
    define("__HTTP__", isset($_SERVER["HTTPS"]) ? "https://" : "http://");
    
    define("__BASEDIR__", $_SERVER["DOCUMENT_ROOT"]);
    define("__SYSTEM__", $_SERVER["DOCUMENT_ROOT"]."/system");
    define("__CLASSES__", $_SERVER["DOCUMENT_ROOT"]."/system/classes");
    define("__PAGES__", $_SERVER["DOCUMENT_ROOT"]."/pages");
    define("__ADMIN_PAGES__", $_SERVER["DOCUMENT_ROOT"]."/admin/pages");
    define("__LOCALE__", $_SERVER["DOCUMENT_ROOT"]."/system/locale");
    define("__LOCALE_DEFAULT__", "sk");

    define("__URL__", __HTTP__.$_SERVER["SERVER_NAME"]);
    define("__ACTUAL_URL__", __HTTP__.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]);

    // Errors
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 'On');
    ini_set('log_errors', 'On');
    ini_set('error_log', __SYSTEM__.'/errors.log');

    spl_autoload_register(
        function ($class)
        {
            $path = __CLASSES__."/".$class.".class.php";
            if(file_exists($path) AND filesize($path) > 0)
            {
                require_once($path);
            } else {
                trigger_error("Class was not found : ".$path, E_USER_ERROR);
            }
        }
    );

    try {
        Database::connect($host, $username, $password, $dbname);
    } catch(PDOException $e)
    {
        Core::redirect("offline.php");
        die();
    }

    if(isset($_SESSION["LOCALE_SET"])){

        define("__LOCALESET__", __LOCALE__."/".$_SESSION["LOCALE_SET"]);

    } else {
        $_SESSION["LOCALE_SET"] = __LOCALE_DEFAULT__;
        define("__LOCALESET__", __LOCALE__."/".__LOCALE_DEFAULT__);

    }

    if(User::isLoggedIn()){

        $user = new User(User::getUserToken());

        if(Character::exist($user->getToken())){

            $char = new Character($user->getToken());
            
        }

    }



?>