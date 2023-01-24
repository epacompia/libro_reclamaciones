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
								<h3>Nuevo Caso</h3>
								<ol class="breadcrumb breadcrumb-simple">
									<li><a href="#">Inicio</a></li>
									<li class="active">Nuevo Caso</li>
								</ol>
							</div>
						</div>
					</div>
				</header>

				<div class="box-typical box-typical-padding">
					<p>
						Desde esta ventana podra generar nuevos casos.
					</p>
					<h5 class="m-t-lg with-border">Ingresar información</h5>
					<form action="" method="POST" id="caso_form">

						<input type="hidden" id="usu_id" name="usu_id" value="<?php echo $_SESSION["usu_id"] ?>">
						<div class="row">

							<div class="col-lg-4">
								<fieldset class="form-group">
									<label class="form-label semibold" for="caso_date">Fecha (*)</label>
									<input type="date" class="form-control" id="caso_date" name="caso_date" placeholder="Ingrese el título">
								</fieldset>
							</div>

							<div class="col-lg-4">
								<fieldset class="form-group">
									<label class="form-label semibold" for="caso_time">Hora (*)</label>
									<input type="time" class="form-control" id="caso_time" name="caso_time" placeholder="Ingrese el título">
								</fieldset>
							</div>

							<div class="col-lg-4">
								<fieldset class="form-group">
									<label class="form-label semibold" for="sede_id">Sede (*)</label>
									<select name="sede_id"  id="sede_id" class="form-control"></select>
								</fieldset>
							</div>


							<!-- INICIO CAMPOS DE USUARIO -->
							<!-- <div class="col-lg-6">
								<fieldset class="form-group">
									<label class="form-label semibold" for="usu_nom">Nombres (*)</label>
									<input type="text" class="form-control" id="usu_nombre" name="usu_nom" placeholder="Ingrese el nombre">
								</fieldset>
							</div>
							<div class="col-lg-6">
								<fieldset class="form-group">
									<label class="form-label semibold" for="usu_apellido">Apellidos (*)</label>
									<input type="text" class="form-control" id="usu_ape" name="usu_ape" placeholder="Ingrese los apellidos">
								</fieldset>
							</div>
					
							<div class="col-lg-6">
								<fieldset class="form-group">
									<label class="form-label semibold" for="tipo_docu_id">Tipo de documento (*)</label>
									<select name="tipo_docu_id"  id="tipo_docu_id" class="form-control"></select>
								</fieldset>
							</div>
							<div class="col-lg-6">
								<fieldset class="form-group">
									<label class="form-label semibold" for="usu_numero_documento">Número de documento (*)</label>
									<input type="text" class="form-control" id="usu_numero_documento" name="usu_numero_documento" placeholder="Ingrese su documento">
								</fieldset>
							</div> -->
							<!--FIN  CAMPOS DE USUARIO -->


							<div class="col-lg-12">
								<fieldset class="form-group">
									<label class="form-label semibold" for="caso_titulo">Título (*)</label>
									<input type="text" class="form-control" id="caso_titulo" name="caso_titulo" placeholder="Ingrese el título">
								</fieldset>
							</div>				

							<div class="col-lg-12">
								<fieldset class="form-group">
									<label class="form-label semibold" for="caso_descripcion">Descripción (*)</label>
									<div class="summernote-theme-1">
										<textarea class="summernote" name="name" id="caso_descripcion" name="caso_descripcion"></textarea>
									</div>
								</fieldset>
							</div>
							<div class="col-lg-12">
								<button type="submit" name="action" value="add" class="btn btn-rounded btn-inline btn-primary">Guardar</button> <!--Le coloco un name y un value-->
							</div>
						</div><!--.row-->
					</form>
				</div>
			</div><!--.container-fluid-->
		</div><!--.page-content-->

		<?php require_once("../mainJS/js.php") ?>
		<script type="text/javascript" src="nuevoCaso.js"></script> <!--LLAMO AL home.js de mi carpeta -->
	</body>

	</html>

<?php
} else {
	header("Location:" . "http://localhost/libro_reclamaciones/" . "index.php");
}
?>