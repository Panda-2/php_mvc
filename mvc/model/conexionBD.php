<?php 

class ConexionBD{

    static public function cBD(){

        //Host y nombre de la bd, usuario, contraseña 
        $bd = new PDO("mysql:host=localhost;dbname=crud", "root", "");

        return $bd;
    }

}

?>