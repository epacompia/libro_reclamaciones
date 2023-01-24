<?php

    require_once("../config/conexion.php");
    require_once("../models/Tipo_documento.php");
    $tipo_documento=new Tipo_documento();

    switch ($_GET["op1"]) {
        case 'combo1':
            $datos=$tipo_documento->get_tipo_documento();
            if (is_array($datos)==true and count($datos)>0) {
                foreach ($datos as $key) {
                    $html .="<option value='" . $key['tipo_docu_id'] . "'>" . $key['tipo_docu_nombre'] . "</option>";
                }
                echo $html;
            }
            break;
        
    }


?>