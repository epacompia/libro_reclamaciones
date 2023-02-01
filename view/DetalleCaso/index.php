<?php
require_once("../../config/conexion.php");

if (isset($_SESSION["usu_id"])) {
?>



    <!DOCTYPE html>
    <html>

    <?php require_once("../mainHead/head.php") ?>

    <title>Dircocor - Inicio</title>

    <body class="with-side-menu">

        <?php require_once("../mainHeader/header.php") ?>

        <div class="mobile-menu-left-overlay"></div>
        <?php require_once("../mainNav/nav.php") ?>

        <div class="page-content">
            <div class="container-fluid">

                <section id="lbldetalle" class="activity-line">
                    


                </section><!--.activity-line-->

            </div><!--.container-fluid-->
        </div><!--.page-content-->

        <?php require_once("../mainJS/js.php") ?>
        <script type="text/javascript" src="detalleCaso.js"></script> <!--LLAMO AL consultarCaso.js de mi carpeta -->
    </body>

    </html>

<?php
} else {
    header("Location:" . "http://localhost/libro_reclamaciones/" . "index.php");
}
?>