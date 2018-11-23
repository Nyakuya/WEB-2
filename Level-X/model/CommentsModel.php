<?php

require_once "ConnectModel.php";

class CommentsModel extends ConnectModel
{
  private $db; //Inicializamos la variable.

  function __construct(){
    $this->db = parent::__construct();
  }

  //GET ID
  function getComment($id_comentario){
    $sentencia = $this->db->prepare( "SELECT * FROM comentarios WHERE id_comentario=?");
    $sentencia->execute(array($id_comentario));
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }

  //GET ALL
  function getComments(){ //Trae todos los juegos de la DB.
      //Selecciono TODA la tabla de comentarios y solo las columnas "username" y "admin" de usuarios (para no traer la password), y le "uno" las filas de las columnas de la tabla Juegos
      //y Usuarios que tengan la id_juego é id_usuario en común con la tabla comentarios.
      $sentencia = $this->db->prepare("SELECT comentarios.*, usuarios.username, usuarios.admin FROM comentarios INNER JOIN juegos ON comentarios.id_juego = juegos.id_juego INNER JOIN usuarios ON comentarios.id_usuario = usuarios.id_usuario");
      $sentencia->execute();
      $comentarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

      foreach ($comentarios as $key => $comentario){
        //Como handlebars tiene serios problemas con '0' y '1' directamente si admin vale 1 pongo true y sino, false.
        $comentarios[$key]['admin'] = $comentario['admin'] == "1" ? true : false;
      }
      return $comentarios;
  }

  //POST
  function insertComment($comentario, $valoracion, $id_juego, $id_usuario){
    $sentencia = $this->db->prepare ("INSERT INTO comentarios(comentario, valoracion, id_juego, id_usuario) VALUES (?,?,?,?)");
    $sentencia->execute(array($comentario, $valoracion, $id_juego, $id_usuario));
    //2 Líneas agregadas para API REST, (lastInsertId es una función propia de PDO).
    $lastId = $this->db->lastInsertId(); //lastInsertId retorna la ID de lo último insertado. (En este caso, la ID del último Comentario insertado).
    return $this->getComment($lastId); //Trae el Juego que tenga la última ID insertada y lo retorna. (Osea, Retorna el último Comentario insertado).
  }

  function deleteComment($id_comentario){
    //Líneas '$Comentario' 'if(isset)' y 'return' agregados para API REST.
    $Comentario = $this->getComment($id_comentario); //Trae el Comentario que tenga la ID de Comentario a borrar. (Osea, guarda el Comentario que queremos borrar).
    if(isset ($id_comentario) && $id_comentario != null){ //Si el Comentario que queremos borrar existe, ($Comentario esta seteada y no está vacía), entra y lo borra.
      $sentencia = $this->db->prepare( "DELETE FROM comentarios WHERE id_comentario=?");
      $sentencia->execute(array($id_comentario));
      return $Comentario; //Retorno el Comentario que acabamos de borrar. (Porque se guarda acá antes de borrarse).
    }
  }

}


 ?>
