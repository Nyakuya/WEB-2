/*jshint esversion: 6 */
$(document).ready(function(){
  "use strict";

  
  $(".readmore").on("click", function () {
    let target = $(this).attr("data-target"); //Guarda el valor STRING del tag personalizado en 'target'. (NoticiaX, NoticiaHotx).
    cargar(target); //Llama a la función 'cargar' y le pasa 'target' como parámetro.
  });
  
});

//----FUNCIONES----

//Cuando presiono el boton "leer mas". (Expande la noticia).
function cargar(target){
  $.ajax({
    "url": target + "-completa.html", //Carga la noticia COMPLETA. ('noticiaX-completa', noticiaHotX-completa').
    "method": "GET",
    "dataType": "HTML",
    "success": function(data){
	   expandirNoticia(data, target); //Llama a la función 'expandirNoticia' y le pasa la 'data' y 'target' por parámetro.
	   }
  });
  $("#" + target).html("Cargando..."); //Si no se puede cargar o está lento, muestra 'cargando' sobre el ID corespondiente.
}

//Expande la noticia, (si hiciste click en 'leer más').
function expandirNoticia(noticia, target) {
    let oNoticia = $(noticia); //La 'data' traída (noticia) se guarda en 'oNoticia'.
	//Se bidea el (falso) button 'leer menos' que se acaba de crear.
    oNoticia.on("click", ".return-principalPage", function(){ //Cuando 'click' sobre '.return-principalPage'.
      let oTarget = $(this).attr("data-target"); //Guarda el valor STRING del tag personalizado en 'target'. (NoticiaX, NoticiaHotx).
      retornar(oTarget); //Llamada a función.
    });
    $("#" + target).html(oNoticia); //Mete la noticia traída 'oNoticia' en la ubicacion correcta, '# + target'.
}

//Click en el (falso) button 'leer menos'. (Contrae la noticia).
function retornar(target){
  $.ajax({
    "url": target + ".html", //Obtiene el pedazito de noticia. ('noticiaX', 'noticiaHotx').
    "method": "GET",
    "dataType": "HTML",
    "success": function(data){
      contraerNoticia(data, target); //Llamada a función.
    }
  });
}

//Contrae la noticia, (si hiciste click en 'leer menos').
function contraerNoticia(noticia, target) {
  let oNoticia = $(noticia); //La 'data' traída (noticia) se guarda en 'oNoticia'.
  //Se bidea el (falso) button 'leer más' que se acaba de crear al contraer la noticia.
  oNoticia.on("click", ".readmore", function() { //Cuando 'click' sobre '.readmore'.
    let oTarget = $(this).attr("data-target"); //Guarda el valor STRING del tag personalizado en 'oTarget'. (NoticiaX, NoticiaHotx).
    cargar(oTarget); //Llamada a función.
  });
  $("#" + target).html(oNoticia); //Mete la noticia traída 'oNoticia' en la ubicacion correcta, '# + target'.
}
