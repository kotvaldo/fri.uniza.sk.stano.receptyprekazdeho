<?php
$layout = 'profile';

/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
/** @var \App\Core\IAuthenticator $auth */

?>
<link rel="stylesheet" href="/public/css/profile.index.css">
<div class="container text-center mt-5">
    <img src="<?= $data['user']->getPicture() ?>" alt="Profile Image" class="rounded-circle"
         style="width: 100px; height: 100px; object-fit: cover;">
    <h4 class="mt-3"><?= $auth->getLoggedUserName() ?></h4>
    <span class="mt-3"><?= $data['user']->getEmail() ?></span>
    <hr class="my-4">


    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
            <div class="card-body">
                <h5 class="card-title text-center">Zmena emailu</h5>
                <div class="text-center text-danger mb-3">
                    <?= @$data['message'] ?>
                    <div style="color: green;">
                        <?= @$data['success'] ?>
                    </div>
                </div>
                <form class="form-signin" method="post" action="<?= $link->url("") ?>">
                    <div class="form-label-group mb-3">
                        <input name="email" type="text" id="email" class="form-control" placeholder="New E-mail"
                               required>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit" name="submit">Save Changes
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
            <div class="card-body">
                <h5 class="card-title text-center">Zmena hesla</h5>
                <div class="text-center text-danger mb-3">
                    <?= @$data['message'] ?>
                    <div style="color: green;">
                        <?= @$data['success'] ?>
                    </div>
                </div>
                <form class="form-signin" method="post" action="<?= $link->url("") ?>">
                    <div class="form-label-group mb-3">
                        <input name="password" type="text" id="password" class="form-control"
                               placeholder="Old password"
                               required>
                    </div>
                    <div class="form-label-group mb-3">
                        <input name="new_password" type="text" id="new_password" class="form-control"
                               placeholder="New password"
                               required>
                    </div>
                    <div class="form-label-group mb-3">
                        <input name="password_retype" type="password" id="password_retype" class="form-control"
                               placeholder="Retype password" required>
                    </div>

                    <button type="submit" class="btn btn-success">Save Changes</button>
                </form>

            </div>
        </div>
    </div>
</div>
