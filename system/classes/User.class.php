<?php 

    class User {

        private $id;
        private $username;
        private $password;
        private $token;
        private $rights;

        function __construct($token){

            global $dbname;

            $query = Database::queryAlone("SELECT * FROM $dbname.users WHERE token='$token' ;");

            $this->id = $query["id"];
            $this->username = $query["username"];
            $this->password = $query["password"];
            $this->token = $query["token"];
            $this->rights = $query["rights"];

        }

        public function getId(){

            return $this->id;

        }

        public function getUsername(){

            return $this->username;

        }

        public function getPassword(){

            return $this->password;

        }
        
        public function getToken(){

            return $this->token;

        }

        public function getRights(){

            return $this->rights;

        }

        public static function isLoggedIn(){

            if(isset($_SESSION["user_token"]) && trim($_SESSION["user_token"]) != "" || isset($_COOKIE["user_token"]) && trim($_COOKIE["user_token"]) != ""){

                return true;

            }

        }
        public static function getUserToken(){

            if(isset($_SESSION["user_token"]) && trim($_SESSION["user_token"]) != ""){

                return $_SESSION["user_token"];

            } elseif(isset($_COOKIE["user_token"]) && trim($_COOKIE["user_token"]) != "") {

                return $_COOKIE["user_token"];

            }

        }

        public static function createUser($username, $password){

            if(isset($username) && isset($password) && trim($username) != "" && trim($password) != ""){

                if(!self::UserExist($username)){

                    $username = Core::secureInput($username);
                    $password = Core::hash($password);
                    $token = Core::hash(Core::randomString(64));

                    Database::queryAlone("INSERT INTO users SET username='$username', password='$password', token='$token' ;");
                    return "success";

                } else {

                    return "exist";

                }

            } else {

                return "empty";

            }

        }

        public static function userExist($username){

            global $dbname;

            $query = Database::query("SELECT * FROM $dbname.users WHERE username='$username' ;");

            return $query;

        }

        public static function logMeIn($username, $password, $remember = "off"){

            if(isset($username) && trim($username) != "" && isset($password) && trim($password) != ""){

                if(self::userExist($username)){

                    global $dbname;

                    $query = Database::queryAlone("SELECT * FROM $dbname.users WHERE username='$username' ;");

                    if(Core::hash($password) == $query["password"]){

                        if($remember == "on"){
                            setcookie("user_token",$query["token"],time()+60*60*24*365);
                            return "success";
                        } else {
                            $_SESSION["user_token"] = $query["token"];
                            return "success";
                        }

                    } else {

                        return "wrongpass";

                    }

                } else {

                    return "exist";

                }

            } else {

                return "empty";

            }

        }

        public static function logout(){

            session_destroy();
            unset($_COOKIE["user_token"]);
            setcookie("user_token", "", time()-3600);

        }

    }

?>