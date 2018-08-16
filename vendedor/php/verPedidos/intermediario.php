<?php 
require_once("clase.php");
    $c= new BaseDeDatos();
    $c->conectarBD();


if(isset($_POST['verPedidos'])){
	$zona=$_POST["zona"];

	$c->mostrarPedidos($zona);
	}

if(isset($_POST['entregar'])){
	$id=$_POST["id"];

	$c->entregarPedido($id);
	}


$c->desconectarBD();
?>