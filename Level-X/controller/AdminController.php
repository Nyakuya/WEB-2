<?php

//Su objetivo es cargar la página correspondientes dependiendo de la opción elegida en el navegador. (Inicio, Juegos, Noticias).

require_once  "./view/NavView.php";
require_once "./model/ReviewsModel.php";
require_once "./model/GamesModel.php";
require_once "./model/UserModel.php";
require_once "./model/ImagesModel.php";
require_once "SecuredController.php";

class AdminController extends SecuredController{ //Extiendo desde SecuredController porque necesito que sea seguro.
  private $view;
  private $reviewsModel;
  private $gamesModel;
  private $userModel;
  private $imagesModel;
  private $Titulo;
  private $Logueado;
  private $Admin;

  function __construct()
{
    parent::__construct(); //Llamamos al constructor del padre de AdminController, (Osea SecuredController).
    $this->Logueado = true; //Como este controller está asegurado con SecuredController, no hace falta verificar. Si entra, es porque esta logeuado.
    $this->Admin = $_SESSION["admin"]; //Contiene '0' ('false') y '1' ('true') para saber si el usuario es o no admin.
    $this->view = new NavView();
    $this->reviewsModel = new ReviewsModel();
    $this->gamesModel = new GamesModel();
    $this->userModel = new UserModel();
    $this->imagesModel = new ImagesModel();
    $this->Titulo = "Level-X"; //Variable que contiene Nombre del titulo de la página.
  }

  function AdminPage(){ //Muestra la pagina para usuario logeuado, (y opciones de administrador).
    $this->view->MostrarPaginaAdmin($this->Titulo, $this->Logueado, $this->Admin);
  }

  function getReviewsWithout(){
    $Mostrar = "Reviews";
    $Reviews = $this->reviewsModel->GetReviews();
    $this->view->MostrarPaginaAdmin($this->Titulo, $this->Logueado, $this->Admin, $Mostrar, $Reviews);
  }

  function getGamesAdmin(){
    $Mostrar = "Juegos";
    $Games = $this->gamesModel->GetGames();
    $Images = $this->imagesModel->getImages();
    $this->view->MostrarPaginaAdmin($this->Titulo, $this->Logueado, $this->Admin, $Mostrar, $Reviews='', $Games, $Images);
  }

  function formAddReview(){ //Form (.tpl) para escribir la info de la Review.
    $Insertar = "Review"; //La uso para saber que estoy insertando.
    $Games = $this->gamesModel->GetGames();
    $this->view->formInsert($this->Titulo, $Insertar, $Games);
  }

  function formAddGame(){ //Form (.tpl) para escribir la info del Game.
    $Insertar = "Game"; //La uso para saber que estoy insertando.
    $this->view->formInsert($this->Titulo, $Insertar);
  }

  function insertReview(){ //Traigo la info del insert.tpl y la inserto.
    $Review = $_POST["reviewId"];
    $Autor = $_POST["authorId"];
    $Juego = $_POST["gameId"];
    $this->reviewsModel->insertReview($Review, $Autor, $Juego);
    header(ADMIN_REVIEWS); //Redirecciona para traer la lista de Reviews actualizada.
  }

  function insertGame(){ //Traigo la info del insert.tpl y la inserto.
    $gameName = $_POST["gameId"];
    $Plot = $_POST["plotId"];
    $this->gamesModel->insertGame($gameName, $Plot);
    header(ADMIN_GAMES); //Redirecciona para traer la lista de Juegos actualizada.
  }

  function deleteReview($param){
    $this->reviewsModel->deleteReview($param[0]); //Corresponde a ID de la Review.
    header(ADMIN_REVIEWS); //Redirecciona para traer la lista de Reviews actualizada.
  }

  function deleteGame($param){
    $this->gamesModel->deleteGame($param[0]); //Corresponde a ID del Juego.
    header(ADMIN_GAMES); //Redirecciona para traer la lista de Juegos actualizada.
  }

  function formUpdateReview($param){
    $Editar = "Review"; //La uso para saber que estoy editando.
    $Review = $this->reviewsModel->GetReview($param[0]);
    $Games = $this->gamesModel->GetGames(); //Traigo TODA la info de ese ID de Juego.
    $this->view->formUpdate($this->Titulo, $Editar, $Games, $Review, $param); //Traigo TODA la info de ese ID de Review.
  }

  function formUpdateGame($param){
    $Editar = "Juego"; //La uso para saber que estoy editando.
    $Game = $this->gamesModel->GetGame($param[0]); //Traigo TODA la info de ese ID de Juego.
    $this->view->formUpdate($this->Titulo, $Editar, $Game, $Review='', $param);
  }

  function UpdateReview(){
    $Review = $_POST["reviewId"]; //La review.
    $Autor = $_POST["authorId"]; //El autor de la review.
    $Juego = $_POST["gameId"]; //El juego al cual se le hizo la review.
    $idReview = $_POST["idReview"]; //El ID de la base de datos para la review.
    $this->reviewsModel->updateReview($Review, $Autor, $Juego, $idReview);
    header(ADMIN_REVIEWS); //Redirecciona para traer la lista de Reviews actualizada.
  }

  function UpdateGame(){
    $gameName = $_POST["gameId"];
    $Plot = $_POST["plotId"];
    $idJuego = $_POST["idGame"];
    $this->gamesModel->updateGame($gameName, $Plot, $idJuego);
    header(ADMIN_GAMES); //Redirecciona para traer la lista de Juegos actualizada.
  }


  //TPE 2

  function assignAdminPrivileges(){ //Sirve para convertir a un usuario en administrador.
    $rol = "Asignar"; //$rol tiene 3 valores posibles. ("Asignar" Privilegios. "Quitar" Privilegios. "Borrar" Cuenta de Usuario).
    $Users = $this->userModel->getUsers();
    $this->view->assignRemoveAdminPrivilegesOrDeleteAccount($this->Titulo, $Users, $rol);
  }

  function removeAdminPrivileges(){ //Sirve para convertir a un adminsitrador en usuario.
    $rol = "Quitar"; //$rol tiene 3 valores posibles. ("Asignar" Privilegios. "Quitar" Privilegios. "Borrar" Cuenta de Usuario).
    $Users = $this->userModel->getUsers();
    $currentUser = $_SESSION['User']; //Sirve para saber el nombre del usuario actual, y así no permitir que se quite los permisos de administrador a si mismo.
    $this->view->assignRemoveAdminPrivilegesOrDeleteAccount($this->Titulo, $Users, $rol, $currentUser);
  }

  function updateAssignAdminPrivileges(){ //Realiza el cambio en los permisos de administracion del ID de usuario. (Lo vuelve admin).
    $userId = $_POST["userId"];
    $value = 1; //Variable que uso con los valores 1 y 0. (1->Tiene permisos; la uso para dar permisos. 0->No tiene permisos; la uso para quitar permisos).
    $this->userModel->updateAdminPrivileges($value, $userId);
    header(ADMIN); //Redirecciona a la página de adminsitración.
  }

  function updateRemoveAdminPrivileges(){ //Realiza el cambio en los permisos de administracion del ID de usuario. (Deja de ser admin).
    $userId = $_POST["userId"];
    $value = 0; //Variable que uso con los valores 1 y 0. (1->Tiene permisos; la uso para dar permisos. 0->No tiene permisos; la uso para quitar permisos).
    $this->userModel->updateAdminPrivileges($value, $userId);
    header(ADMIN); //Redirecciona a la página de adminsitración.
  }

  function deleteUser(){
    $rol = "Borrar"; //$rol tiene 3 valores posibles. ("Asignar" Privilegios. "Quitar" Privilegios. "Borrar" Cuenta de Usuario).
    $Users = $this->userModel->getUsers();
    $currentUser = $_SESSION['User']; //Sirve para saber el nombre del usuario actual, y así no permitir que se borre a si mismo.
    $this->view->assignRemoveAdminPrivilegesOrDeleteAccount($this->Titulo, $Users, $rol, $currentUser);
  }

  function deleteUserAccount(){
    $userId = $_POST["userId"];
    $this->userModel->deleteUserAccount($userId);
    header(ADMIN);
  }

  function formAddGameImage(){
    $Games = $this->gamesModel->getGames();
    $this->view->addGameImage($this->Titulo, $Games);
  }


  //Images Upload/Delete

  //La llama la función de abajo para chequear si la imagen subida es o no .png (Por alguna razon si la pongo despues de la función de abajo, dice que no está definida).
  private function sonJPG($imagesTemporalRoute){ //¿Por que necesita ser privada?... ¿Para evitar que modifiquen el tipo de extensión de archivo que se permite?.
      foreach ($imagesTemporalRoute as $imageType){
        if($imageType != 'image/jpeg'){ //Tipo de archivo a comprobar.
          return false;
        }
      }
      return true;
  }

  function saveImages(){
    $imagesTemporalRoute = $_FILES['images']['tmp_name']; //¿'tmp_name' es el nombre del input de imagen,'name="imagenes[]"'?. ('images' es el id). ¿$_FILES contiene las imágenes subidas?.
    $idJuego = $_POST['gameId'];
    //print_r($_FILES['images']['tmp_name']); //EJ: Array ( [0] => C:\xampp\tmp\php4029.tmp )
    //print_r($_FILES['images']['type']); //EJ: Array ( [0] => image/png )
    if($this->sonJPG($_FILES['images']['type'])) { //Comprueba si las imagenes subidas son .jpg ($FILES contiene las imágenes subidas).
      $this->imagesModel->saveImages($idJuego, $imagesTemporalRoute);
      header(ADMIN);
    }else{
      $Games = $this->gamesModel->getGames();
      $this->view->addGameImage($this->Titulo, $Games, "Solo se permite extensión .jpg");
    }
  }

  function deleteImage($param){
    $imageId = $param[0];
    $this->imagesModel->deleteImage($imageId); //Image ID.
    header(ADMIN_GAMES); //Redirecciona para traer la lista de Juegos actualizada.
  }

}

 ?>
