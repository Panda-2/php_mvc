<?php 

require_once "conexionBD.php";

class Empleado extends ConexionBD{

    static public function RegistrarM($datos, $tablaBD){

        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (nombre, apellido, email, puesto, salario) VALUES(:nombre, :apellido, :email, :puesto, :salario)");

        $pdo -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
        $pdo -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $pdo -> bindParam(":puesto", $datos["puesto"], PDO::PARAM_STR);
        $pdo -> bindParam(":salario", $datos["salario"], PDO::PARAM_STR);

        if($pdo -> execute()){
            return "success";
        }else{
            return "Error";
        }

        $pdo -> close();
    }

    static public function ListarM($tablaBD){

        $pdo = ConexionBD::cBD()->prepare("SELECT id, nombre, apellido, email, puesto, salario FROM $tablaBD");
        
        $pdo->execute();

        return $pdo->fetchAll();

        $pdo->close();
    }

    static public function ObtenerEmpleado($id, $tablaBD){
        $pdo = ConexionBD::$cBD()->prepare("SELECT id, nombre, apellido, email, puesto, salario FROM $tablaBD WHERE id = :id");
        $pdo -> bindParam(":id", $id, PDO::PARAM_INT);
        $pdo -> execute();

        return $pdo -> fetch();

        $pdo -> close();
    }

    static public function ActualizarEmpleado($datos, $tablaBD){
        $pdo = ConexionBD::$cBD()->prepare("UPDATE $tablaBD 
            SET nombre = :nombre, apellido = :apellido, email = :email, puesto = :puesto, salario = :salario 
            WHERE id = :id");

        $pdo -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $pdo -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
        $pdo -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $pdo -> bindParam(":puesto", $datos["puesto"], PDO::PARAM_STR);
        $pdo -> bindParam(":salario", $datos["salario"], PDO::PARAM_STR);
        $pdo -> execute();

        if($pdo -> execute()){
            return "success";
        }else {
            return "Error";
        }

        $pdo -> close();
    }

    static public function EliminarEmpleado($id, $tablaBD){
        $pdo = ConexionBD::$cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

        $pdo -> bindParam(":id", $id, PDO::PARAM_INT);
        
        if($pdo -> execute()){
            return "success";
        }else{
            return "Error";
        }

        $pdo -> close();
    }
}

?>