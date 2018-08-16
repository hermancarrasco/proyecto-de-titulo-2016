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

		function direcciones($id){
			
			$sql="SELECT * FROM gas_direcciones where id_usuario='$id' and estado='1' order by zona desc;";
			$sentencia=mysql_query($sql,$this->id_con);
			echo '<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Dirección</th>
						<th>Zona</th>
						<th>Estado</th>
						<th>Configurar</th>
					</tr>
				</thead>
				<tbody>';
					while($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)){

						if ($rs["calle"]==NULL) {
							$direccion=$rs["direccion"];								
						} else {
							$direccion=$rs["calle"]." ".$rs["numero"];
						}

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
						<td>'.$direccion.'</td>
						<td>'.$zo.'</td>
						<td>'.$estado.'</td>
						<td><button type="button" class="btn btn-default btn-lg" onClick="modificar('.$rs['id_direcciones'].')"><i class="glyphicon glyphicon-wrench"></i></button></td>
					</tr>
					';
				}
				echo '</tbody>
			</table>
		</div>';

	} // cierre de funcion de listar las direcciones


	/****  Funcion que llevas los datos del id para modificar   ****/

	function traerDirecciones($id){
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

	function modificarDireccion($estado,$zona,$id){
		$sql="UPDATE `proyecto`.`gas_direcciones` SET `estado` = '$estado', `zona` = '$zona' WHERE `gas_direcciones`.`id_direcciones` = $id;";
		$sentencia=mysql_query($sql,$this->id_con);
	}





}//cierre BD
?>