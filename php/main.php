<?php
require_once("clase.php");
$c= new BaseDeDatos();
$c->conectarBD();
if (isset($_REQUEST["Ingresar"])) {

	$usu=$_REQUEST["mail"];
	$pas=$_REQUEST["pass"];
	$c->login($usu, $pas);
}
if(isset($_REQUEST["cerrar"])){
	$c->cerrarSesion();
}  

?>

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
					<li><a href="#acerca_de">Acerca de</a></li>
					<li><a href="#solicitePedido">Solicite Pedido</a></li>
					<li><a href="php/faq.php">FAQ</a></li>
					<?php 
	            //$c->sesionusuario();
					@session_start(); 
					if (isset($_SESSION["tipoUsuario"])) {
						if ($_SESSION["tipoUsuario"] === "cliente") {							
							echo '<li><a href="cliente/index.php">Hacer Pedido</a></li>';
						}elseif ($_SESSION["tipoUsuario"] === "admin") {
							echo '<li><a href="admin/index.php">Entorno Administrativo</a></li>';
						}elseif ($_SESSION["tipoUsuario"] === "vendedor") {
							echo '<li><a href="vendedor/index.php">Entorno de Entregas</a></li>';
						}
					}

					?>


				</ul>


				<?php 
	          		//@session_start();
				if (isset($_SESSION["tipoUsuario"])) {
					if ($_SESSION["tipoUsuario"] == "cliente") {	          		 
						echo '<ul class="nav navbar-nav pull-right" >';
						echo '<li><a href="php/main.php?cerrar=';echo md5("ok"),'">Cerrar Sesion</a></li>';
						echo '</ul>';
					}elseif ($_SESSION["tipoUsuario"] == "admin") {
						echo '<ul class="nav navbar-nav pull-right" >';
						echo '<li><a href="php/main.php?cerrar=';echo md5("ok"),'">Cerrar Sesion</a></li>';
						echo '</ul>';
					}elseif ($_SESSION["tipoUsuario"] == "vendedor") {
						echo '<ul class="nav navbar-nav pull-right" >';
						echo '<li><a href="php/main.php?cerrar=';echo md5("ok"),'">Cerrar Sesion</a></li>';
						echo '</ul>';
					}
				} else{
					echo '<ul ul class="nav navbar-nav pull-right">
					<li><a class="btn" data-toggle="modal" href="#modal-id">Iniciar Sesión</a></li>
					<li><a href="php/registro.php">Registrese</a></li>
					</ul';
				}

				?>
			</div><!--/.nav-collapse -->
		</div>
	</div>
</header>

<section class="container-fluid jumbotron" style="background-color: #FACC2E;" id="solicitePedido">
	<div class="row">
		<div class="col-xs-12">
			<div class="container">
				<div class="row">
					<?php
					if (isset($_REQUEST["msg"])) {
						switch ($_REQUEST["msg"]) {
							case md5(1):
							echo '<div class="alert">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>Hey!</strong> Usuario o contraseña incorrecto, Intenta nuevamente ...
						</div>';
						break;
						case md5(2):
						echo '<div class="alert">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Hey!</strong> Debe iniciar sesión para accceder al portal ...
					</div>';
					break;
					case md5(3):
					echo '<div class="alert">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Hey!</strong> Gracias por su participación ...
				</div>';
				break;
				case md5(4):
				echo '<div class="alert">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Hey!</strong> No tiene permiso para acceder a esta pagina...
			</div>';
			break;
			default:
			echo '<div class="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Hey!</strong> Error, url no valida! ...
		</div>';
		break;
	}
}

?>
<p class="lead">Bienvenido, si quieres solicitar tu gas inicia sesion o registrate!</p>

<div class="col-xs-12">
	<h2>Solicite Su Pedido</h2>
	<p>
		<img src="img/ftr.png" class="img-responsive">
	</p>
</div>
</div>
</div>
</div>
</div>		
</section>

<div class="jumbotron" id="entorno_cliente">
	<section id="principal" class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="starter-template">
								
							</div>

						</div><!-- /.container -->	

						<!-- Modal de inicio de sesion -->
						<div class="modal  fade " id="modal-id" style="opacity: 0.9;">
							<div class="modal-dialog" >
								<div class="modal-content" >
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h2 class="form-signin-heading text-center">Iniciar Sesion</h2>
									</div>
									<div class="modal-body">
										<form class="form-signin fomrulario-lipigas" role="form" method="post" action="#">

											<input type="email" class="form-control" placeholder="correo@dominio.com" name="mail" required="" autofocus>
											<input type="password" class="form-control" placeholder="Contraseña" name="pass" required="">
										        <!--<label class="checkbox">
										          <input type="checkbox" value="remember-me">Recordarme
										      </label>-->
										      <br>
										      <button class="btn btn-lg btn-warning btn-block" type="submit" name="Ingresar">INGRESAR</button>
										      <small><a href="php/registro.php">Registrese</a></small>
										      
										  </form>
										</div>

									</div>
								</div>
							</div>
							<!-- Cierre modal inicio de sesion -->

							<section class="container-fluid">	
								<div class="row">
									<div class="col-xs-12 col-md-12 ">
										<div id="carousel-id" class="carousel slide" data-ride="carousel">
											<ol class="carousel-indicators">
												<li data-target="#carousel-id" data-slide-to="0" class=""></li>
												<li data-target="#carousel-id" data-slide-to="1" class=""></li>
												<li data-target="#carousel-id" data-slide-to="2" class="active"></li>
											</ol>
											<div class="carousel-inner">
												<div class="item">
													<img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" width="100%" height="80%"  alt="First slide" src="img/carousel/c1.jpg">
										            <!--<div class="container">
										                <div class="carousel-caption">
										                    <h1>Example headline.</h1>
										                    <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
										                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
										                </div>
										            </div>-->
										        </div>
										        <div class="item">
										        	<img data-src="holder.js/900x500/auto/#666:#6a6a6a/text:Second slide" width="100%" alt="Second slide"  src="img/carousel/c2.jpg">
										            <!--<div class="container">
										                <div class="carousel-caption">
										                    <h1>Another example headline.</h1>
										                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
										                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
										                </div>
										            </div>-->
										        </div>
										        <div class="item active">
										        	<img data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" width="100%" alt="Third slide" src="img/carousel/c3.jpg">
										           <!-- <div class="container">
										                <div class="carousel-caption">
										                    <h1>One more for good measure.</h1>
										                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
										                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
										                </div>
										            </div>-->
										        </div>
										    </div>
										    <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
										    <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
										</div>
									</div>
								</div>
							</section>	
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<section class="container-fluid" id="acerca_de">
		<div class="row">
			<div class="col-xs-12">
				<div class="container">
					<div class="row">
						<article class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<h2>Acerca De Nosotros</h2>
							<p class="text-justify">

								
								Lipigas es la empresa l&iacute;der de gas licuado en Chile, alcanzando un 38% en participaci&oacute;n de mercado  con la mayor cobertura a nivel nacional, presente en los sectores residenciales, industriales e inmobiliarios.
							
							<span id="acercaDe"  class="collapse">
								 con certificaciones ambientales y de seguridad; que cuenta con plantas de envasado que est&aacute;n entre las m&aacute;s moderna de Am&eacute;rica Latina y es la &uacute;nica del rubro que contar&aacute; con un terminal mar&iacute;timo de uso exclusivo; una compa&ntilde;&iacute;a que ha dado pasos de internacionalizaci&oacute;n (actualmente esta presente en Colombia y Per&uacute;) , y cuenta con premios que reconocen su calidad, su reputaci&oacute;n corporativa y su ambiente laboral (Carlos Vial Espantoso, Procalidad, Great Place to Work, etc).
							</span>
							</p>
							<a href="#acercaDe" data-toggle="collapse">Ver Mas</a>

						</article>
						<article class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
							<img src="img/left.jpg" class="img-responsive" >		
						</article>
					</div>			
				</div>
			</div>
		</div>
	</section>




	<footer class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 text-center">
							<p>Sucursal Lipigas &copy; Company <?php echo date('Y'); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>