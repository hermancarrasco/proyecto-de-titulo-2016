<?php
require_once("../php/clase.php");
$c= new BaseDeDatos();
$c->conectarBD();

$c->controlarSesion();
if(isset($_REQUEST["cerrar"])){
    $c->cerrarSesion();
}
@session_start(); 
if ($_SESSION["tipoUsuario"] != "cliente") {

  header("location: ../index.php?msg=".md5(4)."");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Solicite | GLPEXPRESS</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    
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
            <!-- <a class="navbar-brand" href="../index.php?usr=cliente">GLP EXPRESS</a>-->
            <a class="navbar-brand" href="../index.php">GLP EXPRESS</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="misPedidos.php">Mis Pedidos</a></li>
            <li class="active"><a href="#">Mis Direcciones</a></li>
            
        </ul>
        <ul class="nav navbar-nav pull-right" >
            <li><a href="index.php?cerrar='<?php echo md5("ok")?>'">Cerrar Sesion</a></li>
        </ul>
    </div><!--/.nav-collapse -->
</div>
</div>
</header>

<section id="usuLogueado" class="container">
    <div class="row">
        <div class="col-xs-12">
            <p>Bienvenido Usuario: <i><?php echo $_SESSION["display_name"] ?></i></p>
            <p>Ultimo Inicio: <i>
                <?php 
                if(isset($_SESSION["inicioAnterior"]) != "")
                {
                    echo $_SESSION["inicioAnterior"];
                }else{
                    echo "Primer Inicio";
                }

                ?>
            </i></p>

        </div>
    </div>     
</section>

<section id="formulario-solicita" class="jumbotron container-fluid">
    <article class="row registro-lipigas">
        <div class="col-xs-12">
           
            <div class="col-xs-12 head-registro">
               <h2 class="form-signin-heading">Mis Direcciones Registradas</h2>
           </div>         
           <div class="container-fluid contenedor-gas">



            <div class="row" id="contDirecciones">
                                
                

                
                


        </div>                

    </div>
</div>

</article>


</section>
<input type="hidden" id="idUsuario" class="form-control" value="<?php echo $_SESSION["idUsuario"] ?>">


<div class="modal fade" id="modal-modificar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modificar Dirección</h4>
            </div>
            <div class="modal-body" id="bodyModificar">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnGuardaCambios">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/misDirecciones.js"></script>



    
</body>
</html>