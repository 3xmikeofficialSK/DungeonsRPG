<?php 

    if(isset($_GET["page"]) && $_GET["page"] == "menu"){

        echo Core::redirect(__URL__);

    }

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="collapse navbar-collapse" id="navbarNav">

    <ul class="navbar-nav">
    
      <li class="nav-item <?= isset($_GET["page"]) ? "" : "active"; ?>">
        <a class="nav-link <?= isset($_GET["page"]) ? "" : "active"; ?>" href="<?= __URL__; ?>">Domov</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>

    </ul>

  </div>

</nav>