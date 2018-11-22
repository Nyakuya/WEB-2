<?php

//GRAN VENTAJA: Porque ahora los datos (controller y metodo correspondiente a X acion) de las distintas "páginas" que tengas estan en
//ConfigApi, y Todo el cálculo se realiza en este route. Gracias a esto, este route no engorda mientras más "páginas" tienes, pero si
//ConfigApi. Sin embargo ConfigApi es muy fácil de mantener si engorda, y route no).
require_once "config/ConfigApi.php"; //Config exclusivo para API REST.
require_once "controller/NavApiController.php"; //Controller exclusivo para API REST.


function parseURL($url){
  $urlExploded = explode('/', $url); //Separa la URL por '/' y la guarda en un arreglo para acceder las partes por posición.
  //REQUEST_METHOD devuelve el método usado, 'GET' 'POST' 'PUT' 'DELETE' etc.
  $arrayReturn[ConfigApi::$RESOURCE] = $urlExploded[0] . '#' . $_SERVER['REQUEST_METHOD']; //Guarda valor de la $urlExploded[0] (url # método), en la primera posicion de $arrayReturn.

  //Si están seteados los parámetros hace un array_slice (Agarra todo lo que haya desde la posición 1 en adelante, ($urlExploded,1)
  //osea todo lo que haya luego de la action, y lo pone junto). Si no están seteados pone null. (Guarda resultado en $arrayReturn como $PARAMS).
  $arrayReturn[ConfigApi::$PARAMS] = isset($urlExploded[1]) ? array_slice($urlExploded,1) : null;
  return $arrayReturn;
}

if(isset($_GET['resource'])){
   //Llama función de arriba que retorna arreglo de 2 posiciones.
    $urlData = parseURL($_GET['resource']); //$urlData = (Primera Posicion = action#método (EJ: review#DELETE), Segunda Posicion = params. (EJ: $urlData[PARAMS] = [1,2,3,4]).
    $resource = $urlData[ConfigApi::$RESOURCE]; //Guarda el resource en $resource. (resource sería action#método).
    if (array_key_exists($resource, ConfigApi::$RESOURCES)){ //Si en ConfigApi.php existe la action#método que intentamos realizar, entra.
        $params = $urlData[ConfigApi::$PARAMS]; //Guarda los 'params' en $params.
        //Mete la 'value' correspondiente a la key '$resource' (action#método -> value), que se encuentra en el arreglo $RESOURCES en ConfigApi.
        //Y la separa en posiciones en '$action' cada vez que encuentra un '#'. (EJ: review#DELETE -> NavApiController#DeleteReview).
        $action = explode('#', ConfigApi::$RESOURCES[$resource]);
        $controller = new $action[0](); //$action[0] tiene el nombre de la clase (SIGUIENDO EJ: NavApiController), la incializa.
        $metodo = $action[1]; //$action[1] tiene el nombre de la función a ejecutar (SIGUIENDO EJ: DeleteReview), guarda su nombre en $metodo.
        if (isset($params) && $params != null){ //Comprueta si $params existe y no está vacía.
            echo $controller->$metodo($params); //Si $params NO está vacía, significa que había parámetros, por lo que llama al $metodo (SIGUIENDO EJ: DeleteReview) CON parámetros.
        }
        else{
            echo $controller->$metodo(); //Si $params está vacía, significa que NO había parámetros, por lo que llama al $metodo (SIGUIENDO EJ: DeleteReview) SIN parámetros.
        }
    }else{ //Se puede realizar algo si la action#método no existe. (EJ: Dirigir al HOME, que fue el ejemplo del profesor).
      //$controller =  new NavController();
      //echo $controller->Home();
      //Esto tambien se podría hacer desde el .htaccess, agregando que si no se conce la url, mande a X lado.
    }
}
?>
