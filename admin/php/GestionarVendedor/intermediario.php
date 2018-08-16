<?php 
require_once("clase.php");
    $c= new BaseDeDatos();
    $c->conectarBD();


if (isset($_POST["cargar"])) {
	$c->cargar();
}
if (isset($_POST["mod"])) {
	$c->modificarZona($_POST["id"]);
}
if (isset($_POST["act"])) {
	$id=$_POST["id"];
	$zona=$_POST["zona"];
	$c->actualizar($id,$zona);

}

?>