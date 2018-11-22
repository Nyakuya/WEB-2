<?php

require_once "ConnectModel.php";

class GamesModel extends ConnectModel
{
  private $db; //Inicializamos la variable.

  function __construct(){
    $this->db = parent::__construct();
  }

  function GetGame($id_game){
    $sentencia = $this->db->prepare( "SELECT * from juegos where id_juego=?");
    $sentencia->execute(array($id_game));
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }

  function GetGames(){ //Trae todos los juegos de la DB.
      $sentencia = $this->db->prepare( "SELECT * from juegos"); //Selecciona todo de la tabla juegos.
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  //A PARTIR DE ACÁ, EXCLUSIVOS DE ADMIN:

  function insertGame($gameName, $Plot){
    $sentencia = $this->db->prepare ("INSERT INTO juegos(nombre, plot) VALUES (?,?)");
    $sentencia->execute(array($gameName, $Plot));
    //2 Líneas agregadas para API REST, (Antes solo estaban las dos lineas $sentencia). (lastInsertId es una función propia de PDO).
    $lastId = $this->db->lastInsertId(); //lastInsertId retorna la ID de lo último insertado. (En este caso, la ID del último Juego insertado).
    return $this->GetGame($lastId); //Trae el Juego que tenga la última ID insertada y lo retorna. (Osea, Retorna el último Juego insertado).
  }

  function deleteGame($id_juego){
    //Líneas '$Juego' 'if(isset)' y 'return' agregados para API REST, (Antes solo estaban las dos lineas $sentencia).
    $Juego = $this->GetGame($id_juego); //Trae el Juego que tenga la ID de Juego a borrar. (Osea, guarda el Juego que queremos borrar).
    if(isset ($Juego) && $Juego != null){ //Si el Juego que queremos borrar existe, ($Juego esta seteada y no está vacía), entra y lo borra.
      $sentencia = $this->db->prepare( "DELETE FROM juegos where id_juego=?");
      $sentencia->execute(array($id_juego));
      return $Juego; //Retorno el Juego que acabamos de borrar. (Porque se guarda acá antes de borrarse).
    }
  }

  function updateGame($gameName, $Plot, $idJuego){
    $sentencia = $this->db->prepare("UPDATE juegos set nombre=?, plot=? where id_juego=?");
    $sentencia->execute(array($gameName, $Plot, $idJuego));
    //Linea agregada para API REST, (Antes solo estaban las dos lineas $sentencia).
    return $this->GetGame($idJuego); //Retorna el Juego que tenga la ID de Juego que queríamos editar. (Osea, retorna el Juego YA editado).
  }
  
}


 ?>
