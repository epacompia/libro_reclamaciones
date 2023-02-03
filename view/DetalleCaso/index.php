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
                <header class="section-header">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <h3>Detalle Caso - 1</h3>
                                <span class="label label-pill label-danger">Cerrado</span>
                                <span class="label label-pill label-primary">Nombre del usuario</span>
                                <span class="label label-pill label-default">Fecha de creacion</span>
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="#">Inicio</a></li>
                                    <li class="active">Detalle caso</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- AGREGANDO DATOS DEL CASO ACTUAL  -->
                <div class="box-typical box-typical-padding">
                    <div class="row">
                        
                                <div class="col-lg-6">
                                    <fieldset class="form-group">
                                        <label class="form-label semibold" for="cat_nom">Categoria</label>
                                        <input type="text" class="form-control" id="cat_nom"  readonly>
                                    </fieldset>
                                </div>

                                <div class="col-lg-6">
                                    <fieldset class="form-group">
                                        <label class="form-label semibold" for="tick_titulo">Título</label>
                                        <input type="text" class="form-control" id="tick_titulo" name="tick_titulo" raedonly>
                                    </fieldset>
                                </div>
                                
                                <div class="col-lg-12">
                                    <fieldset class="form-group">
                                        <label class="form-label semibold" for="tick_descrip">Descripción</label>
                                        <input type="text" class="form-control" id="tick_descrip" name="tick_descrip" >
                                        
                                    </fieldset>
                                </div>
                                
                    </div><!--.row-->
                </div>
                    <!-- FIN DE AGREGANDO DATOS DEL TICKET ACTUAL  -->




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