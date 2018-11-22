<?php

//GRAN VENTAJA: Porque ahora los datos (controller y metodo correspondiente a X acion) de las distintas "páginas" que tengas estan en
//ConfigApp, y Todo el cálculo se realiza en este route. Gracias a esto, este route no engorda mientras más "páginas" tienes, pero si
//ConfigApp. Sin embargo ConfigApp es muy fácil de mantener si engorda, y route no).
require_once "config/ConfigApp.php";
require_once "controller/NavController.php";
require_once "controller/UserController.php";
require_once "controller/AdminController.php";
require_once "controller/SecuredController.php";


function parseURL($url){
  $urlExploded = explode('/', $url); //Separa la URL por '/' y la guarda en un arreglo para acceder las partes por posición.
  $arrayReturn[ConfigApp::$ACTION] = $urlExploded[0]; //Guarda valor de la $urlExploded[0] (action) en $arrayReturn como $ACTION. (EJ: borrar).

  //Si están seteados los parámetros hace un array_slice (Agarra todo lo que haya desde la posición 1 en adelante, ($urlExploded,1)
  //osea todo lo que haya luego de la action, y lo pone junto). Si no están seteados pone null. (Guarda resultado en $arrayReturn como $PARAMS).
  $arrayReturn[ConfigApp::$PARAMS] = isset($urlExploded[1]) ? array_slice($urlExploded,1) : null;
  return $arrayReturn;
}

if(isset($_GET['action'])){
   //Llama función de arriba que retorna arreglo de 2 posiciones. (Primera = action, Segunda = params. EJ: ($urlData[ACTION] = borrar), ($urlData[PARAMS] = [1,2,3,4])).
    $urlData = parseURL($_GET['action']);
    $action = $urlData[ConfigApp::$ACTION]; //Guarda la 'action' en $action.
    //Si en el array de $ACTIONS (en ConfigApp.php) existe la 'action' que intentamos realizar, entra. (EJ: Si $action = "borrar" y en ConfigApp::$ACTIONS existe "borrar").
    if(array_key_exists($action,ConfigApp::$ACTIONS)){
        $params = $urlData[ConfigApp::$PARAMS]; //Guarda los 'params' en $params.
        //Separa la 'value' correspondiente a la 'actiuon' (EJ: borrar -> TareasController#BorrarTarea) separándola en posiciones cada vez que encuentra
        //un '#'. (EJ: $action[0] = TareasController && $action[1] = BorrarTarea). (Separa nombre de controlador de nombre de método, (ConfigApp.php)).
        $action = explode('#',ConfigApp::$ACTIONS[$action]);
        $controller =  new $action[0](); //Siguiendo EJ: $action[0] tiene el nombre de la clase (TareasController), la incializa.
        $metodo = $action[1]; //Siguiendo EJ: $action[1] tiene el nombre del método (BorrarTarea), guarda el método.
        if(isset($params) &&  $params != null){ //$params es un arreglo con TODOS los parámetros.
            echo $controller->$metodo($params); //Si tenia 'params', llama al $metodo (EJ: BorrarTarea) CON parámetros.
        }
        else{
            echo $controller->$metodo(); //Si NO tenia 'params', llama al $metodo (EJ: BorrarTarea) SIN parámetros.
        }
    }else{ //Se puede realizar algo si la 'ACTION' no existe. (EJ: Dirigir al HOME, que fue el ejemplo del profesor).
      //$controller =  new NavController();
      //echo $controller->Home();
      //Esto tambien se podría hacer desde el .htaccess, agregando que si no se conce la url, mande a X lado.
    }
}
?>
