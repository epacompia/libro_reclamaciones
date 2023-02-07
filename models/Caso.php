<?php

    class Caso extends Conectar{

        public function insertar_caso($usu_id,$sede_id,$caso_date,$caso_titulo,$caso_descripcion){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO caso(caso_id,usu_id,sede_id,caso_date,caso_titulo,caso_descripcion,caso_estado,fecha_creacion,flag) VALUES (NULL,?,?,?,?,?,?,'Abierto',now(),1);";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->bindValue(2, $sede_id);
            $sql->bindValue(3, $caso_date);
            // $sql->bindValue(4, $caso_time);
            $sql->bindValue(4, $caso_titulo);
            $sql->bindValue(5, $caso_descripcion);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        //FUNCION PARA QUE CADA USUARIO VEA SU CASO POR SU ID
        public function listar_caso_x_usu($usu_id){
            $conectar = parent::conexion();
            $sql = "SELECT 
            caso.caso_id,
            caso.usu_id,
            caso.sede_id,
            caso.caso_date,
            caso.caso_titulo,
            caso.caso_descripcion,
            caso.caso_estado,
            caso.fecha_creacion, /*agrego este campo para saber cuando se creo el ticket ojo no es lo mismo que saber cuando sucedio el incidente del reclamo*/
            usuario.usu_nombre,
            usuario.usu_apellido,
            sede.sede_nombre
            FROM caso 
            INNER JOIN sede ON caso.sede_id=sede.sede_id
            INNER JOIN usuario on caso.usu_id=usuario.usu_id
            WHERE caso.flag=1
            AND usuario.usu_id=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }


        //ESTA FUNCION ME LISTA LOS TICKET PARA Q LO VEA EL PEROSNAL DE SOPORTE
        public function listar_ticket(){
            $conectar = parent::conexion();
        $sql = "SELECT 
            caso.caso_id,
            caso.usu_id,
            caso.sede_id,
            caso.caso_date,
            caso.caso_titulo,
            caso.caso_descripcion,
            caso.caso_estado,
            caso.fecha_creacion, /*agrego este campo para saber cuando se creo el ticket ojo no es lo mismo que saber cuando sucedio el incidente del reclamo*/
            usuario.usu_nombre,
            usuario.usu_apellido,
            sede.sede_nombre
            FROM caso 
            INNER JOIN sede ON caso.sede_id=sede.sede_id
            INNER JOIN usuario on caso.usu_id=usuario.usu_id
            WHERE caso.flag=1";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }


         //FUNCION PARA QUE CADA USUARIO VEA SU CASO POR SU ID OSEA SU DETALLETICKET video 30 
         public function listar_casodetalle_x_caso($caso_id){
            $conectar = parent::conexion();
            $sql = "SELECT 
            td_casodetalle.caso_id,
            td_casodetalle.casodetalle_descrip,
            td_casodetalle.fech_crea,
            usuario.usu_nombre,
            usuario.usu_apellido,
            usuario.rol_id
            FROM 
            td_casodetalle 
            INNER JOIN usuario on td_casodetalle.usu_id=usuario.usu_id
            where caso_id=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $caso_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }



        public function listar_caso_x_id($caso_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
            caso.caso_id,
            caso.usu_id,
            caso.sede_id,
            caso.caso_titulo,
            caso.caso_descripcion,
            caso.caso_estado,
            caso.fecha_creacion,
            usuario.usu_nombre,
            usuario.usu_apellido,
            sede.sede_nombre
            FROM caso
            INNER JOIN sede on caso.sede_id=sede.sede_id
            INNER JOIN usuario on caso.usu_id=usuario.usu_id
            WHERE caso.flag=1
            AND caso.caso_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $caso_id);
            $sql->execute();
            return $resultado=$sql->fetchAll(pdo::FETCH_ASSOC);
        } 
    }

?>