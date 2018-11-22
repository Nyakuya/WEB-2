  <?php

    require_once "Api.php";
    //Va dos directorios hacia atras y luego entra al model.
    require_once "./../model/GamesModel.php"; //(Level-X/api/controller -> Level-X/api -> Level-X -> Level-X/model/NavModel.php).
    require_once "./../model/CommentsModel.php";

    class NavApiController extends Api{

      private $gamesModel;
      private $commentsModel;
      private $Privileges; //1-> Admin, 0->Usuario registrado, ''->El usuario ni siquiera esta registrado.

      function __construct(){
        parent::__construct(); //Inicializamos la clase del padre de NavApiController, osea Api.
        $this->gamesModel = new GamesModel();
        $this->commentsModel = new CommentsModel();

        session_start();
        if(isset($_SESSION["User"])){ //Si está logueado, guardo si es admin o no.
          $this->Privileges = $_SESSION["admin"]; //Guarda '0' si no es admin, y '1' si lo es.
        }else{
          $this->Privileges = ''; //Si el usuario no está logueado, Privileges es null.
        }
      }

    //   //GET
    //   function getGames($param = ''){ //Seteada en vacio por default porque si la URL no tiene parametros, crashea.
    //     if(isset($param) && $param != null){ //Si $param está seteada y NO está vacía, es porque la URL vino con parámetros. (En este caso, corresponderia a la ID del Juego).
    //       $id_juego = $param[0]; //Como $param es un array, metemos el primer parámetro. (La ID de Juego).
    //       $data = $this->gamesModel->GetGame($id_juego); //Trae la tarea ID del Model de siempre, y la guarda en $data.
    //     }else{
    //       //Si NO hay parámetros, traemos todos los Juegos.
    //       $data = $this->gamesModel->GetGames(); //Trae los Juegos del Model de siempre, y las guarda en $data.
    //     }
    //
    //     if(isset($data) && $data != null){ //Si $data está seteada y NO está vacía, significa que la DB devolvió algo.
    //       //Como $data está seteada, se llama a la función json_response (está en Api.php).
    //       return $this->json_response($data, 200); //Muestra Juego/Juegos ($data) que traes de la DB, y 200 "OK".
    //     }else{
    //       //Si $data NO está seteada, significa que la DB no devolvió nada porque no se encontró lo que buscabamos, (sea Juego ID=X, ó todos los Juegos).
    //       //Ponemos el primer parámetro (de la data) como "null", y $status como "404", que significa "Not Found" en Api.php (función _requestStatus).
    //       return $this->json_response("Nothing to show", 404);
    //     }
    //   }
    //
    //   //POST
    //   function insertGame($param = ''){ //Seteada en vacio por default porque si la URL no tiene parametros, crashea.
    //     //Habría que hacer un IF por si la tarea ID que queres insertar ya existe, y si ya existe decirselo. (Solo si hace falta, sino ni
    //     //molestarse y dejar que el ID AI (AutoIncremental) le ponga la ID que corresponda).
    //     //Además como $param[0] corresponderia al ID y el Model no usa ID al realizar la inserción (inserta de forma AutoIncremental),
    //     //es de gusto traer el $param. Y además, no vas a insertar más de un Juego a la vez. (Pero el profesor dejó el $param = '').
    //
    //     $objetoJson = $this->getJSONData(); //Función de Api.php. (Toma la data recibida en formato RAW (EJ: Desde Postman) y la devuelve en formato de objeto). EJ: Todos los datos del Juego.
    //     //insertGame es una función del Model de siempre, y recibe estos 2 parámetros, (la ID es AutoIncremental).
    //     $response = $this->gamesModel->insertGame($objetoJson->nombre, $objetoJson->plot); //Se retorna el último Juego insertado desde insertGame para poder mostrarlo abajo.
    //     //$response es la tarea insertada, que la devuelve el Model al ejecutar IsertarTarea.
    //     return $this->json_response($response, 200); //Responde mostrando que Juego insertaste ($response) y 200 "OK".
    //   }
    //
    //   //DELETE
    //   function deleteGame($param = ''){ //Seteada en vacio por default porque si la URL no tiene parámetros, crashea.
    //     //Estaba hecho con 'count($param) == 1', entonces si tenia 1 solo dato entraba. Pero nee... Lo cambié. (No tiene sentido borrar muchos ID de Juego a la vez).
    //     if(isset($param) && $param != null){ //Si $param está seteado y NO está vacío.
    //       $id_juego = $param[0]; //Como $param es un array, metemos el primer parámetro. (La ID de Juego).
    //       //El último Juego borrado se guarda en una variable ANTES de borrarse, y se retorna LUEGO de borrarse.
    //       $response = $this->gamesModel->deleteGame($id_juego); //Se retorna el Juego borrado desde insertGame para poder mostrarlo abajo.
    //
    //       //Si el ID de Juego que intentaste borrar NO existe, (por lo que no se retornó nada a $response), $response se auto-rellena con "null", (osea false).
    //       if($response != false){ //Chequea que el Juego borrado existiera antes de ser borrado.
    //         return $this->json_response($response, 200); //Responde mostrando el Juego borrado ($response) y 200 "OK".
    //       }else{ //Si devolvió false (porque el Juego NO existia incluso antes de ser borrado), muestro "Nothing to delete on this target" y el mensaje "301" ("Game Not Found").
    //         return $this->json_response("Nothing to delete on this target", 301);
    //       }
    //
    //     }else{ //Este cartel se muestra cuando no especificaste un parámetro, (osea un ID de tarea).
    //       return $this->json_response("No target specified to delete", 301); //La $data seria "No target specified to delete" y el error el "301" ("Game Not Found").
    //   }
    // }
    //
    // //PUT
    // function updateGame($param = ''){ //Seteada en vacio por default porque si la URL no tiene parámetros, crashea.
    //   //Estaba hecho con 'count($param) == 1', entonces si tenia 1 solo dato entraba. Pero nee... Lo cambié. (No tiene sentido editar muchos ID de Juego a la vez).
    //   if(isset($param) && $param != null){ //Si la cantidad de posiciones en el arreglo $param es igual a 1. (Osea, si viene 1 solo parametro).
    //     $id_Juego = $param[0]; //Como $param es un array, metemos el primer parámetro. (La ID de Juego).
    //     $objetoJson = $this->getJSONData(); //Función de Api.php. (Toma la data recibida en formato RAW (EJ: Desde Postman) y la devuelve en formato de objeto). EJ: Todos los datos del Juego.
    //
    //     $response = $this->gamesModel->updateGame($objetoJson->nombre, $objetoJson->plot, $id_Juego); //Se retorna el Juego editado desde updateGame para poder mostrarlo abajo.
    //
    //     //Si el ID de Juego que intentaste editar NO existe, no se retornó nada a $response, y $response se auto-rellena con "null", (osea false).
    //     if($response != false){ //Chequea que el Juego editado existiera antes de ser editado.
    //       return $this->json_response($response, 200); //Si el Juego se editó correctamente, lo muestra y muestra 200 "OK".
    //     }else{
    //       //Si la url viene con un parámetro que no existe, (Osea, no existe ese ID de Juego que se quiere editar), muestra "Nothing to update on this target" y el error "301" ("Game Not Found").
    //       return $this->json_response("Nothing to update on this target", 301);
    //     }
    //   }else{
    //     //Si la url viene sin parametros (sin ID) del Juego a editar, muestra "No target specified" y el error "301" ("Game Not Found").
    //     return $this->json_response("No target specified", 301);
    //   }
    // }



    //TPE2

    function getComentarios($param = ''){
      if(isset($param) && $param != null){ //Si $param está seteada y NO está vacía, es porque la URL vino con parámetros. (En este caso, corresponderia a la ID del Comentario).
        $id_comentario = $param[0]; //Como $param es un array, metemos el primer parámetro. (La ID de Comentario).
        $data = $this->commentsModel->getComment($id_comentario); //Trae el Comentario ID del Model de siempre, y la guarda en $data.
      }else{
        //Si NO hay parámetros, traemos todos los Comentarios.
        $data = $this->commentsModel->getComments(); //Trae los Juegos del Model de siempre, y las guarda en $data.
      }

      if(isset($data) && $data != null){ //Si $data está seteada y NO está vacía, significa que la DB devolvió algo.
        //Como $data está seteada, se llama a la función json_response (está en Api.php).
        return $this->json_response($data, 200); //Muestra el Comentario o los Comentarios ($data) que traes de la DB, y 200 "OK".
      }else{
        //Si $data NO está seteada, significa que la DB no devolvió nada porque no se encontró lo que buscabamos, (sea Comentario ID=X, ó todos los Comentarios).
        //Ponemos el primer parámetro (de la data) como "null", y $status como "404", que significa "Not Found" en Api.php (función _requestStatus).
        return $this->json_response("Nothing to show", 404);
      }
    }

    //POST
    function insertComentario($param = ''){ //Seteada en vacio por default porque si la URL no tiene parametros, crashea. (En este caso, no tendria por que venir un parametro).
      if($this->Privileges != null){ //Mientras que sea diferente de null, significa que el usuario esta logueado. (Da igual si es admin o no).
        $objetoJson = $this->getJSONData(); //Función de Api.php. (Toma la data recibida en formato RAW (EJ: Desde Postman o API REST) y la devuelve en formato de objeto).
        //Se retorna el último Comentario insertado para poder mostrarlo abajo.
        $response = $this->commentsModel->insertComment($objetoJson->comentario, $objetoJson->valoracion, $objetoJson->id_juego, $objetoJson->id_usuario);
        //$response es el Comentario insertado, que lo devuelve el Model al ejecutar insertComment.
        return $this->json_response($response, 200); //Responde mostrando que Juego insertaste ($response) y 200 "OK".
      }
    }

    //DELETE
    function deleteComentario($param = ''){ //Seteada en vacio por default porque si la URL no tiene parámetros, crashea.
        //Estaba hecho con 'count($param) == 1', entonces si tenia 1 solo dato entraba. Pero nee... Lo cambié. (No deseo borrar muchos ID de Juego a la vez).
        if($this->Privileges == 1){ //Si es administrador, solo entonces lo deja borrar.
          if(isset($param) && $param != null){ //Si $param está seteado y NO está vacía.
            $id_comentario = $param[0]; //Como $param es un array, metemos el primer parámetro. (La ID del Comentario).
            //El último Comentario borrado se guarda en una variable ANTES de borrarse, y se retorna LUEGO de borrarse. (El proposito, mostrar en el response que fue lo que borraste).
            $response = $this->commentsModel->deleteComment($id_comentario);

            //Si el ID de Juego que intentaste borrar NO existe, (por lo que no se retornó nada a $response), $response se auto-rellena con "null", (osea false).
            if($response != false){ //Chequea que el Juego borrado existiera antes de ser borrado.
              return $this->json_response($response, 200); //Responde mostrando el Juego borrado ($response) y 200 "OK".
            }else{ //Si devolvió false (porque el Juego NO existia incluso antes de ser borrado), muestro "Nothing to delete on this target" y el mensaje "301" ("Game Not Found").
              return $this->json_response("Nothing to delete on this target", 301);
            }

          }else{ //Este cartel se muestra cuando no especificaste un parámetro, (osea un ID de tarea).
            return $this->json_response("No target specified to delete", 301); //La $data seria "No target specified to delete" y el error el "301" ("Game Not Found").
        }
      }
    }

  }
?>
