  <?php

  //ESTAS CONSTANTES HACEN FALTA. Porque desde configapi llega la conexion al modelo y no las conoce, no puede conectar a la DB.
  //Define los datos de la DB que vamos a usar. (Para poder cambiarla simplemente modificando acá).
  define('HOST', "localhost"); //Host (Servidor).
  define('DBNAME', "level-x"); //Nombre de la DB.
  define('DBUSER', "root"); //Nombre de Usuario para loguear en la DB.
  define('DBPASS', ""); //Contraseña de Usuario para loguear en la DB.

    class ConfigApi{
      public static $RESOURCE = 'resource'; //action#método (GET, PUT, POST, DELETE).
      public static $PARAMS = 'params'; //parámetros, (si los hay).
      public static $RESOURCES = [
        //"GET" "PUT" "POST" "DELETE" vienen de fondo, no en la URL.
        'game#GET' => 'NavApiController#getGames', //Cuando entres a la URL "game" con el método GET, va a NavApiController -> GetGames.
        'game#POST' => 'NavApiController#insertGame', //Cuando entres a la URL "game" con el método POST, va a NavApiController -> InsertGames.
        'game#DELETE' => 'NavApiController#deleteGame', //Cuando entres a la URL "game" con el método DELETE, va a NavApiController -> deleteGame.
        'game#PUT' => 'NavApiController#updateGame', //Cuando entres a la URL "game" con el método PUT, va a NavApiController -> updateGame.

        //TPE2
        'comentario#GET' => 'NavApiController#getComentarios',
        'comentario#POST' => 'NavApiController#insertComentario',
        'comentario#DELETE' => 'NavApiController#deleteComentario'
      ];
    }
  ?>
