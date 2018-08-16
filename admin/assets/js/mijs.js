
$(document).ready(function () {
	cargar();
		
	$(".modificar").click(function(){
		$("#mensajeBtnRegistro").attr("class","alert alert-info text-center hidden");
		var id= $(this).val();
		
		$("#idUsuario").text(id);
		if (id != "") {
			$('#modal-id').modal('show');
			traerDatos(id);
		}
		
	});
	$(".eliminar").click(function(){
		$("#mensajeBtnEliminar").attr("class","alert alert-info text-center hidden");
		var id= $(this).val();
		
		$("#idUsuarioEliminar").text(id);
		if (id != "") {
			$('#modal-eliminar').modal('show');
			traerDatosEliminar(id);
		}
		
	});

	$("#modificarDatos").click(modificarDatos);
	$("#eliminarUsuario").click(eliminarUsuario);
});

function modificar(id){
	$("#mensajeBtnRegistro").attr("class","alert alert-info text-center hidden");
		
		
		$("#idUsuario").text(id);
		if (id != "") {
			$('#modal-id').modal('show');
			traerDatos(id);
		}
}
function eliminar(id){
	$("#mensajeBtnEliminar").attr("class","alert alert-info text-center hidden");
		
		
		$("#idUsuarioEliminar").text(id);
		if (id != "") {
			$('#modal-eliminar').modal('show');
			traerDatosEliminar(id);
		}
}

function cargar(){
	$.post('../php/intermediario.php',{cargarusu:"1"},
            function(data){
            	
               $("#tbodyListarClientes").html(data); 
               //$(".modal-body").add("<input type='text' value='"+idSetDatos+"'>");
            });
}


function traerDatos(valor){

	var idSetDatos=valor;

	$.post('../php/intermediario.php',{idSetDatos:idSetDatos},
            function(data){
               $(".modal-body").html(data); 
               //$(".modal-body").add("<input type='text' value='"+idSetDatos+"'>");
            });
}
function traerDatosEliminar(valor){
	
	var idSetDatosEliminar=valor;

	$.post('../php/intermediario.php',{idSetDatosEliminar:idSetDatosEliminar},
            function(data){
               $(".modal-body").html(data); 
               
            });
}


//funcion que valida los datos antes de mandarlos a la base de datos actualizados
function modificarDatos(){
	var modBtn="1";
	var id = $("#idUsuario").text();
	var email = $("#email").val();
	var pass = $("#password").val();
	var repass = $("#repassword").val();
	var nombre = $("#nombre").val();
	var apellido =$("#apellidos").val();	
	var direccion = $("#direccion").val();
	var numero = $("#numero").val();
	var rut = $("#rut").val();
	var departamento = $("#departamento").val();
	var telfijo = $("#telefonofijo").val();
	var celular = $("#celular").val();
	var check=$("input:checkbox[name='checkregistro']:checked").val();
	
	
	$("#contregpopup").text("Cargando...");
if(pass == repass){
		//las contraseñas deben ser iguales
		if(pass!=repass) {  
		$("#mensajepass").text("Las contraseñas deben tener como mínimo 6 caracteres...");
		$("#mensajepass").attr("class","alert alert-danger text-center");
        
    	}else{
			$("#mensajepass").attr("class","alert alert-danger hidden");
			if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {
               	$("#mensajeemail").attr("class","alert alert-danger text-center");
        	}else{
				if(email!='' && nombre!='' && email!='' && apellido!='' && direccion!='' && numero!='' && rut!=''){
					//no deben hacer campos vacios
					if (check) {
						toastr.info("Procesando Registro...");
						//$("#mensajeBtnRegistro").text("Procesando registro");
				//$("#mensajeBtnRegistro").attr("class","alert alert-info text-center");
$.post('../php/intermediario.php',{modBtn:modBtn,id:id,email:email,pass:pass,nombre:nombre,apellido:apellido,direccion:direccion,numero:numero,rut:rut,departamento:departamento,telfijo:telfijo,celular:celular},
			function(data){
				//$("#mensajeBtnRegistro").text(data);
				toastr.success(data+"...");
				$("#modal-id").modal("hide");
				cargar();
				//$("#mensajeBtnRegistro").attr("class","alert alert-info text-center");
				//listarClientes();

				if(data == "Se ha registrado correctamente..."){
				
				}
			});

					}else{
						//$("#mensajeBtnRegistro").text("Debe aceptar los terminos y condiciones para completar el registro");
						//$("#mensajeBtnRegistro").attr("class","alert alert-info text-center");
						toastr.warning("Debe aceptar los terminos y condiciones para completar el registro");
					};
					
		
				}else{
		toastr.info("Debe llenar todos los campos obligatorios...");
		//$("#mensajeBtnRegistro").text("Debe llenar todos los campos obligatorios...");
		// $("#mensajeBtnRegistro").attr("class","alert alert-danger text-center");
				}
			}
	}
}else{
		toastr.error("Las contraseñas no coinciden...","ERROR");
		//$("#mensajepass").text("Las contraseñas no coinciden");
		//$("#mensajepass").attr("class","alert alert-danger text-center");
		
}

	}//cierre registro
//funcion que valida y avisa si esta mal escrito el email
function emailfocus(){
	
	if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {
    	      $("#mensajeemail").attr("class","alert alert-danger text-center");  
	}else{
			$("#mensajeemail").attr("class","alert alert-danger hidden"); 
	}
	
}
//funcion que valida que solo se puedan ingresar numeros
function solonumeros(e){
		var key=window.Event ? e.which : e.keyCode
		return(key >=48 && key <=57)
	}
//funcion que valida que solo se puedan ingresar letras
function sololetras(e){
		var key=window.Event ? e.which : e.keyCode
		return((key >=65 && key <=90 || key==32 || key==241) || (key >=97 && key <=122 || key==32 || key==209))
	}
//funcion que valida que solo se puedan ingresar numeros y la letra k
function solonumerosyk(e){
		var key=window.Event ? e.which : e.keyCode
		return(key >=48 && key <=57 || key==107)
}

function eliminarUsuario () {
	var eliBtn="1";
	var id = $("#idUsuarioEliminar").text();
	var idUsuario=$("#confirmUsuario").val();
	$.post('../php/intermediario.php',{eliBtn:eliBtn,id:id,idUsuario:idUsuario},
			function(data){
				
				if(data == "ok"){
					toastr.success("Se a eliminado correctamente el usuario...");
					$("#modal-eliminar").modal("hide");
					cargar();
				//$("#mensajeBtnEliminar").text("Se a eliminado correctamente el idUsuario");
				//$("#mensajeBtnEliminar").attr("class","alert alert-info text-center");
				}
			});
}

function listarClientes(){
	var subListarClientes="1";
	$.post('../php/intermediario.php',{subListarClientes:subListarClientes},
			function(data){
				$("#tbodyListarClientes").html(data);							
				
			});

	//listarVendedores();
}
function listarVendedores(){
	var subListarVendedores="1";
	$.post('../php/intermediario.php',{subListarVendedores:subListarVendedores},
			function(data){
				$("#tbodyListarVendedores").html(data);							
				
			});
	listarAdmin();
}
function listarAdmin(){
	var subListarAdmin="1";
	$.post('../php/intermediario.php',{subListarAdmin:subListarAdmin},
			function(data){
				$("#tbodyListarAdmin").html(data);							
				
			});
	
}


