<?php

/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <title><?= \App\Config\Configuration::APP_NAME ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/public/css/root.layout.css">
    <script src="/public/js/script.js"></script>
</head>
<body>
<header>
    <div class="hesita-top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pull-right">
                    <a href="https://www.facebook.com" class="f-link">
                        <span>f</span>
                    </a>
                    <a href="https://www.instagram.com" class="f-link">
                        <img src="/public/images/instagram.svg" alt="Instagram">
                    </a>
                </div>


            </div>
        </div>
    </div>
</header>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <nav class="navbar">
            <div class="container">
                <a class="navbar-brand" href="<?= $link -> url("home.index")?>">
                    <img class="navbar menu-img" src="/public/images/kuchar.png" alt="Bootstrap">
                </a>
            </div>

        </nav>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item left-items">
                    <a class="nav-link" href="<?= $link ->url("home.recipes") ?>">Recepty</a>
                </li>
                <li class="nav-item left-items">
                    <a class="nav-link" href="<?= $link ->url("home.videoRecipes")?>">Video-recepty</a>
                </li>
                <li class="nav-item left-items">
                    <a class="nav-link" href="<?= $link ->url("home.about")?>">O nás</a>
                </li>
            </ul>
            <?php if ($auth->isLogged()) { ?>
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="nav-item right-items">
                        <a href="#">
                            <span class="navbar-text">Prihlásený používateľ: <b><?= $auth->getLoggedUserName() ?></b></span>
                        </a>
                    </li>

                    <li class="nav-item right-items">
                        <a class="nav-link" href="<?= $link ->url("auth.logout")?>">Odhlásiť sa</a>
                    </li>
                </ul>
            <?php } else { ?>
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="nav-item right-items">
                        <a class="nav-link" href="<?= $link ->url("auth.login")?>">Prihlásiť sa</a>
                    </li>
                    <li class="nav-item right-items">
                        <a class="nav-link" href="#">Registrovať sa</a>
                    </li>
                </ul>
            <?php } ?>

        </div>

    </div>
</nav>
<div class="container-fluid mt-3">
    <div class="web-content">
        <?= $contentHTML ?>
    </div>
</div>
<footer>
    <div class="social">
        <a href="https://www.instagram.com"><i class="bi bi-instagram"></i></a>
        <a href="https://www.facebook.com"><i class="bi bi-facebook"></i></a>
    </div>
    <ul class="list">
        <li>
            <a href="<?= $link -> url("home.index")?>">Domov</a>
        </li>
        <li>
            <a href="#">Prihlásenie</a>
        </li>
        <li>
            <a href="#">O nás</a>
        </li>
        <li>
            <a href="#">Pravidlá</a>
        </li>
        <li>
            <a href="#">Súkromie</a>
        </li>
    </ul>
    <p class="copyright">Recepty pre každého @ 2023</p>
</footer>

</body>
</html>
