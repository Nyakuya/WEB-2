<?php

     //Estos 2 en conjunto imprimen por pantalla TODOS los métodos disponibles para $_SERVER, y la info de cada uno de ellos. (El port actual, el server actual, etc).
    //var_dump($_SERVER);
    //die();
//SERVER_NAME -> Nombre del servidor, (localhost). SERVER_PORT -> El puerto que use el servidor, (EJ: 8888).

//Define los datos de la DB que vamos a usar. (Para poder cambiarla simplemente modificando acá).
define('HOST', "localhost"); //Host (Servidor).
define('DBNAME', "level-x"); //Nombre de la DB.
define('DBUSER', "root"); //Nombre de Usuario para loguear en la DB.
define('DBPASS', ""); //Contraseña de Usuario para loguear en la DB.

//Constante LOGIN. Contiene link de página para loguearse. (Redirigue a '/login').
define('LOGIN', 'Location: http://' . $_SERVER["SERVER_NAME"] . ":" . $_SERVER['SERVER_PORT'] . dirname($_SERVER["PHP_SELF"]) . '/login');
//Constante LOGOUT. Contiene link de página para desloguearse. (Redirigue a '/logout').
define('LOGOUT', 'Location: http://' . $_SERVER["SERVER_NAME"] . ":" . $_SERVER['SERVER_PORT'] . dirname($_SERVER["PHP_SELF"]) . '/logout');
//Constante LOGOUT. Contiene link de página pública (para todos los usuarios). (Redirigue a '/user').
define('USER', 'Location: http://' . $_SERVER["SERVER_NAME"] . ":" . $_SERVER['SERVER_PORT'] . dirname($_SERVER["PHP_SELF"]) . '/user');
//Constante LOGOUT. Contiene link de página para usuario logueado (Redirigue a '/admin').
define('ADMIN', 'Location: http://' . $_SERVER["SERVER_NAME"] . ":" . $_SERVER['SERVER_PORT'] . dirname($_SERVER["PHP_SELF"]) . '/admin');

//Usada para redireccionar a la página con la lista de Reviews ya cargada, si es que clickeas en "volver atrás" estando en "readmore" (user) ó "editar" (admin).
define('ADMIN_REVIEWS', 'Location: http://' . $_SERVER["SERVER_NAME"] . ":" . $_SERVER['SERVER_PORT'] . dirname($_SERVER["PHP_SELF"]) . '/getReviewsWithout');
define('ADMIN_GAMES', 'Location: http://' . $_SERVER["SERVER_NAME"] . ":" . $_SERVER['SERVER_PORT'] . dirname($_SERVER["PHP_SELF"]) . '/getGamesAdmin');

class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
      //Publico. (Cualquiera puede usarlo: Usuario no registrado, Usuario registrado, Admin).
        'user' => 'NavController#UserPage',
        'getReviewsWith' => 'NavController#getReviewsConCategoria',
        'getGames' => 'NavController#getGames',
        'getReviewsSorted' => 'NavController#getReviewsOrdenadas',
        'readMore' => 'NavController#ReadMore',
        //Login/Logout (register)
        'login' => 'UserController#login',
        'verificarLogin' => 'UserController#verificarLogin',
        'logout' => 'UserController#logout',
        //TPE2
        'reviewsFilter' => 'NavController#filterReviewsByGame',
        'signUp' => 'UserController#signUpUser',
        'verificarSignUp' => 'UserController#verifySignUp',

        //Casi publico. (Usuario no registrado Ve, Usuario registrado Ve/Comenta, Admin Ve/Comenta/Borra).
        'comentarios' => 'NavController#usersComments', //Usa comentarios.tpl

      //Admin (Solo admins).
        'admin' => 'AdminController#AdminPage',
        'getReviewsWithout' => 'AdminController#getReviewsWithout',
        'getGamesAdmin' => 'AdminController#getGamesAdmin',
        'addReview' => 'AdminController#formAddReview', //tpl para introducir la info.
        'addGame' => 'AdminController#formAddGame', //tpl para introducir la info.
        'insertReview' => 'AdminController#insertReview',  //Una vez obtenida la info, se inserta.
        'insertGame' => 'AdminController#insertGame',  //Una vez obtenida la info, se inserta.
        'borrarReview' => 'AdminController#deleteReview',
        'borrarJuego' => 'AdminController#deleteGame',
        'editarReview' => 'AdminController#formUpdateReview', //tpl para modificar la info.
        'editarJuego' => 'AdminController#formUpdateGame', //tpl para modificar la info.
        'updateReview' => 'AdminController#UpdateReview', //Una vez obtenida la info modificada, se updatea.
        'updateGame' => 'AdminController#UpdateGame', //Una vez obtenida la info modificada, se updatea.
        //TPE2
        'agregarPermisosAdministrativos' => 'AdminController#assignAdminPrivileges', //tpl para elegir a que usuario convertir en administrador.
        'quitarPermisosAdministrativos' => 'AdminController#removeAdminPrivileges', //tpl para elegir a a que usuario quitarle permisos de administrador.
        'deleteUser' => 'AdminController#deleteUser', //tpl para elegir a que usuario le borrarás la cuenta.
        'assignAdminPrivileges' => 'AdminController#updateAssignAdminPrivileges', //Una vez elegido que usuario se convierte en administrador, se updatea su info.
        'removeAdminPrivileges' => 'AdminController#updateRemoveAdminPrivileges', //Una vez elegido que administrador pierde sus permisos, se updatea su info.
        'deleteUserAccount' => 'AdminController#deleteUserAccount', //Sirve para borrar cuentas de usuario, y viene con info desde 'assignRemoveAdminPrivilegesOrDeleteAccount.tpl'
        //Images
        'agregarImagenJuego' => 'AdminController#formAddGameImage', //tpl para subir la imagen que quieres añadir a un ID de juego.
        'guardarImagenes' => 'AdminController#saveImages', //Una vez obtienes las imagenes que quieres subir, (con js de por medio y un ajax), entras y tras hacer ciertas comprobaciones las subes.
        'borrarImagen' => 'AdminController#deleteImage', //Llegas aquí tras clickear en el boton "borrar imagen" que trae por parámetro el ID de la imagen.
    ];

}

 ?>
