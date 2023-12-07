<?php

/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Models\Recipe $i */
?>


<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php foreach ($data as $i): ?>
                <div class="card">
                    <img class="card-img-top"
                         src="<?= $i->getPicture() ?>"
                         alt="Recept">
                    <div class="card-body">
                        <a class="card-ref" href="#">
                            <h5 class="card-title"><?= $i->getTitle() ?>
                            </h5>
                        </a>
                        <p class="card-text"><?= $i->getText() ?>.</p>
                        <a href="#" class="btn btn-primary">Prečítať viac</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

