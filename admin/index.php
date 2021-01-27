<?php 

    require_once("../system/config.php");

    include_once(__LOCALESET__."/index.php");

    include_once(__PAGES__."/header.php");

    if(Project::getSetting("project_maintenance") && __ACTUAL_URL__ != __URL__."/index.php?page=maintenance"){
        echo Core::redirect(__URL__."/index.php?page=maintenance");
    }

    if(isset($_GET["page"])){

        $page = $_GET["page"];
        $page_file = __ADMIN_PAGES__."/".$page.".php";

        if(file_exists($page_file) && filesize($page_file) > 0){

            include_once($page_file);

        } else {

            echo Core::redirect(__URL__);

        }

    } else {

        if(User::isLoggedIn()){

            if($user->getRights()){

                Core::openCard($locale["administration"]["welcome"]["title"]);

                    echo $locale["administration"]["welcome"]["content"];

                Core::closeCard();

            } else {

                echo Core::redirect(__URL__);

            }
    
        } else {

            echo Core::redirect(__URL__);

        }

    }

    include_once(__PAGES__."/footer.php");
    
?>