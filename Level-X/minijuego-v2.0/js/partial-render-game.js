/*jshint esversion: 6 */
function cargarHTML_jugador2(player2Type, ThisMinijuego){ //ThisMinijuego -> el 'this' del Minijuego
  $.ajax({
    "url": player2Type + "Player.html", //'player2Type' corresponde a 'human' ó 'computer', de forma que podría quedar 'humanPlayer.html', y cargar las 5 elecciones del jugador 2.
    "method": "GET",
    "dataType": "HTML",
    "success": function(data){
      let html = $(data);
      $("#partial-render-jugador2").html(html); //Mete la 'data' obtenida en la ubicacion del ID correspondiente.
      ThisMinijuego.bindear_botones(player2Type, ThisMinijuego); //Se llama a la función que bindea los botones.
    }
  });
}

function mostrarHTML_decicionJugadores(decicion1, decicion2, player2Type, ThisMinijuego){ //This > Minijuego
  $.ajax({
    "url": decicion1 + ".html", //Carga el html que contiene la decision 'jugador1' (HUMANO). (EJ: 'lagarto.html').
    "method": "GET",
    "dataType": "HTML",
    "success": function(data){
      let html = $(data);
      $("#player1-choice").html(html); //Muestra la 'data' obtenida en la ubicacion del ID correspondiente.
      $.ajax({
        "url": decicion2 + ".html", //Carga el html que contiene la decision 'jugador2' (PC ó HUMANO). (EJ: 'spock.html').
        "method": "GET",
        "dataType": "HTML",
        "success": function(data){
          let html = $(data);
          $("#player2-choice").html(html); //Muestra la 'data' obtenida en la ubicacion del ID correspondiente.
          setTimeout(function(){
		     ThisMinijuego.calcular_resultado(decicion1, decicion2, player2Type);
			 }, 200); //Retrasa el 'alert' 200 milisegundos para que el HTML logre cargar las decisiones elegidas.
        }
      });
    }
  });
}
