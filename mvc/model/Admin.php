<?php

require_once "conexionBD.php";

class Admin extends ConexionBD{

    static public function IngresoM($datos, $tablaBD){

        //prepare: Ejecuta una sentencia SQL
        $pdo = ConexionBD::cBD()->prepare("SELECT usuario, clave FROM $tablaBD WHERE usuario = :usuario");

        //bindParam: Sirve para enlazar parametros
        $pdo -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

        $pdo -> execute();

        return $pdo -> fetch(); //retorna el dato de una sola fila

        $pdo -> close();
    }

}

?>