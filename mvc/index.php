<?php 

require_once "Controller/RouteC.php";
require_once "Controller/AdminController.php";
require_once "Controller/EmpleadoController.php";

require_once "Model/RouteM.php";
require_once "Model/Admin.php";
require_once "Model/Empleado.php";

$router = new RouterController();
$router -> Plantilla();

?>