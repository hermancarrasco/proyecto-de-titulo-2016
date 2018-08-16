<?php 
require_once("clase.php");
    $c= new BaseDeDatos();
    $c->conectarBD();


if(isset($_POST['pedidos'])){

	$c->mostrarPedidos($_POST["zona"]);
	}

if (isset($_POST["cboTipo"])) {
	$c->llenarCboTipo();
}
if (isset($_POST["mostrarPrecio"])) {
	$c->mostrarPrecio($_POST["mostrarPrecio"]);
}
if (isset($_POST["regVenta"])) {
	$prod=$_POST["prod"];
	$precio=$_POST["precio"];
	$cantidad=$_POST["cantidad"];
	$lat=$_POST["lat"];
	$lon=$_POST["lon"];
	$direccion=$_POST["direccion"];
	$zona=$_POST["zona"];
	$c->registrarVentaRuta($prod,$precio,$cantidad,$lat,$lon,$direccion,$zona);



	//echo "prod:".$prod." precio: ".$precio." cantidad: ".$cantidad." lat: ".$lat." lon: ".$lon." dir: ".$direccion." zona:".$zona ;
}


$c->desconectarBD();
?>