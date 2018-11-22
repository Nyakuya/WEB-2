/*jshint esversion: 6 */
  //nota: la razon por la cual se utiliza "else if" aun cuando con poner "else" ya es suficiente, es para mejor lectura por parte del programador
  //-------VARIABLES GLOBALES-------
  let jugador1_ready = false;
  let jugador1_apuesta = false;
  let jugador2_ready = false;
  let jugador2_apuesta = false;
  let isVariation = false;

  //--------CLASES--------
  //--------PC-JUGADOR--------
  class JugadorPC{
    constructor(){
      this.score = 0; //Inicializa el 'puntaje' en '0'. (PC).
    }
    jugarPC(){
      return this.tomar_decicionPC(); //PC retorna desicion. (Normal Mode - Stuart).
    }
    tomar_decicionPC(){
      let decicion = Math.floor(Math.random()*5 + 1); //La 'PC' decide entre 5 opciones. (Piedra, Papel, Tijera, Lagarto, Spock).
      switch(decicion){
        case 1:
          return "piedra";
        case 2:
          return "papel";
        case 3:
          return "tijera";
        case 4:
          return "lagarto";
        case 5:
          return "spock";
      }
    }
    jugarPcSheldonMode(decicion_jugador1){ //PC usa tu decision, (Gana-Empata).
      return this.tomar_decicionPcSheldonMode(decicion_jugador1); //PC retorna desicion. (Gana-Empata Mode - Sheldon).
    }
    //La 'PC' elige, ('Lagarto' ó 'Spock').
    tomar_decicionPcSheldonMode(decicion_jugador1){
      if(decicion_jugador1 == "piedra"){ //Si elegiste 'piedra', RETORNA 'Spock'. (GANA).
        return "spock";
      }else if(decicion_jugador1 == "papel"){ //Si elegiste 'papel', RETORNA 'Lagarto'. (GANA).
        return "lagarto";
      }else if(decicion_jugador1 == "tijera"){ //Si elegiste 'tijera, RETORNA 'spock'. (GANA).
        return  "spock";
      }else if(decicion_jugador1 == "lagarto"){ //Si elegiste 'papel', RETORNA 'lagarto'. (EMPATA).
        return "lagarto";
      }else if(decicion_jugador1 == "spock"){ //Si elegiste 'papel', RETORNA 'Spock'. (EMPATA).
        return "spock";
      }
    }
    incrementar_scorePC(){ //Incrementa el 'puntaje'. (PC).
      this.score++;
    }
    get_scorePC(){ //Muestra el 'puntaje'. (PC).
      return this.score;
    }
  }

  
  //--------HUMANO-JUGADOR--------
  class JugadorHumano{ //No entiendo una parte!!!!!!!!!!!!!!!!!!!!!!!!!!
    constructor(){
      this.creditos = 100; //Inicializa el 'dinero' en '100'. (HUMANO).
      this.score = 0; //Inicializa el 'puntaje' en '0'. (HUMANO).
    }
	
    //'thisEleccion' depende de la opcion elegida.
    jugar(thisEleccion){
      if(this.creditos >= 5){ //Si los créditos son mayores a 5, puede apostar.
        this.apostar(); //Apuesta.
        return this.tomar_decicion(thisEleccion); //Llama a la función que retorna tu decisión.
      }
    }
    tomar_decicion(thisEleccion){
        return $(thisEleccion).attr("id"); //Retorna (como string) el 'ID' del botón clickeado. (Piedra, Papel, Tijera, Lagarto, Spock).
    }
    reclamar_creditos_ganados(){ //Ganas 10 créditos.
      this.creditos += 10;
    }
    get_creditos(){ //Al llamarla, retorna los créditos.
      return this.creditos;
    }
    apostar(){
      this.creditos -= 5; //Apuesta 5 créditos. (Se restan 5 creditos a la cantidad total de creditos de jugador).
    }
    incrementar_score(){ //Aumenta tu score en +1.
      this.score++;
    }
    get_score(){ //Retorna el score.
      return this.score;
    }
  }

  
  //--------MINIJUEGO--------
  class Minigame{

    constructor(){
      this.jugador1 = new JugadorHumano(); //'jugador1' es HUMANO, y miembro de Minigame.
    }	
	
    //este metodo bindea el evento de jugar vs un humano o vs la pc
    definir_jugador2(){ //Define al 'jugador2', (PC ó HUMANO).
	
      let self = this; //La variable 'self' representa el 'this' del 'Minijuego'. (Utilizado para Bindear el funcionamiento de la botonera)

	  //Si clickeas HUMANO.
      $("#human").on("click", () => {
        self.jugador2 = new JugadorHumano(); //Se instancia (HUMANO) como segundo jugador.

        let player2Type = "human"; //'player2Type' es 'human'.
        cargarHTML_jugador2(player2Type, self); //5 opciones para 'jugador2'. (HUMANO).
        console.log(self.jugador2); //Muestra por consola la carga con partial render los 5 botones.
      });

      //Si clickeas PC.
      $("#computer").on("click", () => {
        self.jugador2 = new JugadorPC(); //Se instancia (PC) como segundo jugador.

        let player2Type = "computer"; //'player2Type' es 'computer'
        cargarHTML_jugador2(player2Type, self); //Imagen para 'jugador2'. (PC).
        console.log(self.jugador2); //Muestra por consola la carga de la imagen.
      });
    }

    //Se Bindea el funcionamiento (evento) de los botones. (Tanto de 'jugador1' como 'jugador2').
    bindear_botones(player2Type, self){

      let decicion1; //Decision (jugador1).
      let decicion2; //Decision (jugador2).

      //bindeo botones de 5 opciones para jugador 1 y jugador 2
	  //Si 'jugador2' es 'human', entra a HUMANO.   else if 'jugador2' es 'PC', entra a PC.
      if(player2Type == "human") { //Bindeo 5 opciones. (Piedra, Papel, Tijera, Lagarto, Spock).
        
		//Créditos de 'jugador1'.
        let creditos1 = $("#creditos1");
        creditos1.html(self.jugador1.get_creditos()); //Muestra los créditos de 'jugador1' en el ID '#creditos1'.

        $(".btn-decicion").on("click",function(){
          //El 'jugador1' ya eligió. (Luego se comprueba si el otro tambien eligió).
          jugador1_ready = true;
          //Si no apostó, apuesta. (Cada vez que ambos juegan, se vuelve falso que apostaron).
          if(!jugador1_apuesta){
            decicion1 = self.jugador1.jugar(this); //Se llama a la función 'jugar', -5 a tus creditos, y retorna tu decision como STRING. (Piedra, Papel, Tijera, Lagarto, Spock).
            creditos1.html(self.jugador1.get_creditos()); //Devuelve la cantidad actual de créditos y la muestra en el html. (jugador1).
            jugador1_apuesta = true; //El jugador1 ya apostó. (No debe hacerlo de nuevo hasta que termine la ronda).
          }

          //Si se comprueba que ambos eligieron, se calcula el ganador.
          if((jugador2_ready)&&(jugador1_ready)){
            //calculo ganador luego de definir valores en "decicion1" y "decicion2"
            self.startGame(decicion1, decicion2, player2Type);
			//Una vez jugaron, deben apostar de nuevo.
            jugador1_apuesta = false;
            jugador2_apuesta = false;
          }
        });

        //Créditos de 'jugador2'.
        let creditos2 = $("#creditos2");
        creditos2.html(self.jugador2.get_creditos()); //Muestra los créditos de 'jugador1' en el ID '#creditos2'.

        $(".btn-decicion2").on("click",function(){
          //El 'jugador1' ya eligió. (Luego se comprueba si el otro tambien eligió).
          jugador2_ready = true;
          //Si no apostó, apuesta. (Cada vez que ambos juegan, se vuelve falso que apostaron).
          if(!jugador2_apuesta){
            decicion2 = self.jugador2.jugar(this); //Se llama a la función 'jugar', y se retorna la decision como STRING. (Piedra, Papel, Tijera, Lagarto, Spock).
            creditos2.html(self.jugador2.get_creditos()); //Devuelve la cantidad actual de créditos y la muestra en el html. (jugador2).
            jugador2_apuesta = true; //El jugador2 ya apostó. (No debe hacerlo de nuevo hasta que termine la ronda).
          }

          //Si se comprueba que ambos eligieron, se calcula el ganador.
          if((jugador2_ready)&&(jugador1_ready)){
            //calculo ganador luego de definir valores en "decicion1" y "decicion2"
            self.startGame(decicion1, decicion2, player2Type);
			//Una vez jugaron, deben apostar de nuevo.
            jugador1_apuesta = false;
            jugador2_apuesta = false;
          }
        });
		
      }else if(player2Type == "computer"){ //Bindeo los 2 MODOS de juego. (Stuart Mode, Sheldon Mode).
	  
        let variacion = $(".variacionIA:checked").val(); //Guarda el valor del checkbox con la clase 'variacionIA' en la variable 'variacion'. (STRING).

        //Stuart es el modo default -> ('isVariation' desactivada).
        if(variacion == "StuartMode"){
          isVariation = false; //Por defecto.
        }else if(variacion == "SheldonMode"){
          isVariation = true; //Modo alterado.
        }

        //Clickear el 'radiobutton' cambia la variacion.
        $(".variacionIA").on("click",function(){
          //Me aseguro evitar cambiar la variacion si vuelvo a presionar el mismo radiobutton
          variacion = $(".variacionIA:checked").val(); //Guarda el valor del checkbox con la clase 'variacionIA' en la variable 'variacion'. (STRING).
		  //Stuart es el modo default -> ('isVariation' desactivada).
          if(variacion == "StuartMode"){
            isVariation = false;//Por defecto.
          }else if(variacion == "SheldonMode"){
            isVariation = true; //Modo alterado.
          }
        });


        $(".btn-decicion").on("click",function(){
          let decicion1 = self.jugador1.jugar(this); //Se llama a la función 'jugar', -5 a tus creditos, y retorna tu decision como STRING. (Piedra, Papel, Tijera, Lagarto, Spock).
          let decicion2;

          if(!isVariation){ //StuartMode
            decicion2 = self.jugador2.jugarPC(); //La PC elige entre 5 opciones. (Piedra, Papel, Tijera, Lagarto, Spock).
          }else{ //SheldonMode
		    //Se pasa la desicion de 'jugador1' para que la PC sepa GANAR ó EMPATAR con 2 opciones. (Lagarto, Spock).
            decicion2 = self.jugador2.jugarPcSheldonMode(decicion1); //Utilizando tu decision, la PC GANARÁ o EMPATARÁ.
          }

          let creditos1 = $("#creditos1");
          creditos1.html(self.jugador1.get_creditos());  //Muestra los créditos de 'jugador1' en el ID '#creditos1'.

          self.startGame(decicion1, decicion2, player2Type); //calculo ganador luego de definir valores en "decicion1" y "decicion2"
        });
      }

    }

	
    startGame(decicion1,decicion2, player2Type){
      //Se muestra la IMG con la decisión de cada jugador.
      mostrarHTML_decicionJugadores(decicion1, decicion2, player2Type, this); //Ejecuta la función en el otro archivo JS. (this MINIJUEGO)
    }

    calcular_resultado(decicion1, decicion2, player2Type){
      //'jugador1' y 'jugador2' dejan de estar "listos". (Volveran a estarlo cuando cada uno re-elija una opcion).
      jugador1_ready = false;
      jugador2_ready = false;

      //Calcula ganador y lo muestra en Alert. Modifica Score y Creditos del ganador. - WARNING!: hyper large code, proceed with caution.
      if ((decicion1 == "piedra")&&(decicion2 == "papel")){

        if(player2Type == "human"){ //Si jugaste contra otro HUMANO.
          this.jugador2.reclamar_creditos_ganados();  //'jugador 2' doble de lo apostado.
          $("#creditos2").html(this.jugador2.get_creditos()); //Muestro cantidad actual de créditos de 'jugador2'.

          this.jugador2.incrementar_score(); //'jugador2' partidas ganadas +1.
          $("#score2").html(this.jugador2.get_score()); //Muestra score actual de 'jugador2'.
          alert("ganó jugador 2 --->"); //Alert que notifica el ganador.

        }else if(player2Type == "computer"){ //Si jugaste contra la PC.
          this.jugador2.incrementar_scorePC(); //'PC' partidas ganadas +1.
          $("#score2").html(this.jugador2.get_scorePC()); //Muestra score actual de 'PC'.
          alert("Perdiste :("); //Alert que notifica que perdiste.
        }


      }else if((decicion1 == "piedra")&&(decicion2 == "tijera")){

        this.jugador1.reclamar_creditos_ganados();
        $("#creditos1").html(this.jugador1.get_creditos());

        this.jugador1.incrementar_score();
        $("#score1").html(this.jugador1.get_score());

        if(player2Type == "human"){
          alert("<--- ganó jugador 1");
        }else if(player2Type == "computer"){
          alert("Ganaste!! :D");
        }

      }else if((decicion1 == "piedra")&&(decicion2 == "lagarto")){

        this.jugador1.reclamar_creditos_ganados();
        $("#creditos1").html(this.jugador1.get_creditos());

        this.jugador1.incrementar_score();
        $("#score1").html(this.jugador1.get_score());

        if(player2Type == "human"){
          alert("<--- ganó jugador 1");
        }else if(player2Type == "computer"){
          alert("Ganaste!! :D");
        }

      }else if((decicion1 == "piedra")&&(decicion2 == "spock")){

        if(player2Type == "human"){
          this.jugador2.reclamar_creditos_ganados();
          $("#creditos2").html(this.jugador2.get_creditos());

          this.jugador2.incrementar_score();
          $("#score2").html(this.jugador2.get_score());
          alert("ganó jugador 2 --->");

        }else if(player2Type == "computer"){
          this.jugador2.incrementar_scorePC();
          $("#score2").html(this.jugador2.get_scorePC());
          alert("Perdiste :(");
        }


      }else if((decicion1 == "papel")&&(decicion2 == "piedra")){

        this.jugador1.reclamar_creditos_ganados();
        $("#creditos1").html(this.jugador1.get_creditos());

        this.jugador1.incrementar_score();
        $("#score1").html(this.jugador1.get_score());

        if(player2Type == "human"){
          alert("<--- ganó jugador 1");
        }else if(player2Type == "computer"){
          alert("Ganaste!! :D");
        }

      }else if((decicion1 == "papel")&&(decicion2 == "tijera")){

        if(player2Type == "human"){
          this.jugador2.reclamar_creditos_ganados();
          $("#creditos2").html(this.jugador2.get_creditos());

          this.jugador2.incrementar_score();
          $("#score2").html(this.jugador2.get_score());
          alert("ganó jugador 2 --->");

        }else if(player2Type == "computer"){
          this.jugador2.incrementar_scorePC();
          $("#score2").html(this.jugador2.get_scorePC());
          alert("Perdiste :(");
        }


      }else if((decicion1 == "papel")&&(decicion2 == "lagarto")){

        if(player2Type == "human"){
          this.jugador2.reclamar_creditos_ganados();
          $("#creditos2").html(this.jugador2.get_creditos());

          this.jugador2.incrementar_score();
          $("#score2").html(this.jugador2.get_score());
          alert("ganó jugador 2 --->");

        }else if(player2Type == "computer"){
          this.jugador2.incrementar_scorePC();
          $("#score2").html(this.jugador2.get_scorePC());
          alert("Perdiste :(");
        }

      }else if((decicion1 == "papel")&&(decicion2 == "spock")){

        this.jugador1.reclamar_creditos_ganados();
        $("#creditos1").html(this.jugador1.get_creditos());

        this.jugador1.incrementar_score();
        $("#score1").html(this.jugador1.get_score());

        if(player2Type == "human"){
          alert("<--- ganó jugador 1");
        }else if(player2Type == "computer"){
          alert("Ganaste!! :D");
        }


      }else if((decicion1 == "tijera")&&(decicion2 == "piedra")){

        if(player2Type == "human"){
          this.jugador2.reclamar_creditos_ganados();
          $("#creditos2").html(this.jugador2.get_creditos());

          this.jugador2.incrementar_score();
          $("#score2").html(this.jugador2.get_score());
          alert("ganó jugador 2 --->");

        }else if(player2Type == "computer"){
          this.jugador2.incrementar_scorePC();
          $("#score2").html(this.jugador2.get_scorePC());
          alert("Perdiste :(");
        }

      }else if((decicion1 == "tijera")&&(decicion2 == "papel")){

        this.jugador1.reclamar_creditos_ganados();
        $("#creditos1").html(this.jugador1.get_creditos());

        this.jugador1.incrementar_score();
        $("#score1").html(this.jugador1.get_score());

        if(player2Type == "human"){
          alert("<--- ganó jugador 1");
        }else if(player2Type == "computer"){
          alert("Ganaste!! :D");
        }


      }else if((decicion1 == "tijera")&&(decicion2 == "lagarto")){

        this.jugador1.reclamar_creditos_ganados();
        $("#creditos1").html(this.jugador1.get_creditos());

        this.jugador1.incrementar_score();
        $("#score1").html(this.jugador1.get_score());

        if(player2Type == "human"){
          alert("<--- ganó jugador 1");
        }else if(player2Type == "computer"){
          alert("Ganaste!! :D");
        }

      }else if((decicion1 == "tijera")&&(decicion2 == "spock")){

        if(player2Type == "human"){
          this.jugador2.reclamar_creditos_ganados();
          $("#creditos2").html(this.jugador2.get_creditos());

          this.jugador2.incrementar_score();
          $("#score2").html(this.jugador2.get_score());
          alert("ganó jugador 2 --->");

        }else if(player2Type == "computer"){
          this.jugador2.incrementar_scorePC();
          $("#score2").html(this.jugador2.get_scorePC());
          alert("Perdiste :(");
        }

      }else if((decicion1 == "lagarto")&&(decicion2 == "piedra")){

        if(player2Type == "human"){
          this.jugador2.reclamar_creditos_ganados();
          $("#creditos2").html(this.jugador2.get_creditos());

          this.jugador2.incrementar_score();
          $("#score2").html(this.jugador2.get_score());
          alert("ganó jugador 2 --->");

        }else if(player2Type == "computer"){
          this.jugador2.incrementar_scorePC();
          $("#score2").html(this.jugador2.get_scorePC());
          alert("Perdiste :(");
        }

      }else if((decicion1 == "lagarto")&&(decicion2 == "papel")){

        this.jugador1.reclamar_creditos_ganados();
        $("#creditos1").html(this.jugador1.get_creditos());

        this.jugador1.incrementar_score();
        $("#score1").html(this.jugador1.get_score());

        if(player2Type == "human"){
          alert("<--- ganó jugador 1");
        }else if(player2Type == "computer"){
          alert("Ganaste!! :D");
        }

      }else if((decicion1 == "lagarto")&&(decicion2 == "tijera")){

        if(player2Type == "human"){
          this.jugador2.reclamar_creditos_ganados();
          $("#creditos2").html(this.jugador2.get_creditos());

          this.jugador2.incrementar_score();
          $("#score2").html(this.jugador2.get_score());
          alert("ganó jugador 2 --->");

        }else if(player2Type == "computer"){
          this.jugador2.incrementar_scorePC();
          $("#score2").html(this.jugador2.get_scorePC());
          alert("Perdiste :(");
        }

      }else if((decicion1 == "lagarto")&&(decicion2 == "spock")){

        this.jugador1.reclamar_creditos_ganados();
        $("#creditos1").html(this.jugador1.get_creditos());

        this.jugador1.incrementar_score();
        $("#score1").html(this.jugador1.get_score());

        if(player2Type == "human"){
          alert("<--- ganó jugador 1");
        }else if(player2Type == "computer"){
          alert("Ganaste!! :D");
        }

      }else if((decicion1 == "spock")&&(decicion2 == "piedra")){

        this.jugador1.reclamar_creditos_ganados();
        $("#creditos1").html(this.jugador1.get_creditos());

        this.jugador1.incrementar_score();
        $("#score1").html(this.jugador1.get_score());

        if(player2Type == "human"){
          alert("<--- ganó jugador 1");
        }else if(player2Type == "computer"){
          alert("Ganaste!! :D");
        }

      }else if((decicion1 == "spock")&&(decicion2 == "papel")){

        if(player2Type == "human"){
          this.jugador2.reclamar_creditos_ganados();
          $("#creditos2").html(this.jugador2.get_creditos());

          this.jugador2.incrementar_score();
          $("#score2").html(this.jugador2.get_score());
          alert("ganó jugador 2 --->");

        }else if(player2Type == "computer"){
          this.jugador2.incrementar_scorePC();
          $("#score2").html(this.jugador2.get_scorePC());
          alert("Perdiste :(");
        }

      }else if((decicion1 == "spock")&&(decicion2 == "tijera")){

        this.jugador1.reclamar_creditos_ganados();
        $("#creditos1").html(this.jugador1.get_creditos());

        this.jugador1.incrementar_score();
        $("#score1").html(this.jugador1.get_score());

        if(player2Type == "human"){
          alert("<--- ganó jugador 1");
        }else if(player2Type == "computer"){
          alert("Ganaste!! :D");
        }

      }else if((decicion1 == "spock")&&(decicion2 == "lagarto")){

        if(player2Type == "human"){
          this.jugador2.reclamar_creditos_ganados();
          $("#creditos2").html(this.jugador2.get_creditos());

          this.jugador2.incrementar_score();
          $("#score2").html(this.jugador2.get_score());
          alert("ganó jugador 2 --->");

        }else if(player2Type == "computer"){
          this.jugador2.incrementar_scorePC();
          $("#score2").html(this.jugador2.get_scorePC());
          alert("Perdiste :(");
        }

      }else if(decicion1 == decicion2){
        alert("empate");
      }
    }

  }

  //------PROGRAMA MAIN----------
  let juego = new Minigame(); //'Minijuego' tiene 'jugador1, y ('jugador2' ó 'jugadorPC')
  juego.definir_jugador2(); //'Define' al 'jugador2'. (PC ó HUMANO)
