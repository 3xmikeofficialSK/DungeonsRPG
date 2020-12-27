<?php 

    Class Core {

        public static function redirect($url, $duration = 0){

            return '<meta http-equiv="refresh" content="'.$duration.';url='.$url.'" />';

        }

    }

?>