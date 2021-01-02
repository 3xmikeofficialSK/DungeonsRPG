<?php 

    include_once(__LOCALESET__."/navigation.php");

    if(isset($_GET["page"]) && trim($_GET["page"]) == "navigation"){

        echo Core::redirect(__URL__);

    }

?>

<div class="card">

    <div class="card-header"><?= $navigation["title"]; ?></div>

    <div class="card-body">
    
        <ul class="main-nav row">

            <li class="main-list">
            
                <a href="javascript:void(0)" class="main-link"><?= $navigation["work"]; ?></a>

            </li>

            <li class="main-list">
            
                <a href="javascript:void(0)" class="main-link"><?= $navigation["tavern"]; ?></a>

            </li>

            <li class="main-list">
            
                <a href="javascript:void(0)" class="main-link"><?= $navigation["arena"]; ?></a>

            </li>

            <li class="main-list">
            
                <a href="javascript:void(0)" class="main-link"><?= $navigation["shop"]; ?></a>
                
                <ul class="sub-nav">
                
                    <li class="sub-list">
                        <a href="<?php echo __URL__."/index.php?page=market&id=weapons"?>" class="sub-link"><?= $navigation["shops"]["weapons"]; ?></a>
                    </li>
                    <li class="sub-list">
                        <a href="<?php echo __URL__."/index.php?page=market&id=armors"?>" class="sub-link"><?= $navigation["shops"]["armors"]; ?></a>
                    </li>
                    <li class="sub-list">
                        <a href="<?php echo __URL__."/index.php?page=market&id=alchymist"?>" class="sub-link"><?= $navigation["shops"]["alchymist"]; ?></a>
                    </li>
                    <li class="sub-list">
                        <a href="<?php echo __URL__."/index.php?page=market&id=enchanter"?>" class="sub-link"><?= $navigation["shops"]["enchanter"]; ?></a>
                    </li>
                    <li class="sub-list">
                        <a href="<?php echo __URL__."/index.php?page=market&id=forge"?>" class="sub-link"><?= $navigation["shops"]["forge"]; ?></a>
                    </li>
                    <li class="sub-list">
                        <a href="<?php echo __URL__."/index.php?page=market&id=stables"?>" class="sub-link"><?= $navigation["shops"]["stables"]; ?></a>
                    </li>
                    
                </ul>
                
            </li>

            <li class="main-list">
            
                <a href="javascript:void(0)" class="main-link"><?= $navigation["fortress"]; ?></a>

            </li>

        </ul>
    
    </div>

</div>