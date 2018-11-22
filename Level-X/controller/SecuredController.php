
  <?php
    //Creado para no tener que poner un if cada vez que comprobamos si el usuario estaba logueado o no.

    //Cada vez que se haga new de SecuredController, va a verificar si el usuario ya está logueado o no.
    class SecuredController{

      function __construct(){
          //Agarra la Cookie e ID locales y se los manda al server para comprobar si el usuario ya estaba logueado o no.
          session_start(); //Siempre hay que usar esto antes del $_SESSION, (Es quien la rellena con los datos a chequear).
          if (isset($_SESSION["User"]) && ($_SESSION["admin"] == 1)){ //Línea agregada para permitir que los usuarios logueados CON permiso de adminstracion, entren a la página de adminsitracion.
            //En la sesión guardamos LAST_ACTIVITY (ultima actividad del usuario). Entonces se compara, si time() (tiempo actual)
            //restado la ultima actividad, es mayor a 1800 (numero seteable en segundos), lo desloguea. (Estuvo demasiado inactivo).
            if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)){ //Solo funciona en los controllers que usen SecuredController. (Obviamente).
              $this->logout(); //Si estuvo demasiado inactivo, llamo a la función que desloguea.
            }

            $_SESSION['LAST_ACTIVITY'] = time(); //Si no estuvo demasiado inactivo, actualizo el momento de la última actividad registrada y dejo que todo siga.
          }elseif (isset($_SESSION["User"]) && ($_SESSION["admin"] == 0)){ //Línea agregada para NO permitir que los usuarios logueados SIN permiso de adminstracion, entren a página de adminsitracion.
            header(USER);
          }else{ //Si los otros 2 if no se cumplen, el usuario directamente NO está logueado.
            header(LOGIN); //Si el usuario no está logueado, lo redirigimos para que se loguee. (LOGIN constante que tiene el link de login).
          }
      }

      function logout(){
        session_start(); //Para cerrar la sesión primero siempre hay que iniciarla.
        session_destroy(); //Borramos la sesión actual y todas las variables que tenia.
        header(LOGIN); //Tras desloguear al usuario, lo llevamos a la página de login. (LOGIN constante con link).
      }
    } //FIN - Class SecuredController.
  ?>
