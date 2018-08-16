<?php
date_default_timezone_set('America/Santiago');
$dia=date("N");
$hora=date("H:i");
$fechahora=date("Ymd-Hi");

require("utilidades_logbd.php");
$c = new basededatoslog();
$c->conexion();
$sql = "select * from config_respaldos";
$sentencia= mysql_query($sql);
$rs = mysql_fetch_array($sentencia,MYSQL_BOTH);

//Datos BD
$usuario = "root";
$passwd = "";
$bd = "proyecto";

if($rs['Frecuencia']=="DIARIO"){
	if($rs['Hora']=="$hora"){ //Si al momento de la ejecucion de este php coinciden las configuraciones, se ejecutara el respaldo automatico
		//$executa = "C:/wamp/bin/mysql/mysql5.6.12/bin/mysqldump -u $usuario -p$passwd $bd > C:/respaldoautomatico/".$fechahora."_BD_complejodeportivo.sql";
		$executa ="C:/xampp/mysql/bin/mysqldump -u root proyecto > Respaldos/".$fechahora."_BD_Proyecto.sql";
		system($executa, $resultado);
		$responsable="0";
		$nombresp="SISTEMA";
		$fecha=date("Y-m-d");
		$horaact=date("H:i:s");
		$motivo="GENERACION RESPALDO AUTOMATICO";
		$observacion="Auto -- Se crea un nuevo respaldo Automatico";
		$c->agregalog($responsable,$nombresp,$fecha,$horaact,$motivo,$observacion);
	}
}else if($rs['Frecuencia']=="SEMANAL"){
	if($rs['Dia']=="$dia"){
		if($rs['Hora']=="$hora"){ //Si al momento de la ejecucion, coinciden los 3 parametros se ejecutara el respaldo automatico
			//$executa = "C:/wamp/bin/mysql/mysql5.6.12/bin/mysqldump -u $usuario -p$passwd $bd > C:/respaldoautomatico/".$fechahora."_BD_complejodeportivo.sql";
			$executa ="C:/xampp/mysql/bin/mysqldump -u root proyecto > Respaldos/".$fechahora."_BD_Proyecto.sql";
			system($executa, $resultado);
			$responsable="0";
			$nombresp="SISTEMA";
			$fecha=date("Y-m-d");
			$horaact=date("H:i:s");
			$motivo="GENERACION RESPALDO AUTOMATICO";
			$observacion="Auto -- Se crea un nuevo respaldo Automatico";
			$c->agregalog($responsable,$nombresp,$fecha,$horaact,$motivo,$observacion);
		}
	}
}
?>