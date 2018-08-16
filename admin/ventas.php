<?php
require_once("../php/clase.php");
$c= new BaseDeDatos();
$c->conectarBD();

$c->controlarSesion();
if(isset($_REQUEST["cerrar"])){
  $c->cerrarSesion();
}
if (isset($_SESSION["tipoUsuario"])!="admin") {
  header("location: ../index.php?msg=".md5(4)."");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Panel de Administración</title>
  <!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- MORRIS CHART STYLES-->
  <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="assets/css/custom.css" rel="stylesheet" />
  <link href="assets/css/estilos.css" rel="stylesheet" />
  <link href="assets/css/toastr.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " id="nav-lipigas" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" id="nav-lipigas" >GLPEXPRESS</a> 
            </div>
            <div style="color: white;
            padding: 15px 50px 5px 50px;
            float: right;
            font-size: 16px;"> <!-- Last access : 30 May 2014 &nbsp;-->Ultimo acceso : <?php echo $_SESSION["inicioAnterior"]; ?> <a href="index.php?cerrar='<?php echo md5("ok")?>'" class="btn btn-danger square-btn-adjust">Cerrar Sesion</a> </div>
        </nav>   
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" id="nav-lipigas" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive"/>
                    </li>


                    <li>
                        <a href="index.php"><i class="fa fa-home fa-3x"></i> Home</a>
                    </li>
                    <li>
                        <a  href="agregarUsuario.php"><i class="fa fa-plus-square fa-3x"></i> Agregar usuarios</a>
                    </li>
                    <li>
                        <a  href="GestionarVendedor.php"><i class="fa fa-map-marker fa-3x"></i> Gestionar Vendedores</a>
                    </li>
                    <li>
                        <a href="Productos.php"><i class="fa fa-map-marker fa-3x"></i>Productos</a>
                    </li>
                    <li>
                        <a  href="camiones.php"><i class="fa fa-truck fa-3x"></i>Camiones</a>
                    </li>
                    <li>
                        <a  href="pedidos.php"><i class="fa fa-truck fa-3x"></i>Pedidos</a>
                    </li>
                    <li  >
                        <a   href="estadisticas.php"><i class="fa fa-bar-chart-o fa-3x"></i> Estadisticas</a>
                    </li>

                    <li  >
                        <a  href="usuarios.php"><i class="fa fa-users fa-3x"></i>Usuarios</a>
                    </li>
                    <li  >
                        <a class="inline-block" href="RespaldoBD.php"><img src="assets/img/ffffff-data-configuration-48.png" class="img-responsive inline-block" alt="Respaldar o Restaurar Base de datos"> Respaldo BD </a>
                    </li>				
                    <li  >
                        <a class="active" class="inline-block" href="Proveedores.php"><i class="fa fa-archive fa-3x"></i>Compra</a>
                    </li>               
                    <li  >
                        <a class="active-menu" class="inline-block" href="ventas.php"><i class="fa fa-archive fa-3x"></i>Ventas</a>
                    </li>
                    <li  >
                        <a href="Auditoria.php"><i class="fa fa-tasks fa-3x"></i>Auditoria</a>
                    </li> 
                    <!--<li  >
                        <a href="Reportes.php"><i class="fa fa-bar-chart-o fa-3x"></i>Reportes</a>
                    </li>-->
                    
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-3x"></i>Reportes<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="Reportes.php">Ventas Totales</a>
                            </li>
                            <li>
                                <a href="ReportesZona.php">Ventas por Zona</a>
                            </li>
                            <li>
                                <a href="ReportesRuta.php">Ventas en Ruta</a>                               
                            </li>
                        </ul>
                    </li>

                </ul>

            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                       <h2>Panel de Administracion</h2>   
                       <h5>Bienvenido <?php echo $_SESSION["display_name"]; ?> </h5>
                   </div>
               </div><!-- /. PAGE INNER  -->  
               <div class="row">
                <div class="col-xs-12 ">
                    <div role="tabpanel">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                           <!-- <li role="presentation" class="active">
                                <a href="#regProveedor" aria-controls="regProveedor" role="tab" data-toggle="tab">Registrar Proveedor</a>
                            </li>
                            <li role="presentation">
                                <a href="#compra" aria-controls="compra" role="tab" data-toggle="tab">Registrar Compra</a>
                            </li> -->
                            <li role="presentation" class="active">
                                <a href="#facturas" aria-controls="facturas" role="tab" data-toggle="tab">Reporte de ventas Totales por Fecha</a>
                            </li>
                            <li role="presentation">
                                <a href="#ventasDiarias" aria-controls="compra" role="tab" data-toggle="tab">Registrar de Ventas por Días</a>
                            </li>
                        </ul>
                        
                        <!-- Tab panes -->
                        <div class="tab-content">
                           <!-- <div role="tabpanel" class="tab-pane active" id="regProveedor">

                                <div class="col-xs-12">
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                            <h3>Formulario de Proveedores</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label class="input-lg">Rut</label>
                                            <input type="text" class="form-control input-lg" onKeyPress="return solonumerosyk(event)" name="rut" id="rut" autofocus>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="input-lg">Razon Social</label>
                                            <input type="text" class="form-control input-lg" name="razonSocial" id="razonSocial" autofocus>
                                        </div>
                                        <div class="col-xs-6">
                                            <label class="input-lg">Giro</label>
                                            <input type="text" class="form-control input-lg" name="giro" id="giro" autofocus>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="input-lg">Dirección</label>
                                            <input type="text" class="form-control input-lg" name="direccion" id="direccion" autofocus>
                                        </div>
                                        <div class="col-xs-6">
                                            <label class="input-lg">Fono</label>
                                            <input type="text" class="form-control input-lg" onKeyPress="return solonumeros(event)" name="fono" id="fono" autofocus>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <br>
                                        <div class="col-xs-12">
                                            <label class="input-lg">Tipo de Insumos</label>
                                            <div class="btn-group" id="contRadios" data-toggle="buttons">

                                            </div>
                                            <a class="btn btn-primary btn-lg" id="btnModalAgregarTipo" data-toggle="modal" href='#modal-id'>Agregar Tipo</a>
                                            <div class="modal fade" id="modal-id">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title">Agregar tipo de Proveedor</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST" role="form">                                                                                                                                    
                                                                <div class="form-group">
                                                                    <label for="">Nombre de Tipo</label>
                                                                    <input type="text" class="form-control" id="nombreTipo" placeholder="Ej: Gas">
                                                                    <label for="">Descripcion (Opcional)</label>
                                                                    <textarea name="txtDescripcion" id="inputTxtDescripcion" class="form-control" rows="3" required="required"></textarea>
                                                                </div>                                                                

                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                            <button type="button" class="btn btn-primary" id="btnRegistrarTipo">Registrar tipo</button>
                                                            <div class="alert alert-danger hidden" id="mensajeBtnRegistrarTipo">Debe llenar todos los campos obligatorios...</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <button type="submit" class="btn btn-primary btn-lg pull-right" id="btnRegistrarProveedor">Registrar</button>
                                            <div class="alert alert-danger hidden" id="mensajeBtnRegistrarProveedor">...</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="compra">
                                <div class="col-xs-12">
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                            <h3>Formulario de Compras</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label class="input-lg">Proveedor:</label>
                                            
                                            <select name="cboProveedor" id="inputCboProveedor" class="form-control input-lg" required="required">

                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-12 thumbnail" id="contenedorCompra">
                                            <div class="row">


                                                <div class="col-xs-12" id="contComprar">
                                                    <div class="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        Para registrar una compra seleccione un proveedor...
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 ">
                                                <div class="form-group" id="formTotales">
                                                    <div class="col-xs-4">

                                                        <input type="hidden" class="form-control" readonly >
                                                    </div>
                                                    <div class="col-xs-2">

                                                        <input type="hidden" class="form-control">
                                                    </div>
                                                    <div class="col-xs-2">

                                                        <label for="" class="pull-right">Totales</label>
                                                    </div>
                                                    <div class="col-xs-2">

                                                        <input type="text" readonly="" class="form-control" id="ivaTotal">
                                                    </div>
                                                    <div class="col-xs-2">

                                                        <input type="text" readonly="" class="form-control" id="totalTotal" >
                                                    </div>
                                                    </div>
                                                    
                                                    <button type="button" class="btn btn-warning" id="unomas">Agregar un producto más</button>
                                                    <button type="button" class="btn btn-success pull-right" id="registrarCompra">Registrar Compra</button>
                                                    <div class="alert" id="alertRegistroFactura">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <span id="mensajeRegistroFactura">...</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div role="tabpanel" class="tab-pane active" id="facturas">
                                <h3 class="text-center">Listado de Ventas por Fechas</h3>

                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="inputDesde" class="col-sm-2 control-label">Mostrar desde:</label>
                                            <div class="col-sm-10">
                                                <input type="date" name="desde" id="inputDesde" class="form-control" value="" required="required" title="" max="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="inputHasta" class="col-sm-2 control-label">Mostrar hasta:</label>
                                            <div class="col-sm-10">
                                                <input type="date" name="Hasta" id="inputHasta" class="form-control" value="" required="required" title="" max="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 thumbnail" id="mostrarFacturas">
                                            <div class="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                Para ver las factures seleccione un rango de fechas...
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div><!-- cierre tab ventas por fechas-->

                            <div role="tabpanel" class="tab-pane " id="ventasDiarias">
                                <h3 class="text-center">Listado de Ventas por Fechas</h3>

                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="inputDesde" class="col-sm-2 control-label">Mostrar desde:</label>
                                            <div class="col-sm-10">
                                                <input type="date" name="desde" id="inputDesdePorDia" class="form-control" value="" required="required" title="" max="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="inputHasta" class="col-sm-2 control-label">Mostrar hasta:</label>
                                            <div class="col-sm-10">
                                                <input type="date" name="Hasta" id="inputHastaPorDia" class="form-control" value="" required="required" title="" max="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 thumbnail" id="mostrarFacturasPorDia">
                                            <div class="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                Para ver las factures seleccione un rango de fechas...
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div><!-- cierre tab ventas por fechas-->

                        </div>
                    </div>
                </div>
            </div><!--/.row agregar usuario -->
            
            <div class="modal fade" id="modalDetalleVentas">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Detalle de ventas</h4>
                        </div>
                        <div class="modal-body" id="dataModalDetalleVentas">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /. PAGE WRAPPER  -->

    </div><!-- /. WRAPPER  -->

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    
    <script type="text/javascript" src="../js/jquery.rut.js"></script>
    <script type="text/javascript">
        $(function(){

            $("#rut").rut({formatOn: 'keyup', validateOn: 'keyup'}).on('rutInvalido', function(){ $(this).parents(".control-group").addClass("has-error")}).on('rutValido', function(){ $(this).parents(".control-group").removeClass("has-error")});
        });

    </script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    CUSTOM SCRIPTS -->
    <script src="assets/js/toastr.js"></script>
    <script src="assets/js/ventas.js"></script>
    <script src="assets/js/custom.js"></script>
    
    
    

</body>
</html>
