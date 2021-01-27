<?php 

    include_once(__LOCALESET__."/ui.php");

    if(!User::isLoggedIn()){

        echo Core::redirect(__URL__);

    } else {

        if(!$user->getRights()){

            echo Core::redirect(__URL__);

        }

    }

?>

<div class="card">

    <div class="card-header"><?= $ui["admin_section"]["items"]["title"]; ?></div>

    <div class="card-body">
    
        <? 
        
            if(isset($_GET["a"]) && trim($_GET["a"]) == "create"){ 

                if(isset($_GET["item_name"]) && trim($_GET["item_name"]) != "" && isset($_GET["item_type"]) && trim($_GET["item_type"]) != ""){
            
        ?>

                <form action="<? $PHP_SELF; ?>" method="post">

                    <select name="item_subtype" class="form-control">
                    
                        <? foreach($items["item_subtypes"][$_GET["item_type"]] as $subtype => $value){ ?>

                            <option value="<?= $value; ?>"><?= $subtype; ?></option>

                        <? } ?>
                    
                    </select>

                    <input type='number' name='weight' placeholder='<?= $items["weight"]; ?>' class='form-control'>

                    <select name="limit_type0" class="form-control">
                    
                        <? foreach($items["limit_types"] as $limittype0 => $limittype0_value){ ?>

                        <option value="<?= $limittype0_value; ?>"><?= $limittype0; ?></option>

                        <? } ?>
                    
                    </select>

                    <input type='text' name='limit_value0' placeholder='<?= $items["limit_value"]; ?>' class='form-control'>

                    <select name="limit_type1" class="form-control">
                    
                        <? foreach($items["limit_types"] as $limittype1 => $limittype1_value){ ?>

                        <option value="<?= $limittype1_value; ?>"><?= $limittype1; ?></option>

                        <? } ?>
                    
                    </select>

                    <input type='text' name='limit_value1' placeholder='<?= $items["limit_value"]; ?>' class='form-control'>

                    <input type='number' name='min_value' placeholder='<?= $items["min_value"]; ?>' class='form-control'>

                    <input type='number' name='max_value' placeholder='<?= $items["max_value"]; ?>' class='form-control'>

                    <select name="apply_type0" class="form-control">
                    
                        <? foreach($items["apply_types"] as $applytype0 => $applytype0_value){ ?>

                        <option value="<?= $applytype0_value; ?>"><?= $applytype0; ?></option>

                        <? } ?>
                    
                    </select>

                    <input type='text' name='apply_value0' placeholder='<?= $items["apply_value"]; ?>' class='form-control'>

                    <select name="apply_type1" class="form-control">
                    
                        <? foreach($items["apply_types"] as $applytype1 => $applytype1_value){ ?>

                        <option value="<?= $applytype1_value; ?>"><?= $applytype1; ?></option>

                        <? } ?>
                    
                    </select>

                    <input type='text' name='apply_value1' placeholder='<?= $items["apply_value"]; ?>' class='form-control'>

                    <input type='text' name='socket0' placeholder='<?= $items["socket"]; ?>' class='form-control'>

                    <input type='text' name='socket1' placeholder='<?= $items["socket"]; ?>' class='form-control'>

                    <input type='text' name='socket2' placeholder='<?= $items["socket"]; ?>' class='form-control'>

                    <input type='number' name='price' placeholder='<?= $items["price"]; ?>' class='form-control'>

                    <input type="submit" value="<?= $ui["finish"]; ?>" name="item_create" class="form-control">

                    <? 

                        if(isset($_POST["item_create"])){ 

                            Item::createItem($_GET["item_name"], $_GET["item_type"], $_POST["item_subtype"], $_POST["weight"], $_POST["limit_type0"], $_POST["limit_value0"], $_POST["limit_type1"], $_POST["limit_value1"],$_POST["min_value"],$_POST["max_value"], $_POST["apply_type0"], $_POST["apply_value0"], $_POST["apply_type1"], $_POST["apply_value1"], $_POST["socket0"], $_POST["socket1"], $_POST["socket2"], $_POST["price"]);

                        } 

                    ?>
                
                </form>

        <? 

                } else {

        ?>

            <form action="<? $PHP_SELF; ?>" method="post">
                        
                <input type='text' name='item_name' placeholder='<?= $items["item_name"]; ?>' class='form-control'>
                <select name="item_type" class="form-control">
                
                    <? foreach($items["item_types"] as $type => $value){ ?>

                        <option value="<?= $value; ?>"><?= $type; ?></option>

                    <? } ?>
                
                </select>

                <input type="submit" name="create_weapon" value="<?= $ui["next"]; ?>" class="form-control">

                <? 
                
                    if(isset($_POST["create_weapon"])){

                        echo Core::redirect(__ACTUAL_URL__."&item_name=".$_POST["item_name"]."&item_type=".$_POST["item_type"]);

                    }
                
                ?>
            
            </form>


        <?

                }

            } 
            
        ?>

    </div>

</div>