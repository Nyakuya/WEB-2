<?php
require('libs/Smarty.class.php');

class NavView{
  private $Smarty;

  function __construct(){
    $this->Smarty = new Smarty();
  }

  function MostrarPaginaUsuario($Titulo, $Logueado, $Admin, $Games = '', $Reviews = '', $Rol = '', $Images=''){ //La unica variable consistente para esta View es $Titulo. (nunca va a faltar).
    $this->Smarty->assign('Titulo', $Titulo); //Titulo es la variable, y $Titulo contiene el valor que esta toma.
    $this->Smarty->assign('Logueado', $Logueado);
    $this->Smarty->assign('Admin', $Admin);
    $this->Smarty->assign('Reviews', $Reviews);
    $this->Smarty->assign('Games', $Games);
    $this->Smarty->assign('Images', $Images);
    $this->Smarty->assign('Rol', $Rol);
    $this->Smarty->display('templates/userPage.tpl');
  }

  function ReadMore($Titulo, $Review, $Game){
    $this->Smarty->assign('Titulo', $Titulo); //Titulo es la variable, y $Titulo contiene el valor que esta toma.
    $this->Smarty->assign('Review', $Review);
    $this->Smarty->assign('Game', $Game);
    $this->Smarty->display('templates/readMore.tpl');
  }


  //A PARTIR DE ACÁ, VIEWS DE ADMIN:

  function MostrarPaginaAdmin($Titulo, $Logueado, $Admin, $Mostrar='', $Reviews='', $Games='', $Images=''){
    $this->Smarty->assign('Titulo', $Titulo); //Titulo es la variable, y $Titulo contiene el valor que esta toma.
    $this->Smarty->assign('Logueado', $Logueado);
    $this->Smarty->assign('Admin', $Admin);
    $this->Smarty->assign('Mostrar', $Mostrar);
    $this->Smarty->assign('Reviews', $Reviews);
    $this->Smarty->assign('Games', $Games);
    $this->Smarty->assign('Images', $Images);
    $this->Smarty->display('templates/adminPage.tpl');
  }

  function formInsert($Titulo, $Insertar, $Games=''){
    $this->Smarty->assign('Titulo', $Titulo); //Titulo es la variable, y $Titulo contiene el valor que esta toma.
    $this->Smarty->assign('Insertar', $Insertar);
    $this->Smarty->assign('Games', $Games);
    $this->Smarty->display('templates/insert.tpl');
  }

  function formUpdate($Titulo, $Editar, $Games, $Review='', $id){ //Como $Game viene en ambos casos, (en editarReview y editarJuego), no le pongo default.
    $this->Smarty->assign('Titulo', $Titulo); //Titulo es la variable, y $Titulo contiene el valor que esta toma.
    $this->Smarty->assign('Review', $Review);
    $this->Smarty->assign('Games', $Games); //Games tambien funciona como Game cuando estoy editando solo 1 juego.
    $this->Smarty->assign('Editar', $Editar);
    $this->Smarty->assign('id', $id);
    $this->Smarty->display('templates/update.tpl');
  }


    //TPE 2 (Trabajo Práctico Especial 2).

    function assignRemoveAdminPrivilegesOrDeleteAccount($Titulo, $Users, $Rol, $currentUser = ''){ //$currentUser solo viene con algo en 1 de 2 casos. (Cuando quieres remover permisos).
      $this->Smarty->assign('Titulo', $Titulo); //Titulo es la variable, y $Titulo contiene el valor que esta toma.
      $this->Smarty->assign('Usuarios', $Users); //Toda la info de todos los usuarios.
      $this->Smarty->assign('Rol', $Rol); //true o false dependiendo de lo que quiero realizar. (Asignar->true, Quitar->false).
      $this->Smarty->assign('CurrentUser', $currentUser); //Cuando viene con el nombre del usuario dentro, sirve para evitar que el usuario se quite los permisos a si mismo.
      $this->Smarty->display('templates/assignRemoveAdminPrivilegesOrDeleteAccount.tpl');
    }

    function addGameImage($Titulo, $Games, $Message = ''){
      $this->Smarty->assign('Titulo', $Titulo); //Titulo es la variable, y $Titulo contiene el valor que esta toma.
      $this->Smarty->assign('Games', $Games);
      $this->Smarty->assign('Message', $Message); //$Message se utiliza ocacionalmente para mostrar mensajes de error y por el estilo.
      $this->Smarty->display('templates/addGameImage.tpl');
    }

    function commentGames($Titulo, $Logueado, $Admin, $User, $Games, $Images){ //En el caso de que el usuario no esté logueado, $User viene vacío, (pero no crashea porque literalmente viene como '' gracias a un else).
      $this->Smarty->assign('Titulo', $Titulo); //Titulo es la variable, y $Titulo contiene el valor que esta toma.
      $this->Smarty->assign('Logueado', $Logueado);
      $this->Smarty->assign('Admin', $Admin);
      $this->Smarty->assign('Usuario', $User);
      $this->Smarty->assign('Games', $Games);
      $this->Smarty->assign('Images', $Images);
      $this->Smarty->display('templates/gameComments.tpl');
    }

}

 ?>
