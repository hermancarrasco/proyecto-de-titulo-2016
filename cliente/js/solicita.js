$(document).ready(function () {

	//se llaman las 4 funciones para que llenen los datos de los productos
	carga5();
	carga11();
	carga15();
	carga45();
	$("#cargando").hide();
	//metodos para agregar un componente a una clase
	//que oculta un mensaje
	
	$("#btnConfirmarPerdido").click(confirmarPedido);
	//$("#btnDireccionRegistrada").click(datosPedido);


});
//Funcion que manda el pedido del cliente a la base de datos
//se me olvido cambiar el nombre de la funcion! XD
function probando(id_user,id_prod){
	
	var k45="1";
	var id=id_user;
	var idProd=id_prod;
	$(this).button('loading');
	$.post('../php/intermediario.php',{k45:k45,id:id,idProd:idProd},
		function(data){
			$("#colhidden5").removeClass("hidden");
			$("#colhidden11").removeClass("hidden");
			$("#colhidden15").removeClass("hidden");
			$("#colhidden45").removeClass("hidden");
		}); 

} 




//funcion llamada desde que se carga el documento
function btncerrar()
{
	$('#5kg').modal('hide');
	$('#11kg').modal('hide');
	$('#15kg').modal('hide');
	$('#45kg').modal('hide');
}
//funcion llamada desde que se carga el documento
function carga5()
{
	var id=$("#idUsuario").val();
	var tipo="1";
	$.post('php/intermediario.php',{dir:id,tipo:"5"},
		function(data){
			$("#modal-body5k").html(data);
		//se agregan los datos obtenidos de la BD a la pagina
	});
}
//funcion llamada desde que se carga el documento
function carga11()
{
	var id=$("#idUsuario").val();
	var tipo="1";
	$.post('php/intermediario.php',{dir:id,tipo:"11"},
		function(data){
			$("#modal-body11k").html(data);
		//se agregan los datos obtenidos de la BD a la pagina
	});
}
//funcion llamada desde que se carga el documento

function carga15()
{
	var id=$("#idUsuario").val();
	var tipo="1";
	$.post('php/intermediario.php',{dir:id,tipo:"15"},
		function(data){
			$("#modal-body15k").html(data);
		//se agregan los datos obtenidos de la BD a la pagina
	});
}
//funcion llamada desde que se carga el documento
function carga45()
{
	var id=$("#idUsuario").val();
	var tipo="1";
	$.post('php/intermediario.php',{dir:id,tipo:"45"},
		function(data){
			$("#modal-body45k").html(data);
		//se agregan los datos obtenidos de la BD a la pagina
	});
}

function datosPedido (tipo) {
	var dir=$("#cboDireccion"+tipo).val();
	var direccion,zona,zon;
	direccion=dir.substr(0, dir.length-3);
	zona=dir.substr(dir.length-1, dir.length);
	console.log("direccion: "+direccion+" Zona: "+zona);
	if (zona==1) {
		zon="NOROESTE";
	} else if (zona==2) {
		zon="NORESTE";
	} else if (zona==3){
		zon="SUROESTE";
	}else if (zona==4){
		zon="SURESTE";		
	}
	$("#confirmTipo").val(tipo);
	$("#confirmDireccion").val(direccion);
	$("#confirmZona").val(zona);
	$("#confirmCilindroDe").text("Cilindro de : "+tipo);
	$("#confirmDireccionDe").text("Dirección   : "+direccion);
	$("#confirmZonaDe").text("Zona   : "+zon);
	//alert(tipo);
}

function datosPedidoNewDir (tipo) {
	var zona=$("#cboZona"+tipo).val();
	var confZona="";
	console.log("valor zona: "+zona);
	if (zona==0) {
		$("#modalConfirmar").modal("hide");
		alert("Selecciona una zona...");

	} else{

		if (zona==1) {
			confZona="NOROESTE";
		} else if(zona==2){
			confZona="NORESTE";
		}else if(zona==3){
			confZona="SUROESTE";
		}else if(zona==4){
			confZona="SURESTE";
		}

		var dir=$("#direccion"+tipo).val();
		if (dir=="") {
			$("#confirmCilindroDe").text("Debe llenar el campo de busqueda");
			$("#confirmDireccionDe").text("");		
			$("#modalConfirmar").modal("hide");
			$("#btnConfirmarPerdido").hide();
		}else{
			$("#confirmTipo").val(tipo);
			$("#confirmDireccion").val(dir);
			$("#confirmZona").val(zona);
			$("#confirmCilindroDe").text("Cilindro de : "+tipo);
			$("#confirmDireccionDe").text("Dirección   : "+dir);
			$("#confirmZonaDe").text("Zona   : "+confZona);
			console.log("con zona:"+confZona);
			$("#btnConfirmarPerdido").show();
			$("#modalConfirmar").modal("show");
			var id=$("#confirmUsuario").val();
			var nuevaDir="1";
			dir=dir+" Rancagua";
			$.post('php/intermediario.php',{nuevaDir:nuevaDir,dirNueva:dir,id:id,zona:zona},
				function(data){
					console.log(data);
		//se agregan los datos obtenidos de la BD a la pagina
		//carga5();
	});

		}
	}
	//alert(tipo);
}

function confirmarPedido () {
	var dir=$("#cboDireccion45").val();
	var tipo=$("#confirmTipo").val();
	var condir=$("#confirmDireccion").val();
	var id=$("#confirmUsuario").val();
	var zona=$("#confirmZona").val();
	//alert(condir +" cilindro de "+tipo);
	//btncerrar();

	console.log("Direccion: "+dir+" tipo: "+tipo+" comf dir: "+condir+" id: "+id+" zona: "+zona);

	$.post('php/intermediario.php',{venta:"1",tipo:tipo,condir:condir,id:id,zona:zona},
		function(data){
			console.log(data);
		//se agregan los datos obtenidos de la BD a la pagina
	});
	
}







/*  respaldo de la funcion de geolocalizacion
function buscarGeo(tipo){

	var dir=$("#direccion"+tipo).val();
	

	$("#cargando").show();
	//navigator.geolocation.getCurrentPosition(fn_ok, fn_error);
	var divMapa = document.getElementById('mapa'+tipo);

	function fn_error () {
		divMapa.innerHTML="Hubo un problema solicitando los datos";
	}
	function fn_ok (resp) {
        //mostrar_objeto(resp.coords);
        //divMapa.innerHTML="autorizado";

        var lat = resp.coords.latitude;
        var lon = resp.coords.longitude;

        var glatLon = new google.maps.LatLng(lat, lon);
        var objConfig = {
        	zoom:17,
        	center:glatLon
        }
        var gMapa = new google.maps.Map(divMapa, objConfig);
        var objMarker= {
        	position: glatLon,
        	map: gMapa,
        	title: "mi Ubicacion"
        }

        var gMarker = new google.maps.Marker(objMarker);

        var gCoder = new google.maps.Geocoder();

        var objInformacion = {
            //address:"cabo arestey ,santiago"
            address:dir

        }
        gCoder.geocode(objInformacion,  fn_coder);

        function fn_coder (datos) {
        	var coordenadas= datos[0].geometry.location;

        	var config ={
        		map:gMapa,
        		position:coordenadas,
        		title:"titulo"
        	}
        	
        	var gMarkerDV = new google.maps.Marker(config);
        	
        	$("#cargando").hide();
        	gMapa.setCenter(gMarkerDV.getPosition());
        }


    }

    function mostrar_objeto (obj) {
    	for (var prop in obj) {
    		document.write(prop+': '+obj[prop]+'<br>')
    	};
    }
}*/

function buscarGeo(tipo){

	var dir=$("#direccion"+tipo).val();
	dir = dir+" rancagua";

	$("#cargando").show();
	//navigator.geolocation.getCurrentPosition(fn_ok, fn_error);
	var divMapa = document.getElementById('mapa'+tipo);

/*	function fn_error () {
		divMapa.innerHTML="Hubo un problema solicitando los datos";
	}*/
/*	function fn_ok (resp) {
        //mostrar_objeto(resp.coords);
        //divMapa.innerHTML="autorizado";

        var lat = resp.coords.latitude;
        var lon = resp.coords.longitude;

        var glatLon = new google.maps.LatLng(lat, lon);
        
        var objMarker= {
        	position: glatLon,
        	map: gMapa,
        	title: "mi Ubicacion"
        }

        var gMarker = new google.maps.Marker(objMarker);

        


    }*/

    var gCoder = new google.maps.Geocoder();

    var objConfig = {
    	zoom:17,
        	//center:glatLon
        }
        var gMapa = new google.maps.Map(divMapa, objConfig);

        var objInformacion = {
            //address:"cabo arestey ,santiago"
            address:dir

        }
        gCoder.geocode(objInformacion,  fn_coder);

        function fn_coder (datos) {
        	var coordenadas= datos[0].geometry.location;

        	var config ={
        		map:gMapa,
        		position:coordenadas,
        		title:"Mi Ubicacion"
        	}
        	
        	var gMarkerDV = new google.maps.Marker(config);
        	
        	$("#cargando").hide();
        	gMapa.setCenter(gMarkerDV.getPosition());
        }

        function mostrar_objeto (obj) {
        	for (var prop in obj) {
        		document.write(prop+': '+obj[prop]+'<br>')
        	};
        }
    }




