<?php

class AdminController{

    public function IngresoC(){

        if(isset($_POST["usuarioI"])){

            $datosC = array("usuario" => $_POST["usuarioI"], "clave" => $_POST["claveI"]);

            $tablaBD = "administradores";
            $respuesta = Admin::IngresoM($datosC, $tablaBD);

            if($respuesta["usuario"] == $_POST["usuarioI"] && $respuesta["clave"] == $_POST["claveI"]){

                session_start();
                $_SESSION["Ingreso"] = true;

                header("location:index.php?route=empleados");
            }else {

                echo "ERROR AL INGRESAR"; 
            }
        }

    }

}

?>