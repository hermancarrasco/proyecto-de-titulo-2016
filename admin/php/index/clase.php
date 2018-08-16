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
			$cont=0;
			for ($i=1; $i <5 ; $i++) { 
				# code...

				$sql="SELECT count(*) as total from gas_ventas where id_prod=".$i." and fecha_venta='".date("Y-m-d")."'";
				$sentencia=mysql_query($sql,$this->id_con);

				if ($i==1) {
					$Cilindro="Gas de 5Kg";
				} elseif ($i==2) {
					$Cilindro="Gas de 11Kg";
				}elseif ($i==3) {
					$Cilindro="Gas de 15Kg";
				}else{
					$Cilindro="Gas de 45Kg";
				}
				
				

				while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {

				//$arrayName[$cont] = $rs["direccion"];
					$arrayName[$cont] = array("label" => $Cilindro , "value" => $rs['total']);
					$cont++;
				}
			}
			$ca= json_encode($arrayName);
			echo $ca;
		}

		function revisionCamiones(){

			$sql="SELECT * from gas_camiones order by revision asc limit 2;";
			$sentencia=mysql_query($sql,$this->id_con);
			$fecha = date('Y-m-d');
			$nuevafecha = strtotime ( '+1 day' , strtotime ( $fecha ) ) ;
			$nuevafecha = date ( 'Y-m-d' , $nuevafecha );


			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {

				if ($rs["conductor"]==NULL) {

					echo "<div class='well'>";
					if (date("Y-m-d")==$rs["revision"]) {
						echo'<div class="alert alert-danger" role="alert">Revision Técnica Vence Hoy</div>';
					}elseif (date("Y-m-d")>$rs["revision"]) {
						echo'<div class="alert alert-danger" role="alert">Revision Técnica Vencida</div>';
					}elseif ($nuevafecha == $rs["revision"]) {
						echo '<div class="alert alert-warning" role="alert">Revisión Técnica Vence Mañana</div>';
					}
					echo "<h4>Marca: <small>".$rs["marca"]."</small></h4>";
					echo "<h4>Modelo: <small>".$rs["modelo"]."</small></h4>";
					echo "<h4>Patente: <small>".$rs["patente"]."</small></h4>";
					echo "<h4>Revisión: <small>".$rs["revision"]."</small></h4>";
					echo "<h4>Conductor: <small>Sin Conductor...</small></h4>";
					echo "</div>";
				}else{
					$sql2="SELECT * from gas_datosusuario where id_datosUsuario = ".$rs["conductor"].";";
					$sentencia2=mysql_query($sql2,$this->id_con);

					while ($rs2=mysql_fetch_array($sentencia2,MYSQL_BOTH)) {



						echo "<div class='well'>";
						if (date("Y-m-d")==$rs["revision"]) {
							echo'<div class="alert alert-danger" role="alert">Revision Técnica Vence Hoy</div>';
						}elseif (date("Y-m-d")>$rs["revision"]) {
							echo'<div class="alert alert-danger" role="alert">Revision Técnica Vencida</div>';
						}elseif ($nuevafecha == $rs["revision"]) {
							echo '<div class="alert alert-warning" role="alert">Revisión Técnica Vence Mañana</div>';
						}
						echo "<h4>Marca: <small>".$rs["marca"]."</small></h4>";
						echo "<h4>Modelo: <small>".$rs["modelo"]."</small></h4>";
						echo "<h4>Patente: <small>".$rs["patente"]."</small></h4>";
						echo "<h4>Revisión: <small>".$rs["revision"]."</small></h4>";
						echo "<h4>Conductor: <small>".$rs2["first_name"]." ".$rs2["last_name"]."</small></h4>";
						echo "</div>";
					}
				}


			}


		}

		function stockCritico(){

			$sql2="SELECT * FROM proyecto.gas_producto;";
			$sentencia2=mysql_query($sql2,$this->id_con);
			echo '<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Producto</th>
							<th>Stock</th>
						</tr>
					</thead>
					<tbody>';

			while ($rs=mysql_fetch_array($sentencia2,MYSQL_BOTH)) {
				if ($rs["stock"]<=$rs["stock_min"]) {
					echo'<div class="alert alert-danger" role="alert">Stock Critico '.$rs["nombre_producto"].'</div>';
				} else if($rs["stock"]<= (intval($rs["stock_min"] * 0.5) + intval($rs["stock_min"]))) {
					echo'<div class="alert alert-warning" role="alert">Stock Medio '.$rs["nombre_producto"].'</div>';
				}
				
				
				echo "<tr>
							<td>".$rs["nombre_producto"]."</td>
							<td>".$rs["stock"]."</td>
						</tr>";
					//	echo intval($rs["stock_min"] * 0.5) + intval($rs["stock_min"])."<br>";
			}
			
			echo "</tbody>
				</table>
			</div>";
		}



}//cierre clase BaseDeDatos
?>