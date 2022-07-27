<?php 

session_start();

if(!$_SESSION["Ingreso"]){
    header("location:index.php?route=ingreso");
    exit();
}
?>

<br>
<h1>EDITAR UN EMPLEADO</h1>

<form method="post" action="">
		


    <?php

    $editar = new EmpleadoController();
    $editar -> ObtenerEmpleado();
    
    $actualizar = new EmpleadoController();
    $actualizar -> ActualizarEmpleado();
    ?>
</form>