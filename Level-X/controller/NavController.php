<?php

//Su objetivo es cargar la página correspondientes dependiendo de la opción elegida en el navegador. (Inicio, Juegos, Noticias).

require_once  "./view/NavView.php";
require_once "./model/ReviewsModel.php";
require_once "./model/GamesModel.php";
require_once "./model/UserModel.php";
require_once "./model/ImagesModel.php";

//No extiendo desde SecuredController porque no quiero que haga falta estar logueado, pero si que $Logueado pueda ser True o false dependiendo de esto.
//Y como no se retornar un valor para la variable $Logueado desde SecuredController, no tenia forma de cambiar entre login/logout en el nav.
class NavController{
  private $view;
  private $reviewsModel;
  private $gamesModel;
  private $userModel;
  private $imagesModel;
  private $Titulo;
  private $Logueado; //Creada para poder usarla en cada función.
  private $Admin;

  function __construct()
  {
    session_start(); //Siempre hay que usarlo antes de $_SESSION, (ya que es quien hace la comprobacion con la coockie y completa $_SESSION para poder consultarla).
    //Como no se retornar un valor para la variable $Logueado desde SecuredController, no tenia forma de cambiar entre login/logout en el nav si no era desde acá.
    //El tiempo de inactividad se reinicia si utilizas alguna función de esta pagina no segura.
    if(isset($_SESSION["User"])){
      $this->Logueado = true; //Si User está seteada, ya esta logueado.
      $this->Admin = $_SESSION["admin"]; //Contiene '0' ('false') y '1' ('true') para saber si el usuario es o no admin.
    }else{
      $this->Logueado = false; //Si User no esta seteada, no se logueó.
      $this->Admin = ''; //Si el usuario no está logueado, no tiene caso saber si es o no admin. (La dejamos vacía).
    }

    $this->view = new NavView();
    $this->reviewsModel = new ReviewsModel();
    $this->gamesModel = new GamesModel();
    $this->userModel = new UserModel();
    $this->imagesModel = new ImagesModel();
    $this->Titulo = "Level-X"; //Variable que contiene Nombre del titulo de la página.
  }

  function UserPage(){ //Muestra la pagina para usuario no logueado. (La otra se llamaria AdminPage).
    $Games = $this->gamesModel->GetGames();
    //Sirve para indicar que no quiero mostrar la lista de juegos. (Hay 2 casos, en uno lo muestro y en otro NO, pero uso el mismo tpl y la condicion se activa. Cuando quiero mostrar el "index",
    //osea la userPage, no quiero que la muestre pero necesito traer los juegos para completar el select de filtrar por juego, asi que uso este chequeo).
    $this->view->MostrarPaginaUsuario($this->Titulo, $this->Logueado, $this->Admin, $Games); //Le paso también los juegos para que el SELECT de filtrar Reviews por Juego, funcione.
  }

  function getReviewsConCategoria(){
    $Reviews = $this->reviewsModel->GetReviews();
    $Games = $this->gamesModel->GetGames();
    $Rol = "Reviews"; //Indicar 4 cosas distintas segun su valor. ("Reviews"->Mostrar Reviews. "Juegos"->Mostrar Juegos. "SortedReviews"->Reviews ordenadas por juego. "FilteredReviews"->Filtrar Reviews por juego).
    $this->view->MostrarPaginaUsuario($this->Titulo, $this->Logueado, $this->Admin, $Games, $Reviews, $Rol);
  }

  function getGames(){
    $Games = $this->gamesModel->GetGames();
    $Images = $this->imagesModel->getImages();
    $Rol = "Juegos"; //Indicar 4 cosas distintas segun su valor. ("Reviews"->Mostrar Reviews. "Juegos"->Mostrar Juegos. "SortedReviews"->Reviews ordenadas por juego. "FilteredReviews"->Filtrar Reviews por juego).
    $this->view->MostrarPaginaUsuario($this->Titulo, $this->Logueado, $this->Admin, $Games, $Reviews='', $Rol, $Images);
  }

  function getReviewsOrdenadas(){
    $Reviews = $this->reviewsModel->GetReviews();
    $Games = $this->gamesModel->GetGames();
    $Rol = "SortedReviews"; //Indicar 4 cosas distintas segun su valor. ("Reviews"->Mostrar Reviews. "Juegos"->Mostrar Juegos. "SortedReviews"->Reviews ordenadas por juego. "FilteredReviews"->Filtrar Reviews por juego).
    $this->view->MostrarPaginaUsuario($this->Titulo, $this->Logueado, $this->Admin, $Games, $Reviews, $Rol);
  }

  function ReadMore($param){
    $Review = $this->reviewsModel->GetReview($param[0]); //Traemos solo la información de la Review en cuestión. Posicion 0 es donde está el primer parámetro.
    $Game = $this->gamesModel->GetGame($Review['id_juego']); //Traemos solo la información del Game en cuestión, fijandonos en el id_juego de la Review.
    $this->view->ReadMore($this->Titulo, $Review, $Game); //Le damos a la vista la Review que debe mostrar en detalle.
  }


  //TPE 2 (Trabajo Práctico Especial 2).

  function filterReviewsByGame(){
    $Rol = "FilteredReviews"; //Indicar 4 cosas distintas segun su valor. ("Reviews"->Mostrar Reviews. "Juegos"->Mostrar Juegos. "SortedReviews"->Reviews ordenadas por juego. "FilteredReviews"->Filtrar Reviews por juego).
    $idJuego = $_POST['gameId']; //Trae el ID del juego desde userFooter (desde el filtro).
    $Games = $this->gamesModel->GetGames(); //Traigo solo la info del Juego ID (para un mejor display).
    $Reviews = $this->reviewsModel->GetReviewsByGame($idJuego); //Traigo solo las reviews pertenecientes al Juego ID.
    $this->view->MostrarPaginaUsuario($this->Titulo, $this->Logueado, $this->Admin, $Games, $Reviews, $Rol);
  }

  function usersComments(){ //¡ESTO TIENE QUE ESTAR EN APICONTROLLER!
    $Games = $this->gamesModel->GetGames(); //Independientemente de si el usuario está o no logueado, hace falta traer los juegos para el display de su info.
    $Images = $this->imagesModel->getImages(); //Independientemente de si el usuario está o no logueado, hace falta traer las imagenes para mostrarlas en el display de los juegos.
    if ($this->Logueado == true){ //$Logueado definida en la clase, usada para muchas cosas, (cambiar 'Login' por 'Logout', desaparecer 'Sign Up', y usada en los propios comentarios para chequear).
      $Username = $_SESSION['User'];
      $User = $this->userModel->getUser($Username); //Busca al usuario en la DB y trae todos sus datos. (La uso para obtener el ID del usuario cuando hace un comentario).
    }else{
      $User[0] = ''; //Si el usuario no está logueado, dejo la posicion [0] de '$User' vacía. (porque es un array ya que uso 'fetchAll' en el modelo en lugar de 'fetch').
    }
    //Si el IF de arriba no entra, significa que el usuario no está logueado, y utilizo la variable "$logueado" para saberlo, ya que trae 'true' ó 'false' y me lo permite chequear.
    $this->view->commentGames($this->Titulo, $this->Logueado, $this->Admin, $User[0], $Games, $Images); //Como el model de getUser (1 solo) dice fetchAll, lo trae como arreglo de posiciones.
  }
}

 ?>
