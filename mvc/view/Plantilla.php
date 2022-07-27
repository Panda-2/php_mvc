<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>CRUD</title>

	<link rel="stylesheet" type="text/css" href="View/css/estilos.css">

</head>

<body>

<?php 
	include "modules/menu.php";
?>

<section>

    <?php 
        $router = new RouterController();
        $router -> Routes();
    ?>

</section>
	
</body>

</html>