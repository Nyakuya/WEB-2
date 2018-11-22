<?php
    class Api{

      protected $data; //Supongo que como $data tendría la informacion que viene de la DB, la protejemos por las dudas.

      function __construct(){
        //Hasta este punto la data está en formato RAW. (Luego agarra el "body" del request, osea la info, la data que vien).
        $this->data = file_get_contents("php://input"); //Guarda la data que venga en la URL, (función propia de php).
      }

      private function _requestStatus($code){ //Retorna numero del error.
        $status = array( //Hash the numeros.
          200 => "OK",
          301 => "Game Not Found", //Usado cuando quieres borrar/editar un juego y no se encuentra la ID de ese Juego.
          404 => "Not found",
          500 => "Internal Server Error"
        );
        return ($status[$code])? $status[$code] : $status[500]; //Si el $status existe en el array, lo pone. Si no, pone 500 por default.
      }

      public function json_response($data, $status){ //$data = Lo que traes de la DB. $status = numero en _requestStatus.
        header("Content-Type: application/json"); //Le dice como se maneja la info, (como json).
        //HTTP (porque no es seguro) version 1.1. Llama a la función _requestStauts (Que busca string correspondiete a codigo).
        header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status)); //EJ: Si $status fuera 200, devolveria "OK".
        return json_encode($data); //Retorna el JSON en formato de string. (json_enconde la provee php, es un serialize).
      }

      function getJSONData(){ //No hace falta protejer esta función porque la $data es una variable protected.
        //La variable $data consigue su valor en el constructor de esta clase. (Esta explicado ahi).
        return json_decode($this->data); //Transforma lo que está en $data (info RAW) a formato objeto. (Se usa como objeto).
      }

    }
  ?>
