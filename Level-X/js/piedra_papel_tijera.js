/*jshint esversion: 6 */

//variable global provisoria hasta que sepamos hacerlo sin uso de la misma y nos pongan un 0 como nota
let ultima_jugada_pc = 0;

function PiedraPapelTijera(decicion_usuario){

  let variacion = document.querySelector(".checkbox");
  let decicion_PC = random_PPT(3); //PC toma una decicion
  let elem = document.querySelector(".PC"); //la imagen que muestra que decicion tomo la PC
  let opcion1 = 0;
  let opcion2 = 0;
  let tnum_partidas = document.querySelector(".partidas");

  //aumenta numero de partidas
  ++tnum_partidas.innerHTML;

  //si la variacion de probabilidad esta activada
  if (variacion.checked) {
    let probabilidad = random_PPT(2);

    /*si es la primera vez que juego y el checkbox esta activado, no hubo ultima jugada por parte de la computadora
      en este caso, la ultima jugada sera random entre las 3 opciones
    */
    if (ultima_jugada_pc === 0) {
      ultima_jugada_pc = decicion_PC;
    }

    if (probabilidad === 1) {
      /*significa que salio la decicion que tomo la PC en la partida anterior
        si la pc eligio tijera anteriormente, aca volvio a salir tijera
      */

      elem.src = "images/mini-game/decicion" + ultima_jugada_pc + ".png";
      resultado(decicion_usuario, ultima_jugada_pc);
    } else {
      /*hay un 50% de q salga uno u otro, de los elementos q no eligio la pc anteriormente.
        Si antes salio tijera, aca hay un 50% de q salga piedra o papel
      */

        if (ultima_jugada_pc === 1) {
          opcion1 = 2; //papel
          opcion2 = 3; //tijera
        } else if (ultima_jugada_pc === 2) {
          opcion1 = 1; //piedra
          opcion2 = 3; //tijera
        } else {
          opcion1 = 1; //piedra
          opcion2 = 2; //papel
        }

        probabilidad = random_PPT(2);
        if (probabilidad == 1) {
          elem.src = "images/mini-game/decicion" + opcion1 + ".png";
          ultima_jugada_pc = opcion1;
          resultado(decicion_usuario, opcion1);
        } else {
          elem.src = "images/mini-game/decicion" + opcion2 + ".png";
          ultima_jugada_pc = opcion2;
          resultado(decicion_usuario, opcion2);
        }
    }

  } else { //sino, esta desactivada y entonces trabaja normal

      //mostramos la decicion de la PC
      elem.src = "images/mini-game/decicion" + decicion_PC + ".png";

      //guardo la ultima jugada que eligio la PC
       ultima_jugada_pc = decicion_PC;
       resultado(decicion_usuario, decicion_PC);
  }
}

//funcion que devuelve un numero random entre 1 y n
function random_PPT(n){
  return Math.floor(Math.random() * n + 1);
}

//funcion que muestra el resultado entre lo que eligio el usuario y lo que eligio la PC
function resultado(decicion_usuario, decicion_PC){
  let humano = decicion_usuario;
  let computadora = decicion_PC;

 //partidas ganadas por el humano y la PC en la tabla del HTML, se ira incrementando el valor en la tabla segun el ganador
  let thumano_ganadas = document.querySelector(".humano");
  let tpc_ganadas = document.querySelector(".computadora");

//esta variable es la que hace q se muestre una imagen de "ganaste","perdiste" o "empataste" en el html
  let resultado = document.querySelector(".resultado");

  if (humano === computadora) {
    resultado.src = "images/mini-game/empate.png";
  } else {
    if (humano === 1 && computadora === 2) {
      resultado.src = "images/mini-game/perdiste.png";
      ++tpc_ganadas.innerHTML;
    }
    if (humano === 1 && computadora === 3) {
      resultado.src = "images/mini-game/ganaste.png";
      ++thumano_ganadas.innerHTML;
    }
    if (humano === 2 && computadora === 3) {
      resultado.src = "images/mini-game/perdiste.png";
      ++tpc_ganadas.innerHTML;
    }
    if (humano === 2 && computadora === 1) {
      resultado.src = "images/mini-game/ganaste.png";
      ++thumano_ganadas.innerHTML;
    }
    if (humano === 3 && computadora === 1) {
      resultado.src = "images/mini-game/perdiste.png";
      ++tpc_ganadas.innerHTML;
    }
    if (humano === 3 && computadora === 2) {
      resultado.src = "images/mini-game/ganaste.png";
      ++thumano_ganadas.innerHTML;
    }
  }
}
