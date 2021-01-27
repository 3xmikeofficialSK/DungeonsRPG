<?php 

    include_once(__LOCALESET__."/inventory.php");

    if(!User::isLoggedIn()){

        echo Core::redirect(__URL__);

    } else {

        if(!Character::exist($user->getToken())){
            
            echo Core::redirect(__URL__);

        }

    }

?>

<div class="card">

    <div class="card-header"><?= $inventory["title"]; ?></div>

    <div class="card-body">
    
        <?

            foreach($char->getInventory() as $item){

                echo $item["id"].". ".$locale["items"][$item["locale_name"]]."</br>";

            }
        
        ?>

    </div>

</div>