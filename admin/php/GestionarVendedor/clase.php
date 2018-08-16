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
			$sql="select * from gas_datosusuario where user_type='vendedor'";
			$sentencia=mysql_query($sql,$this->id_con);

				echo "<div class='table-responsive'>
						<table class='table table-hover'>
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Apellido</th>
									<th>Rut</th>
									<th>Zona Asignada</th>
									<th>Modificar Zona</th>									
								</tr>
							</thead>
							<tbody>";
			
					while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {

						$zona=$rs["zona"];
						$zo="";
						if ($zona==0) {
							$zo="No Asignada";
						} else if ($zona==1) {
							$zo="Noroeste";
						}else if ($zona==2) {
							$zo="Noreste";
						}else if ($zona==3) {
							$zo="Suroeste";
						}else if ($zona==4) {
							$zo="Sureste";
						}else{
							$zo="No Definida";
						}
						
						echo "<tr>
									<td>".$rs["first_name"]."</td>
									<td>".$rs["last_name"]."</td>
									<td>".$rs["rut"]."</td>
									<td>".$zo."</td>
									<td><button type='button' class='btn btn-default' onClick='modificar(".$rs["id_datosUsuario"].")'><i class='fa fa-gear fa-3x'></i></button></td>
								</tr>";
				}
				echo "		</tbody>
						</table>
					</div>";
				
		}//cierre funcion de cargar tabla de vendedores

		function modificarZona($id)
		{
			$sql="select * from gas_datosusuario where user_type='vendedor' and id_datosUsuario=$id";
			$sentencia=mysql_query($sql,$this->id_con);
			
					while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {

					echo '<form role="form">
						
						<input type="hidden" name="" id="txtId" class="form-control" value="'.$id.'">
						<div class="form-group">
							<label for="">Nombre</label>
							<input type="text" class="form-control " value="'.$rs["first_name"].'" id="" readonly placeholder="'.$rs["first_name"].'">
						</div>
						<div class="form-group">
							<label for="">Apellido</label>
							<input type="text" class="form-control" id="" readonly placeholder="'.$rs["last_name"].'">
						</div>
						<div class="form-group">
							<label for="">Rut</label>
							<input type="text" class="form-control" id="" readonly placeholder="'.$rs["rut"].'">
						</div>
						<div class="form-group">
							<label for="">Zona</label>
							<select name="cboZonas" id="cboZonas" class="form-control">
								<option value="0">-- Seleccione Una Opción --</option>
								<option value="1">Noroeste</option>
								<option value="2">Noreste</option>
								<option value="3">Suroeste</option>
								<option value="4">Sureste</option>
							</select>
						</div>



					
						
					
						
					</form>';

				}
		}

		function actualizar($id,$zona){
	date_default_timezone_set("America/Santiago");//metodo para que la hora sea la de Chile
	$time = time();
	
			//busca el precio en la bd por si las moscas
	$sql="UPDATE `proyecto`.`gas_datosusuario` SET `zona` = '$zona' WHERE `gas_datosusuario`.`id_datosUsuario` = $id;";
	$sentencia=mysql_query($sql,$this->id_con);
	echo "Se Modifico";
}/****  Cierre del ingreso de las ventas  ****/	


		






}//cierre clase BaseDeDatos
?>