<?php

    class Caso extends Conectar{

        public function insertar_caso($usu_id,$sede_id,$caso_date,$caso_titulo,$caso_descripcion){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO caso(caso_id,usu_id,sede_id,caso_date,caso_titulo,caso_descripcion,flag) VALUES (NULL,?,?,?,?,?,1);";
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


        public function listar_caso_x_usu($usu_id){
            $conectar = parent::conexion();
            $sql = "SELECT 
            caso.caso_id,
            caso.usu_id,
            caso.sede_id,
            caso.caso_date,
            caso.caso_titulo,
            caso.caso_descripcion,
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

    }

?>