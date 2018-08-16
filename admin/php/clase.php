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

		function llenarTipoProveedores()
		{
			$sql="SELECT * FROM `gas_tipoProveedor`";
			$sentencia=mysql_query($sql,$this->id_con);
			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
				if ($rs["id"]==1) {
					echo '<label class="btn btn-warning btn-lg active">
					<input type="radio" name="options" id="option'.$rs["id"].'" value="'.$rs["id"].'" autocomplete="off" checked>'.$rs["nombre"].'</label>';
				}else{
					echo '
					<label class="btn btn-warning btn-lg">
					<input type="radio" name="options" value="'.$rs["id"].'" id="option'.$rs["id"].'" autocomplete="off">'.$rs["nombre"].'</label>';
				}



			}
}//cierre funcion llenarTipoProveedores

function insertarTipoProveedores($nombre,$descripcion,$idUsuario)
{
	$sql="SELECT count(*) FROM `gas_tipoProveedor` WHERE `nombre`='$nombre'";
	$sentencia=mysql_query($sql,$this->id_con);
	while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
		if ($rs[0]==1) {
			echo "El tipo ya existe asd";
		}else{
			$sql2="INSERT INTO `proyecto`.`gas_tipoProveedor` (`id`, `nombre`, `descripcion`) VALUES (NULL, '$nombre', '$descripcion')";
			$sentencia=mysql_query($sql2,$this->id_con);
			date_default_timezone_set("America/mendoza");//metodo para que la hora sea la de Chile
			$time = time(); //variable que almacena la hora local
			$sql3="INSERT INTO `proyecto`.`gas_accionescriticas` (`id_critica`, `id_usuario`, `accion`, `detalle`, `otro`, `fecha`) VALUES (NULL, '$idUsuario', 'Inserta', 'Inserta tipo de proveedor: \"$nombre\"', '','".date("Y-m-d (H:i:s)", $time)."');";
			$sentencia3=mysql_query($sql3,$this->id_con);
			echo "Se ha registrado correctamente el tipo";
		}
	}
	
}

function registrarProveedores($rut,$razonSocial,$giro,$direccion,$fono,$tipo,$idUsuario)
{	
	$sql1="SELECT count(*) FROM `gas_proveedores` WHERE `rut`='$rut'";
	$sentencia1=mysql_query($sql1,$this->id_con);
	while ($rs=mysql_fetch_array($sentencia1,MYSQL_BOTH)) {
		if ($rs[0]==1) {
			echo "El rut ingresado ya se encuentra registrado";
		}else{
			$sql="INSERT INTO `proyecto`.`gas_proveedores` (`id`, `rut`, `razonSocial`, `giro`, `direccion`, `fono`, `tipo`) VALUES (NULL, '$rut', '$razonSocial', '$giro', '$direccion', '$fono', '$tipo')";
			$sentencia=mysql_query($sql,$this->id_con);
			date_default_timezone_set("America/mendoza");//metodo para que la hora sea la de Chile
			$time = time(); //variable que almacena la hora local
			$sql3="INSERT INTO `proyecto`.`gas_accionescriticas` (`id_critica`, `id_usuario`, `accion`, `detalle`, `otro`, `fecha`) VALUES (NULL, '$idUsuario', 'Inserta', 'Registra un nuevo proveedor al sistema con rut: \"$rut\"', '','".date("Y-m-d (H:i:s)", $time)."');";
			$sentencia3=mysql_query($sql3,$this->id_con);
			echo "El proveedor se registro correctamente.";
		}
	}

}//cierre funcion regisgrar proveedores

function llenarComboProveedores()
{
	$sql="SELECT * FROM `gas_proveedores`";
	$sentencia=mysql_query($sql,$this->id_con);
	echo' <option value="0">Seleccione</option>';
	while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
		echo'
		<option value="'.$rs["id"].'">'.$rs["razonSocial"].' - '.$rs["rut"].'</option>
		';
	}
}//cierre llenar combo proveedores

function listarDatosProveedor($id)
{
	$sql="SELECT * FROM `gas_proveedores` where id=$id";
	$sentencia=mysql_query($sql,$this->id_con);
	while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
		
		echo '
		<div class="col-xs-4"><label >Razon social: '.$rs["razonSocial"].'</label></div>
		<div class="col-xs-3"><label >Giro: '.$rs["giro"].'</label></div>
		<div class="col-xs-3"><label >Direccion: '.$rs["direccion"].'</label></div>
		<div class="col-xs-2"><label >Telefono: '.$rs["fono"].'</label></div>';
		if ($rs["tipo"]=="1") {
			echo '<div class="form-group">
			<div class="col-xs-6">
			<label for="">Nº Factura</label>
			<input type="text" class="form-control" id="numeroFactura" onKeyPress="return solonumeros(event)" placeholder="">
			</div>
			<div class="col-xs-6">
			<label for="">Fecha</label>
			<input type="date" name="" id="fechaFactura" class="form-control" value="" required="required" title="">
			<input type="hidden" value="'.$rs["tipo"].'" id="idTipoHidden">
			</div>';
			$sql2="SELECT * FROM `gas_producto`";
			$sentencia2=mysql_query($sql2,$this->id_con);
			while ($rs2=mysql_fetch_array($sentencia2,MYSQL_BOTH)) {

				if ($rs2["id_producto"]=="1") {
					echo '	<form role="form" id="formInsumos">
					<legend>Insumos</legend>
					<div class="form-group">
					<div class="col-xs-3">
					<div class="form-group">
					<label for="">Detalle</label>
					<input type="text" class="form-control" readonly value="'.$rs2["nombre_producto"].'" id="producto1" >
					</div>
					</div>
					<div class="col-xs-2">
					<div class="form-group">
					<label for="">Cantidad</label>
					<input type="text" class="form-control" onKeyPress="return solonumeros(event)" onkeyup="sacarIva()" id="cantidad1" value="1">
					</div>
					</div>
					<div class="col-xs-3">
					<div class="form-group">
					<label for="">P.Unitario</label>
					<input type="text" class="form-control" onKeyPress="return solonumeros(event)" onkeyup="sacarIva()" id="precio1" >
					</div>
					</div>
					<div class="col-xs-2">
					<div class="form-group">
					<label for="">IVA</label>
					<input type="text" class="form-control" readonly id="iva1" >
					</div>
					</div>
					<div class="col-xs-2">
					<div class="form-group">
					<label for="">Total</label>
					<input type="text" class="form-control" readonly id="total1" >
					</div>
					</div>';
				}else{
					echo '
					<div class="col-xs-3">
					<div class="form-group">
					<input type="text" class="form-control" readonly value="'.$rs2["nombre_producto"].'" id="producto'.$rs2["id_producto"].'" >
					</div>
					</div>
					<div class="col-xs-2">
					<div class="form-group">
					<input type="text" class="form-control" onKeyPress="return solonumeros(event)" onkeyup="sacarIva()" id="cantidad'.$rs2["id_producto"].'" value="1">
					</div>
					</div>
					<div class="col-xs-3">
					<div class="form-group">
					<input type="text" class="form-control" onKeyPress="return solonumeros(event)" onkeyup="sacarIva()" id="precio'.$rs2["id_producto"].'" >
					</div>
					</div>
					<div class="col-xs-2">
					<div class="form-group">
					<input type="text" class="form-control" readonly id="iva'.$rs2["id_producto"].'" >
					</div>
					</div>
					<div class="col-xs-2">
					<div class="form-group">
					<input type="text" class="form-control" readonly id="total'.$rs2["id_producto"].'" >
					</div>
					</div>
					</div>				 



					</form>
					';
				}
			}
			echo '<div class="table-responsive">
			<p>Precios de compra anterior</p>
			<table class="table table-hover">
			<thead>
			<tr>
			<th>Gas 5Kg</th>
			<th>Gas 11Kg</th>
			<th>Gas 15Kg</th>
			<th>Gas 45Kg</th>
			</tr>
			</thead>
			<tbody>
			<tr>';
			$sqlU="SELECT * FROM gas_facturas,gas_detallefaturas where gas_facturas.id=gas_detallefaturas.id_factura and gas_facturas.proveedor=1 order by gas_facturas.id desc limit 4";
			$sentencia=mysql_query($sqlU,$this->id_con);
			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
				echo '                    
				<td>$'. number_format($rs["precio"],0,"",".").'</td>                    
				';
			}
			echo '</tr>
			</tbody>
			</table>
			</div>';
		}else{
			echo '<div class="form-group">
			<div class="col-xs-6">
			<label for="">Nº Factura</label>
			<input type="text" class="form-control" id="numeroFactura" onKeyPress="return solonumeros(event)" placeholder="">
			</div>
			<div class="col-xs-6">
			<label for="">Fecha</label>
			<input type="date" name="" id="fechaFactura" class="form-control" value="" required="required" title="">
			</div>

			<form role="form" id="formInsumos">
			<legend>Insumos</legend>
			<div class="form-group">
			<div class="col-xs-4">
			<label for="">Detalle</label>
			<input type="text" class="form-control" id="producto1" >
			</div>
			<div class="col-xs-2">
			<label for="">Cantidad</label>
			<input type="text" class="form-control" onKeyPress="return solonumeros(event)" onkeyup="sacarIva()" id="cantidad1" value="1">
			</div>
			<div class="col-xs-2">
			<label for="">P.Unitario</label>
			<input type="text" class="form-control" onKeyPress="return solonumeros(event)" onkeyup="sacarIva()" id="precio1" >
			</div>
			<div class="col-xs-2">
			<label for="">IVA</label>
			<input type="text" class="form-control" readonly id="iva1" >
			</div>
			<div class="col-xs-2">
			<label for="">Total</label>
			<input type="text" class="form-control" readonly id="total1" >
			</div>
			</div>				 



			</form>
			';}
		}

		if ($id=='0') {
			echo "Para Registrar Una Compra Seleccione Un Proveedor...";
		}

	}
	function registrarFactura($lista,$numeroFactura,$fechaFactura,$prov,$idUsuario)
	{
		$query="SELECT count(*) FROM proyecto.gas_facturas where nFactura=$numeroFactura";
		$sentenciaq=mysql_query($query,$this->id_con);
		while ($res=mysql_fetch_array($sentenciaq,MYSQL_BOTH)) {
			if ($res[0] == 1) {
				echo "El numero de factura ya esta registrado";
			} else {
				$sql="INSERT INTO `proyecto`.`gas_facturas` (`id`, `nFactura`, `fecha`, `proveedor`) VALUES (NULL, '$numeroFactura', '$fechaFactura', '$prov')";
				$sentencia=mysql_query($sql,$this->id_con);

				$sql1="SELECT * FROM `gas_facturas` order by `id` desc limit 1";
				$sentencia1=mysql_query($sql1,$this->id_con);
				while ($rs=mysql_fetch_array($sentencia1,MYSQL_BOTH)) {

					foreach ($lista as $prodc) {	 		
						$sql2="INSERT INTO `proyecto`.`gas_detalleFaturas` (`id`, `detalle`, `cantidad`, `precio`, `iva`, `total`, `id_factura`) VALUES (NULL, '$prodc->producto', '$prodc->cantidad', '$prodc->precio', '$prodc->iva', '$prodc->total', '".$rs["id"]."');";
						$sentencia2=mysql_query($sql2,$this->id_con);

						if ($prodc->producto == "Gas 5Kg") {
							 $sqlp="UPDATE gas_producto SET stock= stock+'$prodc->cantidad' WHERE nombre_producto='$prodc->producto';";
							$sentencia=mysql_query($sqlp,$this->id_con);
						} else if($prodc->producto == "Gas 11Kg"){
							 $sqlp="UPDATE gas_producto SET stock= stock+'$prodc->cantidad' WHERE nombre_producto='$prodc->producto';";
							$sentencia=mysql_query($sqlp,$this->id_con);
						}else if($prodc->producto == "Gas 15Kg"){
							 $sqlp="UPDATE gas_producto SET stock= stock+'$prodc->cantidad' WHERE nombre_producto='$prodc->producto';";
							$sentencia=mysql_query($sqlp,$this->id_con);
						}else if($prodc->producto == "Gas 45Kg"){
							 $sqlp="UPDATE gas_producto SET stock= stock+'$prodc->cantidad' WHERE nombre_producto='$prodc->producto';";
							$sentencia=mysql_query($sqlp,$this->id_con);
						}

						
					}	
				}
			date_default_timezone_set("America/mendoza");//metodo para que la hora sea la de Chile
			$time = time(); //variable que almacena la hora local
			$sql3="INSERT INTO `proyecto`.`gas_accionescriticas` (`id_critica`, `id_usuario`, `accion`, `detalle`, `otro`, `fecha`) VALUES (NULL, '$idUsuario', 'Inserta', 'Registra una nueva factura con número: \"$numeroFactura\"', '','".date("Y-m-d (H:i:s)", $time)."');";
			$sentencia3=mysql_query($sql3,$this->id_con);
			echo "Se ha registrado correctamente la factura...";	
		}

	}






}//cierre de registro de facturas
function mostrarFacturas($desde,$hasta){
	echo '<div class="table-responsive">
	<table class="table table-hover">
	<thead>
	<tr>
	<th>Fecha</th>
	<th>Nº de Factura</th>
	<th>Rut</th>
	<th>Razon Social</th>
	<th>Dirección</th>
	</tr>
	</thead>
	<tbody>';
	$sql="SELECT * FROM `gas_facturas`,`gas_proveedores` WHERE gas_facturas.proveedor=gas_proveedores.id and fecha between '$desde' and '$hasta' order by fecha desc";
	$sentencia=mysql_query($sql,$this->id_con);
	while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
		echo '
		<tr>
		<td>'.$rs["fecha"].'</td>
		<td>'.$rs["nFactura"].'</td>
		<td>'.$rs["rut"].'</td>
		<td>'.$rs["razonSocial"].'</td>
		<td>'.$rs["direccion"].'</td>
		</tr>
		';
	}
	echo '</tbody>
	</table>
	</div>';
}//cierre de mostrar las facturas en un rango de fechas

/**** Funcion que lista las ventas en un rango de fechas ***/
function mostrarVentas($desde,$hasta){
	echo '<div class="table-responsive">
	<table class="table table-hover">
	<thead>
	<tr>
	<th>Producto</th>
	<th>Cantidad Vendida</th>
	<th>Total de Ventas por Producto</th>
	<th>Detalle</th>
	</tr>
	</thead>
	<tbody>';
	$cantidad5=0;$cantidad11=0;$cantidad15=0;$cantidad45=0;
	$total5=0;$total11=0;$total15=0;$total45=0;$totalVenta=0;
	$sql="SELECT * FROM `gas_ventas`,`gas_producto` WHERE gas_ventas.id_prod=gas_producto.id_producto and fecha_venta between '$desde' and '$hasta' order by fecha_venta desc";
	$sentencia=mysql_query($sql,$this->id_con);
	while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
		if ($rs["carga"]=="5") {
			$total5+=$rs["precio_venta"];
			$cantidad5+=1;
		}elseif ($rs["carga"]=="11") {
			$total11+=$rs["precio_venta"];
			$cantidad11+=1;
		}elseif ($rs["carga"]=="15") {
			$total15+=$rs["precio_venta"];
			$cantidad15+=1;
		}elseif ($rs["carga"]=="45") {
			$total45+=$rs["precio_venta"];					
			$cantidad45+=1;
		}

	}

	echo '
	<tr>
	<td>Gas de 5KG</td>
	<td>'.$cantidad5.'</td>
	<td>$'.number_format($total5,0,"",".").'</td>
	<td><button type="button" class="btn btn-info" onclick="mostrarDetalleVentas(5)" >X</button></td>
	</tr>
	<tr>
	<td>Gas de 11KG</td>
	<td>'.$cantidad11.'</td>
	<td>$'.number_format($total11,0,"",".").'</td>
	<td><button type="button" class="btn btn-info" onclick="mostrarDetalleVentas(11)" >X</button></td>
	</tr>
	<tr>
	<td>Gas de 15KG</td>
	<td>'.$cantidad15.'</td>
	<td>$'.number_format($total15,0,"",".").'</td>
	<td><button type="button" class="btn btn-info" onclick="mostrarDetalleVentas(15)" >X</button></td>
	</tr>
	<tr>
	<td>Gas de 45KG</td>
	<td>'.$cantidad45.'</td>
	<td>$'.number_format($total45,0,"",".").'</td>
	<td><button type="button" class="btn btn-info" onclick="mostrarDetalleVentas(45)" >X</button></td>
	</tr>
	<tr>
	<td><b><u>Total de Ventas</u></b></td>
	<td ></td>

	<td><b><u>$'.number_format($total5+$total11+$total15+$total45,0,"",".").'</u></b></td>
	</tr>
	';
	echo '</tbody>
	</table>
	</div>';
}//cierre de mostrar las ventas totales en un rango de fechas


function mostrarDetalleVentas($desde,$hasta,$tipo)
{
	$sql="SELECT * FROM `gas_ventas`,`gas_producto`,`gas_datosusuario` WHERE gas_ventas.id_prod=gas_producto.id_producto AND gas_ventas.id_user=gas_datosusuario.id_user and carga='$tipo' and fecha_venta between '$desde' and '$hasta' order by fecha_venta desc";
	$sentencia=mysql_query($sql,$this->id_con);
	echo '<div class="table-responsive">
	<table class="table table-hover">
	<thead>
	<tr>
	<th>Fecha</th>
	<th>Cilindro</th>
	<th>Cliente</th>
	<th>Dirección</th>
	<th>Hora</th>
	</tr>
	</thead>
	<tbody>';
	while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
		echo "
		<tr>
		<td>".$rs["fecha_venta"]."</td>
		<td>".$rs["nombre_producto"]."</td>
		<td>".$rs["first_name"]." ".$rs["last_name"]."</td>
		<td>".$rs["direccion"]." ".$rs["numero"]."</td>
		<td>".$rs["hora"]."</td>

		</tr>";
	}
	echo '</tbody>
	</table>
	</div>';
}
function mostrarDetalleVentas2($tipo,$fecha)
{
	$sql="SELECT * FROM `gas_ventas`,`gas_producto`,`gas_datosusuario` WHERE gas_ventas.id_prod=gas_producto.id_producto AND gas_ventas.id_user=gas_datosusuario.id_user and carga='$tipo' and fecha_venta='$fecha' order by fecha_venta desc";
	$sentencia=mysql_query($sql,$this->id_con);
	echo '<div class="table-responsive">
	<table class="table table-hover">
	<thead>
	<tr>
	<th>Fecha</th>
	<th>Cilindro</th>
	<th>Cliente</th>
	<th>Dirección</th>
	<th>Hora</th>
	</tr>
	</thead>
	<tbody>';
	while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
		echo "
		<tr>
		<td>".$rs["fecha_venta"]."</td>
		<td>".$rs["nombre_producto"]."</td>
		<td>".$rs["first_name"]." ".$rs["last_name"]."</td>
		<td>".$rs["direccion"]." ".$rs["numero"]."</td>
		<td>".$rs["hora"]."</td>

		</tr>";
	}
	echo '</tbody>
	</table>
	</div>';
}//cierre mostrar detalle de ventas 2

function mostrarVentasPorDia($desde,$hasta){

	echo '<div class="table-responsive">
	<table class="table table-hover">
	<thead>
	<tr>
	<th>Fecha</th>
	<th>Total de Ventas por Dia</th>
	<td>Detalle</td>
	</tr>
	</thead>
	<tbody>';
	$cantidad5=0;$cantidad11=0;$cantidad15=0;$cantidad45=0;
	$total5=0;$total11=0;$total15=0;$total45=0;$totalVenta=0;
	$fechaaamostar=$desde;
	while(strtotime($hasta) >= strtotime($desde))
	{
		$sql="SELECT * FROM `gas_ventas` WHERE `fecha_venta`='$fechaaamostar'";
		$sentencia=mysql_query($sql,$this->id_con);
		while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
			$totalVenta+=$rs["precio_venta"];
		}

		if(strtotime($hasta) != strtotime($fechaaamostar))
		{			
			if ($totalVenta!=0) {																		
				echo "
				<tr>
				<td>".$fechaaamostar."</td>
				<td>$".number_format($totalVenta,0,"",".")."</td>
				<td><button type='button' class='btn btn-info' onclick='mostrarDetalleVentasPorDia2(\"$fechaaamostar\");' >X</button></td>
				</tr>
				";
			}
			$totalVenta=0;
			$fechaaamostar = date("Y-m-d", strtotime($fechaaamostar . " + 1 day"));

		}
		else
		{						
			if ($totalVenta!=0) {														
				echo "
				<tr>
				<td>".$fechaaamostar."</td>
				<td>$".number_format($totalVenta,0,"",".")."</td>
				<td><button type='button' class='btn btn-info' onclick='mostrarDetalleVentasPorDia2(\".$fechaaamostar.\")' >X</button></td>
				</tr>
				";

				$totalVenta=0;
			}
						//echo "$fechaaamostar<br />";
			break;
		}	



			}//cierre while comparacion de fechas
			echo '</tbody>
			</table>
			</div>';
}//cierre de mostrar las ventas totales por dia en un rango de fechas

function mostrarDetalleVentasPorDia($dia)
{
	echo '<div class="table-responsive">
	<table class="table table-hover">
	<thead>
	<tr>
	<th>Producto</th>
	<th>Cantidad Vendida</th>
	<th>Total de Ventas por Producto</th>
	<th>Detalle</th>
	</tr>
	</thead>
	<tbody>';
	$cantidad5=0;$cantidad11=0;$cantidad15=0;$cantidad45=0;
	$total5=0;$total11=0;$total15=0;$total45=0;$totalVenta=0;
	$sql="SELECT * FROM `gas_ventas`,`gas_producto` WHERE gas_ventas.id_prod=gas_producto.id_producto and fecha_venta='$dia' ";
	$sentencia=mysql_query($sql,$this->id_con);
	while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
		if ($rs["carga"]=="5") {
			$total5+=$rs["precio_venta"];
			$cantidad5+=1;
		}elseif ($rs["carga"]=="11") {
			$total11+=$rs["precio_venta"];
			$cantidad11+=1;
		}elseif ($rs["carga"]=="15") {
			$total15+=$rs["precio_venta"];
			$cantidad15+=1;
		}elseif ($rs["carga"]=="45") {
			$total45+=$rs["precio_venta"];					
			$cantidad45+=1;
		}

	}

	echo '
	<tr>
	<td>Gas de 5KG</td>
	<td>'.$cantidad5.'</td>
	<td>$'.number_format($total5,0,"",".").'</td>
	<td><button type="button" class="btn btn-info" onclick="mostrarDetalleVentas(5)" >X</button></td>
	</tr>
	<tr>
	<td>Gas de 11KG</td>
	<td>'.$cantidad11.'</td>
	<td>$'.number_format($total11,0,"",".").'</td>
	<td><button type="button" class="btn btn-info" onclick="mostrarDetalleVentas(11)" >X</button></td>
	</tr>
	<tr>
	<td>Gas de 15KG</td>
	<td>'.$cantidad15.'</td>
	<td>$'.number_format($total15,0,"",".").'</td>
	<td><button type="button" class="btn btn-info" onclick="mostrarDetalleVentas(15)" >X</button></td>
	</tr>
	<tr>
	<td>Gas de 45KG</td>
	<td>'.$cantidad45.'</td>
	<td>$'.number_format($total45,0,"",".").'</td>
	<td><button type="button" class="btn btn-info" onclick="mostrarDetalleVentas(45)" >X</button></td>
	</tr>
	<tr>
	<td><b><u>Total de Ventas</u></b></td>
	<td ></td>

	<td><b><u>$'.number_format($total5+$total11+$total15+$total45,0,"",".").'</u></b></td>
	</tr>
	';
	echo '</tbody>
	</table>
	</div>';
}
function mostrarDetalleVentasPorDia2($dia2)
{
	echo '<div class="panel-heading">Dia: '.$dia2.' ';
	echo '<div class="table-responsive">
	<table class="table table-hover">
	<thead>
	<tr>
	<th>Producto</th>
	<th>Cantidad Vendida</th>
	<th>Total de Ventas por Producto</th>
	<th>Detalle</th>
	</tr>
	</thead>
	<tbody>';
	$cantidad5=0;$cantidad11=0;$cantidad15=0;$cantidad45=0;
	$total5=0;$total11=0;$total15=0;$total45=0;$totalVenta=0;
	$sql="SELECT * FROM `gas_ventas`,`gas_producto` WHERE gas_ventas.id_prod=gas_producto.id_producto and fecha_venta='$dia2' ";
	$sentencia=mysql_query($sql,$this->id_con);
	while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
		if ($rs["carga"]=="5") {
			$total5+=$rs["precio_venta"];
			$cantidad5+=1;
		}elseif ($rs["carga"]=="11") {
			$total11+=$rs["precio_venta"];
			$cantidad11+=1;
		}elseif ($rs["carga"]=="15") {
			$total15+=$rs["precio_venta"];
			$cantidad15+=1;
		}elseif ($rs["carga"]=="45") {
			$total45+=$rs["precio_venta"];					
			$cantidad45+=1;
		}

	}

	echo "
	<tr>
	<td>Gas de 5KG</td>
	<td>".$cantidad5."</td>
	<td>$".number_format($total5,0,"",".")."</td>									
	<td><button type='button' class='btn btn-info' onclick='mostrarDetalleVentas2(5,\" $dia2 \")' >X</button></td>
	</tr>
	<tr>
	<td>Gas de 11KG</td>
	<td>".$cantidad11."</td>
	<td>$".number_format($total11,0,"",".")."</td>
	<td><button type='button' class='btn btn-info' onclick='mostrarDetalleVentas2(11,\" $dia2 \")' >X</button></td>
	</tr>
	<tr>
	<td>Gas de 15KG</td>
	<td>".$cantidad15."</td>
	<td>$".number_format($total15,0,"",".")."</td>
	<td><button type='button' class='btn btn-info' onclick='mostrarDetalleVentas2(15,\" $dia2 \")' >X</button></td>
	</tr>
	<tr>
	<td>Gas de 45KG</td>
	<td>".$cantidad45."</td>
	<td>$".number_format($total45,0,"",".")."</td>
	<td><button type='button' class='btn btn-info' onclick='mostrarDetalleVentas2(45,\" $dia2 \")' >X</button></td>
	</tr>
	<tr>
	<td><b><u>Total de Ventas</u></b></td>
	<td ></td>
	<td><b><u>$".number_format($total5+$total11+$total15+$total45,0,"",".")."</u></b></td>
	</tr>
	";
	echo '</tbody>
	</table>
	</div>';
}//cierre funcion ver detalla ventas por dia 2

/****** Listar sesiones de usuarios  ******/
function listarUltimaSesion()
{
	$sql="select gas_iniciosesion.id_user, max(fechainiciosesion) as fecha,gas_datosusuario.* from gas_iniciosesion,gas_datosusuario where gas_iniciosesion.id_user=gas_datosusuario.id_user group by gas_iniciosesion.id_user order by fecha desc";
	$sentencia=mysql_query($sql,$this->id_con);
	echo "<table class='table table-hover'>
	<thead>
	<tr>
	<th>Fecha</th>
	<th>Nombre</th>
	<th>tipo de Usuario</th>
	<th>Ver Detalle</th>
	</tr>
	</thead>
	<tbody>";
	while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
		echo "	<tr>
		<td>".$rs["fecha"]."</td>
		<td>".$rs["first_name"]." ".$rs["last_name"]." </td>
		<td>".$rs["user_type"]."</td>
		<td><button type='button' class='btn btn-info' onclick='mostrarDetalle(".$rs["id_user"].")'  value='".$rs["id_user"]."'>X</button></td>
		</tr>
		";
	}
	echo "</tbody>
	</table>";
}//cierre de listar ultima sesion de los usuarios

function mostrarDetalleUltimaSesion($id){
	$sql="SELECT * FROM `gas_iniciosesion`, gas_datosusuario WHERE gas_iniciosesion.id_user='$id' and gas_iniciosesion.id_user=gas_datosusuario.id_user ORDER BY fechaInicioSesion DESC";
	$sentencia=mysql_query($sql,$this->id_con);
	echo '<table class="table table-hover">
	<thead>
	<tr>
	<th>Fecha</th>
	<th>Rut</th>
	<th>Nombre</th>
	<th>Tipo de Usuario</th>
	</tr>
	</thead>
	<tbody>';
	while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
		echo "
		<tr>
		<td>".$rs["fechaInicioSesion"]."</td>
		<td>".$rs["first_name"]." ".$rs["last_name"]."</td>
		<td>".$rs["rut"]."</td>
		<td>".$rs["user_type"]."</td>
		</tr>
		";
	}
	echo "</tbody>
	</table>";
}



}//cierre clase base de datos

?>