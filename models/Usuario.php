<?php
    class Usuario extends Conectar{

        public function login(){
            $conectar = parent::conexion();
            parent::set_names();

            if (isset($_POST["enviar"])) {
                $correo = $_POST["usu_correo"];
                $password=$_POST["usu_password"];
                $rol=$_POST["rol_id"];

                if (empty($correo) and empty($password)) {
                    header("Location:" . Conectar::ruta() . "index.php?m=2");
                    exit();
                }else{
                    $sql = "SELECT * FROM usuario WHERE usu_correo=? and usu_password=? and rol_id=? and flag=1";
                    $stmt = $conectar->prepare($sql);
                    $stmt->bindValue(1, $correo);
                    $stmt->bindValue(2, $password);
                    $stmt->bindValue(3, $rol);
                    $stmt->execute();
                    $resultado = $stmt->fetch();

                        // ESTO FUE DECLARADO EN header.php 
                        if (is_array($resultado) and count($resultado)>0) {
                            $_SESSION["usu_id"] = $resultado["usu_id"];
                            $_SESSION["usu_nombre"] = $resultado["usu_nombre"];
                            $_SESSION["usu_apellido"] = $resultado["usu_apellido"];
                            $_SESSION["rol_id"] = $resultado["rol_id"];
                            header("Location:" . Conectar::ruta() . "view/Home/");
                            exit();    
                        }else{
                            header("Location:" . Conectar::ruta() . "index.php?m=1");
                            exit();
                        }
                }


            }
        }

        public function insert_usuario($usu_nombre,$usu_apellido,$usu_correo,$usu_password,$rol_id,$usu_celular,$usu_tipo_documento,$usu_numero_documento,$fech_nacimiento){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO usuario(usu_id,usu_nombre,usu_apellido,usu_correo,usu_password,rol_id,usu_celular,usu_tipo_documento,usu_numero_documento,fech_nacimiento,fech_creacion,fech_modificacion,fech_eliminacion,flag) VALUES
            (NULL,?,?,?,?,?,?,?,?,?,now(),NULL,NULL,1);";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$usu_nombre);
            $sql->bindValue(2,$usu_apellido);
            $sql->bindValue(3,$usu_correo);
            $sql->bindValue(4,$usu_password);
            $sql->bindValue(5,$rol_id);
            $sql->bindValue(6,$usu_celular);
            $sql->bindValue(7,$usu_tipo_documento);
            $sql->bindValue(8,$usu_numero_documento);
            $sql->bindValue(9,$fech_nacimiento);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function update_usuario($usu_id,$usu_nombre,$usu_apellido,$usu_correo,$usu_password,$rol_id,$usu_celular,$usu_tipo_documento,$usu_numero_documento,$fech_nacimiento){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE usuario SET usu_nombre=?,usu_apellido=?,usu_correo=?,usu_password=?,rol_id=?,usu_celular=?, usu_tipo_documento=?,usu_numero_documento=?,fech_nacimiento=? WHERE usu_id=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$usu_nombre);
            $sql->bindValue(2,$usu_apellido);
            $sql->bindValue(3,$usu_correo);
            $sql->bindValue(4,$usu_password);
            $sql->bindValue(5,$rol_id);
            $sql->bindValue(6,$usu_celular);
            $sql->bindValue(7,$usu_tipo_documento);
            $sql->bindValue(8,$usu_numero_documento);
            $sql->bindValue(9,$fech_nacimiento);
            $sql->bindValue(10,$usu_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        
        public function delete_usuario($usu_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE usuario SET flag=0 ,fech_eliminacion=now()  where usu_id=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$usu_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        
        public function get_usuario(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM usuario where flag=1";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
        
        public function get_usuario_x_id($usu_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM usuario where usu_id=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$usu_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }



        //PARA EL DASHBOARD
        //TOTAL TICKETS
        public function get_usuario_total_x_id($usu_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT COUNT(*) AS TOTAL FROM caso WHERE usu_id=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$usu_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        //TOTAL TICKETS ABIERTOS
        public function get_usuario_totalabiertos_x_id($usu_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT COUNT(*) AS TOTAL FROM caso WHERE usu_id=? AND caso_estado='Abierto'";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$usu_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        //TOTAL TICKETS CERRADOS
        public function get_usuario_totalcerrados_x_id($usu_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT COUNT(*) AS TOTAL FROM caso WHERE usu_id=? AND caso_estado='Cerrado'";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$usu_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
    }

?>