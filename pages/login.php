<?php
    include_once(__LOCALESET__."/ui.php");
?>


<?php 

    if(User::isLoggedIn()){

        if(isset($_GET["page"]) && $_GET["page"] == "login"){

            echo Core::redirect(__URL__);

        }

        if(Character::exist($user->getToken())){

            $char = new Character(User::getUserToken());
        
?>

    <div class="card">
    
        <div class="card-header <?= $char->getSex(); ?>"><?= $char->getName(); ?></div>
        <div class="card-body">

            <div class="row">

                <!-- Class -->
                <div class="stat">

                    <div class="row">
                    
                        <div class="col-6"><?= $ui["class"]; ?></div>
                        <div class="col-6 text-right font-italic"><?= $ui["classes"][$char->getClass()]; ?></div>

                    </div>

                </div>

                <!-- Level -->
                <div class="stat">

                    <div class="row">
                    
                        <div class="col-6"><?= $ui["level"]; ?></div>
                        <div class="col-6 text-right font-italic"><?= $char->getLevel(); ?></div>

                    </div>

                </div>

                <div class="stat">
                    <div class="col-12 text-center text-danger"><?= $ui["health"]; ?></div>
                    <div class="col-12 text-center font-italic"><?= $char->getHp()." / ".$char->getMax_hp(); ?></div>
                </div>

                <div class="stat">
                    <div class="col-12 text-center text-primary"><?= $ui["int"]; ?></div>
                    <div class="col-12 text-center font-italic"><?= $char->getInt()." / ".$char->getMax_int(); ?></div>
                </div>

                <div class="stat">
                    <div class="col-12 text-center text-success"><?= $ui["dex"]; ?></div>
                    <div class="col-12 text-center font-italic"><?= $char->getDex()." / ".$char->getMax_dex(); ?></div>
                </div>

                <div class="stat">
                    <div class="col-12 text-center text-warning"><?= $ui["str"]; ?></div>
                    <div class="col-12 text-center font-italic"><?= $char->getStr(); ?></div>
                </div>

                <div class="stat">
                    <div class="col-12 text-center text-warning"><?= $ui["luck"]; ?></div>
                    <div class="col-12 text-center font-italic"><?= $char->getLuck(); ?></div>
                </div>

                <div class="stat">
                    <div class="col-12 text-center text-warning"><?= $ui["defense"]; ?></div>
                    <div class="col-12 text-center font-italic"><?= $char->getDefense(); ?></div>
                </div>

                <div class="stat">
                    <div class="col-12 text-center text-info"><?= $ui["carry_weight"]; ?></div>
                    <div class="col-12 text-center font-italic"><?= ceil($char->getCurrWeight())." / ".$char->getWeight(); ?></div>
                </div>

                <!-- Zlato -->
                <div class="stat">

                    <div class="row">
                    
                        <div class="col-6"><?= $ui["gold"]; ?></div>
                        <div class="col-6 text-right font-italic"><?= number_format($char->getGold(), null, ".", ","); ?></div>

                    </div>

                </div>

                <!-- Stat points -->
                <div class="stat">

                    <div class="row">
                    
                        <div class="col-6"><?= $ui["stat_points"]; ?></div>
                        <div class="col-6 text-right font-italic"><?= $char->getStat_points(); ?></div>

                    </div>

                </div>

                <!-- Perk points -->
                <div class="stat">

                    <div class="row">
                    
                        <div class="col-6"><?= $ui["perk_points"]; ?></div>
                        <div class="col-6 text-right font-italic"><?= $char->getPerk_points(); ?></div>

                    </div>

                </div>

                <!-- Perk points -->
                <div class="stat mb-3">

                    <div class="row">
                    
                        <div class="col-6"><?= $ui["mount"]; ?></div>
                        <div class="col-6 text-right font-italic"><?= $ui["mounts"][$char->getMount()]; ?></div>

                    </div>

                </div>

                <div class="col-12 text-center">
                
                    <a href="<?= __URL__."/index.php?page=inventory"; ?>"><?= $ui["inventory"]; ?></a>

                </div>

                <? if($user->getRights() == 1){ ?>
                    <div class="col-12 text-center">
                    
                        <a href="<?= __URL__."/admin/index.php"; ?>"><?= $ui["administration"]; ?></a>

                    </div>
                <? } ?>

                <div class="col-12 text-center">
                
                    <a href="<?= __URL__."/index.php?page=logout"; ?>"><?= $ui["logout"]; ?></a>

                </div>

            </div>

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

                <div class="text-left mb-2">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember"><?= $ui["remember"]; ?></label></div>

                <input type="submit" name="login" class="form-control" value="<?= $ui['submit']; ?>">

                    <?php 
                    
                        if(isset($_POST["login"])){

                            echo '<p class="text-center">';

                                if(isset($_POST["remember"])){

                                    echo $ui[User::logMeIn($_POST["username"], $_POST["password"], $_POST["remember"])].Core::redirect(__ACTUAL_URL__, 1);

                                } else {

                                    echo $ui[User::logMeIn($_POST["username"], $_POST["password"])].Core::redirect(__ACTUAL_URL__, 1);

                                }

                            echo '</p>';
                            
                        }
                    
                    ?>
            
            </form>

        </div>

    </div>

<?php } ?>