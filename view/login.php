<?php
if (!isset($_SESSION)) session_start();
// Verifica se não há a variável da sessão que identifica o usuário
if (isset($_SESSION['Usuid'])) {
    // Redireciona o visitante de volta pro login
    header("Location: ../administrativo/view/dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Personalize</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- Third party plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Personalize <i class="fas fa-chart-pie"></i></a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        </div>
    </nav>
    <!-- Call to action-->
    <section class="page-section bg-dark text-white">
        <div class="container text-center">
            <h2 class="mb-4">Para continuar como empresa faça login!</h2>
            <span id="msg-error"></span>
            <span id="msg"></span>
            <form id="login" method="POST" role="form">
                <div class="error-container"></div>
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Usuário</label>
                            <input class="form-control form-control-name" id="usuario" minlength="8" maxlength="16" type="text">
                        </div>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Senha</label>
                            <input class="form-control form-control-email" id="senha" minlength="8" maxlength="16" type="password">
                        </div>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
                <div class="text-right"><br>
                    <button class="btn btn-primary solid blank" type="submit">Entrar</button>
                </div>
            </form>
        </div>
    </section>
    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container">
            <div class="small text-center text-muted">Copyright © 2020 - <a href="https://www.instagram.com/clevertecc/">CLEVERTECC</a></div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <!-- Core theme JS-->
    <script src="../js/scripts.js"></script>
</body>

</html>
<script>
    $(document).ready(function() {
        $('#errolog').hide(); //Esconde o elemento com id errolog
        var teste = 0;
        $('#login').submit(function() {
            event.preventDefault();
            if ($('#usuario').val() == "") {
                //Alerta de campo email vazio
                $("#msg-error").html('<div class="alert alert-danger" role="alert">Necessário prencher o campo usuário!</div>');
            } else if ($('#senha').val() == "") {
                //Alerta de campo email vazio
                $("#msg-error").html('<div class="alert alert-danger" role="alert">Necessário prencher o campo senha!</div>');
            } else {
                //Ao submeter formulário
                var usuario = $('#usuario').val(); //Pega valor do campo email
                var senha = $('#senha').val(); //Pega valor do campo senha
                $.ajax({ //Função AJAX
                    url: "../controller/login.php", //Arquivo php
                    type: "post", //Método de envio
                    data: "usuario=" + usuario + "&senha=" + senha, //Dados
                    success: function(result) { //Sucesso no AJAX
                        if (result == 1) {
                            window.location.assign('../administrativo/view/dashboard.php')
                        } else {
                            $("#msg").html('<div class="alert alert-danger" role="alert">Usuário ou senha incorreto!</div>'); //Informa o erro
                        }
                    }
                })
                //Limpar mensagem de erro
                $("#msg-error").html('');
                return false; //Evita que a página seja atualizada
            }
        })
    })
</script>