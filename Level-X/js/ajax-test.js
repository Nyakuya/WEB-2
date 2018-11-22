/*jshint esversion: 6 */
$(document).ready(function(){
  $(".readmore").on("click", function () {
    cargar();
  });
  function mostrarAJAX(data, textStatus, jqXHR) {
      //mostrar en el DOM
      $("#noticia-con-ajax").html(data);
      $(".return-principalPage").on("click", function(){
        retornar();
      });
  }
  function cargar(){
    $.ajax({
      "url": "noticia1-completa.html?",
      "method": "GET",
      "dataType": "HTML",
      "success": mostrarAJAX
    });
    $("#noticia-con-ajax").html("Cargando...");
  }
  function retornar(){
    $.ajax({
      "url": "noticia1.html",
      "method": "GET",
      "dataType": "HTML",
      "success": function volverAJAX(data, textStatus, jqXHR) {$("#noticia-con-ajax").html(data);}
    });
  }
});
