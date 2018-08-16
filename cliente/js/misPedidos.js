$(document).ready(function () {
	inicio();
	$("#btnCancelarPedido").click(cancelarPedidos);
});

function inicio(){

var id=$("#idUsuario").val();
//console.log("id: "+id);
	$.post('php/misPedidos/intermediario.php',{dir:"1",id:id},
		function(data){
			$("#contPedidos").html(data);

	});
}

function modificar(id){

	
	$("#idVenta").val(id);
$("#modal-modificar").modal("show");
}

function cancelarPedidos() {

var id=$("#idVenta").val();
	$.post('php/misPedidos/intermediario.php',{modificar:"1",id:id},
		function(data){
			$("#modal-modificar").modal("hide");
			alert("Se cancelo el pedido...");
			inicio();
	});

console.log("estado: "+estado+" zona: "+zona+" id: "+id);
}