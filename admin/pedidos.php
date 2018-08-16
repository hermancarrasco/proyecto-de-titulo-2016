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
    <title>Panel de Administración/Pedidos</title>
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
                        <a class="active-menu" href="pedidos.php"><i class="fa fa-truck fa-3x"></i>Pedidos</a>
                    </li>
                           <li  >
                        <a   href="estadisticas.php"><i class="fa fa-bar-chart-o fa-3x"></i> Estadisticas</a>
                    </li>                    	
                      <li  >
                        <a  href="Usuarios.php"><i class="fa fa-users fa-3x"></i>Usuarios</a>
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
                  <div class="col-md-12">
                  
                  <a class="btn btn-warning btn-lg" data-toggle="modal" href='#pedido'>Realizar Pedido</a>
                  </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 ">

                       <div class="table-responsive">
                           <table class="table table-hover">
                               <thead>
                                   <tr>                                       
                                       <th>Usuario</th>
                                       <th>Dirección</th>
                                       <th>Producto</th>
                                       <th>Precio</th>
                                       <th>Fecha de pedido</th>
                                       <th>Entregado</th>
                                       <th>Pagado</th>                                       
                                   </tr>
                               </thead>
                               <tbody>
                                   <?php $c->listarPedidos();?>
                               </tbody>
                           </table>
                       </div>                    
                    
                    </div>

                    <div class="modal fade" id="pedido">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Nuevo Pedido</h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                            <form action="" method="POST" role="form">
                              <legend>Datos de Pedido</legend>
                            
                              <div class="form-group">
                                <label for="input" class="col-sm-2 control-label">Dirección:</label>
                                <div class="col-sm-10">
                                  <input type="text" name="txtDireccion" id="txtDireccion" class="form-control" value="" required="required" pattern="" title="">
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="input" class="col-sm-2 control-label">Tipo de Gas:</label>
                                <div class="col-sm-10">
                                  <select name="cboTipoGas" id="cboTipoGas" class="form-control">
                                    <option value="">-- Select One --</option>
                                    <option value="">dasd</option>
                                  </select>
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="input" class="col-sm-2 control-label">Precio:</label>
                                <div class="col-sm-10">
                                  <input type="text" name="txtPrecio" readonly id="txtPrecio" class="form-control" value="0" required="required" pattern="" title="">
                                </div>
                              </div>
                            
                              <div class="form-group">
                                <label for="input" class="col-sm-2 control-label">Zona</label>
                                <div class="col-sm-10">
                                  <select name="cboTipoGas" id="cboTipoGas" class="form-control">
                                    <option value="0">-- Selecione una Zona --</option>
                                    <option value="1">Noroeste</option>
                                    <option value="2">Noreste</option>
                                    <option value="3">Suroeste</option>
                                    <option value="4">Sureste</option>
                                  </select>
                                </div>
                              </div>
                            
                              
                            </form>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="btnRegistrarPedido">Registrar Pedido</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </div><!--/.row agregar usuario -->
                             
            </div><!-- /. PAGE WRAPPER  -->
         
        </div><!-- /. WRAPPER  -->
     
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <script src="assets/js/toastr.js"></script>
      <!-- CUSTOM SCRIPTS -->
      <script src="js/pedidos.js"></script>
    <script src="assets/js/custom.js"></script>
    
    
   
</body>
</html>
