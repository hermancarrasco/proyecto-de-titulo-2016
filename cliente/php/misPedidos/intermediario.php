<?php 
require_once("clase.php");
    $c= new BaseDeDatos();
    $c->conectarBD();


if(isset($_POST['dir'])){
	$id=$_POST["id"];
	$c->pedidos($id);
	}

if(isset($_POST['traerDireccion'])){
	$id=$_POST["id"];
	$c->traerPedidos($id);
	}
if(isset($_POST['modificar'])){
	$id=$_POST["id"];
	$c->modificarPedidos($id);
	}

$c->desconectarBD();
?>