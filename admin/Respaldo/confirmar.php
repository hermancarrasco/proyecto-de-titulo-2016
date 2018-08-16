<?php 
require_once("clase_logbd.php");
    $c= new BaseDeDatos();
    $c->conectarBD();


if (isset($_POST["btnRestaurar"])) {
	$archivo=$_POST["archivo"];
	$ser="localhost";
	$usu="root";
	$pas="";
	$dropbd = 'DROP DATABASE proyecto;';
	$crearbd = 'CREATE DATABASE proyecto;';
	$seleccionarbd='use proyecto;';
	$con=mysql_connect($ser,$usu,$pas);
	mysql_query($dropbd,$con);
	mysql_query($crearbd,$con);
	mysql_query($seleccionarbd,$con);
	/***  Verificar si el sistema operativo es windows  ***/
	if (strtoupper(substr(PHP_OS, 0,3))==='WIN') {		
		//$destino="C:/resp/".$archivo;
		$destino="Respaldos/".$archivo;
		$dbname="proyecto";
		$executa ="C:/xampp/mysql/bin/mysql -u $usu  $dbname < $destino";   

	}else{    	
		$destino="/Users/herman/Desktop/respaldo/".$archivo;
		$dbname="proyecto";
		$executa ="/Applications/XAMPP/bin/mysql -u $usu  $dbname < $destino"; 
	}

	system($executa,$resultado); 

	if ($resultado){  
		echo "ERROR, NO SE PUDO COMPLETAR LA RESTAURACION";
	}else{ 
		$idUsuario=$_POST["idUsuario"];
		$link = mysql_connect('localhost', 'root', '')
   			 or die('No se pudo conectar: ' . mysql_error());
			
			mysql_select_db('proyecto') or die('No se pudo seleccionar la base de datos');
			date_default_timezone_set("America/mendoza");//metodo para que la hora sea la de Chile
			$time = time();
        	$sql3="INSERT INTO `proyecto`.`gas_accionescriticas` (`id_critica`, `id_usuario`, `accion`, `detalle`, `otro`, `fecha`) VALUES (NULL, '$idUsuario', 'Modifica', 'Restaura la base de datos \"$archivo\"', '','".date("Y-m-d (H:i:s)", $time)."');";
			$sentencia3=mysql_query($sql3);
           
            mysql_close($link);
		echo "RESTAURACION EXITOSA DE LA BASE DE DATOS";
		
	}
}//cierre restauracion de la bd manual

if (isset($_POST["respaldoManual"])) {
	$idUsuario=$_POST["idUsuario"];
	$time = time();
	date_default_timezone_set('America/Santiago');
            $fechahora=date("Ymd-His");
            //$executa = "C:/xampp/mysql/bin/mysqldump -u root proyecto > c:/resp/".$fechahora."_BD_Proyecto.sql";
            $executa = "C:/xampp/mysql/bin/mysqldump -u root proyecto > Respaldos/".$fechahora."_BD_Proyecto.sql";
            system($executa, $resultado);


        if ($resultado) {
           echo "Error al respaldar la base de datos";

        } else {
        	$c->desconectarBD();
        	$link = mysql_connect('localhost', 'root', '')
   			 or die('No se pudo conectar: ' . mysql_error());
			
			mysql_select_db('proyecto') or die('No se pudo seleccionar la base de datos');
			date_default_timezone_set("America/mendoza");//metodo para que la hora sea la de Chile
			$time = time();
        	$sql3="INSERT INTO `proyecto`.`gas_accionescriticas` (`id_critica`, `id_usuario`, `accion`, `detalle`, `otro`, `fecha`) VALUES (NULL, '$idUsuario', 'Inserta', 'Registra un nuevo respaldo manual de la Base De Datos', '','".date("Y-m-d (H:i:s)", $time)."');";
			$sentencia3=mysql_query($sql3);
            echo "Se genero correctamente el respaldo de la base de datos";
            mysql_close($link);
        }


}//cierre respaldo manual de la bd

if (isset($_POST["cargaConfActualRespAuto"])) {
	$c->cargaConfActualRespAuto();
}

if (isset($_POST["btnConfAuto"])) {
	$frecuencia=$_POST["frecuencia"];
	$dia=$_POST["dia"];
	$hora=$_POST["hora"];
	$idUsuario=$_POST["idUsuario"];
	$c->configurarRespAuto($frecuencia,$dia,$hora,$idUsuario);
}


?>