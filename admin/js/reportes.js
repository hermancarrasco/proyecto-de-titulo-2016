


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
    var ventas="1";

    $.post('php/Reportes/intermediario.php',{ventas:ventas},
        function(data){
            //console.log(data);
            Morris.Bar({
              element: 'chartVentas',
              data: eval(data),
              xkey: 'Mes',
              ykeys: ['Total'],
              labels: ['Total Mes'],
              resize:true,
              parseTime: false
          });
              console.log("datos: "+data);
        });

    var ventasxAnio="1";

    $.post('php/Reportes/intermediario.php',{ventasxAnio:ventasxAnio},
        function(data){
            //console.log(data);
            Morris.Bar({
              element: 'chartVentasPorAnio',
              data: eval(data),
              xkey: 'Anio',
              ykeys: ['Total'],
              labels: ['Total Por Año'],
              resize:true,
              parseTime: false
          });

        });

    var ventasZona="1";
    $.post('php/Reportes/intermediario.php',{ventasZona:ventasZona},
        function(data){
            console.log(data);
            Morris.Bar({
              element: 'chartVentasZona',
              data: eval(data),
              xkey: 'Mes',
              ykeys: ['a', 'b','c','d'],
              labels: ['NorOeste', 'NorEste','SurOeste','SurEste'],
              resize:true,
              parseTime: false
          });

        });


    var ventasRuta="1";
    $.post('php/Reportes/intermediario.php',{ventasRuta:ventasRuta},
        function(data){
            console.log(data);
            Morris.Bar({
              element: 'chartventasRuta',
              data: eval(data),
              xkey: 'Mes',
              ykeys: ['a', 'b','c','d'],
              labels: ['NorOeste', 'NorEste','SurOeste','SurEste'],
              resize:true,
              parseTime: false
          });

        });






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
