<?php
require_once("../php/clase.php");
    $c= new BaseDeDatos();
    $c->conectarBD();
    
    $c->controlarSesion();
    if(isset($_REQUEST["cerrar"])){
      $c->cerrarSesion();
      }
      @session_start(); 
      if ($_SESSION["tipoUsuario"] != "admin") {
          
          header("location: ../index.php?msg=".md5(4)."");
      }
       $c->desconectarBD();

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
                        <a  href="index.php"><i class="fa fa-home fa-3x"></i> Home</a>
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
                        <a href="Proveedores.php"><i class="fa fa-archive fa-3x"></i>Compra</a>
                    </li>               
                    <li  >
                        <a class="inline-block" href="ventas.php"><i class="fa fa-archive fa-3x"></i>Ventas</a>
                    </li>
                    <li  >
                        <a class="active-menu" href="Auditoria.php"><i class="fa fa-tasks fa-3x"></i>Auditoria</a>
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
                                <li role="presentation" class="active">
                                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Ultimas Sesiones</a>
                                </li>
                                <li role="presentation">
                                    <a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">Acciones Criticas</a>
                                </li>
                            </ul>
                            
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="col-xs-12" id="conntListadoSesiones"></div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="tab">
                                    <div role="tabpanel">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active">
                                                <a href="#tabIngresos" aria-controls="tabIngresos" role="tab" data-toggle="tab">Ingresos</a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#tabModificaciones" aria-controls="tabModificaciones" role="tab" data-toggle="tab">Modificaciones</a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#tabEliminaciones" aria-controls="tabEliminaciones" role="tab" data-toggle="tab">Eliminaciones</a>
                                            </li>
                                        </ul>
                                    
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="tabIngresos">
                                            
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="tabModificaciones">Modifica</div>
                                            <div role="tabpanel" class="tab-pane" id="tabEliminaciones">Elimina</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.row agregar usuario -->
                   
                             <div class="modal fade" id="modal-id">
                                 <div class="modal-dialog modal-lg">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                             <h4 class="modal-title">Modal title</h4>
                                         </div>
                                         <div class="modal-body" id="dataModalUltimaSesion">
                                             Cargando...
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
    <script type="text/javascript" src="js/auditoria.js"></script>
      
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
      <script src="assets/js/toastr.js"></script>
    <script src="assets/js/custom.js"></script>
    
    
   
</body>
</html>
