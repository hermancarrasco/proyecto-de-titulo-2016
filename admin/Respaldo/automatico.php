<?php
require_once("../../php/clase.php");
$c= new BaseDeDatos();
$c->conectarBD();

$c->controlarSesion();
if(isset($_REQUEST["cerrar"])){
  $c->cerrarSesion();
}
if (isset($_SESSION["tipoUsuario"])!="admin") {
  header("location: ../../index.php?msg=".md5(4)."");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Panel de Administración</title>
  <!-- BOOTSTRAP STYLES-->
  <link href="../assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="../assets/css/font-awesome.css" rel="stylesheet" />
  <!-- MORRIS CHART STYLES-->
  <link href="../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="../assets/css/custom.css" rel="stylesheet" />
  <link href="../assets/css/estilos.css" rel="stylesheet" />
  <link href="../assets/css/toastr.css" rel="stylesheet" />
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
                        <img src="../assets/img/find_user.png" class="user-image img-responsive"/>
                    </li>
                    <li>
                        <a href="../index.php"><i class="fa fa-home fa-3x"></i> Home</a>
                    </li>
                    <li>
                        <a  href="../agregarUsuario.php"><i class="fa fa-plus-square fa-3x"></i> Agregar usuarios</a>
                    </li>
                    <li>
                        <a  href="../GestionarVendedor.php"><i class="fa fa-map-marker fa-3x"></i> Gestionar Vendedores</a>
                    </li>
                    <li>
                        <a href="../Productos.php"><i class="fa fa-map-marker fa-3x"></i>Productos</a>
                    </li>
                    <li>
                        <a  href="../camiones.php"><i class="fa fa-truck fa-3x"></i>Camiones</a>
                    </li>
                    <li>
                        <a  href="../pedidos.php"><i class="fa fa-truck fa-3x"></i>Pedidos</a>
                    </li>
                    <li  >
                        <a   href="../estadisticas.php"><i class="fa fa-bar-chart-o fa-3x"></i> Estadisticas</a>
                    </li>

                    <li  >
                        <a  href="../usuarios.php"><i class="fa fa-users fa-3x"></i>Usuarios</a>
                    </li>
                    <li  >
                        <a class="inline-block active-menu" href="../RespaldoBD.php"><img src="../assets/img/ffffff-data-configuration-48.png" class="img-responsive inline-block" alt="Respaldar o Restaurar Base de datos"> Respaldo BD </a>
                    </li>				
                    <li  >
                        <a href="../Proveedores.php"><i class="fa fa-archive fa-3x"></i>Compra</a>
                    </li>               
                    <li  >
                        <a class="inline-block" href="../ventas.php"><i class="fa fa-archive fa-3x"></i>Ventas</a>
                    </li>
                    <li  >
                        <a href="../Auditoria.php"><i class="fa fa-tasks fa-3x"></i>Auditoria</a>
                    </li>             
                    
					                  
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-3x"></i>Reportes<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="../Reportes.php">Ventas Totales</a>
                            </li>
                            <li>
                                <a href="../ReportesZona.php">Ventas por Zona</a>
                            </li>
                            <li>
                                <a href="../ReportesRuta.php">Ventas en Ruta</a>                               
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
             <div class="container-fluid">
                <div class="col-xs-12 ">
                    <div class="row">
                        <div class="col-xs-12">
                            <form action="" method="POST" role="form">
                                <h3 class="text-center">Configuración de respaldos automaticos</h3>
                                
                                <div class="table-responsive">
                                    <legend>Configuración actual del respaldo automatico</legend>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Frecuencia</th>
                                                <th>Día</th>
                                                <th>Hora</th>
                                            </tr>
                                        </thead>
                                        <tbody id="cargaConfActualRespAuto">

                                        </tbody>
                                    </table>
                                </div>
                                <legend>Nueva configuración para generar respaldos automaticos</legend>
                                <p>Frecuencia de respaldo</p>
                                <div class="form-group">                                    
                                    <div class="btn-group" data-toggle="buttons">
                                      <label class="btn btn-warning active btn-lg" id="rbDiario">
                                          <input type="radio" value="DIARIO" name="options"  autocomplete="off" checked> Diario
                                      </label>
                                      <label class="btn btn-warning btn-lg" id="rbSemanal">
                                        <input type="radio" name="options" value="SEMANAL"  autocomplete="off"> Semanal
                                    </label>                                    
                                </div>
                            </div>
                            <div class="form-group" id="autoDia">
                                <label for="input" class="col-sm-2 control-label">Dia de respaldo</label>
                                <div class="col-sm-11 col-md-11 col-lg-10">
                                <select id="autoDiaSelect" class="form-control" required="required">
                                        <option value="1">Lunes</option>
                                        <option value="2">Martes</option>
                                        <option value="3">Miercoles</option>
                                        <option value="4">Jueves</option>
                                        <option value="5">Viernes</option>
                                        <option value="6">Sabado</option>
                                        <option value="7">Domingo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="autoHora">
                                <label for="input" class="col-sm-2 control-label">Hora de respaldo</label>
                                <div class="col-sm-11 col-md-11 col-lg-10">
                                    <select id="autoHoraSelect" class="form-control" required="required">
                                        <option value="00:00">00:00</option>
                                        <option value="01:00">01:00</option>
                                        <option value="02:00">02:00</option>
                                        <option value="03:00">03:00</option>
                                        <option value="04:00">04:00</option>
                                        <option value="05:00">05:00</option>
                                        <option value="06:00">06:00</option>
                                        <option value="07:00">07:00</option>
                                        <option value="08:00">08:00</option>
                                        <option value="09:00">09:00</option>
                                        <option value="10:00">10:00</option>
                                        <option value="11:00">11:00</option>
                                        <option value="12:00">12:00</option>
                                        <option value="13:00">13:00</option>
                                        <option value="14:00">14:00</option>
                                        <option value="15:00">15:00</option>
                                        <option value="16:00">16:00</option>
                                        <option value="17:00">17:00</option>
                                        <option value="18:00">18:00</option>
                                        <option value="19:00">19:00</option>
                                        <option value="20:00">20:00</option>
                                        <option value="21:00">21:00</option>
                                        <option value="22:00">22:00</option>
                                        <option value="23:00">23:00</option>

                                    </select>
                                </div>
                            </div>
                        </form>
                        <div class="form-group">
                            <div class="col-sm-10 col-offset-2">
                                <button type="button" class="btn btn-primary" id="btnConfigurarAuto">Configurar</button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="alert alert-info alert-success text-center input-lg" id="mensajeRespaldoManual">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Title!</strong> Alert body ...
                    </div> 
            </div>
        </div><!--/.row agregar usuario -->

    </div><!-- /. PAGE WRAPPER  -->

</div><!-- /. WRAPPER  -->
<input type="hidden" name="id" id="confirmUsuario" value="<?php echo $_SESSION["idUsuario"] ?>">
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="../assets/js/jquery-1.10.2.js"></script>

</script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/toastr.js"></script>
<script src="respaldo.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="../assets/js/jquery.metisMenu.js"></script>
<!-- MORRIS CHART SCRIPTS -->
<script src="../assets/js/morris/raphael-2.1.0.min.js"></script>
<script src="../assets/js/morris/morris.js"></script>

<!-- CUSTOM SCRIPTS -->
<script src="../assets/js/custom.js"></script>



</body>
</html>