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
		function ventas()
		{
			date_default_timezone_set("America/mendoza");//metodo para que la hora sea la de Chile
			$time = time(); //variable que almacena la hora local
			$mostrarAnio= date("Y", $time);
			mysql_set_charset('utf8');
			$sql="SELECT MONTH(fecha_venta) as mes, COUNT(1),sum(precio_venta) as suma FROM gas_ventas WHERE fecha_venta BETWEEN '".$mostrarAnio."-01-01 00:00:00.000' AND '".$mostrarAnio."-12-31 23:59:59.999' GROUP BY MONTH(fecha_venta) ORDER BY MONTH(fecha_venta)";
			$sentencia=mysql_query($sql,$this->id_con);
		
			$cont=0;
			
			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
				if ($rs['mes']==1) {
					$nombreMes="Enero";
				} else if($rs['mes']==2){
					$nombreMes="Febrero";
				}else if ($rs['mes']==3) {
					$nombreMes="Marzo";
				} else if($rs['mes']==4){
					$nombreMes="Abril";
				} else if($rs['mes']==5){
					$nombreMes="Mayo";
				}else if ($rs['mes']==6) {
					$nombreMes="Junio";
				} else if($rs['mes']==7){
					$nombreMes="Julio";
				}else if ($rs['mes']==8) {
					$nombreMes="Agosto";
				} else if($rs['mes']==9){
					$nombreMes="Septiembre";
				} else if($rs['mes']==10){
					$nombreMes="Octubre";
				}else if ($rs['mes']==11) {
					$nombreMes="Noviembre";
				} else if($rs['mes']==12){
					$nombreMes="Diciembre";
				}
				//$arrayName[$cont] = $rs["direccion"];
				$arrayName[$cont] = array("Mes" => $nombreMes , "Total" => $rs['suma']);
				$cont++;
			}
			$ca= json_encode($arrayName);
			echo $ca;
		}

//······ se envia informacion para grafico de precio de compra de gas
		function ventasxAnio()
		{
			date_default_timezone_set("America/mendoza");//metodo para que la hora sea la de Chile
			$time = time(); //variable que almacena la hora local
			$mostrarAnio= date("Y", $time);
			mysql_set_charset('utf8');
			$sql="SELECT YEAR(fecha_venta) as anio, COUNT(1),sum(precio_venta) as suma FROM gas_ventas WHERE fecha_venta BETWEEN '2010-01-01 00:00:00.000' AND '".$mostrarAnio."-12-31 23:59:59.999' GROUP BY YEAR(fecha_venta) ORDER BY YEAR(fecha_venta)";
			$sentencia=mysql_query($sql,$this->id_con);
			
			$cont=0;
			
			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
				
				//$arrayName[$cont] = $rs["direccion"];
				$arrayName[$cont] = array("Anio" => $rs["anio"] , "Total" => $rs['suma']);
				$cont++;
			}
			$ca= json_encode($arrayName);
			echo $ca;
		}

		function ventasZona(){
			date_default_timezone_set("America/mendoza");//metodo para que la hora sea la de Chile
			$time = time(); //variable que almacena la hora local
			$mostrarAnio= date("Y", $time);
			mysql_set_charset('utf8');
			$sql="SELECT month(fecha_venta) as mes, sum(zona=1) as zona1, sum(zona=2) as zona2,sum(zona=3) as zona3,sum(zona=4) as zona4 from gas_ventas where fecha_venta BETWEEN '".$mostrarAnio."-01-01 00:00:00.000' AND '".$mostrarAnio."-12-31 23:59:59.999' group by month(fecha_venta);;";
			$sentencia=mysql_query($sql,$this->id_con);
			
			$cont=0;
			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
				if ($rs['mes']==1) {
					$nombreMes="Enero";
				} else if($rs['mes']==2){
					$nombreMes="Febrero";
				}else if ($rs['mes']==3) {
					$nombreMes="Marzo";
				} else if($rs['mes']==4){
					$nombreMes="Abril";
				} else if($rs['mes']==5){
					$nombreMes="Mayo";
				}else if ($rs['mes']==6) {
					$nombreMes="Junio";
				} else if($rs['mes']==7){
					$nombreMes="Julio";
				}else if ($rs['mes']==8) {
					$nombreMes="Agosto";
				} else if($rs['mes']==9){
					$nombreMes="Septiembre";
				} else if($rs['mes']==10){
					$nombreMes="Octubre";
				}else if ($rs['mes']==11) {
					$nombreMes="Noviembre";
				} else if($rs['mes']==12){
					$nombreMes="Diciembre";
				}
				
				$arrayName[$cont] = array("Mes" => $nombreMes , "a" => $rs['zona1'], "b" => $rs['zona2'], "c" => $rs['zona3'], "d" => $rs['zona4'],);
				$cont++;
			}
			$ca= json_encode($arrayName);
			echo $ca;
		}

		function ventasRuta(){
			date_default_timezone_set("America/mendoza");//metodo para que la hora sea la de Chile
			$time = time(); //variable que almacena la hora local
			$mostrarAnio= date("Y", $time);
			mysql_set_charset('utf8');
			$sql="SELECT month(fecha_venta) as mes, sum(zona=1) as zona1, sum(zona=2) as zona2,sum(zona=3) as zona3,sum(zona=4) as zona4 from gas_ventasruta where fecha_venta BETWEEN '".$mostrarAnio."-01-01 00:00:00.000' AND '".$mostrarAnio."-12-31 23:59:59.999' group by month(fecha_venta);;";
			$sentencia=mysql_query($sql,$this->id_con);
			
			$cont=0;
			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
				if ($rs['mes']==1) {
					$nombreMes="Enero";
				} else if($rs['mes']==2){
					$nombreMes="Febrero";
				}else if ($rs['mes']==3) {
					$nombreMes="Marzo";
				} else if($rs['mes']==4){
					$nombreMes="Abril";
				} else if($rs['mes']==5){
					$nombreMes="Mayo";
				}else if ($rs['mes']==6) {
					$nombreMes="Junio";
				} else if($rs['mes']==7){
					$nombreMes="Julio";
				}else if ($rs['mes']==8) {
					$nombreMes="Agosto";
				} else if($rs['mes']==9){
					$nombreMes="Septiembre";
				} else if($rs['mes']==10){
					$nombreMes="Octubre";
				}else if ($rs['mes']==11) {
					$nombreMes="Noviembre";
				} else if($rs['mes']==12){
					$nombreMes="Diciembre";
				}
				
				$arrayName[$cont] = array("Mes" => $nombreMes , "a" => $rs['zona1'], "b" => $rs['zona2'], "c" => $rs['zona3'], "d" => $rs['zona4'],);
				$cont++;
			}
			$ca= json_encode($arrayName);
			echo $ca;
		}

// //······ se envia informacion para grafico de precio de compra de gas
// 		function chart15()
// 		{
// 			mysql_set_charset('utf8');
// 			$sql="SELECT * FROM gas_detallefaturas,gas_facturas WHERE gas_facturas.id=gas_detallefaturas.id_factura and gas_detallefaturas.detalle='Gas 15Kg' order by gas_detallefaturas.id asc";
// 			$sentencia=mysql_query($sql,$this->id_con);
			
// 			$cont=0;
			
// 			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
				
// 				//$arrayName[$cont] = $rs["direccion"];
// 				$arrayName[$cont] = array("Fecha" => $rs['fecha'] , "precio" => $rs['precio']);
// 				$cont++;
// 			}
// 			$ca= json_encode($arrayName);
// 			echo $ca;
// 		}

// //······ se envia informacion para grafico de precio de compra de gas
// 		function chart45()
// 		{
// 			mysql_set_charset('utf8');
// 			$sql="SELECT * FROM gas_detallefaturas,gas_facturas WHERE gas_facturas.id=gas_detallefaturas.id_factura and gas_detallefaturas.detalle='Gas 45Kg' order by gas_detallefaturas.id asc";
// 			$sentencia=mysql_query($sql,$this->id_con);
			
// 			$cont=0;
			
// 			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
				
// 				//$arrayName[$cont] = $rs["direccion"];
// 				$arrayName[$cont] = array("Fecha" => $rs['fecha'] , "precio" => $rs['precio']);
// 				$cont++;
// 			}
// 			$ca= json_encode($arrayName);
// 			echo $ca;
// 		}
// //########### cierre grafico de compras##########


// function chart5Venta(){
// 	mysql_set_charset('utf8');
// 	$sql="SELECT * FROM `gas_ventas` where `id_prod`=1";
// 	$sentencia=mysql_query($sql,$this->id_con);
			
// 			$cont=0;
			
// 			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
				
// 				//$arrayName[$cont] = $rs["direccion"];
// 				$arrayName[$cont] = array("Fecha" => $rs['fecha_venta'] , "precio" => $rs['precio_venta']);
// 				$cont++;
// 			}
// 			$ca= json_encode($arrayName);
// 			echo $ca;
// }
// function chart11Venta(){
// 	mysql_set_charset('utf8');
// 	$sql="SELECT * FROM `gas_ventas` where `id_prod`=2";
// 	$sentencia=mysql_query($sql,$this->id_con);
			
// 			$cont=0;
			
// 			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
				
// 				//$arrayName[$cont] = $rs["direccion"];
// 				$arrayName[$cont] = array("Fecha" => $rs['fecha_venta'] , "precio" => $rs['precio_venta']);
// 				$cont++;
// 			}
// 			$ca= json_encode($arrayName);
// 			echo $ca;
// }
// function chart15Venta(){
// 	mysql_set_charset('utf8');
// 	$sql="SELECT * FROM `gas_ventas` where `id_prod`=3";
// 	$sentencia=mysql_query($sql,$this->id_con);
			
// 			$cont=0;
			
// 			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
				
// 				//$arrayName[$cont] = $rs["direccion"];
// 				$arrayName[$cont] = array("Fecha" => $rs['fecha_venta'] , "precio" => $rs['precio_venta']);
// 				$cont++;
// 			}
// 			$ca= json_encode($arrayName);
// 			echo $ca;
// }
// function chart45Venta(){
// 	mysql_set_charset('utf8');
// 	$sql="SELECT * FROM `gas_ventas` where `id_prod`=4";
// 	//$sql='SELECT COUNT(id_prod) FROM gas_ventas WHERE fecha_venta BETWEEN "2016-01-01" AND "2016-04-30" GROUP BY MONTH(fecha_venta)';
// 	//$sql='SELECT count(*) AS cantidad,DATE(fecha_venta) as Fecha, id_prod, precio_venta  FROM `gas_ventas` group by id_prod,fecha_venta';
// 	$sentencia=mysql_query($sql,$this->id_con);
			
// 			$cont=0;
			
// 			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
				
// 				$arrayName[$cont] = array("Fecha" => $rs['fecha_venta'] , "precio" => $rs['precio_venta']);
// 				$cont++;
// 				//$arrayName[$cont] = $rs["direccion"];
				
// 			}
// 			$ca= json_encode($arrayName);
// 			echo $ca;
// }



}//cierre clase BaseDeDatos
?>