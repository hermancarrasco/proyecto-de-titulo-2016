<?php 
require_once("clase.php");
    $c= new BaseDeDatos();
    $c->conectarBD();
//···· Grafico compras·····
if (isset($_POST["kg5"])) {
	$c->chart5();	
}
if (isset($_POST["kg11"])) {
	$c->chart11();	
}
if (isset($_POST["kg15"])) {
	$c->chart15();	
}
if (isset($_POST["kg45"])) {
	$c->chart45();	
}
//////////////////

//······graficos ventas ········

if (isset($_POST["kg5Venta"])) {
	$c->chart5Venta();	
}
if (isset($_POST["kg11Venta"])) {
	$c->chart11Venta();	
}
if (isset($_POST["kg15Venta"])) {
	$c->chart15Venta();	
}
if (isset($_POST["kg45Venta"])) {
	$c->chart45Venta();	
}
///////////////



?>