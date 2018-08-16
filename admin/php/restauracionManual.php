<?php 
$executa = "C:/xampp/mysql/bin/mysql -u root proyecto < c:/resp/resp_proy.sql";
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