$(document).ready(function () {
		cargar();
		$("#btnAsignarZona").click(ActualizarDatos);
		
});

function cargar () {
	var cargar="1";
	$.post('php/GestionarVendedor/intermediario.php',{cargar:cargar},
		function(data){
			$("#contVendedores").html(data);
			
		}); 
}

function modificar(id){

	//modal-body
	var mod="1";

	$.post('php/GestionarVendedor/intermediario.php',{mod:mod,id:id},
		function(data){
			$(".modal-body").html(data);
			
		});
	console.log("id: "+id);
	$('#modal-modificar').modal('show');


}

function ActualizarDatos () {
	var zona= $("#cboZonas").val();
	var id=$("#txtId").val();
	var act="1";
;
	if (zona!= 0) {

	console.log("Zona asignada: "+zona);
	console.log("id: "+id);
	$.post('php/GestionarVendedor/intermediario.php',{act:act,id:id,zona:zona},
		function(data){
			console.log(data);
			$('#modal-modificar').modal('hide');
			toastr.success("Se actualizo correctamente...");
			cargar();
		});

	}else{
		alert("Debe seleccionar una zona");
	};

}

















