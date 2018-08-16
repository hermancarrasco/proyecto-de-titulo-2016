$(document).ready(function () {
	
	/*var email = $("#email");
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
	*/
	
	$("#btnRegistro").click(registrar);
	$("#btnRegistroven").click(registrarven);
	$("#btnRegistroadm").click(registraradm);

	$("#email").change(emailfocus);
	$("#emailven").change(emailfocusven);
	$("#emailadm").change(emailfocusadm);


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
	var idUsuario=$("#confirmUsuario").val();
	
	$("#contregpopup").text("Cargando...");
	if(pass == repass){
		//las contraseñas deben ser iguales
		if(pass.length < 6 || repass.length < 6) {  
			$("#mensajepass").text("Las contraseñas deben tener como mínimo 6 caracteres...");
			$("#mensajepass").attr("class","alert alert-danger text-center");
			$('#agregarUsuarioModal').animate({
				scrollTop: '0px'
			}, 300);
			$(window).scroll(function(){
				if( $(this).scrollTop() > 0 ){
					$('.ir-arriba').slideDown(300);
				} else {
					$('.ir-arriba').slideUp(300);
				}
			});
		}else{
			$("#mensajepass").attr("class","alert alert-danger hidden");
			if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {
            //alert('El correo electrónico introducido no es correcto.');
            $("#mensajeemail").attr("class","alert alert-danger text-center");
        }else{
        	if(email!='' && pass!='' && nombre!='' && repass!='' && email!='' && apellido!='' && direccion!='' && numero!='' && rut!=''){
					//no deben hacer campos vacios
					if (check) {
						$("#mensajeBtnRegistro").text("Procesando registro");
						$("#mensajeBtnRegistro").attr("class","alert alert-info text-center");
						$.post('php/AgregarUsuario/intermediario.php',{regbtn:regbtn,email:email,pass:pass,nombre:nombre,apellido:apellido,direccion:direccion,numero:numero,rut:rut,departamento:departamento,telfijo:telfijo,celular:celular,idUsuario:idUsuario},
							function(data){
								$("#mensajeBtnRegistro").text(data);
								$("#mensajeBtnRegistro").attr("class","alert alert-info text-center");
								$('#agregarUsuarioModal').animate({
									scrollTop: '500px'
								}, 300);
								$(window).scroll(function(){
									if( $(this).scrollTop() > 0 ){
										$('.ir-arriba').slideDown(300);
									} else {
										$('.ir-arriba').slideUp(300);
									}
								});
								if(data == "Se ha registrado correctamente..."){

								}
							});

					}else{
						$("#mensajeBtnRegistro").text("Debe aceptar los terminos y condiciones para completar el registro");
						$("#mensajeBtnRegistro").attr("class","alert alert-info text-center");
						$('#agregarUsuarioModal').animate({
							scrollTop: '500px'
						}, 300);
						$(window).scroll(function(){
							if( $(this).scrollTop() > 0 ){
								$('.ir-arriba').slideDown(300);
							} else {
								$('.ir-arriba').slideUp(300);
							}
						});
					};
					

				}else{

					$("#mensajeBtnRegistro").text("Debe llenar todos los campos obligatorios...");
					$("#mensajeBtnRegistro").attr("class","alert alert-danger text-center");
					$('#agregarUsuarioModal').animate({
						scrollTop: '500px'
					}, 300);
					$(window).scroll(function(){
						if( $(this).scrollTop() > 0 ){
							$('.ir-arriba').slideDown(300);
						} else {
							$('.ir-arriba').slideUp(300);
						}
					});
				}
			}
		}
	}else{
		$("#mensajepass").text("Las contraseñas no coinciden");
		$("#mensajepass").attr("class","alert alert-danger text-center");
		$('#agregarUsuarioModal').animate({
			scrollTop: '0px'
		}, 300);
		$(window).scroll(function(){
			if( $(this).scrollTop() > 0 ){
				$('.ir-arriba').slideDown(300);
			} else {
				$('.ir-arriba').slideUp(300);
			}
		});
	}

	}//cierre registro usuario

	function registrarven(){
		var regbtnven="1";
		var email = $("#emailven").val();
		var pass = $("#passwordven").val();
		var repass = $("#repasswordven").val();
		var nombre = $("#nombreven").val();
		var apellido =$("#apellidosven").val();	
		var direccion = $("#direccionven").val();
		var numero = $("#numeroven").val();
		var rut = $("#rutven").val();
		var departamento = $("#departamentoven").val();
		var telfijo = $("#telefonofijoven").val();
		var celular = $("#celularven").val();
		var check=$("input:checkbox[name='checkregistroven']:checked").val();
		var idUsuario=$("#confirmUsuario").val();

		$("#contregpopup").text("Cargando...");
		if(pass == repass){
		//las contraseñas deben ser iguales
		if(pass.length < 6 || repass.length < 6) {  
			$("#mensajepassven").text("Las contraseñas deben tener como mínimo 6 caracteres...");
			$("#mensajepassven").attr("class","alert alert-danger text-center");
			$('#agregarVendedorModal').animate({
				scrollTop: '0px'
			}, 300);
			$(window).scroll(function(){
				if( $(this).scrollTop() > 0 ){
					$('.ir-arriba').slideDown(300);
				} else {
					$('.ir-arriba').slideUp(300);
				}
			});
		}else{
			$("#mensajepassven").attr("class","alert alert-danger hidden");
			if($("#emailven").val().indexOf('@', 0) == -1 || $("#emailven").val().indexOf('.', 0) == -1) {
            //alert('El correo electrónico introducido no es correcto.');
            $("#mensajeemailven").attr("class","alert alert-danger text-center");
        }else{
        	if(email!='' && pass!='' && nombre!='' && repass!='' && email!='' && apellido!='' && direccion!='' && numero!='' && rut!=''){
					//no deben hacer campos vacios
					if (check) {
						$("#mensajeBtnRegistroven").text("Procesando registro");
						$("#mensajeBtnRegistroven").attr("class","alert alert-info text-center");
						$.post('php/AgregarUsuario/intermediario.php',{regbtnven:regbtnven,email:email,pass:pass,nombre:nombre,apellido:apellido,direccion:direccion,numero:numero,rut:rut,departamento:departamento,telfijo:telfijo,celular:celular,idUsuario:idUsuario},
							function(data){
								$("#mensajeBtnRegistroven").text(data);
								$("#mensajeBtnRegistroven").attr("class","alert alert-info text-center");
								$('#agregarVendedorModal').animate({
									scrollTop: '500px'
								}, 300);
								$(window).scroll(function(){
									if( $(this).scrollTop() > 0 ){
										$('.ir-arriba').slideDown(300);
									} else {
										$('.ir-arriba').slideUp(300);
									}
								});
								if(data == "Se ha registrado correctamente..."){

								}
							});

					}else{
						$("#mensajeBtnRegistroven").text("Debe aceptar los terminos y condiciones para completar el registro");
						$("#mensajeBtnRegistroven").attr("class","alert alert-info text-center");
						$('#agregarVendedorModal').animate({
							scrollTop: '500px'
						}, 300);
						$(window).scroll(function(){
							if( $(this).scrollTop() > 0 ){
								$('.ir-arriba').slideDown(300);
							} else {
								$('.ir-arriba').slideUp(300);
							}
						});
					};
					

				}else{

					$("#mensajeBtnRegistroven").text("Debe llenar todos los campos obligatorios...");
					$("#mensajeBtnRegistroven").attr("class","alert alert-danger text-center");
					$('#agregarVendedorModal').animate({
						scrollTop: '500px'
					}, 300);
					$(window).scroll(function(){
						if( $(this).scrollTop() > 0 ){
							$('.ir-arriba').slideDown(300);
						} else {
							$('.ir-arriba').slideUp(300);
						}
					});
				}
			}
		}
	}else{
		$("#mensajepassven").text("Las contraseñas no coinciden");
		$("#mensajepassven").attr("class","alert alert-danger text-center");
		$('#agregarVendedorModal').animate({
			scrollTop: '0px'
		}, 300);
		$(window).scroll(function(){
			if( $(this).scrollTop() > 0 ){
				$('.ir-arriba').slideDown(300);
			} else {
				$('.ir-arriba').slideUp(300);
			}
		});
	}

	}//cierre registro vendedor

	function registraradm(){
		var regbtnadm="1";
		var email = $("#emailadm").val();
		var pass = $("#passwordadm").val();
		var repass = $("#repasswordadm").val();
		var nombre = $("#nombreadm").val();
		var apellido =$("#apellidosadm").val();	
		var direccion = $("#direccionadm").val();
		var numero = $("#numeroadm").val();
		var rut = $("#rutadm").val();
		var departamento = $("#departamentoadm").val();
		var telfijo = $("#telefonofijoadm").val();
		var celular = $("#celularadm").val();
		var check=$("input:checkbox[name='checkregistroadm']:checked").val();
		var idUsuario=$("#confirmUsuario").val();

		$("#contregpopupadm").text("Cargando...");
		if(pass == repass){
		//las contraseñas deben ser iguales
		if(pass.length < 6 || repass.length < 6) {  
			$("#mensajepassadm").text("Las contraseñas deben tener como mínimo 6 caracteres...");
			$("#mensajepassadm").attr("class","alert alert-danger text-center");
			$('#agregarAdminModal').animate({
				scrollTop: '0px'
			}, 300);
			$(window).scroll(function(){
				if( $(this).scrollTop() > 0 ){
					$('.ir-arriba').slideDown(300);
				} else {
					$('.ir-arriba').slideUp(300);
				}
			});
		}else{
			$("#mensajepassadm").attr("class","alert alert-danger hidden");
			if($("#emailadm").val().indexOf('@', 0) == -1 || $("#emailadm").val().indexOf('.', 0) == -1) {
            //alert('El correo electrónico introducido no es correcto.');
            $("#mensajeemailadm").attr("class","alert alert-danger text-center");
        }else{
        	if(email!='' && pass!='' && nombre!='' && repass!='' && email!='' && apellido!='' && direccion!='' && numero!='' && rut!=''){
					//no deben hacer campos vacios
					if (check) {
						$("#mensajeBtnRegistroadm").text("Procesando registro");
						$("#mensajeBtnRegistroadm").attr("class","alert alert-info text-center");
						$.post('php/AgregarUsuario/intermediario.php',{regbtnadm:regbtnadm,email:email,pass:pass,nombre:nombre,apellido:apellido,direccion:direccion,numero:numero,rut:rut,departamento:departamento,telfijo:telfijo,celular:celular,idUsuario:idUsuario},
							function(data){
								$("#mensajeBtnRegistroadm").text(data);
								$("#mensajeBtnRegistroadm").attr("class","alert alert-info text-center");
								$('#agregarAdminModal').animate({
									scrollTop: '500px'
								}, 300);
								$(window).scroll(function(){
									if( $(this).scrollTop() > 0 ){
										$('.ir-arriba').slideDown(300);
									} else {
										$('.ir-arriba').slideUp(300);
									}
								});
								if(data == "Se ha registrado correctamente..."){

								}
							});

					}else{
						$("#mensajeBtnRegistroadm").text("Debe aceptar los terminos y condiciones para completar el registro");
						$("#mensajeBtnRegistroadm").attr("class","alert alert-info text-center");
						$('#agregarAdminModal').animate({
							scrollTop: '500px'
						}, 300);
						$(window).scroll(function(){
							if( $(this).scrollTop() > 0 ){
								$('.ir-arriba').slideDown(300);
							} else {
								$('.ir-arriba').slideUp(300);
							}
						});
					};
					

				}else{

					$("#mensajeBtnRegistroadm").text("Debe llenar todos los campos obligatorios...");
					$("#mensajeBtnRegistroadm").attr("class","alert alert-danger text-center");
					$('#agregarAdminModal').animate({
						scrollTop: '500px'
					}, 300);
					$(window).scroll(function(){
						if( $(this).scrollTop() > 0 ){
							$('.ir-arriba').slideDown(300);
						} else {
							$('.ir-arriba').slideUp(300);
						}
					});
				}
			}
		}
	}else{
		$("#mensajepassadm").text("Las contraseñas no coinciden");
		$("#mensajepassadm").attr("class","alert alert-danger text-center");
		$('#agregarAdminModal').animate({
			scrollTop: '0px'
		}, 300);
		$(window).scroll(function(){
			if( $(this).scrollTop() > 0 ){
				$('.ir-arriba').slideDown(300);
			} else {
				$('.ir-arriba').slideUp(300);
			}
		});
	}

	}//cierre registro Administrador




//funcion que valida y avisa si esta mal escrito el email
function emailfocus(){
	
	if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {
		$("#mensajeemail").attr("class","alert alert-danger text-center");  
	}else{
		$("#mensajeemail").attr("class","alert alert-danger hidden"); 
	}
	
}
function emailfocusven(){
	
	if($("#emailven").val().indexOf('@', 0) == -1 || $("#emailven").val().indexOf('.', 0) == -1) {
		$("#mensajeemailven").attr("class","alert alert-danger text-center");  
	}else{
		$("#mensajeemailven").attr("class","alert alert-danger hidden"); 
	}
	
}
function emailfocusadm(){
	
	if($("#emailadm").val().indexOf('@', 0) == -1 || $("#emailadm").val().indexOf('.', 0) == -1) {
		$("#mensajeemailadm").attr("class","alert alert-danger text-center");  
	}else{
		$("#mensajeemailadm").attr("class","alert alert-danger hidden"); 
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