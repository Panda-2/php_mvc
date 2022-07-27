<?php 

class RegistroController{

    public function RegistrarC(){

        if(isset($_POST["nombre"])){

            $datos = array("nombre"   => $_POST["nombre"],
                           "apellido" => $_POST["apellido"],
                           "email"    => $_POST["email"],
                           "puesto"   => $_POST["puesto"],
                           "salario"  => $_POST["salario"]);

            $tablaBD = "empleados";
            $respuesta = Empleado::RegistrarM($datos, $tablaBD);

            if($respuesta == "success"){
                header("location:index.php?route=empleados");
            }else {
                echo "Error";
            }

        }

    }

    public function ListarC(){

        $tablaBD = "empleados";
        $respuesta = Empleado::ListarM($tablaBD);

        foreach($respuesta as $key => $value){

            echo '<tr>
                    <td>'.$value["nombre"].'</td>
                    <td>'.$value["apellido"].'</td>
                    <td>'.$value["email"].'</td>
                    <td>'.$value["puesto"].'</td>
                    <td>$ '.$value["salario"].'</td>
                    <td><a href="index.php?route=editar&id='.$value["id"].'"><button>Editar</button></a></td>
                    <td><button>Borrar</button></td>
                 </tr>';
        }

    }

    public function ObtenerEmpleado(){
        $id = $_GET["id"];
        $tablaBD = "empleados";

        $respuesta = Empleado::ObtenerEmpleado($id, $tablaBD);

        echo '
            <input type="hidden" name="id" value="'.$respuesta["id"].'">

            <input type="text" placeholder="Nombre" name="nombre" value="'.$respuesta["nombre"].'"required>

            <input type="text" placeholder="Apellido" name="apellido" value="'.$respuesta["apellido"].'"required>
        
            <input type="email" placeholder="Email" name="email" value="'.$respuesta["email"].'"required>
        
            <input type="text" placeholder="Puesto" name="puesto" value="'.$respuesta["puesto"].'"required>
        
            <input type="text" placeholder="Salario" name="salario" value="'.$respuesta["salario"].'"required>
        
            <input type="submit" value="Registrar">
        ';
    }

    public function ActualizarEmpleado(){
        $datos = array( "id"       => $_POST["id"],
                        "nombre"   => $_POST["nombre"],
                        "apellido" => $_POST["apellido"],
                        "email"    => $_POST["email"],
                        "puesto"   => $_POST["puesto"],
                        "salario"  => $_POST["salario"]);

        $tablaBD = "empleados";
        $respuesta = Empleado::ActualizarEmpleado($datos, $tablaBD);

        if($respuesta == "success"){
            header("locations::index.php?route=empleados");
        }else {
            echo "Error";
        }
    }

    public function EliminarEmpleado(){
        $id = $_GET["id"];
        $tablaBD = "empleados";
        $respuesta = Empleado::EliminarEmpleado($id, $tablaBD);

        if($respuesta == "successs"){
            header("location:index.php?route=empleados");
        }else {
            echo "Error";
        }
    }
}

?>