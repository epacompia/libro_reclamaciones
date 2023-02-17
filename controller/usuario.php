<?php

    require_once("../config/conexion.php");
    require_once("../models/Usuario.php");
    $usuario = new Usuario();

    switch ($_GET["op"]) {
        case "guardaryeditar":
               if (empty($_POST["usu_id"])) {
                   if(is_array($datos)==true and count($datos)==0){
                       $usuario->insert_usuario($_POST["usu_nombre"],$_POST["usu_apellido"],$_POST["usu_correo"],$_POST["usu_password"],$_POST["rol_id"],$_POST["usu_celular"],$_POST["usu_tipo_documento"],$_POST["usu_numero_documento"],$_POST["fech_nacimiento"]);
                   }
               }else{
                   $usuario->update_usuario($_POST["usu_id"],$_POST["usu_nombre"],$_POST["usu_apellido"],$_POST["usu_correo"],$_POST["usu_password"],$_POST["rol_id"],$_POST["usu_celular"],$_POST["usu_tipo_documento"],$_POST["usu_numero_documento"],$_POST["fech_nacimiento"]);
               }
               break;

        case "listar":
            $datos = $usuario->get_usuario();
            $data = array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["usu_nombre"];
                $sub_array[] = $row["usu_apellido"];
                $sub_array[] = $row["usu_correo"];
                $sub_array[] = $row["usu_password"];
                $sub_array[] = $row["usu_celular"];

                //PARA MOSTRARS EL ROL DE EL USUARI
                if ($row["usu_rol"]==1) {
                    $sub_array[]='<span class="label label-pill label-primary">Usuario</span>';
                }else{
                    $sub_array[]='<span class="label label-pill label-primary">Soporte</span>';
                }

                // $sub_array[] = date("d/m/Y H:i:s", strtotime($row["fecha_creacion"])); //lo omito ya que si lo pongo se mostrara en mi datatable 
                $sub_array[]='<button type="button" onClick="editar(' . $row["usu_id"] . ');" id="' . $row["usu_id"] . '" class="btn btn-inline btn-warning btn-sm ladda-buttom"><div><i class="fa fa-edit"></i></div></button>'; //CREO ESTE BOTON 
                $sub_array[]='<button type="button" onClick="eliminar(' . $row["usu_id"] . ');" id="' . $row["usu_id"] . '" class="btn btn-inline btn-danger btn-sm ladda-buttom"><div><i class="fa fa-trash"></i></div></button>';
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

        case 'eliminar':
            $usuario->delete_usuario($_POST["usu_id"]);
            break;
        
        case "mostrar":
            $datos = $usuario->get_usuario_x_id($_POST["usu_id"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row){
                        $output["usu_id"] = $row["usu_id"];
                        $output["usu_nombre"] = $row["usu_nombre"];                        
                        $output["usu_apellido"] = $row["usu_apellido"];
                        $output["usu_correo"] = $row["usu_correo"];
                        $output["usu_celular"] = $row["usu_celular"];
                    }
        
                    echo json_encode($output);
                }
                
                
            break;
    }

?>