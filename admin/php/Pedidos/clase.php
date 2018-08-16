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

		function llenarCboTipo()
		{
			$sql="SELECT * FROM `gas_producto`";
			$sentencia=mysql_query($sql,$this->id_con);
			echo "
				<option value='0'>-- Seleccione un Tipo de Gas --</option>
			";
					while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {

					echo "
						<option value='".$rs["id_producto"]."'>".$rs["nombre_producto"]."</option>
					";

				}
				
		}//cierre funcion de llenar combobox de tipo de gas

		function mostrarPrecio($id)
		{
			$sql="SELECT * FROM `gas_producto` where id_producto='$id'";
			$sentencia=mysql_query($sql,$this->id_con);
			
					while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {

					echo $rs["precio"];

				}
		}

		function venta($direccion,$gasTipo){
	date_default_timezone_set("America/Santiago");//metodo para que la hora sea la de Chile
	$time = time();
	$sql3="";
			//busca el precio en la bd por si las moscas
	$sql="SELECT * FROM `gas_producto` WHERE `id_producto`='$gasTipo'";
	$sentencia=mysql_query($sql,$this->id_con);
	while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {

		$sql2="INSERT INTO `proyecto`.`gas_ventas` VALUES (NULL, '".$rs["id_producto"]."', 1, '".$rs["precio"]."', '".date("Y-m-d (H:i:s)", $time)."','".date("H:i:s")."',0,0,'$direccion');";
		$sentencia2=mysql_query($sql2,$this->id_con);
		echo "mensaje de prueba";			
	}
}/****  Cierre del ingreso de las ventas  ****/	


		






}//cierre clase BaseDeDatos
?>