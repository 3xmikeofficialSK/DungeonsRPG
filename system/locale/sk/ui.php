<?php 

    $ui["title"] = "Prihlásenie";
    $ui["username"] = "Prezívka";
    $ui["password"] = "Heslo";
    $ui["remember"] = "Zapamätať si ma";
    $ui["submit"] = "Prihlásiť";
    $ui["success"] = "<span class='text-success'>Prihlásenie bolo úspešné</span>";
    $ui["wrongpass"] = "<span class='text-danger'>Zlá prezívka alebo heslo.</span>";
    $ui["exist"] = "<span class='text-danger'>Zlá prezívka alebo heslo.</span>";
    $ui["empty"] = "<span class='text-danger'>Je potrebné vyplniť všetky údaje.</span>";
    $ui["inventory"] = "Inventár";
    $ui["administration"] = "Administračná sekcia";
    $ui["logout"] = "Odhlásiť";
    $ui["previous"] = "Späť";
    $ui["next"] = "Pokračovať";
    $ui["finish"] = "Dokončiť";
    $ui["class"] = "Rasa";
    $ui["classes"] = array(
        "warrior" => "Bojovník",
        "assassin" => "Zabiják",
        "hunter" => "Lovec",
        "mage" => "Mág"
    );
    $ui["level"] = "Úroveň";
    $ui["health"] = "Zdravie";
    $ui["int"] = "Mana";
    $ui["str"] = "Sila";
    $ui["dex"] = "Stamina";
    $ui["luck"] = "Štastie";
    $ui["defense"] = "Obrana";
    $ui["carry_weight"] = "Nosnosť";
    $ui["gold"] = "Zlato";
    $ui["stat_points"] = "Body statusu";
    $ui["perk_points"] = "Body perkov";
    $ui["mount"] = "Jazdecké zviera";
    $ui["mounts"] = array(

        0 => "Žiadne",
        10 => "Prasa",
        20 => "Kôň",
        30 => "Vlk",
        40 => "Lev",
        50 => "Jednorožec",
        75 => "Drak"

    );
    $ui["admin_section"] = array(

        "items" => array(

            "title" => "Administrácia predmetov",
            "create" => array(

                "item_name" => "Názov predmetu"

            ),

        ),

    );
    $items = array(

        "item_name" => "Názov predmetu",
        "item_types" => array(

            "Vyberte si typ predmetu" => "NONE",
            "Zbraň" => "item_weapon",
            "Zbroj" => "item_armor",
            "Elixír" => "item_potion",
            "Jed" => "item_poison",
            "Iné" => "item_misc"

        ),
        "item_subtypes" => array(

            "item_weapon" => array(
                "Vyberte si subtype zbraňe" => "NONE",
                "Meč" => "item_sword",
                "Staffa" => "item_staff",
            ),
            "item_armor" => array(

                "Helma" => "item_helmet",
                "Brnenie" => "item_bodyarmor",
                "Štít" => "item_shield",
                "Náušnice" => "item_earings",
                "Náramok" => "item_bracelet",
                "Náhrdelník" => "item_necklace",
                "Boty" => "item_boots",

            ),

        ),
        "weight" => "Váha",
        "limit_types" => array(

            "Bez limitu" => "NONE",
            "Od určitého levelu" => "level",
            "Na určitý čas" => "time",

        ),
        "limit_value" => "Úroveň / Čas ( v sekundách )",
        "min_value" => "Minimálna hodnota / Armor",
        "max_value" => "Maximálna hodnota útoku",
        "apply_types" => array(

            "Bez očarovania" => "NONE",

        ),
        "apply_value" => "Hodnota očarovania",
        "socket" => "Kameň",
        "price" => "Cena predmetu"

    );

?>