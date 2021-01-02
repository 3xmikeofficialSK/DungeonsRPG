<?php 

    include_once(__LOCALESET__."/market.php");

    if(!User::isLoggedIn()){

        if(isset($_GET["page"]) && $_GET["page"] == "market"){

            echo Core::redirect(__URL__);

        }

    } else {

        if(isset($_GET["page"]) && $_GET["page"] == "market"){

            if(isset($_GET["id"]) && trim($_GET["id"]) == "weapons"){
            } elseif(isset($_GET["id"]) && trim($_GET["id"]) == "armors"){
            } elseif(isset($_GET["id"]) && trim($_GET["id"]) == "alchymist"){
            } elseif(isset($_GET["id"]) && trim($_GET["id"]) == "enchanter"){
            } elseif(isset($_GET["id"]) && trim($_GET["id"]) == "forge"){
            } elseif(isset($_GET["id"]) && trim($_GET["id"]) == "stables"){
                
                ?>

                    <div class="card">
                        <div class="card-header"><?= $market["titles"][$_GET["id"]] ?></div>
                        <div class="card-body">

                            <form action="<?php $PHP_SELF; ?>" method="post">

                                <p class="text-center mb-3"><?= $market["descriptions"][$_GET["id"]]; ?></p>

                                <select name="mounts" class="form-control">

                                    <option selected disabled><?= $market[$_GET["id"]]["choose_mount"]; ?></option>
                                    <option value="10" <?= $char->getMount() == 10 ? "selected" : ""; ?>><?= $market[$_GET["id"]]["mounts"][10]; ?></option>
                                    <option value="20" <?= $char->getMount() == 20 ? "selected" : ""; ?>><?= $market[$_GET["id"]]["mounts"][20]; ?></option>
                                    <option value="30" <?= $char->getMount() == 30 ? "selected" : ""; ?>><?= $market[$_GET["id"]]["mounts"][30]; ?></option>
                                    <option value="40" <?= $char->getMount() == 40 ? "selected" : ""; ?>><?= $market[$_GET["id"]]["mounts"][40]; ?></option>
                                    <option value="50" <?= $char->getMount() == 50 ? "selected" : ""; ?>><?= $market[$_GET["id"]]["mounts"][50]; ?></option>
                                    <option value="75" <?= $char->getMount() == 75 ? "selected" : ""; ?>><?= $market[$_GET["id"]]["mounts"][75]; ?></option>

                                    <input type="submit" name="buy_mount" value="<?= $market["buy"]; ?>" class="form-control">

                                </select>

                                <?php 
                                
                                    if(isset($_POST["buy_mount"])){

                                        if(isset($_POST["mounts"]) && trim($_POST["mounts"]) != ""){

                                            echo "<p class='text-center font-italic'>".$market["stables"][$char->buyMount($_POST["mounts"], $user->getToken())]."</p>".Core::refresh(3);

                                        } else {

                                            echo "<p class='text-center font-italic'>".$market["stables"]['empty']."</p>";
                                        }

                                    }
                                
                                ?>
                            
                            </form>
                        
                        </div>
                    </div>

                <?

            } else {

                echo Core::redirect(__URL__);

            }
            
        }

    }

?>