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

		

		function cargar()
		{
			$sql="SELECT * FROM `gas_producto`";
			$sentencia=mysql_query($sql,$this->id_con);
				
				echo '<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Producto</th>
								<th>Precio</th>
								<th>Stock</th>
								<th>Stock Critico</th>
								<th>Modificar</th>
							</tr>
						</thead>
						<tbody>';

				while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
					echo "	<tr>
								<td>".$rs["nombre_producto"]."</td>
								<td>$".$rs["precio"]."</td>
								<td>".$rs["stock"]."</td>
								<td>".$rs["stock_min"]."</td>
								<td><button type='button' class='btn btn-default' onClick='modificar(".$rs["id_producto"].")'><i class='fa fa-gear fa-3x'></i></button></td>
							</tr>";
				}
				echo "</tbody>
					</table>
				</div>";
		}

	function modificar($id)
		{
			$sql="select * from gas_producto where id_producto=$id";
			$sentencia=mysql_query($sql,$this->id_con);
			
					while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {

					echo '<form role="form">						
						<input type="hidden" name="" id="txtId" class="form-control" value="'.$id.'">
						<input type="hidden" name="" id="txtPre" class="form-control" value="'.$rs["precio"].'">
						<div class="form-group">
							<label for="">Producto</label>
							<input type="text" class="form-control " value="'.$rs["nombre_producto"].'" id="" readonly placeholder="'.$rs["nombre_producto"].'">
						</div>
						<div class="form-group">
							<label for="">Precio de Venta</label>
							<input type="number" class="form-control" id="txtPrecio" value="'.$rs["precio"].'" placeholder="'.$rs["precio"].'" min="0">
						</div>
						<div class="form-group">
							<label for="">Stock</label>
							<input type="number" class="form-control" id="txtStock" value="'.$rs["stock"].'" placeholder="'.$rs["stock"].'" min="0">
						</div>	
						<div class="form-group">
							<label for="">Stock Minimo</label>
							<input type="number" class="form-control" id="txtStock_min" value="'.$rs["stock_min"].'" placeholder="'.$rs["stock_min"].'" min="0">
						</div>											
					</form>';

				}
		}

function actualizar($id,$precio,$stock,$stockMin){
	date_default_timezone_set("America/Santiago");//metodo para que la hora sea la de Chile
	$time = time();
	
			//busca el precio en la bd por si las moscas
	$sql="UPDATE `proyecto`.`gas_producto` SET `precio` = '$precio', `stock` = '$stock', `stock_min` = '$stockMin', `estado` = b'1' WHERE `gas_producto`.`id_producto` = $id;";
	$sentencia=mysql_query($sql,$this->id_con);
	echo "Se Modifico";
}
		






}//cierre clase BaseDeDatos
?>