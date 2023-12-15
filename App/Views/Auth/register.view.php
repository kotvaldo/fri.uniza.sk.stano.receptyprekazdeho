<?php


/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
?>

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Registrácia</h5>
                    <div class="text-center text-danger mb-3">
                        <span id="messageError" class="error-message"><?= @$data['message'] ?></span>
                        <div style="color: green;">
                            <span id="messageSuccess" class="success-message"><?= @$data['success'] ?></span>
                        </div>
                    </div>
                    <form class="form-signin" method="post" action="<?= $link->url("auth.register") ?>"
                          onsubmit="return validateForm()" >
                        <div class="form-label-group mb-3">
                            <input name="login" type="text" id="login" class="form-control" placeholder="Login"
                                   required autofocus autocomplete="off">
                        </div>
                        <div class="form-label-group mb-3">
                            <input name="email" type="email" id="email" class="form-control" placeholder="E-mail"
                                   required autofocus autocomplete="off">
                        </div>

                        <div class="form-label-group mb-3">
                            <input name="password" type="password" id="password" class="form-control"
                                   placeholder="Password" required autocomplete="off">
                        </div>

                        <div class="form-label-group mb-3">
                            <input name="password_retype" type="password" id="password_retype" class="form-control"
                                   placeholder="Retype password" required autocomplete="off">
                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary" type="submit" name="submit">Registrovať
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function validateForm() {
        let password = document.getElementById("password").value;
        let retype_password = document.getElementById("password_retype");
        let error = document.getElementById("messageError");
        let email = document.getElementById("email");
        let login = document.getElementById("login");


        if (!isValidPassword(password)) {
            error.innerHTML = "Heslo musí obsahovať aspoň 7 znakov, jedno číslo a jedno veľké písmeno";
            return false;
        }

        if (!password.equals(retype_password)) {
            error.innerHTML = "Heslá sa nezhodujú";
            return false;
        }

        if (!isValidEmail(email)) {
            error.innerHTML = "Bol zadany neplatny Email";
            return false;
        }

        if(!isValidLogin(login)) {
            error.innerHTML = "Login ma menej ako 3 znakov."

        }
        else {
            error.innerHTML = "";
            return true;
        }



        function isValidPassword(password) {
            let regex = /^(?=.*\d)(?=.*[A-Z]).{7,}$/;
            return regex.test(password);
        }

        function isValidEmail(email) {
            let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return regex.test(email);
        }

        function isValidLogin(login) {
            return login.size >= 3;

        }

    }


</script>