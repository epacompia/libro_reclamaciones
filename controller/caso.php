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
            //$sub_array[] = $row["caso_date"];
            $sub_array[] = date("d/m/Y H:i:s", strtotime($row["caso_date"]));
            $sub_array[] = $row["sede_nombre"];
            $sub_array[] = $row["caso_titulo"];
            
            if ($row["caso_estado"]=="Abierto") {
                $sub_array[] = '<span class="label label-pill label-success">Abierto</span>';
                }else {   
                    $sub_array[] = '<span class="label label-pill label-danger">Cerrado</span>';
                }
            
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
                //$sub_array[] = $row["caso_date"];
                $sub_array[] = date("d/m/Y H:i:s", strtotime($row["caso_date"]));
                $sub_array[] = $row["sede_nombre"];
                $sub_array[] = $row["caso_titulo"];

                if ($row["caso_estado"]=="Abierto") {
                    $sub_array[] = '<span class="label label-pill label-success">Abierto</span>';
                    }else {   
                        $sub_array[] = '<span class="label label-pill label-danger">Cerrado</span>';
                    }

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

    case "listardetalle":
        $datos = $caso->listar_casodetalle_x_caso($_POST["caso_id"]);
        ?>
                <?php
                foreach ($datos as $row) {
                ?>
                    <article class="activity-line-item box-typical">
                        <div class="activity-line-date">
                            <?php echo date("d/m/Y", strtotime($row["fech_crea"])); ?>
                        </div>
                        <header class="activity-line-item-header">
                            <div class="activity-line-item-user">
                                <div class="activity-line-item-user-photo">
                                    <a href="#">
                                        <img src="../../public/img/photo-64-2.jpg" alt="">
                                    </a>
                                </div>
                                <div class="activity-line-item-user-name"><?php echo $row["usu_nombre"] . " " . $row["usu_apellido"]; ?></div>
                                <div class="activity-line-item-user-status">
                                <?php
                                    if($row["rol_id"]==1){
                                    echo 'Usuario';
                                    }else{
                                    echo 'Soporte';
                                    }                                     
                                ?>
                                </div>
                            </div>
                        </header>
                        <div class="activity-line-action-list">
                            <section class="activity-line-action">
                                <div class="time"><?php echo date("H:i:s", strtotime($row["fech_crea"])); ?></div>
                                <div class="cont">
                                    <div class="cont-in">
                                        <p><?php echo $row["casodetalle_descrip"] ?></p>
                                        <!-- <ul class="meta">
                                                    <li><a href="#">5 Comments</a></li>
                                                    <li><a href="#">5 Likes</a></li>
                                                </ul> -->
                                    </div>
                                </div>
                            </section><!--.activity-line-action-->
                            
                        </div><!--.activity-line-action-list-->
                    </article><!--.activity-line-item-->
                <?php
                }
                ?>
        <?php
    break;


    case "mostrar":
        $datos = $ticket->listar_ticket_x_id($_POST["tick_id"]);
        if(is_array($datos)==true and count($datos)>0){
            foreach($datos as $row){
                $output["caso_id"] = $row["caso_id"];
                $output["usu_id"] = $row["caso_id"];
                $output["sede_id"] = $row["caso_id"];
                $output["caso_date"] = $row["caso_id"];

                $output["caso_titulo"] = $row["caso_id"];
                $output["caso_descripcion"] = $row["caso_id"];
                if($row["caso_id"]=="Abierto"){
                    $output["caso_estado"] ='<span class="label label-pill label-success">Abierto</span>';
                }else{
                    $output["caso_estado"] ='<span class="label label-pill label-danger">Cerrado</span>';
                }

                
                $output["fecha_creacion"] = date("d/m/Y H:i:s", strtotime($row["fecha_creacion "]));

                $output["usu_nombre"] = $row["caso_id"];
                $output["usu_apellido"] = $row["caso_id"];
                $output["sede_nombre"] = $row["caso_id"];
            }
        }
        
        
        break;



    }
?>