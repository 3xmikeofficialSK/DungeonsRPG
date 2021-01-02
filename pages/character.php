<?php 

    include_once(__LOCALESET__."/character.php");

    if(isset($_GET["page"]) && $_GET["page"] == "character"){

        if(isset($_GET["id"]) && trim($_GET["id"]) != ""){



        } else {

            echo Core::redirect(__URL__);

        }

    } else {

        ?>

            <div class="card">
                <div class="card-header"><?= $character["title"]; ?></div>
                <div class="card-body">
                
                    <form action="<?php $PHP_SELF; ?>" method="post">
                
                        <input type="text" name="character_name" class="form-control" placeholder="<?= $character["name"]; ?>">
                        <select name="character_class" class="form-control">

                            <option disabled selected><?= $character["choose_class"]; ?></option>
                            <option value="warrior"><?= $character["class"]["warrior"]; ?></option>
                            <option value="assassin"><?= $character["class"]["assassin"]; ?></option>
                            <option value="hunter"><?= $character["class"]["hunter"]; ?></option>
                            <option value="mage"><?= $character["class"]["mage"]; ?></option>
                        
                        </select>

                        <select name="character_sex" class="form-control">

                            <option disabled selected><?= $character["choose_sex"]; ?></option>
                            <option value="male"><?= $character["sex"]["male"]; ?></option>
                            <option value="female"><?= $character["sex"]["female"]; ?></option>
                            <option value="other"><?= $character["sex"]["other"]; ?></option>
                        
                        </select>

                        <input type="submit" value="<?= $character["create"]; ?>" class="form-control" name="create_character">

                            <?php 
                            
                                if(isset($_POST["create_character"])){

                                    echo '<p class="text-center">';

                                        echo $character[Character::create($_POST["character_name"], $user->getToken(), $_POST["character_class"], $_POST["character_sex"])]."<br>".$locale["redirect"].Core::redirect(__URL__, 3);

                                    echo '</p>';

                                }
                            
                            ?>
                    
                    </form>
                
                </div>
            </div>

        <?php

    }



?>