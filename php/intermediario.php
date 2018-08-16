<?php 
require_once("clase.php");
    $c= new BaseDeDatos();
    $c->conectarBD();


    if(isset($_POST["cargarusu"])){
    	$c->listarClientes();
    }

if(isset($_POST['regbtn'])){
	      
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
	$zona=$_POST["zona"];
		$c->ingresarUsuario($email,$rut,$pas,$nom,$ape,$tel,$cel,$dir,$num,$dep,$zona);
	}

if(isset($_GET['carga5'])){
	$c->carga5();
	}
if(isset($_GET['carga11'])){
	$c->carga11();
	}
if(isset($_GET['carga15'])){
	$c->carga15();
	}
if(isset($_GET['carga45'])){
	$c->carga45();
	}
if (isset($_POST["k45"])) {
	$id=$_POST['id'];
	$id_prod=$_POST['idProd'];
	$c->venta($id,$id_prod);
	}
if (isset($_POST["idSetDatos"])) {
	$id=$_POST['idSetDatos'];
	$c->traerDatos($id);
}
if (isset($_POST["idSetDatosEliminar"])) {
	$id=$_POST['idSetDatosEliminar'];
	$c->traerDatosEliminar($id);
}

if (isset($_POST["modBtn"])) {
	$id=$_POST["id"];
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
	$c->modificarDatos($id,$email,$rut,$pas,$nom,$ape,$tel,$cel,$dir,$num,$dep);
}
if (isset($_POST["eliBtn"])) {
	$id=$_POST["id"];
	$idUsuario=$_POST["idUsuario"];
	$c->eliminarUsuario($id,$idUsuario);
}
if (isset($_POST["subListarClientes"])) {
	$c->listarClientes();
}
if (isset($_POST["subListarVendedores"])) {
	$c->listarVendedores();
}
if (isset($_POST["subListarAdmin"])) {
	$c->listarAdministradores();
}

$c->desconectarBD();
?>