<?php 

    if(isset($_GET["page"]) && $_GET["page"] == "change_language"){

        echo Core::redirect(__URL__);

    }

?>

<div class="card">
    <div class="card-header"><?= $locale["change_language_title"]; ?></div>
    <div class="card-body">
    
        <form action="<?php $PHP_SELF; ?>" method="post">
            <select name="change_language" id="change_language" class="form-control" onchange="this.form.submit()">
                <option value="cz" <?= $_SESSION["LOCALE_SET"] == "cz" ? "selected" : ""; ?>><?= $locale["change_language_czech"]; ?></option>
                <option value="en" <?= $_SESSION["LOCALE_SET"] == "en" ? "selected" : ""; ?>><?= $locale["change_language_english"]; ?></option>
                <option value="sk" <?= $_SESSION["LOCALE_SET"] == "sk" ? "selected" : ""; ?>><?= $locale["change_language_slovak"]; ?></option>
            </select>

            <?php 
            
                if(isset($_POST["change_language"])){

                    $_SESSION["LOCALE_SET"] = $_POST["change_language"];
                    echo Core::redirect(__ACTUAL_URL__);

                }
            
            ?>

        </form>
    
    </div>
</div>