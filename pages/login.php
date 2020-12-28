<?php
    include_once(__LOCALESET__."/ui.php");
?>


<?php 

    if(User::isLoggedIn()){

        if(isset($_GET["page"]) && $_GET["page"] == "login"){

            echo Core::redirect(__URL__);

        }

        if(Character::exist($user->getToken())){
        
?>

    <div class="card">
    
        <div class="card-header"><?= $ui["nochar"]; ?></div>
        <div class="card-body">
        
            

        </div>
    
    </div>

<?php 

        } else {

            ?>

                <div class="card">
                    
                    <div class="card-header"><?= $user->getUsername(); ?></div>
                    <div class="card-body">
                    
                        <a href="<?= __URL__."/index.php?page=logout"; ?>" class="text-center"><?= $ui["logout"]; ?></a>

                    </div>

                </div>

            <?php

        }

    } else { ?>

    <div class="card">

        <div class="card-header"><?= $ui["title"]; ?></div>
        <div class="card-body">
        
            <form action="<?php $PHP_SELF; ?>" method="post">
                
                <input type="text" name="username" class="form-control" placeholder="<?= $ui['username']; ?>">
                <input type="password" name="password" class="form-control" placeholder="<?= $ui['password']; ?>">

                <input type="submit" name="login" class="form-control" value="<?= $ui['submit']; ?>">

                    <?php 
                    
                        if(isset($_POST["login"])){

                            echo '<p class="text-center">';

                                echo $ui[User::logMeIn($_POST["username"], $_POST["password"])].Core::redirect(__ACTUAL_URL__, 1);

                            echo '</p>';
                            
                        }
                    
                    ?>
            
            </form>

        </div>

    </div>

<?php } ?>