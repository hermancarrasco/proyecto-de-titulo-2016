<?php
class basededatoslog{
	private $ser;
	private $usu;
	private $pas;
	private $bd;
	public $id_con;
	private $id_bd;
	
	function conexion(){
		$this->ser="localhost";
		$this->usu="root";
		$this->pas="";
		$this->bd="proyecto_logbd";
		$this->id_con=mysql_connect($this->ser,$this->usu,$this->pas);
		if(!$this->id_con){
			die("ERROR EN LA CONEXION MYSQL");
			}
		$this->id_bd=mysql_select_db($this->bd,$this->id_con);
		if(!$this->id_bd){
			die("Error, no se pudo conectar a la BD");
			}
		}
		
	function desconexion(){
		mysql_close($this->id_con);
		}
		
	function listaconfigactual(){
		echo "<table width='700' border='1'>";
			echo "<tr>";
				echo "<th>Frecuencia</th>";
				echo "<th>Dia</th>";
				echo "<th>Hora</th>";
			echo "</tr>";
			$sql = "select * from config_respaldos";
			$sentencia= mysql_query($sql,$this->id_con);
			while($rs = mysql_fetch_array($sentencia,MYSQL_BOTH)){
				echo "<tr>";
					echo "<td>" . $rs['Frecuencia'] . "</td>";
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
		echo "</table>";	
	}
	function modificarconfig($frecuencia,$hora,$dia){
		$sql= "update config_respaldos set  Frecuencia='$frecuencia', Dia='$dia', Hora='$hora' where Codigo=1";
		$sentencia = mysql_query($sql,$this->id_con);	
	}
	function agregalog($responsable,$nombresp,$fecha,$hora,$motivo,$observacion){
		$sql= "insert into registros_respaldos values(NULL,'$fecha','$hora','$responsable','$nombresp','$motivo','$observacion')";
		$sentencia = mysql_query($sql,$this->id_con);	
	}
	function listalogs(){
		echo"<script language='javascript'>";
				echo"$(function() {";
					echo"theTable = $('#tablalogs');";
		 			echo"$('#a').keyup(function() {";
					echo"$.uiTableFilter(theTable, this.value);";
		  			echo"});";
				echo"});";
			echo"</script>";
					//busqueda por entrada de texto, rut cliente...
					echo"<div id='busqueda'>";
					echo"Busqueda: <input type='text' id='a' name='a' value='' />";
					echo"</div>";
					echo"<br />";
		echo "<table width='1000' border='1' id='tablalogs'>";
			echo "<caption>Registro</caption>";
			echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>Fecha</th>";
				echo "<th>Hora</th>";
				echo "<th>Usuario</th>";
				echo "<th>Responsable</th>";
				echo "<th>Motivo</th>";
				echo "<th>Observacion</th>";
			echo "</tr>";
			$sql = "select * from registros_respaldos order by codigo desc";
			$sentencia= mysql_query($sql,$this->id_con);
			while($rs = mysql_fetch_array($sentencia,MYSQL_BOTH)){
				echo "<tr>";
					echo "<td>" . $rs['codigo'] . "</td>";
					echo "<td>" . $rs['fecha'] . "</td>";
					echo "<td>" . $rs['hora'] . "</td>";
					echo "<td>" . $rs['responsable'] . "</td>";
					echo "<td>" . $rs['nombre_resp'] . "</td>";
					echo "<td>" . $rs['motivo'] . "</td>";
					echo "<td>" . $rs['observacion'] . "</td>";
				echo "</tr>";
				
			}
		echo "</table>";	
	}
	function nuevasesion($login,$nombre,$tipo,$fecha,$hora,$ip,$navegador){
		$usuario="$login / $nombre";
		$sql= "insert into registro_sesiones values(NULL,'$usuario','$tipo','$fecha','$hora','$ip','$navegador')";
		$sentencia = mysql_query($sql,$this->id_con);	
		echo "loool";
	}
	function listasesiones(){
		echo"<script language='javascript'>";
				echo"$(function() {";
					echo"theTable = $('#tablalogs');";
		 			echo"$('#a').keyup(function() {";
					echo"$.uiTableFilter(theTable, this.value);";
		  			echo"});";
				echo"});";
			echo"</script>";
					//busqueda por entrada de texto, rut cliente...
					echo"<div id='busqueda'>";
					echo"Busqueda: <input type='text' id='a' name='a' value='' />";
					echo"</div>";
					echo"<br />";
		echo "<table width='1000' border='1' id='tablalogs'>";
			echo "<caption>Registro</caption>";
			echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>Usuario</th>";
				echo "<th>Tipo</th>";
				echo "<th>Fecha</th>";
				echo "<th>Hora</th>";
				echo "<th>IP</th>";
				echo "<th>Navegador</th>";
			echo "</tr>";
			$sql = "select * from registro_sesiones order by id desc";
			$sentencia= mysql_query($sql,$this->id_con);
			while($rs = mysql_fetch_array($sentencia,MYSQL_BOTH)){
				echo "<tr>";
					echo "<td>" . $rs['id'] . "</td>";
					echo "<td>" . $rs['usuario'] . "</td>";
					echo "<td>" . $rs['tipo_sesion'] . "</td>";
					echo "<td>" . $rs['fecha'] . "</td>";
					echo "<td>" . $rs['hora'] . "</td>";
					echo "<td>" . $rs['ip'] . "</td>";
					echo "<td>" . $rs['navegador'] . "</td>";
				echo "</tr>";
				
			}
		echo "</table>";	
	}
	function agregabloqueo($ip,$fechahorai,$fechahorat,$observacion){
		
	}
	function consultabloqueos(){
		$sql= "select codigo from emergencias where estado = 'Activa'";
		$sentencia = mysql_query($sql,$this->id_con);
		$rs = mysql_fetch_array($sentencia,MYSQL_BOTH);
		if($rs['codigo']==2){
			echo "<img src='imagenes/emergencias_img.png' width='800' height='180' /> <br/> <br/> <br/>";
			echo "<a href='misreservas.php'><img src='imagenes/misreserv_ico.png' class='icono' /></a>";
			echo "<a href='ticketsoporte.php'><img src='imagenes/tickets_ico.png' class='icono' /></a>";
			echo "<a href='mispagos.php'><img src='imagenes/mispagos_ico.png' class='icono' /></a>";	
		}else{
		echo "<a href='reservar.php'><img src='imagenes/reservar_ico.png' class='icono' /></a>";
		echo "<a href='misreservas.php'><img src='imagenes/misreserv_ico.png' class='icono' /></a>";
		echo "<a href='ticketsoporte.php'><img src='imagenes/tickets_ico.png' class='icono' /></a>";
		echo "<a href='mispagos.php'><img src='imagenes/mispagos_ico.png' class='icono' /></a>";
		}
	}
	function actualizarEmergencia($u1,$u2){	
		$sql= "select * from emergencias";
		$sentencia = mysql_query($sql,$this->id_con);
		if (mysql_num_rows($sentencia)>0){
			//hace nada
		}else {
			//Agrega registro si es que no existen
			$sql2= "INSERT INTO emergencias (codigo, estado, motivo) VALUES (1, 'Desactiva', 'sin razon')";
			$sentencia2 = mysql_query($sql2,$this->id_con);
		}
		//Actualiza estado
		if ($u1==1){
			$estado='Desactiva';
		}else if($u1==2){
			$estado='Activa';
		}
		$sql3= "UPDATE emergencias SET codigo=$u1, estado='$estado', motivo='$u2'";
		$sentencia3 = mysql_query($sql3,$this->id_con);
	}
	function revisarEstado(){
		$sql= "select estado,motivo from emergencias";
		$sentencia = mysql_query($sql,$this->id_con);
		$rs = mysql_fetch_array($sentencia,MYSQL_BOTH);
		echo "<tr>";
    	echo "<td>Estado actual: ". $rs['estado'] . " ";
    	echo"</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>Motivo Actual: ". $rs['motivo'] . " ";
    	echo"</td>";
    	echo "</tr>";
		
	}
	
}
?>