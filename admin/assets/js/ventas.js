$(document).ready(function () {
	$("#inputDesde").change(mostrarVenta);
	$("#inputHasta").change(mostrarVenta);
	$("#inputDesdePorDia").change(mostrarVentaPorDia);
	$("#inputHastaPorDia").change(mostrarVentaPorDia);
});

function mostrarVenta () {
	var mostrarVenta="1"
	var desde,hasta;
	desde=$("#inputDesde").val();
	hasta=$("#inputHasta").val();

	if (desde>hasta && hasta!=0) {
		$("#mostrarFacturas").html('<div class="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Desde debe ser una fecha menor que hasta</div>');
	}else{
	//$("#mostrarFacturas").html(desde+" - "+hasta);
	$.post('php/intermediario.php',{mostrarVenta:mostrarVenta,desde:desde,hasta:hasta},
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
    function mostrarVentaPorDia () {
    	var mostrarVentaPorDia="1"
    	var desde,hasta;
    	desde=$("#inputDesdePorDia").val();
    	hasta=$("#inputHastaPorDia").val();

    	if (desde>hasta && hasta!=0) {
    		$("#mostrarFacturas").html('<div class="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Desde debe ser una fecha menor que hasta</div>');
    	}else{
	//$("#mostrarFacturas").html(desde+" - "+hasta);
	$.post('php/intermediario.php',{mostrarVentaPorDia:mostrarVentaPorDia,desde:desde,hasta:hasta},
		function(data){
                //$("#mensajeRegistroFactura").text(data);
                //$("#alertRegistroFactura").show();
                $("#mostrarFacturasPorDia").html(data);
            }).error(function(){
            	console.log("Error al ejecutar la peticion");
            }
            ); 
        }
    }
    
    function mostrarDetalleVentas(tipo){
     var desde= $("#inputDesde").val();
     var hasta= $("#inputHasta").val();
     var mostrarDetalleVenta="1";
     $.post('php/intermediario.php',{mostrarDetalleVenta:mostrarDetalleVenta,desde:desde,hasta:hasta,tipo:tipo},
        function(data){                
            $("#dataModalDetalleVentas").html(data);

        }).error(function(){
            console.log("Error al ejecutar la peticion");
        }
        ); 
        $("#modalDetalleVentas").modal("show");
    }

    function mostrarDetalleVentas2(tipo,fecha){

     var mostrarDetalleVenta2="1";

     $.post('php/intermediario.php',{mostrarDetalleVenta2:mostrarDetalleVenta2,tipo:tipo,fecha:fecha},
        function(data){                
            $("#dataModalDetalleVentas").html(data);            
       
    }).error(function(){
        console.log("Error al ejecutar la peticion");
    }
    ); 
    $("#modalDetalleVentas").modal("show");
}

function mostrarDetalleVentasPorDia (dia) {
    var mostrarDetalleVentasPorDia="1";

    $.post('php/intermediario.php',{mostrarDetalleVentasPorDia:mostrarDetalleVentasPorDia,dia:dia},
        function(data){                
            $("#dataModalDetalleVentas").html(data);
            $("#modalDetalleVentas").modal("show");
        }).error(function(){
            console.log("Error al ejecutar la peticion");
        }
        ); 
    }
    function mostrarDetalleVentasPorDia2 (dia2) {
        var mostrarDetalleVentasPorDia2="1";

        $.post('php/intermediario.php',{mostrarDetalleVentasPorDia2:mostrarDetalleVentasPorDia2,dia2:dia2},
            function(data){                
                $("#dataModalDetalleVentas").html(data);
                $("#modalDetalleVentas").modal("show");
            }).error(function(){
                console.log("Error al ejecutar la peticion");
            }
            ); 
        }