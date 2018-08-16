<?php
	//Inicio de sesion
session_start();
if(!isset($_SESSION['login'])){
	header("location:iniciaradmin.php?error=2");
}
date_default_timezone_set('America/Santiago');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Comprobante</title>
	<link href="../css/estilo_comprobante.css" rel="stylesheet" type="text/css" />
	<script src="../js/jquery.js" type="text/javascript"></script>
	<style type="text/css" media="print">
		@media print {
			#btnimp {display:none;}
		}
	</style>
</head>
<body onload="document.getElementById('cargando').style.display='none';">
	<div id="cargando" style="cursor:pointer;border-radius:10px;-moz-border-radius:10px;-webkit-border-radius:10px;box-shadow:inset yellow 0px 0px 14px;background-image:url(imagenes/ajax-procesando.gif);background-position:center;background-repeat: no-repeat;background-size:100%;background-color:#06F;width:300px;color:#fff;text-align:center;height:100px;padding:52px 12px 12px 12px;position:fixed;top:30%;left:40%;z-index:6;">Cargando...</div> 
	<body>
		<div id="contenido" name="contenido">
			<?php
require("php/clase.php");
$c = new basededatos();
$c->conectarBD();
		if (isset($_POST[""])) {
			
		}



			?>
		</div>
		<br/><a href="JavaScript:window.print(contenido);"><img src="imagenes/iconos/ico_imprimir.png" width="250px" height="60px" alt="IMPRIMIR COMPROBANTE" name="btnimp" id="btnimp"/></a>
		<script type="text/javascript">
			$(document).ready(function () {
				JavaScript:window.print(contenido);
			});

		});
</script>
</body>
</html>