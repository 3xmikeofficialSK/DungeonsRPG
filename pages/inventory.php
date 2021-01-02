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

    <div class="card-header"></div>

</div>