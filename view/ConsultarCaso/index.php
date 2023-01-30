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
								<h3>Consulta de casos</h3>
								<ol class="breadcrumb breadcrumb-simple">
									<li><a href="#">Inicio</a></li>
									<li class="active">Lista de Casos</li>
								</ol>
							</div>
						</div>
					</div>
				</header>

				<div class="box-typical box-typical-padding">
				<table id="caso_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
						<thead>
							<tr>
								<th style="width: 10%;">N° Caso</th>
								<th style="width: 15%;">Fecha y Hora del incidente</th>
								<th style="width: 15%;">Sede</th>
								<th class="d-none d-sm-table-cell" style="width: 25%;">Titulo</th>
								<th class="d-none d-sm-table-cell" style="width: 5%;">Estado</th>
								<th class="text-center" style="width: 15%;"></th>
								
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div><!--.container-fluid-->
		</div><!--.page-content-->

		<?php require_once("../mainJS/js.php") ?>
		<script type="text/javascript" src="consultarCaso.js"></script> <!--LLAMO AL consultarCaso.js de mi carpeta -->
	</body>

	</html>

<?php
} else {
	header("Location:" . "http://localhost/libro_reclamaciones/" . "index.php");
}
?>