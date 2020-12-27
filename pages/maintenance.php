<?php 

    If(!Project::getSetting("project_maintenance")){

        echo Core::redirect(__URL__);

    }

?>

Udrzba