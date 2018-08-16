<?php 
require_once("clase.php");
    $c= new BaseDeDatos();
    $c->conectarBD();
//···· Grafico ventas
if (isset($_POST["ventas"])) {
	$c->ventas();	
}
if (isset($_POST["ventasxAnio"])) {
	$c->ventasxAnio();	
}
if (isset($_POST["ventasZona"])) {
	$c->ventasZona();
}
if (isset($_POST["ventasRuta"])) {
	$c->ventasRuta();
}
//////////////////





?>