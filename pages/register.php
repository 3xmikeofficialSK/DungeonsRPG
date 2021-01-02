<?php 

    include_once(__LOCALESET__."/register.php");

    if(User::isLoggedIn()){

        if(isset($_GET["page"]) && $_GET["page"] == "register"){

            echo Core::redirect(__URL__);

        }
    }

?>

<div class="card">

    <div class="card-header"><?= $register["title"]; ?></div>
    <div class="card-body">
    
        <form action="<?php $PHP_SELF; ?>" method="post">
        
            <input type="text" name="username" class="form-control" placeholder="<?= $register['username']; ?>">
            <input type="password" name="password" class="form-control" placeholder="<?= $register['password']; ?>">

            <input type="submit" name="register" class="form-control" value="<?= $register['submit']; ?>">

                <?php 
                
                    if(isset($_POST["register"])){

                        echo '<p class="text-center">';

                            echo $register[User::createUser($_POST["username"], $_POST["password"])];

                        echo '</p>';
                        
                    }
                
                ?>
        
        </form>

    </div>

</div>