<?php 
require_once("clase.php");
    $c= new BaseDeDatos();
    $c->conectarBD();

if (isset($_POST["mostrarIngresos"])) {
	$c->mostrarIngresos();
}
if (isset($_POST["mostrarModificaciones"])) {
	$c->mostrarModificacion();
}
if (isset($_POST["mostrarEliminaciones"])) {
	$c->mostrarEliminacion();
}


?>