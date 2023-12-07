<?php

/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
/** @var \App\Core\IAuthenticator $auth */



?>

<link rel="stylesheet" href="/public/css/videoRecipes.css">

<?php if ($auth->isLogged()) { ?>
    <h1 class="">Skuska javasriptu</h1>
    <div id="table-container"></div>
<?php } else { ?>
    <h1>Pre zobrazenie sa prihláste</h1>
<?php } ?>

<script src="/public/js/script.js"></script>
