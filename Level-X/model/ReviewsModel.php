<?php

require_once "ConnectModel.php";

class ReviewsModel extends ConnectModel
{
  private $db; //Inicializamos la variable.

  function __construct(){
    $this->db = parent::__construct();
  }

  function GetReview($id_review){
    $sentencia = $this->db->prepare( "SELECT * from reviews where id_review=?");
    $sentencia->execute(array($id_review));
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }

  function GetReviews(){ //Trae todas las reviews de la DB.
      $sentencia = $this->db->prepare( "SELECT * from reviews"); //Selecciona todo de la tabla reviews.
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function GetReviewsByGame($id_game){
    $sentencia = $this->db->prepare( "SELECT * FROM reviews where id_juego=?"); //Selecciona todas las Reviews que pertenezcan al $Game (ID de juego).
    $sentencia->execute(array($id_game));
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  //A PARTIR DE ACÁ, EXCLUSIVOS DE ADMIN:

  function insertReview($Review, $Autor, $Juego){
    $sentencia = $this->db->prepare ("INSERT INTO reviews(review, autor_de_review, id_juego) VALUES (?,?,?)");
    $sentencia->execute(array($Review, $Autor, $Juego));
  }

  function deleteReview($id_review){
    $sentencia = $this->db->prepare( "DELETE FROM reviews where id_review=?");
    $sentencia->execute(array($id_review));
  }

  function updateReview($Review, $Autor, $Juego, $idReview){
    $sentencia = $this->db->prepare("UPDATE reviews set review=?, autor_de_review=?, id_juego=? where id_review=?");
    $sentencia->execute(array($Review, $Autor, $Juego, $idReview));
  }

}


 ?>
