$(document).ready(function () {
	
	cargar();
	$("#btnActualizar").click(ActualizarDatos);

});

function cargar() {
	var cargar="1";

	$.post('php/Productos/intermediario.php',{cargar:cargar},
		function(data){
			//console.log(data);
			$("#cargarProductos").html(data);
			
		}); 
}

function modificar(id){
	//modal-body
	var mod="1";

	$.post('php/Productos/intermediario.php',{mod:mod,id:id},
		function(data){
			$(".modal-body").html(data);
			
		});
	console.log("id: "+id);
	$('#modal-modificar').modal('show');
}



function ActualizarDatos () {
	
	var id=$("#txtId").val();
	var pre=$("#txtPre").val();
	var precio=$("#txtPrecio").val();
	var stock=$("#txtStock").val();
	var stockMin=$("#txtStock_min").val();
	var act="1";


	
	console.log("id: "+id+" pre: "+pre+" precio:"+precio+" stock:"+stock+" stockMin:"+stockMin);
	$.post('php/Productos/intermediario.php',{act:act,id:id,precio:precio,stock:stock,stockMin:stockMin},
		function(data){
			console.log(data);
			$('#modal-modificar').modal('hide');
			toastr.success("Se actualizo correctamente...");
			cargar();
	});

	if (precio<=pre) {
		toastr.warning("El precio introducido es menor al anterior...");
	}


	

}











