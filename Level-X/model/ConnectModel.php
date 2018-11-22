<?php

class ConnectModel{

  function __construct(){
    return $this->Connect(); //Ejecuta la función que conecta a la DB y guarda la conexión.
  }

  function Connect(){ //Conecta a la DB level-x
    return new PDO('mysql:host=' . HOST . '; dbname=' . DBNAME . '; charset=utf8' , DBUSER, DBPASS);
  }
}
?>
