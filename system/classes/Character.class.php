<?php 

    class Character extends User {

        private $name;
        private $class;
        private $sex;

        public static function create($name, $class, $sex){

            if(isset($_GET["name"]) && trim($name) != "" && isset($class) && trim($class) != "" && isset($sex) && trim($sex) != ""){

                // finish

            } else {

                return "empty";

            }

        }

        public static function exist($token){

            global $dbname;

            $query = Database::query("SELECT * FROM $dbname.characters WHERE owner='$token' ;");

            return $query;

        }
        
    }

?>