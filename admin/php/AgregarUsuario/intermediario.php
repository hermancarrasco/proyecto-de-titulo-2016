<?php 
require_once("clase.php");
    $c= new BaseDeDatos();
    $c->conectarBD();

if (isset($_POST["regbtn"])) {
	$email=$_POST["email"];
	$pas=$_POST["pass"];
	$nom=$_POST["nombre"];
	$ape=$_POST["apellido"];
	$dir=$_POST["direccion"];
	$num=$_POST["numero"];
	$rut=$_POST["rut"];
	$dep=$_POST["departamento"];
	$tel=$_POST["telfijo"];
	$cel=$_POST["celular"];
	$idUsuario=$_POST["idUsuario"];
	$c->ingresarUsuario($email,$rut,$pas,$nom,$ape,$tel,$cel,$dir,$num,$dep,$idUsuario);
}
if (isset($_POST["regbtnven"])) {
	$email=$_POST["email"];
	$pas=$_POST["pass"];
	$nom=$_POST["nombre"];
	$ape=$_POST["apellido"];
	$dir=$_POST["direccion"];
	$num=$_POST["numero"];
	$rut=$_POST["rut"];
	$dep=$_POST["departamento"];
	$tel=$_POST["telfijo"];
	$cel=$_POST["celular"];
	$idUsuario=$_POST["idUsuario"];
	$c->ingresarVendedor($email,$rut,$pas,$nom,$ape,$tel,$cel,$dir,$num,$dep,$idUsuario);
}
if (isset($_POST["regbtnadm"])) {
	$email=$_POST["email"];
	$pas=$_POST["pass"];
	$nom=$_POST["nombre"];
	$ape=$_POST["apellido"];
	$dir=$_POST["direccion"];
	$num=$_POST["numero"];
	$rut=$_POST["rut"];
	$dep=$_POST["departamento"];
	$tel=$_POST["telfijo"];
	$cel=$_POST["celular"];
	$idUsuario=$_POST["idUsuario"];
	$c->ingresarAdmin($email,$rut,$pas,$nom,$ape,$tel,$cel,$dir,$num,$dep,$idUsuario);
}


?>