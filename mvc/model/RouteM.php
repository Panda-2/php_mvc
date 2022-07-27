<?php 

class Model{

    static public function RutasModel($rutas){
        
        if($rutas == "ingreso" || $rutas == "registrar" || $rutas == "empleados" || $rutas == "salir" || $rutas == "editar"){

            $pagina = "View/modules/".$rutas.".php";

        }else if($rutas == "index"){
            $pagina =  "View/modules/ingreso.php";
        }else {
            $pagina =  "View/modules/ingreso.php";
        }

        return $pagina;
    }

}

?>