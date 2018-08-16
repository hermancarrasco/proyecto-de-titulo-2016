<?php 

date_default_timezone_set('America/Santiago');
$fechahora=date("Ymd-Hi");
$executa = "C:/xampp/mysql/bin/mysqldump -u root proyecto > c:/resp/".$fechahora."_BD_Proyecto.sql";
system($executa, $resultado);


if ($resultado) {
	echo "no sirve la wea";
	
} else {
	echo "se genero wiiiiii";
	echo"<script>
		alert('se genero la wea');
	</script>";
}

 ?>