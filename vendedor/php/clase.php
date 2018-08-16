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
			
			$this->id_con=mysql_connect($this->ser,$this->usu,$this->pas); //cineccion a la BD
			if(!$this->id_con){
				die("Error en la conexion con la BD");
			}
			$this->id_bd=mysql_select_db($this->bd,$this->id_con); //Seleccion de la BD
			if(!$this->id_bd){
				die("Error en la seleccion de la BD");
			}
			mysql_set_charset('utf8');
		}
		function desconectarBD(){
			mysql_close($this->id_con);
		}

		
		/****  Funcion para mostrar pedidos en el mapa  ****/
		function mostrarPedidos($zona)
		{

			$arrayName = "";
			$ca=0;
			mysql_set_charset('utf8');
			$sql="SELECT * FROM proyecto.gas_ventas where gas_ventas.entregado=0 and zona=$zona order by id_venta asc;";
			$sentencia=mysql_query($sql,$this->id_con);
			
			$cont=0;
			
			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
				
				$arrayName[$cont] = $rs["direccion"];
				$cont++;
			}
//print_r($arrayName);
			
			try {
				if($arrayName!=""){
					$ca= json_encode($arrayName);				
				}
				
			} catch (Exception $e) {
				$ca=0;
			}

			echo $ca;
			
		}


		function llenarCboTipo()
		{
			$sql="SELECT * FROM `gas_producto`";
			$sentencia=mysql_query($sql,$this->id_con);
			echo "
			<option value='0'>Seleccione un Tipo de Gas</option>
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



		/****  registrar venta en ruta  ****/

		function registrarVentaRuta($prod,$precio,$cantidad,$lat,$lon,$direccion,$zona)
		{
		date_default_timezone_set("America/mendoza");//metodo para que la hora sea la de Chile
			$time = time(); //variable que almacena la hora local

		$sql="INSERT INTO `proyecto`.`gas_ventasruta` VALUES (NULL, '$prod', '$precio', '$cantidad', '".date('Y-m-d')."', '".date("H:i:s", $time)."', '$lat', '$lon', '$direccion', '$zona');";

			$sentencia=mysql_query($sql,$this->id_con);
			echo "Se registro la venta";

		$sql2="UPDATE gas_producto SET stock= stock-'$cantidad' WHERE id_producto='$prod'";
		$sentencia=mysql_query($sql2,$this->id_con);


		}

		



		/****    ****/
}//cierre BD
?>