<?php 
require_once("clase.php");
    $c= new BaseDeDatos();
    $c->conectarBD();


if (isset($_POST["cboTipo"])) {
	$c->llenarCboTipo();
}
if (isset($_POST["mostrarPrecio"])) {
	$c->mostrarPrecio($_POST["mostrarPrecio"]);
}
if (isset($_POST["venta"])) {
	$direccion=$_POST["direccion"];
	$gasTipo=$_POST["gasTipo"];
	$c->venta($direccion,$gasTipo);

}

?>