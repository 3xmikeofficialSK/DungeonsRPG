<?php 

    Class Core {

        public static function redirect($url, $duration = 0){

            return '<meta http-equiv="refresh" content="'.$duration.';url='.$url.'" />';

        }

        public static function hash($value){

            return hash("sha256", $value);

        }

        public static function secureInput($value){

            return htmlspecialchars($value);

        }

    }

?>