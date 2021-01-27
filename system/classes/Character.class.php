<?php 

    class Character extends User {

        private $name;
        private $owner;
        private $class;
        private $sex;
        private $level;
        private $hp;
        private $max_hp;
        private $int;
        private $max_int;
        private $str;
        private $dex;
        private $max_dex;
        private $luck;
        private $defense;
        private $gold;
        private $stat_points;
        private $perk_points;
        private $mount;
        private $weight;
        private $current_weight;
        private $inventory = array();

        public static function create($name, $token, $class, $sex){

            if(isset($name) && trim($name) != "" && isset($class) && trim($class) != "" && isset($sex) && trim($sex) != ""){

                global $dbname;

                if(!self::exist($token)){

                    $hp = 100;
                    $max_hp = 100;
                    $int = 100;
                    $max_int = 100;
                    $dex = 100;
                    $max_dex = 100;
                    $str = 10;
                    $luck = 5;
                    $defense = 0;

                    switch($class){

                        case "warrior":
                            $hp = 150;
                            $max_hp = 150;
                            $str = 20;
                            $defense = 10;
                            break;
                        case "assassin":
                            $str = 25;
                            $luck = 15;
                            $dex = 150;
                            $max_dex = 150;
                            break;
                        case "hunter":
                            $hp = 150;
                            $max_hp = 150;
                            $dex = 150;
                            $max_dex = 150;
                            $str = 15;
                            break;
                        case "mage":
                            $hp = 150;
                            $max_hp = 150;
                            $int = 175;
                            $max_int = 175;
                            $dex = 150;
                            $max_dex = 150;
                            break;

                    }

                    $name = Core::secureInput($name);
                    $token = Core::secureInput($token);
                    $class = Core::secureInput($class);
                    $sex = Core::secureInput($sex);
                    $hp = Core::secureInput($hp);
                    $max_hp = Core::secureInput($max_hp);
                    $int = Core::secureInput($int);
                    $max_int = Core::secureInput($max_int);
                    $dex = Core::secureInput($dex);
                    $max_dex = Core::secureInput($max_dex);
                    $str = Core::secureInput($str);
                    $luck = Core::secureInput($luck);
                    $defense = Core::secureInput($defense);

                    $query = Database::queryAlone("INSERT INTO $dbname.characters SET name='$name', owner='$token', class='$class', sex='$sex', health='$hp', max_health='$max_hp', intelligence='$int', max_intelligence='$max_int', dexterity='$dex', max_dexterity='$max_dex', strenght='$str', luck='$luck', defense='$defense'  ;");

                    return "success";

                } else {

                    return "exist";

                }

            } else {

                return "empty";

            }

        }

        function __construct($token){

            global $dbname;

            $query = Database::queryAlone("SELECT * FROM $dbname.characters WHERE owner='$token' ;");

            $this->name = $query["name"];
            $this->owner = $query["owner"];
            $this->class = $query["class"];
            $this->sex = $query["sex"];
            $this->level = $query["level"];
            $this->hp = $query["health"];
            $this->max_hp = $query["max_health"];
            $this->int = $query["intelligence"];
            $this->max_int = $query["max_intelligence"];
            $this->str = $query["strenght"];
            $this->dex = $query["dexterity"];
            $this->max_dex = $query["max_dexterity"];
            $this->luck = $query["luck"];
            $this->defense = $query["defense"];
            $this->gold = $query["gold"];
            $this->stat_points = $query["stat_points"];
            $this->perk_points = $query["perk_points"];
            $this->mount = $query["mount"];
            $this->weight = $query["weight"];
            $this->current_weight = self::countCurrWeight($token);
            $this->inventory = self::prepareInventory($token);

        }

        public function getName(){

            return $this->name;

        }

        public function getOwner(){

            return $this->owner;

        }

        public function getClass(){

            return $this->class;

        }

        public function getSex(){

            return $this->sex;

        }

        public function getLevel(){

            return $this->level;

        }

        public function getHp(){

            return $this->hp;

        }

        public function getMax_hp(){

            return $this->max_hp;

        }

        public function getInt(){

            return $this->int;

        }

        public function getMax_int(){

            return $this->max_int;

        }

        public function getStr(){

            return $this->str;

        }

        public function getDex(){

            return $this->dex;

        }

        public function getMax_dex(){

            return $this->max_dex;

        }

        public function getLuck(){

            return $this->luck;

        }

        public function getDefense(){

            return $this->defense;

        }

        public function getGold(){

            return $this->gold;

        }

        public function setGold($value, $name){

            global $dbname;

            $value = Core::secureInput($value);

            Database::queryAlone("UPDATE $dbname.characters SET gold='$value' WHERE name='$name' ;");
            $this->gold = $value;

        }

        public function getStat_points(){

            return $this->stat_points;

        }

        public function getPerk_points(){

            return $this->perk_points;

        }

        public function getMount(){

            return $this->mount;

        }

        public function setMount($mount, $name){

            global $dbname;

            $mount = Core::secureInput($mount);

            $query = Database::queryAlone("UPDATE $dbname.characters SET mount='$mount' WHERE name='$name' ;");
            $this->mount = $mount;

        }

        public function buyMount($mount, $token){

            if($mount > $this->getMount()){

                switch($mount){

                    case 10:
                        $mount_cost = 1000; // 1.000g
                        break;
                    case 20:
                        $mount_cost = 2500; // 2.500g
                        break;
                    case 30:
                        $mount_cost = 10000; // 10.000g
                        break;
                    case 40:
                        $mount_cost = 100000; // 100.000g
                        break;
                    case 50:
                        $mount_cost = 250000; // 250.000g
                        break;
                    case 75:
                        $mount_cost = 1000000; // 1.000.000g
                        break;

                }

                if($this->getGold() >= $mount_cost){

                    $this->setMount($mount, $this->getName());
                    $this->setGold($this->getGold()-$mount_cost, $this->getName());

                    return "success";

                } else {

                    return "missing_gold";

                }
                
            } else {

                return "weak";

            }

        }

        public function getWeight(){

            return $this->weight;

        }

        public function countCurrWeight($token){

            global $dbname;

            $query = Database::queryAll("SELECT * FROM $dbname.items WHERE owner='$token' ;");

            $weight = 0;

            foreach($query as $item){

                $weight = $weight + ($item["weight"]*$item["count"]);

            }

            return $weight;


        }

        public function getCurrWeight(){

            return $this->current_weight;

        }

        public function prepareInventory($token){

            global $dbname;

            $query = Database::queryAll("SELECT * FROM $dbname.items WHERE owner='$token' ;");

            return $query;

        }

        public function getInventory(){

            return $this->inventory;

        }

        public static function exist($token){

            global $dbname;

            $query = Database::query("SELECT * FROM $dbname.characters WHERE owner='$token' LIMIT 1 ;");

            return $query;

        }
        
    }

?>