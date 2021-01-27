<?php 

    class Item{

        private $id;
        private $vnum;
        private $locale_name;
        private $item_name;
        private $item_type;
        private $item_subtype;
        private $limit_type0;
        private $limit_value0;
        private $limit_type1;
        private $limit_value1;
        private $min_value;
        private $max_value;
        private $rarity;
        private $apply_type0;
        private $apply_value0;
        private $apply_type1;
        private $apply_value1;
        private $socket0;
        private $socket1;
        private $price;
        private $owner;
        
        function __construct($id){

            global $dbname;

            $query = Database::queryAlone("SELECT * FROM $dbname.items WHERE id='$id' ;");

            $this->id = $query["id"];
            $this->vnum = $query["vnum"];
            $this->locale_name = $query["locale_name"];
            $this->item_name = $query["item_name"];
            $this->item_type = $query["item_type"];
            $this->item_subtype = $query["item_subtype"];
            $this->limit_type0 = $query["limit_type0"];
            $this->limit_value0 = $query["limit_value0"];
            $this->limit_type1 = $query["limit_type1"];
            $this->limit_value1 = $query["limit_value1"];
            $this->min_value = $query["min_value"];
            $this->max_value = $query["max_value"];
            $this->rarity = $query["rarity"];
            $this->apply_type0 = $query["apply_type0"];
            $this->apply_value0 = $query["apply_value0"];
            $this->apply_type1 = $query["apply_type1"];
            $this->apply_value1 = $query["apply_value1"];
            $this->socket0 = $query["socket0"];
            $this->socket1 = $query["socket1"];
            $this->socket2 = $query["socket2"];
            $this->price = $query["price"];

        }

        public static function createItem($name, $type, $subtype, $weight, $limit_type0 = "level", $limit_value0 = "1", $limit_type1 = "", $limit_value1 = "",$min_value = "0", $max_value = "0", $apply_type0="0", $apply_value0="0", $apply_type1="0", $apply_value1="0", $socket0 = "0", $socket1 = "0", $socket2 = "0", $price = "0"){

            if(Core::check($name) && Core::check($subtype)){

                global $dbname;

                Database::queryAlone("INSERT INTO $dbname.item_proto SET locale_name='$name', item_type='$type', item_subtype='$subtype', weight='$weight', limit_type0='$limit_type0', limit_value0='$limit_value0', limit_type1='$limit_type1', limit_value1='$limit_value1', min_value='$min_value', max_value='$max_value', apply_type0='$apply_type0', apply_value0='$apply_value0', apply_type1='$apply_type1', apply_value1='$apply_value1', socket0='$socket0', socket1='$socket1', socket2='$socket2', price='$price'  ;");

            }

        }

        public static function createOwnedItem($vnum, $count = 1, $rarity = 0, $token){

            if(Core::check($vnum) && Core::check($token)){

                global $dbname;

                $item = Database::queryAlone("SELECT * FROM $dbname.item_proto WHERE vnum='$vnum' LIMIT 1 ;");

                Database::queryAlone("INSERT INTO $dbname.items SET vnum='$vnum', locale_name='".$item['locale_name']."', item_type='".$item['item_type']."', item_subtype='".$item['item_subtype']."', weight='".$item['weight']."', count='$count', limit_type0='".$item['limit_type0']."', limit_value0='".$item['limit_value0']."', limit_type1='".$item['limit_type1']."', limit_value1='".$item['limit_value1']."', min_value='".$item['min_value']."', max_value='".$item['max_value']."', rarity='$rarity', apply_type0='".$item['apply_type0']."', apply_value0='".$item['apply_value0']."', apply_type1='".$item['apply_type1']."', apply_value1='".$item['apply_value1']."', socket0='".$item['socket0']."', socket1='".$item['socket1']."', socket2='".$item['socket2']."', price='".$item['price']."', owner='$token'  ;");

            }

        }

    }

?>