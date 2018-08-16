$(document).ready(function () {
	
	var email = $("#email");
	var pass = $("#password");
	var repass = $("#repassword");
	var nombre = $("#nombre");
	var apellido =$("#apellidos");	
	var direccion = $("#direccion");
	var numero = $("#numero");
	var rut = $("#rut");
	var departamento = $("#departamento");
	var telfijo = $("#telefonofijo");
	var celular = $("#celular");
	
	
	$("#btnRegistro").click(registrar);
	$("#email").change(emailfocus);

});
//funcion que valida los datos antes de mandarlos a la base de datos
function registrar(){
	var regbtn="1";
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
	var zona=$("#cboZona").val();
		

		if (zona==0) {
			$("#mensajeZona").text("Debe seleccionar una Zona");
		$("#mensajeZona").attr("class","alert alert-danger text-center");
		$("#mensajeZona").show();
		$("#mensajeZona").hide(10000);
		};

	$("#contregpopup").text("Cargando...");
if(pass == repass){
		//las contraseñas deben ser iguales
		if(pass.length < 7 || repass.length < 7) {  
		$("#mensajepass").text("Las contraseñas deben tener como mínimo 7 caracteres...");
		$("#mensajepass").attr("class","alert alert-danger text-center");

        
    	}else{
			$("#mensajepass").attr("class","alert alert-danger hidden");
			if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {
            //alert('El correo electrónico introducido no es correcto.');
            	$("#mensajeemail").attr("class","alert alert-danger text-center");
        	}else{
				if(email!='' && pass!='' && nombre!='' && repass!='' && email!='' && apellido!=''&& zona!=0 && direccion!='' && numero!='' && rut!=''){
					//no deben hacer campos vacios
					if (check) {
						$("#mensajeBtnRegistro").text("Procesando registro");
				$("#mensajeBtnRegistro").attr("class","alert alert-info text-center");
$.post('../php/intermediario.php',{regbtn:regbtn,email:email,pass:pass,nombre:nombre,apellido:apellido,direccion:direccion,numero:numero,rut:rut,departamento:departamento,telfijo:telfijo,celular:celular,zona:zona},
			function(data){
				$("#mensajeBtnRegistro").text(data);
				$("#mensajeBtnRegistro").attr("class","alert alert-info text-center");
				
				if(data == "Se ha registrado correctamente..."){
				
				}
			});

					}else{
						$("#mensajeBtnRegistro").text("Debe aceptar los terminos y condiciones para completar el registro");
						$("#mensajeBtnRegistro").attr("class","alert alert-info text-center");
					};
					
		
				}else{
		
		$("#mensajeBtnRegistro").text("Debe llenar todos los campos obligatorios...");
		 $("#mensajeBtnRegistro").attr("class","alert alert-danger text-center");
				}
			}
	}
}else{
		$("#mensajepass").text("Las contraseñas no coinciden");
		$("#mensajepass").attr("class","alert alert-danger text-center");
		
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