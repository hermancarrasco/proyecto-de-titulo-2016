<?php 
require_once("clase.php");
    $c= new BaseDeDatos();
    $c->conectarBD();


if(isset($_GET['carga5'])){
	$c->carga5();
	}
if(isset($_GET['carga11'])){
	$c->carga11();
	}
if(isset($_GET['carga15'])){
	$c->carga15();
	}
if (isset($_POST["venta"])) {
	$tipo=$_POST["tipo"];
	$dir=$_POST["condir"];
	$id=$_POST["id"];
	$zona=$_POST["zona"];
	$c->venta($id,$tipo,$dir,$zona);
}	
if(isset($_POST['dir'])){
	$id=$_POST['dir'];
	$tipo=$_POST["tipo"];
	$c->direccion($id,$tipo);
	}
if (isset($_POST["k45"])) {
	$id=$_POST['id'];
	$id_prod=$_POST['idProd'];
	$c->venta($id,$id_prod);
	}

if (isset($_POST["nuevaDir"])) {
		$dir=$_POST["dirNueva"];
		$id=$_POST["id"];
		$zona=$_POST["zona"];
		//echo "Direccion ".$dir." id: ".$id;
		$c->nuevaDireccion($dir,$id,$zona);
	}	


$c->desconectarBD();
?>