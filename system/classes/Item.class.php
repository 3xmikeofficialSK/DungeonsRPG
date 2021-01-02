<?php 

    class Item{

        public static function getSubType($subtype){

            $item_type = array(

                "ITEM_WEAPON",
                "ITEM_ARMOR" => array("ITEM_HELMET", "ITEM_CHESTPIECE", "ITEM_SHIELD", "ITEM_EARINGS", "ITEM_BRACELET", "ITEM_NECKLACE", "ITEM_BOOTS"),
                "ITEM_POTION" => array("HEALTH", "MANA", "STAMINA", "POISON"),
                "MISC" => array("GEM")

            );

        }

    }

?>