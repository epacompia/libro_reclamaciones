<?php
    class Usuario extends Conectar{

        public function login(){
            $conectar = parent::conexion();
            parent::set_names();

            if (isset($_POST["enviar"])) {
                $correo = $_POST["usu_correo"];
                $password=$_POST["usu_password"];

                if (empty($correo) and empty($password)) {
                    header("Location:" . Conectar::ruta() . "index.php?m=2");
                    exit();
                }else{
                    $sql = "SELECT * FROM usuario WHERE usu_correo=? and usu_password=? and flag=1";
                    $stmt = $conectar->prepare($sql);
                    $stmt->bindValue(1, $correo);
                    $stmt->bindValue(2, $password);
                    $stmt->execute();
                    $resultado = $stmt->fetch();

                        if (is_array($resultado) and count($resultado)>0) {
                            $_SESSION["usu_id"] = $resultado["usu_id"];
                            $_SESSION["usu_nombre"] = $resultado["usu_nombre"];
                            $_SESSION["usu_apellido"] = $resultado["usu_apellido"];
                            header("Location:" . Conectar::ruta() . "view/Home/");
                            exit();    
                        }else{
                            header("Location:" . Conectar::ruta() . "index.php?m=1");
                            exit();
                        }
                }


            }
        }

    }

?>