/*jshint esversion: 6 */
$(document).ready(function(){
  "use strict";

  $(".nav li").on("click", function(){
       $(".active").removeClass('active'); //Elimina todas las 'class active'.

       $(this).addClass("active"); //Agrega la 'class active' al link clickeado.
   });

  $(".navbar-nav").on("click",".inicio", function () {
    let target = $(this).attr("data-target"); //Guarda (inicio) en 'target', el contenido del tag personalizado.
    cargarHTML(target); //Llama a 'cargarHTML' y pasa 'target' como parámetro.
  });

  $(".navbar-nav").on("click",".juegos", function () {
    let target = $(this).attr("data-target"); //Guarda (juegos) en 'target', el contenido del tag personalizado.
    cargarHTML(target); //Llama a 'cargarHTML' y pasa 'target' como parámetro.
    traerDatosServidor(); //Carga TOP 10. (rankTable-apiREST.js).
  });

  $(".navbar-nav").on("click",".noticias", function () {
    let target = $(this).attr("data-target"); //Guarda (noticias) en 'target', el contenido del tag personalizado.
    cargarHTML(target); //Llama a 'cargarHTML' y pasa 'target' como parámetro.
  });

  //------FUNCIONES------

  //obtengo el pedazo de html a mostrar correspondiente a la seccion clickeada en el navbar
  function cargarHTML(target){
  $.ajax({
    "url": target + ".html", //Concatena 'target' + '.html' para cargar el archivo correspondiente.
    "method": "GET",
    "dataType": "HTML",
    "success": mostrarHTML
  });
  //cambio la imagen de banner correspondiente a la seccion cargada
  $(".banner").attr("src","images/banners/banner_" + target + ".jpg"); //Carga el 'banner_target' correspondiente, y lo guarda en la 'class banner'.
  $("#partial-render-content").html("Cargando..."); //Si tarda en traer los datos (o no los trae), dirá 'cargando'.
  }

  //cargo html con partial render y bindeo eventos a los botones q creo
  function mostrarHTML(pagina) {
      let oPagina = $(pagina); //'oPagina' equivale a la 'data' del HTML traído. (inicio.html, juegos.html, etc).
      $("#partial-render-content").html(oPagina); //Carga el contenido correspondiente en la ubicación indicada.
	  //Se bidea el evento 'leer más' al (falso) button.
      $(".readmore").on("click", function () {
        let target = $(this).attr("data-target"); //Guarda el valor STRING del tag personalizado en 'target'. (NoticiaX, NoticiaHotx).
        cargar(target); //(noticias_partialRender.js) Llama a la función 'cargar' y le pasa 'target' como parámetro.
      });

	  //Se bidea el evento 'guardar juego' al button 'guardar' de 'juegos'.
      let numGrupo = 2;
      $(".guardar-juego").on("click",function(event){
        event.preventDefault(); //Previene el comportamiento default, (no se refresca).
        guardar(numGrupo); //(rankTable-apiREST.js). Llama a la función 'guardar' y pasa 'numGrupo' por parámetro.
      });

	  //Se bidea el evento 'cargar por defecto' al button de la tabla con REST service.
      $(".cargar-items-default").on("click",function(event){
        event.preventDefault(); //Previene el comportamiento default, (no se refresca).
        cargarItemsDefault(numGrupo); //(rankTable-apiREST.js). Llama a la función 'cargarItemsDefault' y pasa 'numGrupo' por parámetro.
      });
  }
});
