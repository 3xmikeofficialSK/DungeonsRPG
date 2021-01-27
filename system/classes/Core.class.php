<?php 

    Class Core {

        public static function redirect($url, $duration = 0){

            return '<meta http-equiv="refresh" content="'.$duration.';url='.$url.'" />';

        }

        public static function refresh($delay = 0){

            return '<meta http-equiv="refresh" content="'.$delay.';" />';

        }

        public static function openCard($name = "Title", $align = "left"){

            echo "
                <div class='card'>
                    <div class='card-header text-$align'>$name</div>
                    <div class='card-body'>
            ";

        }

        public static function randomString($lenght, $chars = ""){

            if(trim($chars) == ""){

                $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

            }

            $string = "";

            while(($len = strlen($string)) < $lenght){

                $chars = self::shuffleString($chars);
                $string .= $chars[mt_rand(0, strlen($chars) - 1)];

            }

            return $string;

        }

        public static function shuffleString($value){

            return str_shuffle($value);

        }

        public static function closeCard(){

            echo "
                    </div>
                </div>
            ";

        }

        public static function hash($value){

            return hash("sha256", $value);

        }

        public static function secureInput($value){

            return htmlspecialchars($value);

        }

        public static function check($value){

            if(isset($value) && trim($value) != ""){

                return true;

            }

            return false;

        }

    }

?>