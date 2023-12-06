<?php

/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
/** @var \App\Core\IAuthenticator $auth */

?>
<link rel="stylesheet" href="/public/css/recipe.add.css">
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Pridanie receptu</h5>
                    <div class="text-center text-danger mb-3">
                        <div style="color: green;">
                            <?= @$data['success'] ?>
                        </div>
                    </div>
                    <form class="form-signin" method="post" action="<?= $link->url("recipe.add") ?>">
                        <div class="form-label-group mb-3">
                            <input name="title" type="text" id="title" class="form-control" placeholder="Title"
                                   required autofocus>
                        </div>
                        <div class="input-group has-validation mb-3 ">
                            <textarea class="form-control" aria-label="With textarea" placeholder="Text" name="text" id="text"></textarea>
                        </div>
                        <div class="form-label-group mb-3">
                            <label for="categories">Vyber si kategóriu</label>
                            <select id="categories" name="categories">
                                <?php foreach ($data['categories'] as $i): ?>
                                    <option value=<?= $i?>><?= $i?></option>
                                <?php endforeach; ?>

                            </select>

                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary" type="submit" name="submit">Pridaj príspevok
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

