$(document).ready(function () {
	
});

function cargarPedidos(zona){
	
	var verPedidos="1";


	$.post('php/verPedidos/intermediario.php',{verPedidos:verPedidos,zona:zona},
		function(data){
			$("#contPedidos").html(data);

		}); 
	console.log("zona: "+zona);
}

function entregar(id){
	console.log("id: "+id);
	var entregar="1";

		$.post('php/verPedidos/intermediario.php',{entregar:entregar,id:id},
		function(data){
			alert(data);
			location.reload();
			console.log(data);

		}); 
}