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
			//$sql="SELECT * FROM proyecto.gas_camiones, proyecto.gas_datosusuario where gas_camiones.conductor=gas_datosusuario.id_datosUsuario or gas_camiones.conductor=null";
			$sql="SELECT * FROM proyecto.gas_camiones";
			//$sql="SELECT * FROM proyecto.gas_camiones, proyecto.gas_datosusuario where gas_camiones.conductor=gas_datosusuario.id_datosUsuario and gas_datosusuario.user_type='vendedor' and gas_camiones.conductor=1";
			$sentencia=mysql_query($sql,$this->id_con);
			
			echo "<div class='table-responsive'>
			<table class='table table-hover'>
				<thead>
					<tr>
						<th>Marca</th>
						<th>Modelo</th>
						<th>Patente</th>
						<th>Revision Tecnica</th>
						<th>Conductor</th>
						<th>Modificar</th>								
					</tr>
				</thead>
				<tbody>";


					while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
						$cond=$rs["conductor"];

						if ($cond==NULL) {
							$nombre="Sin Conductor";
							echo "<tr>
							<td>".$rs["marca"]."</td>
							<td>".$rs["modelo"]."</td>
							<td>".$rs["patente"]."</td>
							<td>".$rs["revision"]."</td>
							<td>".$nombre."</td>
							<td><button type='button' class='btn btn-default' onClick='modificar(".$rs["id_camion"].")'><i class='fa fa-gear fa-3x'></i></button></td>
						</tr>";
					}else{
								//$sql2="SELECT * FROM proyecto.gas_camiones, proyecto.gas_datosusuario where gas_camiones.conductor=gas_datosusuario.id_datosUsuario and gas_datosusuario.user_type='vendedor'";
						$sql2="SELECT * FROM proyecto.gas_datosusuario where id_datosUsuario=$cond";
						$sentencia2=mysql_query($sql2,$this->id_con);
						while ($rs2=mysql_fetch_array($sentencia2,MYSQL_BOTH)) {
							if ($rs["conductor"]!="") {
								$nombre=$rs2["first_name"]." ".$rs2["last_name"];
							} else {
								$nombre="Sin Conductor";
							}

							echo "<tr>
							<td>".$rs["marca"]."</td>
							<td>".$rs["modelo"]."</td>
							<td>".$rs["patente"]."</td>
							<td>".$rs["revision"]."</td>
							<td>".$nombre."</td>
							<td><button type='button' class='btn btn-default' onClick='modificar(".$rs["id_camion"].")'><i class='fa fa-gear fa-3x'></i></button></td>
						</tr>";


					}
				}




			}
			echo "		</tbody>
		</table>
	</div>";

		}//cierre funcion de cargar tabla de vendedores


		function ingresarCamion($marca,$modelo,$patente,$revision){


			$sql="INSERT INTO `proyecto`.`gas_camiones` VALUES (NULL, '$marca', '$modelo', '$patente', '$revision', NULL);";
			$sentencia=mysql_query($sql,$this->id_con);

			echo "Se Registro el camion...";




		}

		function modificar($id)
		{
			$sql="SELECT * FROM proyecto.gas_camiones where id_camion=$id";
			$sentencia=mysql_query($sql,$this->id_con);
			
			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {

				echo '<form role="form">

				<input type="hidden" name="" id="txtId" class="form-control" value="'.$id.'">
				<div class="form-group">
					<label for="">Marca</label>
					<input type="text" class="form-control " value="'.$rs["marca"].'" id="txtMarca" placeholder="'.$rs["marca"].'">
				</div>
				<div class="form-group">
					<label for="">Modelo</label>
					<input type="text" class="form-control" id="txtModelo" value="'.$rs["modelo"].'" placeholder="'.$rs["modelo"].'">
				</div>
				<div class="form-group">
					<label for="">Patente</label>
					<input type="text" class="form-control" id="txtPatente" value="'.$rs["patente"].'" placeholder="'.$rs["patente"].'">
				</div>
				<div class="form-group">
					<label for="">Revisión Tecnica</label>
					<input type="date" class="form-control" id="txtRevision" value="'.$rs["revision"].'" placeholder="'.$rs["revision"].'">
				</div>
				<div class="form-group">
					<label for="">Conductor</label>
					<select name="cboConductores" id="cboConductores" class="form-control">
						';
						if ($rs["conductor"]==NULL) {
							echo '<option value="0" selected>-- Sin Conductor --</option>';		
						}else{
							echo "<option value='0'>-- Sin Conductor --</option>";
						}
						$sql2="SELECT * FROM gas_datosusuario WHERE user_type='vendedor'";
						$sentencia=mysql_query($sql2,$this->id_con);
						while ($rs2=mysql_fetch_array($sentencia,MYSQL_BOTH)) {

							if ($rs["conductor"]==$rs2["id_datosUsuario"]) {
								echo "<option value=".$rs2["id_datosUsuario"]." selected>".$rs2["first_name"]." ".$rs2["last_name"]."</option>";
							} else {
								echo "<option value=".$rs2["id_datosUsuario"].">".$rs2["first_name"]." ".$rs2["last_name"]."</option>";
							}


						}

								/*<option value="1">Noroeste</option>
								<option value="2">Noreste</option>
								<option value="3">Suroeste</option>
								<option value="4">Sureste</option>*/

								echo '</select>
							</div>
						</form>';

					}
				}

				function actualizar($id,$marca,$modelo,$patente,$revision,$conductor){
	date_default_timezone_set("America/Santiago");//metodo para que la hora sea la de Chile
	$time = time();
	$disponible=true;
	if ($conductor==0) {
		$sql="UPDATE `proyecto`.`gas_camiones` SET `marca` = '$marca', `modelo`='$modelo', `patente`='$patente', revision='$revision', `conductor`=NULL WHERE `gas_camiones`.`id_camion` = $id;";
		$sentencia=mysql_query($sql,$this->id_con);
	} else {
		$sql2="SELECT * FROM gas_camiones where conductor=$conductor";
		$sentencia2=mysql_query($sql2,$this->id_con);
		while ($rs2=mysql_fetch_array($sentencia2,MYSQL_BOTH)) {

			if ($rs2[0]="0") {
				$disponible=true;
			} else {
				$sql4="SELECT * FROM gas_camiones where id_camion=$id";
				$sentencia4=mysql_query($sql4,$this->id_con);
				while ($rs4=mysql_fetch_array($sentencia4,MYSQL_BOTH)) {
					if ($rs4["conductor"]==$conductor) {
						$disponible=true;
					} else {
						$disponible=false;
					}					
				}				
			}

		}

		if ($disponible==true) {
			$sql3="UPDATE `proyecto`.`gas_camiones` SET `marca` = '$marca', `modelo`='$modelo', `patente`='$patente', revision='$revision', `conductor`=$conductor WHERE `gas_camiones`.`id_camion` = $id;";
			$sentencia3=mysql_query($sql3,$this->id_con);
		} else {
			echo "Camion Ocupado";
		}
		

		
		
	}

	
	
			//busca el precio en la bd por si las moscas
	//$sql="UPDATE `proyecto`.`gas_camiones` SET `marca` = '$marca', `modelo`='$modelo', `patente`='$patente', revision='$revision', `conductor`=$cond WHERE `gas_camiones`.`id_camion` = $id;";
	//$sql="UPDATE `proyecto`.`gas_camiones` SET `marca` = 'CHEVROLET', `modelo` = 'NKR', `patente` = 'BBDD01', `revision` = '2016-11-20', `conductor` = '3' WHERE `gas_camiones`.`id_camion` = 1;";
	
	echo "Se Modifico";
}/****  Cierre del ingreso de las ventas  ****/	









}//cierre clase BaseDeDatos
?>