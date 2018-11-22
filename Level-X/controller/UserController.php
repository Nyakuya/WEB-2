<?php

require_once  "./view/UserView.php";
require_once  "./model/UserModel.php";

//Imprimir contraseña encriptada para probar: $hash = password_hash("1234", PASSWORD_DEFAULT);   echo $hash;
//admin->1234

class UserController
{
  private $view;
  private $model;
  private $Titulo;

  function __construct()
  {
    $this->view = new UserView();
    $this->model = new UserModel();
    $this->Titulo = "Level-X";
  }

  function login(){
    $this->Titulo = "Level-X Login";
    $this->view->mostrarLogin($this->Titulo);
  }

  function verificarLogin(){
      $Username = $_POST["usernameId"]; //Obtiene datos del campo id usernameId en el form de login.tpl
      $Password = $_POST["passwordId"]; //Obtiene datos del campo id passwordId en el form de login.tpl
      $User = $this->model->getUser($Username); //Busca el nombre del usuario en la DB y trae toda su info.

      if(isset($User) && $User != null){ //Si está seteada y no esta vacia, significa que encontró al usuario en la DB.
          if (password_verify($Password, $User[0]["password"])){
            session_start(); //Como el usuario acaba de loguearse, guardamos su sesión.
            $_SESSION["User"] = $Username; //Guardamos el nombre del usuario correspondiente en la sesión.
            $_SESSION["admin"] = $User[0]['admin']; //Guardamos si el usuario tiene o no permisos de administración, (para chequear esto mismo en el SecuredController).
            header(ADMIN); //Constante que muestra lo pagina del administrador. /admin
          }else{ //Si $User esta seteada y no esta vacia, pero las contraseñas no se corresponden:
            $this->view->mostrarLogin($this->Titulo, "Usuario o contraseña incorrectos"); //Contraseña incorrecta.
          }
      }else{ //Si $User no esta seteado y/o esta vacio, entonces significa que el Username no existe en la DB.
        $this->view->mostrarLogin($this->Titulo, "Usuario o contraseña incorrectos"); //El usuario no existe.
      }

    }

    function logout(){
      session_start();
      session_destroy();
      header(USER);
    }

    function signUpUser(){
      $this->Titulo = "Level-X Sing Up";
      $this->view->mostrarSignUp($this->Titulo);
    }

    function verifySignUp(){
      $this->Titulo = "Level-X Sing Up";
      $Username = $_POST["usernameId"]; //Obtiene datos del campo id usernameId en el form de login.tpl
      $Password = $_POST["passwordId"]; //Obtiene datos del campo id passwordId en el form de login.tpl
      $User = $this->model->getUser($Username); //Busca el nombre del usuario en la DB para chequear si ya existe.

      if(isset($User) && $User == null){ //Si la DB retorna null significa que no se encontró el nombre del usuario en la DB, (se puede seguir con el sing up).
        if ($Password != null){ //Si $Password es distinto a vacío, se puede seguir con el sing up.
          //Insertar el usuario en la DB y redirigir.
          $Password = password_hash($Password, PASSWORD_DEFAULT); //Encripta la contraseña.
          $this->model->insertUser($Username, $Password); //Guarda el nombre de usaurio y la contraseña encriptada.
          session_start(); //Como el usuario acaba de loguearse, guardamos su sesión.
          $_SESSION["User"] = $Username; //Guardamos el nombre del usuario correspondiente en la sesión.
          $_SESSION["admin"] = 0; //Guardamos '0' y representa que este usuario NO tiene permisos de administrador. (Los recien registrados no tienen). (Chequeo con esto en el SecuredController).
          header(USER); //Constante que muestra lo pagina pública de usuario. (Los "recien llegados" no tienen permiso para entrar en la administrador).
        }else{ //Si $Password está vacío, significa que no escribió una password.
          $this->view->mostrarSignUp($this->Titulo, "El campo Password no puede estar vacío");
        }
      }else{ //Si no esta vacía, significa que encontró el username en la DB, (el usuario ya existe).
        $this->view->mostrarSignUp($this->Titulo, "El usuario ya existe");
      }
    }
}

 ?>
