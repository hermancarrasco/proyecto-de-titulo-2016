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

		

		
		/****  funcion para mostrar las direcciones registradas del cliente  ****/

		function pedidos($id){
			
			$sql="SELECT * FROM proyecto.gas_ventas, gas_producto where gas_ventas.id_prod=gas_producto.id_producto and id_user=$id order by fecha_venta desc;";
			$sentencia=mysql_query($sql,$this->id_con);
			echo '<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Fecha</th>
						<th>Hora</th>
						<th>Dirección</th>
						<th>Zona</th>
						<th>Producto</th>
						<th>Precio</th>
						<th>Estado</th>
					</tr>
				</thead>
				<tbody>';
					while($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)){

						
						
						if ($rs["estado"]==1) {
							$estado="Activo";
						} else {
							$estado="No Activo";
						}
						if ($rs["zona"]==1) {
							$zo="NOROESTE";
						} elseif ($rs["zona"]==2) {
							$zo="NORESTE";
						} elseif ($rs["zona"]==3){
							$zo="SUROESTE";
						}elseif ($rs["zona"]==4){
							$zo="SURESTE";		
						}


						echo '<tr>
						<td>'.$rs["fecha_venta"].'</td>
						<td>'.$rs["hora"].'</td>
						<td>'.$rs["direccion"].'</td>
						<td>'.$zo.'</td>
						<td>'.$rs["nombre_producto"].'</td>
						<td>'.$rs["precio_venta"].'</td>';
						if ($rs["entregado"]==1) {
							echo "<td>Entregado</td>";
						} else {

							echo '<td><button type="button" class="btn btn-default btn-lg" onClick="modificar('.$rs['id_venta'].')"><i class="glyphicon glyphicon-remove"><br>En Proceso/Cancelar</i></button></td>';
						}
						
						

					echo '</tr>
					';
				}
				echo '</tbody>
			</table>
		</div>';

	} // cierre de funcion de listar las direcciones


	/****  Funcion que llevas los datos del id para modificar   ****/

	function traerPedidos($id){
		$sql="SELECT * FROM gas_direcciones where id_direcciones='$id';";
		$sentencia=mysql_query($sql,$this->id_con);

		while($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)){

			if ($rs["calle"]==NULL) {
				$direccion=$rs["direccion"];								
			} else {
				$direccion=$rs["calle"]." ".$rs["numero"];
			}

			if ($rs["estado"]==1) {
				
				$estado='<option value="1" selected>Activo</option>
				<option value="0">Deshabilitar Dirección</option>';
			} else {
				$estado='<option value="1">Activo</option>
				<option value="0" selected>Deshabilitado</option>';
			}

			if ($rs["zona"]==1) {
				

				$zo='<option value="1" selected>NOROESTE</option>
				<option value="2">NORESTE</option>
				<option value="3">SUROESTE</option>
				<option value="4">SURESTE</option>';
			} elseif ($rs["zona"]==2) {
				$zo='<option value="1">NOROESTE</option>
				<option value="2" selected>NORESTE</option>
				<option value="3">SUROESTE</option>
				<option value="4">SURESTE</option>';
			} elseif ($rs["zona"]==3){
				$zo='<option value="1">NOROESTE</option>
				<option value="2">NORESTE</option>
				<option value="3" selected>SUROESTE</option>
				<option value="4">SURESTE</option>';
			}elseif ($rs["zona"]==4){
				$zo='<option value="1">NOROESTE</option>
				<option value="2">NORESTE</option>
				<option value="3">SUROESTE</option>
				<option value="4" selected>SURESTE</option>';	
			}

			echo '
			<form role="form">
				

				<div class="form-group">
					<label for="direccion">Dirección</label>
					<input type="text" class="form-control disabled" id="direccion" disabled placeholder="'.$direccion.'" value="'.$direccion.'">
				</div>
				<div class="form-group">
					<label for="">Estado</label>
					<select name="cboEstado" id="cboEstado" class="form-control" required="required">
						'.$estado.'
						
					</select>
				</div>
				<div class="form-group">
					<label for="">Zona</label>
					<select name="cboZona" id="cboZona" class="form-control" required="required">
						'.$zo.'
					</select>
				</div>

				<input type="hidden" id="idHidden" value="'.$id.'">

				

				
			</form>

			';



		}


	} //cierre funcion de traer datos de direccion



	/****  funcion de actualizacion de direccion   ****/

	function modificarPedidos($id){
		$sql="DELETE FROM `proyecto`.`gas_ventas` WHERE `gas_ventas`.`id_venta` = $id;";
		$sentencia=mysql_query($sql,$this->id_con);
	}





}//cierre BD
?>