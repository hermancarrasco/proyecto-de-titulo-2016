s<?php
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
	<title>Panel Vendedor</title>
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
					<a class="navbar-brand" href="#">GLP EXPRESS</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#principal">Home</a></li>
						<li><a href="verPedidos.php">Ver Pedidos</a></li>
						<li><a href="#" id="btnVentaRuta">Hacer venta</a></li>

					</ul>
					<ul class="nav navbar-nav pull-right" >
						<li><a href="index.php?cerrar='<?php echo md5("ok")?>'">Cerrar Sesion</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</header>
<img src="" alt="">

<div style="height: 100%;margin: 0;padding: 0;">	
	<div id="mapa"></div>
</div>


<div class="modal fade" id="ventaRuta">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Venta en Ruta</h4>
			</div>
			<div class="modal-body" id="bodyVenta">
					<div class="row">
                            <form action="" method="POST" role="form">
                              <legend>Datos de Pedido</legend>
                                     
                              <div class="form-group">
                                <label for="cboTipoGas" class="col-sm-2 control-label">Tipo de Gas:</label>
                                <div class="col-sm-12">
                                  <select name="cboTipoGas" id="cboTipoGas" class="form-control">
                                    <option value="">-- Select One --</option>
                                    <option value="">dasd</option>
                                  </select>
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="txtPrecio" class="col-sm-2 control-label">Precio:</label>
                                <div class="col-sm-12">
                                  <input type="text" name="txtPrecio" readonly id="txtPrecio" class="form-control" value="0" required="required" pattern="" title="">
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="txtCantidad" class="col-sm-2 control-label">Cantidad:</label>
                                <div class="col-sm-12">
                                  <input type="number" name="txtCantidad" id="txtCantidad" class="form-control" min="1" max="10" required="required" pattern="" title="">
                                </div>
                              </div>
                            	<input type="hidden" id="txtZona" value="<?php echo $_SESSION["zona"] ?>">
                              
                            
                              
                            </form>
                            </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" id="btnRegistrarVentaRuta">Registrar Venta</button>
			</div>
		</div>
	</div>
</div>


	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>	
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v3"></script>
<script type="text/javascript" src="js/script.js"></script>	
<script>
	inicioMapa(<?php echo $_SESSION["zona"] ?>);
</script>
</script>

</body>
</html>