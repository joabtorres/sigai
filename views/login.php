<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title><?php echo NAME_PROJECT ?></title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/login.css">
        <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    </head>

    <body class="text-center">
        <form class="form-signin" method="POST">
            <img class="mb-4" src="<?php echo BASE_URL ?>assets/imagens/semma-login.png" alt="" height="100">
            <h1 class="h6 font-weight-normal">Por favor, informe o usuário e senha</h1>

            <label class="sr-only" for="iuser">Usuário</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-user fa-fw"></i></div>
                </div>
                <input type="text" id="iuser" class="form-control" name="nUsuario" placeholder="Usuário" required="" autofocus="">
            </div>

            <label for="iSenha" class="sr-only">Senha</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-key fa-fw"></i></div>
                </div>
                <input type="password" id="iSenha" name="nSenha" class="form-control" placeholder="Senha" required="">
            </div>


            <?php
            if (isset($erro)) {
                echo '<p class="bg-danger pb-3 pt-3">' . $erro["msg"] . '</p>';
            }
            ?>
            <button class="btn btn-lg btn-success btn-block" type="submit" name="nSalvar"><i class="fa fa-sign-in-alt" aria-hidden="true"></i> Fazer Login</button>
            <p class="mt-5 mb-3 text-muted">&copy; Copyright 2020 <br/> <a href="http://lattes.cnpq.br/0856780614635850" target="_blank">Joab Torres Alencar</a></p>
        </form>

    </body>
</html>