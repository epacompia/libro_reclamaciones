<?php

    class Caso extends Conectar{

        public function insertar_caso($usu_id,$sede_id,$caso_date,$caso_time,$caso_titulo,$caso_descripcion){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO caso(caso_id,usu_id,sede_id,caso_date,caso_time,caso_titulo,caso_descripcion,flag) VALUES (NULL,?,?,?,?,?,?,1)";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->bindValue(2, $sede_id);
            $sql->bindValue(3, $caso_date);
            $sql->bindValue(4, $caso_time);
            $sql->bindValue(5, $caso_titulo);
            $sql->bindValue(6, $caso_descripcion);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
    }

?>