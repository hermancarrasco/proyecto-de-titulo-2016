<?php 
	require_once("clase.php");
        $c= new BaseDeDatos();
        $c->conectarBD();
 ?>
<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GLPExpress/FAQ</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>

<body>
	<header>
        <div class="navbar navbar-inverse" id="nav-lipigas" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="../index.php">GLP EXPRESS</a>
            </div>
            <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../index.php">Acerca de</a></li>
                <li><a href="../index.php">Solicite Pedido</a></li>
                <li class="active"><a href="php/faq.php">FAQ</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>
    </header>
	
	<div class="jumbotron">
		<div class="container">
			<h1>Preguntas Frecuentes</h1>
			<hr>
			 

			 <?php $c->faq(); ?>
			 
			
		</div>
	</div>

	<footer class="container-fluid" >
		<div class="row">
			<div class="col-xs-12">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 text-center">
        					<p>Sucursal Lipigas &copy; Company 2014</p>
						</div>
					</div>
				</div>
			</div>
		</div>
    </footer>

	<script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>	
</body>
</html>