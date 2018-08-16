<?php 
require_once("clase.php");
    $c= new BaseDeDatos();
    $c->conectarBD();

if (isset($_POST["radios"])) {
	$c->llenarTipoProveedores();
}
if (isset($_POST["combo"])) {
	$c->llenarComboProveedores();
}
if (isset($_POST["btnInsertarTipo"])) {
	$nombre=$_POST["nom"];
	$descripcion=$_POST["desc"];
	$idUsuario=$_POST["idUsuario"];
	$c->insertarTipoProveedores($nombre,$descripcion,$idUsuario);
}
if (isset($_POST["btnRegistarProveedor"])) {
	$rut=$_POST["rut"];
	$razonSocial=$_POST["razonSocial"];
	$giro=$_POST["giro"];
	$direccion=$_POST["direccion"];
	$fono=$_POST["fono"];
	$tipo=$_POST["tipo"];
	$idUsuario=$_POST["idUsuario"];
	$c->registrarProveedores($rut,$razonSocial,$giro,$direccion,$fono,$tipo,$idUsuario);

}

if (isset($_POST["listarDatosProveedor"])) {
	$id=$_POST["listarDatosProveedor"];
	$c->listarDatosProveedor($id);
}
if (isset($_POST["envProdJson"])) {
	$lista= json_decode($_POST["prodJson"]);
	$numeroFactura=$_POST["numeroFactura"];
	$fechaFactura=$_POST["fechaFactura"];
	$prov=$_POST["prov"];
	$idUsuarioprod=$_POST["idUsuario"];	
	$c->registrarFactura($lista,$numeroFactura,$fechaFactura,$prov,$idUsuarioprod);
}
if (isset($_POST["mostrarFactura"])) {
	$desde=$_POST["desde"];
	$hasta=$_POST["hasta"];
	$c->mostrarFacturas($desde,$hasta);
}
if (isset($_POST["mostrarVenta"])) {
	$desde=$_POST["desde"];
	$hasta=$_POST["hasta"];
	$c->mostrarVentas($desde,$hasta);
}

if (isset($_POST["mostrarDetalleVenta"])) {
	$desde=$_POST["desde"];
	$hasta=$_POST["hasta"];
	$tipo=$_POST["tipo"];
	$c->mostrarDetalleVentas($desde,$hasta,$tipo);
}
if (isset($_POST["mostrarDetalleVenta2"])) {
	$tipo=$_POST["tipo"];
	$fecha=$_POST["fecha"];
	$c->mostrarDetalleVentas2($tipo,$fecha);
}

if (isset($_POST["mostrarVentaPorDia"])) {
	$desde=$_POST["desde"];
	$hasta=$_POST["hasta"];
	$c->mostrarVentasPorDia($desde,$hasta);
}
if (isset($_POST["mostrarDetalleVentasPorDia"])) {
	$dia=$_POST["dia"];
	$c->mostrarDetalleVentasPorDia($dia);
}
if (isset($_POST["mostrarDetalleVentasPorDia2"])) {
	$dia2=$_POST["dia2"];
	$c->mostrarDetalleVentasPorDia2($dia2);
}


//Auditoria

if (isset($_POST["listarSesiones"])) {
	$c->listarUltimaSesion();
}
if (isset($_POST["DetalleUltimaSesion"])) {
	$id=$_POST["DetalleUltimaSesion"];
	$c->mostrarDetalleUltimaSesion($id);
}

?>