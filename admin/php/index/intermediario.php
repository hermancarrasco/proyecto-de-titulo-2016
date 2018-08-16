<?php 
require_once("clase.php");
    $c= new BaseDeDatos();
    $c->conectarBD();

//////////////////

//······graficos ventas ········

if (isset($_POST["kg5"])) {
	$c->chart5();	
}
if (isset($_POST["rev"])) {
	$c->revisionCamiones();	
}
if (isset($_POST["stock"])) {
	$c->stockCritico();	
}
///////////////



?>