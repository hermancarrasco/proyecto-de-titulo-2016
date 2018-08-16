<?php 
require_once("clase.php");
    $c= new BaseDeDatos();
    $c->conectarBD();


if(isset($_POST['dir'])){
	$id=$_POST["id"];
	$c->direcciones($id);
	}

if(isset($_POST['traerDireccion'])){
	$id=$_POST["id"];
	$c->traerDirecciones($id);
	}
if(isset($_POST['modificar'])){
	$estado=$_POST["estado"];
	$zona=$_POST["zona"];
	$id=$_POST["id"];
	$c->modificarDireccion($estado,$zona,$id);
	}

$c->desconectarBD();
?>