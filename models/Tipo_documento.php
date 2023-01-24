<?php
    class Tipo_documento extends Conectar{
        public function get_tipo_documento(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tipo_documento where flag=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }


?>