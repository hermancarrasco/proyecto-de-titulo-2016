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
						<a class="active-menu" href="agregarUsuario.php"><i class="fa fa-plus-square fa-3x"></i> Agregar usuarios</a>
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
					<li>
						<a href="Usuarios.php"><i class="fa fa-users fa-3x"></i>Usuarios</a>
					</li>
					<li  >
						<a  href="RespaldoBD.php"><img src="assets/img/ffffff-data-configuration-48.png" class="img-responsive inline-block" alt="Respaldar o Restaurar Base de datos"> Respaldo BD </a>
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
					<div class="well text-center">
						<a class="btn btn-default" data-toggle="modal" href='#agregarUsuarioModal'> 
							<i class="fa fa-user fa-5x"></i><i class="fa fa-plus fa-5x"></i>
							<p>Ingresar Cliente</p>
						</a>
					</div>
					<div class="well text-center">
						<a class="btn btn-default" data-toggle="modal" href='#agregarVendedorModal'> 
							<i class="fa fa-truck fa-5x"></i><i class="fa fa-plus fa-5x"></i>
							<p>Ingresar Vendedor</p>
						</a>
					</div>
					<div class="well text-center">
						<a class="btn btn-default" data-toggle="modal" href='#agregarAdminModal'> 
							<i class="fa fa-users fa-5x"></i><i class="fa fa-plus fa-5x"></i>
							<p>Ingresar Administrador</p>
						</a>
					</div>


					<!--Modal Agregar Usuario-->
					<div class="modal fade" id="agregarUsuarioModal">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Ingresar Nuevo Cliente</h4>
								</div>
								<div class="modal-body">
									<div class="jumbotron">
									   <section id="principal-registro" class="container-fluid"> 
										<div class="row">
											<div class="col-xs-12 col-md-12 ">
												<article class="container">
													<div class="container-fluid">  
														<div class="row">
															<div class="col-xs-12 head-registro">
															   <h2 class="form-signin-heading">Los campos con (*) son obligatorios</h2>
														   </div>
													   </div>
												   </div>
												   <form class="form-signin registro-lipigas" role="form">
													<div class="row">

														<div class="col-xs-12"><label>E-mail</label> <b>*</b>
															<input type="email" class="form-control" name="email" id="email" placeholder="correo@dominio.com" autofocus></div>
															<div class="alert alert-danger hidden" id="mensajeemail">El formato de correo no es correcto...</div>
														</div>
														<div class="row">
															<div class="col-xs-12"><label>Password</label> <b>*</b>
																<input type="password" class="form-control" name="password" id="password" placeholder="contraseña"></div>

																<div class="col-xs-12"><label>Repita Password</label> <b>*</b>
																	<input type="password" class="form-control" name="repassword" id="repassword" placeholder="contraseña"></div>
																	<div class="alert alert-danger hidden" id="mensajepass">Las contraseñas no coinciden...</div>
																</div>
																<div class="row">
																	<div class="col-xs-12"><label>Nombre</label> <b>*</b>
																		<input type="text" class="form-control" name="nombre" id="nombre" onKeyPress="return sololetras(event)" placeholder="Nombre" autofocus></div>
																	</div>
																	<div class="row">    
																		<div class="col-xs-12"><label>Apellidos</label> <b>*</b>
																			<input type="text" class="form-control" name="apellidos" id="apellidos" onKeyPress="return sololetras(event)" placeholder="Paterno Materno" autofocus></div>
																		</div>
																		<div class="row"> 
																			<div class="control-group">
																				<div class="col-xs-12"><label>Rut</label> <b>*</b>
																					<input type="text" class="form-control" name="rut" id="rut" maxlength="12" onKeyPress="return solonumerosyk(event)" placeholder="11.111.111-1"  autofocus></div>
																				</div>
																			</div>
																			<div class="row">    
																				<div class="col-xs-6">
																					<label>Dirección</label> <b>*</b>
																					<input type="text" class="form-control" name="direccion" id="direccion" onKeyPress="return sololetras(event)" placeholder="AV Nelson Pereira" autofocus>
																				</div>
																				<div class="col-xs-6">
																					<label>Número</label> <b>*</b>
																					<input type="text" class="form-control" name="numero" id="numero" onKeyPress="return solonumeros(event)" placeholder="000" autofocus>
																				</div>
																			</div>
																			<div class="row">
																				<div class="col-xs-12">
																					<label>Departamento/Condominio</label>
																					<input type="text" class="form-control" name="departamento" id="departamento" placeholder="Número de departamento/casa" autofocus>
																				</div>
																			</div>
																			<div class="row"> 
																				<div class="col-xs-12"><label>Telefono Fijo</label>
																					<input type="tel" class="form-control" name="telefonofijo" id="telefonofijo" onKeyPress="return solonumeros(event)" placeholder="99889988" autofocus></div>
																				</div>
																				<div class="row">    
																					<div class="col-xs-12"><label>Celular</label>
																						<div class="row">
																							<div class="col-xs-4 col-md-2"><input type="tel" class="form-control" placeholder="+569" readonly></div>
																							<div class="col-xs-8 col-md-10"><input type="tel" class="form-control" name="celular" id="celular" onKeyPress="return solonumeros(event)" placeholder="99889988" autofocus></div>
																						</div></div>

																					</div>
																					<div class="row">
																						<div class="col-xs-12"><label class="checkbox">
																							<input type="checkbox" name="checkregistro" id="checkregistro" value="Terminos" required> Acepto los terminos y condiciones! <b>*</b>
																						</label></div>
																					</div>

																					<!--<button type="submit" class="btn btn-primary btn-lg btn-block">Registrarme</button>-->
																				</form>
																			</article>
																		</div>
																	</div>                
																</section>
															</div>
														</div>
														<div class="modal-footer">
														 <button class="btn btn-lg btn-warning btn-block" name="btnRegistro"  id="btnRegistro" type="button">Registrarme!</button>
														 <div class="alert alert-danger hidden"  id="mensajeBtnRegistro">Debe llenar todos los campos obligatorios...</div>
													 </div>
												 </div>
											 </div>
										 </div>
										 <!--Termino Modal Agregar Usuario-->




										 <!--Inicio Modal Agregar Vendedor-->
										 <div class="modal fade" id="agregarVendedorModal">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title text-center">Registrar Nuevo Vendedor</h4>
													</div>
													<div class="modal-body">
														<div class="jumbotron">
														   <section id="principal-registro" class="container-fluid"> 
															<div class="row">
																<div class="col-xs-12 col-md-12 ">
																	<article class="container">
																		<div class="container-fluid">  
																			<div class="row">
																				<div class="col-xs-12 head-registro">
																				   <h2 class="form-signin-heading text-center">Los campos con (*) son obligatorios</h2>
																			   </div>
																		   </div>
																	   </div>
																	   <form class="form-signin registro-lipigas" role="form">
																		<div class="row">

																			<div class="col-xs-12"><label>E-mail</label> <b>*</b>
																				<input type="email" class="form-control" name="emailven" id="emailven" placeholder="correo@dominio.com" autofocus></div>
																				<div class="alert alert-danger hidden" id="mensajeemailven">El formato de correo no es correcto...</div>
																			</div>
																			<div class="row">
																				<div class="col-xs-12"><label>Password</label> <b>*</b>
																					<input type="password" class="form-control" name="passwordven" id="passwordven" placeholder="contraseña"></div>

																					<div class="col-xs-12"><label>Repita Password</label> <b>*</b>
																						<input type="password" class="form-control" name="repasswordven" id="repasswordven" placeholder="contraseña"></div>
																						<div class="alert alert-danger hidden" id="mensajepassven">Las contraseñas no coinciden...</div>
																					</div>
																					<div class="row">
																						<div class="col-xs-12"><label>Nombre</label> <b>*</b>
																							<input type="text" class="form-control" name="nombreven" id="nombreven" onKeyPress="return sololetras(event)" placeholder="Nombre" autofocus></div>
																						</div>
																						<div class="row">    
																							<div class="col-xs-12"><label>Apellidos</label> <b>*</b>
																								<input type="text" class="form-control" name="apellidosven" id="apellidosven" onKeyPress="return sololetras(event)" placeholder="Paterno Materno" autofocus></div>
																							</div>
																							<div class="row"> 
																								<div class="control-group">
																									<div class="col-xs-12"><label>Rut</label> <b>*</b>
																										<input type="text" class="form-control" name="rutven" id="rutven" maxlength="12" onKeyPress="return solonumerosyk(event)" placeholder="11.111.111-1"  autofocus></div>
																									</div>
																								</div>
																								<div class="row">    
																									<div class="col-xs-6">
																										<label>Dirección</label> <b>*</b>
																										<input type="text" class="form-control" name="direccionven" id="direccionven" onKeyPress="return sololetras(event)" placeholder="AV Nelson Pereira" autofocus>
																									</div>
																									<div class="col-xs-6">
																										<label>Número</label> <b>*</b>
																										<input type="text" class="form-control" name="numeroven" id="numeroven" onKeyPress="return solonumeros(event)" placeholder="000" autofocus>
																									</div>
																								</div>
																								<div class="row">
																									<div class="col-xs-12">
																										<label>Departamento/Condominio</label>
																										<input type="text" class="form-control" name="departamentoven" id="departamentoven" placeholder="Número de departamento/casa" autofocus>
																									</div>
																								</div>
																								<div class="row"> 
																									<div class="col-xs-12"><label>Telefono Fijo</label>
																										<input type="tel" class="form-control" name="telefonofijoven" id="telefonofijoven" onKeyPress="return solonumeros(event)" placeholder="99889988" autofocus></div>
																									</div>
																									<div class="row">    
																										<div class="col-xs-12"><label>Celular</label>
																											<div class="row">
																												<div class="col-xs-4 col-md-2"><input type="tel" class="form-control" placeholder="+569" readonly></div>
																												<div class="col-xs-8 col-md-10"><input type="tel" class="form-control" name="celularven" id="celularven" onKeyPress="return solonumeros(event)" placeholder="99889988" autofocus></div>
																											</div></div>

																										</div>
																										<div class="row">
																											<div class="col-xs-12"><label class="checkbox">
																												<input type="checkbox" name="checkregistroven" id="checkregistroven" value="Terminos" required> Acepto los terminos y condiciones! <b>*</b>
																											</label></div>
																										</div>

																										<!--<button type="submit" class="btn btn-primary btn-lg btn-block">Registrarme</button>-->
																									</form>
																								</article>
																							</div>
																						</div>
																					</section>
																				</div>
																			</div>
																			<div class="modal-footer">
																			 <button class="btn btn-lg btn-warning btn-block" name="btnRegistroven"  id="btnRegistroven" type="button">Registrarme!</button>
																			 <div class="alert alert-danger hidden"  id="mensajeBtnRegistroven">Debe llenar todos los campos obligatorios...</div>
																		 </div>
																	 </div>
																 </div>
															 </div>
															 <!--Termino modal Agregar Vendedor-->

															 <!-- Inicio modal Administrador  -->

															 <div class="modal fade" id="agregarAdminModal">
																<div class="modal-dialog modal-lg">
																	<div class="modal-content">
																		<div class="modal-header">
																			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																			<h4 class="modal-title">Ingresar Nuevo Administrador</h4>
																		</div>
																		<div class="modal-body">
																			<div class="jumbotron">
																			   <section id="principal-registro" class="container-fluid"> 
																				<div class="row">
																					<div class="col-xs-12 col-md-12 ">
																						<article class="container">
																							<div class="container-fluid">  
																								<div class="row">
																									<div class="col-xs-12 head-registro">
																									   <h2 class="form-signin-heading">Los campos con (*) son obligatorios</h2>
																								   </div>
																							   </div>
																						   </div>
																						   <form class="form-signin registro-lipigas" role="form">
																							<div class="row">

																								<div class="col-xs-12"><label>E-mail</label> <b>*</b>
																									<input type="email" class="form-control" name="emailadm" id="emailadm" placeholder="correo@dominio.com" autofocus></div>
																									<div class="alert alert-danger hidden" id="mensajeemailadm">El formato de correo no es correcto...</div>
																								</div>
																								<div class="row">
																									<div class="col-xs-12"><label>Password</label> <b>*</b>
																										<input type="password" class="form-control" name="passwordadm" id="passwordadm" placeholder="contraseña"></div>

																										<div class="col-xs-12"><label>Repita Password</label> <b>*</b>
																											<input type="password" class="form-control" name="repasswordadm" id="repasswordadm" placeholder="contraseña"></div>
																											<div class="alert alert-danger hidden" id="mensajepassadm">Las contraseñas no coinciden...</div>
																										</div>
																										<div class="row">
																											<div class="col-xs-12"><label>Nombre</label> <b>*</b>
																												<input type="text" class="form-control" name="nombreadm" id="nombreadm" onKeyPress="return sololetras(event)" placeholder="Nombre" autofocus></div>
																											</div>
																											<div class="row">    
																												<div class="col-xs-12"><label>Apellidos</label> <b>*</b>
																													<input type="text" class="form-control" name="apellidosadm" id="apellidosadm" onKeyPress="return sololetras(event)" placeholder="Paterno Materno" autofocus></div>
																												</div>
																												<div class="row"> 
																													<div class="control-group">
																														<div class="col-xs-12"><label>Rut</label> <b>*</b>
																															<input type="text" class="form-control" name="rutadm" id="rutadm" maxlength="12" onKeyPress="return solonumerosyk(event)" placeholder="11.111.111-1"  autofocus></div>
																														</div>
																													</div>
																													<div class="row">    
																														<div class="col-xs-6">
																															<label>Dirección</label> <b>*</b>
																															<input type="text" class="form-control" name="direccionadm" id="direccionadm" onKeyPress="return sololetras(event)" placeholder="AV Nelson Pereira" autofocus>
																														</div>
																														<div class="col-xs-6">
																															<label>Número</label> <b>*</b>
																															<input type="text" class="form-control" name="numeroadm" id="numeroadm" onKeyPress="return solonumeros(event)" placeholder="000" autofocus>
																														</div>
																													</div>
																													<div class="row">
																														<div class="col-xs-12">
																															<label>Departamento/Condominio</label>
																															<input type="text" class="form-control" name="departamentoadm" id="departamentoadm" placeholder="Número de departamento/casa" autofocus>
																														</div>
																													</div>
																													<div class="row"> 
																														<div class="col-xs-12"><label>Telefono Fijo</label>
																															<input type="tel" class="form-control" name="telefonofijoadm" id="telefonofijoadm" onKeyPress="return solonumeros(event)" placeholder="99889988" autofocus></div>
																														</div>
																														<div class="row">    
																															<div class="col-xs-12"><label>Celular</label>
																																<div class="row">
																																	<div class="col-xs-4 col-md-2"><input type="tel" class="form-control" placeholder="+569" readonly></div>
																																	<div class="col-xs-8 col-md-10"><input type="tel" class="form-control" name="celularadm" id="celularadm" onKeyPress="return solonumeros(event)" placeholder="99889988" autofocus></div>
																																</div></div>

																															</div>
																															<div class="row">
																																<div class="col-xs-12"><label class="checkbox">
																																	<input type="checkbox" name="checkregistroadm" id="checkregistroadm" value="Terminos" required> Acepto los terminos y condiciones! <b>*</b>
																																</label></div>
																															</div>

																															<!--<button type="submit" class="btn btn-primary btn-lg btn-block">Registrarme</button>-->
																														</form>
																													</article>
																												</div>
																											</div>                
																										</section>
																									</div>
																								</div>
																								<div class="modal-footer">
																								 <button class="btn btn-lg btn-warning btn-block" name="btnRegistroadm"  id="btnRegistroadm" type="button">Registrarme!</button>
																								 <div class="alert alert-danger hidden"  id="mensajeBtnRegistroadm">Debe llenar todos los campos obligatorios...</div>
																							 </div>
																						 </div>
																					 </div>
																				 </div>


																				 <!--Termino modal Agregar Admin-->
																			 </div>
																		 </div><!--/.row agregar usuario -->

																	 </div><!-- /. PAGE WRAPPER  -->

																 </div><!-- /. WRAPPER  -->
																 <input type="hidden" name="id" id="confirmUsuario" value="<?php echo $_SESSION["idUsuario"] ?>">
																 <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
																 <!-- JQUERY SCRIPTS -->
																 <script src="assets/js/jquery-1.10.2.js"></script>
																 <script type="text/javascript" src="js/agregarUsuario.js"></script>
																 <script type="text/javascript" src="../js/jquery.rut.js"></script>
																 <script type="text/javascript">
																	$(function(){

																		$("#rut").rut({formatOn: 'keyup', validateOn: 'keyup'}).on('rutInvalido', function(){ $(this).parents(".control-group").addClass("has-error")}).on('rutValido', function(){ $(this).parents(".control-group").removeClass("has-error")});
																		$("#rutven").rut({formatOn: 'keyup', validateOn: 'keyup'}).on('rutInvalido', function(){ $(this).parents(".control-group").addClass("has-error")}).on('rutValido', function(){ $(this).parents(".control-group").removeClass("has-error")});
																		$("#rutadm").rut({formatOn: 'keyup', validateOn: 'keyup'}).on('rutInvalido', function(){ $(this).parents(".control-group").addClass("has-error")}).on('rutValido', function(){ $(this).parents(".control-group").removeClass("has-error")});
																	});
																</script>
																<!-- BOOTSTRAP SCRIPTS -->
																<script src="assets/js/bootstrap.min.js"></script>
																<!-- METISMENU SCRIPTS -->
																<script src="assets/js/jquery.metisMenu.js"></script>
																<!-- MORRIS CHART SCRIPTS -->
																<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
																<script src="assets/js/morris/morris.js"></script>
																<script src="assets/js/toastr.js"></script>
																<!-- CUSTOM SCRIPTS -->
																<script src="assets/js/custom.js"></script>



															</body>
															</html>
