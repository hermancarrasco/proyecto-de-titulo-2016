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
	$precio=$_POST["precio"];
	$stock=$_POST["stock"];
	$stockMin=$_POST["stockMin"];
	
	$c->actualizar($id,$precio,$stock,$stockMin);

}


?>