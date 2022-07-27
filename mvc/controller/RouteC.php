<?php 

class RouterController{

    public function Plantilla(){

        include "View/Plantilla.php";

    }

    public function Routes(){

        //isset: retorna "true" si es distinto a null
        if(isset($_GET["route"])){
            $router = $_GET["route"];
        }else {
            $router = "index";
        }

        //Conexión con una función "::"
        $response = Model::RutasModel($router);

        include $response;
    }

}

?>