<?php
    require_once("config/conexion.php");

    if (isset($_POST["enviar"]) and $_POST["enviar"] =="si") {
        require_once("models/Usuario.php");
        $usuario = new Usuario();
        $usuario->login();
    }
?>



<!DOCTYPE html>
<html>

<head lang="es">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dircocor - Libro de reclamaciones</title>

    <link href="public/img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="public/img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="public/img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="public/img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="public/img/favicon.png" rel="icon" type="image/png">
    <link href="public/img/favicon.ico" rel="shortcut icon">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    <link rel="stylesheet" href="public/css/separate/pages/login.min.css">
    <link rel="stylesheet" href="public/css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/main.css">
</head>

<body>

    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">


              

                <form class="sign-box" action="" method="POST" id="login_form">
              
                    <input type="hidden" id="rol_id" name="rol_id" value="1">  <!--ESTO ES PARA DIFERENCIAR EL ROL ID  sera 1 para usuario y 2 para soporte-->

                    
                    <div class="sign-avatar">
                        <img src="public/img/avatar-sign.png" alt="">
                    </div>
                    <header class="sign-title" id="lbltitulo">Acceso Usuario</header>

                    <!-- VALIDACION PREVIA PARA MOSTRAR ERRORES DE LOS CAMPOS DE LOGIN -->
                    <?php
                        if (isset($_GET["m"])) {
                            switch ($_GET["m"]) {
                                case '1':
                                    ?>
                                    <div class="alert alert-success alert-fill alert-close alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        El usuario y/o la contraseña son incorrectos
                                    </div>

                                    <?php
                                    break;
                                    case '2':
                                        ?>
                                        <div class="alert alert-success alert-fill alert-close alert-dismissible fade in" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            Los campos estan vacios
                                        </div>
    
                                        <?php
                                        break;
                                
                            }
                        }
                        
                    ?>

                    <div class="form-group">
                        <input type="text" class="form-control" id="usu_correo" name="usu_correo" placeholder="Correo electronico" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="usu_password" name="usu_password" placeholder="Contraseña" />
                    </div>
                    <div class="form-group">
                        <!-- <div class="checkbox float-left">
                            <input type="checkbox" id="signed-in" />
                            <label for="signed-in">Keep me signed in</label>
                        </div> -->
                        <div class="float-right reset">
                            <a href="reset-password.html">Cambiar contraseña</a>
                        </div>
                        <div class="float-left reset">
                            <a href="#" id="btnsoporte">Acceso Soporte</a>
                        </div>
                    </div>
                    <input type="hidden" name="enviar" value="si">
                    <button type="submit" class="btn btn-rounded">Ingresar</button>
                    <!-- <p class="sign-note">New to our website? <a href="sign-up.html">Sign up</a></p> -->
                    <!--<button type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>-->
                </form>
            </div>
        </div>
    </div><!--.page-center-->


    <script src="public/js/lib/jquery/jquery.min.js"></script>
    <script src="public/js/lib/tether/tether.min.js"></script>
    <script src="public/js/lib/bootstrap/bootstrap.min.js"></script>
    <script src="public/js/plugins.js"></script>
    <script type="text/javascript" src="public/js/lib/match-height/jquery.matchHeight.min.js"></script>
    <script>
        $(function() {
            $('.page-center').matchHeight({
                target: $('html')
            });

            $(window).resize(function() {
                setTimeout(function() {
                    $('.page-center').matchHeight({
                        remove: true
                    });
                    $('.page-center').matchHeight({
                        target: $('html')
                    });
                }, 100);
            });
        });
    </script>
    <script src="public/js/app.js"></script>
    <script src="index.js"></script>
</body>

</html>