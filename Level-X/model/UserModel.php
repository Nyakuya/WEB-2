<?php

require_once "ConnectModel.php";

class UserModel extends ConnectModel
{
  private $db;

  function __construct(){
    $this->db = parent::__construct();
  }

  function getUser($Username){
    $sentencia = $this->db->prepare( "SELECT * FROM usuarios WHERE username=? ");
    $sentencia->execute(array($Username));
    return $sentencia->fetchall(PDO::FETCH_ASSOC);
  }

  function insertUser($Username, $Password){
    $sentencia = $this->db->prepare("INSERT INTO usuarios(username, password) VALUES(?,?)");
    $sentencia->execute(array($Username, $Password));
  }

  function getUsers(){
    $sentencia = $this->db->prepare( "SELECT * FROM usuarios ");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function updateAdminPrivileges($value, $userId){
    $sentencia = $this->db->prepare("UPDATE usuarios SET admin=? WHERE id_usuario=?");
    $sentencia->execute(array($value, $userId)); //$value la uso con los valores 1 y 0. (1->Tiene permisos; la uso para dar permisos. 0->No tiene permisos; la uso para quitar permisos).
  }

  function deleteUserAccount($userId){
    $sentencia = $this->db->prepare( "DELETE FROM usuarios where id_usuario=? ");
    $sentencia->execute(array($userId));
  }

}


 ?>
