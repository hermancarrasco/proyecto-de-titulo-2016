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

		function mostrarIngresos()
		{
			$sql="select * from gas_accionescriticas,gas_datosusuario where gas_accionescriticas.id_usuario=gas_datosusuario.id_user and gas_accionescriticas.accion='Inserta' order by gas_accionescriticas.fecha desc";
			$sentencia=mysql_query($sql,$this->id_con);
			echo '<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Fecha</th>
						<th>Nombre</th>
						<th>Tipo de Usuario</th>
						<th>Detalle</th>
					</tr>
				</thead>
				<tbody>';
					while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {

					echo "
					<tr>
						<td>".$rs["fecha"]."</td>
						<td>".$rs["first_name"]." ".$rs["last_name"]."</td>
						<td>".$rs["user_type"]."</td>
						<td>".$rs["detalle"]."</td>
					</tr>";

				}
				echo "</tbody>
			</table>
		</div>";
		}
		function mostrarModificacion()
		{
			$sql="select * from gas_accionescriticas,gas_datosusuario where gas_accionescriticas.id_usuario=gas_datosusuario.id_user and gas_accionescriticas.accion='Modifica' order by gas_accionescriticas.fecha desc";
			$sentencia=mysql_query($sql,$this->id_con);
			echo '<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Fecha</th>
						<th>Nombre</th>
						<th>Tipo de Usuario</th>
						<th>Detalle</th>
					</tr>
				</thead>
				<tbody>';
					while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {

					echo "
					<tr>
						<td>".$rs["fecha"]."</td>
						<td>".$rs["first_name"]." ".$rs["last_name"]."</td>
						<td>".$rs["user_type"]."</td>
						<td>".$rs["detalle"]."</td>
					</tr>";

				}
				echo "</tbody>
			</table>
		</div>";
		}	
		function mostrarEliminacion()
		{
			$sql="select * from gas_accionescriticas,gas_datosusuario where gas_accionescriticas.id_usuario=gas_datosusuario.id_user and gas_accionescriticas.accion='Elimina' order by gas_accionescriticas.fecha desc";
			$sentencia=mysql_query($sql,$this->id_con);
			echo '<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Fecha</th>
						<th>Nombre</th>
						<th>Tipo de Usuario</th>
						<th>Detalle</th>
					</tr>
				</thead>
				<tbody>';
					while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {

					echo "
					<tr>
						<td>".$rs["fecha"]."</td>
						<td>".$rs["first_name"]." ".$rs["last_name"]."</td>
						<td>".$rs["user_type"]."</td>
						<td>".$rs["detalle"]."</td>
					</tr>";

				}
				echo "</tbody>
			</table>
		</div>";
	}






}//cierre clase BaseDeDatos
?>