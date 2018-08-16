<?php
        require_once("clase.php");
        $c= new BaseDeDatos();
        $c->conectarBD();

if (isset($_POST["btnRegistro"])) {

        $rut=$_REQUEST["rut"];
        $pas=$_REQUEST["password"];
        $repass=$_REQUEST["repassword"];
        $nom=$_REQUEST["nombre"];
        $ape=$_REQUEST["apellidos"];
        $tel=$_REQUEST["telefonofijo"];
        $cel=$_REQUEST["celular"];
        $mail=$_REQUEST["email"];    
        $dir=$_REQUEST["direccion"];
        $num=$_REQUEST["numero"];
        $dep=$_REQUEST["departamento"];

    if ($pas != "" || $nom != "" || $ape != "" || $mail != "" || $rut != "" || $dir != "" || $num!="") {
        if ($pas != $repass) {
            ?><script>console.log("pass distintos")</script><?php
        } else {
            $c->ingresarUsuario($mail,$rut,$pas,$nom,$ape,$tel,$cel,$dir,$num,$dep);
            ?><script>console.log("pass iguales")</script>
            <?php
        }
    }else{
        ?>
            <script type="text/javascript"> alert("debe llenar todos los campos");</script>
        <?php 
    }    
        
}    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro | GLPEXPRESS</title>
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
                <li class="active"><a href="../index.php">Home</a></li>
                <li><a href="../index.php">Acerca de</a></li>
                <li><a href="../index.php">Solicite Pedido</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>
    </header>

    <div class="jumbotron" id="formulario-registro">
        <section id="principal-registro" class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="starter-template hidden-xs">
                                    <h1>Registro Cliente</h1>
                                    <p class="lead">Bienvenido! </p>
                                 </div>
                                 <div class="starter-template visible-xs-block hidden-lg hidden-md hidden-sm">
                                    <h2>Bienvenido a Registro Cliente</h2>
                                     
                                 </div>
                            </div><!-- /.container -->      


                            <section class="container-fluid">   
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
                                                    <input type="password" class="form-control" minlength="7" name="password" id="password" placeholder="contraseña"></div>
                                                
                                                    <div class="col-xs-12"><label>Repita Password</label> <b>*</b>
                                                    <input type="password" class="form-control" minlength="7" name="repassword" id="repassword" placeholder="contraseña"></div>
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
                                                    <div class="col-xs-12"> 
                                                        <label>Zona</label> <a class="btn" data-toggle="modal" href="#zonas" role="button">Ver Zonas</a>
                                                        <select name="cboZona" id="cboZona" class="form-control" required="required">
                                                            <option value="0">Seleccione Zona de Domicilio</option>
                                                            <option value="1">NOROESTE</option>
                                                            <option value="2">NORESTE</option>
                                                            <option value="3">SUROESTE</option>
                                                            <option value="4">SURESTE</option>
                                                        </select>
                                                    </div>
                                                    <div class="alert alert-danger hidden" id="mensajeZona">...</div>
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
                                                    <input type="tel" class="form-control" name="telefonofijo" maxlength="9" id="telefonofijo" onKeyPress="return solonumeros(event)" placeholder="99889988" autofocus></div>
                                                </div>
                                                <div class="row">    
                                                    <div class="col-xs-12"><label>Celular</label>
                                                        <div class="row">
                                                    <div class="col-xs-4 col-md-1"><input type="tel" class="form-control" placeholder="+569" readonly></div>
                                                    <div class="col-xs-8 col-md-11"><input type="tel" class="form-control" name="celular" maxlength="8" id="celular" onKeyPress="return solonumeros(event)" placeholder="99889988" autofocus></div>
                                                </div></div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12"><label class="checkbox">
                                                    <input type="checkbox" name="checkregistro" id="checkregistro" value="Terminos" required> Acepto los terminos y condiciones! <b>*</b>
                                                    </label></div>
                                                </div>
                                                <div class="row">
                                                    <button class="btn btn-lg btn-warning btn-block" name="btnRegistro"  id="btnRegistro" type="button">Registrarme!</button>
                                                    <div class="alert alert-danger hidden" id="mensajeBtnRegistro">Debe llenar todos los campos obligatorios...</div>
                                                </div>
                                                <!--<button type="submit" class="btn btn-primary btn-lg btn-block">Registrarme</button>-->
                                            </form>
                                        </article>
                                    </div>
                                </div>
                            </section>  
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    
    <div class="modal fade" id="zonas">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Zonas de Rancagua</h4>
                </div>
                <div class="modal-body">
                    <div class="well"><img src="../img/zonas.png" class="img-responsive center-block" alt="Zonas de Rancagua"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    
                </div>
            </div>
        </div>
    </div>

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
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/registro.js"></script>
    <script type="text/javascript" src="../js/jquery.rut.js"></script>
    <script type="text/javascript">
	$(function(){
    $("#rut").rut({formatOn: 'keyup', validateOn: 'keyup'}).on('rutInvalido', function(){ $(this).parents(".control-group").addClass("has-error")}).on('rutValido', function(){ $(this).parents(".control-group").removeClass("has-error")});
	});
    </script>
</body>
</html>