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
                        <a class="active-menu" href="Usuarios.php"><i class="fa fa-users fa-3x"></i>Usuarios</a>
                    </li>
                    <li  >
                        <a class="inline-block" href="RespaldoBD.php"><img src="assets/img/ffffff-data-configuration-48.png" class="img-responsive inline-block" alt="Respaldar o Restaurar Base de datos"> Respaldo BD </a>
                    </li>	
                    <li  >
                        <a class="inline-block" href="Proveedores.php"><i class="fa fa-archive fa-3x"></i>Compra</a>
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
                    <div class="col-xs-12 ">
                        <div role="tabpanel">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#clientes" aria-controls="home" role="tab" data-toggle="tab">Listado de clientes</a>
                                </li>
                                <li role="presentation">
                                    <a href="#vendedores" aria-controls="tab" role="tab" data-toggle="tab">Listado de vendedores</a>
                                </li>
                                <li role="presentation">
                                    <a href="#administradores" aria-controls="tab2" role="tab" data-toggle="tab">Listado de administradores</a>
                                </li>
                            </ul>
                        
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="clientes">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Email</th>
                                                    <th>Telefono</th>
                                                    <th>Celular</th>
                                                    <th>Rut</th>
                                                    <th>Dirección</th>
                                                    <th>Departamento</th>
                                                    <th>Modificar</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyListarClientes">
                                               <?php //$c->listarClientes(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="vendedores">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Email</th>
                                                    <th>Telefono</th>
                                                    <th>Celular</th>
                                                    <th>Rut</th>
                                                    <th>Dirección</th>
                                                    <th>Departamento</th>
                                                    <th>Modificar</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyListarVendedores">
                                               <?php $c->listarVendedores(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane" id="administradores">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Email</th>
                                                    <th>Telefono</th>
                                                    <th>Celular</th>
                                                    <th>Rut</th>
                                                    <th>Dirección</th>
                                                    <th>Departamento</th>
                                                    <th>Modificar</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyListarAdmin">
                                               <?php $c->listarAdministradores(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div><!--/.row agregar usuario -->
                             
            </div><!-- /. PAGE WRAPPER  -->
         
        </div><!-- /. WRAPPER  -->
     
     <div class="modal fade" id="modal-id">
         <div class="modal-dialog modal-lg">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title">Modificar datos</h4>
                 </div>
                 <p hidden id="idUsuario"></p>
                 <div class="modal-body">
                     
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                     <button type="button" class="btn btn-primary" id="modificarDatos">Actualizar Datos</button>
                     <div class="alert alert-danger hidden"  id="mensajeBtnRegistro">Debe llenar todos los campos obligatorios...</div>
                 </div>
             </div>
         </div>
     </div>
     <div class="modal fade" id="modal-eliminar">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title">Eliminar Usuario</h4>
                 </div>
                 <p hidden id="idUsuarioEliminar"></p>
                 <div class="modal-body">
                     
                 </div>
                 <div class="modal-footer">
                    <h4>¿Esta seguro de eliminar al usuario?</h4>
                     <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">NO</button>
                     <button type="button" class="btn btn-danger btn-lg" id="eliminarUsuario">SI</button>
                     <div class="alert alert-danger hidden"  id="mensajeBtnEliminar">Debe llenar todos los campos obligatorios...</div>
                 </div>
             </div>
         </div>
     </div>

<input type="hidden" name="id" id="confirmUsuario" value="<?php echo $_SESSION["idUsuario"] ?>">
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../js/registro.js"></script>
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
     <script src="assets/js/toastr.js"></script>
    <script src="assets/js/mijs.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>

    <script src="assets/js/morris/morris.js"></script>

      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

    
    
   
</body>
</html>
