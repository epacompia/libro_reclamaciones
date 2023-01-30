<?php
    require_once("../config/conexion.php");
    require_once("../models/Caso.php");
    $caso = new Caso();

    switch ($_GET["op"]) {
    case 'insert':
        $caso->insertar_caso($_POST["usu_id"], $_POST["sede_id"], $_POST["caso_date"], $_POST["caso_titulo"], $_POST["caso_descripcion"]);
        break;

    case "listar_x_usu":
        $datos = $caso->listar_caso_x_usu($_POST["usu_id"]);
        $data = array();
        foreach($datos as $row){
            $sub_array = array();
            $sub_array[] = $row["caso_id"];
            $sub_array[] = $row["caso_date"];
            $sub_array[] = $row["sede_nombre"];
            $sub_array[] = $row["caso_titulo"];
            // $sub_array[] = date("d/m/Y H:i:s", strtotime($row["fecha_creacion"])); //lo omito ya que si lo pongo se mostrara en mi datatable 
            $sub_array[]='<button type="button" onClick="ver(' . $row["caso_id"] . ');" id="' . $row["caso_id"] . '" class="btn btn-inline btn-primary btn-sm ladda-buttom"><div><i class="fa fa-eye"></i></div></button>'; //CREO ESTE BOTON 
            $data[] = $sub_array;
        }

        //Para usar el DATATABLE
        $results= array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData" => $data);
        echo json_encode($results);
        break;



        case "listar":
            $datos = $caso->listar_ticket();
            $data = array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["caso_id"];
                $sub_array[] = $row["caso_date"];
                $sub_array[] = $row["sede_nombre"];
                $sub_array[] = $row["caso_titulo"];
                // $sub_array[] = date("d/m/Y H:i:s", strtotime($row["fecha_creacion"])); //lo omito ya que si lo pongo se mostrara en mi datatable 
                $sub_array[]='<button type="button" onClick="ver(' . $row["caso_id"] . ');" id="' . $row["caso_id"] . '" class="btn btn-inline btn-primary btn-sm ladda-buttom"><div><i class="fa fa-eye"></i></div></button>'; //CREO ESTE BOTON 
                $data[] = $sub_array;
            }
    
            //Para usar el DATATABLE
            $results= array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData" => $data);
            echo json_encode($results);
            break;

        
    }
?>