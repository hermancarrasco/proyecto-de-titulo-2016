


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

    
    var kg5="45";

    $.post('php/index/intermediario.php',{kg5:kg5},
      function(data){
        console.log(data);
        Morris.Donut({
          element: 'pedidosDia',
          resize:true,
          data: eval(data)
        });
      });
///// cierre grafico de compras







},

initialization: function () {
  mainApp.main_fun();

}

}
    // Initializing ///

    $(document).ready(function () {
      mainApp.main_fun();
      revision();
      stock();
    });

  }(jQuery));


function revision(){

  $.post('php/index/intermediario.php',{rev:"1"},
      function(data){
        console.log(data);
        $("#revisionCamiones").html(data);
      });
}

function stock(){

  $.post('php/index/intermediario.php',{stock:"1"},
      function(data){
        console.log(data);
        $("#stockCritico").html(data);
      });
}
