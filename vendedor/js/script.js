$(document).ready(function () {

    $("#btnVentaRuta").click(mostrarProductos);
    $("#cboTipoGas").change(mostrarPrecio);
    $("#btnRegistrarVentaRuta").click(registrarVenta);

});

function mostrarProductos() {
    $("#ventaRuta").modal("show");
    var cboTipo = "1";

    $.post('php/intermediario.php', {
            cboTipo: cboTipo
        },
        function (data) {
            $("#cboTipoGas").html(data);

        });
}

function mostrarPrecio() {
    var id = $("#cboTipoGas").val();

    $.post('php/intermediario.php', {
            mostrarPrecio: id
        },
        function (data) {
            if (data == "") {
                $("#txtPrecio").val("0");
            } else {
                $("#txtPrecio").val(data);

            }
        });
}

function registrarVenta() {

    var prod = $("#cboTipoGas").val();
    var precio = $("#txtPrecio").val();
    var cantidad = $("#txtCantidad").val();
    var zona = $("#txtZona").val();
    var direccion;

    console.log("producto: " + prod + " precio: " + precio + " cantidad: " + cantidad + " zona: " + zona);


    navigator.geolocation.getCurrentPosition(function (resp) {

        var lat = resp.coords.latitude;
        var lon = resp.coords.longitude;
        var glatLon = new google.maps.LatLng(lat, lon);
        var geocoder = new google.maps.Geocoder;

        geocoder.geocode({
            'location': glatLon
            // ej. "-34.653015, -58.674850"
        }, function (results, status) {
            // si la solicitud fue exitosa
            if (status === google.maps.GeocoderStatus.OK) {
                // si encontró algún resultado.
                if (results[0]) {
                    direccion = results[0].formatted_address;
                    $.post('php/intermediario.php', {
                            regVenta: "1",
                            prod: prod,
                            precio: precio,
                            cantidad: cantidad,
                            lat: lat,
                            lon: lon,
                            direccion: direccion,
                            zona: zona
                        },
                        function (data) {

                            console.log(data);
                            alert(data);

                        });
                }
            }
        });



        // console.log("latitude: "+lat+" longitude: "+lon);

    }, function () {
        console.log("error en la ubicacion");
    });





}



function nada() {
    console.log("nada");
}

function inicioMapa(zona) {
    var divMapa = document.getElementById('mapa');
    navigator.geolocation.getCurrentPosition(fn_ok, fn_error);

    function fn_error() {
        divMapa.innerHTML = "Hubo un problema solicitando los datos";
    }

    function fn_ok(resp) {
        //mostrar_objeto(resp.coords);
        divMapa.innerHTML = "autorizado";

        var lat = resp.coords.latitude;
        var lon = resp.coords.longitude;

        var glatLon = new google.maps.LatLng(lat, lon);
        var objConfig = {
            zoom: 17,
            center: glatLon
        }
        var gMapa = new google.maps.Map(divMapa, objConfig);
        var objMarker = {
            position: glatLon,
            map: gMapa,
            title: "Mi Ubicación"
        }

        var gMarker = new google.maps.Marker(objMarker);
        gMarker.setIcon("images/camion.png");

        var gCoder = new google.maps.Geocoder();

        var objInformacion = {
            address: "coinco ,chile"
        }
        gCoder.geocode(objInformacion, fn_coder);

        function fn_coder(datos) {
            var coordenadas = datos[0].geometry.location;

            var config = {
                map: gMapa,
                position: coordenadas,
                title: "ubicacion que tengo q poner"
            }


            var gMarkerDV = new google.maps.Marker(config);
            gMarkerDV.setIcon("images/balon.png");

            var objHTML = {
                content: '<button type="button" class="btn btn-default">button</button>'
            }

            var gInfoWindow = new google.maps.InfoWindow(objHTML);

            google.maps.event.addListener(gMarkerDV, 'click', function () {
                gInfoWindow.open(gMapa, gMarkerDV);
            });

            //gMapa.setCenter(gMarkerDV.getPosition());
        }

        setMarkers(gMapa, glatLon, zona);




    }

    function mostrar_objeto(obj) {
        for (var prop in obj) {
            document.write(prop + ': ' + obj[prop] + '<br>')
        };
    }




}

/////////////////////////// MODIFICAR DE AQUI PARA ABAJO PARA PONER LOS GAS/////////////////////////////
/*var beaches = [      	
        ['Bondi Beach', -33.890542, 151.274856, 4],
        ['Coogee Beach', -33.923036, 151.259052, 5],
        ['Cronulla Beach', -34.028249, 151.157507, 3],
        ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
        ['Maroubra Beach', -33.950198, 151.259302, 1]
        ];*/
function setMarkers(map, glatLon, zona) {
    var pedidos = "1";
    var beaches;
    var contPedidos = 0;
    var origen = "";
    var ultimo = "";
    var wayPointsPedidos = [];
    $.post('php/intermediario.php', {
            pedidos: pedidos,
            zona: zona
        },
        function (data) {
            console.log("data: " + data);

            //fn_coder2(data);
            var asdd = eval(data);
            var contWP = 0;

            if (asdd.length < 7) {
                ultimo = asdd[asdd.length - 1];
                console.log("u: " + ultimo);
            } else {
                ultimo = asdd[7];
            };

            if (data == 0) {
                alert("No hay pedidos registrados...");

                console.log("ul vacio: " + ultimo);

            };


            var con = [];
            for (var i in asdd) {
                //  console.log(asdd[i]);
                // var acon =[
                //  ["titulo",asdd[i]]
                //   ];
                // con.push(acon);
                var objInformacion = {
                    address: asdd[i] + " , rancagua"
                }
                if (contWP <= 7) {
                    wayPointsPedidos.push({
                        location: objInformacion.address,
                        stopover: true
                    });
                    contWP++;
                };
                // console.log("obj info: "+objInformacion.address);


                var gCoder = new google.maps.Geocoder();
                gCoder.geocode(objInformacion, fn_coder2);
            }
            //console.log(con);
            trazarRuta(ultimo, wayPointsPedidos);

        });

    //eval() de php a js
    function trazarRuta(ultimo, wayPointsPedidos) {
        ////trazar ruta///////////////

        var objConfigDR = {
            map: map,
            suppressMarkers: true
        }


        var objConfigDS = {
            origin: glatLon, //latLong - String Domicilio (poner mi ubicacion)
            destination: ultimo + ", rancagua", //latLong - String Domicilio 
            waypoints: wayPointsPedidos,
            optimizeWaypoints: true,
            travelMode: google.maps.TravelMode.DRIVING
        }
        console.log("ultimo :" + ultimo);
        // console.log("anterior:"+objInformacion.address);


        var ds = new google.maps.DirectionsService(); //obtener coordenadas
        var dr = new google.maps.DirectionsRenderer(objConfigDR); //traduce coordenadas a la ruta visible


        ds.route(objConfigDS, fnRutear);


        function fnRutear(resultados, status) {
            //mostrar la linea entre A y B
            if (status == 'OK') {
                dr.setDirections(resultados);
            } else {
                alert('Error: ' + status);
            }
        }
    }
    ////fin trazar ruta


    // var gCoder = new google.maps.Geocoder();



    // Adds markers to the map.


    function fn_coder2(datos) {

        //var coordenadas= datos[0].geometry.location;
        //console.log(datos[0]);
        // Marker sizes are expressed as a Size of X,Y where the origin of the image
        // (0,0) is located in the top left of the image.

        // Origins, anchor positions and coordinates of the marker increase in the X
        // direction to the right and in the Y direction down.
        var image = {
            url: 'images/balon.png',
            // This marker is 20 pixels wide by 32 pixels high.
            // size: new google.maps.Size(20, 32),
            // The origin for this image is (0, 0).
            origin: new google.maps.Point(0, 0),
            // The anchor for this image is the base of the flagpole at (0, 32).
            anchor: new google.maps.Point(0, 32)
        };
        // Shapes define the clickable region of the icon. The type defines an HTML
        // <area> element 'poly' which traces out a polygon as a series of X,Y points.
        // The final coordinate closes the poly by connecting to the first coordinate.
        var shape = {
            coords: [1, 1, 1, 20, 18, 20, 18, 1],
            type: 'poly'
        };

        // for (var i = 0; i < ndatos.length; i++) {
        // var beach = beaches[i];
        //console.log("direccion: "+datos[0].geometry.location);
        // console.log("datos a :" +datos[1]);
        //console.log(datos);

        var pos = datos[0].geometry.location;

        var marker = new google.maps.Marker({
            //  position: {lat: beach[1], lng: beach[2]},
            position: pos,
            map: map,
            icon: image,
            shape: shape,
            title: "Pedido Automatico"
            //zIndex: beach[2]
        });
        //}
    }




}
