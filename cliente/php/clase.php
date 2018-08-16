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

		function imprimirComprobante($id,$dir,$tipo,$zona)
		{
			$sql="SELECT * FROM `gas_datosusuario` WHERE `id_user`=$id";
			$sentencia=mysql_query($sql,$this->id_con);
			$rut="";$nombre="";$apellido="";$telefono="";$celular="";
			while($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)){
				$rut=$rs["rut"];
				$nombre=$rs["first_name"];
				$apellido=$rs["last_name"];
				$telefono=$rs["telefono"];
				$celular=$rs["celular"];				
			}
			$sql2="SELECT * FROM `gas_producto` WHERE carga='$tipo'";
			$sentencia2=mysql_query($sql2,$this->id_con);
			$gasId="";$gasNombre="";$gasPrecio="";
			while($rs=mysql_fetch_array($sentencia2,MYSQL_BOTH)){
				$gasId=$rs["id_producto"];
				$gasNombre=$rs["nombre_producto"];
				$gasPrecio=$rs["precio"];
			}
			date_default_timezone_set("America/Santiago");//metodo para que la hora sea la de Chile
			
			$sql3="SELECT * FROM `gas_ventas` where `id_user`=$id order by `id_venta` desc limit 1";
			$sentencia3=mysql_query($sql3,$this->id_con);
			$numeroVenta=0;
			while ($rs=mysql_fetch_array($sentencia3,MYSQL_BOTH)) {
				$numeroVenta=$rs["id_venta"];
			}
			$sql4="select * from gas_datosusuario where user_type='vendedor' and zona=$zona";
			$sentencia4=mysql_query($sql4,$this->id_con);
			$nomVendedor=""; $fotoVendedor="";
			while ($rs=mysql_fetch_array($sentencia4,MYSQL_BOTH)) {
				$nomVendedor=$rs["first_name"]." ".$rs["last_name"];
				$fotoVendedor=$rs["foto"];
			}


			//$numeroVenta+=1;
			echo "<div id='contenidocbt' name='contenidocbt'>";
			echo"<div id='superior'>";
			echo"<div id='superior_izq'>";
			echo"<table>";
			echo"<tr>";
			echo"<td>";
			echo '<img src="../img/lipi.jpg" width="140" height="140" align="middle">';
			echo"</td>";
			echo"<td>";
			echo"<p id='titulo_izq'>GLPExpress.<p>";
			echo"<p id='giros'>Venta de Gas Licuado de Petroleo <br/>";
			echo"	Telefono: 072-565541<br/>";
			echo"	Email: contacto@GLPExpress.cl<br/>";
			echo"	</p>";
			echo"<p id='direccion'>Mi Direccion #666, Rancagua</p>";
			echo"</td>";
			echo"</tr>";
			echo"</table>"; 
			echo"</div>";
			echo"<div id='superior_der'>";
			echo"<center><p id='cuadro_der'> COMPROBANTE DE VENTA Nº ".$numeroVenta."<br/><br/><br/>";
			echo"GLPExpress</p><br/></center>";
			echo"</div>";
			echo"</div>";
			echo"<div id='centro_informacion'>";
			echo "<div id='datosUsuario'>";
			echo "<r1 id='subtitulo'>Rut: </r1>".$rut."<br/>";
			echo "<r1 id='subtitulo'>Nombre: </r1>".$nombre." ".$apellido."<br/>";
			echo "<r1 id='subtitulo'>Dirección: </r1>".$dir."<br/>";
			echo "<r1 id='subtitulo'>Telefono: </r1>".$telefono."<br/>";
			echo "<r1 id='subtitulo'>Celular: </r1>".$celular."<br/>";
			echo "</div>";
			echo"<div id='intermedio_detalle'>";
			echo"<center><p id='estilo_detalle'>DETALLE </p></center>";
			echo"<center>";
			echo "<r1 id='subtitulo'>Fecha de emision de comprobante: </r1>";
			echo date("d-m-Y");
			echo "<br/><r1 id='subtitulo'>Hora: </r1>";
			echo date("H:i:s");
			echo"<br/>____________________________________________<br/>";
			echo"</center>";
			echo "<br>";
			echo "
				
				<table border='1' height='100' width='100%' style='text-align:center;'>
					<thead>
						<tr>
							<th>Cantidad</th>
							<th>Producto</th>
							<th>Precio</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><r1 id='subtitulo'>1</r1></td>
							<td><r1 id='subtitulo'>".$gasNombre."</r1></td>
							<td><r1 id='subtitulo'>$".$gasPrecio."</r1></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
				</table>
				
			";	
			echo "<br>";
			//echo "<r1 id='subtitulo'>Tipo de Cilindro: </r1>".$gasNombre."<br/>";
			//echo "<r1 id='subtitulo'>Total a Pagar: </r1>$".$gasPrecio."<br/>";
			echo "
				<table border='1' height='100' width='100%' style='text-align:center;'>
					<thead>
						<tr>
							<th>Forma de Pago</th>
							<th>Estado de Pedido</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><r1 id='subtitulo'>Presencial</r1></td>
							<td><r1 id='subtitulo'>Vigente</r1></td>
						</tr>
					</tbody>
				</table>
			";

			echo "
				<table border='1' height='100' width='100%' style='text-align:center;'>
					<thead>
						<tr>
							<th>Repartidor</th>
							<th>Foto</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><r1 id='subtitulo'>".$nomVendedor."</r1></td>
							<td><r1 id='subtitulo'><img src='../../fotos/".$fotoVendedor."' height='135' width='135'></r1></td>
						</tr>
					</tbody>
				</table>
			";

			//echo "<br/><r1 id='subtitulo'>Forma de Pago: </r1> Presencial<br/>";		
			//echo "<r1 id='subtitulo2'>Estado: </r1>Vigente<br/><br/>";
			echo "<br><br><br><br><br><br><br><br><br>";
			echo "<br><r1 id='subtitulo'>Atendido Por: </r1> Pagina Web<br/><br/>";
			echo"</div>";
			
			echo "<center>Documento no valido como boleta, Recuerde solicitarla en el Local</center><br/>";
			echo "<center><p id='estilo_detalle'>GRACIAS SU PREFERENCIA!</p></center> ";
			echo"</div>";			
			echo"</div>";
		}
		/***** Cierre Generar comprobante *****/

		function direccion($id,$tipo)
		{

			$sql="SELECT * FROM `gas_direcciones` WHERE `id_usuario`=$id";
			$sentencia=mysql_query($sql,$this->id_con);
			echo '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingOne">
			<h4 class="panel-title">
			<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne'.$tipo.'" aria-expanded="true" aria-controls="collapseOne'.$tipo.'">
			Dirección ya registrada
			</a>
			</h4>
			</div>
			<div id="collapseOne'.$tipo.'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
			<div class="panel-body">
			<select name="" id="cboDireccion'.$tipo.'" class="form-control" required="required">';
			while($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)){
				$zona=$rs["zona"];

				if ($zona==1) {
					$zo="NO";
				} elseif ($zona==2) {
					$zo="NE";
				} elseif ($zona==3){
					$zo="SO";
				}elseif ($zona==4){
					$zo="SE";		
				}
				
				
				if ($rs["calle"]!="") {
					echo '<option value="'.$rs["calle"].' '.$rs["numero"].' ,'. $zona.'">'.$rs["calle"].' '.$rs["numero"].' '.$rs["direccion"]. ', '.$zo.' </option>';
				}else{
				echo '<option value="'.$rs["direccion"].' ,'. $zona.'">'.$rs["direccion"].', '.$zo.'</option>';
				}
			}
			echo '</select>	

			</div>
			<div class="form-group">

			<a class="btn btn-primary" data-toggle="modal" id="btnDireccionRegistrada" href="#modalConfirmar" onclick="datosPedido('.$tipo.')">Confirmar Pedido</a>
			</div>  
			</div>
			</div>

			<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingTwo">
			<h4 class="panel-title">
			<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo'.$tipo.'" aria-expanded="false" aria-controls="collapseTwo'.$tipo.'">
			Dirección nueva
			</a>
			</h4>
			</div>
			<div id="collapseTwo'.$tipo.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
			<div class="panel-body text-center">

			
			<legend>Busque su Direccion</legend>
			<div class="form-inline">
			<div class="form-group  has-feedback">
			<label class="control-label" for="inputWarning2">Ingrese dirección nueva</label>
			<input type="text" class="form-control" id="direccion'.$tipo.'" onKeyPress="return validar'.$tipo.'(event)" placeholder="Av España 1500, Rancagua" aria-describedby="inputWarning2Status">
			
			<span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
			<span id="inputWarning2Status" class="sr-only">(warning)</span>
			</div>
			<button type="button" class="btn btn-primary" id="btnBuscar" onclick="buscarGeo('.$tipo.')">Buscar Dirección</button>
			</div>
			<p id="cargando" style="display:none">Cargando...</p>
			<div class="text-center" style="width:100%; height: 500px;margin: 0;padding: 0;text-align:center;">
			<div id="mapa'.$tipo.'" style="height: 100%;">
			
			</div>
			</div>

			</div>		
			
			
			<select name="cboZona'.$tipo.'" id="cboZona'.$tipo.'" class="form-control" required="required">
                                                            <option value="0">Seleccione Zona de Domicilio</option>
                                                            <option value="1">NOROESTE</option>
                                                            <option value="2">NORESTE</option>
                                                            <option value="3">SUROESTE</option>
                                                            <option value="4">SURESTE</option>
                                                        </select>
			<a class="btn btn-primary" data-toggle="modal" id="btnDireccionNueva" onclick="datosPedidoNewDir('.$tipo.')">Confirmar Pedido</a>
			

			</div>
			</div>
			</div>

			</div>';
		}
		/****  Cierre direccion del cliente  ****/
		function venta($idUsuario,$gasTipo,$dirUsuario,$zona){
	date_default_timezone_set("America/Santiago");//metodo para que la hora sea la de Chile
	$time = time();
	$sql3="";
			//busca el precio en la bd por si las moscas
	$sql="SELECT * FROM `gas_producto` WHERE `carga`=$gasTipo";
	$sentencia=mysql_query($sql,$this->id_con);
	while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {

		$sql2="INSERT INTO `proyecto`.`gas_ventas` VALUES (NULL, '".$rs["id_producto"]."', '$idUsuario', '".$rs["precio"]."', '".date("Y-m-d (H:i:s)", $time)."','".date("H:i:s")."',0,0,'$dirUsuario','$zona');";// cambiar zona por una sentencia sql
		$sentencia2=mysql_query($sql2,$this->id_con);
		echo "Pedido Realizado!";			
	}
}/****  Cierre del ingreso de las ventas  ****/	

/****  Registra una nueva direccion del cliente  ****/
	function nuevaDireccion($dir,$id,$zona)
	{
		$sql="INSERT INTO `proyecto`.`gas_direcciones` (`id_direcciones`, `latitud`, `longitud`, `calle`, `numero`, `direccion`, `estado`,`zona`, `id_usuario`) VALUES (NULL, NULL, NULL, NULL, NULL, '$dir', '1','$zona', '$id');";
		$sentencia=mysql_query($sql,$this->id_con);
		echo "Se registro la direccion";

	}
/****    ****/
/****    ****/
/****    ****/
}//cierre BD
?>