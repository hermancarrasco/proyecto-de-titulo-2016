<?php
require_once("../php/clase.php");
    $c= new BaseDeDatos();
    $c->conectarBD();
    
    $c->controlarSesion();
    if(isset($_REQUEST["cerrar"])){
      $c->cerrarSesion();
      }
      @session_start(); 
      if ($_SESSION["tipoUsuario"] != "vendedor") {
          
          header("location: ../index.php?msg=".md5(4)."");
      }
      

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Pedidos</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<link href="../css/font-awesome.css" rel="stylesheet" />
	<style>
	html, body {
		height: 100%;
		margin: 0;
		padding: 0;
	}
	#mapa {
		height: 100%;
	}
	</style>
</head>

<body>
	<header>
		<div class="navbar navbar-inverse navbar-fixed-top" id="nav-lipigas" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">GLP EXPRESS</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="index.php">Home</a></li>
						<li class="active"><a href="#">Ver Pedidos</a></li>
						<li><a href="#">Hacer venta</a></li>

					</ul>
					<ul class="nav navbar-nav pull-right" >
						<li><a href="index.php?cerrar='<?php echo md5("ok")?>'">Cerrar Sesion</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</header>




	
		<div class="jumbotron" id="entorno_cliente">
	<section id="principal" class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="starter-template">
								<div class="col-xs-12" id="contPedidos" style="height:100%">
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	</div>
	


	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>	
	<script type="text/javascript" src="js/verPedidos.js"></script>
	<script>
	cargarPedidos(<?php echo $_SESSION["zona"] ?>);
</script>
</script>

</body>
</html>