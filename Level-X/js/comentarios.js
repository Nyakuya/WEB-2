
 $(document).ready(function(){ //Espera a que termine de cargar la pagina.
  //Basicamente hace que el programa se ponga "estricto" y marque tus errores.
  'use strict' //EJ: No puedes usar variables sin declarar. ( X = 3.14; Daría ERROR, ya que X no está declarada).


 //A PARTIR DE ACÁ, SE TRAEN TODOS LOS COMENTARIOS CON SUS JUEGOS, USUARIOS, ETC. (GET).

  let templateComentarios;

  fetch('js/templates/comentarios.handlebars') //Cargamos el template que queremos mostrar. (El de tareas).
    .then(response => response.text()) //¿Revisa si lo traido es texto?, ¿o que?
    .then(template => {
      //Acá se podria usar console.log(template), lo que imprime por consola el template que cargamos.
      templateComentarios = Handlebars.compile(template); //Compila el template y lo guarda en la variable.
      getComentarios(); //Ejecuta la funcion que trae TODAS las tareas. (Está abajo en este mismo archivo).
  })


  function getComentarios(){ //Al ejecutarla se traen TODAS las tareas. (Porque la API está creada para que lo haga con la URL 'api/tarea' especificada en el fetch).
    fetch("api/comentario") //fetch significa "traer" o "extraer"
    .then(response => response.json()) //SUPONGO que trae la respuesta de 'response.json()' y la guarda en 'response'.
    .then(jsonComentarios => { //¿jsonTareas es como una "variable" que guarda los datos para pasarlos como parametros?.

    let valor = document.getElementById("comentarios-container").getAttribute("value");
    if (valor == "true"){ //Como en el getElementyById viene en formato string, y handlebars siempre da true con strings, necesito cambiarlo a boolean.
      valor = true;
    }else{
      valor = false;
    }

    mostrarComentarios(jsonComentarios, valor); //Tras traer las tareas y guardarlas en jsonTareas, llama a la función mostrarTareas y pasa las tareas por parámetro.
    })
  }

  //Al ejecutarla se muestran TODAS las tareas traídas, (pero tiene que recibirlas por parámetro para funcionar, 'tareas').
  function mostrarComentarios(jsonComentarios, valor){
    let context = { //Como el assign de smarty.
      comentarios: jsonComentarios, //Equivale a un array JSON con TODOS los datos de la tabla a la cual le hicimos GET, (tareas en este caso, con el ajax de getTareas()).
      administrator: valor
    }
        console.log(context);
    let html = templateComentarios(context); //templateTareas es una variable definida arriba del todo en este mismo archivo. Le compilamos el template que queriamos adentro, y ahora le metemos un parametro.
    //El div del 'home.tpl' donde queremos que muestre el template 'tareas.handlebars', tiene un 'id="tareas-container"', y aqui abajo le decimos que lo muestre adentro de ese div.
    document.querySelector("#comentarios-container").innerHTML = html; //html es una variable que contiene el template y el parámetro que le pasamos, (las tareas).}

    //Tras cargar los comentarios con API REST, les bindeo la función de clickear a lo que tenga la clase 'deleteComment', (en este caso el botón "borrar"). Sino haces esto, dicho boton no funciona.
    //(Siempre que se cargue contenido dinamicamente, hay que bindearle la funcionalidad). Guarda el valor de 'data-id' (El id_comentario) para poder saber que comentario quieres borrar.
    $('.deleteComment').bind("click", function(event){
      let data = $(this).data("id");
      deleteComment(data);
    });
  }


  //SE GUARDAN EL COMENTARIO HECHO POR X USUARIO SOBRE X JUEGO, (POST).
     $('#submitComment').click(function(){ //Cuando clickeas en el boton "Submit" que tiene el ID '#submitcomment', entra.
        event.preventDefault(); //Previene que se actualice la página (que redireccione).
        let comentario = {
        "comentario": $('#commentText').val(), //Texto, comentario, tu opinion sobre el juego.
        "valoracion": $('#puntaje').val(), //Punta (entre 1 y 5) con el que se valora al juego.
        "id_juego": $('#id_juego').val(), //ID del juego al que pernetece el comentario.
        "id_usuario": $('#id_usuario').val() //ID del usuario que hizo el comentario.
        }
        console.log(comentario); //Imprimo un LOG con el JSON de datos ingresados por el usuario.
        fetch("api/comentario", {
          method: 'POST',
          headers: {'Content-Type': 'application/json'},
          body: JSON.stringify(comentario)
        })
        .then(r => getComentarios()) //Si el POST tiene éxito, llama a una función de arriba que trae TODOS los comentarios y los muestra.
        .catch(error => console.log("error")); //Si el post falla, imprime un log con el error.
      });


      //SE BORRA EL COMENTARIO CLICKEADO POR EL ADMIN (USUARIO CUALQUIERA NO PUEDE BORRAR), (POST).
      function deleteComment(data){ //Cuando clickeas en el boton "Submit" que tiene el ID '#submitcomment', entra.
         event.preventDefault(); //Previene que se actualice la página (que redireccione).
         fetch("api/comentario/"+ data, {
           method: 'DELETE',
         })
         .then(r => getComentarios()) //Si el POST tiene éxito, llama a una función de arriba que trae TODOS los comentarios y los muestra.
         .catch(error => console.log("error")); //Si el post falla, imprime un log con el error.
       }

}); //FIN - $(document).ready
