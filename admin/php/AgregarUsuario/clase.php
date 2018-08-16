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


		function ingresarUsuario($mail,$rut,$pas,$nom,$ape,$tel,$cel,$dir,$num,$dep,$idUsuario){
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
					
					$sql3="INSERT INTO `proyecto`.`gas_datosUsuario` VALUES (NULL,'$nom','$nom','$ape','cliente','$tel','$cel','$rut','$dir','$num','$dep',$numeroDeUsuarios)";
					$sentencia=mysql_query($sql3,$this->id_con);
					$sql5="INSERT INTO `proyecto`.`gas_direcciones` (`id_direcciones`, `latitud`, `longitud`, `calle`, `numero`, `direccion`, `estado`, `id_usuario`) VALUES (NULL, NULL, NULL, '$dir', '$num,', NULL, '1', '$numeroDeUsuarios');";
					$sentencia=mysql_query($sql5,$this->id_con);
					date_default_timezone_set("America/mendoza");//metodo para que la hora sea la de Chile
					$time = time(); //variable que almacena la hora local
					$sql4="INSERT INTO `proyecto`.`gas_accionescriticas` (`id_critica`, `id_usuario`, `accion`, `detalle`, `otro`, `fecha`) VALUES (NULL, '$idUsuario', 'Inserta', 'Registra un nuevo Cliente, Nombre: \"$nom $ape\", Rut: \"$rut\" ', '','".date("Y-m-d (H:i:s)", $time)."');";
					$sentencia4=mysql_query($sql4,$this->id_con);
					echo "Registro de usuario correcto...";

					
				}//cierre de if para la coincidencia
			}//cierre while de buscar coincidencia
		}//cierre ingresarusuario


		/***** Funcion de registro de un nuevo vendedor ****/
		function ingresarVendedor($mail,$rut,$pas,$nom,$ape,$tel,$cel,$dir,$num,$dep,$idUsuario){
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
					
					$sql3="INSERT INTO `proyecto`.`gas_datosUsuario` VALUES (NULL,'$nom','$nom','$ape','vendedor','$tel','$cel','$rut','$dir','$num','$dep',0,NULL,$numeroDeUsuarios)";
					$sentencia=mysql_query($sql3,$this->id_con);
					$sql5="INSERT INTO `proyecto`.`gas_direcciones` (`id_direcciones`, `latitud`, `longitud`, `calle`, `numero`, `direccion`, `estado`, `id_usuario`) VALUES (NULL, NULL, NULL, '$dir', '$num,', NULL, '1', '$numeroDeUsuarios');";
					$sentencia=mysql_query($sql5,$this->id_con);
					date_default_timezone_set("America/mendoza");//metodo para que la hora sea la de Chile
					$time = time(); //variable que almacena la hora local
					$sql4="INSERT INTO `proyecto`.`gas_accionescriticas` (`id_critica`, `id_usuario`, `accion`, `detalle`, `otro`, `fecha`) VALUES (NULL, '$idUsuario', 'Inserta', 'Registra un nuevo Vendedor, Nombre: \"$nom $ape\", Rut: \"$rut\" ', '','".date("Y-m-d (H:i:s)", $time)."');";
					$sentencia4=mysql_query($sql4,$this->id_con);

					echo "Registro de usuario correcto...";

					
				}//cierre de if para la coincidencia
			}//cierre while de buscar coincidencia
		}//cierre ingresarVendedor

		/***** Funcion de registro de un nuevo administrador ****/
		function ingresarAdmin($mail,$rut,$pas,$nom,$ape,$tel,$cel,$dir,$num,$dep,$idUsuario){
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
					
					$sql3="INSERT INTO `proyecto`.`gas_datosUsuario` VALUES (NULL,'$nom','$nom','$ape','admin','$tel','$cel','$rut','$dir','$num','$dep',$numeroDeUsuarios)";
					$sentencia=mysql_query($sql3,$this->id_con);
					$sql5="INSERT INTO `proyecto`.`gas_direcciones` (`id_direcciones`, `latitud`, `longitud`, `calle`, `numero`, `direccion`, `estado`, `id_usuario`) VALUES (NULL, NULL, NULL, '$dir', '$num,', NULL, '1', '$numeroDeUsuarios');";
					$sentencia=mysql_query($sql5,$this->id_con);
					date_default_timezone_set("America/mendoza");//metodo para que la hora sea la de Chile
					$time = time(); //variable que almacena la hora local
					$sql4="INSERT INTO `proyecto`.`gas_accionescriticas` (`id_critica`, `id_usuario`, `accion`, `detalle`, `otro`, `fecha`) VALUES (NULL, '$idUsuario', 'Inserta', 'Registra un nuevo Administrador, Nombre: \"$nom $ape\", Rut: \"$rut\" ', '','".date("Y-m-d (H:i:s)", $time)."');";
					$sentencia4=mysql_query($sql4,$this->id_con);

					echo "Registro de usuario correcto...";

				}//cierre de if para la coincidencia
			}//cierre while de buscar coincidencia
		}//cierre ingresarVendedor



}//cierre clase BaseDeDatos
?>