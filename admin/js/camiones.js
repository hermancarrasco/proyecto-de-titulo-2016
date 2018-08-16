$(document).ready(function () {
		cargar();
		$("#btnActualizar").click(ActualizarDatos);
		$("#btnModalRegistrar").click(function(){
			$("#modal-ingresar").modal("show");
		});
		$("#btnRegistrar").click(registrar);
		$("#cbQuitarCond").click(function(){
			$("#cboConductores").add("disabled");
		});

		
});

function cargar () {
	var cargar="1";
	$.post('php/Camiones/intermediario.php',{cargar:cargar},
		function(data){
			$("#contCamiones").html(data);
			
		}); 
}

function modificar(id){

	//modal-body
	var mod="1";

	$.post('php/Camiones/intermediario.php',{mod:mod,id:id},
		function(data){
			$("#bodyModificar").html(data);
			
		});
	console.log("id: "+id);
	$('#modal-modificar').modal('show');


}

function ActualizarDatos () {
	var act="1";
	var id=$("#txtId").val();	
	var marca=$("#txtMarca").val();
	var modelo=$("#txtModelo").val();
	var patente=$("#txtPatente").val();
	var revision=$("#txtRevision").val();
	var conductor= $("#cboConductores").val();

	
	console.log("id: "+id);
	$.post('php/Camiones/intermediario.php',{act:act,id:id,marca:marca,modelo:modelo,patente:patente,revision:revision,conductor:conductor},
		function(data){
			console.log(data);
			if (data=="Camion OcupadoSe Modifico") {
				toastr.error("Conductor ya Asignado...","ERROR");
			}else{
				toastr.success("Datos Modificados...");
			}
			
			cargar();
			$('#modal-modificar').modal('hide');
		});

	if (conductor==1) {
		alert("El camion no tiene conductor");
	}
}

function registrar() {
	var reg="1";
	var marca=$("#regMarca").val();
	var modelo=$("#regModelo").val();
	var patente=$("#regPatente").val();
	var revision=$("#regRevision").val();

	$.post('php/Camiones/intermediario.php',{reg:reg,marca:marca,modelo:modelo,patente:patente,revision:revision},
		function(data){
			console.log(data);
			
			cargar();
			$('#modal-ingresar').modal('hide');
			//alert("Se registro el nuevo camion");
			toastr.success("Se registro el nuevo camion...");
		});
}
