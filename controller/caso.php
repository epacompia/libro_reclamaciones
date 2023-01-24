<?php
    require_once("../config/conexion.php");
    require_once("../models/Caso.php");
    $caso = new Caso();

    switch ($_GET["op"]) {
    case 'insert':
        $caso->insertar_caso($_POST["usu_id"], $_POST["sede_id"], $_POST["caso_date"], $_POST["caso_time"], $_POST["caso_titulo"], $_POST["caso_descripcion"]);
        break;
        
    }
?>