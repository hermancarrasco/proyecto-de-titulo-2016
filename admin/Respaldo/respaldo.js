$(document).ready(function (){
    /*** CARGA DE DATOS CUANDO CARGE LA PAGINA ***/
    confActualRespAuto();


    
 
  



    /*** OCULTAR MENSAJES AL CARGAR LA PAGINA ***/
    $("#mensajeRespaldoManual").hide();
    $("#mensajeRestauracionManual").hide();
    $("#autoDia").hide();

    /*** CARGAR INFORMACION AL HACER CLICK ***/
    $("#btnGenerarRespaldoManual").click(respaldoManual);
    $("#btnConfigurarAuto").click(configurarAuto);
    $(".btnreg").click(function () {
        var archivoRestaurar= $(this).val();        
        restaurar(archivoRestaurar);
    });
    $("#rbSemanal").click(function(){
        $("#autoDia").show("slow");
    });
    $("#rbDiario").click(function(){
        $("#autoDia").hide("slow");
    });
});

function restaurar (argument) {
  toastr.info("Procesando Restauración");
	var btnRestaurar="1";
	var archivo=argument;
  var idUsuario=$("#confirmUsuario").val();
	$.post('confirmar.php',{btnRestaurar:btnRestaurar,archivo:archivo,idUsuario:idUsuario},
        function(data){    
          if (data=="RESTAURACION EXITOSA DE LA BASE DE DATOS") {
            toastr.success(data+"...");
          }else{
            toastr.info(data+"...");
          }
           //$("#mensajeRestauracionManual").text(data);
           //$("#mensajeRestauracionManual").show();
          $('body, html').animate({
          scrollTop: '0px'
            }, 300);
            $(window).scroll(function(){
    if( $(this).scrollTop() > 0 ){
      $('.ir-arriba').slideDown(300);
    } else {
      $('.ir-arriba').slideUp(300);
    }
  });
           //$("#mensajeRestauracionManual").fadeOut(6000);
       });	
}

function respaldoManual (){
	var respaldoManual="1";
  var idUsuario=$("#confirmUsuario").val();
	$.post('confirmar.php',{respaldoManual:respaldoManual,idUsuario:idUsuario},
        function(data){
          if (data=="Error en la seleccion de la BD") {
            toastr.error(data+"...","ERROR");    
          } else {
            toastr.success(data+"...");
          }
          /* $("#mensajeRespaldoManual").text(data);
           $("#mensajeRespaldoManual").show();
           $("#mensajeRespaldoManual").fadeOut(5000);
           */
           
       });	
}

function confActualRespAuto(){
    var cargaConfActualRespAuto="1";
    $.post('confirmar.php',{cargaConfActualRespAuto:cargaConfActualRespAuto},
        function(data){
            $("#cargaConfActualRespAuto").html(data);
           
       });  
}
function configurarAuto () {
    var btnConfAuto="1";
    var frecuencia=$("input:radio[name='options']:checked").val();
    var dia=$("#autoDiaSelect").val();
    var hora=$("#autoHoraSelect").val();
    var idUsuario=$("#confirmUsuario").val();
    if (frecuencia=="DIARIO") {
        dia="0";
    };
    $.post('confirmar.php',{btnConfAuto:btnConfAuto,frecuencia:frecuencia,dia:dia,hora:hora,idUsuario:idUsuario},
        function(data){
            console.log(data);
            if (data=="Error en la seleccion de la BD") {
              toastr.error(data+"...","ERROR");
            }else{
              toastr.success(data+"...");  
            }
            
          /*  $("#mensajeRespaldoManual").text(data);
           $("#mensajeRespaldoManual").show();
           $("#mensajeRespaldoManual").fadeOut(5000);*/
            confActualRespAuto();
       }); 
    
    
}