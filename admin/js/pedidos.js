$(document).ready(function () {
	
	cargarCboTipoGas();
	$("#cboTipoGas").change(mostrarPrecio);
	$("#btnRegistrarPedido").click(registrarPedido);

});

function cargarCboTipoGas () {
	var cboTipo="1";

	$.post('php/Pedidos/intermediario.php',{cboTipo:cboTipo},
		function(data){
			$("#cboTipoGas").html(data);
			
		}); 
}

function mostrarPrecio () {
	var id=$("#cboTipoGas").val();

	$.post('php/Pedidos/intermediario.php',{mostrarPrecio:id},
		function(data){
			if (data=="") {
				$("#txtPrecio").val("0");
			}else{
				$("#txtPrecio").val(data);

			}
		}); 
}

function registrarPedido () {
	var venta="1";
	var direccion=$("#txtDireccion").val();
	var gasTipo=$("#cboTipoGas").val();
	var precio=$("#txtPrecio").val();


	if (direccion=="" || gasTipo==0 || precio==0) {
		alert("debe llenar todos los campos");
	} else{
		
		$.post('php/Pedidos/intermediario.php',{venta:venta,direccion:direccion,gasTipo:gasTipo},
		function(data){
			console.log("Pedido: "+data);
			location.reload();
		});
		 
	}//cierre if-else
}














