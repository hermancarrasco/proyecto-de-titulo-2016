<?php
class BaseDeDatos{

	private $ser;
	private $usu;
	private $pas;
	private $bd;
	private $id_bd;
	private $id_con;




	
	function conectarBD(){
			$this->ser="localhost"; //servidor
			$this->usu="root"; //usuario
			$this->pas=""; //contraseña
			$this->bd="proyecto"; //base de datos
			
			$this->id_con=mysql_connect($this->ser,$this->usu,$this->pas); //conexion a la BD
			if(!$this->id_con){
				die("Error en la conexion con la BD");
			}
			$this->id_bd=mysql_select_db($this->bd,$this->id_con); //Seleccion de la BD
			if(!$this->id_bd){
				die("Error en la seleccion de la BD");
			}
			mysql_set_charset('utf8');
			date_default_timezone_set("America/mendoza");//metodo para que la hora sea la de Chile
			$time = time(); //variable que almacena la hora local
		}
		function desconectarBD(){
			mysql_close($this->id_con);
		}//cierre funcion desconectar de la base de datos

//······ se envia informacion para grafico de precio de compra de gas
		function chart5()
		{
			mysql_set_charset('utf8');
			$sql="SELECT * FROM gas_detallefaturas,gas_facturas WHERE gas_facturas.id=gas_detallefaturas.id_factura and gas_detallefaturas.detalle='Gas 5Kg' order by gas_detallefaturas.id asc";
			$sentencia=mysql_query($sql,$this->id_con);
			
			$cont=0;
			
			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
				
				//$arrayName[$cont] = $rs["direccion"];
				$arrayName[$cont] = array("Fecha" => $rs['fecha'] , "precio" => $rs['precio']);
				$cont++;
			}
			$ca= json_encode($arrayName);
			echo $ca;
		}

//······ se envia informacion para grafico de precio de compra de gas
		function chart11()
		{
			mysql_set_charset('utf8');
			$sql="SELECT * FROM gas_detallefaturas,gas_facturas WHERE gas_facturas.id=gas_detallefaturas.id_factura and gas_detallefaturas.detalle='Gas 11Kg' order by gas_detallefaturas.id asc";
			$sentencia=mysql_query($sql,$this->id_con);
			
			$cont=0;
			
			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
				
				//$arrayName[$cont] = $rs["direccion"];
				$arrayName[$cont] = array("Fecha" => $rs['fecha'] , "precio" => $rs['precio']);
				$cont++;
			}
			$ca= json_encode($arrayName);
			echo $ca;
		}

//······ se envia informacion para grafico de precio de compra de gas
		function chart15()
		{
			mysql_set_charset('utf8');
			$sql="SELECT * FROM gas_detallefaturas,gas_facturas WHERE gas_facturas.id=gas_detallefaturas.id_factura and gas_detallefaturas.detalle='Gas 15Kg' order by gas_detallefaturas.id asc";
			$sentencia=mysql_query($sql,$this->id_con);
			
			$cont=0;
			
			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
				
				//$arrayName[$cont] = $rs["direccion"];
				$arrayName[$cont] = array("Fecha" => $rs['fecha'] , "precio" => $rs['precio']);
				$cont++;
			}
			$ca= json_encode($arrayName);
			echo $ca;
		}

//······ se envia informacion para grafico de precio de compra de gas
		function chart45()
		{
			mysql_set_charset('utf8');
			$sql="SELECT * FROM gas_detallefaturas,gas_facturas WHERE gas_facturas.id=gas_detallefaturas.id_factura and gas_detallefaturas.detalle='Gas 45Kg' order by gas_detallefaturas.id asc";
			$sentencia=mysql_query($sql,$this->id_con);
			
			$cont=0;
			
			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
				
				//$arrayName[$cont] = $rs["direccion"];
				$arrayName[$cont] = array("Fecha" => $rs['fecha'] , "precio" => $rs['precio']);
				$cont++;
			}
			$ca= json_encode($arrayName);
			echo $ca;
		}
//########### cierre grafico de compras##########


function chart5Venta(){
	mysql_set_charset('utf8');
	$sql="SELECT * FROM `gas_ventas` where `id_prod`=1";
	$sentencia=mysql_query($sql,$this->id_con);
			
			$cont=0;
			
			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
				
				//$arrayName[$cont] = $rs["direccion"];
				$arrayName[$cont] = array("Fecha" => $rs['fecha_venta'] , "precio" => $rs['precio_venta']);
				$cont++;
			}
			$ca= json_encode($arrayName);
			echo $ca;
}
function chart11Venta(){
	mysql_set_charset('utf8');
	$sql="SELECT * FROM `gas_ventas` where `id_prod`=2";
	$sentencia=mysql_query($sql,$this->id_con);
			
			$cont=0;
			
			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
				
				//$arrayName[$cont] = $rs["direccion"];
				$arrayName[$cont] = array("Fecha" => $rs['fecha_venta'] , "precio" => $rs['precio_venta']);
				$cont++;
			}
			$ca= json_encode($arrayName);
			echo $ca;
}
function chart15Venta(){
	mysql_set_charset('utf8');
	$sql="SELECT * FROM `gas_ventas` where `id_prod`=3";
	$sentencia=mysql_query($sql,$this->id_con);
			
			$cont=0;
			
			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
				
				//$arrayName[$cont] = $rs["direccion"];
				$arrayName[$cont] = array("Fecha" => $rs['fecha_venta'] , "precio" => $rs['precio_venta']);
				$cont++;
			}
			$ca= json_encode($arrayName);
			echo $ca;
}
function chart45Venta(){
	mysql_set_charset('utf8');
	$sql="SELECT * FROM `gas_ventas` where `id_prod`=4";
	//$sql='SELECT COUNT(id_prod) FROM gas_ventas WHERE fecha_venta BETWEEN "2016-01-01" AND "2016-04-30" GROUP BY MONTH(fecha_venta)';
	//$sql='SELECT count(*) AS cantidad,DATE(fecha_venta) as Fecha, id_prod, precio_venta  FROM `gas_ventas` group by id_prod,fecha_venta';
	$sentencia=mysql_query($sql,$this->id_con);
			
			$cont=0;
			
			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
				
				$arrayName[$cont] = array("Fecha" => $rs['fecha_venta'] , "precio" => $rs['precio_venta']);
				$cont++;
				//$arrayName[$cont] = $rs["direccion"];
				
			}
			$ca= json_encode($arrayName);
			echo $ca;
}



}//cierre clase BaseDeDatos
?>