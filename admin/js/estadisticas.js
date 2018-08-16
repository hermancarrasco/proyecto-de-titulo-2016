


/*=============================================================
    Authour URI: www.binarycart.com
    License: Commons Attribution 3.0

    http://creativecommons.org/licenses/by/3.0/

    100% To use For Personal And Commercial Use.
    IN EXCHANGE JUST GIVE US CREDITS AND TELL YOUR FRIENDS ABOUT US
   
    ========================================================  */


    (function ($) {
        "use strict";
        var mainApp = {

            main_fun: function () {
            /*====================================
            METIS MENU 
            ======================================*/
            $('#main-menu').metisMenu();

            /*====================================
              LOAD APPROPRIATE MENU BAR
              ======================================*/
              $(window).bind("load resize", function () {
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse')
                } else {
                    $('div.sidebar-collapse').removeClass('collapse')
                }
            });



            /*====================================
    MORRIS LINE CHART
    ======================================*/
    var kg5="1";

    $.post('php/Estadisticas/intermediario.php',{kg5:kg5},
        function(data){
            //console.log(data);
            Morris.Line({
              element: 'chart5kg',
              data: eval(data),
              xkey: 'Fecha',
              ykeys: ['precio'],
              labels: ['Precio'],
              parseTime: false
          });

        });
    
var kg11="1";

    $.post('php/Estadisticas/intermediario.php',{kg11:kg11},
        function(data){
            //console.log(data);
            Morris.Line({
              element: 'chart11kg',
              data: eval(data),
              xkey: 'Fecha',
              ykeys: ['precio'],
              labels: ['Precio'],
              parseTime: false
          });

        });

var kg15="1";

    $.post('php/Estadisticas/intermediario.php',{kg15:kg15},
        function(data){
            //console.log(data);
            Morris.Line({
              element: 'chart15kg',
              data: eval(data),
              xkey: 'Fecha',
              ykeys: ['precio'],
              labels: ['Precio'],
              parseTime: false
          });

        });
    
var kg45="45";

    $.post('php/Estadisticas/intermediario.php',{kg45:kg45},
        function(data){
            console.log(data);
            Morris.Line({
              element: 'chart45kg',
              data: eval(data),
              xkey: 'Fecha',
              ykeys: ['precio'],
              labels: ['Precio'],
              parseTime: false
          });

        });
///// cierre grafico de compras

//Grafico de ventas

var kg5Venta="1";

    $.post('php/Estadisticas/intermediario.php',{kg5Venta:kg5Venta},
        function(data){
            console.log(data);
            
            Morris.Line({
              element: 'chartVenta5kg',
              data: eval(data),
              xkey: 'Fecha',
              ykeys: ['precio'],
              labels: ['Precio'],
              parseTime: false
              });
            

        });
    
    
var kg11Venta="1";

    $.post('php/Estadisticas/intermediario.php',{kg11Venta:kg11Venta},
        function(data){
            console.log(data);
            Morris.Line({
              element: 'chartVenta11kg',
              data: eval(data),
              xkey: 'Fecha',
              ykeys: ['precio'],
              labels: ['Precio'],
              parseTime: false
          });

        });


var kg15Venta="1";

    $.post('php/Estadisticas/intermediario.php',{kg15Venta:kg15Venta},
        function(data){
            console.log(data);
            Morris.Line({
              element: 'chartVenta15kg',
              data: eval(data),
              xkey: 'Fecha',
              ykeys: ['precio'],
              labels: ['Precio'],
              parseTime: false
          });

        });
    
var kg45Venta="45";

    $.post('php/Estadisticas/intermediario.php',{kg45Venta:kg45Venta},
        function(data){
            console.log(data);
            Morris.Line({
              element: 'chartVenta45kg',
              data: eval(data),
              xkey: 'Fecha',
              ykeys: ['precio'],
              labels: ['Precio'],
              parseTime: false
          });

        });
    // cierre grafico de ventas






},

initialization: function () {
    mainApp.main_fun();

}

}
    // Initializing ///

    $(document).ready(function () {
        mainApp.main_fun();
    });

}(jQuery));
