<?php

    require_once("../config/conexion.php");
    require_once("../models/Sede.php");
    $sede = new Sede();

    switch ($_GET["op"]) {
    case "combo":
        $datos = $sede->get_sede();
        if (is_array($datos)==true and count($datos)>0) {
            foreach ($datos as $key) {
                $html .= "<option value='" . $key['sede_id'] . "'>" . $key['sede_nombre'] . "</option>";
            }
            echo $html;
        }
            break;
        
    }

?>