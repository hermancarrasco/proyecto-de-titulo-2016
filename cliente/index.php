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
            <li class="active"><a href="#">Home</a></li>
            <li><a href="misPedidos.php">Mis Pedidos</a></li>
            <li><a href="mis_direcciones.php">Mis Direcciones</a></li>
            
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
        <div class="col-xs-12 text-center ">
            <h2>Solicite Su Pedido</h2>
            <div class="col-xs-12 head-registro">
               <h2 class="form-signin-heading">Selecciona el gas que deseas</h2>
           </div>         
           <div class="container-fluid contenedor-gas">



            <div class="row">
                <a class="btn btn-warning" id="modal5kg" data-toggle="modal" href='#5kg'><img src="../img/5kg.png" class="img-thumbnail img-responsive" alt="5kg"></a>
                <a class="btn btn-warning" id="modal11kg" data-toggle="modal" href='#11kg'><img src="../img/11kg.png" class="img-thumbnail img-responsive" alt="11kg"></a>
                <a class="btn btn-warning" id="modal15kg" data-toggle="modal" href='#15kg'><img src="../img/15kg.png" class="img-thumbnail img-responsive" alt="15kg"></a>
                <a class="btn btn-warning" id="modal45kg" data-toggle="modal" href='#45kg'><img src="../img/45kg.png" class="img-thumbnail img-responsive" alt="45kg"></a>
                
                <div class="modal fade" id="5kg">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Cilindro de 5KG</h4>
                            </div>
                            <div class="modal-body" id="modal-body5k">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" id="cerrar5" data-dismiss="modal">Cerrar</button>

                            </div>
                        </div>
                    </div>
                </div><!--cirre modal 5kg-->

                <div class="modal fade" id="11kg">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Cilindro de 11KG</h4>
                            </div>
                            <div class="modal-body" id="modal-body11k">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" id="cerrar11" data-dismiss="modal">Cerrar</button>

                            </div>
                        </div>
                    </div>
                </div><!--cirre modal 11kg-->

                <div class="modal fade" id="15kg">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Cilindro de 15KG</h4>
                            </div>
                            <div class="modal-body" id="modal-body15k">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" id="cerrar15" data-dismiss="modal">Cerrar</button>
                                
                            </div>
                        </div>
                    </div>
                </div><!--cirre modal 15kg-->

                <div class="modal fade" id="45kg">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Cilindro de 45KG</h4>
                            </div>
                            <div class="modal-body" id="modal-body45k">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" id="cerrar45" data-dismiss="modal">Cerrar</button>
                                <!-- <button type="button" class="btn btn-warning" data-loading-text="Procesando Pedido" id="hacerPedido45" onclick="probando(<?php echo $_SESSION["idUsuario"] ?>,4)">Hacer pedido</button>-->
                                
                            </div>
                        </div>
                    </div>
                </div><!--cierre modal 45kg-->

                
                <div class="modal fade" id="modalConfirmar">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Confirmación del Pedido</h4>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger">

                                    <form action="php/pdf.php" method="POST" role="form" target="_blank">
                                 <input type="hidden" name="dir" id="confirmDireccion" value="">
                                 <input type="hidden" name="tipo" id="confirmTipo" value="">
                                 <input type="hidden" name="zona" id="confirmZona" value="">
                                 <input type="hidden" name="id" id="confirmUsuario" value="<?php echo $_SESSION["idUsuario"] ?>">
                                 <h1>¿confirma el pedido?</h1>
                             </div>
                             <div class="well" class="text-left">
                                <p class="text-left" id="confirmCilindroDe">Cilindro de:</p>
                                <p class="text-left" id="confirmDireccionDe">Dirección:</p>
                                <p class="text-left" id="confirmZonaDe">Zona:</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-default"  data-dismiss="modal">Volver</a>
                            
                            <button type="submit" name="btnConfirmarPerdido" id="btnConfirmarPerdido" class="btn btn-primary">Confirmar</button>
                            </form>
                           <!-- <a href="php/pdf.php?id=<?php echo $_SESSION["idUsuario"] ?>" target="_blank" type="button" class="btn btn-default">Comprobante</a>-->
                        </div>
                    </div>
                </div>
            </div>


        </div>                

    </div>
</div>

</article>


</section>
<input type="hidden" id="idUsuario" class="form-control" value="<?php echo $_SESSION["idUsuario"] ?>">



<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/solicita.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v3"></script>
<script>
function validar5(e) {
  tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){
        buscarGeo(5);
    }
}
function validar11(e) {
  tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){
        buscarGeo(11);
    }
}
function validar15(e) {
  tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){
        buscarGeo(15);
    }
}
function validar45(e) {
  tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){
        buscarGeo(45);
    }
}
</script>

    
</body>
</html>