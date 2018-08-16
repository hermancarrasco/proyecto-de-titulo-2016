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
			$this->bd="proyecto_logbd"; //base de datos
			
			$this->id_con=mysql_connect($this->ser,$this->usu,$this->pas); //conexion a la BD
			if(!$this->id_con){
				die("Error en la conexion con la BD");
			}
			$this->id_bd=mysql_select_db($this->bd,$this->id_con); //Seleccion de la BD
			if(!$this->id_bd){
				die("Error en la seleccion de la BD");
			}
			mysql_set_charset('utf8');
			date_default_timezone_set('America/Santiago');
		}
		function desconectarBD(){
			mysql_close($this->id_con);
		}//cierre funcion desconectar de la base de datos

		function cargaConfActualRespAuto()
		{
			
			$sql = "select * from config_respaldos";
			$sentencia= mysql_query($sql,$this->id_con);
			while($rs = mysql_fetch_array($sentencia,MYSQL_BOTH)){
				echo "<tr>";
				echo "<td>".$rs['Frecuencia']."</td>";
				if($rs['Dia']==0){
					echo "<td>TODOS LOS DIAS</td>";
				}
				else if($rs['Dia']==1){
					echo "<td>LUNES</td>";
				}
				else if($rs['Dia']==2){
					echo "<td>MARTES</td>";
				}
				else if($rs['Dia']==3){
					echo "<td>MIERCOLES</td>";
				}
				else if($rs['Dia']==4){
					echo "<td>JUEVES</td>";
				}
				else if($rs['Dia']==5){
					echo "<td>VIERNES</td>";
				}
				else if($rs['Dia']==6){
					echo "<td>SABADO</td>";
				}
				else if($rs['Dia']==7){
					echo "<td>DOMINGO</td>";
				}
				echo "<td>" . $rs['Hora'] . "</td>";
				echo "</tr>";
			}
}//cierre cargar configuracion actual de respaldo automatico

function configurarRespAuto($frecuencia,$dia,$hora,$idUsuario)
{	
	$responsable="Admin";
	$fecha=date("Y-m-d");
	$horaact=date("H:i:s");
	$motivo="Actualización en configuración de respaldo automatico";
	$observacion="Auto - Se actualiza la configuracion con la hora y dia seleccionado";
	
	$sql= "update config_respaldos set  Frecuencia='$frecuencia', Dia='$dia', Hora='$hora' where Codigo=1";
	$sentencia = mysql_query($sql,$this->id_con);
	
	$sql2= "insert into registros_respaldos values(NULL,'$fecha','$horaact','$responsable','$responsable','$motivo','$observacion')";
	$sentencia2 = mysql_query($sql2,$this->id_con);

	$link = mysql_connect('localhost', 'root', '')
   			 or die('No se pudo conectar: ' . mysql_error());
			
			mysql_select_db('proyecto') or die('No se pudo seleccionar la base de datos');
			date_default_timezone_set("America/mendoza");//metodo para que la hora sea la de Chile
			$time = time();
        	$sql3="INSERT INTO `proyecto`.`gas_accionescriticas` (`id_critica`, `id_usuario`, `accion`, `detalle`, `otro`, `fecha`) VALUES (NULL, '$idUsuario', 'Modifica', 'Modifica el respaldo automatico con frecuencia: $frecuencia, dia:$dia, hora:$hora', '','".date("Y-m-d (H:i:s)", $time)."');";
			$sentencia3=mysql_query($sql3);
			mysql_close($link);
	echo "Se a modificado la configuración del respaldo automatico de la base de datos";
}
}//Cierre clase bd
?>