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
		function login($usuario, $pass){
			//script para el inicio de sesion
			$sql="SELECT * from gas_users,gas_datosUsuario where gas_users.user_email='".mysql_real_escape_string($usuario)."' and gas_users.user_pass='".mysql_real_escape_string($pass)."' and gas_users.id_user=gas_datosUsuario.id_user";
			$sentencia=mysql_query($sql,$this->id_con);
			
			if($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)){


				$sqlfechasesionAnterior="SELECT * FROM `gas_inicioSesion` WHERE `id_user`=".$rs["id_user"]." ORDER BY `fechaInicioSesion` DESC LIMIT 1";
				$sentenciaSesionAnterior=mysql_query($sqlfechasesionAnterior,$this->id_con);
				

				if ($rs["user_type"]=="admin") {
					
					session_start();
					if($rsfechaAnterior=mysql_fetch_array($sentenciaSesionAnterior,MYSQL_BOTH)){
						if ($rsfechaAnterior["fechaInicioSesion"]!="") {						
							$_SESSION["inicioAnterior"]=$rsfechaAnterior["fechaInicioSesion"];
						}else{
							$_SESSION["inicioAnterior"]="";
						}
					}
					$_SESSION["tipoUsuario"]=$rs["user_type"];
					$_SESSION["display_name"]=$rs["display_name"];
					$_SESSION["idUsuario"]=$rs["id_user"];
				//$_SESSION["passwd"]=$rs["passwd"];
				//header("location:plataforma.php");
				header("location:admin/index.php");//Redirecciona al panel de administracion
			}elseif ($rs["user_type"]=="cliente") {
					session_cache_expire(15); //la cantidad de minutos que dura la sesion (15 minutos)
					session_start();
					if($rsfechaAnterior=mysql_fetch_array($sentenciaSesionAnterior,MYSQL_BOTH)){
						if ($rsfechaAnterior["fechaInicioSesion"]!=NULL) {						
							$_SESSION["inicioAnterior"]=$rsfechaAnterior["fechaInicioSesion"];
						}else{
							$_SESSION["inicioAnterior"]="";
						}
					}
					$_SESSION["idUsuario"]=$rs["id_user"];
					$_SESSION["tipoUsuario"]=$rs["user_type"];
					$_SESSION["display_name"]=$rs["display_name"];				

				header("location:cliente/index.php");//Redirecciona a la pagina solicita.php
			}elseif ($rs["user_type"]=="vendedor") {
				session_start();
				if($rsfechaAnterior=mysql_fetch_array($sentenciaSesionAnterior,MYSQL_BOTH)){
					if ($rsfechaAnterior["fechaInicioSesion"]!="") {						
						$_SESSION["inicioAnterior"]=$rsfechaAnterior["fechaInicioSesion"];
					}else{
						$_SESSION["inicioAnterior"]="";
					}
				}
				$_SESSION["tipoUsuario"]=$rs["user_type"];
				$_SESSION["display_name"]=$rs["display_name"];
				$_SESSION["zona"]=$rs["zona"];
				//header("location:plataforma.php");
				header("location:vendedor/index.php");//Redirecciona al panel de vendedor
			}
				date_default_timezone_set("America/mendoza");//metodo para que la hora sea la de Chile
			$time = time(); //variable que almacena la hora local

				//Se guarda la fecha y hora del inicio de sesion
			$sqlfechasesion="INSERT INTO `proyecto`.`gas_inicioSesion` (`id_inicioSesion`, `id_user`, `fechaInicioSesion`) VALUES (NULL, '".$rs["id_user"]."', '".date("Y-m-d (H:i:s)", $time)."');";
			$sentencia=mysql_query($sqlfechasesion,$this->id_con);

		}else {
				//Si no se encuentra el usuario se manda un mensaje encriptado
			header("location: index.php?msg=".md5(1)."");
		}

	}

	function sesionusuario(){
		//funcion para que aparesca un link en la pagina principal
		//cuando ya a iniciado sesion un cliente
		if ($_SESSION["tipoUsuario"]=="cliente") {
			echo '<li><a href="cliente/index.php">Hacer Pedido</a></li>';
		}

	}

	function controlarSesion(){
		//si el usuario no esta logeado se manda a la pagina principa
		//con un mensaje encriptado
		session_start();
		
		if(!isset($_SESSION["display_name"])){
			//se redirecciona a la pagina principal
			header("location: ../index.php?msg=".md5(2)."");
		}
	}
	function cerrarSesion(){
		//funcion para cerrar sesion
		session_start();
		session_unset();
		session_destroy();
		header("location: ../index.php?msg=".md5(3)."");
		//redirecciona a la pagina principan con un mensaje encriptado
	}


	
	function faq(){		
		//funcion que muestra las preguntas frecuentes de la pagina
		$sql="select * from gas_faq";

		$sentencia=mysql_query($sql,$this->id_con);

		while($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)){

			echo '<div class="row">
			<ul class="list-group">';
				echo '<li class="list-group-item"><p>'.$rs['pregunta'].'</p></li>
				<li class="list-group-item"><p>'.$rs['respuesta'].'</p></li>';
				if ($rs['link']!="") {					
					echo '<li class="list-group-item"><a href="'.$rs['link'].'">LINK</a></li>	';
				}
				echo '</ul> </div>';			
			}

		}
		//funcion para ingresar un cliente nuevo
		function ingresarUsuario($mail,$rut,$pas,$nom,$ape,$tel,$cel,$dir,$num,$dep,$zona){
			date_default_timezone_set("America/mendoza");//metodo para que la hora sea la de Chile
			$time = time(); //variable que almacena la hora local
			
			//$contar cuenta todas las filas de la tabla gas_users
			$contar="SELECT * FROM gas_users order by id_user desc limit 1";
			$sentenciacontar=mysql_query($contar,$this->id_con);
			while($countusers=mysql_fetch_array($sentenciacontar,MYSQL_BOTH)){
				$numeroDeUsuarios=$countusers["id_user"]+1; //se suma uno a la cantidad de filas para el FK de gas_usermeta
			}//cierre while de contar numero de filas

			//se busca alguna coincidencia con el correo que viene desde la variable $mail para ingresarlo si no existe.
			$buscarCoincidencia = "SELECT count(*) FROM `gas_users` WHERE `user_email`='$mail'";
			$sentenciaCoincidencia=mysql_query($buscarCoincidencia,$this->id_con);
			while($rs=mysql_fetch_array($sentenciaCoincidencia,MYSQL_BOTH)){
				if ($rs[0] == '1') { //si $rs[0] es igual a 1 significa que ya esta registrado el correo
					echo "El correo ingresado ya esta registrado";
				}elseif($rs[0]=='0') { //si $rs[0] es igual a 0 significa que no existe el correo en la BD

					//sql2= inserta los datos del cliente en la base de datos
					$sql2="INSERT INTO `proyecto`.`gas_users` (`id_user`, `user_pass`, `user_email`, `user_fecha_registro`, `user_status`, `display_name`) VALUES (NULL,'".mysql_real_escape_string($pas)."','$mail','".date("Y-m-d (H:i:s)", $time)."', 1 ,'$nom')";
					$sentencia=mysql_query($sql2,$this->id_con);
					
					$sql3="INSERT INTO `proyecto`.`gas_datosUsuario` VALUES (NULL,'$nom','$nom','$ape','cliente','$tel','$cel','$rut','$dir','$num','$dep','$zona',NULL,$numeroDeUsuarios)";
					$sentencia=mysql_query($sql3,$this->id_con);

					$sql4="INSERT INTO `proyecto`.`gas_direcciones` (`id_direcciones`, `latitud`, `longitud`, `calle`, `numero`, `direccion`, `estado`, `zona`, `id_usuario`) VALUES (NULL, NULL, NULL, '$dir', '$num,', '$dep', '1', '$zona', '$numeroDeUsuarios');";
					$sentencia=mysql_query($sql4,$this->id_con);
					echo "Registro de usuario correcto...";


					$destinatario = $mail; 
					$asunto = "Activar Nuevo Usuario"; 
					$cuerpo = ' 
					<html> 
					<head> 
						<title>Activacion de cuenta GLPExpress</title> 
					</head> 
					<body>
						<h1>Hola '.$nom." ".$ape.'!</h1>
						<h3>Para activar la cuenta haz click en el enlace.</h3> 
						<p> 
							<a href="http://www.google.cl" target="_blank"></a>
						</p>
						
						
					</body> 
					</html> '; 
					$headers = "MIME-Version: 1.0\r\n"; 
					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
					$headers .= "From: GLPExpress<no-reply@GLPExpress.cl>\r\n"; 

//direcciones que recibián copia 
//$headers .= "Cc: aaa@correo.cl\r\n"; 
					mail($destinatario,$asunto,$cuerpo,$headers);

					
				}//cierre de if para la coincidencia
			}//cierre while de buscar coincidencia
		}//cierre ingresarusuario

		function carga5(){
		//cargar los datos del producto 5kg
			$sql="SELECT * FROM `gas_producto` WHERE `id_producto`=1";
			$sentencia=mysql_query($sql,$this->id_con);
			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
				echo '			
				<div class="row">
					<div class="col-xs-12"><div class="well"><p>Cilindro de '.$rs["nombre_producto"].'</p></div></div>';
					if ($rs["descripcion"]=="") {

					}else{
						echo '<div class="col-xs-12"><div class="well"><p>Descripcion: '.$rs["descripcion"].'</p></div></div>';
					}
					echo '<div class="col-xs-12"><div class="well"><p>Precio: $'.$rs["precio"].'</p></div></div>
					<div class="col-xs-12"><div class="well"><p> Stock: '.$rs["stock"].'</p></div></div>
					<div class="col-xs-12 hidden" id="colhidden5"><div class="well"><p>Pedido realizado con exito</p></div></div>
				</div>';

			}
		}
		function carga11(){
//cargar los datos del producto 11kg
			$sql="SELECT * FROM `gas_producto` WHERE `id_producto`=2";
			$sentencia=mysql_query($sql,$this->id_con);
			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
				echo '			
				<div class="row">
					<div class="col-xs-12"><div class="well"><p>Cilindro de '.$rs["nombre_producto"].'</p></div></div>';
					if ($rs["descripcion"]=="") {

					}else{
						echo '<div class="col-xs-12"><div class="well"><p>Descripcion: '.$rs["descripcion"].'</p></div></div>';
					}
					echo '<div class="col-xs-12"><div class="well"><p>Precio: $'.$rs["precio"].'</p></div></div>
					<div class="col-xs-12"><div class="well"><p> Stock: '.$rs["stock"].'</p></div></div>
					<div class="col-xs-12 hidden" id="colhidden11"><div class="well"><p>Pedido realizado con exito</p></div></div>
				</div>';

			}
		}
		function carga15(){
//cargar los datos del producto 15kg
			$sql="SELECT * FROM `gas_producto` WHERE `id_producto`=3";
			$sentencia=mysql_query($sql,$this->id_con);
			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
				echo '			
				<div class="row">
					<div class="col-xs-12"><div class="well"><p>Cilindro de '.$rs["nombre_producto"].'</p></div></div>';
					if ($rs["descripcion"]=="") {

					}else{
						echo '<div class="col-xs-12"><div class="well"><p>Descripcion: '.$rs["descripcion"].'</p></div></div>';
					}
					echo '<div class="col-xs-12"><div class="well"><p>Precio: $'.$rs["precio"].'</p></div></div>
					<div class="col-xs-12"><div class="well"><p> Stock: '.$rs["stock"].'</p></div></div>
					<div class="col-xs-12 hidden" id="colhidden15"><div class="well"><p>Pedido realizado con exito</p></div></div>
				</div>';

			}
		}
		function carga45(){
		//cargar los datos del producto 45kg
			$sql="SELECT * FROM `gas_producto` WHERE `id_producto`=4";
			$sentencia=mysql_query($sql,$this->id_con);
			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
				echo '			
				<div class="row">
					<div class="col-xs-12"><div class="well"><p>Cilindro de '.$rs["nombre_producto"].'</p></div></div>';
					if ($rs["descripcion"]=="") {

					}else{
						echo '<div class="col-xs-12"><div class="well"><p>Descripcion: '.$rs["descripcion"].'</p></div></div>';
					}
					echo '<div class="col-xs-12"><div class="well"><p>Precio: $'.$rs["precio"].'</p></div></div>
					<div class="col-xs-12"><div class="well"><p> Stock: '.$rs["stock"].'</p></div></div>
					<div class="col-xs-12 hidden" id="colhidden45"><div class="well"><p>Pedido realizado con exito</p></div></div>
				</div>';

			}
		}

//lista todos los pedidos en una tabla en el panel de administracion
		function listarPedidos(){
			$sql="SELECT * FROM gas_ventas,gas_users,gas_datosUsuario,gas_producto WHERE gas_ventas.id_user=gas_users.id_user and gas_ventas.id_prod=gas_producto.id_producto and gas_users.id_user=gas_datosUsuario.id_user and gas_ventas.entregado=0 ORDER BY fecha_venta desc";
			$sentencia=mysql_query($sql,$this->id_con);
			while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
			//se cambia el digito 0 por 'No' y el 1 por 'Si'
				if ($rs["entregado"]==0) {
					$entrega="No";
				} else {
					$entrega="Si";
				}
				if ($rs["pagado"]==0) {
					$pago="No";
				} else {
					$pago="Si";
				}


				echo '<tr>
				<td>'.$rs["first_name"].' '.$rs["last_name"].'</td>
				<td>'.$rs[8].'</td>
				<td>'.$rs["nombre_producto"].'</td>
				<td>$'.$rs["precio_venta"].'</td>
				<td>'.$rs["fecha_venta"].'</td>
				<td>'.$entrega.'</td>
				<td>'.$pago.'</td>

			</tr>';
		}
}//cierre listar pedidos

function listarClientes(){
	$sql="SELECT * FROM `gas_users`,gas_datosUsuario WHERE gas_users.id_user=gas_datosUsuario.id_user and gas_users.user_status=1 and gas_datosUsuario.user_type='cliente'";
	$sentencia=mysql_query($sql,$this->id_con);
	while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
			//se cambia el digito 0 por 'No'
		if ($rs["departamento"]=="") {
			$depto="No";
		} else {
			$depto=$rs["departamento"];
		}			

		echo '<tr>
		<td>'.$rs["first_name"].' '.$rs["last_name"].'</td>
		<td>'.$rs["user_email"].'</td>                
		<td>'.$rs["telefono"].'</td>
		<td>'.$rs["celular"].'</td>
		<td>'.$rs["rut"].'</td>
		<td>'.$rs["direccion"].' '.$rs["numero"].'</td>
		<td>'.$depto.'</td>
		<td><button type="button" class="btn btn-default modificar" onClick="modificar('.$rs["id_user"].')">X</button></td>
		<td><button type="button" class="btn btn-default eliminar"  onClick="eliminar('.$rs["id_user"].')">X</button></td>
	</tr>';
}
}//Cierre listar clientes

function listarVendedores(){
	$sql="SELECT * FROM `gas_users`,gas_datosUsuario WHERE gas_users.id_user=gas_datosUsuario.id_user and gas_datosUsuario.user_type='vendedor'";
	$sentencia=mysql_query($sql,$this->id_con);
	while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
			//se cambia el digito 0 por 'No' y el 1 por 'Si'
		if ($rs["departamento"]=="") {
			$depto="No";
		} else {
			$depto=$rs["departamento"];
		}			

		echo '<tr>
		<td>'.$rs["first_name"].' '.$rs["last_name"].'</td>
		<td>'.$rs["user_email"].'</td>                
		<td>'.$rs["telefono"].'</td>
		<td>'.$rs["celular"].'</td>
		<td>'.$rs["rut"].'</td>
		<td>'.$rs["direccion"].' '.$rs["numero"].'</td>
		<td>'.$depto.'</td>
		<td><button type="button" class="btn btn-default modificar" value="'.$rs["id_user"].'">X</button></td>
		<td><button type="button" class="btn btn-default eliminar" value="'.$rs["id_user"].'">X</button></td>
	</tr>';
}
}//Cierre listar vendedores

function listarAdministradores(){
	$sql="SELECT * FROM `gas_users`,gas_datosUsuario WHERE gas_users.id_user=gas_datosUsuario.id_user and gas_datosUsuario.user_type='admin'";
	$sentencia=mysql_query($sql,$this->id_con);
	while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
			//se cambia el digito 0 por 'No' y el 1 por 'Si'
		if ($rs["departamento"]=="") {
			$depto="No";
		} else {
			$depto=$rs["departamento"];
		}			

		echo '<tr>
		<td>'.$rs["first_name"].' '.$rs["last_name"].'</td>
		<td>'.$rs["user_email"].'</td>                
		<td>'.$rs["telefono"].'</td>
		<td>'.$rs["celular"].'</td>
		<td>'.$rs["rut"].'</td>
		<td>'.$rs["direccion"].' '.$rs["numero"].'</td>
		<td>'.$depto.'</td>
		<td><button type="button" class="btn btn-default modificar" value="'.$rs["id_user"].'">X</button></td>
		<td><button type="button" class="btn btn-default eliminar" value="'.$rs["id_user"].'">X</button></td>
	</tr>';
}
}//Cierre listar administradores

function traerDatos($id)
{
	$sql="SELECT * FROM `gas_users`,gas_datosUsuario WHERE gas_users.id_user=gas_datosUsuario.id_user and gas_users.id_user=".$id." ";
	$sentencia=mysql_query($sql,$this->id_con);
	while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
			//se cambia el digito 0 por 'No' y el 1 por 'Si'
		if ($rs["departamento"]=="") {
			$depto="";
		} else {
			$depto=$rs["departamento"];
		}			


		

		echo '<div class="row">
		<div class="col-xs-12"><label>E-mail</label> <b>*</b>
			<input type="email" class="form-control" name="email" id="email" placeholder="correo@dominio.com" value="'.$rs["user_email"].'" autofocus></div>
			<div class="alert alert-danger hidden" id="mensajeemail">El formato de correo no es correcto...</div>
		</div>
		<div class="row">
			<div class="col-xs-12"><label>Password</label> <b>*</b>
				<input type="password" class="form-control" name="password" id="password" placeholder="contraseña"></div>
				<div class="col-xs-12"><label>Repita Password</label> <b>*</b>
					<input type="password" class="form-control" name="repassword" id="repassword" placeholder="contraseña"></div>
					<div class="alert alert-danger hidden" id="mensajepass">Las contraseñas no coinciden...</div>
				</div>
				<div class="row">
					<div class="col-xs-12"><label>Nombre</label> <b>*</b>
						<input type="text" class="form-control" name="nombre" id="nombre" onKeyPress="return sololetras(event)" placeholder="Nombre" value="'.$rs["first_name"].'" autofocus></div>
					</div>
					<div class="row">    
						<div class="col-xs-12"><label>Apellidos</label> <b>*</b>
							<input type="text" class="form-control" name="apellidos" id="apellidos" value="'.$rs["last_name"].'" onKeyPress="return sololetras(event)" placeholder="Paterno Materno" autofocus></div>
						</div>
						<div class="row"> 
							<div class="control-group">
								<div class="col-xs-12"><label>Rut</label> <b>*</b>
									<input type="text" class="form-control" name="rut" id="rut" maxlength="12" value="'.$rs["rut"].'" onKeyPress="return solonumerosyk(event)" placeholder="11.111.111-1"  autofocus></div>
								</div>
							</div>
							<div class="row">    
								<div class="col-xs-6">
									<label>Dirección</label> <b>*</b>
									<input type="text" class="form-control" name="direccion" id="direccion" value="'.$rs["direccion"].'" onKeyPress="return sololetras(event)" placeholder="AV Nelson Pereira" autofocus>
								</div>
								<div class="col-xs-6">
									<label>Número</label> <b>*</b>
									<input type="text" class="form-control" name="numero" id="numero" value="'.$rs["numero"].'" onKeyPress="return solonumeros(event)" placeholder="000" autofocus>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<label>Departamento/Condominio</label>
									<input type="text" class="form-control" name="departamento" id="departamento" value="'.$rs["departamento"].'" placeholder="Número de departamento/casa" autofocus>
								</div>
							</div>
							<div class="row"> 
								<div class="col-xs-12"><label>Telefono Fijo</label>
									<input type="tel" class="form-control" name="telefonofijo" id="telefonofijo" value="'.$rs["telefono"].'" onKeyPress="return solonumeros(event)" placeholder="99889988" autofocus></div>
								</div>
								<div class="row">    
									<div class="col-xs-12"><label>Celular</label>
										<div class="row">
											<div class="col-xs-4 col-md-2"><input type="tel" class="form-control" placeholder="+569" readonly></div>
											<div class="col-xs-8 col-md-10"><input type="tel" class="form-control" name="celular" id="celular" value="'.$rs["celular"].'" onKeyPress="return solonumeros(event)" placeholder="99889988" autofocus></div>
										</div></div>

									</div>
									<div class="row">
										<div class="col-xs-12"><label class="checkbox">
											<input type="checkbox" name="checkregistro" id="checkregistro" value="Terminos" required> Acepto los terminos y condiciones! <b>*</b>
										</label></div>
									</div>';
								}
}//cierre mostrar datos para modificar
function traerDatosEliminar($id)
{
	$sql="SELECT * FROM `gas_users`,gas_datosUsuario WHERE gas_users.id_user=gas_datosUsuario.id_user and gas_users.id_user=".$id." ";
	$sentencia=mysql_query($sql,$this->id_con);
	while ($rs=mysql_fetch_array($sentencia,MYSQL_BOTH)) {
		
		echo '<div class="row">
		<div class="col-xs-12"><p>¿Esta seguro que desea eliminar al usuario?</p>

			<div class="alert alert-info">
				'.$rs["first_name"]." ".$rs["last_name"].'
			</div>

		</div>
	</div>        
	';
}
}//cierre mostrar datos para modificar

function modificarDatos($id,$email,$rut,$pas,$nom,$ape,$tel,$cel,$dir,$num,$dep)
{	if ($pas != "") {
	$usrUpdate="UPDATE `proyecto`.`gas_users` SET `user_pass` = '$pas', `user_email` = '$email', `display_name` = '$nom' WHERE `gas_users`.`id_user` = $id";
	$sentencia=mysql_query($usrUpdate,$this->id_con);
	echo "actualizado correcto";
}else {
	$usrUpdate="UPDATE `proyecto`.`gas_users` SET `user_email` = '$email', `display_name` = '$nom' WHERE `gas_users`.`id_user` = $id";
	$sentencia=mysql_query($usrUpdate,$this->id_con);
	echo "actualizado correcto";
}
$datosUsuUpdate= "UPDATE `proyecto`.`gas_datosUsuario` SET `nickname` = '$nom', `first_name` = '$nom', `last_name` = '$ape', `telefono` = '$tel', `celular`='$cel',`rut`= '$rut',`direccion`='$dir',`numero`='$num',`departamento`='$dep' WHERE `gas_datosusuario`.`id_user` = $id";
$sentencia=mysql_query($datosUsuUpdate,$this->id_con);
}//cierre modificar datos de usuarios

function eliminarUsuario($id,$idUsuario)
{
	$eliminarUsuario="UPDATE `proyecto`.`gas_users` SET `user_status` = '0' WHERE `gas_users`.`id_user` = $id";
	$sentencia=mysql_query($eliminarUsuario,$this->id_con);
	date_default_timezone_set("America/mendoza");//metodo para que la hora sea la de Chile
			$time = time(); //variable que almacena la hora local
			$sql3="INSERT INTO `proyecto`.`gas_accionescriticas` (`id_critica`, `id_usuario`, `accion`, `detalle`, `otro`, `fecha`) VALUES (NULL, '$idUsuario', 'Elimina', 'Elimina al usuario con id: \"$id\"', '','".date("Y-m-d (H:i:s)", $time)."');";
			$sentencia3=mysql_query($sql3,$this->id_con);
			echo "ok";
}//cierre eliminar usuarios de la base de datos





}//cierre BD
?>