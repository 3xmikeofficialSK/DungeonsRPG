<?php 

    class Project {

        public static function getSetting($name){

            global $dbname;

            $query = Database::queryAlone("SELECT * FROM $dbname.project WHERE project_setting='$name' ;");
            return $query['project_value'];

        }

    }

?>