<?php
require_once("clase.php");
        $c= new BaseDeDatos();
        $c->conectarBD();
        
        $c->controlarSesion();
        if(isset($_REQUEST["cerrar"])){
            $c->cerrarSesion();
            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Solicite | GLPEXPRESS</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    
</head>
<body id="solicita-gas">

	

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
              <a class="navbar-brand" href="index.html">GLP EXPRESS</a>
            </div>
            <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="index.html">Acerca de</a></li>
                <li><a href="index.html">Solicite Pedido</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>
    </header>

    <section id="usuLogueado" class="container">
        <div class="row">
            <div class="col-xs-12">
                <p><small>Bienvenido Usuario: <i>Lipigas</i></small></p>
            </div>
        </div>     
    </section>

    <section id="formulario-solicita" class="jumbotron container-fluid">
        <article class="row registro-lipigas">
            <div class="col-xs-12 text-center ">
                <h2>Solicite Su Pedido</h2>
                <div class="col-xs-12 head-registro">
                     <h2 class="form-signin-heading">Porfavor Complete todos los campos</h2>
                </div>         
                <div class="container-fluid contenedor-gas">
                    <div class="row">
                        <div class="col-xs-6 col-md-6 text-right">
                            <img src="img/5kg.jpg" alt="5kg" width="100">                        
                        </div>
                        <div class="col-xs-6 col-md-6 text-left radio-gas">
                            <input type="radio" name="gas" value="5kg">Balon de 5 KG.
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-6 col-md-6 text-right">
                            <img src="img/15kg.jpg" alt="15kg" width="100">                        
                        </div>
                        <div class="col-xs-6 col-md-6 text-left radio-gas">
                            <input type="radio" name="gas" value="15kg">Balon de 15 KG.
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-6 col-md-6 text-right">
                            <img src="img/45kg.jpg" alt="45kg" width="100">                        
                        </div>
                        <div class="col-xs-6 col-md-6 text-left radio-gas">
                            <input type="radio" name="gas" value="45kg">Balon de 45 KG.
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <input type="checkbox" name="terminos">Acepto enviar mi Localizacion
                        </div>
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <button class="btn btn-lg btn-warning btn-block" type="submit">Solicitar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
        </article>
        

    </section>
<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    
</body>
</html>