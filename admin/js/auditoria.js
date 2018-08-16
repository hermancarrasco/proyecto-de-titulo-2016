
$(document).ready(function () {
	listarSesiones();
	mostrarIngresos();
	mostrarModificaciones();
	mostrarEliminaciones();
	
});

function listarSesiones(){
	listarSesiones="1";
	$.post('php/intermediario.php',{listarSesiones:listarSesiones},
		function(data){
			$("#conntListadoSesiones").html(data);
		}); 
}

function mostrarDetalle (argument) {
	  $("#dataModalUltimaSesion").html("Cargando...");
	DetalleUltimaSesion=argument;
	$.post('php/intermediario.php',{DetalleUltimaSesion:DetalleUltimaSesion},
            function(data){
              $("#dataModalUltimaSesion").html(data);
              $("#modal-id").modal("show");
               
            });
}
function mostrarIngresos(){
	var mostrarIngresos="1";
	$.post('php/Auditoria/intermediario.php',{mostrarIngresos:mostrarIngresos},
            function(data){
              $("#tabIngresos").html(data);
               
            });
}
function mostrarModificaciones(){
var mostrarModificaciones="1";
	$.post('php/Auditoria/intermediario.php',{mostrarModificaciones:mostrarModificaciones},
            function(data){
              $("#tabModificaciones").html(data);
               
            });
}
function mostrarEliminaciones(){
var mostrarEliminaciones="1";
	$.post('php/Auditoria/intermediario.php',{mostrarEliminaciones:mostrarEliminaciones},
            function(data){
              $("#tabEliminaciones").html(data);
               
            });
}