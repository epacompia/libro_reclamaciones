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
                                <h3 id="lbl_nomidcaso"></h3>
                                <div id="lbl_estado"></div>
                                <span class="label label-pill label-primary" id="lbl_nomusuario"></span>
                                <span class="label label-pill label-default" id="lbl_fechcreacion">sdaads</span>
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
                                <label class="form-label semibold" for="sede_nombre">Sede</label>
                                <input type="text" class="form-control" id="sede_nombre" readonly>
                            </fieldset>
                        </div>

                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="caso_titulo">Título</label>
                                <input type="text" class="form-control" id="caso_titulo" name="caso_titulo" readonly>
                            </fieldset>
                        </div>

                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="casodetalle_descrip_usu">Descripción</label>
                                <div class="summernote-theme-1">
                                    <textarea class="summernote" id="casodetalle_descrip_usu" name="casodetalle_descrip_usu"></textarea>
                                </div>

                            </fieldset>
                        </div>

                    </div><!--.row-->
                </div>
                <!-- FIN DE AGREGANDO DATOS DEL TICKET ACTUAL  -->




                <section id="lbldetalle" class="activity-line">
                </section><!--.activity-line-->


                <div class="box-typical box-typical-padding">
                    <p>Ingresar su duda o consulta</p>
                    <div class="row">
                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="casodetalle_descrip">Descripción (*)</label>
                                <div class="summernote-theme-1">
                                    <textarea class="summernote" id="casodetalle_descrip" name="casodetalle_descrip"></textarea>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" name="action" value="add" class="btn btn-rounded btn-inline btn-primary">Enviar</button> <!--Le coloco un name y un value-->
                            <button type="submit" name="action" value="add" class="btn btn-rounded btn-inline btn-danger">Cerrar Ticket</button>
                        </div>

                    </div><!--.row-->

                </div>



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