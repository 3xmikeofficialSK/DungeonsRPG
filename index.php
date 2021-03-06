<?php 

    require_once("./system/config.php");

    include_once(__LOCALESET__."/index.php");

    include_once(__PAGES__."/header.php");

    if(Project::getSetting("project_maintenance") && __ACTUAL_URL__ != __URL__."/index.php?page=maintenance"){
        echo Core::redirect(__URL__."/index.php?page=maintenance");
    }

    if(isset($_GET["page"])){

        $page = $_GET["page"];
        $page_file = __PAGES__."/".$page.".php";

        if(file_exists($page_file) && filesize($page_file) > 0){

            include_once($page_file);

        } else {

            echo Core::redirect(__URL__);

        }

    } else {

        if(User::isLoggedIn()){

            if(Character::exist($user->getToken())){

                Core::openCard("Welcome");

                Core::closeCard();

            } else {
    
                include_once(__PAGES__."/character.php");
    
            }
    
        } else {

            Core::openCard("Welcome");

            Core::closeCard();

        }

    }

    include_once(__PAGES__."/footer.php");
    
?>