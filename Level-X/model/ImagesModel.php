
<?php

require_once "ConnectModel.php";

class ImagesModel extends ConnectModel{
  private $db; //Inicializamos la variable.

  function __construct(){
    $this->db = parent::__construct();
  }

  function uploadImages($imagesTemporalRoute){
    $routes = [];
    foreach ($imagesTemporalRoute as $imageRoute) {
      $finalRoute = 'images/item-game-images/' . uniqid() . '.jpg'; //Genera un ID único para la imagen en la carpeta 'images/'. (EJ: images/323DASGGAS4.jpg).
      move_uploaded_file($imageRoute, $finalRoute); //Mueve el archivo subido (supongo que seria $imageRoute) a $finalRoute. (EJ: images/323DASGGAS4.jpg).
      $routes[] = $finalRoute; //Guarda la ruta de cada imagen que hayas subido como un array.
    }
    return $routes; //Retorna el array con la ruta final de cada imagen que vas a subir.
  }

  //Imágenes
  function saveImages($idJuego, $imagesTemporalRoute){
    $routes = $this->uploadImages($imagesTemporalRoute);
    $sentencia_Images = $this->db->prepare("INSERT INTO imagenes(nombre, id_juego) VALUES(?,?)");
    //$routes es un arreglo que contiene la ruta final donde se guardará cada imagen que estes por subir.
    foreach ($routes as $route) { //Por cada ruta, es una imagen. Así que se realiza el execute por cada una de ellas y con la ruta correspondiente de cada una.
      $sentencia_Images->execute([$route, $idJuego]); //Se incerta la imagen FK para ese ID juego y en su ruta correspondiente. (EJ: images/323DASGGAS4.jpg).
    }
  }

  function getImages(){
    $sentencia = $this->db->prepare( "SELECT * FROM imagenes"); //Selecciona todo de la tabla juegos.
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function deleteImage($imageId){
    $sentencia = $this->db->prepare( "DELETE FROM imagenes WHERE id_imagen=? ");
    $sentencia->execute(array($imageId));
  }

}

?>
