<?php
    class Sede extends Conectar{

        public function get_sede(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM sede where flag=1";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
    }
