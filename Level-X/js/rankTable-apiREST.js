/*jshint esversion: 6 */

$(document).ready(function(){"use strict";

});

  //---------------------VARIABLE GLOBAL NECESARIA---------------------------
  /*Almaceno la cantidad de elementos que hay en la tabla.
   *Lo necesito para saber la posicion del ultimo elemento en la tabla
  */
  let cantDatosTabla = 0;

  //---------------------------FUNCIONES GENERICAS---------------------------

  function handleError (xmlhr, r, error){ //General para todos los ajax.
    console.log(error);
  }

  //genero una fila en la tabla en la posicion "fila" y con los datos "data" obtenidos con ajax
  function generarFila(data, fila){
	  console.log(data);
	  //Agrega 'data' en la posición correspondiente según la 'fila' pasada por parámetro.
	  $(".rank"+(fila)).append("<td>"+data.information[fila].thing.juego+"</td>"); //Mete la info 'juego' debajo del hijo de '.rank+[fila]'.
	  $(".rank"+(fila)).append("<td>"+data.information[fila].thing.fechaLanzamiento+"</td>"); //Mete la info 'fechaLanzamiento' debajo del hijo de '.rank+[fila]'.
	  $(".rank"+(fila)).append("<td>"+data.information[fila].thing.plataforma+"</td>"); //Mete la info 'plataforma' debajo del hijo de '.rank+[fila]'.
	  $(".rank"+(fila)).append("<td>"+data.information[fila].thing.calificacion+"</td>"); //Mete la info 'calificacion' debajo del hijo de '.rank+[fila]'.
	  //Agrega el botón 'MODIFICAR' a la fila. ('modificar+[fila]' para luego modificar el numero correspondiente de fila).
	  let html = "<td><button type=\"submit\" class=\"btn btn-warning modificar" + fila + "\" id=\"" + fila + "\"><span class=\"glyphicon glyphicon-pencil\" aria-hidden=\"true\"></span></button></td>";
	  $(".rank"+(fila)).append(html); //Mete el "valor" de 'html' debajo del hijo de 'rank+[fila]'.
	  //Agrega el botón 'ELIMINAR' a la fila. ('modificar+[fila]' para luego eliminar el numero correspondiente de fila).
	  html = "<td><button type=\"submit\" class=\"btn btn-danger eliminar" + fila + "\" id=\"" + fila + "\"><span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span></button></td>";
	  $(".rank"+(fila)).append(html); //Mete el NUEVO "valor" de 'html' debajo del hijo de 'rank+[fila]'.

    //Se bindean los 'button' que se acaban de crear para que funcionen.
	  bindearBotonModificar(data, fila);
	  bindearBotonEliminar(data, fila);
	}
	
	
  function bindearBotonModificar(data,i){
	  $(".modificar" + i).on("click", function(event){ //Le asigna lo que hará cuando se le haga click encima. (Modificar + i).
	     modificar(data, event, this); //Al clickear en 'this'.
		 });
	}

  function bindearBotonEliminar(data, i){
	  $(".eliminar" + i).on("click", function(event){
	     eliminar(data, event, this); //Le asigna lo que hará cuando se le haga click encima. (Eliminar).
		 });
	}

	
	
	
  //--------------FUNCIONES OBTENER Y MOSTRAR DATOS (GET method)---------------

  //Obtiene la 'data' de server para luego mostrarla en la 'tabla'.
  function traerDatosServidor(){
	  $.ajax({
		"url": "http://web-unicen.herokuapp.com/api/thing/group/2", //Nuestro grupo es el '2'.
		"method": "GET",
		"dataType": "JSON",
		"success": mostrarDatosServidor,
		"error": handleError
	  });
	}

  //Carga la 'tabla' con la 'data' obtenida.
	function mostrarDatosServidor(data) {
	  console.log(data);
	  for (let i = 0; i < data.information.length ; i++){ //Este 'for' va desde 'i' (0) hasta el tamaño máximo del arreglo "information".
		generarFila(data, i); //Pasa el 'data' JSON y la variable 'i'.
		cantDatosTabla++; //Cantidad de Datos en la Tabla +1.
	  }
	}

	
	
	
  //--------------------FUNCIONES MODIFICAR (PUT method)---------------------

  //modifico los datos del servidor
  function modificar(data, event, thisElem){ //This 'button' -> thisElem.
	  event.preventDefault(); //Le dice a la página que ignore su comportamiento por defecto. (Evita que se refresque).

	  let pos = $(thisElem).attr("id"); //Almacena el  'ID' (de fila) del juego que estás modificando.
	  let numGrupo = 2;
	  let nombreJuego = $(".juego").val(); //Almacena el nombre que hayas puesto en el 'input'.
	  let fecha = $(".fechaLanzamiento").val(); //Almacena la fecha que hayas puesto en el 'input'.
	  let plataforma = $( ".plataforma:checked" ).map(function() { //Almacen los 'checkbox' que hayas marcado.
						  return $(this).val();
						}).get();
	  let calificacion = $(".calification:checked").val(); //Almacena el 'checkbox' que hayas marcado.
	  let objetoDatosJuego = { //Prepara todos los datos en un JSON.
		  "group": numGrupo,
		  "thing": {
			  "juego": nombreJuego,
			  "fechaLanzamiento": fecha,
			  "plataforma": plataforma,
			  "calificacion": calificacion
		  }
	  };

	  $.ajax({
		"url": "http://web-unicen.herokuapp.com/api/thing/" + data.information[pos]._id, //Numero (pos) de JSON correspondiente al ID hexadecimal.
		"method": "PUT",
		"contentType": "application/json; charset=utf-8", //Le dice al server que codifique la 'data' con 'utf-8' para acentos, caracteres especiales, etc.
		"data": JSON.stringify(objetoDatosJuego), //Mete los valores 'JSON' de la variable 'objetoDatosJuego' y los convierte en 'STRING'.
		"dataType": "JSON",
		"success": function(){
		   modificarDatosFila(pos);
		   },
		"error": handleError
	  });
	}

   //Se trae la 'data' modificada SOLO si PUT fue Success. (Evita Falso Positivo).
	function modificarDatosFila(pos){	
   $(".rank" + pos + " > td").remove(); //Remueve TODOS los 'td' de esa FILA.
	  $.ajax({
		"url": "http://web-unicen.herokuapp.com/api/thing/group/2",
		"method": "GET",
		"dataType": "JSON",
		"success": function(data){
		   generarFila(data, pos); //Se muestra la 'data' en la FILA correspondiente.
		   },
		"error": handleError
	  });
	}

	
  //-------------FUNCION "CARGAR ITEMS EN LA TABLA POR DEFECTO"----------------

  function cargarItemsDefault(numGrupo){

    if(cantDatosTabla <= 7){ //Se crea arreglo 'objeto' JSON con la 'data' a cargar.
      let objeto = [
              {
                  "group": numGrupo,
                  "thing": {
                      "juego":"The Witcher III",
                      "fechaLanzamiento":"18/05/2015",
                      "plataforma":"PC,PS4, Xbox",
                      "calificacion":"9"
                  }
              },
              {
                  "group": numGrupo,
                  "thing": {
                      "juego":"Nier: Automata",
                      "fechaLanzamiento":"23/02/2017",
                      "plataforma":"PC,PS4",
                      "calificacion":"8"
                  }
              },
              {
                  "group": numGrupo,
                  "thing": {
                      "juego":"Horizon Zero Dawn",
                      "fechaLanzamiento":"28/02/2017",
                      "plataforma":"PS4",
                      "calificacion":"8"
                  }
              },
      ];

      //Guarda TODA la 'data'.
      for(let i = 0; i < 3; i++){
        $.ajax({
          "url": "http://web-unicen.herokuapp.com/api/thing/",
          "method": "POST",
          "contentType": "application/json; charset=utf-8",
          "data": JSON.stringify(objeto[i]), //0, 1, 2.
          "dataType": "JSON",
          "success": actualizarTabla,
          "error": handleError
        });
      }
    }else{ //Si cantDatosTabla >= 7 -> ALERT!
      alert("El límite de la tabla es 10. 'Crear por defecto' añade 3 juegos a la tabla y esto superaría dicho límite.");
    }
  }

  
  
  
  //--------------------FUNCIONES GUARDAR (POST method)-----------------------

  
  //actualizo la tabla con los nuevos datos
	function actualizarTabla(){
	  $.ajax({
		"url": "http://web-unicen.herokuapp.com/api/thing/group/2",
		"method": "GET",
		"dataType": "JSON",
		"success": function(data){
		   agregarDatosFila(data);
		   },
		"error": handleError
	  });
	}

  //agrego los nuevos datos en la tabla justo debajo del ultimo
	function agregarDatosFila(data){
	  console.log(data);
	  let ultimoElem = cantDatosTabla; //'ultimoElem' es igual a la cantidad de 'data' en la tabla (FILAS).
	  generarFila(data, ultimoElem);
	  cantDatosTabla++;
	}
	
  function guardar(numGrupo){
    if(cantDatosTabla < 10){
      let nombreJuego = $(".juego").val(); //Lo que hayas escrito en '.juego'.
      let fecha = $(".fechaLanzamiento").val(); //Lo que hayas escrito en '.fechaLanzamiento'.
      let plataforma = $( ".plataforma:checked" ).map(function() { //Las plataformas que hayas seleccionado.
                          return $(this).val();
                        }).get();
      let calificacion = $(".calification:checked").val(); //La calificacion que hayas seleccionado.
      let objetoDatosJuego = { //Crea el JSON con los datos ingresados/seleccionados.
          "group": numGrupo,
          "thing": {
              "juego":nombreJuego,
              "fechaLanzamiento":fecha,
              "plataforma":plataforma,
              "calificacion":calificacion
          }
      };
      $.ajax({
        "url": "http://web-unicen.herokuapp.com/api/thing/",
        "method": "POST",
        "contentType": "application/json; charset=utf-8", //Se codificará utilizando 'utf-8' (Caracteres especiales, acentos, etc).
        "data": JSON.stringify(objetoDatosJuego), //Se convierten toda la 'data' de 'objetoDatosJuego' en un STRING.
        "dataType": "JSON",
        "success": function(){
		   actualizarTabla(); //Llama a la función 'actualizarTabla'.
		   },
        "error": handleError
      });
    }else{ //Si cantDatosTabla > 10 -> ALERT!
      alert("Tabla llena. Limitada a 10 juegos.");
    }
  }

	
	

  //-------------------FUNCIONES ELIMINAR (DELETE method)---------------------

  //thisElem corresponde al "this" del boton donde clickee, lo paso por parametro al momento de crear y bindear dicho boton.
	function eliminar(data, event, thisElem){
	  event.preventDefault(); //Previene comportamiento por defect (no se refresca).
	  let pos = $(thisElem).attr("id"); //Guarda el 'ID' de este boton en la variable 'pos'. (El ID corresponde a la fila donde se encuentra ese dato en el arreglo del servidor).
	  $.ajax({
		"url": "http://web-unicen.herokuapp.com/api/thing/" + data.information[pos]._id, //Borra la 'data' ubicada en la posicion de 'information' con el '_id' correspondiente.
		"method": "DELETE",
		"success": function(result){
		   quitarDatosFila(result, pos); //Llama a la función 'quitarDatosFila' y le pasa 'result' y 'pos' por parámetro.
		   }
	  });
	}

  //Elimina la fila. Genero nuevamente la tabla a partir de la fila eliminada. Obtengo nuevamente datos del servidor.
	function quitarDatosFila(data, fila){
	  console.log(data);
	  $(".rank" + fila + " > td").remove(); //Elimina TODOS los 'td' de esa 'fila'.
	  $.ajax({
		"url": "http://web-unicen.herokuapp.com/api/thing/group/2",
		"method": "GET",
		"dataType": "JSON",
		"success": function(data){
		   reordenarTabla(data, fila); //Llama a la función 'rerodenarTablar' y le pasa 'data' y 'fila' por parámetro.
		   },
		"error": handleError
	  });
	}

  //a Insercion, Seleccion y Burbujeo no les gusta esto asi que le dieron "dislike"
  function reordenarTabla(data, filaEliminada){ //'filaEliminada' = 'numero de fila'.
	  for(let i = filaEliminada; i < data.information.length; i++){ //Elimina desde la posicion 'filaEliminada' hasta el último elemento.
  		$(".rank"+ i +" > td").remove(); //Elimina TODOS los 'td' de esa 'fila'.
  		generarFila(data, i); //Genera la fila con la 'data' traída y la posicion actual.
	  }
	  cantDatosTabla--; //cantDatosTabla-1
	  $(".rank" + cantDatosTabla + " > td").remove(); //Elimina completamente la fila clickeada.
	}
	
	
	