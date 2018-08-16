<?php 
require_once("clase.php");
    $c= new BaseDeDatos();
    $c->conectarBD();


if (isset($_POST["cargar"])) {
	$c->cargar();
}
if (isset($_POST["mod"])) {
	$c->modificar($_POST["id"]);
}
if (isset($_POST["act"])) {
	$id=$_POST["id"];
	$marca=$_POST["marca"];
	$modelo=$_POST["modelo"];
	$patente=$_POST["patente"];
	$revision=$_POST["revision"];
	$conductor=$_POST["conductor"];
	$c->actualizar($id,$marca,$modelo,$patente,$revision,$conductor);
}
if (isset($_POST["reg"])) {
	$marca=$_POST["marca"];
	$modelo=$_POST["modelo"];
	$patente=$_POST["patente"];
	$revision=$_POST["revision"];
	$c->ingresarCamion($marca,$modelo,$patente,$revision);
}


?>