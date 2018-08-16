$(document).ready(function () {

	/*** Ocultar al iniciar la pagina ***/
	$("#unomas").hide();
	$("#registrarCompra").hide();
	$("#alertRegistroFactura").hide();
	$("#formTotales").hide();

	/*** Cargar al iniciar la pagina ***/
	llenarRadios();
	llenarComboProveedores();

	/*** Cargar al hacer click ***/
	$("#btnModalAgregarTipo").click(function(){
		$("#mensajeBtnRegistrarTipo").attr("class","alert alert-info text-center hidden");
	});
	$("#btnRegistrarTipo").click(insertarTipoProveedores);
	$("#btnRegistrarProveedor").click(registrarProveedor);
	$("#unomas").on("click",unomas);
	$("#registrarCompra").click(registrarCompra);

	/*** Cargar cuando hay un cambio ***/
	$("#inputCboProveedor").change(function(){		
		var id= $(this).val();		
		listarDatosProveedor(id);		
		count=2;

	});
	$("#inputDesde").change(mostrarFactura);
	$("#inputHasta").change(mostrarFactura);	
	

});
var count=2;

function llenarRadios () {
	var radios="1";
	$.post('php/intermediario.php',{radios:radios},
		function(data){
			$("#contRadios").html(data);
		}); 
}

function insertarTipoProveedores () {
	var btnInsertarTipo="1";
	var nom=$("#nombreTipo").val();
	var desc=$("#inputTxtDescripcion").val();
	var idUsuario=$("#confirmUsuario").val();
	if (nom=!"" && desc!="") {
		$.post('php/intermediario.php',{btnInsertarTipo:btnInsertarTipo,nom:nom,desc:desc,idUsuario:idUsuario},
			function(data){
				$("#mensajeBtnRegistrarTipo").text(data);
				if (data=="El tipo ya existe asd") {
					$("#mensajeBtnRegistrarTipo").text("El nombre de tipo ya esta registrado");
					$("#mensajeBtnRegistrarTipo").attr("class","alert alert-info text-center");
				}else{
					$("#mensajeBtnRegistrarTipo").text("El tipo se registro correctamente");
					$("#mensajeBtnRegistrarTipo").attr("class","alert alert-info text-center");
				}
				llenarRadios();
			});
	}else{
		$("#mensajeBtnRegistrarTipo").text("Debe llenar todos los campos");
		$("#mensajeBtnRegistrarTipo").attr("class","alert alert-info text-center");
		$("#mensajeBtnRegistrarTipo").show();
		$("#mensajeBtnRegistrarTipo").fadeOut(5000);
	}
}

function registrarProveedor () {
	var btnRegistarProveedor="1";
	var rut=$("#rut").val();
	var razonSocial=$("#razonSocial").val();
	var giro=$("#giro").val();
	var direccion=$("#direccion").val();
	var fono=$("#fono").val();
	var tipo=$("input:radio[name='options']:checked").val();
	var idUsuario=$("#confirmUsuario").val();

	if (rut!="" && razonSocial!="" && giro!="" && direccion!="" && fono!="" && tipo!="") {

		$.post('php/intermediario.php',{btnRegistarProveedor:btnRegistarProveedor,rut:rut,razonSocial:razonSocial,giro:giro,direccion:direccion,fono:fono,tipo:tipo,idUsuario:idUsuario},
			function(data){
				$("#mensajeBtnRegistrarProveedor").text(data);							
				$("#mensajeBtnRegistrarProveedor").attr("class","alert alert-info text-center");
				$("#mensajeBtnRegistrarProveedor").show();
				$("#mensajeBtnRegistrarProveedor").fadeOut(5000);
				llenarComboProveedores();
			});
		
	}else{
		$("#mensajeBtnRegistrarProveedor").text("Debe llenar todos los campos para registrar un proveedor...");							
		$("#mensajeBtnRegistrarProveedor").attr("class","alert alert-info text-center");
		$("#mensajeBtnRegistrarProveedor").show();
		$("#mensajeBtnRegistrarProveedor").fadeOut(5000);
	}
}

function llenarComboProveedores () {
	var combo="1";
	$.post('php/intermediario.php',{combo:combo},
		function(data){
			$("#inputCboProveedor").html(data); 
		}); 

}

function listarDatosProveedor (id) {


	$("#alertRegistroFactura").hide();
	

	var listarDatosProveedor=id;
	$.post('php/intermediario.php',{listarDatosProveedor:listarDatosProveedor},
		function(data){

			$("#contComprar").html(data);                

		});
	var idtot="1";
	if ($("#inputCboProveedor").val!="0") {
		idtot=$("#idTipoHidden").val();
	};
	
	if (id==0 ) {				
		$("#unomas").hide();
		$("#registrarCompra").hide();
		$("#formTotales").hide();
	}else if(id=="1" ){
		$("#unomas").hide();
		$("#registrarCompra").show();
		$("#formTotales").show();
	}else{
		$("#unomas").show();
		$("#registrarCompra").show();
		$("#formTotales").show();
	}
	//console.log(idtot);
}
function sacarIva(){

	if ($("#precio1").on("keyup") ||  $("#cantidad1").on("keyup")) {
		var cantidad=$("#cantidad1").val();
		var precio=$("#precio1").val();
		var iva=cantidad*precio*0.19;
		var total=(cantidad*precio)+Math.round(parseFloat(iva));

		$("#iva1").val(Math.round(parseFloat(iva)));
		$("#total1").val(Math.round(total));
	};
	
	if ($("#precio2").on("keyup") ||  $("#cantidad2").on("keyup")) {
		var cantidad=$("#cantidad2").val();
		var precio=$("#precio2").val();
		var iva=cantidad*precio*0.19;
		var total=(cantidad*precio)+Math.round(parseFloat(iva));

		$("#iva2").val(Math.round(parseFloat(iva)));
		$("#total2").val(Math.round(total));
	};

	if ($("#precio3").on("keyup") ||  $("#cantidad3").on("keyup")) {
		var cantidad=$("#cantidad3").val();
		var precio=$("#precio3").val();
		var iva=cantidad*precio*0.19;
		var total=(cantidad*precio)+Math.round(parseFloat(iva));

		$("#iva3").val(Math.round(parseFloat(iva)));
		$("#total3").val(Math.round(total));
	};
	
	if ($("#precio4").on("keyup") ||  $("#cantidad4").on("keyup")) {
		var cantidad=$("#cantidad4").val();
		var precio=$("#precio4").val();
		var iva=cantidad*precio*0.19;
		var total=(cantidad*precio)+Math.round(parseFloat(iva));

		$("#iva4").val(Math.round(parseFloat(iva)));
		$("#total4").val(Math.round(total));
	};
	
	if ($("#precio5").on("keyup") ||  $("#cantidad5").on("keyup")) {
		var cantidad=$("#cantidad5").val();
		var precio=$("#precio5").val();
		var iva=cantidad*precio*0.19;
		var total=(cantidad*precio)+Math.round(parseFloat(iva));

		$("#iva5").val(Math.round(parseFloat(iva)));
		$("#total5").val(Math.round(total));
	};

	if ($("#precio6").on("keyup") ||  $("#cantidad6").on("keyup")) {
		var cantidad=$("#cantidad6").val();
		var precio=$("#precio6").val();
		var iva=cantidad*precio*0.19;
		var total=(cantidad*precio)+Math.round(parseFloat(iva));

		$("#iva6").val(Math.round(parseFloat(iva)));
		$("#total6").val(Math.round(total));
	};

	if ($("#precio7").on("keyup") ||  $("#cantidad7").on("keyup")) {
		var cantidad=$("#cantidad7").val();
		var precio=$("#precio7").val();
		var iva=cantidad*precio*0.19;
		var total=(cantidad*precio)+Math.round(parseFloat(iva));

		$("#iva7").val(Math.round(parseFloat(iva)));
		$("#total7").val(Math.round(total));
	};
	if ($("#precio8").on("keyup") ||  $("#cantidad8").on("keyup")) {
		var cantidad=$("#cantidad8").val();
		var precio=$("#precio8").val();
		var iva=cantidad*precio*0.19;
		var total=(cantidad*precio)+Math.round(parseFloat(iva));

		$("#iva8").val(Math.round(parseFloat(iva)));
		$("#total8").val(Math.round(total));
	};
	if ($("#precio9").on("keyup") ||  $("#cantidad9").on("keyup")) {
		var cantidad=$("#cantidad9").val();
		var precio=$("#precio9").val();
		var iva=cantidad*precio*0.19;
		var total=(cantidad*precio)+Math.round(parseFloat(iva));

		$("#iva9").val(Math.round(parseFloat(iva)));
		$("#total9").val(Math.round(total));
	};
	if ($("#precio10").on("keyup") ||  $("#cantidad10").on("keyup")) {
		var cantidad=$("#cantidad10").val();
		var precio=$("#precio10").val();
		var iva=cantidad*precio*0.19;
		var total=(cantidad*precio)+Math.round(parseFloat(iva));

		$("#iva10").val(Math.round(parseFloat(iva)));
		$("#total10").val(Math.round(total));
	};
	var ivaTotal=0,totalTotal=0;
	if ($("#idTipoHidden").val()==1) {
//if ($("#inputCboProveedor").val()==1) {
	for (var i = 1; i < 5; i++) {
		ivaTotal =parseInt(ivaTotal) + parseFloat($("#iva"+i+"").val());
		totalTotal =parseInt(totalTotal) + parseFloat($("#total"+i+"").val());
		$("#ivaTotal").val(ivaTotal);
		$("#totalTotal").val(totalTotal);
		
	};
}else{
	for (var i = 1; i < count; i++) {
		ivaTotal =parseInt(ivaTotal) + parseFloat($("#iva"+i+"").val());
		totalTotal =parseInt(totalTotal) + parseFloat($("#total"+i+"").val());
		$("#ivaTotal").val(ivaTotal);
		$("#totalTotal").val(totalTotal);
		
	};
}

}
function solonumeros(e){
	var key=window.Event ? e.which : e.keyCode
	return(key >=48 && key <=57 || key==46)
}
function solonumerosyk(e){
	var key=window.Event ? e.which : e.keyCode
	return(key >=48 && key <=57 || key==107)
}
function unomas () {
	
	if (count >10){
		alert("El maximo de registros es de 10 -");
	}else {
		$("#formInsumos").append('<div class="form-group"><div class="col-xs-4">														<input type="text" class="form-control" id="producto'+count+'" >						</div>						<div class="col-xs-2">														<input type="text" class="form-control" onKeyPress="return solonumeros(event)" onkeyup="sacarIva()" value="1" id="cantidad'+count+'" >						</div>						<div class="col-xs-2">														<input type="text" class="form-control" id="precio'+count+'" onKeyPress="return solonumeros(event)" onkeyup="sacarIva()">						</div>						<div class="col-xs-2"><input type="text" class="form-control" readonly id="iva'+count+'" >						</div>						<div class="col-xs-2">	<input type="text" class="form-control" readonly id="total'+count+'" >						</div>					</div>');
		count++;
	}
}
function registrarCompra () {
	var env=false;
	var pro = [];
	var numeroFactura=$("#numeroFactura").val();
	var fechaFactura=$("#fechaFactura").val();
	var prov=$("#inputCboProveedor").val();
	var idUsuario=$("#confirmUsuario").val();
	if (numeroFactura=="" || fechaFactura=="") {
		$("#mensajeRegistroFactura").text("Debe llenar el número de factura y fecha");
		$("#alertRegistroFactura").show();
		$("#alertRegistroFactura").fadeOut(5000);
	}else{


		if ($("#idTipoHidden").val()=="1") {
			for (var i = 1; i < 5; i++) {
				var uno=$("#producto"+i).val();
				var dos=$("#cantidad"+i).val();
				var tres=$("#precio"+i).val();
				var cuatro=$("#iva"+i).val();
				var cinco=$("#total"+i).val();

				if (uno!="" && dos!="" && tres!="" && cuatro!="" && cinco!="") {
					var proq=new FunProducto(uno,dos,tres,cuatro,cinco);
					pro.push(proq);
					env=true;
				}else{
					$("#mensajeRegistroFactura").text("Debe llenar todos los campos...");
					$("#alertRegistroFactura").show();
					console.log("alguno vacio");
					env=false;
					$("#alertRegistroFactura").fadeOut(5000);
				}
	};//cierre for
	var prodJson =JSON.stringify(pro);
	var envProdJson="1";
	//console.log(prodJson);
	if (env==true) {
		$.post('php/intermediario.php',{envProdJson:envProdJson,prodJson:prodJson,numeroFactura:numeroFactura,fechaFactura:fechaFactura,prov:prov,idUsuario:idUsuario},
			function(data){

				$("#mensajeRegistroFactura").text(data);
				$("#alertRegistroFactura").show();
				$("#alertRegistroFactura").fadeOut(5000);
			}).error(function(){
				console.log("Error al ejecutar la peticion");
			}
			); 
		}else{
			console.log("no se manda");
		}
	}else{
		for (var i = 1; i < count; i++) {

			var uno=$("#producto"+i).val();
			var dos=$("#cantidad"+i).val();
			var tres=$("#precio"+i).val();
			var cuatro=$("#iva"+i).val();
			var cinco=$("#total"+i).val();

			if (uno!="" && dos!="" && tres!="" && cuatro!="" && cinco!="") {
				var proq=new FunProducto(uno,dos,tres,cuatro,cinco);
				pro.push(proq);
				env=true;
			}else{
				$("#mensajeRegistroFactura").text("Debe llenar todos los campos...");
				$("#alertRegistroFactura").show();
				console.log("alguno vacio");
				env=false;
				$("#alertRegistroFactura").fadeOut(5000);
			}
	}//cierre for
	var prodJson =JSON.stringify(pro);
	var envProdJson="1";
	//console.log(prodJson);
	if (env==true) {
		$.post('php/intermediario.php',{envProdJson:envProdJson,prodJson:prodJson,numeroFactura:numeroFactura,fechaFactura:fechaFactura,prov:prov},
			function(data){
				$("#mensajeRegistroFactura").text(data);
				$("#alertRegistroFactura").show();
			}).error(function(){
				console.log("Error al ejecutar la peticion");
			}
			); 
		}else{
			console.log("no se manda");
		}
	}
}//cierre if


}
function FunProducto (producto,cantidad,precio,iva,total) {
	this.producto=producto;
	this.cantidad=cantidad;
	this.precio=precio;
	this.iva=iva;
	this.total=total;
}

function mostrarFactura () {
	var mostrarFactura="1"
	var desde,hasta;
	desde=$("#inputDesde").val();
	hasta=$("#inputHasta").val();

	if (desde>hasta && hasta!=0) {
		$("#mostrarFacturas").html('<div class="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Desde debe ser una fecha menor que hasta</div>');
	}else{
	//$("#mostrarFacturas").html(desde+" - "+hasta);
	$.post('php/intermediario.php',{mostrarFactura:mostrarFactura,desde:desde,hasta:hasta},
		function(data){
                //$("#mensajeRegistroFactura").text(data);
                //$("#alertRegistroFactura").show();
                $("#mostrarFacturas").html(data);
            }).error(function(){
            	console.log("Error al ejecutar la peticion");
            }
            ); 
        }
    }
