$(document).ready(function () {
	inicio();
	$("#btnGuardaCambios").click(guardarCambios);
});

function inicio(){

var id=$("#idUsuario").val();
//console.log("id: "+id);
	$.post('php/misDirecciones/intermediario.php',{dir:"1",id:id},
		function(data){
			$("#contDirecciones").html(data);

	});
}

function modificar(id){

	
	$.post('php/misDirecciones/intermediario.php',{traerDireccion:"1",id:id},
		function(data){
			$("#bodyModificar").html(data);
			$("#modal-modificar").modal("show");
	});

}

function guardarCambios() {
var estado=$("#cboEstado").val();
var zona= $("#cboZona").val();
var id=$("#idHidden").val();
	$.post('php/misDirecciones/intermediario.php',{modificar:"1",estado:estado,zona:zona,id:id},
		function(data){
			$("#modal-modificar").modal("hide");
			alert("Se modifico la dirección");
			inicio();
	});

console.log("estado: "+estado+" zona: "+zona+" id: "+id);
}